<?php  
echo '  
<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:w="urn:schemas-microsoft-com:office:word" xmlns="http://www.w3.org/TR/REC-html40">  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>  
<xml><w:WordDocument><w:View>Print</w:View></xml>  
</head>';  
echo '<body>  
<h1 style="text-align: center">xxx的简历</h1>  
<h3>编号：000001</h3>  
<table border="1" cellpadding="3" cellspacing="0" >  
<tr >  
<td width="93" valign="center" colspan="2" >姓名</td>  
<td width="160" valign="center" colspan="4" >xxx</td>  
<td width="89" valign="center" colspan="2" >学历</td>  
<td width="156" valign="center" colspan="3" >xxx</td>  
<td width="125" colspan="2" rowspan="4" align="center" valign="middle" ><!--<img src="" width="120" height="120" />--></td>  
</tr>  
<tr >  
<td width="93" valign="center" colspan="2" >性别</td>  
<td width="72" valign="center" colspan="2" >xxx</td>  
<td width="88" valign="center" colspan="2" >出生年月</td>  
<td width="89" valign="center" colspan="2" >xxx</td>  
<td width="68" valign="center" >户籍地</td>  
<td width="87" valign="center" colspan="2" >xxx</td>  
</tr>  
<tr >  
<td width="93" valign="center" colspan="2" >身高</td>  
<td width="72" valign="center" colspan="2" >xxxcm</td>  
<td width="88" valign="center" colspan="2" >体重</td>  
<td width="89" valign="center" colspan="2" >xxxkg</td>  
<td width="68" valign="center" >婚姻状况</td>  
<td width="87" valign="center" colspan="2" >xxx</td>  
</tr>  
<tr >  
<td width="93" valign="center" colspan="2" >手机</td>  
<td width="160" valign="center" colspan="4" >xxx</td>  
<td width="89" valign="center" colspan="2" >Email</td>  
<td width="156" valign="center" colspan="3" >xxx</td>  
</tr>  
<tr >  
<td width="93" valign="center" colspan="2"  style="width:93px;">家庭住址</td>  
<td width="530" valign="center" colspan="11" >xxx</td>  
</tr>  
<tr >  
<td width="93" valign="center" colspan="2" rowspan="3">求职意向</td>  
<td width="93" valign="center" colspan="2">希望从事职业</td>  
<td width="200" valign="center" colspan="2">xxx</td>  
<td width="93" valign="center" colspan="2">希望薪资</td>  
<td width="200" valign="center" colspan="5">xxx元/月</td>  
</tr>  
<tr>  
<td width="93" valign="center" colspan="2" >希望工作地区</td>  
<td width="200" valign="center" colspan="2" >xxx</td>  
<td width="93" valign="center" colspan="2" >食宿要求</td>  
<td width="200" valign="center" colspan="5" >xxx</td>  
</tr>  
<tr>  
<td width="93" valign="center" colspan="2" >目前状况</td>  
<td width="200" valign="center" colspan="9" >xxx</td>  
</tr>  
<tr>  
<td width="93" valign="center" >自我评价</td>  
<td width="570" valign="center" colspan="12" >xxx</td>  
</tr>  
<tr>  
<td width="93" valign="center" >工作经历</td>  
<td width="570" valign="center" colspan="12" >xxx</td>  
</tr>  
<tr>  
<td width="93" valign="center" >教育经历</td>  
<td width="570" valign="center" colspan="12" >xxx</td>  
</tr>  
<tr>  
<td width="93" valign="center" >培训经历</td>  
<td width="570" valign="center" colspan="12" >xxx</td>  
</tr>  
</table>  
</body>';  
$wordStr = file_get_contents("index". ".html");
ob_start(); //打开缓冲区  
header("Cache-Control: public");  
Header("Content-type: application/octet-stream");  
Header("Accept-Ranges: bytes");  
if (strpos($_SERVER["HTTP_USER_AGENT"],'MSIE')) {  
header('Content-Disposition: attachment; filename=test.doc');  
}else if (strpos($_SERVER["HTTP_USER_AGENT"],'Firefox')) {  
Header('Content-Disposition: attachment; filename=test.doc');  
} else {  
header('Content-Disposition: attachment; filename=test.doc');  
}  
header("Pragma:no-cache");  
header("Expires:0");  
ob_end_flush();//输出全部内容到浏览器  