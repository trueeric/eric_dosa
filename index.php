<?php
/*-----------引入檔案區--------------*/
include_once "header.php";
$xoopsOption['template_main'] = "eric_dosa_index.tpl";
include_once XOOPS_ROOT_PATH . "/header.php";
include_once $GLOBALS['xoops']->path('/modules/system/include/functions.php');

/*-----------function區--------------*/

//顯示預設頁面內容
//細項列表_篩選_班級_周
function eric_dosa_list($weeks, $eclass_t)
{
    global $xoopsTpl, $xoopsDB, $xoopsUser, $xoopsModuleConfig;

    // print_r('weeks:' . $weeks);
    // print_r('eclass:' . $eclass);
    // die();

    $weeks    = (int) $weeks;
    $eclass_t = filter_var($eclass_t, FILTER_SANITIZE_SPECIAL_CHARS);
    $grade_t  = substr($eclass_t, 0, 2);

    //from staff_check()
    $staff_check = staff_check();
    $power_chk   = (int) $staff_check['eric_dosa_check'];
    $staff_no    = (int) $staff_check['staff_no'];
    $uid         = (int) $staff_check['uid'];
    $eclass      = filter_var($staff_check['eclass'], FILTER_SANITIZE_SPECIAL_CHARS);
    $grade       = filter_var($staff_check['grade'], FILTER_SANITIZE_SPECIAL_CHARS);

    $myts = MyTextSanitizer::getInstance();

    $tbl = $xoopsDB->prefix('view_eric_dosa_content');
    if ($power_chk <= 7) {
        $and_txt = ($weeks == 0) ? 1 : "  `weeks`={$weeks}  and `eclass`='{$eclass_t}'";
    } elseif ($power_chk == 9) {
        if ($weeks !== 0 && $grade === $grade_t) {
            $and_txt = "  `weeks`={$weeks}  and `eclass`='{$eclass_t}'";
        } else {
            $and_txt = " `grade`='{$grade}'";
        }
    } elseif ($power_chk == 11) {
        $and_txt = ($weeks == 0) ? " `eclass`='{$eclass}'" : "  `weeks`={$weeks}  and `eclass`='{$eclass}'";

    }

    //where 條件合併
    // $and_txt =$and_weeks . $and_power_chk;
    // print_r('and_txt:' . $and_txt);
    // die();
    //依條件篩選資料
    // $eeclass = 'H101';
    // $power_con = " `cate_no`=4 and `eclass`='{$eeclass}'";
    // $power_con = 1;

    $sql = "SELECT * FROM `$tbl` where {$and_txt} ";

    // if ($power_code < 7) {
    //     $sql = "SELECT * FROM `$tbl` WHERE `std_no` is not null and `std_name` is not null   ORDER BY `rec_date` ,`period` ";
    // } elseif ($power_code = 7) {
    //     $sql = "SELECT * FROM `$tbl` WHERE `std_no` is not null and `std_name` is not null and `staff_no` =  '{$staff_code}'   ORDER BY `rec_date` ,`period` ";
    // } else {
    //     $sql = "";
    // }

    // print_r($eeclass);
    // print_r($power_con);
    // print_r($sql);
    // die();

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
        $eric_dosa_content['sn']         = (int) ($eric_dosa_content['sn']);
        $eric_dosa_content['std_no']     = $myts->htmlSpecialChars($eric_dosa_content['std_no']);
        $eric_dosa_content['std_name']   = ($eric_dosa_content['seat'] == 0) ? "" : $myts->htmlSpecialChars($eric_dosa_content['std_name']);
        $eric_dosa_content['staff_name'] = $myts->htmlSpecialChars($eric_dosa_content['staff_name']);
        $eric_dosa_content['item_date']  = $myts->htmlSpecialChars($eric_dosa_content['item_date']);
        $eric_dosa_content['period']     = $myts->htmlSpecialChars($eric_dosa_content['period']);
        $eric_dosa_content['eclass']     = $myts->htmlSpecialChars($eric_dosa_content['eclass']);
        $eric_dosa_content['item_txt']   = $myts->htmlSpecialChars($eric_dosa_content['item_txt']);
        $eric_dosa_content['c_class']    = $myts->htmlSpecialChars($eric_dosa_content['c_class']);
        $eric_dosa_content['item_freq']  = (int) ($eric_dosa_content['item_freq']);
        $eric_dosa_content['score_s']    = filter_var($eric_dosa_content['score_s'], FILTER_VALIDATE_FLOAT);

        $all[] = $eric_dosa_content;
    }

    // print_r($act_weeks);
    // die();

    $xoopsTpl->assign('all', $all);
    $xoopsTpl->assign('bar', $bar);
    $xoopsTpl->assign('total', $total);
}

