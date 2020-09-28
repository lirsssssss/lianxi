<?php
//迭代器 ArrayIterator
$fruits = array(
    'apple'=>'apple value',
    'orange'=>'orange value',
    'grape'=>'grape value',
    'plum'=>'plum value',
);

print_r($fruits);

echo "*** use fruits directly \n";

foreach ($fruits as $key=>$val){
    echo $key . ":" . $val . "\n";
}

//使用 ArrayIterator遍历数组
$obj = new ArrayObject($fruits);
$it = $obj->getIterator();
echo "*** use ArrayIterator directly \n";

foreach ($it as $key=>$val){
    echo $key . ":" . $val . "\n";
}

echo "*** use ArrayIterator directly \n";
$it->rewind();
while ($it->valid()){
    echo $it->key() . ":" . $it->current() . "\n";
    $it->next();
}

//跳过某些元素进行打印
echo "*** use seek before while \n";

$it->rewind();

if ($it->valid()){
    $it->seek(1);
    while ($it->valid()){
        echo $it->key() . ":" . $it->current() . "\n";
        $it->next();
    }
}

echo "*** use ksort  \n";
$it->ksort();////对key 进行字典序排序
foreach ($it as $key=>$val){
    echo $key . ":" . $val . "\n";
}

echo "*** use asort  \n";
$it->asort();//对值value 进行字典序排序
foreach ($it as $key=>$val){
    echo $key . ":" . $val . "\n";
}


