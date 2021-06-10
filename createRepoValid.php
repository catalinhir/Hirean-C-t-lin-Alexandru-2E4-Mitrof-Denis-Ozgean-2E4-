<?php

require_once('connectdbinreg.php');


$errors = array();

if (!isset($_SESSION)) {
    session_start();
}

        if(isset($_POST['create'])) {

          $numeRepo = $_POST['numeRepo'];
          $zileExp = $_POST['zileExp'];


         // $mysql = mysqli_real_escape_string( $mysqli, $numeRepo,$zileExp);

          
//=====================================START VALIDATION FIELD REGISTER===============================//
          
          if (empty($_POST['numeRepo'])) {
                
                array_push($errors, 'Alege un nume!');
          } 

          if (empty($_POST['zileExp'])) {
                
              array_push($errors, 'Alege cand sa expire!');
          }


          if (count($errors) == 0) {
//TODO VERIFICA, TRIMITE ALTUNDEVA
            $sql = "INSERT INTO repo (name, expiration, user_id) VALUES(?,?,?)";
            $stmtinsert = $db->prepare($sql);
              if (isset($_SESSION["username"]))
            $result = $stmtinsert->execute([$numeRepo,  date('Y-m-d', strtotime(date("Y/m/d").'  +'.$zileExp.' days')), $_SESSION['id']]);
            else
                $result = $stmtinsert->execute([$numeRepo,  date('Y-m-d', strtotime(date("Y/m/d").'  +'.$zileExp.' days')), null]);
            if($result){

            echo '';

          } else {

            $message = 'Eroare! VA RUGAM INCERCATI DIN NOU!';
            echo "<script type='text/javascript'>alert('$message');</script>";

        	}
    }
        } else {

          unset($_POST['create']);


      
    }
?>