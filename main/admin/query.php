<?php
require($_SERVER['DOCUMENT_ROOT'].'/lib/func.php');

if (!isAdmin()) {
  header("Location: /home");
}
// $mysqli = mysqli_connect("localhost", "notice", "isdj_107", "notice");

$pattern = "/(\d{4})-(\d{2})-(\d{2}) ?(\d{2})?:?(\d{2})?:?(\d{2})?/";

$_POST['start'] = preg_replace($pattern, "$1$2$3$4$5$6", $_POST['start']);
$_POST['deadline'] = preg_replace($pattern, "$1$2$3$4$5$6", $_POST['deadline']);

switch ($_GET['option']) {
  case '1':
    $query = "UPDATE board SET
              title = \"{$_POST['title']}\",
              subject_id = {$_POST['subject_id']},
              category_id = {$_POST['category_id']},
              body = \"{$_POST['body']}\",
              start = {$_POST['start']},
              deadline = {$_POST['deadline']}
              WHERE no = {$_GET['param']}";
    break;
  case '2':
    $query = "DELETE FROM board WHERE no = {$_GET['param']}";
    break;
  case '3':
    $query = "INSERT INTO {$_POST['add']} (name) VALUES (\"{$_POST['name']}\")";
    break;
  case '4':
    $query = "DELETE FROM {$_POST['delete']} WHERE id = {$_POST[$_POST['delete']]}";
    break;
  default:
    $query = "INSERT INTO board (title, subject_id, category_id, body, start, deadline)
              VALUES (
                \"{$_POST['title']}\",
                {$_POST['subject_id']},
                {$_POST['category_id']},
                \"{$_POST['body']}\",
                {$_POST['start']},
                {$_POST['deadline']}
              )";
    break;
}
// echo $query;
// exit();
$result = $mysqli->query($query);
?>

<main id="short_wrapper">
<?php
if ($result == TRUE) {
  articleTitle($title = "성공적으로 처리되었습니다!", $date = "", $type = "notice");
} else {
  articleTitle($title = "문제가 발생했습니다!", $date = "", $type = "notice");
}
?>
  <article class="">
    <a href="<?= $_SERVER['HTTP_REFERER'] ?>"><button type="button" name="button">돌아가기</button></a>
    <a href="/home"><button type="button" name="button">홈으로</button></a>
  </article>
</main>
