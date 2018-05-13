<?php
include 'global.php';
 session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']);

      $sql = "SELECT * FROM klanten WHERE Gebruikersnaam = '$myusername'";
      $result = mysqli_query($conn,$sql);
      if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}else{
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      echo $row ['Gebruikersnaam'];
         if(password_verify($mypassword, $row['Wachtwoord'])){
         $_SESSION['gebruikersnaam'] = $row['Gebruikersnaam'];
         $_SESSION['klant_ID'] = $row['Klant_ID'];
         $_SESSION['User_type'] = 'Klant';
         $_SESSION['Cart'] = array();


         header("location: welcomeklant.php");
      }else {
         echo "Your Login Name or Password is invalid";
      }
}
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
    <li><a href="http://google.com/">One</a>
    </li>
    <li><a href="#">Two</a>
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
  <a href="#medewerkers">Medewerkers</a>
  <a href="#services">Producten</a>
  <a href="#clients">Locaties</a>
  <a href="#contact">Fabrieken</a>
</div>
 <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>

            <div style = "margin:30px">

               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
            </div>
         </div>
      </div>
    </body>
</html>
