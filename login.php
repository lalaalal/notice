<?php

$mysqli = mysqli_connect("localhost", "notice", "isdj_107", "notice");
$query = "SELECT * FROM admin WHERE id = \"{$_POST['id']}\"";
$result = $mysqli->query($query);

if ($result->num_rows == 1) {
  $row = mysqli_fetch_assoc($result);
  if (password_verify($_POST['pw'], $row['pw'])) {
    echo "success<br>";
    session_start();
    $_SESSION['id'] = $_POST['id'];
    header("Location: /home");
  }
} else {
  echo "No match id<br>";
}
echo "<a href=\"/home\">Go Back<a>";
?>
