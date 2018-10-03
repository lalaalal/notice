<?php
require($_SERVER['DOCUMENT_ROOT'].'/lib/func.php');

if (!isAdmin()) {
  header("Location: /login");
}
?>
<main>
  <article>
    <div class="notice article_tile">
      <div class="title"><b>내용 추가</b></div>
    </div>
    <form class="content article_tile form" action="/admin/query" method="post">
      <b class="title">제목</b>
      <div class="">
        <input type="text" name="title" placeholder="제목을 입력하세요." required>
        <select class="" name="subject_id">
          <option value="">--과목--</option>
  <?php
  $query = "SELECT * FROM subject";
  $result = $mysqli->query($query);
  for ($i = 0; $i < $result->num_rows; $i++) {
    $category = mysqli_fetch_assoc($result);
    echo "        <option value=\"{$category['id']}\">{$category['name']}</option>\n";
  }
  ?>
        </select>
        <select class="" name="category_id">
          <option value="">--종류--</option>
  <?php
  $query = "SELECT * FROM category";
  $result = $mysqli->query($query);
  for ($i = 0; $i < $result->num_rows; $i++) {
    $category = mysqli_fetch_assoc($result);
    echo "        <option value=\"{$category['id']}\">{$category['name']}</option>\n";
  }
  ?>
        </select>
      </div>
      <b class="title">내용</b>
      <textarea name="body" rows="12" style="resize: none"></textarea>
      <input type="file" name="">
      <b class="title">시작, 마감</b>
      <div class="">
        <input type="datetime" name="start" value="<?= date('Y-m-d') ?>" placeholder="yyyy-mm-dd">
        <input type="datetime" name="deadline" placeholder="yyyy-mm-dd" required>
      </div>
      <input type="submit" value="완성한다!">
    </form>
  </article>
</main>
