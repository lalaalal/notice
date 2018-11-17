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
$_GET['param'] == "" ? $week = "this" : $week = $_GET['param'];
$weekday = array('월', '화', '수', '목', '금');

$query = "SELECT * FROM board
          WHERE deadline >= $monday AND deadline <= $friday
          ORDER BY deadline ASC";

$schedule = json_decode(file_get_contents('/mnt/server/schedule/comci.json'), true);

echo "<div>\n";
echo "<br><br>\n";
for ($i = 1; $i <= 7; $i++) {
  echo "<p>".$i."교시</p>\n";
}

echo "</div>\n";

for ($i = 0; $i < 5; $i++) {
  echo "<div>\n";
  echo "<p>{$weekday[$i]}요일</p>\n";
  for ($j = 0; $j < 7; $j++) {
    if ($schedule[$week]["schedule"][$i][$j][0] == "56") {
      break;
    }
    echo "<p>".$schedule[$week]["schedule"][$i][$j][0]."<br>\n";
    echo $schedule[$week]["schedule"][$i][$j][1]."</p>\n";
  }
  echo "</div>\n";
}

?>
    </div>
  </article>
</main>
