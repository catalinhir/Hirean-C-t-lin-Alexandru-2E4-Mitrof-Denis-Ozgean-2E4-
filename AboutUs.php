<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Page!</title>
    <link rel="stylesheet" href="CSS/aboutUs.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
</head>
<body>
<header>
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
                    <li><a href="Scholarly.php">Documentatie</a></li>
                    <li><a href="Contact.php">Contact</a></li>
                </ul>
                <div class="register">
                    <li><a href="SignIn.php"><i class="fas fa-sign-in-alt"></i> SignIn/Up </a></li>
                    <li><a href="seecode.php"><i class="fas fa-upload"></i> Upload</a></li>
                    <?php if (isset($_SESSION["username"])): ?>
                        <p><strong><? echo $_SESSION["username"]; ?></strong></p>
                        <li><a href="index.php?logout='1'" class="alog">| Logout <i class="far fa-times-circle"></i></a>
                        </li>
                    <?php endif ?>
                </div>
            </div>
        </div>

        <h2>Our Team</h2>
        <div class="row">
            <div class="column">
                <div class="card">
                    <div class="container">
                        <h2>Gruia Carmen</h2>
                        <p class="title">Grupa: X</p>
                        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                        <p>carmen.gruia@info.uaic.ro</p>
                        <p>
                            <button class="button">Contact</button>
                        </p>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="card">
                    <div class="container">
                        <h2>Hirean Catalin Alexandru</h2>
                        <p class="title">Grupa: E4</p>
                        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                        <p>catalin.hirean@info.uaic.ro</p>
                        <p>
                            <button class="button">Contact</button>
                        </p>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="card">
                    <div class="container">
                        <h2>Mitrof Denis-Ozgean</h2>
                        <p class="title">Grupa: E4</p>
                        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                        <p>denis.mitrof@info.uaic.ro</p>
                        <p>
                            <button class="button">Contact</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <script src="js/main.js"></script>
</body>
</html>
