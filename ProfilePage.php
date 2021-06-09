<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ro">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Page!</title>
    <link rel="stylesheet" href="StyleProfile.css">
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
    <li><a href="despre.html">Despre</a></li>
    <li><a href="anunturi.html">Anunturi</a></li>
    <li><a href="profesori.html">Profesori</a></li>
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
    
    <section class="tripple_section">
        <aside >
            <h1>Repositories:</h1>
            <ul>
                <li>rep1</li>
                <li>rep2</li>
                <li>rep3</li>
                <li>rep4</li>
            </ul>
        </aside>
        <div class="profile userinfo">
            <img src="images/pngegg.png" alt="avatar">
            <br><br>
            <?php if (isset($_SESSION["username"])):
                 echo  '<p style="font-size:25px;">' .$_SESSION["username"]; '</p>'; ?></strong></p>
            <?php endif ?>
            <br><br><br><br>
            <div id="circle1"> </div>
            &nbsp; &nbsp;
            <p style="display: inline;"> Hi there! I'm using Paste It!</p>
            <br><br><br><br><br><br>
            <a href="EditProfile.php"><button>Edit your profile</button></a>
           
        </div>
        <div class="profile description">
            <p>A description about me</p>  <hr/> <br>
            <?php
            $con = new PDO("mysql:host=localhost;dbname=inreguser", 'root', '');
            $usernameActual = $_SESSION["username"];                                                  //TODO trateaza notice descriere
            $sth = $con->prepare("SELECT description FROM userprofile p JOIN users u ON p.user_id = u.id AND u.username='$usernameActual'");

            $sth->setFetchMode(PDO:: FETCH_OBJ);
            $sth->execute();
            $maxrow = $sth->fetch(PDO::FETCH_ASSOC);
            $descriere = $maxrow['description'];

            ?>
            <div id="mydescription"> <?php echo $descriere ?></div>
            <br><br>
        </div>
    </section>
    
    
    <section class="lower_section">
        lower section
    </section>
    <footer>footer</footer>
    <script src="main.js"></script>
</body>
</html>
