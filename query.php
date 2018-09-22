<form class="" action="#" method="post">
  <input type="text" name="query">
</form>

<?php
if (isset($_POST['query'])) {
  echo $_POST['query'];

  $mysqli = mysqli_connect("localhost", "notice", "isdj_107", "notice");
  $mysqli->query($_POST['query']);
}
?>
