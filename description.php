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
$title = " - " . $products[$_GET['index']]['name'];
include('header.php');

?>


  <nav aria-label="breadcrumb" class="breadMargin">
    <ol class="breadcrumb mt-5">
      <li class="breadcrumb-item mt-5"><a href="index.php">Accueil</a></li>
      <li class="breadcrumb-item active mt-5" aria-current="page"><?php echo $products[$_GET['index']]['name'] ?></li>
    </ol>
  </nav>

  <div class="container my-4 pb-3">

    <div class="row p-0">

      <div class="col-12 col-md-6 mt-2 basketImage">
        <img src="img/<?php echo $products[$_GET['index']]['picture'] ?>" alt="first picture of basket" class="img-fluid">
      </div>

      <div class="col-12 col-md-6 mt-2">
        <h2 class="font-weight-bold mt-3"><?php echo $products[$_GET['index']]['name'] ?></h2>
        <p class="description">Description</p>
        <p class="aboutDescription"><?php echo $products[$_GET['index']]['description'] ?></p>

        <div class="productColor d-flex mt-4">
          <div class="firstColor clickActive d-flex justify-content-center align-items-center activeTouch">
            Rouge
          </div>
          <div class="secondColor clickActive d-flex justify-content-center align-items-center">
            Blanc
          </div>
          <div class="thirdColor clickActive d-flex justify-content-center align-items-center">
            Noir
          </div>
        </div>

        <div class="shoeSizeList d-flex flex-wrap mt-3">
          <div class="shoeSize mb-3 font-weight-bold d-flex justify-content-center align-items-center">
            39
          </div>
          <div class="shoeSize mb-3 font-weight-bold d-flex justify-content-center align-items-center">
            40
          </div>
          <div class="shoeSize mb-3 font-weight-bold d-flex justify-content-center align-items-center">
            41
          </div>
          <div class="shoeSize mb-3 font-weight-bold d-flex justify-content-center align-items-center">
            42
          </div>
          <div class="shoeSize mb-3 font-weight-bold d-flex justify-content-center align-items-center">
            43
          </div>
          <div class="shoeSize mb-3 font-weight-bold d-flex justify-content-center align-items-center">
            44
          </div>
        </div>

        <p class="description mt-2"><?php echo $products[$_GET['index']]['price'] ?></p>
      </div>

    </div>

  </div>

<?php include('footer.php'); ?>
