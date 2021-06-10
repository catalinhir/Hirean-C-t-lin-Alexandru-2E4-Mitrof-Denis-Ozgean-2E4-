<?php session_start(); ?>
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
        File Upload
    </div>
    <div class="file_upload_list">
        <ul>
            <li>
                <div class="file_item">
                    <div class="formatJAVA">
                        <p>JAVA</p>
                    </div>
                    <div class="file_progress">
                        <div class="file_info">
                            <div class="file_name">
                                mainClass.java
                            </div>
                            <div class="file_size_wrap">
                                <div class="file_size">2KB</div>
                                <div class="file_close">X</div>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="inner_progress" style="width: 90%;"></div>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="file_item">
                    <div class="formatHTML">
                        <p>HTML</p>
                    </div>
                    <div class="file_progress">
                        <div class="file_info">
                            <div class="file_name">
                                uploadCode.html
                            </div>
                            <div class="file_size_wrap">
                                <div class="file_size">6.2KB</div>
                                <div class="file_close">X</div>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="inner_progress" style="width: 73%;"></div>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="file_item">
                    <div class="formatCSS">
                        <p>CSS</p>
                    </div>
                    <div class="file_progress">
                        <div class="file_info">
                            <div class="file_name">
                                uploadCode.css
                            </div>
                            <div class="file_size_wrap">
                                <div class="file_size">15KB</div>
                                <div class="file_close">X</div>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="inner_progress" style="width: 66%;"></div>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="file_item">
                    <div class="format">
                        <p>DOC</p>
                    </div>
                    <div class="file_progress">
                        <div class="file_info">
                            <div class="file_name">
                                info.doc
                            </div>
                            <div class="file_size_wrap">
                                <div class="file_size">12MB</div>
                                <div class="file_close">X</div>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="inner_progress" style="width: 50%;"></div>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="file_item">
                    <div class="format">
                        <p>ZIP</p>
                    </div>
                    <div class="file_progress">
                        <div class="file_info">
                            <div class="file_name">
                                other_codes.zip
                            </div>
                            <div class="file_size_wrap">
                                <div class="file_size">150KB</div>
                                <div class="file_close">X</div>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="inner_progress" style="width: 25%;"></div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="choose_file">
        <form action="uploadCodeValid.php" method="post" enctype="multipart/form-data">
        <label for="choose_file">
            <input name="filename" type="file" id="choose_file">
            <span>Choose File</span>
            <input type="submit" name="submit" value="Upload">
        </label>
        </form>
    </div>
</div>
<script src="main.js"></script>
</body>
</html>