<?php
    include'global.php';
    session_start();
  $auto_ID = $_GET['Auto_ID'];
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
  <a href="login.php">Login</a>
  <a href="medewerker.php">Medewerkers</a>
  <a href="medewerkertoevoegen.php">Medewerkers toevoegen</a>
  <a href="#clients">Locaties</a>
  <a href="autobestellen.php">autobestellen</a>
</div>
<form action="cart.php" method="POST">
    <input type="date" name="beginDatum" value="" />
    <input type="date" name="eindDatum" value="" />
    <input name="auto_ID" value="<?php echo $auto_ID;?>" />
    <input type="submit" value="submit">
</form>
    </body>
</html>