//類別統計_周_班
function cate_counts_list($weeks, $eclass_t)
{
    global $xoopsTpl, $xoopsDB, $xoopsUser, $xoopsModuleConfig;

    $weeks    = (int) $weeks;
    $eclass_t = filter_var($eclass_t, FILTER_SANITIZE_SPECIAL_CHARS);

    //from staff_check()
    $staff_check = staff_check();
    $power_chk   = (int) $staff_check['eric_dosa_check'];
    // $staff_no    = (int) $staff_check['staff_no'];
    // $uid         = (int) $staff_check['uid'];
    $eclass = filter_var($staff_check['eclass'], FILTER_SANITIZE_SPECIAL_CHARS);
    $grade  = filter_var($staff_check['grade'], FILTER_SANITIZE_SPECIAL_CHARS);

    // 測試資料
    // $eric_dosa_check = 2;
    // $eric_dosa_staff_code = 139;

    // print_r($power_chk);
    // print_r('$weeks:' . $weeks);
    // die();
    // $where_string = ($power_code < 7) ? "where 1 " : " where 0";

    $myts = MyTextSanitizer::getInstance();

    $tbl = $xoopsDB->prefix('view_eric_dosa_cate_counts');
    // $uid = $xoopsUser->uid();
    // $and_uid = $_SESSION['isAdmin'] ? "and `uid`='{$uid}'" : '';

    // $and_weeks=($weeks == 0) ?   "" : "  `weeks`={$weeks} " ;

    if ($power_chk <= 7) {
        $and_txt = ($weeks == 0) ? 1 : "  `weeks`={$weeks} ";
    } elseif ($power_chk == 9) {
        $and_txt = ($weeks == 0) ? " `grade`='{$grade}'" : "  `weeks`={$weeks}  and `grade`='{$grade}'";
    } elseif ($power_chk == 11) {
        $and_txt = ($weeks == 0) ? " `eclass`='{$eclass}'" : "  `weeks`={$weeks}  and `eclass`='{$eclass}'";

    }

    //where 條件合併
    // $and_txt =$and_weeks . $and_power_chk;
    // print_r('and_txt:' . $and_txt);
    // die();
    //依條件篩選資料
    // $eeclass = 'H101';
    // $power_con = " `cate_no`=4 and `eclass`='{$eeclass}'";
    // $power_con = 1;

    $sql = "SELECT * FROM `$tbl` where {$and_txt} ";

    // if ($power_code < 7) {
    //     $sql = "SELECT * FROM `$tbl` WHERE `std_no` is not null and `std_name` is not null   ORDER BY `rec_date` ,`period` ";
    // } elseif ($power_code = 7) {
    //     $sql = "SELECT * FROM `$tbl` WHERE `std_no` is not null and `std_name` is not null and `staff_no` =  '{$staff_code}'   ORDER BY `rec_date` ,`period` ";
    // } else {
    //     $sql = "";
    // }

    // print_r($eeclass);
    // // print_r($power_con);
    // print_r($sql);
    // die();
    //getPageBar($原sql語法, 每頁顯示幾筆資料, 最多顯示幾個頁數選項);
    $PageBar = getPageBar($sql, $xoopsModuleConfig['show_num'], 8);
    $bar     = $PageBar['bar'];
    $sql     = $PageBar['sql'];
    $total   = $PageBar['total'];

    $result = $xoopsDB->query($sql) or web_error($sql);
    // die(var_dump($sql));
    $all = [];
    while ($eric_dosa_cate_counts = $xoopsDB->fetchArray($result)) {
        //$eric_dosa_cate_counts['std_no']  = $myts->displayTarea($eric_dosa_cate_counts['std_no'], 1, 0, 0, 0, 0);
        $eric_dosa_cate_counts['weeks']  = (int) ($eric_dosa_cate_counts['weeks']);
        $eric_dosa_cate_counts['eclass'] = $myts->htmlSpecialChars($eric_dosa_cate_counts['eclass']);
        $eric_dosa_cate_counts['1']      = (int) ($eric_dosa_cate_counts['1']);
        $eric_dosa_cate_counts['2']      = (int) ($eric_dosa_cate_counts['2']);
        $eric_dosa_cate_counts['3']      = (int) ($eric_dosa_cate_counts['3']);
        $eric_dosa_cate_counts['4']      = (int) ($eric_dosa_cate_counts['4']);
        $eric_dosa_cate_counts['5']      = (int) ($eric_dosa_cate_counts['5']);
        $eric_dosa_cate_counts['21']     = (int) ($eric_dosa_cate_counts['21']);
        $eric_dosa_cate_counts['22']     = (int) ($eric_dosa_cate_counts['22']);

        $all[] = $eric_dosa_cate_counts;
    }

    // print_r($all);
    // die();

    //引入實際有記錄的周
    $all_wks = act_weeks();
    // print_r($all_wks);
    // die();

    $xoopsTpl->assign('all_wks', $all_wks);
    $xoopsTpl->assign('all', $all);
    $xoopsTpl->assign('bar', $bar);
    $xoopsTpl->assign('total', $total);
}

