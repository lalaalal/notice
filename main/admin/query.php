<?php
require($_SERVER['DOCUMENT_ROOT'].'/lib/func.php');

if (!isAdmin()) {
  header("Location: /home");
}

switch ($_GET['param']) {
  case '3':
    $query = "INSERT INTO {$_POST['add']} (name) VALUES (\"{$_POST['name']}\")";
    break;
  case '4':
    $query = "DELETE FROM {$_POST['delete']} WHERE id = {$_POST[$_POST['delete']]}";
    break;
  default:
    $pattern = "/(\d{4})-(\d{2})-(\d{2})/";

    $_POST['start'] = preg_replace($pattern, "$1$2$3", $_POST['start']);
    $_POST['deadline'] = preg_replace($pattern, "$1$2$3", $_POST['deadline']);

    // $mysqli = mysqli_connect("localhost", "notice", "isdj_107", "notice");
    $query = "INSERT INTO board (title, subject_id, category_id, body, start, deadline)
              VALUES (
                \"{$_POST['title']}\",
                \"{$_POST['subject_id']}\",
                \"{$_POST['category_id']}\",
                \"{$_POST['body']}\",
                \"{$_POST['start']}\",
                \"{$_POST['deadline']}\"
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
  </article>
</main>
