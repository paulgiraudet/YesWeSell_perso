<?php

try {
  $bdd = new PDO('mysql:host=localhost;dbname=YesWeSell;charset=utf8', 'root', 'Atbocslat1', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (\Exception $e) {
  die('Erreur : ' . $e->getMessage());
}


//on vérifie s'il n'y a pas d'erreur avec les champs requis
if (empty($_POST['name']) OR empty($_POST['description']) OR empty($_POST['price'])){

  echo "error";

}

//si tout est bien définie on peut commencer les vérifications
else if (isset($_POST['name']) AND isset($_POST['description']) AND isset($_POST['price'])) {

  //on met toutes les pointures dans un tableau
  $shoeSizeArray = $_POST['shoe_size'];

  //si le tableau est vide (pas de pointure) on empêche tout l'ajout
  if(empty($shoeSizeArray)){

    echo("Quelle(s) pointure(s) est/sont disponible(s) ?");

  }


  else{

    //on vérifie la présence et la validité de l'image
    if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0){

      //avec une taille maximum de 1 Mo
      if ($_FILES['monfichier']['size'] <= 1000000){

        //on récupère l'extension de l'image envoyée
        $infosfichier = pathinfo($_FILES['monfichier']['name']);
        $extension_upload = $infosfichier['extension'];
        //extensions autorisées
        $extensions_autorisees = array('png', 'jpeg', 'jpg');

        //on vient comparer l'extension de notre image avec les extensions d'image autorisées
        //finalement on rentre dans cette condition que si tous les tests sont passés
        if (in_array($extension_upload, $extensions_autorisees)){

          //on renome notre image de façon unique avec la fonction time() qui nous renvoie le timestamp actuel
          $nameImage = $infosfichier['filename'];
          $file = '' .time(). '' . $nameImage . '.' . $extension_upload;

          //on déplace notre image dans le bon dossier avec son nouveau nom
          move_uploaded_file($_FILES['monfichier']['tmp_name'], 'img/' . $file);


          //première requête pour ajouter nos informations principales à notre table produit
          $productReq = $bdd->prepare('INSERT INTO shoes_description(name, description, price) VALUES(:name, :description, :price)');
          $productReq->execute(array(
            'name' => $name = $_POST['name'],
            'description' => $description = $_POST['description'],
            'price' => $price = $_POST['price'],
          ));

          $productReq->closeCursor();

          //on récupère le dernier ID ajouté dans une table pour pouvoir l'attribuer à nos images et pointures
          $id_shoes = $bdd->lastInsertId();


          //deuxième requête pour ajouter notre image liée à notre fiche produit
          $imageReq = $bdd->prepare('INSERT INTO shoes_image(name, id_shoes) VALUES(:name_image, :idshoes)');
          $imageReq->execute(array(
            'name_image' => $name_image = 'img/' . $file,
            //on insère l'id de notre produit pour le lier à l'image
            'idshoes' => $id_shoes
          ));

          $imageReq->closeCursor();


          //troisième requête pour ajouter nos pointures liées à notre fiche produit

          //ici on ajoute les pointures une à une dans notre table shoes_size
          foreach ($shoeSizeArray as $sizes) {

            $sizeReq = $bdd->prepare('INSERT INTO shoes_size(size, id_shoes) VALUES(:size, :idshoes)');
            $sizeReq->execute(array(
              'size'=> $sizes,
              //on insère l'id de notre produit pour le lier à chaque pointure cochée dans le formulaire
              'idshoes' => $id_shoes
            ));

            $sizeReq->closeCursor();
          }
        }

//différentes erreurs renvoyées selon l'avancée dans les tests de conditions

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
