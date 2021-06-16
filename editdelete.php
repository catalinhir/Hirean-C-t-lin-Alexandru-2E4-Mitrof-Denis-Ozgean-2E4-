<?php

require_once('connectdbinreg.php');
include 'figuri2.php';

$errors = array();

if (!isset($_SESSION)) {
    session_start();
}

$text = $_POST['formname23'];
$codId = $_SESSION['cod_id'];
$crud = new CRUD();
if (isset($_SESSION['id']))
    $id = $_SESSION['id'];
else
    $id = null;
if (isset($_SERVER['HTTP_REFERER'])) {
    $previous = $_SERVER['HTTP_REFERER'];
}
if (isset($_POST['editeaza'])) {
    echo $crud->verificaAcelasiText($codId, $text);
    if ($crud->verificaAcelasiText($codId, $text)) {

        $crud->modificaPaste($codId, $text);
}


}
if (isset($_POST['sterge'])) {
        $crud->stergePaste($codId);
    if (isset($_SERVER['HTTP_REFERER'])) {
        $previous = $_SERVER['HTTP_REFERER'];
    }

}
header('Location:' . $previous);


/*$sql = "SELECT * FROM pastes WHERE code_id = ?";  ASTA E PT EDIT
$cerere = BD::getConnection()->prepare($sql);
$cerere->execute([$id]);
$test = $cerere->fetchObject('Paste');
echo $test->nume;
$sql = "INSERT INTO pastes (code_id,nume,text,version,user_id, type) VALUES (?, ?, ?, ?, ?, ?)";
$cerere = BD::getConnection()->prepare($sql);
$cerere->execute([$test->code_id, $test->nume, $textPaste, $test->version + 1, $test->user_id, $test->type]);*/









