<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('figuri2.php');
$crud = new CRUD();
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$code_id = substr($actual_link, strpos($actual_link, "+") + 1);
$_SESSION['cod_id'] = $code_id;


$message = '';
//error_reporting(0);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Code Name</title>
    <link rel="stylesheet" href="CSS/seeCode.css">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>
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
                <li><a href="Documentation.php">Documentatie</a></li>
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
    <?php if (!$crud->checkIfIsUserCode()) { ?>
        <?php if ($crud->checkifcontributor()) { ?>
        <div class="wrapper">
            <div class="title">
                <?php
                echo $crud->afiseazaNumePaste()

                ?>
            </div>

            <div class="file_upload_list">
                <form
                        method="post" id="118932" name="formname">
                    <textarea rows="4" cols="50" name="formname23"
                              id="textid"><?php
                        if (isset($_POST['version']))
                            echo $message = $crud->afiseazaPasteVersiune($_POST['version']);
                        else
                            echo $crud->afiseazaPasteVersiune($crud->getNrVersiuni()) ?></textarea>
                    <div class="edit_files">
                        <label for="editeaza">
                            <input type="submit" onclick="schimbaVersiunea()" id="editeaza" name="editeaza"
                                   value="Edit">
                        </label>
                        <label>Alege versiunea:</label>
                        <?php
                        for ($x = 1;
                             $x <= $crud->getNrVersiuni();
                             $x++) {
                            ?>
                            <input type="submit" onclick="schimbaVersiunea1()" name="version"
                                   value="<?php echo $x ?>">
                            <?php
                        }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    <?php }else{ ?>
        <div class="wrapper">
            <div class="title">
                <?php
                echo $crud->afiseazaNumePaste()

                ?>
            </div>
            <div class="file_upload_list">
                <form method="post" id="1189322" name="formname">
                <textarea readonly rows="4" cols="50" name="formname2"
                          id="textid"><?php
                    if (isset($_POST['version']))
                        echo htmlspecialchars($crud->afiseazaPasteVersiune($_POST['version']));
                    else
                        echo htmlspecialchars($crud->afiseazaPasteVersiune($crud->getNrVersiuni())) ?>
                </textarea>
                    <label>Alege versiunea:</label>
                    <?php
                    for ($x = 1;
                         $x <= $crud->getNrVersiuni();
                         $x++) {
                        ?>
                        <input type="submit" name="version" value="<?php echo $x ?>">
                        <?php
                    }
                    ?>
                </form>
            </div>
        </div>
        <script src="main.js"></script>
    <?php } ?>
    <?php }elseif ($crud->checkIfIsUserCode()) { ?>
        <div class="wrapper">
            <div class="title">
                <?php
                echo $crud->afiseazaNumePaste()

                ?>
            </div>

            <div class="file_upload_list">
                <form
                        method="post" id="118932" name="formname">
                    <textarea rows="4" cols="50" name="formname23"
                              id="textid"><?php
                        if (isset($_POST['version']))
                            echo $message = $crud->afiseazaPasteVersiune($_POST['version']);
                        else
                            echo $crud->afiseazaPasteVersiune($crud->getNrVersiuni()) ?></textarea>
                    <div class="edit_files">

                        <input type="submit" onclick="schimbaVersiunea()" id="editeaza" name="editeaza"
                               value="Edit">
                        <input type="submit" onclick="schimbaVersiunea()" id="sterge" name="sterge" value="Delete">

                        <label for="version1">Alege versiunea:</label>
                        <?php
                        for ($x = 1;
                             $x <= $crud->getNrVersiuni();
                             $x++) {
                            ?>
                            <input type="submit" onclick="schimbaVersiunea1()" name="version" id="version<?php echo $x ?>"
                                   value="<?php echo $x ?>">
                            <?php
                        }
                        ?>
                        <input type="text" onclick="schimbaVersiunea()" name="addcontri" value="">
                        <input type="submit" onclick="" name="addButton" id="addButton" value="Adauga Contributor">
                    </div>
                </form>
            </div>
        </div>
    <?php } ?>
</div>

<script src="js/main.js"></script>
</body>
</html>
<!--form action="action.php" method="post">
    <div class="edit_file">
        <label for="edit_file">
            <button form_id="118932" name="edit_file" value="Edit"
            </button>
            <input type="submit" id="edit_file" name="editeaza">
            <span>Edit Code</span>
        </label>
    </div>
</form>
<?php /**/ ?>


</div>-->