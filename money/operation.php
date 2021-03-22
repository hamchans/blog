<?php
require_once(dirname(__FILE__).'/function.php');
session_name("hamsblog");
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
    <script type="text/javascript" src="/javascript/date.js"></script>
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
                    if (!isset($_SESSION['userName'])) {
                        print "ログインしていません．<br><br>";
                        print<<<EOS
                        <a href="login.php">ログイン画面へ</a><br>
                        <a href="register.php">ユーザ登録画面へ</a>
EOS;
                    } else {
                        print $_SESSION['userName']."でログイン中．<br><br>";
                        
                        try{
                            $dbh = connect();

                            print('<br>');

                            if ($dbh == null) {
                                print('接続に失敗しました。<br>');
                            } else {
                                print('接続に成功しました。<br>');
                                
                                /*
                                while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    print($result['account'].' : ');
                                    print($result['balance'].'<br>');
                                }
                                */
                                print<<<EOS
                                <select>
                                    <option value="select">選択してください</option>
                                    <option value="expense">出費</option>
                                    <option value="income">収入</option>
                                    <option value="investment">投資</option>
                                    <option value="transfer">振替</option>
                                </select>
EOS;
                                print<<<EOS
                                <br>
                                <h5>支出</h5>
                                <section id="expense">
                                    <form method="post" action="expense.php">
                                        <h7>日付</h7>
                                        <br>
                                        <script type="text/javascript">date();</script>
                                        <br>
                                        <h7>金額</h7>
                                        <br>
                                        <input type="number" name="amount">
                                        <br>
EOS;
                                print<<<EOS
                                        <h7>カテゴリー</h7>
                                        <br>
                                        <select name="category_select_id">
EOS;
                                            $sql = 'SELECT * FROM expense_category WHERE userId = ?';
                                            $stmt = $dbh->prepare($sql);
                                            $stmt->execute(array($_SESSION['userId']));

                                            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                print<<<EOS
                                                        <option value="{$result['id']}">
                                                        {$result['name']}
                                                        </option>
EOS;
                                            }

                                print<<<EOS
                                        </select>
                                        <br>
                                        <h7>口座</h7>
                                        <br>
                                        <select name="account_select_id">
EOS;
                                
                                            $sql = 'SELECT * FROM account WHERE userId = ?';
                                            $stmt = $dbh->prepare($sql);
                                            $stmt->execute(array($_SESSION['userId']));

                                            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                print<<<EOS
                                                        <option value="{$result['id']}">
                                                        {$result['name']}
                                                        </option>
EOS;
                                            }
                                
                                print<<<EOS
                                        </select>
                                        <br>
                                        <h7>店</h7>
                                        <br>
                                        <select name="store_select_id">
EOS;
                                
                                            $sql = 'SELECT * FROM store WHERE userId = ?';
                                            $stmt = $dbh->prepare($sql);
                                            $stmt->execute(array($_SESSION['userId']));

                                            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                print<<<EOS
                                                        <option value="{$result['id']}">
                                                        {$result['name']}
                                                        </option>
EOS;
                                            }
                                
                                print<<<EOS
                                        </select>
                                        <br>
                                        <h7>メモ</h7>
                                        <br>
                                        <input type="text" name="memo">
                                        <br>
                                        <input type="submit" value="追加">
                                    </form>
                                </section>
EOS;
                                print<<<EOS
                                <br>
                                <h5>収入</h5>
                                <section id="income">
                                    <form method="post" action="income.php">
                                        <h7>日付</h7>
                                        <br>
                                        <script type="text/javascript">date();</script>
                                        <br>
                                        <h7>金額</h7>
                                        <br>
                                        <input type="number" name="amount">
                                        <br>
EOS;
                                print<<<EOS
                                        <h7>カテゴリー</h7>
                                        <br>
                                        <select name="category_select_id">
EOS;
                                            $sql = 'SELECT * FROM income_category WHERE userId = ?';
                                            $stmt = $dbh->prepare($sql);
                                            $stmt->execute(array($_SESSION['userId']));

                                            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                print<<<EOS
                                                        <option value="{$result['id']}">
                                                        {$result['name']}
                                                        </option>
