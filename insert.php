<?php

if ($_POST['start'] == NULL) {
  $_POST['start'] = 'NULL';
}

$mysqli = mysqli_connect("localhost", "notice", "isdj_107", "notice");
$query = "INSERT INTO board (title, body, start, deadline, category_id)
          VALUES (\"{$_POST['title']}\", \"{$_POST['body']}\", {$_POST['start']}, {$_POST['deadline']}, 1)";
$mysqli->query($query);

echo $query.'<br>';

echo $_POST['title'].'<br>';
echo $_POST['body'].'<br>';
echo $_POST['deadline'].'<br>';

// header("Location: index.php");

?>
