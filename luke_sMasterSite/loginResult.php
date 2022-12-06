<?php
session_start();
//echo "<pre>";print_r($_SESSION);echo "</pre>";
if(isset($_SESSION["xx"]["id"])){
	if(isset($_SESSION["xx"]["id"])){
		$id=$_SESSION["xx"]["id"];
	}else{$id="";}
	if(isset($_SESSION["xx"]["name"])){
		$name=$_SESSION["xx"]["name"];
	}else{$name="ゲスト";}
	if(isset($_SESSION["xx"]["type"])){
		$type=$_SESSION["xx"]["type"];
	}else{$type=0;}
	
}else{

if (! isset ( $_POST ["id"] )) {
	header ( "Location: loginForm.php" );
	exit;
}
//echo "<pre>"; ;print_r($_POST); echo "</pre>"; //POST データの確認

// 送信データの取得
$id = htmlspecialchars($_POST ["id"],ENT_QUOTES);
$passwd = htmlspecialchars($_POST ["passwd"],ENT_QUOTES);
$name = "";
$type = "";
$errMessage="??";
//入力チェック
$sw=input_check($id,$passwd);
if($sw<>0){
	require("loginForm.php");
	exit;
}
//ログイン状態を保持するためにセッション変数に保存
$_SESSION["xx"]["id"]=$id;
$_SESSION["xx"]["name"]=$name;
$_SESSION["xx"]["type"]=$type;
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="robots" content="noindex" />
    <meta name="robots" content="nofollow" />
	<title>会員サイトへようこそ</title>
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
		<strong>ようこそ！<?php echo $name."さん"?></strong>
	</div>
</div>
<div class="padding-y-5">
	<div class="container padding-y-5">
		<form action="insertResult.php" method="post">
			<table style="width:100%" class="table">
				<tr>
					<td colspan="4" style="text-align: right">
						<!-- <?php if($type==1){ echo "<a href='../blog/management/updateIndex.php' class='btn'>管理画面へ</a>";}?> -->
						<input type="submit" value="ログアウト" class="btn"  formaction="logout.php">
						<input type="submit" value="投稿フォーム" class="btn" formaction="gzForm.php">
						<input type="submit" value="閲覧する" class="btn" formaction="gzShow.php">
						<input type="submit" value="TOPへ" class="btn" formaction="main.php">
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
function input_check($id,$passwd){
	$sw=0;
	global $name;
	global $type;
	global $errMessage;
	if($id==""){
		$errMessage = "<div class='color-error'>IDを入力してください<br></div>";
		$sw=1;
	}else{
		require("DBconnect.php");
		// IDが既に登録されてないかチェック
		$sql = "SELECT * FROM usr WHERE id='".$id."'";
		$result = $dbInfo->query ( $sql );
		if(!$result){		
			$errMessage= "<div class='color-error'>ID入力error<br></div>";
				$sw=1;
		}else{
			$cnt=$result->rowCount();
			if($cnt<1){
				$errMessage= "<div class='color-error'>ID入力エラー<br></div>";
				$sw=1;
			}else{
			$record = $result->fetch ( PDO::FETCH_ASSOC );
			$name = $record ["name"];
			$type = $record ["type"];
			$passwdDb = $record ["passwd"];
			if(md5($passwd)<>$passwdDb){
				$errMessage= "<div class='color-error'>パスワード入力エラー<br></div>";
				$sw=1;
			}
			}
		}	
		// データベースの切断
			$dbInfo = null;
			if($passwd==""){
				$errMessage = "<div class='color-error'>パスワードを入力してください<br></div>";
				$sw=1;
			}
		}
	return $sw;
}
?>