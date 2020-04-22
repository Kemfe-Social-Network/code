
function changeEmail() {
  var password         =    $("#password").val().trim();
  var email            =    $("#email").val().trim();
  var hidden_key   =    $("#hidden_key").val().trim();


  disabledBtn("", "changeEmail");
  var value = "password="+password+"";
      value += "&email="+email+"";
      value += "&hidden_key="+hidden_key+"";
  $.ajax({
       url: "/settings/change_email",
       type: "POST",
       data: value,
       success: function (response) {
       console.log(response);
       var data = JSON.parse(response);
       enableBtn("<i class=\"fas fa-arrow-right\"></i> Save Email", "changeEmail");

         if(data.Ok){

           toastMessage("Success", data.msg, 'success', "slide");
            location.reload(true);
         }else{

           toastMessage("Error", data.error.msg, 'error', "slide");
         }
          // you will get response from your php page (what you echo or print)

       },
       error: function(jqXHR, textStatus, errorThrown) {

       }


   });
}

function changePassword() {
  var new_password                =    $("#new_password").val().trim();
  var current_password            =    $("#current_password").val().trim();
  var confirm_new_password        =    $("#confirm_new_password").val().trim();


  disabledBtn("", "changePassword");
  var value = "current_password="+current_password+"";
      value += "&new_password="+new_password+"";
      value += "&confirm_new_password="+confirm_new_password+"";
  $.ajax({
       url: "/settings/change_password",
       type: "POST",
       data: value,
       success: function (response) {
       console.log(response);
       var data = JSON.parse(response);
       enableBtn("<i class=\"fas fa-arrow-right\"></i> Save", "changePassword");

         if(data.Ok){
           toastMessage("Success", data.msg, 'success', "slide");
            location.reload(true);
         }else{

           toastMessage("Error", data.error.msg, 'error', "slide");
         }
          // you will get response from your php page (what you echo or print)

       },
       error: function(jqXHR, textStatus, errorThrown) {

       }


   });
}

function change_display_name() {
  var display_name                =    $("#display_name").val().trim();



  disabledBtn("", "change_display_name");
  var value = "display_name="+display_name+"";
  $.ajax({
       url: "/settings/change_display_name",
       type: "POST",
       data: value,
       success: function (response) {
       console.log(response);
       var data = JSON.parse(response);
       enableBtn("<i class=\"fas fa-save\"></i> Save", "change_display_name");

         if(data.Ok){
           toastMessage("Success", data.msg, 'success', "slide");
            location.reload(true);
         }else{

           toastMessage("Error", data.error.msg, 'error', "slide");
         }
          // you will get response from your php page (what you echo or print)

       },
       error: function(jqXHR, textStatus, errorThrown) {

       }


   });
}


function update_about_me() {

var about_me = $("#about_me").val().trim();
  disabledBtn("", "about_me_button");
  var value = "about_me="+about_me+"";
  $.ajax({
       url: "/settings/update_about_me",
       type: "POST",
       data: value,
       success: function (response) {

       var data = JSON.parse(response);
       enableBtn("<i class=\"fas fa-save\"></i> Save", "about_me_button");

         if(data.Ok){
           toastMessage("Success", data.msg, 'success', "slide");

         }else{

           toastMessage("Error", data.error.msg, 'error', "slide");
         }
          // you will get response from your php page (what you echo or print)

       },
       error: function(jqXHR, textStatus, errorThrown) {

       }


   });
}


