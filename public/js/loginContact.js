$(document).ready(function(){
  $(".container .form-item.sign-up").hide();
 $("#btn2").click(function(){
    $(".container").addClass("log-in");
    $(".container").removeClass("sign-up");
    $(".container .form-item.sign-up").addClass("up");
    $(".container .form-item.sign-up").show();

  });
  $("#btn1").click(function(){
    $(".container").addClass("sign-up");
    $(".container").removeClass("log-in");
    $(".container .form-item.sign-up").removeClass("up");
    $(".container .form-item.sign-up").hide();    
  });
});
  $(".container-form #btn2").click(function(){
    $(".container .form-item.log-in").hide();
    $(".container .form-item.sign-up").show();

  });