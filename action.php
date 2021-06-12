<?php

require_once('connectdbinreg.php');
include 'figuri2.php';

$errors = array();

if (!isset($_SESSION)) {
    session_start();
}


$crud = new CRUD();
$textPaste = $_GET['cod'];
$numeCod = $_GET['NumeCod'];
$limbaj = $_GET['limbaj'];
if(isset($_SESSION['id']))
$id = $_SESSION['id'];
else
    $id = null;
if (empty($_GET['cod'])) {
  echo  array_push($errors, 'Scrie cod!');
}
elseif (empty($_GET['NumeCod'])) {
    echo array_push($errors, 'Scrie numele codului!');
}
else {

    //echo $id;
//TODO VERIFICA, TRIMITE ALTUNDEVA
    $sql = "INSERT INTO pastes (nume,text,version,user_id, type) VALUES (?, ?, ?, ?, ?)";
    $cerere = BD::getConnection()->prepare($sql);
    $cerere->execute([$numeCod, $textPaste, 1, $id, $limbaj]);
}

/*$sql = "SELECT * FROM pastes WHERE code_id = ?";  ASTA E PT EDIT
$cerere = BD::getConnection()->prepare($sql);
$cerere->execute([$id]);
$test = $cerere->fetchObject('Paste');
echo $test->nume;
$sql = "INSERT INTO pastes (code_id,nume,text,version,user_id, type) VALUES (?, ?, ?, ?, ?, ?)";
$cerere = BD::getConnection()->prepare($sql);
$cerere->execute([$test->code_id, $test->nume, $textPaste, $test->version + 1, $test->user_id, $test->type]);*/









