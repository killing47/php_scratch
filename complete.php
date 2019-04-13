<?php
session_start();
$pdo=new PDO('mysql:host=localhost;dbname=ec_site;charset=utf8','root','');
$user_dates = $_SESSION['user'];
$sql=$pdo->prepare("INSERT INTO user(name,email,password) VALUES(:name,:email,:password)") ;
$sql->bindValue(':name', $user_dates[0], PDO::PARAM_STR);
$sql->bindValue(':email', $user_dates[1], PDO::PARAM_STR);
$sql->bindValue(':password', $user_dates[2], PDO::PARAM_STR);
$sql->execute();
$pdo = NULL;
?>

<!DOCTYPE html>
  <html lang = “ja”>
    <head>
      <meta charset = “UFT-8”>
      <title>フォームからデータを受け取る</title>
    </head>

    <body>
      <h1>登録完了しました！</h1>
      <!-- <?php foreach($user_dates as $user){
      echo $user;
      }
      ?> -->
      <form action = "top.php" method = "post">
        <input type = "submit" value = "Top">
      </form>

    </body>
</html>
　