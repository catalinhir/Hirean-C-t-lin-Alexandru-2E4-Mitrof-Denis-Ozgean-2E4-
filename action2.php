<?php

require_once('connectdbinreg.php');
include 'figuri2.php';

$errors = array();

if (!isset($_SESSION)) {
    session_start();
}


            $crud = new CRUD();
            $versiune = $_POST['version'];
//print_r($_GET);


//TODO VERIFICA, TRIMITE ALTUNDEVA
$sql = "SELECT text FROM pastes WHERE code_id=1 AND version = $versiune";
$cerere = BD::getConnection()->prepare($sql);
$cerere->execute();
$results = $cerere->fetchAll(PDO::FETCH_ASSOC);
foreach($results as $result) {
    echo $result['text'];
}

header('Location: 12321.php');







