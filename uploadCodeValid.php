<?php
require_once('connectdbinreg.php');
include 'connectdbinreg.php';

if (!isset($_SESSION)) {
    session_start();
}

// File upload path
$con = new PDO("mysql:host=localhost;dbname=inreguser", 'root', '');
$targetDir = "uploads/";
$whatIWant = $_SESSION['repoName'];
$sth = $con->prepare("SELECT repo_id FROM repo WHERE name = '$whatIWant'");
$sth->setFetchMode(PDO:: FETCH_OBJ);
$sth->execute();
$result = $sth->fetchAll();
$maxrow = $sth->fetch(PDO::FETCH_ASSOC);
foreach ($result as $row)
if (isset($_POST['submit'])) {
    $fileName = basename($_FILES["filename"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

}
if(isset($_POST["submit"]) && !empty($_FILES["filename"]["name"])){
    // Allow certain file formats
    $allowTypes = array('java','php','html','css','jpg');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["filename"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database

            $insert = $db->prepare("INSERT into FILES (file_name, file_type, repo_id) VALUES (?,?,?)");
            $result = $insert->execute([$fileName,$fileType, $row->repo_id]);

            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            }
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo $statusMsg
?>