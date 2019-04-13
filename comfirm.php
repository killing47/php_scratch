<?php
session_start();
if(isset($_POST['submit'])){
$_SESSION['user'] = [$_POST['name'],$_POST['email'],$_POST['password']];
}
?>

<!DOCTYPE html>
  <html lang = “ja”>
    <head>
      <meta charset = “UFT-8”>
      <title>フォームからデータを受け取る</title>
    </head>

    <body>
      <h1>フォームデータの送信</h1>
      <form action = "complete.php" method = "post">
        <label>お名前</label><br/>
        <p><?php echo $_POST['name']; ?></p>
        <label>Email</label><br/>
        <p><?php echo $_POST['email']; ?></p>
        <label>パスワード</label><br/>
        <p><?php echo $_POST['password']; ?></p>
        <input type = "submit" value ="送信">
      </form>
      <form action = "input.php" method = "get">
        <input type = "submit" value = "戻る">
      </form>
    </body>

</html>
　