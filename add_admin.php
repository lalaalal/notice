<?php
if ($_POST['id'] != '') {
  $mysqli = mysqli_connect("localhost", "notice", "isdj_107", "notice");

  $query = "SELECT * FROM admin WHERE BINARY id='{$_POST['id']}'";
  $result = $mysqli->query($query);
  if ($result->num_rows == 1) {
    echo "already exist<br>";
  } else {
    $hashed_pw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
    $query = "INSERT INTO admin (id, pw) VALUES (\"{$_POST['id']}\", \"{$hashed_pw}\")";
    if ($mysqli->query($query)) {
      echo $_POST['id']."<br>";
      echo $_POST['pw']."<br>";
      echo "sign up success<br>
            <a href=\"/\">Go Back</a>";
    } else {
      echo "sign up failed<br>";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="#" method="post">
      <input type="text" name="id">
      <input type="password" name="pw">
      <input type="submit" value="add">
    </form>
  </body>
</html>
