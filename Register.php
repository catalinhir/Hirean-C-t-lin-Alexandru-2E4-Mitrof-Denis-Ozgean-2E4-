 <?php
 require_once('validationreg.php');
  require_once('connectdbinreg.php');
?>

<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Page!</title>
    <link rel="stylesheet" href="CSS/Style.css">
</head>


<body>
   <header class="signin">

        <a href="Index.php"><img src="images/Logoo.png" alt="Logo"></a>
    </header>
        
<form action="Register.php" method="POST">
<div class="login-box">
  <h1>Registration</h1>
  <?php include('errors.php'); ?>
  <div class="textbox">
    <i class="fas fa-user"></i>
    <input type="text" name="firstname" placeholder="First Name" autocomplete="off" required>
</div>
  <div class="textbox">
    <i class="fas fa-user"></i>
    <input type="text" name="lastname" placeholder="Last Name" autocomplete="off" required>
  </div>

  <div class="textbox">
    <i class="fas fa-envelope"></i>
    <input type="Email" name="email" placeholder="Email" autocomplete="off" required>
  </div>

  <div class="textbox">
      <i class="fas fa-user"></i>
      <input type="text" name="username" placeholder="Username" autocomplete="off" required>
    </div>

    <div class="textbox">
        <i class="fas fa-lock"></i>
        <input type="Password" name="password" placeholder="Password" autocomplete="off" required>
</div>
     

  <input type="submit" class="btn" name="send" value="Register"><br>
  <div class="a">
  
</div>

<div class="logreg">
<a class="nav-link" href="SignIn.php">Ai cont? Logheaza-te!</a>
</div>

</form><br>

    <footer>footer</footer>
</body>
</html>










