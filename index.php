<?php
//starting session at the start of each page
session_start();

$index = "";
$title = " - Accueil";
include('header.php');

?>

  <!-- breadcrumb to show to the user where he is on the website -->
  <nav aria-label="breadcrumb" class="breadMargin">
    <ol class="breadcrumb mt-5">
      <li class="breadcrumb-item active mt-5" aria-current="page">Accueil</li>
    </ol>
  </nav>

  <div class="container-fluid productsList">
    <div class="row p-3">

      <?php

        // join select to get all the differents element from our first table plus the image from the second table
        $req = $bdd->query('SELECT sd.name AS name, sd.description AS description, sd.price AS price, si.name AS picture FROM shoes_description AS sd INNER JOIN shoes_image AS si ON si.id_shoes = sd.id');
        // getting the temporary result in a table products[]
        $products = $req->fetchAll();

      // we display all the differents elements from our database
      foreach($products as $key => $product){
          ?>
            <!-- the link permit us to get the corresponding index in order to display the correct product in the description page -->
            <a href="description.php?index=<?php echo $key; ?>" class="col-md-3 col-sm-6 product p-0 mb-3 mb-md-0">
              <!-- displaying the corresponding image -->
              <img src= "<?php echo $product['picture'] ?>" alt="first product" class="img-fluid">

              <!-- displaying name and price  -->
              <p class="productName font-weight-bold mt-2 mx-2"> <?php echo $product['name'] ?> <br/>
              <span class="aboutDescription">€ <?php echo $product['price'] ?>,00</span></p>
            </a>

        <?php
      };
      ?>

    </div>

  </div>

<?php include('footer.php'); ?>
