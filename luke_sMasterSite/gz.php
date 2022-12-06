<?php
session_start();
// echo "<pre>";print_r($_SESSION);echo "</pre>";
if(!isset($_SESSION["xx"]["id"])){
	header("lovation:loginForm.php");
}

if(!isset($_POST["submit"])){
    header("location:gzForm.php");
}

// echo "<pre>";print_r($_POST);echo "</pre>";

if(!isset($_POST["category"])){$category="";}else{
$category=$_POST["category"];}
$title=$_POST["title"];
$comment=$_POST["comment"];
$submit=$_POST["submit"];

$errMessage="";
$flg=check($category,$title,$comment);
if($flg!=0){
    require("gzForm.php");
    exit;
}

?>
<html>
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
    <style>
    #bdr table ,#bdr th ,#bdr td {
        border-collapse: collapse;
        border:1px solid #000000;
        padding:2px 5px;
    }
    </style>
</head>
<body>
<div class="padding-y-5">
	<div class="container padding-y-5">

<p>送信しますか？</p>
<form method="POST">
<input type="hidden" name="category" value="<?php echo $category;?>">
<input type="hidden" name="title" value="<?php echo $title;?>">
<input type="hidden" name="comment" value="<?php echo $comment;?>">
<input type="submit" value="戻る" class="btn" name="submit" formaction="unlink.php">
<input type="submit" value="送信する" class="btn" name="submit" formaction="gzResult.php">
</form>
<p>カテゴリー：<?php echo $category;?></p>
<p>タイトル：<?php echo $title;?></p>
<p>本文：<?php echo $comment;?></p>
</div>
</body>
</html>
<?php
function check($category,$title,$comment){
    $flg=0;
    global $errMessage;
    if($category==""){
        $errMessage.="カテゴリーを入力してください<br>";
        $flg=1;
    }
    if($title==""){
        $errMessage.="タイトルを入力してください<br>";
        $flg=1;
    }elseif(mb_strlen($title)>=256){
        $errMessage.="title So LONG!<br>";
        $flg=1;
    }
    if($comment==""){
        $errMessage.="本文を入力してください<br>";
        $flg=1;
    }elseif(mb_strlen($comment)>=256){
        $errMessage.="Comment So LONG!<br>";
        $flg=1;
    }
    return $flg;
}
?>