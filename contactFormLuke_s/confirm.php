<?php 
	// フォームのボタンが押されたら
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$name = $_POST["name"];
		$furigana = $_POST["furigana"];
		$email = $_POST["email"];
		$tel = $_POST["tel"];
		$item = $_POST["item"];
		$content  = $_POST["content"];
	}

// 送信ボタンが押されたら
if (isset($_POST["submit"])) {
		// 日本語をメールで送る
            mb_language("ja");
			mb_internal_encoding("UTF-8");
        // 件名を変数subjectに格納
            $subject = "［自動送信］お問い合わせ内容の確認";
        	// メール本文を変数bodyに格納
            $body = <<< EOM
            {$name}　様
お問い合わせありがとうございます。
以下のお問い合わせ内容を、メールにて確認させていただきました。

===================================================
【 お名前 】 
{$name}

【 ふりがな 】 
{$furigana}

【 メール 】 
{$email}

【 電話番号 】 
{$tel}

// 【 性別 】 
// {$sex}

【 項目 】 
{$item}

【 内容 】 
{$content}
===================================================

内容を確認のうえ、回答させて頂きます。
しばらくお待ちください。
EOM;
    // 送信元(サイト管理者側)のメールアドレスを変数fromEmailに格納
    $fromEmail = "○○○@○○○.com";

    // 送信元(サイト管理者側)の名前を変数fromNameに格納
    $fromName = "喫茶室Luke's お問い合わせ担当者：〇〇　";

    // ヘッダ情報を変数headerに格納する		
    $header = "From: " .mb_encode_mimeheader($fromName) ."<{$fromEmail}>";

    // 送信者へメール送信を行う
    mb_send_mail($email, $subject, $body, $header);// 送信者への確認メール送信
    /*--------------------------------------------------------------*/		
    // サイト管理者側 へメール送信を行う
    $body = <<< EOM
お問い合わせ内容。
===================================================
【 お名前 】 
{$name}

【 ふりがな 】 
{$furigana}

【 メール 】 
{$email}

【 電話番号 】 
{$tel}

【 項目 】 
{$item}

【 内容 】 
{$content}
===================================================
EOM;
    $subject = "[お問い合わせ] from WEB PAGE  ";
    mb_send_mail($fromEmail, $subject, $body, $header); // サイト管理者側へのメール送信
    // サンクスページに画面遷移させる
    header("Location: thanks.php");
    exit;
}// 送信するボタンが押された時の処理はここまで
?>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex" />
    <meta name="robots" content="nofollow" />
    <title>お問い合わせフォーム</title>
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
    <link rel="stylesheet" href="../css/form_confirm.css">
</head>
<body>
<div><h1>お問合せ内容の確認</h1></div>
</h1></div>
<div><h2>Confirmation of inquiry contacts</h2></div>
<div>
	<form action="confirm.php" method="post">
        <input type="hidden" name="name" value="<?php echo $name; ?>">
        <input type="hidden" name="furigana" value="<?php echo $furigana; ?>">
        <input type="hidden" name="email" value="<?php echo $email; ?>">
        <input type="hidden" name="tel" value="<?php echo $tel; ?>">
        <input type="hidden" name="item" value="<?php echo $item; ?>">
        <input type="hidden" name="content" value="<?php echo $content; ?>">
        <p class="confirm_p">お問い合わせ内容はこちらで宜しいでしょうか？<br>よろしければ「送信」ボタンを押して下さい。</p>
        <div>
            <div class="flex">
                <label>お名前<br>Name</label>
                <p class="name"><?php echo $name; ?></p>
            </div>
            <div class="flex">
                <label>ふりがな<br>Furigana</label>
                <p class="furi"><?php echo $furigana; ?></p>
            </div>
            <div class="flex">
                <label>メール<br>E-mail</label>
                <p class="e-mail"><?php echo $email; ?></p>
            </div>
            <div class="flex">
                <label>電話番号<br>Tel</label>
                <p class="tel"><?php echo $tel; ?></p>
            </div>
            <div class="flex">
                <label>項目<br>Item</label>
                <p class="item"><?php echo $item; ?></p>
            </div>
            <div class="flex">
                <label>内容<br>Contents</label>
                <p class="comment"><?php echo nl2br($content); ?></p>
            </div>
        </div>
        <div class="input_btn">
            <input type="button" value="修正/Correct" onclick="history.back(-1)">
            <button type="submit" name="submit">送信/Send</button>
        </div><!-- input_btn -->
	</form>
</div>
<footer>
    <p><small>&copy; 2022 coffee&nbsp;room&nbsp;Luke's</small></p>
</footer>
</body>
</html>