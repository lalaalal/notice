<?php
$mysqli = mysqli_connect("localhost", "notice", "isdj_107", "notice");
$query = "SELECT * FROM board WHERE DATE(date) = CURDATE()";
$res = $mysqli->query($query);

echo "today<br>";

if ($res->num_rows == 0) {
  echo "nothing";
} else {
  for ($i = 0; $i < $res->num_rows; $i++) {
    $row = mysqli_fetch_assoc($res);
    echo "{$row['title']}<br>";
    echo "{$row['body']}<br>";
    echo "{$row['date']}<br>";
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
    <form action="insert.php" method="post">
      <p><input type="text" name="title" value=""></p>
      <p><textarea name="body" rows="8" cols="80"></textarea></p>
      <p><input type="datetime" name="start" value=""><input type="datetime" name="deadline" value=""></p>
      <input type="submit" name="" value="">
    </form>
  </body>
</html>
