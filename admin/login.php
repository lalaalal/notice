<?php
if (isset($_POST['id'])) {
  $mysqli = mysqli_connect("localhost", "notice", "isdj_18_107_notice", "notice");
  $query = "SELECT * FROM admin WHERE id='{$_POST['id']}'";
  $res = $mysqli->query($query);

  var_dump($query);
  if ($res->num_rows == 1) {
    $row = mysqli_fetch_assoc($res);
    if (password_verify($_POST['pw'], $row['pw'])) {
      session_start();
      $_SESSION['id'] = $row['id'];
      $_SESSION['cert'] = $row['pw'];
      header('Location: /admin/index.php');
      exit();
    }
    $res = "일치하는 정보가 없습니다.";
  }
} else {
  $rew = "";
  $req = "login";
}
require($_SERVER['DOCUMENT_ROOT'].'/index.php');
?>
