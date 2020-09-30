<?php
/**
 * 腾讯云人脸识别人员库操作
 * 腾讯云文档地址:https://cloud.tencent.com/document/product/867/45023
 * Created by PhpStorm.
 * User: Hongfei
 */


class TencentFace
{
    private static $_instance = null;
    protected $url = 'iai.tencentcloudapi.com';
    protected $SecretId  = '';
    protected $SecretKey = '';
    protected $Version   = '2020-03-03';
    protected $Region    = 'ap-shanghai';
    protected $GroupId   = '11111';//单人员库取值


    /**
     * 构造函数
     * GroupId => 人员库id 多人员库需要传递
     * AiFace constructor.
     * @param string $GroupId
     */
    public function __construct($GroupId = '')
    {
        $this->GroupId = !empty($GroupId) ? $GroupId : $this->GroupId;
    }

    /**
     * 单例模式
     * @param string $GroupId = 人员库id 多人员库需要传递
     * @return AiFace|null
     */
    public static function getInstance($GroupId = '')
    {
        $getClass = empty(self::$_instance) ? new self($GroupId) : self::$_instance;

        return $getClass;
    }

    /**
     * 创建人员库
     * 用于创建一个空的人员库，如果人员库已存在返回错误
     * @param $GroupName => 人员库名称
     * @param $GroupId => 人员库id
     * @return mixed
     */
    public function CreateGroup($GroupName, $GroupId)
    {
        $action = 'CreateGroup';
        $data = [
            'GroupName' => $GroupName,//人员库名称
            'GroupId' => $GroupId//人员库id
        ];

        //获取公共参数
        $Header = $this->getFaceHeader($data, $action);

        //发送请求
        return $this->PostCurl($data, $Header);
    }

    /**
     * 获取人员库信息
     * @param $GroupId
     * @return mixed
     */
    public function GetGroupInfo($GroupId)
    {
        $action = 'GetGroupInfo';
        $data = [
            'GroupId' => $GroupId//人员库id
        ];

        //获取公共参数
        $Header = $this->getFaceHeader($data, $action);

        //发送请求
        return $this->PostCurl($data, $Header);
    }

    /**
     * 修改人员库
     * @param $GroupName
     * @param $GroupId
     * @return mixed
     */
    public function ModifyGroup($GroupName, $GroupId)
    {
        $action = 'ModifyGroup';
        $data = [
            'GroupName' => $GroupName,//人员库名称
            'GroupId' => $GroupId//人员库id
        ];

        //获取公共参数
        $Header = $this->getFaceHeader($data, $action);

        //发送请求
        return $this->PostCurl($data, $Header);
    }

    /**
     * 删除人员库
     * 删除该人员库及包含的所有的人员。同时，人员对应的所有人脸信息将被删除
     * @param $GroupId
     * @return mixed
     */
    public function DeleteGroup($GroupId)
    {
        $action = 'DeleteGroup';
        $data = [
            'GroupId' => $GroupId//人员库id
        ];

        //获取公共参数
        $Header = $this->getFaceHeader($data, $action);

        //发送请求
        return $this->PostCurl($data, $Header);
    }

    /**
     * 人脸检测与分析
     * 检测给定图片中的人脸（Face）的位置、相应的面部属性和人脸质量信息
     * @param $img
     * @return mixed
     */
    public function DetectFace($img)
    {
        $action = 'DetectFace';
        $data = [
            'Url' => $img,//图片地址
            'NeedFaceAttributes' => 1,//是否需要返回人脸属性信息 0 为不需要返回，1 为需要返回
            'NeedQualityDetection' => 1//是否开启质量检测。0 为关闭，1 为开启
        ];

        //获取公共参数
        $Header = $this->getFaceHeader($data, $action);

        //发送请求
        return $this->PostCurl($data, $Header);
    }

    /**
     * 人脸静态活体检测（高精度版）
     * 人脸静态活体检测（高精度版）可用于对用户上传的静态图片进行防翻拍活体检测，以判断是否是翻拍图片。
     * @param $img
     * @return mixed
     */
    public function DetectLiveFaceAccurate($img)
    {
        $action = 'DetectLiveFaceAccurate';
        $data = [
            'Url' => $img//图片地址
        ];

        //获取公共参数
        $Header = $this->getFaceHeader($data, $action);

        //发送请求
        return $this->PostCurl($data, $Header);
    }

    /**
     * 人脸静态活体检测
     * 用于对用户上传的静态图片进行人脸活体检测。
     * 与动态活体检测的区别是：静态活体检测中，用户不需要通过唇语或摇头眨眼等动作来识别。
     * @param $img
     * @return mixed
     */
    public function DetectLiveFace($img)
    {
        $action = 'DetectLiveFace';
        $data = [
            'Url' => $img//图片地址
        ];

        //获取公共参数
        $Header = $this->getFaceHeader($data, $action);

        //发送请求
        return $this->PostCurl($data, $Header);
    }

