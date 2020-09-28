<?php
//定义autoload函数 可以不再调用spl_autoload_register函数的情况下完成类的装载
function __autoload($class_name){
    echo "__autoload class: ". $class_name . "\n";
    require_once("libs/".$class_name.'.php');//类装载
}

//new Test();

//定义一个替换__autoload函数的类文件装载函数
function ClassLoader($class_name){
    echo "ClassLoader() load class: ". $class_name . "\n";
    require_once("libs/".$class_name.'.php');
}

//传入定义好的装载类的函数的名称替换  autoload函数
spl_autoload_register('ClassLoader');
new Test();








