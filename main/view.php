<?php
$query = "SELECT no, title, subject.name AS subject, body, category.name AS category, start, deadline, DATE(date) as date
          FROM board
          LEFT JOIN category ON category_id = category.id
          LEFT JOIN subject ON subject_id = subject.id
          WHERE no = {$_GET['param']}";
$result = $mysqli->query($query);
$content = mysqli_fetch_assoc($result);

$content['start'] = dateForm($content['start']);
$content['deadline'] = dateForm($content['deadline']);
$content['date'] = dateForm($content['date']);
?>

<main>
  <article class="">
    <?php articleTitle($content['title'], $content['date']); ?>
    <div class="article_tile content">
      <div class="content_left">
        <b class="title"><?= $content['subject'] ?> | <?= $content['category'] ?></b><br>
        <p><?= $content['body'] ?></p>
<?php
$host = "https://storage.isdj.ga/";
$dir = "/mnt/server/".$content['no'];

$files = scandir($dir);

foreach ($files as $file) {
  if ($file != "." && $file != "..") {
    echo "<a href=\"{$host}{$content['no']}/{$file}\" target=\"_blank\">{$file}</a>";
  }
}
?>
      </div>
      <div class="content_right">
        <?= $content['start'] ?> 부터<br><br>
        <?= $content['deadline'] ?> 까지
      </div>
    </div>
  </article>
</main>
