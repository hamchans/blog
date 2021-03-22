<?php
require_once(dirname(__FILE__).'/function.php');
session_name("hamstask");
session_start();
?>

<!DOCTYPE html>
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-182309022-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-182309022-1');
    </script>
    
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/css/index.css">
    <link rel="stylesheet" type="text/css" href="/css/calendar.css">
    <script type="text/javascript" src="/javascript/header.js"></script>
    <script type="text/javascript" src="/javascript/lastUpdate.js"></script>
    <script type="text/javascript" src="/javascript/rightSideNavi.js"></script>
    <script type="text/javascript" src="/javascript/calendar.js"></script>
    <style type="text/css"></style>
    <title>ホーム</title>
</head>
<body>
    <script type="text/javascript">header();</script>
    <hr>
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-md-9">
                <br>
                <div class="last_update">
                    <script type="text/javascript">last_update();</script>
                </div>
                <div id="contents">
                    <?php
                    
        
                    $userName = $_POST['userName'];
                    $pwd1 = $_POST['pwd1'];
                    $pwd2 = $_POST['pwd2'];

                    try{
                        $dbh = connect();

                        print('<br>');

                        if ($dbh == null) {
                            print('接続に失敗しました。<br>');
                        } else {
                            print('接続に成功しました。<br>');
                            $sql = 'SELECT * FROM users WHERE userName = ?';
                            $stmt = $dbh->prepare($sql);
                            $stmt->execute(array($userName));
                            
                            $row_count = $stmt->rowCount();
                            
                            if ($row_count != 0) {
                                print<<<EOS
                                そのユーザ名は既に使用されています．<br>
                                <a href="register.php">ユーザ登録画面へ戻る</a>
EOS;
                            } else {
                                if ($pwd1 != $pwd2) {
                                    print<<<EOS
                                    パスワードが一致しません．<br>
                                    <a href="register.php">ユーザ登録画面へ</a>
EOS;
                                } else {
                                    $hashpwd = password_hash($pwd1, PASSWORD_DEFAULT);
                                    $sql1 = 'INSERT INTO users(userName, pwd) VALUES (?, ?)';
                                    $stmt = $dbh->prepare($sql1);
                                    $stmt->execute(array($userName, $hashpwd));
                                    
                                    $sql2 = 'SELECT userId FROM users WHERE userName = ?';
                                    $stmt = $dbh->prepare($sql2);
                                    $stmt->execute(array($userName));
                                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                                    
                                    $_SESSION['userName'] = $userName;
                                    $_SESSION['userId'] = $result['userId'];
                                    
                                    print<<<EOS
                                    登録完了<br>
                                    <a href="main.php">メインページへ</a>
EOS;
                                }
                            }
                        }
                        

                    } catch (PDOException $e) {
                        print('Error:'.$e->getMessage());
                        die();
                        print<<<EOS
                        <a href="index.php">ホームに戻る</a>
EOS;
                    }

                    $dbh = null;

                    ?>
                </div>
            </div>
            <div class="col-md-3 d-none d-sm-block">
                <div class="sidebar">
                    <script type="text/javascript">rightSide();</script>
                    <div id="calendar"><script type="text/javascript">calendar();</script></div>
                </div>
            </div>
        </div>
    </div>
</body>