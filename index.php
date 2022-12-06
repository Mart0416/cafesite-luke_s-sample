<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="心と体が落着き休まる、贅沢な時間と空間をあなたに">
    <meta name="robots" content="noindex" />
    <meta name="robots" content="nofollow" />
    <title>喫茶室 Luke's</title>
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
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/inview.css">
</head>
<body>
<header>
    <div id="top" class="header_wrapper_wrapper">
        <div class="header_wrapper">
            <div class="header_logo_wrap">
                <a class="header_link" href="#top">
                    <div class="header_logo">
                        <img src="images/logo_sita.png" alt="header_logo">
                    </div><!-- header_logo -->
                </a><!-- header_link -->
                <h1>喫茶室 Luke's</h1>
            </div><!-- header_logo_wrap -->
            <input type="checkbox" class="check" id="btn_open">
            <label class="btn_menu" for="btn_open">
                <span></span>
                <span></span>
                <span></span>
            </label>
            <div id="gnav">
                <nav class="nav_wrapper">
                    <ul class="header_nav">
                        <li><a href="#top">TOP</a></li>
                        <li><a href="#news">News</a></li>
                        <li><a href="#commitment">Commitment</a></li>
                        <li><a href="#trivia">Trivia</a></li>
                        <li><a href="#menu">Menu</a></li>
                        <li><a href="#gallery">Gallery</a></li>
                        <li><a href="#info">Information</a></li>
                    </ul><!-- header_nav -->
                </nav><!-- nav_wrapper -->
            </div><!-- #gnav -->
        </div><!-- header_wrapper -->
        <div class="main_image">
            <img src="images/mainVisual_n2.jpg" alt="mainVisual">
        </div><!-- main_image -->
    </div><!-- header_wrapper_wrapper -->
</header>
<main>
    <section id="news" class="news_wrapper">
        <h2 class="ja_sec">当店からのお知らせ</h2>
        <h2 class="en_sec">News</h2>
<?php
require("luke_sMasterSite/DBconnect.php");

