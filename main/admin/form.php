<?php
if (!isAdmin($mysqli)) {
  header("Location: /login");
}

$board['start'] = date("Y-m-d");
$board['deadline'] = date("Y-m-d");
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
    <form class="content article_tile form" enctype="multipart/form-data" action="/admin/query/<?= $_GET['option'].$_GET['param'] ?>" method="post">
      <b class="title">제목</b>
      <div class="horizontal">
        <input type="text" name="title" placeholder="제목을 입력하세요." value="<?= $board['title'] ?>" required>
        <select class="" name="subject_id">
          <option value="">--과목--</option>
<?php
$subject = get_table($mysqli, $type = "subject");
for ($row = 0; $row < sizeof($subject); $row++) {
  $subject[$row]['id'] == $board['subject_id'] ? $selected = "selected" : $selected = "";
  echo "          <option value=\"{$subject[$row]['id']}\" $selected>{$subject[$row]['name']}</option>\n";
}
?>
        </select>
        <select class="" name="category_id">
          <option value="">--종류--</option>
<?php
$category = get_table($mysqli, $type = "category");
for ($row = 0; $row < sizeof($category); $row++) {
  $category[$row]['id'] == $board['category_id'] ? $selected = "selected" : $selected = "";
  echo "          <option value=\"{$category[$row]['id']}\" $selected>{$category[$row]['name']}</option>\n";
}
?>
        </select>
      </div>
      <b class="title">내용</b>
      <textarea name="body" rows="18" style="resize: none"><?= $board['body'] ?></textarea>
      <script type="text/javascript" src="/lib/script.js"></script>
      <div class="add_file">
        <div><button type="button" onclick="add_file()">파일 추가</button></div>
      </div>
      <div class="delete_file">
<?php
if ($_GET['option'] == "1") {
  $dir = "/mnt/server/".$_GET['param'].'/';
  $items = scandir($dir);
  foreach ($items as $item) {
    if ($item != "." && $item != "..") {
      echo "
        <div class=\"select_file\">
          <div class=\"file_name\">".$item."</div>
          <img src=\"/images/delete.png\" alt=\"delete\" onclick=\"delete_file(this, path='$item')\">
        </div>";
    }
  }
}
?>
      </div>
      <b class="title">시작, 마감</b>
      <div class="horizontal">
        <input type="datetime" name="start" value="<?= $board['start'] ?>" placeholder="yyyy-mm-dd">
        <input type="datetime" name="deadline" value="<?= $board['deadline'] ?>" placeholder="yyyy-mm-dd" required>
      </div>
      <button type="submit">완성한다!</button>
    </form>
  </article>
</main>
