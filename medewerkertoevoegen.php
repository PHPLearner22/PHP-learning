<?php
    include'global.php'; 
      session_start();

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Toolsforever</title>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>
    <body>
 <nav>
     <ul>
    <li><a href="http://google.com/">One</a>
    </li>
    <li><a href="loginklant.php">Login Klant</a>
    </li>
    <li><a href="loginmedewerker.php">Login Medewerker</a>
    </li>
  </ul>
</nav>
 <div class="sidenav">
   <ul>
       <li><a href="index.php" class="logo">Logo</a>
   </li>
   </ul>
     <a href="login.php">Login</a>
     <a href="#medewerkers">Medewerkers</a>
  <a href="#services">Producten</a>
  <a href="#clients">Locaties</a>
  <a href="#contact">Fabrieken</a>
</div>
                <form style="text-align: center" method="post" action="medewerkerreg.php">
  	<!--<?php// include('errors.php'); ?>-->
  	<div class="input-group">
  	  <label>Voornaam</label>
  	  <input type="text" name="voornaam" value="">
  	</div>
  	<div class="input-group">
  	  <label>Voorvoegsels</label>
  	  <input type="text" name="voorvoegsels" value="">
  	</div>
  	<div class="input-group">
  	  <label>Achternaam</label>
  	  <input type="text" name="achternaam">
  	</div>
  	<div class="input-group">
  	  <label>Gebruikersnaam</label>
  	  <input type="text" name="gebruikersnaam">
  	</div>
        <div class="input-group">
  	  <label>Wachtwoord</label>
  	  <input type="password" name="wachtwoord">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_usermed">Register</button>
  	</div>
  	<p>
  
  	</p>
  </form>

    </body>
</html>