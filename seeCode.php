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
    <link rel="stylesheet" href="seeCode.css">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico"/>
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
    <?php if (!$crud->checkIfIsUserCode()) { ?>
        <div class="wrapper">
            <div class="title">
                <?php
                echo $crud->afiseazaNumePaste()

                ?>
            </div>
            <div class="file_upload_list">
                <form action="" method="post" id="118932" name="formname">
                <textarea readonly rows="4" cols="50" name="formname2"
                          id="textid"><?php
                    if (isset($_POST['version']))
                        echo $message = $crud->afiseazaPasteVersiune($_POST['version']);
                    else
                        echo $crud->afiseazaPasteVersiune(1) ?>
                </textarea>
                    <label for="version">Alege versiunea:</label>
                    <?php
                    for ($x = 1;
                         $x <= $crud->getNrVersiuni();
                         $x++) {
                        ?>
                        <input type="submit" name="version" form_id="118932" value="<?php echo $x ?>">
                        <?php
                    }
                    ?>
                </form>
            </div>
        </div>
        <script src="main.js"></script>
    <?php }elseif ($crud->checkIfIsUserCode()) { ?>
        <div class="wrapper">
            <div class="title">
                <?php
                echo $crud->afiseazaNumePaste()

                ?>
            </div>

            <div class="file_upload_list">
                <form action="editdelete.php" method="post" id="118932" name="formname">
                    <textarea rows="4" cols="50" name="formname23"
                              id="textid"><?php
                        if (isset($_POST['version']))
                            echo $message = $crud->afiseazaPasteVersiune($_POST['version']);
                        else
                            echo $crud->afiseazaPasteVersiune($crud->getNrVersiuni()) ?></textarea>
                    <div class="edit_files">
                        <label for="edit_file">

                            <input type="submit" id="editeaza" name="editeaza" value="edit">
                            <input type="submit" id="sterge" name="sterge" value="sterge">

                        </label>
                    </div>
                </form>
            </div>
            <form action="editdelete.php" method="POST" id="1189321" name="versions">
                <label for="version">Alege versiunea:</label>
                <?php
                for ($x = 1;
                     $x <= $crud->getNrVersiuni();
                     $x++) {
                    ?>
                    <input type="button" formmethod="post" name="versions" form="1189" value="<?php echo $x ?>">
                    <?php
                }
                ?>
            </form>

        </div>

    <?php } ?>
</div>

<script src="main.js"></script>
</body>
</html>
<<!--form action="action.php" method="post">
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