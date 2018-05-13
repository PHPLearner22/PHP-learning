<?php
    include'global.php';
    session_start();

$time = time();
if($_SESSION['Cart'] !=[]){
$sql = "INSERT INTO factuur (Factuurdatum, Klantcode) VALUES (".$time.", ".$_SESSION['klant_ID'].")";
  if($conn->query($sql)){
    echo "YEEY";
    $factuur_ID = $conn->insert_id; //haalt de laaste ingevulde id op
      foreach($_SESSION['Cart'] AS $i){
        $auto_ID = json_encode($i["kenteken"]);
                $beginDatum = $i["begindat"];
                $eindDatum = $i["einddat"];


        $sql = "INSERT INTO factuurregel (Factuur_ID, Auto_ID, Begindatum, Einddatum) VALUES(".$factuur_ID.", ".$auto_ID.", ".$beginDatum.",".$eindDatum.")";
        if($conn->query($sql)){
            echo "factuurregel toegevoegd";
        }else{
          echo $conn->error;
        }
  }
  header("location: factuur.php?factuur_ID=$factuur_ID"); // Redirecting To Other Page
}else{
  echo "neey";
}
}else{
  echo "U staat droog";
}
?>
