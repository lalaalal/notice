<?php
function articleTitle($title, $date, $type = "head") {
  echo "
    <div class=\"$type article_tile\">
      <div class=\"title\"><b>$title</b></div>
      <div class=\"date\">$date</div>
    </div>\n";
}

function articleContent($content) {
  echo "
    <div class=\"content article_tile\">
      <b class=\"title\">{$content['title']} | {$content['category']}</b>
      {$content['body']}<br>
      <br>
      {$content['start']} 부터 {$content['deadline']} 까지
    </div>\n";
}

function isAdmin() {
  session_start();
  if (isset($_SESSION['id'])) {
    return true;
  }
  else {
    return false;
  }
}
?>
<a href="#"></a>
