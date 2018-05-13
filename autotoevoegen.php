<?php
    include'global.php';
      session_start();
      if($_SESSION['User_type'] != 'Medewerker'){
          die();
        }
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
  <a href="medewerker.php">Medewerkers</a>
  <a href="medewerkertoevoegen.php">Medewerkers toevoegen</a>
  <a href="#clients">Locaties</a>
  <a href="logout.php">Logout</a>

</div>
        <form style="text-align: center" method="post" action="class.auto.php">
  	<!--<?php// include('errors.php'); ?>-->
  	<div class="input-group">
  	  <label>Kenteken</label>
  	  <input type="text" name="kenteken" value="">
  	</div>
  	<div class="input-group">
  	  <label>Merk</label>
  	  <input type="text" name="merk" value="">
  	</div>
  	<div class="input-group">
  	  <label>Type</label>
  	  <input type="text" name="type">
  	</div>
  	<div class="input-group">
  	  <label>Dagprijs</label>
  	  <input type="text" name="dagprijs">
  	</div>

  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_auto">Register</button>
  	</div>
  	<p>

  	</p>
  </form>

    </body>
</html>
