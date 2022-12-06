<?php
$dbName=""; //DB名の指定
// データベースへ接続
$dsn = "mysql:dbname={$dbName};host=;charset=utf8"; //サーバーの指定(= と ; の間に入力)
$user = ""; //ユーザー名の指定
$password = ""; //パスワードの指定
$dbInfo = new PDO ( $dsn, $user, $password ); 
?>
