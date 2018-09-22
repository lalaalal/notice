<?php
$mysqli = mysqli_connect("localhost", "notice", "isdj_107", "notice");
$query = "SELECT * FROM category";
$result = $mysqli->query($query);

if (!isset($_GET['page'])) {
  $proc = 'home';
} else {
  $proc = $_GET['page'];
}
?>

<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, user-scalable=no"> -->
    <link rel="stylesheet" href="./css/master.css">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic" rel="stylesheet">
    <title>7반 알림장</title>
  </head>
  <body>
    <header>
      <div class="title tile"><a href="/">7반 알림장</a></div>
      <nav>
<?php
for ($i = 0; $i < $result->num_rows; $i++) {
  $category = mysqli_fetch_assoc($result);
  echo "      <span class=\"tile\"><a href=\"?page={$category['id']}\">{$category['name']}</a></span>\n";
}
?>
      </nav>
      <span class="tile">
        <img class="login_icon" src="/images/login.svg" alt="login">
        <a href="?page=login">반장 로그인</a>
      </span>
      <!-- <form class="search" action="#" method="post">
        <input class="tile" type="text" name="search" placeholder="검색어를 입력하세요." autocomplete="off">
        <input class="tile" type="submit" value="검색">
      </form> -->
    </header>
<?php require("./main/$proc.php") ?>
    <footer>
      <a class="git" href="https://github.com/lalaalal/notice" target="_blank">
        <img src="./images/github.svg" alt="github">
        GitHub
      </a>
    </footer>
  </body>
</html>
