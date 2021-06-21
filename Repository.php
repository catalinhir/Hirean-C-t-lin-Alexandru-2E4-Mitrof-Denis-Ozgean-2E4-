<?php
require_once('uploadCodeValid.php');
require_once('createRepoValid.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> <?php
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $whatIWant = substr($actual_link, strpos($actual_link, "="));
        echo $whatIWant;
        $_SESSION['repoName'] = $whatIWant ?></title>
    <link rel="stylesheet" href="CSS/uploadCode.css">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>
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
            <?php
            $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $whatIWant = substr($actual_link, strpos($actual_link, "=") + 1);
            echo '<p class="numeRepository">' . $whatIWant . '</p>'; ?>
        </div>
        <div class="listaRepo">
            <ul>
                <li> Owner: <?php $con = new PDO("mysql:host=localhost;dbname=inreguser", 'root', '');
                    $numeUser = $con->prepare("SELECT username FROM users u JOIN repo r ON r.user_id = u.id WHERE r.name = '$whatIWant'");
                    $numeUser->setFetchMode(PDO:: FETCH_OBJ);
                    $numeUser->execute();
                    $nume = $numeUser->fetch(PDO::FETCH_ASSOC); ?>
                    <?php if (isset($_SESSION["username"])) :
                        if ($nume['username'] == $_SESSION['username']) :   //TODO verifica daca esti in sesiune. ! VERIFICAT
                            ?>
                            <span><a href="ProfilePage.php"
                                     class="searchresult"><?php echo $nume['username']; ?></a></span>

                        <?php else: ?>

                            <span><a href="otherProfile.php?user=<?php echo $nume['username'] ?>"
                                     class="searchresult"><?php echo $nume['username']; ?></a></span>
                        <?php endif; ?>
                    <?php else: ?>
                        <span><a href="otherProfile.php?user=<?php echo $nume['username'] ?>"
                                 class="searchresult"><?php echo $nume['username']; ?></a></span>
                    <?php endif; ?>


                    <?php
                    $con = new PDO("mysql:host=localhost;dbname=inreguser", 'root', '');
                    if (isset($_SESSION["username"])) {
                        $sth = $con->prepare("SELECT file_name FROM files f JOIN repo r ON r.repo_id = f.repo_id WHERE r.name = '$whatIWant'");
                    } elseif (!isset($_SESSION["username"])) {
                        $sth = $con->prepare("SELECT file_name FROM files f JOIN repo r ON r.repo_id = f.repo_id WHERE r.name = '$whatIWant' ");
                    }
                    $sth->setFetchMode(PDO:: FETCH_OBJ);
                    $sth->execute();
                    $result = $sth->fetchAll();
                    $maxrow = $sth->fetch(PDO::FETCH_ASSOC);
                    foreach ($result

                    as $row){ ?>
                <li>   <?php echo $row->file_name; ?> </li> <?php
                }
                ?>
            </ul>
            <?php if (isset($_SESSION["username"])) :
                if ($nume['username'] == $_SESSION["username"]) :   //daca e al meu
                    ?>
                    <div class="choose_file">
                        <form action="uploadCodeValid.php" method="post" enctype="multipart/form-data">
                            <label for="choose_file">
                                <input name="filename" type="file" id="choose_file">
                                <span>Choose File</span>
                                <input type="submit" name="submit" value="Upload">
                            </label>
                        </form>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
    <script src="main.js"></script>
</body>
</html>