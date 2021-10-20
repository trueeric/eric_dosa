<?php
/*-----------引入檔案區--------------*/
include_once "header.php";
$xoopsOption['template_main'] = "eric_dosa_index.tpl";
include_once XOOPS_ROOT_PATH . "/header.php";
// include_once "function.php";

/*-----------function區--------------*/

// function eric_dosa_list()
// {
//     // global $xoopsTpl;

//     // $main = "後台頁面123456";
//     // $xoopsTpl->assign('content', $main);

//     global $xoopsTpl;

//     $main = "後台頁面";

//     // var_dump($main);
//     $xoopsTpl->assign('content', $main);
// }


//顯示預設頁面內容
//巡堂紀錄
function eric_dosa_list()
{
    global $xoopsTpl, $xoopsDB, $xoopsUser, $xoopsModuleConfig;

    // $eric_dosa_power      = pera_power_check();
    // $eric_dosa_power_code = (int) $eric_dosa_power['power_code'];
    // $eric_dosa_staff_code = (int) $eric_dosa_power['staff_code'];

    //測試資料
    $eric_dosa_power_code = 5;
    $eric_dosa_staff_code = 13;

    // die(var_dump($eric_dosa_power_code, $eric_dosa_staff_code));

    // $where_string = ($eric_dosa_power_code < 7) ? "where 1 " : " where 0";

    $myts = MyTextSanitizer::getInstance();

    $tbl = $xoopsDB->prefix('eric_dosa_content');
    // $uid = $xoopsUser->uid();
    // $and_uid = $_SESSION['isAdmin'] ? "and `uid`='$uid'" : '';
    // die(var_dump($uid));
    //依條件篩選資料

    if ($eric_dosa_power_code < 7) {
        $sql = "SELECT * FROM $tbl WHERE `std_no` is not null and `std_name` is not null   ORDER BY `rec_date` ,`period` ";
    } elseif ($eric_dosa_power_code = 7) {
        $sql = "SELECT * FROM $tbl WHERE `std_no` is not null and `std_name` is not null and `staff_no` =  '$eric_dosa_staff_code'   ORDER BY `rec_date` ,`period` ";
    } else {
        $sql = "";
    }

    // die(var_dump($sql));

    //getPageBar($原sql語法, 每頁顯示幾筆資料, 最多顯示幾個頁數選項);
    $PageBar = getPageBar($sql, $xoopsModuleConfig['show_num'], 8);
    $bar     = $PageBar['bar'];
    $sql     = $PageBar['sql'];
    $total   = $PageBar['total'];

    $result = $xoopsDB->query($sql) or web_error($sql);
    // die(var_dump($sql));
    $all = array();
    while ($eric_dosa_content = $xoopsDB->fetchArray($result)) {
        //$eric_dosa_content['std_no']  = $myts->displayTarea($eric_dosa_content['std_no'], 1, 0, 0, 0, 0);
        $eric_dosa_content['std_no']      = $myts->htmlSpecialChars($eric_dosa_content['std_no']);
        $eric_dosa_content['std_name']    = $myts->htmlSpecialChars($eric_dosa_content['std_name']);
        $eric_dosa_content['pera_staff']  = $myts->htmlSpecialChars($eric_dosa_content['pera_staff']);
        $eric_dosa_content['rec_date']    = $myts->htmlSpecialChars($eric_dosa_content['rec_date']);
        $eric_dosa_content['period']      = $myts->htmlSpecialChars($eric_dosa_content['period']);
        $eric_dosa_content['eclass']      = $myts->htmlSpecialChars($eric_dosa_content['eclass']);
        $eric_dosa_content['behavior']    = $myts->htmlSpecialChars($eric_dosa_content['behavior']);
        $eric_dosa_content['c_class']     = $myts->htmlSpecialChars($eric_dosa_content['c_class']);
        $eric_dosa_content['freq']        = $myts->htmlSpecialChars($eric_dosa_content['freq']);
        $eric_dosa_content['cls_tr_name'] = $myts->htmlSpecialChars($eric_dosa_content['cls_tr_name']);

        $all[] = $eric_dosa_content;
    }

    $xoopsTpl->assign('all', $all);
    $xoopsTpl->assign('bar', $bar);
    $xoopsTpl->assign('total', $total);
}

/*-----------執行動作判斷區----------*/
include_once $GLOBALS['xoops']->path('/modules/system/include/functions.php');
$op = system_CleanVars($_REQUEST, 'op', '', 'string');

// $sn = system_CleanVars($_REQUEST, 'sn', 0, 'int');
// die(var_dump($op));
// die($op);

switch ($op) {

        // case "eric_dosa_cls_tr":
        //     eric_dosa_cls_list();
        //     $op = 'eric_dosa_cls_list';
        //     break;

    default:
        eric_dosa_list();
        $op = 'eric_dosa_list';
        //$xoopsTpl->assign('content', $main);

        break;
}

/*-----------秀出結果區--------------*/

// die(var_dump($op));
// var_dump($main);
$xoopsTpl->assign('op', $op);
$xoopsTpl->assign("toolbar", toolbar_bootstrap($interface_menu));
// include_once 'footer.php';
include_once XOOPS_ROOT_PATH . '/footer.php';

// /*-----------秀出結果區--------------*/
// $xoopsTpl->assign('op', $op);
// $xoopsTpl->assign("toolbar", toolbar_bootstrap($interface_menu));
// include_once XOOPS_ROOT_PATH . '/footer.php';
