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

$schedule = json_decode(file_get_contents('/mnt/server/schedule/comci.json'), true);

for ($i = 0; $i < 5; $i++) {
  echo "<div>";
  for ($j = 0; $j < 7; $j++) {
    if ($schedule[0][$i][$j][0] == "56") {
      break;
    }
    echo $schedule[0][$i][$j][0]." : ";
    echo $schedule[0][$i][$j][1]."<br>\n";
  }
  echo "</div>\n";
}

?>
    </div>
  </article>
</main>
