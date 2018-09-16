
// main JQuery function
$(document).ready(function(){

  var clickActive = $(".clickActive");
  $("#addValidation").hide();
  var numberCartItem = 0;
$(".clickActive").click(function(){

  //cleaning all active
  for (i = 0; i < clickActive.length; i++) {
    clickActive[i].className = clickActive[i].className.replace(" activeTouch", "");
  }

  //show actual slide
  this.className += " activeTouch";

});

$("#addCart").click(function(){
  $("#addValidation").show();
  numberCartItem++;
  $("#cartItem").html(numberCartItem);
});

$("#closeValidation").click(function(){
  $("#addValidation").hide();
});
});
