<?php
// MySQL接続
$dsn = "mysql:host=;charset=utf8"; //サーバーの指定(= と ; の間に入力)
$user = ""; //ユーザー名の指定
$password = ""; //パスワードの指定
  $db=""; //DB名の指定
$dbInfo = new PDO ( $dsn, $user, $password );
$sql="CREATE DATABASE IF NOT EXISTS {$db} CHARACTER SET UTF8";
$result = $dbInfo->Query ( $sql );
echo "DB CREATED<br>";
$dsn = "mysql:dbname={$db};host=;charset=utf8";
$user = "";
$password = "";

$dbInfo = new PDO ( $dsn, $user, $password );
$sql="CREATE TABLE IF NOT EXISTS news (
  id int(11) NOT NULL AUTO_INCREMENT,
  uid varchar(50) NOT NULL,
  category varchar(128),
  title varchar(256),
  comment varchar(512),
  udate datetime NOT NULL,
  hidden int(2) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
)";
$result = $dbInfo->query ( $sql );
if($result){echo "DB news Table Created <br>";}else{echo "news Table失敗<br>";}
$sql="CREATE TABLE IF NOT EXISTS usr (
  id varchar(50) NOT NULL,
  name varchar(100) NOT NULL,
  passwd varchar(100) NOT NULL,
  type int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
)";
$result = $dbInfo->query ( $sql );
if($result){echo "DB usr Table Created <br>";}else{echo "usr Table失敗<br>";}

?>