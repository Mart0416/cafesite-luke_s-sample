<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION["xx"])){
	$login_sw=1;
}else{$login_sw=0;}
if(isset($_SESSION["xx"]["id"])){
	$id=$_SESSION["xx"]["id"];
}else{$id="";}
if(isset($_SESSION["xx"]["name"])){
	$name=$_SESSION["xx"]["name"];
}else{$name="ゲスト";}
if(isset($_SESSION["xx"]["type"])){
	$type=$_SESSION["xx"]["type"];
}else{$type=0;}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>Master-page</title>
	<meta name="robots" content="noindex" />
    <meta name="robots" content="nofollow" />
	<link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <link rel="manifest" href="images/site.webmanifest">
    <link rel="mask-icon" href="images/safari-pinned-tab.svg" color="#5bbad5">
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
	<table class="table">
		<thead>
			<tr><th  colspan="3" class="bg-success padding-y-5 text-center">
					<div class="padding-y-5">SAMPLE SITE</div>
				</th>
				<th colspan="2" class="bg-success padding-y-5 text-center">LOGIN USER：<?php echo $name;?></th>
			</tr>
		</thead>
		<tbody>
			<tr class="bg-success padding-y-5">
				<th class="text-center"><a href="gzShow.php" class="btn">一覧へ</a></th>
			<?php if($login_sw==0){ ?>
				<th class="text-center"><a href="loginForm.php" class="btn">ログイン</a></th>
				<th class="text-center"></th>
			<?php }else{ ?>
				<th class="text-center"><a href="loginResult.php" class="btn">会員ページへ</a></th>
				<th class="text-center"><a href="logout.php" class="btn">ログアウト</a></th>
			<?php } ?>
			<th class="text-center"><a href="insertIndex.php" class="btn">新規登録</a></th>
			</tr>
		</tbody>
	</table>
	</div>
</div>
<div class="main_image">
	<img src="images/mainVisual_n2.jpg" height="800">
</div>
</body>
</html>
