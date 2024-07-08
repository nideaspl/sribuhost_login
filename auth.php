<?php
ini_set('display_errors', 1);
ini_set('dispay_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (isset($_SESSION['name'])) {
  header('location: ./home.php');
  exit;
}

if (!isset($_POST['submit'])) {
  header('location: ./index.php');
  exit;
}

$conn = mysqli_connect('localhost', 'kali', 'password', 'sribuhost_login');
$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";

$result = mysqli_query($conn, $query);
$users_num = mysqli_num_rows($result);

if ($users_num < 1) {
  $_SESSION['login_failed'] = true;
  header('location: ./index.php');
  exit;
}

$user = mysqli_fetch_assoc($result);
$_SESSION['name'] = $user['name'];

header('location: ./home.php');
exit;
