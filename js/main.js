
// main JQuery function
$(document).ready(function(){

  // hiding the validation message for the add in te cart
  $("#addValidation").hide();
  var clickActive = $(".clickActive");
  var numberCartItem = 0;

$(".clickActive").click(function(){

  //cleaning all active
  for (i = 0; i < clickActive.length; i++) {
    clickActive[i].className = clickActive[i].className.replace(" activeTouch", "");
  }

  //show actual shoe size selected
  this.className += " activeTouch";

});


$("#addCart").click(function(){
  // displaying a validation message
  $("#addValidation").show();
  // incrementation into the cart
  numberCartItem++;
  $("#cartItem").html(numberCartItem);
});

  // hiding validation message
$("#closeValidation").click(function(){
  $("#addValidation").hide();
});
});