function handleFileSelect(evt) {
  var files = evt.target.files; // FileList object

  // Loop through the FileList and render image files as thumbnails.
  $(".image_upload_wrapper").remove();
  $(".input_images_hidden").remove();

  for (var i = 0, f; f = files[i]; i++) {

    // Only process image files.
    if (!f.type.match('image.*')) {
      continue;
    }


    var reader = new FileReader();

    // Closure to capture the file information.
    reader.onload = (function(theFile) {
      return function(e) {


        // Render thumbnail.
        // var span = document.createElement('span');
        // span.innerHTML = ['<img class="thumb" src="', e.target.result,
        //                   '" title="', escape(theFile.name), '"/>'].join('');
        // document.getElementById('list').insertBefore(span, null);
        var img = '<div class="image_upload_wrapper" id=""><img src="'+e.target.result+'" style="max-width: 350px;"  class="img-fluid" style=""> '+
        '<button type="button" id="" onclick="pscloseImgBtn()" class="btn btn-danger"> <i class="fas fa-times-circle"></i> </button>'+
        ' <button type="submit" id="save_image"  class="btn btn-success"> <i class="fas fa-save"></i> Save</button>'+
        '</div>'; //Equivalent: $(document.createElement('img'))
        var input_data = '<input type="hidden" class="input_image_value"  name="input_image_value"  id="input_image_value" value="'+e.target.result+'" />';


        $('#refinned').append(img);
      $("#refinned").prepend(input_data);


      //  $( "#ps-title-desc" ).css( "border-bottom", "none" );
        //$( "#ps-title-desc" ).css( "border-radius", "4px 4px 0 0" );
      };
    })(f);

    // Read in the image file as a data URL.
    reader.readAsDataURL(f);
  }

}

 document.getElementById('image_upload').addEventListener('change', handleFileSelect, false);

 function select_image(id) {
   //alert(id);
    $(".type").remove();
   $("#image_upload").trigger("click");
   var input_data = '<input type="hidden" class="type"  name="type"  id="type" value="'+id+'" />';


   $('#refinned').append(input_data);
 }

 function pscloseImgBtn() {
   $(".image_upload_wrapper").remove();
   $(".input_images_hidden").remove();
   $(".type").remove();
 }

 $('#refinned').submit(function(event) {
   event.preventDefault();
   disabledBtn("", "save_image");
   $.ajax({
        url: "/settings/update_image",
        type: "POST",
        data: $("#refinned").serialize(),
        success: function (response) {
          console.log(response);
        var data = JSON.parse(response);
        enableBtn("<i class=\"fas fa-save\"></i> Save", "save_image");

          if(data.Ok){
            toastMessage("Success", data.msg, 'success', "slide");

          }else{

            toastMessage("Error", data.error.msg, 'error', "slide");
          }
           // you will get response from your php page (what you echo or print)

        },
        error: function(jqXHR, textStatus, errorThrown) {

        }


    });
  });

$("#nav-notifications-tab").on("click", function(e){
  // load setting
});
function switch_btn(id){
  var real_id = id;

  disabledBtn("", id);
  var type = id
  var status = $("#"+real_id).val();
  var value = "type="+type;
   value += "&status="+status;

  $.ajax({
       url: "/settings/update_notification",
       type: "POST",
       data: value,
       success: function (response) {
         console.log(response);
       var data = JSON.parse(response);


         if(data.Ok){
           toastMessage("Success", data.msg, 'success', "slide");

         }else{

           toastMessage("Error", data.error.msg, 'error', "slide");
         }
          // you will get response from your php page (what you echo or print)

       },
       error: function(jqXHR, textStatus, errorThrown) {

       }


   });

}

function block_user(){


  disabledBtn("", "block_user_btn");

  var user_to_block = $("#user_to_block").val();
  var value = "username="+user_to_block;


  $.ajax({
       url: "/settings/block_user",
       type: "POST",
       data: value,
       success: function (response) {
         console.log(response);
       var data = JSON.parse(response);
         enableBtn("<i class=\"fas fa-save\"></i> Save", "block_user_btn");

         if(data.Ok){
           $("#user_to_block").val("");
           fetch_blocked_users();
           toastMessage("Success", data.msg, 'success', "slide");

         }else{

           toastMessage("Error", data.error.msg, 'error', "slide");
         }
          // you will get response from your php page (what you echo or print)

       },
       error: function(jqXHR, textStatus, errorThrown) {
 enableBtn("<i class=\"fas fa-save\"></i> Save", "block_user_btn");
       }


   });

}



function fetch_notifications() {

  $.ajax({
      type: "GET",
      dataType: 'json',
      url: "/settings/fetch_notifications",
      complete:function(data){
        console.log(data);
        $.each(data.responseJSON.data, function(k, v) {
          if(v.status == 0){

            $("#"+v.type).val("off");
            $("#"+v.type).prop('checked', false);
          }else{
            $("#"+v.type).val("on");
              $("#"+v.type).prop('checked', true);
          }
        });



      }
  });
}

function fetch_blocked_users() {

  $.ajax({
      type: "GET",
      dataType: 'json',
      url: "/settings/fetch_blocked_users",
      complete:function(data){

        var data_returned = "";
        $.each(data.responseJSON.data, function(k, v) {
          data_returned += '<div class="chip">'+v.user_id+' <i class="fas fa-times" id="'+v.user_id+'" onclick="unblock_user(this.id)"></i></div>';
        });

        $("#div_for_blocked_user").html(data_returned);

      }
  });
}
function unblock_user(id){


  var value = "username="+id;


  $.ajax({
       url: "/settings/unblock_user",
       type: "POST",
       data: value,
       success: function (response) {
         console.log(response);
       var data = JSON.parse(response);
         enableBtn("<i class=\"fas fa-time\"></i> ", id);

         if(data.Ok){
fetch_blocked_users();
           toastMessage("Success", data.msg, 'success', "slide");

         }else{

           toastMessage("Error", data.error.msg, 'error', "slide");
         }
          // you will get response from your php page (what you echo or print)

       },
       error: function(jqXHR, textStatus, errorThrown) {
      enableBtn("<i class=\"fas fa-time\"></i> ", id);
       }


   });
}
fetch_blocked_users();
fetch_notifications();
