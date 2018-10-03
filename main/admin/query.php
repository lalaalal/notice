<?php
require($_SERVER['DOCUMENT_ROOT'].'/lib/func.php');

if (!isAdmin()) {
  header("Location: index.php?page=login");
}
?>
<main>
  <article>
    <div class="head article_tile">
      <div class="title"><b>내용 추가</b></div>
    </div>
    <form class="content article_tile" action="login.php" method="post">
      <b class="title">제목</b>
      <input type="text" name="title" placeholder="제목을 입력하세요." required>
      <b class="title">과목</b>
      <select class="" name="subject_id">
<?php
$query = "SELECT * FROM subject";
$result = $mysqli->query($query);
for ($i = 0; $i < $result->num_rows; $i++) {
  $category = mysqli_fetch_assoc($result);
  echo "        <option value=\"{$category['id']}\">{$category['name']}</option>\n";
}
?>
      </select>
      <b class="title">종류</b>
      <select class="" name="category_id">
<?php
$query = "SELECT * FROM category";
$result = $mysqli->query($query);
for ($i = 0; $i < $result->num_rows; $i++) {
  $category = mysqli_fetch_assoc($result);
  echo "        <option value=\"{$category['id']}\">{$category['name']}</option>\n";
}
?>
      </select>
      <b class="title">내용</b>
      <textarea name="body" rows="12" style="resize: none"></textarea>
      <input type="file" name="">
      <b class="title">시작, 마감</b>
      <input type="datetime" name="" value="<?= date('Ymd') ?>" placeholder="yyyy-mm-dd">
      <input type="datetime" name="" placeholder="yyyymmdd" required>
      <input type="submit" value="완성한다!">
    </form>
  </article>
</main>
