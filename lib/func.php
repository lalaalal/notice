<?php
function articleTitle($title, $date, $type) {
  echo "
    <div class=\"$type article_tile\">
      <div class=\"title\">$title</div>
      <div class=\"date\">$date</div>
    </div>\n";
}

function articleContent($title, $category, $content) {
  echo "
    <div class=\"content article_tile\">
      $title | $category<br>
      $content
    </div>\n";
}
?>
