<?php
/**
 * Created by PhpStorm.
 * User: Hongfei
 * Date: 2019/3/21
 * Time: 上午10:00
 */

class WxChatLogin
{
    public static $OK = 0;
    public static $IllegalAesKey = -41001;
    public static $IllegalIv = -41002;
    public static $IllegalBuffer = -41003;
    public static $DecodeBase64Error = -41004;

    protected $AppId = '';
    protected $AppSecret = '';
    protected $sessionKey;
    /**
     * 小程序请求接口
     * @param $code=>小程序请求code
     * @return  array|mixed
     */
    public function WxLogin($code)
    {
        $AppId = $this->AppId;
        $AppSecret = $this->AppSecret;
        $url = "https://api.weixin.qq.com/sns/jscode2session?appid=" . $AppId . "&secret=" . $AppSecret . "&js_code=" . $code . "&grant_type=authorization_code";
        $arr = $this->curl_get($url);
        $arr = json_decode($arr, true);
        return $arr;
    }

    /**
     * 授权登陆获取用户信息
     * @param $sessionKey
     * @param $iv
     * @param $encryptedData
     * @return array|mixed
     */
    public function WxUserLogin($sessionKey,$iv,$encryptedData)
    {
        $this->sessionKey = $sessionKey;
        $errCode = $this->decryptData($encryptedData, $iv, $data);  //其中$data包含用户的所有数据
        if ($errCode != 0) {
            return ['status' => false, 'msg' => '获取失败'.$errCode];
        }
        $data = json_decode($data, true);
        if (empty($data)){
            $data['status'] = false;
        }
        $data['status'] = true;

        return $data;
    }

    /**
     * 检验数据的真实性，并且获取解密后的明文.
     * @param $encryptedData string 加密的用户数据
     * @param $iv string 与用户数据一同返回的初始向量
     * @param $data string 解密后的原文
     *
     * @return int 成功0，失败返回对应的错误码
     */
    public function decryptData( $encryptedData, $iv, &$data )
    {
        if (strlen($this->sessionKey) != 24) {
            return self::$IllegalAesKey;
        }
        $aesKey = base64_decode($this->sessionKey);


        if (strlen($iv) != 24) {
            return self::$IllegalIv;
        }
        $aesIV = base64_decode($iv);

        $aesCipher = base64_decode($encryptedData);

        $result = openssl_decrypt( $aesCipher, "AES-128-CBC", $aesKey, 1, $aesIV);

        $dataObj = json_decode( $result );
        if( $dataObj  == NULL )
        {
            return self::$IllegalBuffer;
        }
        if( $dataObj->watermark->appid != $this->AppId )
        {
            return self::$IllegalBuffer;
        }
        $data = $result;
        return self::$OK;
    }

    public function GetAccessToken(){
        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$this->AppId}&secret={$this->AppSecret}";
        return json_decode(file_get_contents($url), 1);
    }

    /**
     * curl get
     * @param $url
     * @return mixed
     */
    function curl_get($url){
        $info=curl_init();
        curl_setopt($info,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($info,CURLOPT_HEADER,0);
        curl_setopt($info,CURLOPT_NOBODY,0);
        curl_setopt($info,CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($info,CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($info,CURLOPT_URL,$url);
        $output= curl_exec($info);
        curl_close($info);
        return $output;
    }



}