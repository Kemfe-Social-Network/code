$( ".loadSignUp" ).click(function() {
  $("#login").hide("slow")
  $("#successRegPage").hide("slow")

  $("#forgot").hide("slow")
  $( "#register" ).show("slow");
});


$( ".loadSignIn" ).click(function() {
  $("#register").hide("slow")
  $("#successRegPage").hide("slow")
  $("#forgot").hide("slow")
  $( "#login" ).show("slow");
});

$( ".loadForgot" ).click(function() {
  $("#register").hide("slow")
  $("#successRegPage").hide("slow")

  $("#login").hide("slow")
  $( "#forgot" ).show("slow");
});
