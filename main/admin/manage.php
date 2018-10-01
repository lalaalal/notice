<?php
include './lib/func.php';

if (!isAdmin()) {
  header("Location: /login");
}

$query = "SELECT * FROM subject";
$result = $mysqli->query($query);
for ($i = 0; $i < $result->num_rows; $i++) {
  $subject = mysqli_fetch_assoc($result);
  echo $_POST['query'];
}
?>


<main>
  <?php articleTitle($title = '관리자 페이지', $date = ""); ?>
  <form class="content article_tile" action="#" method="post">
    <input type="checkbox" name="" value="">
    <input type="checkbox" name="" value="">
    <input type="checkbox" name="" value="">
    <button type="submit" name="query" value="insert">추가</button>
    <input type="submit" name="query" value="수정">
    <a href="/logout.php">logout</a>
  </form>
</main>