$sql = "SELECT * FROM news order by udate DESC";
$result = $dbInfo->query ( $sql );
if(!$result){print "予期せぬエラーnews table nothing<br>"; exit;}
$cnt = $result->rowCount ();
if($cnt<=0){echo "<div style='font-weight:bold;'>無い<br></style>";
	exit;
}else{
    echo "<dl class='new_arrival'>";
	foreach ( $result as $row ) {
		$udate=$row["udate"];
		$day = new DateTime($udate);
		$udate=$day->format('Y年m月d日');
		$title=$row["title"];
		echo "<div class='under_line'>";
				echo "<dt>{$udate}</dt>";
				echo "<dd>{$title}</dd>";
		echo "</div>";
	}
echo "</dl>"; 
}
?>

        <p class="btn_more"><a class="link_news" href=".//luke_sMasterSite/gzShow_nomas.php">＞　もっと見る／See more</a></p>
    </section><!-- news_wrapper -->
    <section id="commitment" class="commit_wrapper">
        <div class="fade">
            <h2 class="ja_sec">当店のこだわり</h2>
            <h2 class="en_sec">Commitment</h2>
        </div>
        <div class="commit_box_wrap">
            <div class="fade">
                <div class="commit_box1">
                    <div class="commit_image1">
                        <img src="images/namamame.jpg" alt="row_beans">
                    </div><!-- commit_image1 -->
                    <div class="commit_desc1">
                        <div class="commit_com_wrap">
                            <h3 class="commit_title1">品質へのこだわり</h3>
                            <p>コーヒー豆は、世界各国いろいろな地方で栽培されておりますが、同じ種類の豆でも気候や栽培方法によって味が異なり、また保存状態などでも味が変化します。</p>
                            <p class="desc1_comment1">コーヒー豆はそれぞれランクごとに分類されていますが、当店では、スペシャリティコーヒーのみをご提供させていただいております。</p>
                            <h3 class="commit_title2">スペシャリティコーヒー</h3>
                            <p class="desc1_comment2">スペシャルティコーヒーとは、味や香りなど決められた評価基準を満たし、コーヒー豆の体制・工程・品質管理が徹底された品質の高い生豆のことで、生産量の約5％～8％と言われており、一般的なコーヒーショップで味わえる事は少なく、当店自慢の一品となっておりますので、是非、ご賞味ください。</p>
                        </div><!-- commit_com_wrap -->
                    </div><!-- commit_desc1 -->
                </div><!-- commit_box1 -->
            </div><!-- fade -->
            <div class="fade">
                <div class="commit_box2">
                    <div class="commit_desc2">
                        <div class="commit_com_wrap2">
                            <h3 class="commit_title3">鮮度へのこだわり</h3>
                            <p>どんなに最高のコーヒー豆であっても新鮮でなければ、おいしいコーヒーにはなりません。コーヒー豆は生豆であれば半年から１年以上たっても味が落ちませんが、焙煎される事により酸化が進みます。</p>
                            <p class="desc2_comment1">当店では、焙煎したての豆を提供しております。</p>
                            <h3 class="commit_title4">焙煎へのこだわり</h3>
                            <p class="desc2_comment2">コーヒー豆は産地によって酸味、苦味、甘み、コクなどそれぞれに個性があります。<br>
                            酸味の強いもの、苦味の強いものなど、生豆本来の持ち味を上手に引き出しながら味や香りを仕上げるのがロースト(焙煎)です。<br> 
                            焙煎によって、もちろんコーヒーの味は変わってきます。</p>
                        </div><!-- commit_com_wrap2 -->
                    </div><!-- commit_desc2 -->
                    <div class="commit_image2">
                        <img src="images/irimame.jpg" alt="roasted_beans">
                    </div><!-- commit_image2 -->
                </div><!-- commit_box2 -->
            </div><!-- fade -->
        </div><!-- commit_box_wrap -->
    </section><!-- commit_wrapper -->
    <section id="trivia" class="trivia_wrapper">
        <div class="fade">
            <h2 class="ja_sec">コーヒーの健康効果</h2>
            <h2 class="en_sec">Trivia</h2>
        </div><!-- fade -->
        <div class="fade">
            <div class="trivia_desc_wrap">
                <div class="trivia_desc1">
                    <h3 class="trivia_comment1">コーヒーに含まれるカフェインの効果</h3>
                        <p class="trivia_contents1">よく知られているカフェインの効果は覚醒作用です。カフェインの覚醒作用により、頭をすっきりさせて集中力を高める効果があります。<br>
                        また、利尿効果があり、体内の老廃物の排出を促進させる効果があります。他にも、中枢神経を刺激して、自律神経の働きを高めたり、運動能力を向上させたり、心臓の筋肉の収縮力を強化させたりするなど、コーヒーに含まれるカフェインには、多彩な効果をもっています。</p>
                    <h3 class="trivia_comment1">リラックス効果</h3>
                        <p class="trivia_contents1_2">もう一つ、コーヒーの健康の効果で忘れてはならないものは、コーヒーのリラックス効果です。コーヒーの良い香りを嗅ぐと気持ちがほっとしませんか？</p>
                        <p class="trivia_contents1_3">おいしいコーヒーを飲んでリラックスして、ストレスを解消することは、健康のためにも大切なことです。</p>
                </div><!-- trivia_desc1 -->
                <div class="trivia_desc2">
                    <h3 class="trivia_comment2">コーヒーに含まれるポリフェノールの効果</h3>
                        <p class="trivia_contents2">コーヒーには、カフェイン以上にポリフェノールがたくさん含まれていることが知られています。<br>
                        近年、ポリフェノールを豊富に含む赤ワインをよく飲んでいるフランス人は心疾患での死亡率が低いことがわかりました。</p>
                        <p class="trivia_contents2_2">赤ワインに含まれるポリフェノールが体に良いと言う事で注目されるようになりましたが、実はコーヒーにも赤ワインに匹敵する量のポリフェノールが含まれています。</p>
                        <p class="trivia_contents2_3">ポリフェノールは、植物が持つ苦味や色素の成分で、活性酸素などから体を守る抗酸化作用の強い成分です。</p>
                        <p class="trivia_contents2_4">そのため、ポリフェノールは活性酸素が引き金となって起こる癌や動脈硬化、心筋梗塞などの生活習慣病の予防に効果があります。</p>
                </div><!-- trivia_desc2 -->
            </div><!-- trivia_desc_wrap -->
        </div><!-- fade -->
    </section><!-- trivia_wrapper -->
    <section id="menu" class="menu_wrapper">
        <div class="drink_wrapper">
            <div class="fade">
                <div class="manu">
                    <h2 class="ja_sec_m">メニュー</h2>
                    <h2 class="en_sec_m">Menu</h2>
                </div><!-- manu -->
            </div><!-- fade -->
            <div class="fade">
                <div class="drink">
                    <h2 class="ja_sec_d">ドリンク</h2>
                    <h2 class="en_sec_d">Drink</h2>
                </div><!-- drink -->
            </div><!-- fade -->
            <div class="fade">
                <div class="drink_menu_wrap">
                    <div class="drink_menu_left_wrap">
                        <ul class="drink_menu_left">
                            <li>・本日のコーヒー<span class="break">／Today's coffee</span></li>
                            <li>・ブレンド／Brend</li>
                            <li>・アイスコーヒー<span class="break">／Iced coffee</span></li>
                            <li>・カフェオレ<span class="break">／Cafe au lait</span></li>
                            <li>・ミルクブリュー<span class="break">／Milk brew</span></li>
                        </ul><!-- drink_menu_right -->
                    </div><!-- drink_menu_left_wrap -->
                    <div class="drink_menu_right_wrap">
                        <ul class="drink_menu_right">
                            <li>・アメリカンコーヒー<span class="break-a break">／American coffee</span></li>
                            <li class="break-a-2">・アメリカーノ<span class="break">／Americano</span></li>
                            <li>・エスプレッソ<span class="break">／Espresso</span></li>
                            <li>・エスプレッソ<span class="break-s1">マキアート</span><span class="break-s2">／Espresso Macchiato</span></li>
                            <li class="break-a-2">・フラットホワイト<span class="break">／Flat white</span></li>
                        </ul><!-- drink_menu_left -->
                    </div><!-- drink_menu_right_wrap -->
                </div><!-- drink_menu_wrap -->
                <p class="tansan">※お口直しのミネラル炭酸水が付きます。</p>
            </div><!-- fade -->
        </div><!-- drink_wrapper -->
        <div class="food_wrapper">
            <div class="fade">
                <div class="food">
                    <h2 class="ja_sec_f">フード</h2>
                    <h2 class="en_sec_f">Food</h2>
                </div><!-- food -->
            </div><!-- fade -->
            <div class="fade">
                <div class="food_menu_wrap">
                    <div class="food_menu_left_wrap">
                        <ul class="food_menu_left">
                            <li>・トースト／Toast</li>
                            <li>　バター／Butter</li>
                            <li>　はちみつ／Honey</li>
                            <li>　シナモン<span class="break-2">／Cinnamon</span></li>
                            <li>・3種のチョコレート<span class="break-2c break-2s">／3 kinds of chocolate</span></li>
                            <li class="break-2-a">　ホワイト／White</li>
                            <li>　ミルク／milk</li>
                            <li>　ビター／bitter</li>
                        </ul><!-- food_menu_left -->
                    </div><!-- food_menu_left_wrap -->
                    <div class="food_menu_right_wrap">
                        <ul class="food_menu_right">
                            <li>・自家製ミックスナッツ<span class="break-2c break-2s">／Roasted mixed nuts</span></li>
                            <li class="break-2-a">　アーモンド<span class="break-2">／Almond</span></li>
                            <li>　カシューナッツ<span class="break-2">／Cashew nuts</span></li>
                            <li>　クルミ<span class="break-2">／Walnut</span></li>
                            <li>　ピスタチオ<span class="break-2">／Pistachio</span></li>
                            <li>　マカダミアナッツ<span class="break-2c break-2">／Macadamia nuts</span></li>
                        </ul><!-- food_menu_right -->
                    </div><!-- food_menu_right_wrap -->
                </div><!-- food_menu_wrap -->
            </div><!-- fade -->
        </div><!-- food_wrapper -->
    </section><!-- menu_wrapper -->
    <section id="gallery" class="gallery_wrapper">
        <div class="fade">
            <div class="gallery">
                <h2 class="ja_sec_g">壁面ギャラリー・ギャラリーボックス</h2>
                <h2 class="en_sec_g">Gallery</h2>
            </div><!-- gallery -->
        </div><!-- fade -->
        <div class="gallery_com_wrap">
        <div class="fade">
            <div class="gallery_comment">
                <p class="gallery_disc">店内壁面、店頭のギャラリーボックスを貸し出ししています。</p>
                <p class="gallery_disc">○○からのアクセスもよい○○駅から徒歩1分の路面店は目を引く立地で集客力抜群！</p>
                <p class="gallery_disc">ご自身の作品や製品などの展示＆販売場所として是非、ご利用ください。</p>
            </div><!-- gallery_comment -->
        </div><!-- fade --> 
        <div class="fade">
            <p class="btn_gallery">
                <a class="gallery_link" href="gallery.html">＞　詳細はこちら<span class="clickHere">／Click here for details</span></a>
            </p>
        </div><!-- fade --> 
        </div><!-- gallery_com_wrap -->
    </section><!-- gallery_wrapper -->
    <section id="info" class="info_wrapper">
        <div class="fade">
            <div class="information">
                    <h2 class="ja_sec_i">店舗情報</h2>
                    <h2 class="en_sec_i">Information</h2>
            </div><!-- information -->
        </div><!-- fade -->
        <div class="slideIn_dtu">
            <div class="info_wrap">
                <div class="info_wrap_left">
                    <div class="info_logo_wrap">
                        <div class="info_logo">
                            <img src="images/logo_sita.png" alt="information_logo">
                        </div><!-- info_logo -->
                        <p>喫茶室 Luke's</p>
                    </div><!-- info_logo_wrap -->
                    <div class="info_image">
                        <img src="images/tennnai.jpg" alt="inside_of_shop">
                    </div><!-- info_image -->
                    <p class="btn_contact"><a class="contact_link" href="contactFormLuke_s/input.php">お問い合わせフォーム／Contact Us</a></p>
                </div><!-- info_wrap_left -->
                <div class="info_wrap_right">
                    <div class="info_wrap_wrap_right">
                        <div class="info_flex_left">
                            <dl>
                                <div class="info">
                                    <dt>電話／Tel</dt>
                                    <dd>000-0000</dd>
                                </div>
                                <div class="info">
                                    <dt>メール／mail</dt>
                                    <dd>marumaru@marumaru.com</dd>
                                </div>
                                <div class="info">
                                    <dt>営業時間／Business hours</dt>
                                    <dd>7：00　～　22：00</dd>
                                </div>
                            </dl>
                        </div><!-- info_flex_left -->
                        <div class="info_flex_right">
                            <dl>
                                <div class="info">
                                    <dt>定休日／Regular holiday</dt>
                                    <dd>日・祝</dd>
                                </div>
                                <div class="info">
                                    <dt>住所／Adress</dt>
                                    <dd>〇〇県〇〇市〇〇区<span class="info-break">〇丁目〇〇番地〇号</span></dd>
                                </div>
                                <div class="info">
                                    <dt>席数／Namber of seat</dt>
                                    <dd>15</dd>
                                </div>
                            </dl>
                        </div><!-- info_flex_right -->
                    </div><!-- info_wrap_wrap_right -->
                </div><!-- info_wrap_right -->
            </div><!-- info_wrap -->
        </div><!-- slideIn_dtu -->
        <div class="g_map" id="page_info">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3280.672445971883!2d135.19094511508277!3d34.68821558043757!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sja!2sjp!4v1655795000865!5m2!1sja!2sjp" width="960" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div><!-- g_map page_info -->
    </section><!-- info_wrapper -->
</main>
<footer>
    <p><small>&copy; 2022 coffee&nbsp;room&nbsp;Luke's</small></p>
</footer>
<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/smooth_scroll.js"></script>
<script src="js/jquery.inview.min.js"></script>
<script src="js/inview_op.js"></script>
</body>
</html>