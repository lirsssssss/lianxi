<?php
/**
 * xhport php功能级别分层性能分析器 使用需要下载xhporf扩展 
 * 下载地址: pecl.php.net/package/xhprof
 * 它能够报告功能级别的调用时间，内存使用情况，CPU时间和每个功能的呼叫次数。
 * 此外，它还支持比较两个运行（分层DIFF报告）的能力，或多个运行的聚合结果。”
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

}





