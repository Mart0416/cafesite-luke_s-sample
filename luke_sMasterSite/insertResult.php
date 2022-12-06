<?php
// 直接ページにアクセスされたときの対処
if (! isset ( $_POST["id"] )) {
	header ( "Location: insertIndex.php" );
	exit;
}
// 送信データの取得
	$id = $_POST ["id"];
	$name = $_POST ["name"];
	$passwd = $_POST ["passwd"];
	if(!isset($s_type)){$s_type=0;}

// データベースへ接続
	require("DBconnect.php");

// SQL（挿入）の実行
	$sql = "INSERT INTO usr(id, name, passwd) VALUES (:id, :name, :passwd)";
	$stmt = $dbInfo->prepare ( $sql );
	$stmt->bindParam ( ":id", $id, PDO::PARAM_STR );
	$stmt->bindParam ( ":name", $name, PDO::PARAM_STR );
	$stmt->bindParam ( ":passwd", $passwd, PDO::PARAM_STR );
	$stmt->execute ();
	// 更新行の取得
	$result = $stmt->rowCount ();
	// データベースの切断
	$dbInfo = null;
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="robots" content="noindex" />
    <meta name="robots" content="nofollow" />
	<title>新規登録完了</title>
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
<?php
if($s_type==1){ /*管理権限があるときは表示*/
require_once ("../header.php");
}	
?>
<div class="bg-success padding-y-5">
	<div class="container padding-y-5">
		<strong>新規登録結果</strong>
	</div>
</div>
<div class="padding-y-5">
	<div class="container padding-y-5">
		<strong>
			<?php
			if ($result > 0) {
				echo "<div style='color:#ff0000'>登録しました</div>";
			} else {
				echo "<div style='color:#ff0000'>登録できませんでした</div>";
			}
			?>
		</strong>
		<form>
			<input type="submit" value="ログイン" class="btn" formaction="loginForm.php">
			<input type="submit" value="TOPへ" class="btn" formaction="main.php">
		</form>
	</div>
</div>
</body>
</html>
