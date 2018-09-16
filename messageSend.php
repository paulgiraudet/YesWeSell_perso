<?php

if (isset($_POST['message']) AND !empty($_POST['message'])){
  $title = " - Message Sent !";
  include('header.php');
 ?>
 <div class="onepage d-flex justify-content-center align-items-center flex-column">
  <p class="validMessage">Votre message a bien été envoyé  <br/>
    Voici ce que vous avez écrit : <br/>
    <div class="messageUser">
    <?php
    echo nl2br($_POST['message']);
     ?>
   </div>
  </p>



<?php
}
else{
  $title = " - Retour";
  include('header.php');
?>
<div class="onepage d-flex justify-content-center align-items-center flex-column">
  <p>Cette page n'est pas faite pour cette occasion !</p>
<?php
}
?>
<a href="index.php"><button type="button" name="button" class="btn colorButton">Retour à l'accueil</button></a>
</div>

<?php include('footer.php');?>
