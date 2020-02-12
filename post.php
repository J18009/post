<?php

header('Content-Type: text/html; charset=UTF-8');

    $title = htmlspecialchars($_POST["title"]);
    echo "return from server: [".$title."]";
    $fp = fopen("android.txt", "a");
    if ($title) {// titleが送られてきていたら、
        fwrite($fp ,"$title \n"); // 保存ファイルに書き込み
        fclose($fp);
    }

    //MySQL.phpを取り込み
include 'MySQL.php';
//MySQLに接続
$up=new MySQL();
//MySQLに書き込み
$up->add($title, $text);

?>
