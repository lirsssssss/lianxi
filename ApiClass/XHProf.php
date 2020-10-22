<?php
/**
 * xhport php功能级别分层性能分析器 使用需要下载xhporf扩展 
 * 下载地址: pecl.php.net/package/xhprof
 * 它能够报告功能级别的调用时间，内存使用情况，CPU时间和每个功能的呼叫次数。
 * 此外，它还支持比较两个运行（分层DIFF报告）的能力，或多个运行的聚合结果。”
 * Function Name：方法名称。
 * Calls：方法被调用的次数。
 * Calls%：方法调用次数在同级方法总数调用次数中所占的百分比。
 * Incl.Wall Time(microsec)：方法执行花费的时间，包括子方法的执行时间。（单位：微秒）
 * IWall%：方法执行花费的时间百分比。
 * Excl. Wall Time(microsec)：方法本身执行花费的时间，不包括子方法的执行时间。（单位：微秒）
 * EWall%：方法本身执行花费的时间百分比。
 * Incl. CPU(microsecs)：方法执行花费的CPU时间，包括子方法的执行时间。（单位：微秒）
 * ICpu%：方法执行花费的CPU时间百分比。
 * Excl. CPU(microsec)：方法本身执行花费的CPU时间，不包括子方法的执行时间。（单位：微秒）
 * ECPU%：方法本身执行花费的CPU时间百分比。
 * Incl.MemUse(bytes)：方法执行占用的内存，包括子方法执行占用的内存。（单位：字节）
 * IMemUse%：方法执行占用的内存百分比。
 * Excl.MemUse(bytes)：方法本身执行占用的内存，不包括子方法执行占用的内存。（单位：字节）
 * EMemUse%：方法本身执行占用的内存百分比。
 * Incl.PeakMemUse(bytes)：Incl.MemUse峰值。（单位：字节）
 * IPeakMemUse%：Incl.MemUse峰值百分比。
 * Excl.PeakMemUse(bytes)：Excl.MemUse峰值。单位：（字节）
 * EPeakMemUse%：Excl.MemUse峰值百分比。
 */


class XHPort
{

    /**
     * 引入以下两个库文件,可以单独拷贝,这里使用路径方式
     * XHPort constructor.
     */
    public function __construct()
    {
        include_once "/home/software/xhprof/xhprof_lib/utils/xhprof_lib.php";
        include_once "/home/software/xhprof/xhprof_lib/utils/xhprof_runs.php";
    }

    /**
     * 启用xhprof性能分析器
     * XHPROF_FLAGS_CPU值cpu分析 XHPROF_FLAGS_MEMORY指内存分析
     */
    public function enable()
    {
        xhprof_enable(XHPROF_FLAGS_CPU + XHPROF_FLAGS_MEMORY);
    }

    /**
     * 实例化类并且保存分析的结果文件 文件地址在php.ihi中配置
     * xhprof.output_dir = dir
     * @param $title
     */
    public function disable($title)
    {
        $objXhprofRun = new \XHProfRuns_Default();
        $objXhprofRun->save_run(xhprof_disable(), $title);
    }

    /**

    */

}





