<?php

$insert = "(title, body, ".(!is_null($_POST['start'])) ? "" : "start, "."deadline";



$mysqli = mysqli_connect("localhost", "notice", "isdj_107", "notice");
$query = "INSERT INTO board (title, body, start, deadline)
          VALUES (\"{$_POST['title']}\", \"{$_POST['body']}\", {$_POST['start']}, {$_POST['deadline']})";
$mysqli->query($query);

echo $query.'<br>';

echo $_POST['title'].'<br>';
echo $_POST['body'].'<br>';
echo $_POST['deadline'].'<br>';

// header("Location: index.php");

?>
