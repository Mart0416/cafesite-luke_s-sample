<?php
// 直接ページにアクセスされたときの対処
if (! isset ( $_POST ["id"] )) {
	header ( "Location: insertIndex.php" );
	exit;
}
//echo "<pre>"; ;print_r($_POST); echo "</pre>"; //POST データの確認
// 送信データの取得
$id = htmlspecialchars($_POST ["id"],ENT_QUOTES);
$name = htmlspecialchars($_POST ["name"],ENT_QUOTES);
$passwd = htmlspecialchars($_POST ["passwd"],ENT_QUOTES);
$passwd2 = htmlspecialchars($_POST ["passwd2"],ENT_QUOTES);
$type = htmlspecialchars($_POST ["type"],ENT_QUOTES);
//入力チェック
$errMessage="";
$sw=input_check($id,$name,$passwd,$passwd2,$type);
if($sw<>0){
	require("insertIndex.php");
	exit;
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>新規管理者登録</title>
	<meta name="robots" content="noindex" />
    <meta name="robots" content="nofollow" />
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
	<link rel="stylesheet" href="css/show_master.css">
</head>
<body>
<div class="bg-success padding-y-5">
	<div class="container padding-y-5">
		<strong>新規登録確認</strong>
	</div>
</div>
<div class="padding-y-5">
	<div class="container padding-y-5">
		<strong class="color-main">登録しますか？</strong>
	</div>
</div>
<div class="padding-y-5">
	<div class="container padding-y-5">
		<form autocomplete="off" action="insertResult.php" method="post">
			<table style="width:100%" class="table">
				<tr>
				<th style="width:20%" class="color-main text-center">ID</th>
				<?php
					echo "<td><div class='color-main text-right margin-top-10'>$id</div>";
					echo "<input type='hidden' name='id' value='" . $id . "'></td>";
				?>
				</tr>
				<tr>
				<th style="width:25%" class="color-main text-center">ニックネーム</th>
				<?php
					echo "<td><div class='color-main text-right margin-top-10'>" . $name . "</div>" ;
					echo "<input type='hidden' name='name' value='" . $name . "'></td>";
				?>
				</tr>
				<tr>
				<th style="width:25%" class="color-main text-center">パスワード</th>
				<?php
					echo "<td><div class='color-main text-right margin-top-10'>●●●●●●●●●</div>";
					echo "<input type='hidden' name='passwd' value='" . md5($passwd) . "'></td>";
				?>
				</tr>
				<?php
					echo "<td><div class='color-main text-right margin-top-10'>" . $type . "</div>" ;
					echo "<input type='hidden' name='type' value='" . $type . "'></td>";
				?>
				</tr>
				<tr>
				</tr>
				<tr>
					<td colspan="4" style="text-align: right">
						<input type="button" value="戻る" class="btn" onClick="history.back()">
						<input type="submit" value="登録する" class="btn">
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>
</body>
</html>
<?php   //----------------------------------関数--
//入力チェック
function input_check($id,$name,$passwd,$passwd2,$type){
	$sw=0;
	global $errMessage;
	if($id==""){
		$errMessage.= "IDを入力してください<br>";
		$sw=1;
	}else{
		require("DBconnect.php");
		// IDが既に登録されてないかチェック
		$sql = "SELECT * FROM usr WHERE id='".$id."'";
		$result = $dbInfo->query ( $sql );
		if($result){		
			$cnt=$result->rowCount();
			if($cnt>=1){
				$errMessage.= "そのIDは登録できません<br>";
				$sw=1;
			}
		}
	}
		// データベースの切断
		$dbInfo = null;

	if($name==""){
		$errMessage.= "ネームを入力してください<br>";
		$sw=1;
	}
	if($passwd==""){
		$errMessage.= "パスワードを入力してください<br>";
		$sw=1;
	}	
	if($passwd2==""){
		$errMessage.= "パスワード(再入力)を入力してください<br>";
		$sw=1;
	}
	if($passwd!=$passwd2){
		$errMessage.= "パスワード入力エラー<br>";
		$sw=1;
	}
	if(mb_strlen(md5($passwd))>100){
		$errMessage= "パスワード入力エラー（so long）<br>";
		$sw=1;
	}
	if(mb_strlen($name)>100){
		$errMessage= "ニックネーム入力エラー（so long）<br>";
		$sw=1;
	}
	if(mb_strlen($id)>50){
		$errMessage= "ID入力エラー（so long）<br>";
		$sw=1;
	}
	return $sw;
}
?>