<?php
require($_SERVER['DOCUMENT_ROOT']."/lib/func.php");

$mysqli = mysqli_connect("localhost", "notice", "isdj_107", "notice");
$query = "SELECT * FROM admin WHERE id = \"{$_POST['id']}\"";
$result = $mysqli->query($query);

if ($result->num_rows == 1) {
  $row = mysqli_fetch_assoc($result);
  if (password_verify($_POST['pw'], $row['pw'])) {
    session_start();
    $_SESSION['id'] = $_POST['id'];
    header("Location: /home");
  }
}
?>

<main id="short_wrapper">
<?php articleTitle($title = "아이디 또는 비밀번호가 일치하지 않습니다.", $date = "", $type = "notice"); ?>
  <article class="">
    <a href="<?= $_SERVER['HTTP_REFERER'] ?>"><button type="button" name="button">돌아가기</button></a>
    <a href="/home"><button type="button" name="button">홈으로</button></a>
  </article>
</main>
