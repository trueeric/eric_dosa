<?php
include_once "header.php";

// $eric_dosa_power      = pera_power_check();
// $eric_dosa_power_code = (int) $eric_dosa_power['power_code'];
// $eric_dosa_staff_code = (int) $eric_dosa_power['staff_code'];
//判斷是否對該模組有管理權限
if (!isset($_SESSION['eric_dosa_Admin'])) {
    $_SESSION['eric_dosa_Admin'] = ($xoopsUser) ? $xoopsUser->isAdmin() : false;
}

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
