<?php
    require("../model/connexion.php");
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Gestion de Stock-loginAdmin</title>
    <link rel="stylesheet" href="../public/css/styles.css" />
    <!-- Boxicons CDN Link -->
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body class="loginbody">
    
    <section class="login" id="login" >
      <div class="head">
      <h1 class="company">Welcome</h1><br>
      </div>
      <p class='msg'>-Login-</p><br>
      <div class="form">


        <form method="POST">
          
          <i class='bx bxs-user'></i>
          <input type="text" name="login" id="login" placeholder="login" required><br>

          <i class='bx bxs-lock'></i>
          <input type="password" name="password" id="password" placeholder="Password" required><br>

          <div class="alert">
            <?php include_once "../model/scriptlogin.php" ?>
            <?php if (isset($erreur)){echo $erreur;} ?><br>            
          </div>
            
          <button type="submit" name="submit" class="btn-login" id="do-login">Login</button>

        </form>
        
        
      </div>
    </section>

  </body>

</html>

