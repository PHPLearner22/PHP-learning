<?php
include 'global.php';
session_start();


$car = [
'kenteken' => $_POST['auto_ID'],
'begindat' =>  strtotime($_POST['beginDatum']),
'einddat' =>  strtotime($_POST['eindDatum']),
];
array_push($_SESSION['Cart'], $car);

foreach ($_SESSION['Cart'] AS $i){
    echo $i;

}
// echo $_SESSION['Cart'][0];


header('location: autobestellen.php');
?>
