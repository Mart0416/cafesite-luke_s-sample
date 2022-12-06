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
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta name="robots" content="noindex" />
    <meta name="robots" content="nofollow" />
	<title>GZ一覧(一般)</title>
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
	<link rel="stylesheet" href="../css/sanitize.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/nomas.css">
</head>
<body>
<header>
	<h1>当店からのお知らせ</h1>
	<h2>News</h2>
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
			<input type="submit" name="submit" value="選択/Select" formaction="gzShow_nomas.php">
			<!-- <input type="button" value="戻る/Back" onclick="history.back(-1)"> -->
			<button type="button">
					<a href="../index.php">トップ/Top</a>
			</button>
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
echo "<div id='bdr'><table class='table'>";
echo "<tr><th class='text-center text-date'>Update date</th><th class='text-center text-cate'>
Category</th><th class='text-center text-title'>Title</th><th class='text-center text-comment'>Sentence</th></tr>";
	foreach ( $result as $row ) {
		$udate=$row["udate"];
		$day = new DateTime($udate);
		$udate=$day->format('Y年m月d日');
		$category=$row["category"];
		$title=$row["title"];
		$comment=$row["comment"];
		echo "<tr>";
			echo "<td class='td-date'>{$udate}</td>";
			echo "<td class='td-cate'>{$category}</td>";
			echo "<td class='td-title'>{$title}</td>";
			echo "<td class='td-comment'>{$comment}</td>";
		echo "</tr>";
	}
echo "</table></div>"; 
}
?>
</div>
</main>
<footer>
    <p><small>&copy; 2022 coffee&nbsp;room&nbsp;Luke's</small></p>
</footer>
</body>
</html>