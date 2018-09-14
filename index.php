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

      $products = [
        [
          'name' => 'Chaussures Checkerboard Classic',
          'description' => "Chaussures basses sans lacets, les Classic Slip-On sont dotées de finitions élastiques sur les côtés et d'un col rembourré pour plus de confort.",
          'price' => '€ 65,00',
          'picture' => 'basket1_blanc.png'
        ],
        [
          'name' => 'Chaussures en daim Authentic',
          'description' => "Chaussures basses à lacets, les Authentic en daim de Vans arborent des coutures classiques et l'étiquette de la marque. Elles reposent sur une semelle extérieure gaufrée pour une adhérence accrue.",
          'price' => '€ 80,00',
          'picture' => 'basket2_bleu.png'
        ],
        [
          'name' => 'Chaussures Sk8-Hi MTE',
          'description' => "Sa semelle vulcanisée crantée offre une adhérence optimale tandis que son bout renforcé résiste à l'usure. Un col rembourré vient aussi offrir davantage de confort.",
          'price' => '€ 110,00',
          'picture' => 'basket3_beige.png'
        ],
        [
          'name' => 'Chaussures AVE Rapidweld Pro Lite',
          'description' => "Équipée d'une doublure intérieure Luxliner™ associée à sa construction Pro Vulc Lite, l'AV Rapidweld Pro allie légèreté, sensibilité et durabilité.",
          'price' => '€ 110,00',
          'picture' => 'basket4_blanc.png'
        ]
      ];
      foreach($products as $key => $product){
          ?>

            <a href="description.php?index=<?php echo $key; ?>" class="col-md-3 col-sm-6 product p-0 mb-3 mb-md-0">
              <img src= "img/<?php echo $product['picture'] ?>" alt="first product" class="img-fluid">
              <p class="productName font-weight-bold mt-2 mx-2"> <?php echo $product['name'] ?> <br/>
              <span class="aboutDescription"><?php echo $product['price'] ?></span></p>
            </a>

        <?php
      };
      ?>

    </div>

  </div>

<?php include('footer.php'); ?>
