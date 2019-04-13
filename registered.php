<?php
$errors = array();
session_start();
if(isset($_POST['submit'])){
  if(empty($_POST['name'])){
    $errors[] ='name' ;
  }
  if(empty($_POST['password'])){
    $errors[] = 'password' ;
  }
if (!empty($_POST["name"]) && !empty($_POST["password"]) && empty($errors)) {
    $pdo=new PDO('mysql:host=localhost;dbname=ec_site;charset=utf8','root','');
    $user_name = $_POST["name"];
    $query = "SELECT * FROM user WHERE name = '$user_name' ";
    $result = $pdo->query($query);
    // query だと一回で呼び出し実行が出来る
    // prepare 呼び出し
    // excute 実行
    $data = $result->fetch(PDO::FETCH_ASSOC);
    $data_password = $data["password"];
     if ($_POST["password"] == $data_password) {
      session_regenerate_id(true);
      $_SESSION["user"] = $data;
      header('Location: http://localhost/ec_site/top.php');
      exit;
    } else {
      echo  "ユーザIDあるいはパスワードに誤りがあります。";
    }
  }
}
?>

<!DOCTYPE html>
  <html lang = "ja">
  <head>
    <meta charset = "UTF-8">
    <title>EC_SITE</title>
  </head>
  <body>
    <h1>ログイン画面</h1>
    <p>
    <?php
      foreach($errors as $error){
        echo $error.'入力してください。' ;
      }
    ?>
    </p>
    <form action = "" method = "post">
      <label>お名前</label><br/>
      <input type = "text" name ="name"><br/>
      <label>パスワード</label><br/>
      <input type = "text" name ="password"><br/>
      <input type = "submit" name="submit" value ="ログインする">
    </form>
    <form action = "input.php" method = "get">
      <input type = "submit" value = "新規登録">
    </form>
  </body>
</html>
