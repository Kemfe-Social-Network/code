<form id="refinned">
<input type="hidden" id="url_type" name="url_type"   value="text" />

</form>

<?php
if($loggedIn == true){
  if ($data_user_data['user_img'] == "user_default") {
    $img_url_for_user = $data_user_data['user_img'].".png";
  }else{
      $img_url_for_user = "user-images/".$data_user_data['user_img'];
  }

 ?>
<input type="file"  multiple accept="image/x-png,image/jpeg"  class="form-control" name="files[]" id="image_upload"  style="display: none;">
<button style="display: none;" data-toggle="modal" data-target="#pstCustomModal" id="actiavtePstCustomModal"></button>

<div class="media bg-white mb-2" style="padding:10px;">
<img class="rounded-circle mr-3 img-fluid" style="height: 25px;" src="/public/images/<?php echo $img_url_for_user;?>" alt="<?php echo $data_user_data['user_id'];?>">
<div class="media-body">

  <div id="fb_comment_style">

    <div class="row" >
      <div class="col-md-9">
        <input type="text" onclick="loadPstView('text')"  name="text" class="textBoxClass" id="commentBox"  placeholder="What's happening?" readonly>

        </div>
      <div class="col-md-3">
        <button onclick="loadPstView('photo')"  class="btn-add-post-type" type="button"><i class="fas fa-camera"></i></button>
        <!-- <button onclick="loadPstView('poll')" class="btn-add-post-type " type="button">	<i class="fas fa-poll-h"></i></button> -->
        <button onclick="loadPstView('link')" class="btn-add-post-type " type="button">	<i class="fas fa-link"></i></button>
        <button onclick="loadPstView('text')" class="btn-add-post-type " type="button">	<i class="fas fa-font"></i></button>
      </div>
    </div>

  </div>
</div>
</div>



<!-- Modal -->
<div class="modal fade" id="pstCustomModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background: transparent; border: none;">

      <div class="modal-body" id="pstCustomModalDiv" style="background: white; padding-bottom: 0;">
        <div class="mderrorDisplay"></div>
        <div class="col-md-8" style="padding-left: 10px !important">
          <select name="community" class="form-control mt-2 mb-2" id="fetch_community_joined_option" >
            <option value="0" selected><i class="fas fa-users"></i> Choose Community</option>

          </select>
        </div>

        <div id="dynamicForms">

        </div>
      </div>
      <div class="modal-footer bg-white">
        <button type="button" id="dismisePstCustomModal" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button id="dynamicBtnSubmitForm" type="button" class="btn btn-primary btn-sm"><i class="fas fa-plus-circle"></i>  Post</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="pstCustomModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background: transparent; border: none;">

      <div class="modal-body" id="pstCustom2ModalDiv" style="background: white; padding-bottom: 0;">

        <div class="col-md-8" style="padding-left: 10px !important">
          <select name="community" class="form-control mt-2 mb-2" id="fetch_community_joined_option2" >
            <option value="0" selected><i class="fas fa-users"></i> Choose Community</option>

          </select>
        </div>

        <div id="dynamicForms2">
          <div class="rawdevRichEditor">
            <div class="topFormwysiwyg">
              <input placeholder="Title" class="form-control" id="dynamicTitleNew" />

            </div>
            <div class="rawdevRibbon">

           
              <!-- <select class="fontsizeChanger" name="">

                <script>
                  for (var i = 1; i < 11; i++) {
                    document.write("<option value='"+i+"'>"+i+"</option>")
                  }
                </script>
              </select> -->
            </div>
         

        
            <div class="rawdevTextArea">
             
              <textarea id="rawdewIframe" class="rawdewIframe" name="rawdewIframe"></textarea>

            </div>
          </div>
        </div>
        <div class="mderrorDisplay col-md-12"></div>
      </div>

      <div class="modal-footer bg-white">

        <button type="button" id="dismisePstCustom2Modal" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        <button id="dynamicBtnSubmitForm2" type="button" class="btn btn-primary btn-sm"><i class="fas fa-plus-circle"></i>  Post</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>