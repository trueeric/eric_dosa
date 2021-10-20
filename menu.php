<?php
//判斷是否對該模組有管理權限
if (!isset($_SESSION['eric_dosaAdmin'])) {
    $_SESSION['eric_dosaAdmin'] = ($xoopsUser) ? $xoopsUser->isAdmin() : false;
}

//回模組首頁
$interface_menu[_TAD_TO_MOD] = "index.php";
$interface_icon[_TAD_TO_MOD] = "";

//模組後台
if ($_SESSION['eric_dosaAdmin']) {
    $interface_menu['生活常規'] = "admin/main.php?op=";
    $interface_icon['生活常規'] = "";

    $interface_menu[_TAD_TO_ADMIN] = "admin/main.php";
    $interface_icon[_TAD_TO_ADMIN] = "";
}
