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

function articleTitle($title, $right, $type = "head") {
  if (isAdmin() && $type == "head") {
    $insert = "<a class=\"admin_tile\" href=\"/admin/form\">추가</a>";
  }
  echo "
    <div class=\"$type article_tile\">
      <div class=\"title\"><b>$title</b></div>
      <div class=\"content_right\">{$insert}{$right}</div>
    </div>\n";
}

function articleContent($content) {
  if (isAdmin()) {
    $insert = "
    <a class=\"admin_tile\" href=\"/admin/form/1{$content['no']}\">수정</a>
    <a class=\"admin_tile\" href=\"/admin/query/2{$content['no']}\">삭제</a>\n";
  }
  echo "
    <div class=\"content article_tile\">
      <b class=\"title\">{$content['subject']} | {$content['category']}</b><br>
      {$content['title']}<br>
      <br>
      {$content['start']} 부터 {$content['deadline']} 까지
      <div class=\"content_right\">{$insert}</div>
    </div>\n";
}

function get_table($mysqli, $type)
{
  $query = "SELECT * FROM ".$type;
  $result = $mysqli->query($query);
  for ($i = 0; $i < $result->num_rows; $i++) {
    $table[] = mysqli_fetch_assoc($result);
  }
  return $table;
}

function Sorry() {
  echo "
  <div class=\"notice article_tile\">
    공사중 입니다 -..-
  </div>\n";
}
?>
