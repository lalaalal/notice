<?php
function isAdmin($mysqli) {
  session_start();
  if (isset($_SESSION['id'])) {
    $query = "SELECT no, id FROM admin WHERE no = {$_SESSION['no']} AND id = \"{$_SESSION['id']}\"";
    $res = $mysqli->query($query);
    if ($res->num_rows == 1) {
      return true;
    }
    session_unset($_SESSION);
  }
  session_destroy();
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
    <a href=\"/admin/form/1{$content['no']}\"><img src=\"/images/edit.png\" alt=\"edit\"></a>\n
    <a href=\"/admin/query/2{$content['no']}\"><img src=\"/images/delete.png\" alt=\"delete\"></a>\n";
  }
  echo "
    <div class=\"content article_tile\">
      <b class=\"title\"><a class=\"content_title\" href=\"/view/0{$content['no']}\">{$content['subject']} | {$content['category']}</a></b><br>
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
  if (substr($datetime, 0, 4) != date("Y")) {
    return date("Y년 m월 d일", strtotime($datetime));
  } else {
    return date("m월 d일", strtotime($datetime));
  }
}

function xrmdir($dir) {
  $items = scandir($dir);
  foreach ($items as $item) {
    if ($item === '.' || $item === '..') {
      continue;
    }
    $path = $dir.'/'.$item;
    if (is_dir($path)) {
        xrmdir($path);
    } else {
        unlink($path);
    }
  }
  rmdir($dir);
}
?>
