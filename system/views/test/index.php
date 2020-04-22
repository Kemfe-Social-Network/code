<?php require_once 'public/layouts/boilerplate.php'; ?>

<textarea id="showIt" class="form-control">

</textarea>

  <form id="outformSubmit">
    <input type="url" />
    <div class="col-md-4 mt-5" style="margin: 0 auto;">
      <div class="row" id="outform">

        <div>

      </div>
  </form>


<script>


$(document).ready(function () {
  var txt = '<div class="col-2 mt-2"><input type="number" class="form-control" name="lotto[]" /></div>';
  var btn = '<button type="submit" class=" mt-2 btn btn-block btn-info">Show Missing</button>';
  var holder = txt;
for (var i = 0; i < 34; i++) {

  holder += txt;
}
holder += btn;
$("#outform").html(holder);
});

 $('#outformSubmit').submit(function(event) {
  event.preventDefault();


  var values = $('#outformSubmit').serialize();
  $.ajax({
       url: "/api/show_missing",
       type: "POST",
       data: values,
       success: function (response) {
         console.log(response);
       var data = JSON.parse(response);
       $("#showIt").val(data.Ok);
         if(data.Ok){
         //  $("#postDispalay").html("");
         //  $("#ps-title-desc").html("");


              }else{
              }
          // you will get response from your php page (what you echo or print)

       },
       error: function(jqXHR, textStatus, errorThrown) {
          console.log(textStatus, errorThrown);
       }


   });
  return false;
});

</script>