//類別統計_年級
function cate_counts_list_grade()
{
    global $xoopsTpl, $xoopsDB;

    $myts = MyTextSanitizer::getInstance();

    $tbl = $xoopsDB->prefix('view_eric_dosa_cate_counts_grade');

    $power_con = 1;

    $sql = "SELECT * FROM `$tbl` where {$power_con} ";

    $result = $xoopsDB->query($sql) or web_error($sql);
    $all    = [];
    while ($eric_dosa_cate_counts_grade = $xoopsDB->fetchArray($result)) {
        //$eric_dosa_cate_counts_grade['std_no']  = $myts->displayTarea($eric_dosa_cate_counts_grade['std_no'], 1, 0, 0, 0, 0);

        $eric_dosa_cate_counts_grade['grade'] = $myts->htmlSpecialChars($eric_dosa_cate_counts_grade['grade']);
        $eric_dosa_cate_counts_grade['1']     = (int) ($eric_dosa_cate_counts_grade['1']);
        $eric_dosa_cate_counts_grade['2']     = (int) ($eric_dosa_cate_counts_grade['2']);
        $eric_dosa_cate_counts_grade['3']     = (int) ($eric_dosa_cate_counts_grade['3']);
        $eric_dosa_cate_counts_grade['4']     = (int) ($eric_dosa_cate_counts_grade['4']);
        $eric_dosa_cate_counts_grade['5']     = (int) ($eric_dosa_cate_counts_grade['5']);
        $eric_dosa_cate_counts_grade['21']    = (int) ($eric_dosa_cate_counts_grade['21']);
        $eric_dosa_cate_counts_grade['22']    = (int) ($eric_dosa_cate_counts_grade['22']);

        $all[] = $eric_dosa_cate_counts_grade;
    }

    $xoopsTpl->assign('all', $all);
}

//類別統計_班
function cate_counts_list_class()
{
    global $xoopsTpl, $xoopsDB;
    $myts = MyTextSanitizer::getInstance();

    $tbl = $xoopsDB->prefix('view_eric_dosa_cate_counts_class');

    $power_con = 1;

    $sql = "SELECT * FROM `$tbl` where {$power_con} ";

    $result = $xoopsDB->query($sql) or web_error($sql);
    $all    = [];
    while ($eric_dosa_cate_counts_class = $xoopsDB->fetchArray($result)) {

        $eric_dosa_cate_counts_class['eclass'] = $myts->htmlSpecialChars($eric_dosa_cate_counts_class['eclass']);
        $eric_dosa_cate_counts_class['1']      = (int) ($eric_dosa_cate_counts_class['1']);
        $eric_dosa_cate_counts_class['2']      = (int) ($eric_dosa_cate_counts_class['2']);
        $eric_dosa_cate_counts_class['3']      = (int) ($eric_dosa_cate_counts_class['3']);
        $eric_dosa_cate_counts_class['4']      = (int) ($eric_dosa_cate_counts_class['4']);
        $eric_dosa_cate_counts_class['5']      = (int) ($eric_dosa_cate_counts_class['5']);
        $eric_dosa_cate_counts_class['21']     = (int) ($eric_dosa_cate_counts_class['21']);
        $eric_dosa_cate_counts_class['22']     = (int) ($eric_dosa_cate_counts_class['22']);

        $all[] = $eric_dosa_cate_counts_class;
    }

    $xoopsTpl->assign('all', $all);
}

/*-----------執行動作判斷區----------*/
$op       = isset($_REQUEST['op']) ? filter_var($_REQUEST['op'], FILTER_SANITIZE_SPECIAL_CHARS) : "";
$eclass_t = isset($_REQUEST['eclass']) ? filter_var($_REQUEST['eclass'], FILTER_SANITIZE_SPECIAL_CHARS) : "";
$weeks    = isset($_REQUEST['weeks']) ? (int) $_REQUEST['weeks'] : 0;

// $sn = system_CleanVars($_REQUEST, 'sn', 0, 'int');

switch ($op) {

    case "eric_dosa_list":
        // print_r('weeks:' . $weeks);
        // print_r('eclass:' . $eclass);
        // die();

        eric_dosa_list($weeks, $eclass_t);
        // $op = 'eric_dosa_cls_list';
        break;

    case "cate_counts":
        // 依挑選秀出挑選的「周」、「班別」資料
        cate_counts_list($weeks, $eclass_t);
        $op = 'eric_dosa_cate_counts';
        break;

    case "cate_counts_class":
        // 秀出「各班」統計;
        cate_counts_list_class();
        $op = 'eric_dosa_cate_counts_class';
        break;

    default:
        $now_uid = logged();

        if ($now_uid == 0) {
            //秀出未登入卡片
            $op = 'eric_dosa_null';
        } else {
            // 秀出各年級統計;
            cate_counts_list_grade();
            $op = 'eric_dosa_cate_counts_grade';
        }
        break;
}

/*-----------秀出結果區--------------*/

// die(var_dump($op));
// var_dump($main);
$xoopsTpl->assign('op', $op);
$xoopsTpl->assign("toolbar", toolbar_bootstrap($interface_menu));
// include_once 'footer.php';
include_once XOOPS_ROOT_PATH . '/footer.php';