EOS;
                                            }

                                print<<<EOS
                                        </select>
                                        <br>
                                        <h7>口座</h7>
                                        <br>
                                        <select name="account_select_id">
EOS;
                                
                                            $sql = 'SELECT * FROM account WHERE userId = ?';
                                            $stmt = $dbh->prepare($sql);
                                            $stmt->execute(array($_SESSION['userId']));

                                            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                print<<<EOS
                                                        <option value="{$result['id']}">
                                                        {$result['name']}
                                                        </option>
EOS;
                                            }
                                
                                
                                print<<<EOS
                                        </select>
                                        <br>
                                        <h7>メモ</h7>
                                        <br>
                                        <input type="text" name="memo">
                                        <br>
                                        <input type="submit" value="追加">
                                    </form>
                                </section>
EOS;
                                
                                print<<<EOS
                                <br>
                                <h5>投資</h5>
                                <section id="investment">
                                    <form method="post" action="investment.php">
                                        <h7>日付</h7>
                                        <br>
                                        <script type="text/javascript">date();</script>
                                        <br>
                                        <h7>金額</h7>
                                        <br>
                                        <input type="number" name="amount">
                                        <br>
EOS;
                                }

                                print<<<EOS
                                <br>
                                        <h7>口座</h7>
                                        <br>
                                        <select name="account_select_id">
EOS;
                                
                                            $sql = 'SELECT * FROM account WHERE userId = ?';
                                            $stmt = $dbh->prepare($sql);
                                            $stmt->execute(array($_SESSION['userId']));

                                            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                print<<<EOS
                                                        <option value="{$result['id']}">
                                                        {$result['name']}
                                                        </option>
EOS;
                                            }
                                
                                
                                print<<<EOS
                                        </select>
                                        <br>
                                        <h7>メモ</h7>
                                        <br>
                                        <input type="text" name="memo">
                                        <br>
                                        <input type="submit" value="追加">
                                    </form>
                                </section>
EOS;
                            
                                print<<<EOS
                                <br>
                                <h5>振替</h5>
                                <section id="transfer">
                                    <form method="post" action="transfer.php">
                                        <h7>日付</h7>
                                        <br>
                                        <script type="text/javascript">date();</script>
                                        <br>
                                        <h7>金額</h7>
                                        <br>
                                        <input type="number" name="amount">
                                        <br>
EOS;

                                print<<<EOS
                                        <br>
                                        <h7>送金元口座</h7>
                                        <br>
                                        <select name="source_account_id">
EOS;
                                
                                            $sql = 'SELECT * FROM account WHERE userId = ?';
                                            $stmt = $dbh->prepare($sql);
                                            $stmt->execute(array($_SESSION['userId']));

                                            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                print<<<EOS
                                                        <option value="{$result['id']}">
                                                        {$result['name']}
                                                        </option>
EOS;
                                            }
                        
                                print<<<EOS
                                        </select>
                                        <br>
                                        <h7>送金先口座</h7>
                                        <br>
                                        <select name="destination_account_id">
EOS;
                                
                                            $sql = 'SELECT * FROM account WHERE userId = ?';
                                            $stmt = $dbh->prepare($sql);
                                            $stmt->execute(array($_SESSION['userId']));

                                            while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                print<<<EOS
                                                        <option value="{$result['id']}">
                                                        {$result['name']}
                                                        </option>
EOS;
                                            }
                                
                                
                                print<<<EOS
                                        </select>
                                        <br>
                                        <h7>メモ</h7>
                                        <br>
                                        <input type="text" name="memo">
                                        <br>
                                        <input type="submit" value="追加">
                                    </form>
                                </section>
                                <a href="main.php">メイン画面へ戻る</a>
EOS;
                                
                                
                        } catch (PDOException $e) {
                            print('Error:'.$e->getMessage());
                            die();
                            print<<<EOS
                            <a href="index.php">ホームに戻る</a>
EOS;
                        }
                    }
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