<?php

session_start();

if (!isset($_SESSION['name'])) {
  header('location: ./index.php');
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Form PHP MySQL With Session - Sribuhost</title>

  <link rel="stylesheet" href="./style.css" />
</head>

<body>
  <div class="container">
    <div class="information">
      <h1 class="information__title">You are logged in as <?= $_SESSION['name'] ?></h1>
      <a href="./logout.php" class="information__button">Logout</a>
    </div>
  </div>
</body>

</html>