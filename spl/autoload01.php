<?php

//设置autoload寻找php定义的类文件的扩展名,多个扩展名用都好分隔 前面的扩展名优先被匹配
spl_autoload_extensions('.class.php,.php');
//设置autoload寻找php定义的类文件的目录, 多个目录用PATH_SEPARATOR进行分隔
set_include_path(get_include_path().PATH_SEPARATOR."libs/");
spl_autoload_register();//提示php使用autoload机制查找类定义

new Test();