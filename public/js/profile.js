var no_data = '<div class="text-center bg-white" style="padding: 10px;">'+
'<img src="/public/images/blank.png" /> <p>Sorry we couldn\'t find any matches your <b>criteria,</b> please try searching with another term'+
'</div>';
function loadPost(type) {

  $.ajax({
      type: "GET",
      dataType: 'json',
      url: "/user/fetch_post/"+type,
      complete:function(data){
        console.log(data);
        try {
          if(data.responseJSON.length > 0){
            $("#gifLoader").remove();
          $.each(data.responseJSON, function(k, v) {

            if(v.uuid == "post"){
            if(v.post_type == "url"){
              var post_data_mongo = url_post_format(v);



              $("#post_wrapper_div").append(post_data_mongo);
            }else if(v.post_type == "youtube"){
                   var post_data_mongo  = youtube_post_format(v);
                     $("#post_wrapper_div").append(post_data_mongo);
            }else if(v.post_type == "image" && v.is_multi_image == 1){
               var post_data_mongo  = multi_image_post_format(v);
               $("#post_wrapper_div").append(post_data_mongo);

            }else if(v.post_type == "image" && v.is_multi_image == 0){
              var post_data_mongo  = multi_image_post_format(v);
              $("#post_wrapper_div").append(post_data_mongo);
            }else if(v.post_type == "text"){

              var post_data_mongo  = multi_gif_post_txt(v);
              $("#post_wrapper_div").append(post_data_mongo);
            }else if(v.post_type == "gif" && v.is_multi_image == 0){
              var post_data_mongo  = single_gif_post_format(v);
              $("#post_wrapper_div").append(post_data_mongo);
            }
          }else{
            var userImage = v.user_img;
            if(userImage == "user_default"){
              userImage = v.user_img+".png";
            }
            // comment post
          var   comments = "<div class='comment-row'>"+
            "<div class='media mb-2'>"+
              "<img width='32' height='32' class='rounded-circle mr3 topCommunity' src='/public/images/"+userImage+"' alt='Sport'>"+
                "<div class='media-body'>"+
                    "<p style='padding: 20px;' class='txt_comment mt-0 twelvepx'><span class='posted-by'><a href='#'>" + v.user_id + " </a>  </span><b>commented on a post in <a href='/g/" + v.name + "/'>" + v.name + "</a> community</b> <span class='posted-at''>" + v.date + "</span><br>" + v.comment + " <br><a style='' class='btn btn-outline-info btn-sm' href='/c/"+v.name+"/"+v.post_unique_id+"/"+v.post_url+"/'><i></i>View Post</a></p>"+
                    "<div class='btn_wrapper' id='btn_reply_" + v.user_id + "'>"+
                    "</div>"+
                "</div>"+
            "</div>"+
        "</div>";
            $("#post_wrapper_div").append(comments);
          }
          });
        }else {

          $("#post_wrapper_div").html(no_data);

          /// load data empty
        }
     }
     catch (err) {

       $("#post_wrapper_div").html(no_data);
   }



      }
  });
}
var itemText = '<div class="text-center" id="gifLoader"><div class="spinner-grow text-primary text-center" role="status">'+

'</div>'+
'<div class="spinner-grow text-secondary text-center" role="status">'+

'</div>'+
'<div class="spinner-grow text-warning text-center" role="status">'+

'</div></div>';
var getCom = $("#pod_id").val();

if(getCom != ""){
  loadPost(getCom+"_all_post");
}else{
  $("#post_wrapper_div").html(no_data);
}

$('select').on('change', function() {

  $("#post_wrapper_div").html(itemText)
  loadPost(this.value);
});
function filter(id) {


  $("#post_wrapper_div").html(itemText)
  loadPost(id);
  var current = $("#"+id).html();
  $("#dropdownMenuLink").html(current+" <i class=\"fa fa-caret-down\"></i>");
}
