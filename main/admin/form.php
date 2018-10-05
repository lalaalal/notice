<?php
require($_SERVER['DOCUMENT_ROOT'].'/lib/func.php');

if (!isAdmin()) {
  header("Location: /login");
}

if ($_GET['option'] == 1) {
  $query = "SELECT * FROM board WHERE no = {$_GET['param']}";

  $result = $mysqli->query($query);
  $board = mysqli_fetch_assoc($result);
}
?>
<main>
  <article>
    <div class="notice article_tile">
      <div class="title"><b>내용 추가</b></div>
    </div>
    <form class="content article_tile form" action="/admin/query/<?= $_GET['option'].$_GET['param'] ?>" method="post">
      <b class="title">제목</b>
      <div class="">
        <input type="text" name="title" placeholder="제목을 입력하세요." value="<?= $board['title'] ?>" required>
        <select class="" name="subject_id">
          <option value="">--과목--</option>
<?php
$subject = get_table($mysqli, $type = "subject");
for ($row = 0; $row < sizeof($subject); $row++) {
  if ($subject[$row]['id'] == $board['subject_id']) {
    $selected = "selected";
  }
  echo "        <option value=\"{$subject[$row]['id']}\" $selected>{$subject[$row]['name']}</option>\n";
}
?>
        </select>
        <select class="" name="category_id">
          <option value="">--종류--</option>
<?php
$category = get_table($mysqli, $type = "category");
for ($row = 0; $row < sizeof($category); $row++) {
  if ($category[$row]['id'] == $board['category_id']) {
    $selected = "selected";
  }
  echo "        <option value=\"{$category[$row]['id']}\" $selected>{$category[$row]['name']}</option>\n";
}
?>
        </select>
      </div>
      <b class="title">내용</b>
      <textarea name="body" rows="12" style="resize: none" value="<?= $board['body'] ?>"></textarea>
      <input type="file" name="">
      <b class="title">시작, 마감</b>
      <div class="">
        <input type="datetime" name="start" value="<?= $board['start'] ?>" placeholder="yyyy-mm-dd">
        <input type="datetime" name="deadline" value="<?= $board['deadline'] ?>" placeholder="yyyy-mm-dd" required>
      </div>
      <button type="submit">완성한다!</button>
    </form>
  </article>
</main>
