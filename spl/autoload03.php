<?php

//定义一个替换__autoload函数的类文件装载函数
function ClassLoader($class_name){
    echo "ClassLoader() load class: ". $class_name . "\n";
    set_include_path("libs/");
    //当不应require或者require_one载入类文件的时候,而想通过系统查找include_path来装载类时,
    //必须显式调用spl_autoload函数,参数是类的名称来重启类文件的自动查找(装载
    spl_autoload($class_name);
}

//传入定义好的装载类的函数的名称替换  autoload函数
spl_autoload_register('ClassLoader');
new Test();