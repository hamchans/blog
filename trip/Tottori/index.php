<?php session_name("j182035k"); session_start(); ?>

<html>
    <head>
        <meta http-equiv="content-type" content="text/html"; charset="utf-8">
        <title>Top(情報工学実験)</title>
        <link rel="stylesheet" href="css/base.css" type="text/css">
    </head>
    <body>
        <div id="wrapper">
            <div id="header">
                <div id="header-inner">
                    <!-- キーワード -->
                    <h1>法律</h1>
                    <!-- ページの概要 -->
                    <p class="description">法律なんでも相談</p>
                    <!-- 企業名｜ショップ名｜タイトル -->
                    <p class="logo"><a href="index.php">行列のできない法律相談所</a></p>
                </div>
            </div>
        <!-- // header end -->
            <div id="container">
                <div id="contents">
                    <!-- コンテンツここから -->
                    <img src="./img/sample.jpg" width="100%">
                    <?php
                    if (!isset($_SESSION['login_name'])) {
                        print "ログインしていません。<br>";
                    } else {
                        print $_SESSION['login_name']."でログイン中<br>";
                    }
                    ?>
                    <br>
                    <p>このサイトは慶應義塾大学理工学部の情報工学実験のために作成したものです。実際に法律相談はできません。</p>
                    <h2>行列のできない法律相談所について</h2>
                    <p>このサイトは一般ユーザが弁護士などの法律の専門家に法律に関する相談ができるQ&Aサイトです。</p>
                    <p>日本テレビ「行列のできる法律相談所」とは一切関係ありません。</p>
                    <p>また、このサイトは情報工学実験用のサイトであり、実際に法律相談ができるわけではありません。セキュリティ対策は行っていますが、誤って実際の個人情報を入力しないようにご注意ください。</p>

                <!-- コンテンツここまで -->
                </div>
                <!-- // contents end -->

                <div id="sidebar">
                <!-- サイドバーここから -->
                    <?php include("sidebar.php"); ?>
                <!-- サイドバーここまで -->
                </div>
                <!-- // sidebar end -->
                <!-- ↓削除不可 -->
                <p id="cds">Designed by <a href="http://www.css-designsample.com/">CSS.Design Sample</a></p>
            </div>
        </div>
        <div id="footer">
        <!-- コピーライト / 著作権表示 -->
        <p>Copyright &copy; 行列のできない法律相談所. All Rights Reserved.</p>
        </div>
    </body>
</html>