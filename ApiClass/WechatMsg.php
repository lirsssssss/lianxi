<?php

/**
 * 微信订阅消息推送
 */


class WechatMsg
{


    /**
     * 微信模板消息
     * @param $data
     * @param $access_token
     * @param $type
     * @return mixed
     */
    public function Send($data,$access_token,$type){
        //组装url
        $url = 'https://api.weixin.qq.com/cgi-bin/message/subscribe/send?access_token=' . $access_token;
        //组装需要推送的数据模板
        $msg = $this->MsgList($data,$type);
        return $this->sendRequest($url, $msg);
    }

    /**
     * 消息模板
     * @param $data
     * @param $type
     * @return mixed
     */
    public function MsgList($data,$type)
    {
        switch ($type)
        {
            //微信投递通知
            case 'Send_wx_msg':
                $data = [
                    'touser' => $data['open_id'], //用户openid
                    'template_id' => 'OwXM8UxNxisq7vKWKE0zWpXSCffg_h6hEryWMDHJmtk',
                    'page' => 'pages/index/index',
                    'data' => [
                        'thing4' => ['value' => '小松鼠智能回收'],
                        'thing5' => ['value' => $data['nick_name']],    //用户昵称
                        'amount6' => ['value' => empty($data['amount']) ? 0 : $data['amount'] ."元"],    //获得环保金
                        'time7' => ['value' => date('Y-m-d')],
                    ]
                ];
            break;
            //回收机清空通知
            case 'SendMachineMsg':
                $data = [
                    'touser' => $data['open_id'], //用户openid
                    'template_id' => 'kRTxz2h_6CptZ_2MRquC69e6eGuPgdy1gmvnRQ_Vi2g',
                    'page' => 'pages/index/index',
                    'data' => [
                        'thing1' => ['value' => $data['community_name']],//小区地址
                        'thing2' => ['value' => '回收机站点已清理完成，您可以前往投递'], //通知内容
                    ]
                ];
            break;
        }

        return $data;
    }

    /**
     * 获取access_token
     * @return mixed
     */
    public function getAccess_token(){
        $wxAuthorize = new \WxChatLogin();
        $access_token = $wxAuthorize->GetAccessToken();
//        $redis->set('access_token', $res['access_token']);
//        $redis->expire('access_token', 120);//access_token 存在120秒
//        $access_token = $redis->get('access_token');

        return $access_token;
    }

    /**
     * 发送消息
     * @param $url
     * @param $data
     * @return mixed
     */
    private function sendRequest($url, $data){
        $context = stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => 'Content-type:application/json',
                'content' => json_encode($data),
                'timeout' => 60
            ],
        ]);
        //发送数据

        $res = json_decode(@file_get_contents($url, false, $context), 1);

        return $res;
    }

}