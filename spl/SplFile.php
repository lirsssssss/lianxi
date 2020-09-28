<?php
$file = new SplFileInfo("Countable.php");

echo "File is Created at". date("Y-m-d H:i:s",$file->getCTime());
echo "File is modified at". date("Y-m-d H:i:s",$file->getMTime());
echo "File is size at".$file->getSize()."bytes\n";

//读取文件里面的内容
$fileObj = $file->openFile("r");
while ($fileObj->valid()){
    //fgets函数获取文件里面的一行数据
    echo $fileObj->fgets();
}
$fileObj = null;
$file = null;




