<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Code Name</title>
    <link rel="stylesheet" href="seeCode.css">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
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

<div class="wrapper">
    <div class="title">
        *Name of the code*
    </div>
    <div class="file_upload_list">
        <div contentEditable="true">*Your code here*</div>
    </div>
    <div class="edit_file">
        <label for="edit_file">
            <input type="search" id="edit_file">
            <span>Edit Code</span>
        </label>
    </div>
</div>
<script src="main.js"></script>

</body>
</html>