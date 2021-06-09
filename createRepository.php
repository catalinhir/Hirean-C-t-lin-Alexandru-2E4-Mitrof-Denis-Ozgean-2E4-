<?php

require_once('createRepoValid.php');
//session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Code</title>
    <link rel="stylesheet" href="uploadCode.css">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
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
      <?php if (isset($_SESSION["username"])): ?>
      <p><strong><? echo $_SESSION["username"]; ?></strong></p>
      <li><a href="index.php?logout='1'" class="alog">| Logout <i class="far fa-times-circle"></i></a>
      </li>
      <?php endif ?>
    </div>
  </div>
</div>





<div class="wrapper">
    <div class="title">
        Create Repository
    </div>
    <div class="file_upload_list">

                <form method="post">
                    <label>Nume</label>
                    <input type="text" name="numeRepo">
                    <label> <br><br>Zile pana expira</label>
                    <input type="text" name="zileExp">
                    <input type="submit" name="create">

                </form>

    </div>
    <div class="choose_file">
        <label for="choose_file">
            <input type="file" id="choose_file">
            <span>Choose Files</span>
        </label>
    </div>
</div>
<script src="main.js"></script>
</body>
</html>