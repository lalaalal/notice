<?php
if (!isset($sign)) $sign = "login";
if (!isset($req)) $req = "home";
?>
<!DOCTYPE html>
<html lang="ko" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/master.css">
    <link rel="stylesheet" href="/fontello/css/fontello.css">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="/js/script.js"></script>
    <title></title>
  </head>
  <body>
    <?php
    require($_SERVER['DOCUMENT_ROOT']."/body/header.php");
    require($_SERVER['DOCUMENT_ROOT']."/body/{$req}.php");
    ?>
    <footer>
      <a class="icon git" href="https://github.com/lalaalal/notice" target="_blank">GitHub</a>
    </footer>
  </body>
</html>
