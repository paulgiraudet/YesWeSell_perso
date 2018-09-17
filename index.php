<?php
$index="";
$title=" - Accueil";
include('header.php');
?>
  <nav aria-label="breadcrumb" class="breadMargin">
    <ol class="breadcrumb mt-5">
      <li class="breadcrumb-item active mt-5" aria-current="page">Accueil</li>
    </ol>
  </nav>

  <div class="container-fluid productsList">
    <div class="row p-3">

      <?php


        $req = $bdd->query('SELECT sd.name AS name, sd.description AS description, sd.price AS price, si.name AS picture FROM shoes_description AS sd INNER JOIN shoes_image AS si ON si.id_shoes = sd.id');
        $products = $req->fetchAll();


      foreach($products as $key => $product){
          ?>

            <a href="description.php?index=<?php echo $key; ?>" class="col-md-3 col-sm-6 product p-0 mb-3 mb-md-0">
              <img src= "<?php echo $product['picture'] ?>" alt="first product" class="img-fluid">
              <p class="productName font-weight-bold mt-2 mx-2"> <?php echo $product['name'] ?> <br/>
              <span class="aboutDescription">€ <?php echo $product['price'] ?>,00</span></p>
            </a>

        <?php
      };
      ?>

    </div>

  </div>

<?php include('footer.php'); ?>
