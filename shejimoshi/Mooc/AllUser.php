<?php
/**
 * Created by PhpStorm.
 * User: Hongfei
 * Date: 2019/10/30
 * Time: 下午3:00
 */

namespace Mooc;


class AllUser implements  \Iterator
{
    protected $ids;
    protected $data = array();
    protected $index;

    function __construct()
    {
        $db = Factory::getDatabase();
        $result = $db->query("select uid from user");
        $this->ids = $result->fetch_all(MYSQLI_ASSOC);

    }

    //返回当前元素
    function current()
    {
        // TODO: Implement current() method.
        $id = $this->ids[$this->index]['uid'];
        return Factory::getUser($id);
    }

    //移向下一个元素
    function next()
    {
        // TODO: Implement next() method.
        $this->index ++;
    }

    //检查当前位置的有效性
    function valid()
    {
        // TODO: Implement valid() method.
        return $this->index < count($this->ids);
    }

    //重新回到第一个元素
    function rewind()
    {
        // TODO: Implement rewind() method.
        $this->index = 0;
    }

    //返回当前元素的键
    public function key()
    {
        // TODO: Implement key() method.
        return $this->index;
    }


}