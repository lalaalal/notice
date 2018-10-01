<?php
$mysqli = mysqli_connect("localhost", "notice", "isdj_107", "notice");

if ($_GET['id'] == '') {
  exit();
}

$query = "SELECT * FROM admin WHERE BINARY id='{$_GET['id']}'";
$result = $mysqli->query($query);
if ($result->num_rows == 1) {
  echo "already exist";
  exit();
}

$hashed_pw = password_hash($_GET['pw'], PASSWORD_DEFAULT);
$query = "INSERT INTO admin (id, pw) VALUES (\"{$_GET['id']}\", \"{$hashed_pw}\")";
if ($mysqli->query($query)) {
  echo "sign up success";
  header('Location: index.php');
} else {
  echo "sign up failed";
}
?>
