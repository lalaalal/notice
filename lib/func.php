<?php
function isAdmin($mysqli) {
  session_start();
  if (isset($_SESSION['id'])) {
    $query = "SELECT no, id FROM admin WHERE no = {$_SESSION['no']} AND id = \"{$_SESSION['id']}\"";
    $res = $mysqli->query($query);
    if ($res->num_rows == 1) {
      return true;
    }
  }
  return false;
}

function articleTitle($title, $right, $type = "head") {
  echo "
    <div class=\"$type article_tile\">
      <div class=\"title\"><b>$title</b></div>
      <div class=\"content_right\">{$right}</div>
    </div>\n";
}

function articleContent($content, $is_admin = false) {
  $content['start'] = dateForm($content['start']);
  $content['deadline'] = dateForm($content['deadline']);
  if ($is_admin) {
    $insert = "
    <a href=\"/admin/form/1{$content['no']}\"><img src=\"/images/edit.png\" alt=\"cross\"></a>\n
    <a href=\"/admin/query/2{$content['no']}\"><img src=\"/images/delete.png\" alt=\"cross\"></a>\n";
  }
  echo "
    <div class=\"content article_tile\">
      <b class=\"title\">{$content['subject']} | {$content['category']}</b><br>
      {$content['title']}<br>
      <br>
      {$content['deadline']} 까지
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

function dateForm($datetime) {
  if (preg_match("/(\d{4})/", date("y"))) {
    $replacement = "$1년 $2월 $3일";
  } else {
    $replacement = "$2월 $3일";
  }

  $pattern = "/(\d{4})-(\d{2})-(\d{2})/";
  $res = preg_replace($pattern, $replacement, $datetime);

  $pattern = "/(\d{2}):(\d{2}):(\d{2})/";
  $replacement = "$1:$2";
  $res = preg_replace($pattern, $replacement, $res);

  return $res;
}
?>
