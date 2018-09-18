<?php
//starting session at the start of each page
session_start();

//connexion to the sql database
try {
  $bdd = new PDO('mysql:host=localhost;dbname=YesWeSell;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (\Exception $e) {
  die('Erreur : ' . $e->getMessage());
}

//getting all our product's informations
$req = $bdd->query('SELECT sd.id AS id, sd.name AS name, sd.description AS description, sd.price AS price, si.name AS picture FROM shoes_description AS sd INNER JOIN shoes_image AS si ON si.id_shoes = sd.id');
$products = $req->fetchAll();

//getting all the shoe sizes
$req2 = $bdd->query('SELECT ss.size AS size, ss.id_shoes AS id_shoes FROM shoes_description AS sd INNER JOIN shoes_size AS ss ON ss.id_shoes = sd.id');
$sizes = $req2->fetchAll();


//showing the correct name product with the index
$title = " - " . $products[$_GET['index']]['name'];
include('header.php');

?>

<!-- breadcrumb to show to the user where he is on the website -->
  <nav aria-label="breadcrumb" class="breadMargin">
    <ol class="breadcrumb mt-5">
      <li class="breadcrumb-item mt-5"><a href="index.php">Accueil</a></li>
      <!-- showing the correct name product with the index -->
      <li class="breadcrumb-item active mt-5" aria-current="page"><?php echo $products[$_GET['index']]['name'] ?></li>
    </ol>
  </nav>

<!-- used with a javascript function for ux experience when he adds a product to his cart -->
  <div id="addValidation" class="bg-success">
    <div class="d-flex">
      <p class="py-2 mx-auto pl-5 mt-2 font-italic">Votre article a bien été ajouté au panier !</p>
      <!-- hide this message -->
      <i class="fas fa-times-circle my-auto mr-3" id="closeValidation"></i>
    </div>
  </div>

  <div class="container my-4 pb-3">

  <!-- basicly we are just getting the correct information with the index key  -->
    <div class="row p-0">
      <div class="col-12 col-md-6 mt-2 basketImage">
        <img src="<?php echo $products[$_GET['index']]['picture'] ?>" alt="first picture of basket" class="img-fluid">
      </div>

      <div class="col-12 col-md-6 mt-2">
        <h2 class="font-weight-bold mt-3"><?php echo $products[$_GET['index']]['name'] ?></h2>
        <p class="description">Description</p>
        <p class="aboutDescription"><?php echo $products[$_GET['index']]['description'] ?></p>

<!-- wanted to add differents colors with differents images for each products -->
<!-- probably useless part at the moment -->
        <div class="productColor d-flex mt-4">
          <div class="firstColor d-flex justify-content-center align-items-center">
            Rouge
          </div>
          <div class="secondColor d-flex justify-content-center align-items-center">
            Blanc
          </div>
          <div class="thirdColor d-flex justify-content-center align-items-center">
            Noir
          </div>
        </div>


        <div class="shoeSizeList d-flex flex-wrap mt-3">

        <?php
        // as all our sizes are in an array we use a foreach for display them
        foreach($sizes as $size){
          // but we keep only these which have the correct corresponding id with our product
          if($size['id_shoes'] == $products[$_GET['index']]['id']){

        ?>

          <!-- and we display them  -->
          <div class="shoeSize clickActive mb-3 font-weight-bold d-flex justify-content-center align-items-center">

            <?php echo $size['size']; ?>

          </div>

        <?php
          }
        }

        ?>

        </div>

        <div class="d-flex justify-content-between">
          <!-- just showing price to the user -->
          <p class="description mt-2">€ <?php echo $products[$_GET['index']]['price'] ?>,00</p>
          <!-- little button used for cart incrementation, using a jquery function but maybe should use cookie or session global var for incrementation -->
          <button type="submit" class="btn colorButton" id="addCart">Ajouter au panier</button>
        </div>
      </div>

    </div>

  </div>

<?php include('footer.php'); ?>
