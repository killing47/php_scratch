<?php
$errors = array();
session_start();
if(isset($_POST['submit'])){
  if(empty($_POST['name'])){
    $errors[] ='name' ;
  }
  if(empty($_POST['email'])){
    $errors[] = 'email' ;
  }
  if(empty($_POST['password'])){
    $errors[] = 'password' ;
  }
  if (!empty($_POST["name"]) && empty($errors)) {
    $pdo=new PDO('mysql:host=localhost;dbname=ec_site;charset=utf8','root','');
    $user_name = $_POST["name"];
    $query = "SELECT * FROM user WHERE name = '$user_name' ";
    $result = $pdo->query($query);
    // query だと一回で呼び出し実行が出来る
    // prepare 呼び出し
    // excute 実行
    $data = $result->fetch(PDO::FETCH_ASSOC);
    $data_name = $data["name"];
     if ($_POST["name"] == $data_name) {
      echo  "同じ名前があります。";
    } else {
      session_regenerate_id(true);
      $_SESSION["user"] = $data;
       header('Location: http://localhost/ec_site/comfirm.php',true,307);
       exit;
    }
  }
}


?>

<!DOCTYPE html>
  <html lang = "ja">
    <head>
      <meta charset = "UTF-8">
      <title>フォームからデータを受け取る</title>
    </head>
    <body>
      <h1>新規登録画面</h1>
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
        <label>Email</label><br/>
        <input type = "text" name ="email"><br/>
        <label>パスワード</label><br/>
        <input type = "text" name ="password"><br/>
        <input type = "submit" name="submit" value ="入力内容を確認する">
      </form>
      <form action = "registered.php" method = "get">
          <input type = "submit" value = "登録済みの方">
      </form>
    </body>
</html>



