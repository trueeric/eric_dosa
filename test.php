<?php
require_once 'header.php';

$today = date("Y-m-d");
$smarty->assign('now', $today);

// die(var_dump(_DB_LOCATION, _DB_PASS, _DB_NAME, _DB_NAME));

/********************函數區******************************/
function list_all()
{

    global $db, $smarty;

    $sql = "select * from `list` order by `end` ";
    $result = $db->query($sql);
    if (!$result) {
        throw new Exception($db->error);
    }

    // 讀出資料 法1
    $content = [];
    while ($data = $result->fetch_assoc()) {
        $data['title'] = filter_var($data['title'], FILTER_SANITIZE_SPECIAL_CHARS);
        $data['directions'] = filter_var($data['directions'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $data['assign'] = filter_var($data['assign'], FILTER_SANITIZE_SPECIAL_CHARS);
        $content[] = $data;
    }
    // die(var_dump($content));

    // 讀出資料 法3
    // $i = 0;
    // while (list($sn, $title, $directions, $end, $priority, $assign, $done, $create_time, $update_time) = $result->fetch_row()) {

    //     $content[$i]['sn']          = $sn;
    //     $content[$i]['title']       = $title;
    //     $content[$i]['directions']  = $directions;
    //     $content[$i]['end']         = $end;
    //     $content[$i]['priority']    = $priority;
    //     $content[$i]['assign']      = $assign;
    //     $content[$i]['done']        = $done;
    //     $content[$i]['create_time'] = $create_time;
    //     $content[$i]['update_time'] = $update_time;
    //     $i++;
    // }
    // die(var_dump($content));
    // return $content;
    $smarty->assign('content', $content);
}

// 表單函數
function post_form()
{
    global $db, $smarty;

    if (isset($_REQUEST['sn'])) {

        $sn = (int) $_REQUEST['sn'];
        $sql = "select * from `list` where `sn`='{$sn}';";
        $result = $db->query($sql);
        if (!$result) {
            throw new Exception($db->error);
        }

        $content = $result->fetch_assoc();
        $content['title'] = filter_var($content['title'], FILTER_SANITIZE_SPECIAL_CHARS);
        $content['directions'] = filter_var($content['directions'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $content['assign'] = explode(';', $content['assign']);

        $next_op = 'update';
    } else {

        $content = [
            'title' => '12345',
            'directions' => '54321',
            'end' => date("Y-m-d", strtotime("+7 day")),
            'priority' => "中",
            'assign' => ['吳大大', '李大頭'],
            'done' => 1,
        ];

        $next_op = 'add';
    }


    // die(var_dump($content));

    $smarty->assign('next_op', $next_op);
    $smarty->assign('content', $content);

    // return $content;
}




//新增資料夾
function add()
{
    global $db;

    $title  = $db->real_escape_string($_POST['title']);

    $directions = $db->real_escape_string($_POST['directions']);
    $end = $db->real_escape_string($_POST['end']);
    $priority = $db->real_escape_string($_POST['priority']);
    $assign = implode(';', $_POST['assign']);
    $done = (int)($_POST['done']);

    $sql = "INSERT INTO `list` ( `title`, `directions`, `end`, `priority`, `assign`, `done`,`create_time`,`update_time`)
    VALUES ('{$title}', '{$directions}', '{$end}', '{$priority}', '{$assign}', '{$done}',now(),now())";

    $result = $db->query($sql);
    if (!$result) {
        throw new Exception($db->error);
    }

    $sn = $db->insert_id;
    // die(var_dump($sn));
    return $sn;
}


function update()
{
    global $db;

    $sn = (int) $_REQUEST['sn'];

    $title  = $db->real_escape_string($_POST['title']);
    $directions = $db->real_escape_string($_POST['directions']);
    $end = $db->real_escape_string($_POST['end']);
    $priority = $db->real_escape_string($_POST['priority']);
    $assign = implode(';', $_POST['assign']);
    $done = (int)($_POST['done']);
    $update_time = date('Y-m-d H:i:s');

    $sql = "update `list` set
          `title` = '{$title}' ,
          `directions`= '{$directions}',
          `end` ='{$end}',
          `priority`='{$priority}',
          `assign`='{$assign}',
          `done`='{$done}',
          `update_time`='{$update_time}'
          where `sn`='{$sn}' ; ";
    // die(var_dump($sql));

    $result = $db->query($sql);
    if (!$result) {
        throw new Exception($db->error);
    }


    return $sn;
}

function find_one($sn)
{
    global $db, $smarty;



    $sql = "select * from `list` where  `sn`='{$sn}' ";
    $result = $db->query($sql);
    if (!$result) {
        throw new Exception($db->error);
    }

    $content = $result->fetch_assoc();
    $content['title'] = filter_var($content['title'], FILTER_SANITIZE_SPECIAL_CHARS);
    $content['directions'] = filter_var($content['directions'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    // $content['directions']=htmlspecialchars($content['directions'],ENT_QUOTES);

    $content['title'] = filter_var($content['title'], FILTER_SANITIZE_SPECIAL_CHARS);

    return $content;
}

function del($sn)
{
    global $db;
    $sql = "delete from `list` where `sn` = '{$sn}';";

    if (!$db->query($sql)) {
        throw new Exception($db->error);
    }
}


/********************流程判斷******************************/
$op = isset($_REQUEST['op']) ? filter_var($_REQUEST['op'], FILTER_SANITIZE_SPECIAL_CHARS) : "no";
$sn = isset($_REQUEST['sn']) ? (int) $_REQUEST['sn'] : "";


// if($op=='post_form'){
//     $content='新增表單';
// }else{
//     list_all();

// }
//php7
switch ($op) {

    case 'delete':
        del($sn);
        // 轉向
        // header("location:index.php?sn={$sn}");
        echo "<script> alert ('刪除完成!');location.href='index.php';</script>";
        // die($sn . "sn");
        exit;

    case 'update':
        $sn = update();
        // 轉向
        // header("location:index.php?sn={$sn}");
        echo "<script> alert ('更新完成!');location.href='index.php?sn={$sn}';</script>";
        // die($sn . "sn");
        exit;

    case 'add':
        $sn = add();
        // 轉向
        // header("location:index.php?sn={$sn}");
        echo "<script> alert ('新增成功!');location.href='index.php?sn={$sn}';</script>";
        // die($sn . "sn");
        exit;

    case 'post_form':
        // $content = post_form();
        post_form();
        break;

    default:
        // $content = list_all();
        // if ($sn) {
        //     $content = find_one($sn);
        //     // die(var_dump($content));
        //     $smarty->assign('content', $content);
        //     $op = 'show_one';
        // } else {

        //     list_all();
        // }
        // break;

        if ($sn) {
            // 顯示單筆
            $content = find_one($sn);
            $smarty->assign('content', $content);
            $op = 'show_one';
        } else {
            list_all();
        }

        break;
}

//php8
// match($op) {
//     'post_form' => $content = '新增表單',
// default=> list_all(),
// };



$smarty->assign('op', $op);


require_once 'footer.php';
