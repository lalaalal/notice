<?php

$mysqli = mysqli_connect("localhost", "notice", "isdj_107", "notice");
$query = "SELECT * FROM admin WHERE id = \"{$_POST['id']}\"";
$result = $mysqli->query($query);

if ($result->num_rows == 1) {
  $row = mysqli_fetch_assoc($result);
  var_dump($row);
  if (password_verify($_POST['pw'], $row['pw'])) {
    echo "success";
    session_start();
    $_SESSION['id'] = $_POST['id'];
  }
}
header("Location: index.php");
?>
