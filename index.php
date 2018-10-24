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

require($_SERVER['DOCUMENT_ROOT']."/lib/func.php");
?>

<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, user-scalable=no"> -->
    <meta name="description" content="일산 대진 고등학교 1학년 7반 알림장">
    <meta name="keywords" content="대진고, 알림장, 7반">
    <meta name="author" content="협창쓰">
    <meta name="language" content="ko">
    <link rel="stylesheet" href="/css/master.css">
    <link rel="stylesheet" href="/css/<?= $proc ?>.css">
    <link rel="manifest" href="/fav/manifest.json">
    <link rel="icon" type="image/png" sizes="96x96" href="/fav/favicon-96x96.png">
    <link href="https://cdn.rawgit.com/young-ha/webfont-archive/master/css/Godo.css" rel="stylesheet" type="text/css">
    <title>7반 알림장</title>
  </head>
  <body>
    <header>
      <div class="title tile"><a class="tile_link" href="/home">7반 알림장</a></div>
      <nav>
<!-- category tiles -->
<?php
for ($i = 0; $i < $result->num_rows; $i++) {
  $category = mysqli_fetch_assoc($result);
  echo "        <span class=\"tile\"><a class=\"tile_link\" href=\"/search/{$category['id']}\">{$category['name']}</a></span>\n";
}
?>
<!-- category tiles -->
        <span class="tile"><a class="tile_link" href="/schedule">시간표</a></span>
      </nav>
      <span class="tile">
        <img class="login_icon" src="/images/login.svg" alt="login">
        <?php
        if (isAdmin($mysqli)) echo "<a class=\"tile_link\" href=\"/admin/manage\">관리 페이지</a>\n";
        else echo "<a class=\"tile_link\" href=\"/login\">반장 로그인</a>\n";
        ?>
      </span>
    </header>
<!-- main -->
<?php
$res = include($_SERVER['DOCUMENT_ROOT']."/main/$proc.php");
if ($res == FALSE) {
  header("Location: /404");
}
?>
<!-- main -->
    <footer>
      <a class="git" href="https://github.com/lalaalal/notice" target="_blank">
        <img src="/images/github.svg" alt="github">
        GitHub
      </a>
    </footer>
  </body>
</html>
