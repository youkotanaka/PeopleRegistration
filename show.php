<?php
    $url = parse_url(getenv("DATABASE_URL"));
    $dsn = sprintf('pgsql:host=%s;dbname=%s', $url['host'], substr($url['path'], 1));
    try {
        $pdo = new PDO($dsn, $url['user'], $url['pass']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
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
<table border = "1">
    <caption>登録会員一覧です。</caption>
    <tbody>
        <tr><th>id</th><th>姓</th><th>名</th><th>メールアドレス</th></tr>
            <?php
                $all_list = $pdo->query("SELECT * FROM people");
                foreach ($all_list as $row) {
            ?>
        <tr>
            <td><?=htmlspecialchars($row['id'], ENT_QUOTES)?></td>
            <td><?=htmlspecialchars($row['lastname'], ENT_QUOTES)?></td>
            <td><?=htmlspecialchars($row['firstname'], ENT_QUOTES)?></td>
            <td><?=htmlspecialchars($row['email'], ENT_QUOTES)?></td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>
<?php
    print "<form action='index.php'><input type='submit' value='登録画面へ戻る'></form>";
?>
</body>
</html>