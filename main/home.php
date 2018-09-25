<?php
include "./lib/func.php";

$mysqli = mysqli_connect("localhost", "notice", "isdj_107", "notice");
$query = "SELECT no, title, body, category_id, name AS category, start, deadline, DATE(date) as date
          FROM board LEFT JOIN category
          ON category_id = id
          WHERE DATE(date) = CURDATE()";

$result = $mysqli->query($query);
?>
<main>
  <article class="">
    <?php articleTitle($title = '공지 | 안녕하세요~!~!~!', $date = "2018-09-22", $type = 'notice');?>
  </article>
  <article class="">
    <?php
    $content = mysqli_fetch_assoc($result);
    articleTitle($title = '오늘의 알림장', date("Y-m-d"));
    if ($result->num_rows == 0) {
      echo "
    <div class=\"content article_tile\">
      <b class=\"title\">알림이 없습니다!</b>
    </div>\n";
    } else {
      for ($i = 0; $i < $result->num_rows; $i++) {
        articleContent($content);
        $content = mysqli_fetch_assoc($result);
      }
    }
    ?>
  </article>
</main>
