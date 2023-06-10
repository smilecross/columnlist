<?php
// var_dump($_POST);
// exit();

// データの受け取り
$date2 = $_POST["date2"];
$category = $_POST["category"];
$app_name = $_POST["app_name"];
$comment = $_POST["comment"];


// データ1件を1行にまとめる（最後に"\n"改行を入れる）
// $write_data = "{$deadline} {$todo}\n";
$write_data = "{$date2} {$category} {$app_name} {$comment}\n";

// ファイルを開く．引数が`a`である部分に注目！
$file = fopen('data/columnlist.txt', 'a');
// ファイルをロックする
flock($file, LOCK_EX);

// 指定したファイルに指定したデータを書き込む
fwrite($file, $write_data);

// ファイルのロックを解除する
flock($file, LOCK_UN);
// ファイルを閉じる
fclose($file);

// データ入力画面に移動する
header("Location:columnlist_input.php");
exit();
