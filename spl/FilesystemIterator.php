<?php

$it = new FilesystemIterator('.');//参数是目录
foreach ($it as $key=>$value){
    printf("%s\t%s\t%8s\t%s\n",
        date("Y-m-d H:i:s",$value->getMTime()),
        $value->isDir() ? "<DIR>": "",
        number_format($value->getSize()),
        $value->getFileName()
        );
}






