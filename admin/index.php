<?php
session_start();
if (!isset($_SESSION['id'])) {
  session_destroy();
  header("Location: /admin/login.php");
} else {
  $sign = 'logout';
  $admin = "/admin";
  require($_SERVER['DOCUMENT_ROOT']."/index.php");
}
