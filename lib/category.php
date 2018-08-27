<?php

function get_categories() {
  $mysqli = mysqli_connect("localhost", "notice", "isdj_18_107_notice", "notice");
  $query = "SELECT * FROM category";
  $res = $mysqli->query($query);
  setcookie("index", $res->num_rows);
  for ($i = 0; $i < $res->num_rows; $i++) {
    $row = mysqli_fetch_assoc($res);
    setcookie("name_".$i, $row['name']);
    setcookie("href_".$i, $row['href']);

    echo $_COOKIE['name_'.$i]."<br>";
    echo $_COOKIE['href_'.$i]."<br>";
  }
}

function show_categories() {
  for ($i = 0; $i < $_COOKIE['index']; $i++) {
    echo "<li class=\"menu\"><a class=\"link\" href=\"index.php?category=".$_COOKIE['href_'.$i]."\">".$_COOKIE['name_'.$i]."</a></li>\n";
  }
}

?>
