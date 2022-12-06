<?php
if(!isset($id)){$id="";}
if(!isset($name)){$name="";}
if(!isset($passwd)){$passwd="";}
if(!isset($passwd2)){$passwd2="";}
if(!isset($type)){$type=0;}
if(!isset($errMessage)){$errMessage="";}
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
		<strong>新規登録</strong>
	</div>
</div>
<div class="padding-y-5">
	<div class="container padding-y-5">
		<strong class="color-main">登録情報を入力してください</strong>
	</div>
</div>
<div class="padding-y-5">
	<div class="container padding-y-5">
	<strong class="color-error"><?php echo $errMessage; ?></strong>

		<form method="post">
			<table style="width:100%" class="table">
				<tr>
					<th style="width:30%"  class="color-main text-center">ID</th>
					<td>
					<input type="text" name="id" value="<?php echo $id; ?> " class="form-control">
					</td>
				</tr>
				<tr>
					<th style="width:30%"  class="color-main text-center">ネーム</th>
					<td>
					<input type="text" name="name" value="<?php echo $name;?>" class="form-control">
					</td>
				</tr>
				<tr>
					<th style="width:30%"  class="color-main text-center">パスワード</th>
					<td>
					<input type="password" name="passwd" value="<?php echo $passwd;?>" class="form-control">
					</td>
				</tr>
				<tr>
					<th style="width:30%"  class="color-main text-center">パスワード(再入力)</th>
					<td>
					<input type="password" name="passwd2" value="<?php echo $passwd2;?>" class="form-control">
					</td>
				</tr>
				<tr>
					<th  class="color-main text-center"></th>
					<td>
					<input type="hidden" name="type" value="<?php echo $type;?>" class="form-control">
					</td>
				</tr>
				<tr>
				<td colspan="2">
					<input type="submit" value="登録する" class="btn" formaction="insertConfirm.php">
					<input type="submit" value="ログイン" class="btn" formaction="loginForm.php">
					<input type="submit" value="Topへ" class="btn" formaction="main.php">
				</td>
			</tr>
			</table>
		</form>
	</div>
</div>
</body>
</html>