    /**
     * 人脸比对
     * 对两张图片中的人脸进行相似度比对，返回人脸相似度分数。
     * @param $imgA => A 图片的 Url
     * @param $imgB => B 图片的 Url
     * @return mixed
     */
    public function CompareFace($imgA, $imgB)
    {
        $action = 'CompareFace';
        $data = [
            'UrlA' => $imgA,//对比1图片地址
            'UrlB' => $imgB//对比2图片地址
        ];

        //获取公共参数
        $Header = $this->getFaceHeader($data, $action);

        //发送请求
        return $this->PostCurl($data, $Header);
    }

    /**
     * 创建人员
     * 创建人员，添加人脸、姓名、性别及其他相关信息。
     * @param $PersonId => 人员ID
     * @param $img
     * @return mixed
     */
    public function CreatePerson($PersonId, $img)
    {
        $action = 'CreatePerson';
        $data = [
            'GroupId' => $this->GroupId,//人员库ID
            'PersonName' => 'lhf',//姓名
            'PersonId' => $PersonId,
            'Url' => $img//图片地址
        ];

        //获取公共参数
        $Header = $this->getFaceHeader($data, $action);

        //发送请求
        return $this->PostCurl($data, $Header);
    }

    /**
     * 删除人员
     * 删除该人员信息，此操作会导致所有人员库均删除此人员。同时，该人员的所有人脸信息将被删除。
     * @param $PersonId
     * @return mixed
     */
    public function DeletePerson($PersonId)
    {
        $action = 'DeletePerson';
        $data = [
            'PersonId' => $PersonId//人员id
        ];

        //获取公共参数
        $Header = $this->getFaceHeader($data, $action);

        //发送请求
        return $this->PostCurl($data, $Header);
    }

    /**
     * 人员库删除人员
     * 从某人员库中删除人员，此操作仅影响该人员库。
     * @param $PersonId
     * @return mixed
     */
    public function DeletePersonFromGroup($PersonId)
    {
        $action = 'DeletePersonFromGroup';
        $data = [
            'PersonId' => $PersonId,//人员id
            'GroupId' => $this->GroupId//人员库id
        ];

        //获取公共参数
        $Header = $this->getFaceHeader($data, $action);

        //发送请求
        return $this->PostCurl($data, $Header);
    }

    /**
     * 获取人员归属信息
     * 获取指定人员的信息，包括加入的人员库、描述内容等。
     * @param $PersonId
     * @return mixed
     */
    public function GetPersonGroupInfo($PersonId)
    {
        $action = 'GetPersonGroupInfo';
        $data = [
            'PersonId' => $PersonId//人员id
        ];

        //获取公共参数
        $Header = $this->getFaceHeader($data, $action);

        //发送请求
        return $this->PostCurl($data, $Header);
    }

    /**
     * 获取人员基础信息
     * 获取指定人员的信息，包括姓名、性别、人脸等。
     * @param $PersonId
     * @return mixed
     */
    public function GetPersonBaseInfo($PersonId)
    {
        $action = 'GetPersonBaseInfo';
        $data = [
            'PersonId' => $PersonId//人员id
        ];

        //获取公共参数
        $Header = $this->getFaceHeader($data, $action);

        //发送请求
        return $this->PostCurl($data, $Header);
    }

    /**
     * 给指定的人员增加人脸 辨识度低于默认60则添加失败
     * 将一组人脸图片添加到一个人员中。一个人员最多允许包含 5 张图片
     * @param $PersonId
     * @param $img array
     * @return mixed
     */
    public function CreateFace($PersonId, $img = [])
    {
        $action = 'CreateFace';
        $data = [
            'PersonId' => $PersonId,//人员ID
            'FaceMatchThreshold' => 60,//辨识度
            'Urls' => $img//图片数组
        ];

        //获取公共参数
        $Header = $this->getFaceHeader($data, $action);

        //发送请求
        return $this->PostCurl($data, $Header);
    }

    /**
     * 给指定人员删除人脸
     * 删除一个人员下的人脸图片。如果该人员只有一张人脸图片，则返回错误。
     * @param $PersonId
     * @param $FaceIds
     * @return mixed
     */
    public function DeleteFace($PersonId, $FaceIds)
    {
        $action = 'DeleteFace';
        $data = [
            'PersonId' => $PersonId,//人员id
            'FaceIds' => $FaceIds//人脸ID数组取值为添加人脸和人员返回的FaceId
        ];

        //获取公共参数
        $Header = $this->getFaceHeader($data, $action);

        //发送请求
        return $this->PostCurl($data, $Header);
    }

    /**
     * 人员验证
     * 给定一张人脸图片和一个 PersonId，判断图片中的人和 PersonId 对应的人是否为同一人
     * @param $PersonId
     * @param $img
     * @return mixed
     */
    public function VerifyPerson($PersonId, $img)
    {
        $action = 'VerifyPerson';
        $data = [
            'PersonId' => $PersonId,//人员id
            'Url' => $img//图片地址
        ];

        //获取公共参数
        $Header = $this->getFaceHeader($data, $action);

        //发送请求
        return $this->PostCurl($data, $Header);
    }

