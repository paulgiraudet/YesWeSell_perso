<?php

session_start();
try {
  $bdd = new PDO('mysql:host=localhost;dbname=YesWeSell;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (\Exception $e) {
  die('Erreur : ' . $e->getMessage());
}


//we check if there is no errors with the required fields
if (empty($_POST['name']) OR empty($_POST['description']) OR empty($_POST['price'])){

  echo "error";

}

//starting verifications
else if (isset($_POST['name']) AND isset($_POST['description']) AND isset($_POST['price'])) {

  //puting all the shoes sizes in an array
  $shoeSizeArray = $_POST['shoe_size'];

  //if the array is empty we stop the verifications
  if(empty($shoeSizeArray)){

    echo("Quelle(s) pointure(s) est/sont disponible(s) ?");

  }

  // one step further
  else{

    //checking image validity
    if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0){

      //max size at 1 Mo
      if ($_FILES['monfichier']['size'] <= 1000000){

        //getting the file extension
        $infosfichier = pathinfo($_FILES['monfichier']['name']);
        $extension_upload = $infosfichier['extension'];
        //authorized extensions
        $extensions_autorisees = array('png', 'jpeg', 'jpg');

        //we compare our file extension with the differents authorized extensions
        //we are getting here only if all the differents tests are ok
        if (in_array($extension_upload, $extensions_autorisees)){

          // getting the image name
          $nameImage = $infosfichier['filename'];
          //using time() function in order to give our file an unique name with the timestamp
          $file = '' .time(). '' . $nameImage . '.' . $extension_upload;

          //moving the image in the good folder with its new name
          move_uploaded_file($_FILES['monfichier']['tmp_name'], 'img/' . $file);


          //first request to add the main information about our product in the first table shoes_description
          $productReq = $bdd->prepare('INSERT INTO shoes_description(name, description, price) VALUES(:name, :description, :price)');
          $productReq->execute(array(
            'name' => $name = $_POST['name'],
            'description' => $description = $_POST['description'],
            'price' => $price = $_POST['price'],
          ));

          $productReq->closeCursor();

          //saving the last id added in order to link this special id to the image and the shoe sizes
          $id_shoes = $bdd->lastInsertId();


          //second request to add the image linked to the good product
          $imageReq = $bdd->prepare('INSERT INTO shoes_image(name, id_shoes) VALUES(:name_image, :idshoes)');
          $imageReq->execute(array(
            'name_image' => $name_image = 'img/' . $file,
            //putting the product id
            'idshoes' => $id_shoes
          ));

          $imageReq->closeCursor();


          //last request to add our shoe sizes linked to the good product

          //using foreach to add every single shoe size checked to our special table
          foreach ($shoeSizeArray as $sizes) {

            $sizeReq = $bdd->prepare('INSERT INTO shoes_size(size, id_shoes) VALUES(:size, :idshoes)');
            $sizeReq->execute(array(
              'size'=> $sizes,
              //keeping the same id from our product for every shoe size
              'idshoes' => $id_shoes
            ));

            $sizeReq->closeCursor();
            header('location: admin.php');
            exit;
          }
        }

//severals errors defined by the step where we didn't pass the test

        else{
          echo "Mauvaise extension de fichier; les extensions autorisées sont png, jpg et jpeg.";
        }
      }

      else{
        echo "Taille de l'image trop grande.";
      }
    }

    else{
      echo "Image manquante";
    }
  }

}

else{

  echo "Formulaire incorrect";

}


?>

<a href="index.php"><button type="button" name="button" class="btn colorButton">Retour à l'accueil</button></a>
