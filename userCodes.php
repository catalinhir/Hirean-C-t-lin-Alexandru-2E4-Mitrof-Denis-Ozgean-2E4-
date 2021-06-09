<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Code Name</title>
    <link rel="stylesheet" href="codePage.css">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <script src="https://kit.fontawesome.com/db21b656c0.js" crossorigin="anonymous"></script>
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
        <li><a href="index.html"><i class="fas fa-sign-in-alt"></i> SignIn/Up </a></li>
        <li><a href="despre.html"><i class="fas fa-upload"></i> Upload</a></li>
    </div>
  </div>
</div>



<section class="tripple_section">
    <article class=leftPanel>
        <img src="images/pngegg.png" alt="Avatar">
        <br>
        <div class="username">
            <h1>userName</h1>
        </div>


    </article>

    <div class="restofpage">
        <div class="searchit">
            "Username's" codes:
            <div class="searchwithIcon">
                <div class="searchCode">
                    <input type="text" name="textsearch" class="search-txt" placeholder="Search..."/>
                    <a class="buscar-btn">
                        <i class="fas fa-search"></i>
                    </a>
                </div>
            </div>

        </div>

        <div class="listaCoduri">
            <ul>
               <li> <div class="cod1">
                    <h1><a href="seeCode.html">numeCod1</a></h1>
                    descriereCod
                    <div class="downtext">
                        <div class="colorLanguage">
                            <div class="dot">
                            </div>
                            <div class="limbaj">
                                limbajAferent
                            </div>
                        </div>
                        <div class="likes">
                            5
                            <i class="fas fa-heart"></i>
                        </div>
                    </div>
                </div></li>
            </ul>
            <ul><li>
                <div class="cod1">
                    <h1><a href="seeCode.html">numeCod2</a></h1>
                    descriereCod
                    <div class="downtext">
                        <div class="colorLanguage">
                            <div class="dot">
                            </div>
                            <div class="limbaj">
                                limbajAferent
                            </div>
                        </div>
                        <div class="likes">
                            2
                            <i class="fas fa-heart"></i>
                        </div>
                    </div>
                </div>
            </li>
            </ul>
            <ul>
                <li>
                <div class="cod1">
                    <h1><a href="seeCode.html">numeCod3</a></h1>
                    descriereCod
                    <div class="downtext">
                        <div class="colorLanguage">
                            <div class="dot">
                            </div>
                            <div class="limbaj">
                                limbajAferent
                            </div>
                        </div>
                        <div class="likes">
                            0
                            <i class="fas fa-heart"></i>
                        </div>
                    </div>
                </div>
                </li>
            </ul>
            <ul><li>
                <div class="cod1">
                    <h1><a href="seeCode.html">numeCod4</a></h1>
                    descriereCod
                    <div class="downtext">
                        <div class="colorLanguage">
                            <div class="dot">
                            </div>
                            <div class="limbaj">
                               limbajAferent
                            </div>
                        </div>
                        <div class="likes">
                            7
                            <i class="fas fa-heart"></i>
                        </div>
                    </div>
                </div>
            </li>
            </ul>
        </div>
    </div>


</section>


<section class="lower_section">
    lower section
</section>
<footer>footer</footer>
<script src="main.js"></script>
</body>
</html>
