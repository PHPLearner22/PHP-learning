<?php
include 'global.php';
session_start();
if($_SESSION['User_type'] != 'Medewerker'){
    die();
    
}else{
   $auto_ID = $_GET['Auto_ID'];
echo $auto_ID;

    $sql = "DELETE FROM auto WHERE Auto_ID = '$auto_ID'";
    $results = $conn ->query($sql);
    echo $sql. $conn->error;
     header('location: autooverzicht.php');
}
?>