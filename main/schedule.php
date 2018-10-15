<main>
  <article class="">
    <div class="article_tile head">
      <b>시간표</b>
      <div class="content_right">
        <?= date("Y-m-d") ?>
      </div>
    </div>
    <div class="article_tile content schedule">
<?php
$monday = date("Ymd", strtotime(1 - date('w')." days"));
$friday = date("Ymd", strtotime(6 - date('w')." days"));

$query = "SELECT * FROM board
          WHERE deadline >= $monday AND deadline <= $friday
          ORDER BY deadline ASC";

$schedule = json_decode(file_get_contents('https://storage.isdj.ga/schedule/comci.json'), true);
?>
    </div>
  </article>
</main>
