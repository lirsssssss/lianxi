<?php

define('BASEDIR',__DIR__);

include BASEDIR.'/Mooc/Loader.php';
spl_autoload_register('\\Mooc\\Loader::autoload');

//自动加载配置类
$config = new \Mooc\Config(__DIR__.'/configs');
var_dump($config['controller']['home']);


//代理模式 在客户端与实体之间建立一个代理对象 客户端对实体进行操作全部委派给代理对象 隐藏实体具体实现细节
//$proxy = new \Mooc\Proxy();
//$proxy->getUserName(1);
//$proxy->setUserName(1,$proxy);

//迭代器模式 再不需要了解内部实现的前提下, 遍历一个聚合对象的内部元素
//$users = new \Mooc\AllUser();
//foreach ($users as $user)
//{
//    var_dump($user->uid);
//    $user->cn_round = rand(10000,99999);
//}

//装饰器模式 可以动态的添加修改类的功能 (和观察者模式类似
//$canvas = new \Mooc\Canvas();
//$canvas->init();
//$canvas->addDecorator(new \Mooc\ColorDrawDecorator('black'));
//$canvas->addDecorator(new \Mooc\SizeDrawDecorator('20px'));
//$canvas->rect(3,6,4,12);
//$canvas->draw();


//原型模式
//$canvas = new \Mooc\Canvas();
////只需要构建一个原型对象
//$canvas->init();
//
////clone 直接生成一个新对象
//$canvas1 = clone $canvas;
//$canvas1->rect(3,6,4,12);
//$canvas1->draw();
//
//echo '------------';
//$canvas2 = clone $canvas;
//$canvas2->rect(3,6,4,12);
//$canvas2->draw();

//观察者模式
//$event = new \Mooc\Event();
//$event->addObserver(new \Mooc\Observer1());
////$event->addObserver(new \Mooc\Observer2());
//$event->trigger();

//复杂映射模式 结合工厂 注册树模式
//class Page
//{
//    function index()
//    {
//        $user = \Mooc\Factory::getUser(1);
//        $user->username = 'adminw1';
//
//        $this->test();
//    }
//
//    function test()
//    {
//        $user = \Mooc\Factory::getUser(1);
//
//        $user->pwd = 'req2321';
//
//    }
//}
//
//$page = new Page();
//$page->index();

//简单 数据对象映射模式
//$user = new \Mooc\User(1);
////var_dump($user->uid,$user->username,$user->pwd,$user->time);die();
//$user->username = 'admin123';
//$user->pwd = '123123';
//$user->time = time();


////策略模式
//class Page
//{
//    /**
//     * @var \Mooc\UserStrategy
//     */
//    protected $strategy;
//
//    function index()
//    {
//        echo "AD";
//        $this->strategy->showAd();
//        echo "<br>";
//        echo "Category";
//        $this->strategy->showCategory();
//
//    }
//
//    //暴露在外部的方法 外部设置策略
//    function setStrategy(\Mooc\UserStrategy $strategy)
//    {
//        $this->strategy = $strategy;
//    }
//}
//$page = new Page();
//if (isset($_GET['female'])) {
//    $strategy = new \Mooc\MaleUserStrategy();
//}else{
//    $strategy = new \Mooc\FemaleUserStrategy();
//}
//$page->setStrategy($strategy);
//$page->index();
//适配器模式
//$db = new \Mooc\Database\PDO();
//$b = $db->connect("localhost","root","root","lhfei");
//$a = $db->query("select * from `user`");
//$db->close();

//注册树模式
//$db1 = \Mooc\Factory::createDatebase();
//$db1->where("id = 1");


//单例模式 无论访问多少次只会实例化一次对象
//$db = \Mooc\Database::getInstance();


//工厂模式
//$db = \Mooc\Factory::createDatebase();

//魔术方法
//$obj = new \Mooc\Obj();
//__get __set
//$obj->title = "hello";
//echo $obj->title;

//__call
//echo $obj->test("hello",123);
//__callStatic
//echo \Mooc\Obj::test("hello",123);
//__toString
//echo $obj;
//__invoke
//echo $obj("test");

//链式操作
//$db = new Mooc\Database();
//$db->where("id=1")->where("name=2")->order("id desc")->limit(10);



//栈 先进后出
//$stack = new SplStack();
//$stack->push("data1\n");
//$stack->push("data2\n");
//
//echo $stack->pop();
//echo $stack->pop();

//队列 先进先出
//$queue = new SplQueue();
//$queue->enqueue("data1\n");
//$queue->enqueue("data2\n");
//
//echo $queue->dequeue();
//echo $queue->dequeue();

//堆 存取随意 没有先进先出或者先进后出的说法
//$heap = new SplMinHeap();
//$heap->insert("data1\n");
//$heap->insert("data2\n");
//
//echo $heap->extract();
//echo $heap->extract();

//固定尺寸数组 无论有没有都会有键值空间
//$array = new SplFixedArray(10);
//
//$array[0] = 123;
//$array[9] = 123;
//
//var_dump($array);