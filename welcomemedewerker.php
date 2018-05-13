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
    <li><a href="http://google.com/">One</a>
    </li>
    <li><a href="#">Three</a>
    </li>
  </ul>
</nav>
 <div class="sidenav">
   <ul>
   <li><a href="http://google.com/" class="logo">Logo</a>
   </li>
   </ul>
     <a href="autooverzicht.php">Login</a>
  <a href="welcomemedewerker.php.php">Medewerkers Home</a>
  <a href="medewerkertoevoegen.php">Medewerkers toevoegen</a>
  <a href="autotoevoegen.php">Auto toevoegen</a>
  <a href="logout.php">Logout</a>
</div>
        <h1 style="text-align: center">Welcome <?php echo $_SESSION['gebruikersnaam']; ?></h1> 
          <h1 style="text-align: center">Welcome <?php echo $_SESSION['medewerker_ID']; ?></h1> 
      <h2 style="text-align: center"><a href = "logout.php">Sign Out</a></h2>
    </body>
</html>
