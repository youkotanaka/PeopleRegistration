<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録</title>
</head>
<body>
    <div style="font-size:18px;">会員登録</div>
    <form name="form" method="post" action="registrate.php">
        <p>姓（カナ）：<input type="text" name="LastName" required></p>
        <p>名（カナ）：<input type="text" name="FirstName" required></p>
        <p>メールアドレス：<input type="email" name="email" required></p>
        <input type="submit" value="登録">
    </form>
    <form action="show.php">
        <input type="submit" value="一覧表示">
    </form>
</body>
</html>