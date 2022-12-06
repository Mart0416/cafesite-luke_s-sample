<?php 
if (session_status() == PHP_SESSION_NONE) {
    // セッションは有効で、開始していないとき
    session_start();
}
//echo "<pre>";print_r($_SESSION);echo "</pre>";
if(!isset($_SESSION["xx"]["id"])){
	header("lovation:loginForm.php");
}
$id=$_SESSION["xx"]["id"];
$name=$_SESSION["xx"]["name"];
$type=$_SESSION["xx"]["type"];

if(!isset($errMessage)){$errMessage="";}
if(!isset($category)){$category="";}
if(!isset($comment)){$comment="";}
if(!isset($title)){$title="";}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="robots" content="noindex" />
    <meta name="robots" content="nofollow" />
	<title>新着情報アップロード</title>
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
	<p>
		<a href="gzShow.php" class="btn">一覧へ</a>
		<a href="logout.php" class="btn">ログアウト</a>
		<a href="main.php" class="btn">Topへ</a>
	</p>
	</div>
	<div class="container padding-y-5">
<h3>アップロード情報を入力してください。</h3>
	</div>
	
</div>
<div class="padding-y-5">
	<div class="container padding-y-5">
		<div class="color-error"><p><?php echo $errMessage;?></p></div>
		<form method="POST" enctype="multipart/form-data">
		<p>カテゴリ：
		<?php 
		$categorys=["news"=>"NEWS","blog"=>"BLOG"];
		foreach($categorys as $key=>$val){
			if($key==$category){
				echo "<input type='radio' name='category' value='$key' class='form-control' checked>".$val." ";
			}else{
				echo "<input type='radio' name='category' value='$key' class='form-control'>".$val." ";
			}
		} 
		?>
		</p>
		<p>タイトル：
			<input type="text" name="title" size="50" class="form-control" value='<?php echo $title;?>'></p>
		<p>本文：
			<textarea name="comment" cols="100" rows="10" class="form-control"><?php echo $comment;?></textarea></p>
		<input type="submit" name="submit" value="送信" class="btn" formaction="gz.php">
		</form>
	</div>
</div>
</body>
</html>
