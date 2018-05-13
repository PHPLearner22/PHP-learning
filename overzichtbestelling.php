<?php
    include'global.php';
    session_start();
    $sql = "SELECT * FROM factuur WHERE $factuur_ID IS "'.$_GET['factuur_ID'].'"";
    $result =$conn->query($sql);
    echo $conn->error;
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
  <a href="welcomemedewerker.php.php">Medewerkers Home</a>
  <a href="medewerkertoevoegen.php">Medewerkers toevoegen</a>
  <a href="autotoevoegen.php">Auto toevoegen</a>
  <a href="logout.php">Logout</a>
</div>
        <table>
            <thead>
            <td> Factuur</td>
            <td> printen</td>
          </thead>
            <?php
                if($result){
                    ?>
            <tr>
                <?php
                while($row = $result->fetch_assoc()){
                    $factuur['Factuur_ID'] = $row['Factuur_ID'];

                ?>
                <td><?php echo $factuur['Factuur_ID'];?></td>
                <td> <a href="?Factuur_ID=<?php echo $factuur['factuur_ID'];?>">Printen</a></td>

                           </tr>
 <?php

                }
            }
         ?>

        </table>
        <div>
        </div>
    </body>
</html>
