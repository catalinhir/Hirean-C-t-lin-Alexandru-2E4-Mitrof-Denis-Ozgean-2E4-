<?php session_start();
//error_reporting(0);
include 'figuri2.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Code Name</title>
    <link rel="stylesheet" href="CSS/Style2.css">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
</head>
<div>
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
    <?php $crud = new CRUD();
    if (isset($_POST['version'])) $message = $crud->afiseazaPasteVersiune(1, $_POST['version']); else$message = 'nope'; ?>
    <div class="formular">
        <form action="action.php" method="get">
            <div class="primul_label">
                <div class="top">
                    <label>Introdu numele codului:</label>
                </div>
            </div>
            <input type="text" name="NumeCod"/>
            <br><br>
            <label for="limbaj">Alege un limbaj:</label>
            <select name="limbaj" id="limbaj">
                <option value="JSON">NONE</option>
                <option value="Java">Java</option>
                <option value="HTML">HTML</option>
                <option value="CSS">CSS</option>
                <option value="PHP">PHP</option>
                <option value="C/C++">C/C++</option>
                <option value="Python">Python</option>
                <option value="JavaScript">JavaScript</option>
                <option value="C#">C#</option>
                <option value="XML">XML</option>
                <option value="JSON">JSON</option>
            </select>
            <br>
            <div class="second_label">
                <div class="top2">
                    <label for="textarea">Introdu cod:</label>
                </div>
            </div>
            <textarea name="cod" rows="35" id="textarea" cols="40"><?php echo htmlspecialchars($message); ?></textarea>
            <input type="submit" value="Go!"/>
            <div class="listBar">
                <ul>
                    <li>Other Pastes:</li>
                    <?php
                    $crud->afiseazalistacoduri()
                    ?>
                </ul>
            </div>
        </form>
    </div>

</div>


<script src="js/main.js"></script>

</body>
</html>