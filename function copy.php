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


//檢查巡堂紀錄權限
function dosa_power_check()
{
    global $xoopsDB, $xoopsUser;
    $myts = MyTextSanitizer::getInstance();

    $uid = $xoopsUser->getVar('uid');

    $tbl1 = $xoopsDB->prefix('eric_dosa_staff_link');
    $tbl2 = $xoopsDB->prefix('eric_dosa_staff_jobtitle');
    $sql  = "SELECT `$tbl1`.`uid`,    `$tbl2`.`staff_no`,`$tbl2`.`eric_dosa_check` FROM `$tbl1` INNER JOIN `$tbl2` ON `$tbl2`.`staff_no` = `$tbl1`.`staff_no`  WHERE `$tbl2`.`eric_dosa_check` <= 7 and `$tbl1`.`uid`={$uid}";
    // die(var_dump($sql));
    // $sql    = "SELECT * FROM `$tbl` WHERE `sn` = '{$sn}'";
    $result         = $xoopsDB->query($sql) or web_error($sql);
    $eric_dosa_link = $xoopsDB->fetchArray($result);

    // $snews['content']  = $myts->displayTarea($snews['content'], 1, 0, 0, 0, 0);
    // $snews['title']    = $myts->htmlSpecialChars($snews['title']);
    //數字只要強制轉成整數
    // $sn = (int) $_POST['sn'];
    $power_code = $myts->htmlSpecialChars($eric_dosa_link['eric_dosa_check']);
    $staff_code = $myts->htmlSpecialChars($eric_dosa_link['staff_no']);
    // die(var_dump($eric_dosa_power_code));
    return array('power_code' => $power_code, 'staff_code' => $staff_code);
}

//檢查課堂紀錄權限
function dosa_cls_power_check()
{
    global $xoopsDB, $xoopsUser;
    $myts = MyTextSanitizer::getInstance();

    $uid = $xoopsUser->getVar('uid');
    //$sqltest="SELECT xx_eric_dosa_staff_link.uid, xx_eric_dosa_staff_link.staff_no, xx_eric_dosa_staff_jobtitle.eric_dosa_check, xx_eric_dosa_classname.eclass FROM (xx_eric_dosa_staff_link INNER JOIN xx_eric_dosa_staff_jobtitle ON xx_eric_dosa_staff_link.staff_no = xx_eric_dosa_staff_jobtitle.staff_no) LEFT JOIN xx_eric_dosa_classname ON xx_eric_dosa_staff_jobtitle.staff_no = xx_eric_dosa_classname.tutor_staff_code;";
    $tbl1 = $xoopsDB->prefix('eric_dosa_staff_link');
    $tbl2 = $xoopsDB->prefix('eric_dosa_staff_jobtitle');
    $tbl3 = $xoopsDB->prefix('eric_dosa_classname');
    $sql  = "SELECT `$tbl1`.`uid`,    `$tbl2`.`staff_no`,`$tbl2`.`eric_dosa_check`,`$tbl3`.`eclass` FROM (`$tbl1` INNER JOIN `$tbl2` ON `$tbl2`.`staff_no` = `$tbl1`.`staff_no`) LEFT JOIN `$tbl3` ON `$tbl2`.`staff_no` = `$tbl3`.`tutor_staff_code`  WHERE  `$tbl1`.`uid`={$uid} ;";
    // die(var_dump($sql));
    // $sql    = "SELECT * FROM `$tbl` WHERE `sn` = '{$sn}'";
    $result         = $xoopsDB->query($sql) or web_error($sql);
    $eric_dosa_link = $xoopsDB->fetchArray($result);

    // $snews['content']  = $myts->displayTarea($snews['content'], 1, 0, 0, 0, 0);
    // $snews['title']    = $myts->htmlSpecialChars($snews['title']);
    //數字只要強制轉成整數
    // $sn = (int) $_POST['sn'];
    $power_code = $myts->htmlSpecialChars($eric_dosa_link['eric_dosa_check']);
    $staff_code = $myts->htmlSpecialChars($eric_dosa_link['staff_no']);
    $eclass     = $myts->htmlSpecialChars($eric_dosa_link['eclass']);
    // die(var_dump($power_code, $staff_code, $eclass));
    return array('power_code' => $power_code, 'staff_code' => $staff_code, 'eclass' => $eclass);
}
