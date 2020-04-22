

<style>

input:focus{
     outline: none;
 }
 textarea:focus{
      outline: none !important;
      box-shadow: none !important;
  }

 #communityModal  form{

     margin-left:auto;
     margin-right:auto;
     padding:50px;
     background:#fff;
     border-radius:5px;
     position:relative;

 }

 #communityModal  form > div {
     float:left;margin-bottom:30px;
 }
 #communityModal  form > div > p{
     font-size: 12px;margin-bottom: 3px;
 }
 #communityModal  form > div > input,  #communityModal  textarea{
     font-size:12px;letter-spacing:1px;padding:  5px;border: 0;background:  whitesmoke;border-bottom: 1px solid silver;width: 100%;color: gray;
 }

 #communityModal form > p:last-of-type{
     text-align: center;padding-top: 50px;display:  table;width: 100%;color:white;
 }

 #communityModal  form > p:last-of-type > a{
     cursor:pointer;border:0;
     padding: 10px 25px;
     background:  silver;
     border-radius:  28px;
     font-size: 12px;
 }

 #communityModal  .term{
     padding-top:40px;display: flex;width:  100%;align-items:  center;
 }

 #communityModal  .term > i{
     cursor:pointer;width:20px;
 }

 #communityModal  .term > span{
     font-size:12px;
 }

 /* delete */
 #communityModal form > a:last-of-type{
     position:absolute;
     bottom: 10px;
     right: 15px;
     font-size:  10px;
     letter-spacing:  1px;
     font-style: italic;
 }

</style>

<!-- Modal -->
<div class="modal fade" id="communityModal" tabindex="-1" role="dialog" aria-labelledby="communityModalLabel" aria-hidden="true">
    <div class="modal-center">
        <div class="modal-dialog .modal-align-center">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="communityModalLabel">Add Community</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>

                    </button>


                </div>
                <div class="modal-body">
                  <div style="display:flex;width:100%;">
    <form id="community_form">
      <div id="community_error_display"></div>
        <div style="width:100%;">
            <p>COMMUNITY NAME</p>
            <input name="name" autofocus  id="name_input_community">
        </div>
        <div style="width:100%;">
            <p class="text-uppercase">short description</p>
          <textarea class="form-control" name="desc" id="desc_input_community"></textarea>
        </div>

        <div style="">
          <div class="col-auto ">
          <div class="custom-control custom-radio mr-sm-2">
            <input type="radio" name="restrict" value="public" class="custom-control-input" id="public">
            <label class="custom-control-label" for="public"><i class="fas fa-user text-primary"></i> <b style="font-size: 14px;">Public</b><br><small>Anyone can view, post, and comment to this community</small>
</label>
          </div>
        </div>
        <div class="col-auto ">
        <div class="custom-control custom-radio mr-sm-2">
          <input type="radio" name="restrict" value="restricted" class="custom-control-input" id="restricted">
          <label class="custom-control-label" for="restricted"><i class="fas fa-eye text-success"></i> <b style="font-size: 14px;">Restricted</b><br><small>Anyone can view this community, but only approved users can post
      </small>
      </label>
        </div>
      </div>
        <div class="col-auto ">
        <div class="custom-control custom-radio mr-sm-2">
          <input type="radio" name="restrict" value="private" class="custom-control-input" id="private">
          <label class="custom-control-label" for="private"><i class="fas fa-lock text-warning"></i> <b style="font-size: 14px;">Private</b><br><small>Only approved users can view and submit to this community
</small>
</label>
        </div>
      </div>



      <button type="submit" id="community_form_btn" class="btn btn-primary btn-block mt-2" ><i class="fas fa-users"></i> Create Community</button>
        </div>




    </form>
</div>
                </div>

            </div>
        </div>
    </div>
</div>
<script>

$(document).ready(function(){

  $('#community_form').submit(function(event) {
    event.preventDefault();

    disabledBtn("Creating...", "community_form_btn");
    var values = $('#community_form').serialize();


    $.ajax({
         url: "api/user_create_community",
         type: "POST",
         data: values,
         success: function (response) {
           console.log(response);
           enableBtn("<i class=\"fas fa-users\"></i> Create Community", "community_form_btn");

           //console.log(response);
         var data = JSON.parse(response);

           if(data.Ok){
             var msg  = msgAlert("success", "Added successful");
             $("#community_error_display").html(msg);
             toastMessage("Success", "Added successful", 'success', "slide");
             $('#desc_input_community').val("");
             $('#name_input_community').val("");

           }else{
             console.log(data.error);
             toastMessage("Error", data.error.msg, 'error', "slide");
             var msg  = msgAlert("danger", data.error.msg);
             $("#community_error_display").html(msg);
           }
            // you will get response from your php page (what you echo or print)

         },
         error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
            enableBtn("<i class=\"fas fa-users\"></i> Create Community", "community_form_btn");

         }


     });
    return false;
  });


});

</script>
