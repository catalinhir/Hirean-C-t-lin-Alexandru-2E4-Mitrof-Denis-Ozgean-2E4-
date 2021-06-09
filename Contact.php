<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Page!</title>
    <link rel="stylesheet" href="aboutUs.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
</head>
<body>
<div class="mobile-container">
<div class="topnav">
 <img src="images/Logoo.png" class="logo">
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>



  <div id="myLinks">
    <ul id="ul">
    <li><a href="Index.php">Acasa</a></li>
    <li><a href="AboutUs.php">Despre</a></li>
    <li><a href="Documentation.php">Documentatie</a></li>
    <li><a href="Contact.php">Contact</a></li>
  </ul>
  <div class="register">
      <?php
      if (isset($_SESSION["username"])) {
          echo ' <li><a href="ProfilePage.php" class="crazylogin"><i class="fas fa-sign-in-alt"></i>' . $_SESSION["username"];
      } elseif (!isset($_SESSION["username"])) {
          echo '<li><a href="SignIn.php" class="crazylogin"><i class="fas fa-sign-in-alt"></i> Sign In/Up</a></li>';
      }
      ?>
      <li><a href="uploadCode.php"><i class="fas fa-upload"></i> Upload</a></li>
      <?php if (isset($_SESSION["username"])): ?>
          <p><strong><? echo $_SESSION["username"]; ?></strong></p>
          <li><a href="index.php?logout='1'" class="alog">| Logout <i class="far fa-times-circle"></i></a>
          </li>
      <?php endif ?>
    </div>
  </div>
</div>

<h2>CONTACT US AT:</h2>
<div class="row">
    <div class="column">
        <div class="card">
            <div class="container">
                <h2>Location</h2>
                <p class="title"></p>
                <p>Faculty of Computer Science, “Alexandru Ioan Cuza” University</p>
                <p>Street General Berthelot, 16</p>
                <p>Iasi, Romania</p>
                <p><button class="button">Contact</button></p>
            </div>
        </div>
    </div>

    <div class="column">
        <div class="card">
            <div class="container">
                <h2>Mail</h2>
                <p>catalinhirean@gmail.com</p>
                <p>carmengruia@gmail.com</p>
                <p>denismitrof@gmail.com</p>
                <p><button class="button">Contact</button></p>
            </div>
        </div>
    </div>

    <div class="column">
        <div class="card">
            <div class="container">
                <h2>Phone</h2>
                <p>Phone number: +40733892771</p>
                <p>Phone number: +40744152591</p>
                <p>Phone number: +40773412266</p>
                <p><button class="button">Contact</button></p>
            </div>
        </div>
    </div>
</div>
<script src="main.js"></script>
</body>
</html>
