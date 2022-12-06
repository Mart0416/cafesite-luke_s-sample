<?php
session_start();
//echo "<pre>";print_r($_SESSION);echo "</pre>";
if(!isset($_SESSION["xx"]["id"])){
	header("lovation:loginForm.php");
}

if(!isset($_POST["category"])){
    header("location:gzForm.php");
    exit;
}
//echo "<pre>";print_r($_POST);echo "</pre>";
$category=$_POST["category"];
$title=$_POST["title"];
$comment=$_POST["comment"];
$uid=$_SESSION["xx"]["id"];

$submit=$_POST["submit"];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="robots" content="noindex" />
    <meta name="robots" content="nofollow" />
    <title>新着情報の更新</title>
	<link rel="apple-touch-icon" sizes="180x180" href="../images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon-16x16.png">
    <link rel="manifest" href="../images/site.webmanifest">
    <link rel="mask-icon" href="../images/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<div class="container padding-y-5">
<?php
/*--ここにDBの処理を追加---------*/
// データベースへ接続
require ("DBconnect.php");

	// SQL（挿入）の実行
	$sql="INSERT INTO news(uid,category,title,comment,udate) values(:uid,:category,:title,:comment,:udate)";
	$stmt=$dbInfo->prepare($sql);
	$stmt->bindParam ( ":uid", $uid, PDO::PARAM_STR );
	$stmt->bindParam ( ":category", $category, PDO::PARAM_STR );
	$stmt->bindParam ( ":title", $title, PDO::PARAM_STR );
	$stmt->bindParam ( ":comment", $comment, PDO::PARAM_STR );
	$stmt->bindValue ( ":udate", date("Y-m-d H:i:s"), PDO::PARAM_STR );
	$result=$stmt->execute();
	// データベースの切断
	$dbInfo = null;
?>
<p>送信完了</p>
<p><a href="main.php" class="btn">TOPへ</a></p>
<p><a href="gzShow.php" class="btn">一覧へ</a></p>
</div>
</body>
</html>