<?php
if (session_status() == PHP_SESSION_NONE) {
    // セッションは有効で、開始していないとき
    session_start();
}
//echo "<pre>";print_r($_SESSION);echo "</pre>";
if(isset($_SESSION["xx"]["id"])){
	$id=$_SESSION["xx"]["id"];
}else{$id="";}
if(isset($_SESSION["xx"]["name"])){
	$name=$_SESSION["xx"]["name"];
}else{$name="ゲスト";}
if(isset($_SESSION["xx"]["type"])){
	$type=$_SESSION["xx"]["type"];
}else{$type=0;}
if(!isset($_POST["category"])){
	$category="";
}else{
	$category=$_POST["category"];
}
if(isset($_POST["submit"])){
	$submit=$_POST["submit"];
}else{
	$submit="";
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="robots" content="noindex" />
    <meta name="robots" content="nofollow" />
	<title>GZ一覧</title>
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
	<link rel="stylesheet" href="css/tb.css">
	<link rel="stylesheet" href="css/show_master.css">
</head>
<body>
<header>
<div class="bg-success padding-y-5">
	<div class="container padding-y-5">
		<strong>ようこそ！<?php echo $name."さん"?></strong>
	<?php
	if($name=="ゲスト"){
		echo "<a href='loginResult.php' class='btn log'>ログイン</a><br>";
		}else{
			echo "<a href='logout.php' class='btn log'>ログアウト</a>";
		}
	?>
	</div>
</div>
</header>
<main>
<div class="padding-y-5">
	<div class="container padding-y-5">
		<form method="POST" enctype="multipart/form-data">
		<p>カテゴリ：
		<?php 
		$categorys=["news"=>"NEWS","blog"=>"BLOG", "all"=>"すべて"];
		foreach($categorys as $key=>$val){
			if($key==$category){
				echo "<input type='radio' name='category' value='$key' class='form-control' checked>".$val." ";
			}else{
				echo "<input type='radio' name='category' value='$key' class='form-control'>".$val." ";
			}
		} 
		?>
		</p>
		<input type="submit" name="submit" value="選択" class="btn" formaction="gzShow.php">
		<input type="submit" name="submit" value="会員ページへ" class="btn" formaction="loginResult.php">
		<a href="loginResult.php" class="btn">戻る</a>
		<a href="main.php" class="btn">Topへ</a>
		</form>
	</div>
</div>

<div class="container padding-y-5">
<?php
require("DBconnect.php");
if($category=="" or $category=="all"){
	$sql = "SELECT * FROM news order by udate DESC";

}else{
	$sql = "SELECT * FROM news where category='".$category."' order by udate DESC";
}
$result = $dbInfo->query ( $sql );
if(!$result){print "予期せぬエラーnews table nothing<br>"; exit;}
$cnt = $result->rowCount ();
if($cnt<=0){echo "<div style='font-weight:bold;'>無い<br></style>";
	exit;
}else{
echo "<div id='bdr'><table>";
echo "<tr><th class='text-center text-date'>投稿日時</th><th class='text-center text-id'>ID</th><th class='text-center text-uid'>ユーザーネーム</th><th class='text-center text-cate'>カテゴリ</th><th class='text-center text-title'>タイトル</th><th class='text-center text-comment'>本文</th>";
	foreach ( $result as $row ) { //
		$udate=$row["udate"];//投稿日時
		// $day = new DateTime($udate);
		// $udate=$day->format('Y年m月d日');
		//年月日のみ表示↑
		$id=$row["id"];
		$uid=$row["uid"];
		$category=$row["category"];
		$title=$row["title"];
		$comment=$row["comment"];
		echo "<tr>";
			echo "<td>{$udate}</td>";
			echo "<td class='text-center'>{$id}</td>";
			echo "<td class='text-center'>{$uid}</td>";
			echo "<td class='text-center'>{$category}</td>";
			echo "<td class='text-center'>{$title}</td>";
			echo "<td>{$comment}</td>";
		echo "</tr>";
	}
echo "</table></div>"; 
}
?>
</div>
</main>
</body>
</html>