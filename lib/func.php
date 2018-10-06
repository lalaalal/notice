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
  echo "
    <div class=\"$type article_tile\">
      <div class=\"title\"><b>$title</b></div>
      <div class=\"content_right\">{$right}</div>
    </div>\n";
}

function articleContent($content) {
  if (isAdmin()) {
    $insert = "
    <a href=\"/admin/form/1{$content['no']}\"><img src=\"/images/edit.png\" alt=\"cross\"></a>\n
    <a href=\"/admin/query/2{$content['no']}\"><img src=\"/images/delete.png\" alt=\"cross\"></a>\n";
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
