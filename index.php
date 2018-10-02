<?php
session_start();

$mysqli = mysqli_connect("localhost", "notice", "isdj_107", "notice");
$query = "SELECT * FROM category";
$result = $mysqli->query($query);

if (!isset($_GET['page'])) {
  $proc = 'home';
} else {
  $proc = $_GET['page'];
}
// echo $_GET['page'];
// echo $_GET['param'];
?>

<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, user-scalable=no"> -->
    <meta name="description" content="일산 대진 고등학교 1학년 7반 알림장">
    <link rel="stylesheet" href="/css/master.css">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic" rel="stylesheet">
    <title>7반 알림장</title>
  </head>
  <body>
    <header>
      <div class="title tile"><a href="/home">7반 알림장</a></div>
      <nav>
<?php
for ($i = 0; $i < $result->num_rows; $i++) {
  $category = mysqli_fetch_assoc($result);
  echo "        <span class=\"tile\"><a href=\"/search/{$category['id']}\">{$category['name']}</a></span>\n";
}
?>
        <span class="tile"><a href="/schedule">시간표</a></span>
      </nav>
      <span class="tile">
        <img class="login_icon" src="/images/login.svg" alt="login">
        <?php
        if (isset($_SESSION['id'])) echo "<a href=\"/admin/manage\">관리 페이지</a>\n";
        else echo "<a href=\"/login\">반장 로그인</a>\n";
        ?>
      </span>
    </header>
<?php require("./main/$proc.php") ?>
    <footer>
      <a class="git" href="https://github.com/lalaalal/notice" target="_blank">
        <img src="/images/github.svg" alt="github">
        GitHub
      </a>
    </footer>
  </body>
</html>
