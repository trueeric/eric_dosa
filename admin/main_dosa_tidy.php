<?php
/*-----------引入檔案區--------------*/
$xoopsOption['template_main'] = "eric_dosa_tidy_adm_main.tpl";
include_once "header.php";
include_once "../function.php";

/*-----------function區--------------*/

//顯示預設頁面內容
function eric_dosa_tidy_list()
{
    global $xoopsTpl;

    $main = "後台頁面";

    // var_dump($main);
    $xoopsTpl->assign('content', $main);
}

/*-----------執行動作判斷區----------*/
include_once $GLOBALS['xoops']->path('/modules/system/include/functions.php');
$op = system_CleanVars($_REQUEST, 'op', '', 'string');
// $sn = system_CleanVars($_REQUEST, 'sn', 0, 'int');

// var_dump($op);
// die();

switch ($op) {

    default:
        eric_dosa_tidy_list();
        $op = 'eric_dosa_tidy_list';
        break;
}
// var_dump($op);
$xoopsTpl->assign('op', $op);
include_once 'footer.php';
