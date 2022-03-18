<?php

require_once "vendor/autoload.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="Assets/css/global.css">
  <link rel="stylesheet" href="Assets/css//index.css">
  <title>Index</title>
</head>
<body>
  <nav class="navbar">
    <div class="logoNavbar">
      <img src="Assets/img/logo512.png" class="logo">
      <h1 class="textLogo">React</h1>
    </div>
    <ul class="listLink">
      <li>
        <a href=""><i class='bx bxs-home'></i>Home</a>
      </li>
    </ul>
    <div class="account">
      <a href="/App/View/pages/login.php"><i class='bx bx-log-in'></i>Login</a>
      <a href="/App/View/pages/register.php"><i class='bx bxs-user-plus'></i>Register</a>
    </div>
  </nav>
</body>
</html>