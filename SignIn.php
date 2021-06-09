 <?php
require_once('validationlogin.php');
require_once('connectdbinreg.php');
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Page!</title>
    <link rel="stylesheet" href="Style.css">
</head>


<body>
    <header class="signin">

        <a href="Index.php"><img src="images/Logoo.png" alt="Logo"></a>
    </header>


<form action="SignIn.php" method="POST">

<div class="login-box">
  <h1>Login</h1>
  <?php include('errors.php'); ?>
  <div class="textbox">
    <i class="fas fa-user"></i>
    <input type="text" name="username" placeholder="Username" autocomplete="off" required>
  </div>

  <div class="textbox">
    <i class="fas fa-lock"></i>
    <input type="password" name="password" placeholder="Password" required>
  </div>

  <input type="submit" class="btn" name="send" value="Log In">
</form>


<div class="createacc">
  <a class="nav-link" href="Register.php">Nu ai cont? Creaza cont aici!</a>
</div><br>
<footer>footer</footer>
</div>

  </body>
</html>





