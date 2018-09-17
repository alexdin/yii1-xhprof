<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 17.09.18
 * Time: 16:23
 */

class Xhprof
{

    public static $path = '/var/www/html';

    public static function begin()
    {
        xhprof_enable(XHPROF_FLAGS_CPU + XHPROF_FLAGS_MEMORY);
    }


    public static function end()
    {
        $xhprof_data = xhprof_disable();
        include_once static::$path . "/xhprof-0.9.4/xhprof_lib/utils/xhprof_lib.php";
        include_once static::$path . "/xhprof-0.9.4/xhprof_lib/utils/xhprof_runs.php";
        $xhprof_runs = new XHProfRuns_Default();
        $run_id = $xhprof_runs->save_run($xhprof_data, "test");
    }
}