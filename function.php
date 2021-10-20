<?php
//引入TadTools的函式庫
if (!file_exists(XOOPS_ROOT_PATH . "/modules/tadtools/tad_function.php")) {
    redirect_header("http://www.tad0616.net/modules/tad_uploader/index.php?of_cat_sn=50", 3, _TAD_NEED_TADTOOLS);
}
include_once XOOPS_ROOT_PATH . "/modules/tadtools/tad_function.php";
include_once XOOPS_ROOT_PATH . "/modules/tadtools/TadUpFiles.php";

// include_once XOOPS_ROOT_PATH . "/modules/eric_pera/function_block.php";

// $TadUpFiles = new TadUpFiles("snews");

//其他自訂的共同的函數

//學期首周一
function get_semi()
{
    global $xoopsDB;
    $myts = MyTextSanitizer::getInstance();
    $semi = [];

    $tbl1 = $xoopsDB->prefix('view_eric_dosa_semi_mon');

    $sql  = "SELECT * FROM `$tbl1` ;";
    // print_r($sql);
    // die();

    // die(var_dump($sql));
    // $sql    = "SELECT * FROM `$tbl` WHERE `sn` = '{$sn}'";
    $result         = $xoopsDB->query($sql) or web_error($sql);
    $semi = $xoopsDB->fetchArray($result);
    // list($sn, $sch_year, $sch_semi, $first_day, $recdate) = $xoopsDB->fetchrow($result);


    // print_r($sch_semi);
    // print_r($sch_year);
    // print_r($first_day);
    // die();

    // $semi['sn'] = filter_var($semi['sn'], FILTER_SANITIZE_NUMBER_INT);
    // $sch_year = (int) $sch_year;
    // $sch_semi = (int) $sch_semi;
    // $semi['$sch_year'] = (int) $semi['$sch_year'];

    // $sch_year = (int)$semi['sch_year'];
    // $sch_semi = (int)$semi['sch_semi'];
    // $sch_firstday = $semi['first_day'];

    $semi['sch_year'] = (int)$semi['sch_year'];
    $semi['sch_semi'] = (int)$semi['sch_semi'];
    // $semi['sn'] = (int)$semi['sn'];
    // $sch_firstday = $semi['first_day'];

    // print_r($sch_semi);
    // print_r($sch_year);
    // print_r($sch_firstday);

    // print_r($semi['sch_year']);
    // print_r($semi['sch_semi']);
    // print_r($semi['sn']);
    // die();


    // print_r($semi);
    // die();

    return $semi;
}

//列出全部
// function list_all()
// {
//     global $xoopsDB;
//     // $myts = MyTextSanitizer::getInstance();



// }

//檢查巡堂紀錄權限
function staff_check()
{
    global $xoopsDB, $xoopsUser;

    $myts = MyTextSanitizer::getInstance();
    $staff_check = [];

    if ($xoopsUser) {
        $now_uid = $xoopsUser->getVar('uid');
    } else {
        $now_uid = $isAdmin = "";
    }

    // $now_uid = 317;
    $tbl1 = $xoopsDB->prefix('view_eric_dosa_staffcheck');
    $sql  = "SELECT * FROM `$tbl1`  WHERE `uid`={$now_uid}";



    // die(var_dump($sql));
    // $sql    = "SELECT * FROM `$tbl` WHERE `sn` = '{$sn}'";
    $result         = $xoopsDB->query($sql) or web_error($sql);
    $staff_check = $xoopsDB->fetchArray($result);


    $staff_check['uid'] = (int) $staff_check['uid'];
    $staff_check['staff_no'] = (int) $staff_check['staff_no'];
    $staff_check['staff_name'] = filter_var($staff_check['staff_name'], FILTER_SANITIZE_SPECIAL_CHARS);
    $staff_check['job_title'] = filter_var($staff_check['job_title'], FILTER_SANITIZE_SPECIAL_CHARS);
    $staff_check['eclass'] = filter_var($staff_check['eclass'], FILTER_SANITIZE_SPECIAL_CHARS);
    $staff_check['c_class'] = filter_var($staff_check['c_class'], FILTER_SANITIZE_SPECIAL_CHARS);
    $staff_check['eric_dosa_check'] = (int) $staff_check['eric_dosa_check'];

    // print_r($staff_check);
    // die();
    // die(var_dump($eric_dosa_power_code));
    return $staff_check;
}

//檢查目前最大周別
function act_weeks()
{
    global $xoopsDB;

    $myts = MyTextSanitizer::getInstance();


    // $uid = $xoopsUser->getVar('uid');
    $tbl1 = $xoopsDB->prefix('view_eric_dosa_weeks');
    $sql  = "SELECT * FROM `$tbl1` ";



    // die(var_dump($sql));
    // $sql    = "SELECT * FROM `$tbl` WHERE `sn` = '{$sn}'";
    $result         = $xoopsDB->query($sql) or web_error($sql);
    // $act_weeks = $xoopsDB->fetchArray($result);

    // print_r($act_weeks);
    // die();
    $all_wks = [];
    while ($act_weeks = $xoopsDB->fetchArray($result)) {
        $act_weeks['weeks'] = (int) $act_weeks['weeks'];


        $all_wks[] = $act_weeks;
    }
    // print_r($all_wks);
    // die();



    return  $all_wks;
}

//確認登入
function logged()
{
    global  $xoopsUser;
    $uid = ($xoopsUser) ? $xoopsUser->uid() : 0;
    return $uid;
}
//interface_menu.php



// $eric_dosa_power      = pera_power_check();
// $eric_dosa_power_code = (int) $eric_dosa_power['power_code'];
// $eric_dosa_staff_code = (int) $eric_dosa_power['staff_code'];
//判斷是否對該模組有管理權限
// if (!isset($_SESSION['eric_dosa_Admin'])) {
//     $_SESSION['eric_dosa_Admin'] = ($xoopsUser) ? $xoopsUser->isAdmin() : false;
// }

//判斷是否模組有巡堂權限
// if (!isset($_SESSION['eric_dosa_group'])) {

//     $_SESSION['eric_dosa_group'] = $eric_dosa_power_code ? isset($eric_dosa_power_code) : false;

// }

//判斷是否有班級導權限
// if (!isset($_SESSION['eric_dosaAdmin'])) {
//     $_SESSION['eric_dosaAdmin'] = ($xoopsUser) ? $xoopsUser->isAdmin() : false;
// }

// 回模組首頁
$interface_menu[_TAD_TO_MOD] = "index.php";
$interface_icon[_TAD_TO_MOD] = "";

$interface_menu['秩序紀錄'] = "index.php?op=eric_dosa_be_list";
$interface_icon['秩序紀錄'] = "";

$interface_menu['整潔紀錄'] = "index.php?op=eric_dosa_tidy_list";
$interface_icon['整潔紀錄'] = "";

//模組後台
// if (power_chk("", 1)) {
//     $interface_menu['巡堂紀錄'] = "index.php?op=eric_dosa";
//     $interface_icon['巡堂紀錄'] = "";

// }

// die(var_dump($_SESSION['eric_dosa_group']));

if ($_SESSION['eric_dosa_Admin']) {
    $interface_menu[_TAD_TO_ADMIN] = "admin/main.php";
    $interface_icon[_TAD_TO_ADMIN] = "";
}
