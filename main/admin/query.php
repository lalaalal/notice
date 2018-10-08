<?php
if (!isAdmin($mysqli)) {
  header("Location: /home");
}
$pattern = "/(\d{4})-(\d{2})-(\d{2}) ?(\d{2})?:?(\d{2})?:?(\d{2})?/";

$_POST['start'] = preg_replace($pattern, "$1$2$3$4$5$6", $_POST['start']);
$_POST['deadline'] = preg_replace($pattern, "$1$2$3$4$5$6", $_POST['deadline']);

$err = 0;

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
    $dir = "/mnt/server/".$_GET['param'].'/';

    if (is_dir($dir)) {
      xrmdir($dir);
    }
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
$result = $mysqli->query($query);

foreach ($_FILES['file']['error'] as $key => $error) {
  if ($error != UPLOAD_ERR_OK) {
    $err = $error;
    continue;
  }

  if ($_GET['param'] == "") $no = mysqli_insert_id($mysqli);
  else $no = $_GET['param'];

  $upload_dir = '/mnt/server/'.$no.'/';
  $upload_file = $upload_dir.basename($_FILES['file']['name'][$key]);

  if (!is_dir($upload_dir)) {
    mkdir($upload_dir);
  }

  move_uploaded_file($_FILES['file']['tmp_name'][$key], $upload_file);
}
?>

<main id="short_wrapper">
<?php
if ($result == TRUE) {
  $title = "성공적으로 처리되었습니다!";
} else {
  $title = "문제가 발생했습니다!";
}
articleTitle($title, $date = "", $type = "notice");
if ($err != UPLOAD_ERR_OK) {
  $sub = "파일이 업로드되지 않았습니다.";
  articleTitle($sub, $date = "", $type = "notice");
}
?>
  <article class="">
    <a href="<?= $_SERVER['HTTP_REFERER'] ?>"><button type="button" name="button">돌아가기</button></a>
    <a href="/home"><button type="button" name="button">홈으로</button></a>
  </article>
</main>
