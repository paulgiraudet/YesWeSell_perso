<?php

if ((isset($_POST['username']) AND htmlspecialchars($_POST['username']) == "admin") AND (isset($_POST['motdepasse']) AND htmlspecialchars($_POST['motdepasse']) == 'admin')) {
  $title = " - Administration page";
  include('header.php');

  ?>

  <div class="onepage py-5 container-fluid">
    <div class="row mt-3">
      <div class="col-8 mx-auto">

      <h2 class="mt-5 text-center">Ajout d'un produit :</h2>
      <form class="mt-5 d-flex flex-column form-group" action="verif.php" method="post" enctype="multipart/form-data">
        <label for="name">Nom du produit</label>
        <input type="text" name="name" id="name" class="mb-3 form-control" required>
        <label for="description">Description</label>
        <textarea name="description" rows="8" cols="40" id="description" class="mb-3 form-control" required></textarea>
        <label for="price">Prix (en euro) :</label>
        <input type="number" name="price" id="price" class="mb-3 form-control" step="0.10" required>
        <label>Pointure(s) :</label>
        <div class="shoeSizeList mb-3">
          <input type="checkbox" name="shoe_size[]" value="38" id="shoe_size1"><label for="shoe_size1" class="mr-2">38</label>
          <input type="checkbox" name="shoe_size[]" value="39" id="shoe_size2"><label for="shoe_size2" class="mr-2">39</label>
          <input type="checkbox" name="shoe_size[]" value="40" id="shoe_size3"><label for="shoe_size3" class="mr-2">40</label>
          <input type="checkbox" name="shoe_size[]" value="41" id="shoe_size4"><label for="shoe_size4" class="mr-2">41</label>
          <input type="checkbox" name="shoe_size[]" value="42" id="shoe_size5"><label for="shoe_size5" class="mr-2">42</label>
          <input type="checkbox" name="shoe_size[]" value="43" id="shoe_size6"><label for="shoe_size6" class="mr-2">43</label>
          <input type="checkbox" name="shoe_size[]" value="44" id="shoe_size7"><label for="shoe_size7" class="mr-2">44</label>
        </div>
        <label for="file">Image (1mo max) :</label>
        <input type="file" name="monfichier" id="file" class="mb-3 form-control"/>

        <input type="submit" value="Valider" class="w-25 btn colorButton mt-3"/>
      </form>
    </div>
    </div>
  </div>
<?php

include('footer.php');
}
else{
  ?>
    <p>Cet espace est réservé à l'administration</p>
    <a href="index.php">Retour à l'accueil</a>

<?php

}

?>
