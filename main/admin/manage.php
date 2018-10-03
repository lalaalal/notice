<?php
require($_SERVER['DOCUMENT_ROOT'].'/lib/func.php');

if (!isAdmin()) {
  header("Location: /login");
}



?>

<main id="short_wrapper">
  <article class="">
<?php articleTitle($title = '관리자 페이지', $right = "", $type = "notice"); ?>
    <form class="content article_tile" action="/admin/query/4" method="post">
      <select class="" name="category">
  <?php
  $category = get_table($mysqli, $type = "category");
  for ($row = 0; $row < sizeof($category) ; $row++) {
    echo "      <option value=\"{$category[$row]['id']}\">{$category[$row]['name']}</option>\n";
  }
  ?>
      </select>
      <button type="submit" name="delete" value="category">삭제</button>
      <select class="" name="subject">
<?php
$subject = get_table($mysqli, $type = "subject");
for ($row = 0; $row < sizeof($subject) ; $row++) {
  echo "      <option value=\"{$subject[$row]['id']}\">{$subject[$row]['name']}</option>\n";
}
?>
      </select>
      <button type="submit" name="delete" value="subject">삭제</button>
    </form>
    <form class="content article_tile" action="/admin/query/3" method="post">
      <input type="text" name="name">
      <div class="">
        <button type="submit" name="add" value="category">종류 추가</button>
        <button type="submit" name="add" value="subject">과목 추가</button>
      </div>
    </form>
  </article>
  <article class="">
    <a class="button" href="/logout.php"><button type="button" >로그아웃</button></a>
  </article>
</main>
