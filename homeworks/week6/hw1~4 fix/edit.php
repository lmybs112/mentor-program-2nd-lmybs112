<?php
// 判斷
if (empty($_GET['id'])) {
    exit('<h1>找不到更改對象</h1>');
}

// 連接數據庫
require_once 'conn.php';

// 驗證非空
if (!empty($_POST['message'])) {

// 取值
    $id = $_GET['id'];
    $edit_message = empty($_POST['message']) ? $edit['message'] : $_POST['message'];

// 更改數據
    $edit = $conn->prepare("UPDATE lmybs112_comments SET message =? WHERE id =?");
    $edit->bind_param('si', $edit_message, $id);
    $edit->execute();
    if (!$edit) {
        exit('<h1>查詢數據失敗</h1>');
    }
}
header('Location:index.php');
