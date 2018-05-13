<?php
    include'global.php';
    session_start();
    $sql = "SELECT * FROM auto";
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
            <td> Kenteken</td>
            <td>Merk</td>
            <td>Type</td>
            <td>Dagprijs</td>
            <td>Voor hoelang wilt u reseveren</td>
            <td>Bestel</td>
            </thead>
            <?php
                if($result){
                    ?>
            <tr>
                <?php
                while($row = $result->fetch_assoc()){
                    $auto['Auto_ID'] = $row['Auto_ID'];
                    $auto['Merk'] = $row['Merk'];
                    $auto['Type'] = $row['Type'];
                    $auto['Dagprijs'] = $row['Dagprijs'];
                ?>
                <td><?php echo $auto['Auto_ID'];?></td>
                <td><?php echo $auto['Merk'];?></td>
                <td><?php echo $auto['Type'];?></td>
                <td><?php echo $auto['Dagprijs'];?></td>
                <td> <a href="autobestellen2.php?Auto_ID=<?php echo $auto['Auto_ID'];?>">Toevoegen aan Winkelwagen</a></td>

                           </tr>
 <?php

                }
            }
         ?>

        </table>
        <?php
        $count = 0;
        foreach ($_SESSION['Cart'] AS $i){
          $count += 1;
        }
                echo json_encode($_SESSION['Cart']);
          ?>

        <div>
          <a href="voltooibestelling.php">Als u klaar bent druk hier om uw bestelling te voltooien. <?php echo $count;?></a>
        </div>
    </body>
</html>
