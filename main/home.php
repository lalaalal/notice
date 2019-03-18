<?php
$is_admin = isAdmin($mysqli);

// $mysqli = mysqli_connect("localhost", "notice", "isdj_107", "notice");
$query = "SELECT no, title, subject.name AS subject, body, category.name AS category, start, deadline, DATE(date) as date
          FROM board
          LEFT JOIN category ON category_id = category.id
          LEFT JOIN subject ON subject_id = subject.id
          WHERE DATE(deadline) = DATE(CURDATE() + 1)
          ORDER BY deadline ASC";

$result = $mysqli->query($query);
?>
<main>
  <article class="">
    <div class="notice article_tile">
      <b>chrome 브라우저 권장</b>
    </div>
  </article>
  <article class="">
<?php
$content = mysqli_fetch_assoc($result);
articleTitle($title = '오늘의 알림장', date("m월 d일"));
if ($result->num_rows == 0) {
  echo "
<div class=\"content article_tile\">
  알림이 없습니다!
</div>\n";
} else {
  for ($i = 0; $i < $result->num_rows; $i++) {
    articleContent($content, $is_admin);
    $content = mysqli_fetch_assoc($result);
  }
}
?>
  </article>
  <article class="">
<?php
articleTitle($title = '나머지...', $right = "");

$query = "SELECT no, title, subject.name AS subject, body, category.name AS category, start, deadline, DATE(date) as date
          FROM board
          LEFT JOIN category ON category_id = category.id
          LEFT JOIN subject ON subject_id = subject.id
		  WHERE deadline >= NOW() 
		  OR DATE(deadline) = CURDATE()
	  AND DATE(deadline) != DATE(CURDATE() + 1)
          ORDER BY deadline ASC";
$result = $mysqli->query($query);
$content = mysqli_fetch_assoc($result);
if ($result->num_rows == 0) {
  echo "
<div class=\"content article_tile\">
  알림이 없습니다!
</div>\n";
} else {
  for ($i = 0; $i < $result->num_rows; $i++) {
    articleContent($content, $is_admin);
    $content = mysqli_fetch_assoc($result);
  }
}
?>
  </article>
<?php
if ($is_admin) {
  echo "
  <article class=\"rtl\">
    <a href=\"/admin/form\"><button type=\"button\">글쓰기</button></a>
  </article>";
}
?>
</main>
