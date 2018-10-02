<?php
function isAdmin() {
  session_start();
  if (isset($_SESSION['id'])) {
    return true;
  }
  else {
    return false;
  }
}

function articleTitle($title, $date, $type = "head") {
  if (isAdmin() && $type == "head") {
    $insert = "<a class=\"admin_tile\" href=\"/admin/query/add\">추가</a>";
  }
  echo "
    <div class=\"$type article_tile\">
      <div class=\"title\"><b>$title</b></div>
      <div class=\"date\">{$insert}{$date}</div>
    </div>\n";
}

function articleContent($content) {
  echo "
    <div class=\"content article_tile\">
      <b class=\"title\">{$content['subject']} | {$content['category']}</b>
      {$content['title']}<br>
      <br>
      {$content['start']} 부터 {$content['deadline']} 까지
    </div>\n";
}

function Sorry() {
  echo "
  <div class=\"notice article_tile\">
    공사중 입니다 -..-
  </div>\n";
}
?>
