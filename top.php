<?php
  session_start();
  if(isset($_POST['submit'])){
    $_SESSION = array();
    if (isset($_COOKIE["PHPSESSID"])) {
      setcookie("PHPSESSID", '', time() - 1800, '/');
    }
    session_destroy();
  }
?>

<!DOCTYPE html>
  <html lang = "ja">
  <head>
    <meta charset = "UTF-8">
    <title>EC＿SITE</title>
  </head>
  <body>
    <h1>トップ画面</h1>
    <p>
      <?php
        if(empty($_SESSION['user'])){
          echo '<form action = "input.php" method = "post">
                  <input type = "submit" value = "新規登録">
                </form>' ;
        }else{
          if(!empty($_SESSION['user'][0])){
             echo $_SESSION['user'][0].'ログイン済みです';
             echo '<form action = "" method = "post">
                　   <input type = "submit" name="submit" value ="ログアウトする">
                   </form>';
          }else{
            echo $_SESSION['user']['name'].'ログイン済みです';
            echo '<form action = "" method = "post">
                　  <input type = "submit" name="submit" value ="ログアウトする">
                  </form>';
          }
        }
        ?>
      </p>

      <script>
        alert('hello,world');
      </script>
  </body>
</html>