    /**
     * 人脸验证
     * 给定一张人脸图片和一个 PersonId，判断图片中的人和 PersonId 对应的人是否为同一人
     * @param $PersonId
     * @param $img
     * @return mixed
     */
    public function VerifyFace($PersonId, $img)
    {
        $action = 'VerifyFace';
        $data = [
            'PersonId' => $PersonId,//人员id
            'Url' => $img//图片地址
        ];

        //获取公共参数
        $Header = $this->getFaceHeader($data, $action);

        //发送请求
        return $this->PostCurl($data, $Header);
    }


    /**
     * 人脸搜索
     * 用于对一张待识别的人脸图片，在一个或多个人员库中识别出最相似的人员列表，识别结果按照相似度从大到小排序。
     * @param $Url
     * @param array $GroupIds
     * @return mixed
     */
    public function SearchFaces($Url, $GroupIds = [])
    {
        $action = 'SearchFaces';
        $GroupIds = empty($GroupIds) ? explode(',', $this->GroupId) : $GroupIds;

        $data = [
            'GroupIds' => $GroupIds,//希望搜索的人员库ID数组
            'Url' => $Url//图片
        ];

        //获取公共参数
        $Header = $this->getFaceHeader($data, $action);

        //发送请求
        return $this->PostCurl($data, $Header);
    }

    /**
     * 人员搜索
     * 用于对一张待识别的人脸图片，在一个或多个人员库中识别出最相似的 人员列表，按照相似度从大到小排列。
     * @param $Url
     * @param array $GroupIds
     * @return mixed
     */
    public function SearchPersons($Url, $GroupIds = [])
    {
        $action = 'SearchPersons';
        $GroupIds = empty($GroupIds) ? explode(',', $this->GroupId) : $GroupIds;

        $data = [
            'GroupIds' => $GroupIds,//希望搜索的人员库ID数组
            'NeedPersonInfo' => 1,//是否返回人员具体信息。0 为关闭，1 为开启
            'Url' => $Url//图片
        ];

        //获取公共参数
        $Header = $this->getFaceHeader($data, $action);

        //发送请求
        return $this->PostCurl($data, $Header);
    }

    /**
     * 获取人脸识别公共参数
     * @param $data
     * @param $Action
     * @return array
     */
    public function getFaceHeader($data, $Action)
    {
        $service = "iai";

        $timestamp = time();//当前unix时间戳
        $algorithm = "TC3-HMAC-SHA256";//签名方法

        $httpRequestMethod = "POST";//请求方式
        $canonicalUri = "/";
        $canonicalQueryString = "";

        $canonicalHeaders = "content-type:application/json; charset=utf-8\n" . "host:" . $this->url . "\n";
        $signedHeaders = "content-type;host";
        //参数
        $Payload = json_encode($data);

        //使用hash算法计算签名
        $hashedRequestPayload = hash("SHA256", $Payload);

        $canonicalRequest = $httpRequestMethod . "\n"
            . $canonicalUri . "\n"
            . $canonicalQueryString . "\n"
            . $canonicalHeaders . "\n"
            . $signedHeaders . "\n"
            . $hashedRequestPayload;

        $date = gmdate("Y-m-d", $timestamp);
        $credentialScope = $date . "/" . $service . "/tc3_request";
        $hashedCanonicalRequest = hash("SHA256", $canonicalRequest);
        $stringToSign = $algorithm . "\n"
            . $timestamp . "\n"
            . $credentialScope . "\n"
            . $hashedCanonicalRequest;

        $secretDate = hash_hmac("SHA256", $date, "TC3" . $this->SecretKey, true);
        $secretService = hash_hmac("SHA256", $service, $secretDate, true);
        $secretSigning = hash_hmac("SHA256", "tc3_request", $secretService, true);
        $signature = hash_hmac("SHA256", $stringToSign, $secretSigning);

        //拼接签名
        $authorization = $algorithm
            . " Credential=" . $this->SecretId . "/" . $credentialScope
            . ", SignedHeaders=" . $signedHeaders . ", Signature=" . $signature;

        $Header = [
            'Content-Type: application/json; charset=utf-8',
            'Host: ' . $this->url,
            'X-TC-Action: ' . $Action,
            'X-TC-Region: ' . $this->Region,
            'X-TC-Timestamp: ' . $timestamp,
            'X-TC-Version: ' . $this->Version,
            'Authorization: ' . $authorization,
        ];

        return $Header;
    }

    /**
     * 发送PostCurl
     * @param $data
     * @param $Header
     * @return mixed
     */
    public function PostCurl($data, $Header)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://' . $this->url);
        curl_setopt($ch, CURLOPT_POST, 1); //启用POST提交
        curl_setopt($ch, CURLOPT_HTTPHEADER, $Header);//header
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//返回结果不打印
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $data = curl_exec($ch);
        curl_close($ch);

        return json_decode($data, true);
    }


}