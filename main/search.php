<?php
$query ="SELECT no, title, subject.name AS subject, body, category.name AS category, start, deadline, DATE(date) as date
         FROM board
         LEFT JOIN category ON category_id = category.id
         LEFT JOIN subject ON subject_id = subject.id
         WHERE subject.id = {$_GET['param']}
         ORDER BY deadline ASC";
$res = $mysqli->query($query);
//echo $query."<br>"
?>

<main>
  <article class="">
<?php
for ($i = 0; $i < $res->num_rows; $i++) {
  $row = mysqli_fetch_assoc($res);
  echo $row['title']."<br>";
}
 ?>
  </article>
</main>
