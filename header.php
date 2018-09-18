<?php

//connexion to the sql database
try {
  $bdd = new PDO('mysql:host=localhost;dbname=YesWeSell;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (\Exception $e) {
  die('Erreur : ' . $e->getMessage());
}
 ?>

<!doctype html>
<html class="no-js" lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <!-- changing title compared to the actual page -->
  <title>YesWeSell<?php echo $title; ?></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->
  <link rel="icon" type="image/png" sizes="16x16" href="favicon.ico">
  <link rel="icon" type="image/png" sizes="192x192"  href="icon.png">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
</head>

<body class="pt-4">

  <header>

    <!-- responsive navbar with bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.php"><h1><span class="colorTouch">Y</span>es <span class="colorTouch">W</span>e <span class="colorTouch">S</span>ell</h1></a>
      <button class="navbar-toggler ml-auto mb-3" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item ml-auto">
            <a class="menu mx-2" href="index.php">Accueil <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item ml-auto">
            <a class="menu mx-2" href="contact.php">Contact</a>
          </li>

          <?php
          //checking if we are connected to the admin session
          if(isset($_SESSION['username']) AND isset($_SESSION['password'])){
            ?>
            <!-- displaying disconnecting link -->
            <li class="nav-item ml-auto">
              <a class="menu mx-2" href="disconnection.php">Se déconnecter</a>
            </li>
            <?php
          }
          //else we display the connecting link
          else{
            ?>
            <li class="nav-item ml-auto dropdown">
              <a class="menu dropdown-toggle mx-2" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Se connecter
              </a>

              <!-- showing the form in order to log into the admin session -->
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <form class="p-2" method="post" action="admin.php">
                  <input type="text" class="form-control my-1" placeholder="Login" name="username">
                  <input type="text" class="form-control my-1" placeholder="Mot de Passe" name="motdepasse">
                  <input type="submit" name="connexionButton" value="Log In" class="btn w-100 my-1 colorButton">
                </form>
              </div>
            </li>
            <?php
          }
          ?>
<!-- <span id="cartItem">0</span> -->
          <!-- using a javascript function to increment the cart -->
          <!-- we should update this by using a cookie or a session global var -->
          <li class="nav-item ml-auto">
            <a class="disabled mx-2 font-italic" href="">Panier(<span id="cartItem">0</span>)</a>
          </li>
        </ul>
      </div>
    </nav>

  </header>
