<?php 

$errors = array();

    session_start();

    if(isset($_POST['send'])) {
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    
  if (empty($_POST['username'])) {
      
        array_push($errors, 'Campul de Username este gol!!');  
    }

    if (empty($_POST['password'])) {
      
        array_push($errors, 'Campul de Password este gol!!'); 
    }

    if(count($errors) == 0) {
    $password = md5($password);
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";
    $db = mysqli_connect('localhost', 'root', '');

    $db_select = mysqli_select_db($db, 'inreguser');

      if (!$db_select) {

    die("Baza de date prezinta o eroare: " . mysqli_error($connection));
}

    $results = mysqli_query($db, $sql) or die ('Error $db or $sql');

    while($row = mysqli_fetch_array($results)){
   
      if ($row['username'] == $username && $row['password'] == $password) {

            $_SESSION['username'] = $username;
          $_SESSION['succes'] = '<p style="text-align:center;color: red">Bine ai revenit, '.$username.'! Ce faci astazi?</p>'.'<br>';
          header('location: index.php');
    } else {

        array_push($errors, 'ERROR! Username or Password Invalid');
    } 

}

    } else {
      unset($_POST['send']);
    }

    if (isset($_GET['logout'])) {

    	session_destroy();
    	unset($_SESSION['username']);
    	header('location: index.php');
    }

    
}

?>