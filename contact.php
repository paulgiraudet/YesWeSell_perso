<?php
$title=" - Contact";
include('header.php');
?>

<div class="container-fluid my-5 py-5" action="displaymessage.php" method="post">
  <div class="row p-3 mt-5 mb-4">

    <form class="col-md-6 mx-auto">
      <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="nom@exemple.com">
        <small id="emailHelp" class="form-text text-muted">Nous ne partagerons jamais votre email à qui que ce soit.</small>
      </div>
      <div class="form-group">
    <label for="exampleFormControlTextarea1">Message</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
      <button type="submit" class="btn colorSendButton">Envoyer</button>
    </form>

  </div>

</div>

<?php include('footer.php'); ?>
