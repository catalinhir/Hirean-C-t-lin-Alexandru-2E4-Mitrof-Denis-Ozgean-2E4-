<?php

require_once('connectdbinreg.php');

$errors = array();
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


        if(isset($_POST['send'])) {

          $firstname = $_POST['firstname'];
          $lastname = $_POST['lastname'];
          $email = $_POST['email'];
          $username = $_POST['username'];
          $password = $_POST['password'];

          $mysqli = mysqli_real_escape_string($firstname, $lastname, $email, $username, $password);

          
//=====================================START VALIDATION FIELD REGISTER===============================//
          
          if (empty($_POST['firstname'])) {
                
                array_push($errors, 'Campul de First Name este gol!');
          } 

          if (empty($_POST['lastname'])) {
                
              array_push($errors, 'Campul de Last Name este gol!');
          }

          if (empty($_POST['email'])) {
                
            array_push($errors, 'Campul de Email este gol!');
          }

          if (empty($_POST['username'])) {
                
            array_push($errors, 'Campul de Username este gol!');
          }

          if (empty($_POST['password'])) {
                
              array_push($errors, 'Campul de Password este gol!');
          }

          if (count($errors) == 0) {
            $password = md5($password);
            $sql = "INSERT INTO users (firstName, lastname, email, username, password) VALUES(?,?,?,?,?)";
            $stmtinsert = $db->prepare($sql);
            $result = $stmtinsert->execute([$firstname, $lastname, $email, $username, $password]);

            $_SESSION['username'] = $username;
            $_SESSION['succes'] = '<p style="text-align:center;color: red">Bine ai venit '.$username.'! Contul tau este activat!</p>'.'<br>';
            header('location: index.php');

            if($result){

            echo '';

          } else {

            $message = 'Eroare! VA RUGAM INCERCATI DIN NOU!';
            echo "<script type='text/javascript'>alert('$message');</script>";

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
?>