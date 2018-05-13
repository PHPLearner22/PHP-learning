<?php
include 'global.php';
if (isset($_POST['reg_usermed'])) {
  // receive all input values from the form
  $voornaam = mysqli_real_escape_string($conn, htmlentities($_POST['voornaam']));
  $voorvoegsel = mysqli_real_escape_string($conn,htmlentities($_POST['voorvoegsels']));
  $achternaam = mysqli_real_escape_string($conn,htmlentities($_POST['achternaam']));
  $username = mysqli_real_escape_string($conn, htmlentities($_POST['gebruikersnaam']));
  $password = mysqli_real_escape_string($conn,htmlentities($_POST['wachtwoord']));

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM medewerkers WHERE Gebruikersnaam='$username' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);

    if ($user['Gebruikersnaam'] === $username) {
      echo 'Gebruikersnaam is in gebruik';
    } else{
     // Finally, register user if there are no errors in the form
  	$passwordbcrypt = password_hash ($password, PASSWORD_BCRYPT);//encrypt the password before saving in the database
  	$query = "INSERT INTO Medewerkers (Voorletters, Voorvoegsels, Achternaam, Gebruikersnaam, Wachtwoord) 
  			  VALUES('$voornaam','$voorvoegsel','$achternaam','$username','$passwordbcrypt')";
  	mysqli_query($conn, $query);
        header('location: welcomemedewerker.php');
  }
  }