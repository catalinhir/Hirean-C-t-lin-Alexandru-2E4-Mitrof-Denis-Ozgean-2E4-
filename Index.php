<?php include('validationreg.php');
error_reporting(0);
include('figuri2.php');
if (session_status() == PHP_SESSION_NONE) {
    //session_start();
}
$crud = new CRUD();
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Page!</title>
    <link rel="stylesheet" href="CSS/Style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
</head>


<body>
<div class="mobile-container">
    <div class="topnav">
        <img src="images/Logoo.png" class="logo" alt="logo">
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>


        <div id="myLinks">
            <ul id="ul">
                <li><a href="Index.php">Acasa</a></li>
                <li><a href="AboutUs.php">Despre</a></li>
                <li><a href="Scholarly.php">Documentatie</a></li>
                <li><a href="Contact.php">Contact</a></li>


            </ul>

            <div class="register">

                <ul>
                <?php
                if (isset($_SESSION["username"])) {
                    echo ' <li><a href="ProfilePage.php" class="crazylogin"><i class="fas fa-sign-in-alt"></i>' . $_SESSION["username"] . '</a><li>';
                } elseif (!isset($_SESSION["username"])) {
                    echo '<li><a href="SignIn.php" class="crazylogin"><i class="fas fa-sign-in-alt"></i> Sign In/Up</a></li>';
                }
                ?>

                <li><a href="createRepository.php"><i class="fas fa-upload"></i> Upload</a></li>
                <li><a href="AdaugaCod.php"><i class="fas fa-upload"></i>Paste it</a></li>
                <?php if (isset($_SESSION["username"])): ?>
                    <li><a href="index.php?logout='1'" class="alog">| Logout <i class="far fa-times-circle"></i></a>
                    </li>
                </ul>
                    <form method="post" id="searchbar">
                        <label>Search</label>
                        <input type="text" name="search">
                        <input type="submit" name="submit">

                    </form>
                <?php endif ?>
            </div>
            <?php

            $con = new PDO("mysql:host=localhost;dbname=inreguser", 'root', '');

            if (isset($_POST["submit"])) {
                $str = $_POST["search"];
                $sth = $con->prepare("SELECT * FROM users WHERE username = '$str'");

                $sth->setFetchMode(PDO:: FETCH_OBJ);
                $sth->execute();

                if ($row = $sth->fetch()) {
                    ?>
                    <?php if (isset($_SESSION["username"])) :
                        if ($str == $_SESSION["username"]) :   //TODO verifica daca esti in sesiune. ! VERIFICAT
                            ?>
                            <span><a href="ProfilePage.php"
                                     class="searchresult"><?php echo $row->username; ?></a></span>

                        <?php else: ?>

                            <span><a href="otherProfile.php?user=<?php echo $str ?>"
                                     class="searchresult"><?php echo $row->username; ?></a></span>
                        <?php endif; ?>
                    <?php else: ?>
                        <span><a href="otherProfile.php?user=<?php echo $str ?>"
                                 class="searchresult"><?php echo $row->username; ?></a></span>
                    <?php endif; ?>
                    <?php
                } else { ?>
                    <span><a class="searchresult"><?php echo "          Name does not exist."; ?></a></span>
                <?php }


            }

            ?>
        </div>
    </div>
</div>


    <?php if (isset($_SESSION['succes'])): ?>
        <div class="errorsucces">
            <h3>
                <?php
                echo $_SESSION['succes'];
                unset($_SESSION['succes']);
                ?>
            </h3>
        </div>
    <?php endif ?>


    <div class="tripple_section">
        <div class="asidemobile">

            <?php
            echo 'My pastes:';
            echo $crud->afiseazaListaPasteUser($_SESSION['id']);
            ?>

        </div>
        <span>Best Code</span>
        <div class="home_first">a</div>
        <div class="home_second">b</div>
        <article>

            <?php
            echo 'Other Pastes:';
            if (!isset($_SESSION['username'])) {
                echo $crud->afiseazaListaPasteOtherUsers(-1);
            } else
                echo $crud->afiseazaListaPasteOtherUsers($_SESSION['id']);

            ?>
        </article>

    </div>

    <script src="js/main.js"></script>
</body>
</html>

















