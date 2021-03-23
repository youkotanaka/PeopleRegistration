<?php
        $url = parse_url(getenv("DATABASE_URL"));
        $dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'], 1));
        try {
            $pdo = new PDO($dsn, $url['user'], $url['pass']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $LastName = $_POST["LastName"];
            $FirstName = $_POST["FirstName"];
            $email = $_POST["email"];
            
            $sql = "INSERT INTO people(lastname,firstname,email) VALUES('$LastName','$FirstName','$email')";
            if (preg_match("/^[ァ-ヶー]+$/u", $LastName) && preg_match("/^[ァ-ヶー]+$/u", $FirstName)) {
            $stmh = $pdo->prepare($sql);
            $stmh->execute();
            print "登録しました。<br>";
            include ("./show.php");
                } else {
                    print "姓名はカタカナで入力してください。<br>";
                    include ("./index.php");
                }
        } catch (PDOException $Exception) {
            die('エラー１：'.$Exception->getMessage());
        }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登録結果</title>
</head>
<body>
</body>
</html>