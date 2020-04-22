<div class=" mb-2 text-center customBorder" style="border-color:#d4ecfb;">

  <button class="custom-btn btn" onclick="loadPstView('text')">
   <i class="fas fa-file-word"></i>
   Text
 </button>
 <button class="custom-btn text-danger btn" onclick="loadPstView('photo')">
   <i class="fas fa-camera"></i>
   Photo
 </button>
 <button class="custom-btn text-warning btn" onclick="loadPstView('poll')">

   Poll
 </button>

 <button class="custom-btn text-success btn" onclick="loadPstView('link')">
   <i class="fas fa-link"></i>
   Link
 </button>


</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  <button type="button" class="btn btn-primary">Save changes</button>
</div>

<div class="modal-header">
  <h5 class="modal-title" id="pstCustomModalLabel">Modal title</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">×</span>
  </button>
</div>

<div class="postDiv"     style="background-color: #d4ecfb; padding: 10px;">
  <div class="media">
<img avatar="<?php echo $data_user_data['user_id'];?>" class="rounded-circle mr-3" style="height: 45px;">
<div class="media-body">
<div>
<form id="ps_form_dynamics" ng-app="myPostDataDiv" ng-controller="postDiv">
<textarea style="z-index: 1000; border-color: #80bdff; border-bottom: none; border-radius: .25rem .25rem  0 0;" type="text"  class="form-control" id="ps-title-desc" name="dynamicTitle" placeholder="Speak your mind, Chidubem?"></textarea>
<input type="file"  multiple accept="image/x-png,image/jpeg"  class="form-control" name="files[]" id="image_upload"  style="display: none;">
<input type="hidden" id="url_type" class=""  name="url_type"   value="text" />


<!-- image/gif, -->
<div class="row">
  <div class="col-12">

    <div id="postDispalay" style=" background: #f5f8fa; border: 1px solid #80bdff; border-top: none; margin-top: -1px; z-index: 100;">

    </div>
    <div id="postDispalayInputPs">

    </div>
  </div>
<div class="col-6" id="ps-indicator-buttons">
<div class="row">
  <div class="col-3">
    <button for="image_upload" type="button" id="ps_pic" class="btn tB">
      <img src="public/images/post-assets/picture.svg" class="" style="height: 25px;">
    </button>

  </div>
<!-- <div class="col-3">
  <button for="image_upload" class="btn tB" >
  <img src="public/images/post-assets/chains.svg" style="height: 20px;">
   </button>
  </div>
<div class="col-3">
  <button for="image_upload" class="btn tB" >
    <img src="public/images/post-assets/video.svg"  style="height: 20px;">
  </button>
  </div> -->
<div class="col-3">
  <button type="button" class="btn tB" id="gifBtnGif">
    <img src="public/images/post-assets/gif-file.svg"  style="height: 25px; fill: #d4ecfb; color: #d4ecfb;">
  </button>
</div>
<div class="gif_popup" >
<div class="gif_popup-query" >
  <div class="gif_popup_input_wrapper">
    <label class="sr-only" for="inlineFormInputGroupUsername"></label>
    <div class="input-group">
      <div class="input-group-prepend">
        <div class="input-group-text"><i class="fas fa-search"></i></div>
      </div>
      <input type="text" style="font-size: 13px;" class="form-control" id="inlineFormInputGroupGIFName" placeholder="Search for a GIF">
    </div>
  </div>
</div>
  <div class="col-md-12" style="height: 337px; overflow-y: scroll ;">
  <div class="row" id="popupSearchResult" style=" text-align: center; padding: 5px; margin-right: -15px;
     margin-left: -15px; ">
    <div class="col-md-6" style=" padding-left: 0; padding-right:0;">
      <div style="height: 102.25px; margin:  5px; background-image: url('public/images/post-assets/giphy-downsized-medium.gif'); background-size: cover;">
        <div class="gif-popup-category" onclick="gif_popup_text('Agree');">Agree</div>
      </div>

    </div>

    <div class="col-md-6" style=" padding-left: 0; padding-right:0;">
      <div style="height: 102.25px; margin:  5px; background-image: url('public/images/post-assets/applause.gif'); background-size: cover;">
        <div class="gif-popup-category" onclick="gif_popup_text('Applause');">Applause</div>
      </div>

    </div>

    <div class="col-md-6" style=" padding-left: 0; padding-right:0;">
      <div style="height: 102.25px; margin:  5px; background-image: url('public/images/post-assets/giphy.webp'); background-size: cover;">
        <div class="gif-popup-category" onclick="gif_popup_text('Awww');">Awww</div>
      </div>

    </div>

    <div class="col-md-6" style=" padding-left: 0; padding-right:0;">
      <div style="height: 102.25px; margin:  5px; background-image: url('public/images/post-assets/dance.gif'); background-size: cover;">
        <div class="gif-popup-category" onclick="gif_popup_text('Dance');">Dance</div>
      </div>

    </div>

    <div class="col-md-6" style=" padding-left: 0; padding-right:0;">
      <div style="height: 102.25px; margin:  5px; background-image: url('public/images/post-assets/giphy2.webp'); background-size: cover;">
        <div class="gif-popup-category" onclick="gif_popup_text('Deal with it');">Deal with it</div>
      </div>

    </div>

    <div class="col-md-6" style=" padding-left: 0; padding-right:0;">
      <div style="height: 102.25px; margin: 5px; background-image: url('public/images/post-assets/tenor.gif'); background-size: cover;">
        <div class="gif-popup-category" onclick="gif_popup_text('Do not want');">Do not want</div>
      </div>

    </div>









  </div>
  </div>
</div>
</div>
</div>

<div class="col-6">
  <div class="modal fade" id="chooseCommunityModal" tabindex="-1" role="dialog" aria-labelledby="chooseCommunityModalLabel" aria-hidden="true">
      <div class="modal-center">
          <div class="modal-dialog .modal-align-center">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title text-primary" id="chooseCommunityModalLabel">Choose Community</h4>
                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>

                      </button>


                  </div>
                  <div class="modal-body">
                    <div class="col-md-6" style="padding-left: 10px !important">
                      <select name="community" class="form-control mt-2 mb-2" id="fetch_community_joined_option" >
                        <option value="0" selected><i class="fas fa-users"></i> Choose Community</option>

                      </select>
                    </div>
                      <button type="submit" id="psBtnSubmit" class="btn btn-primary btn-sm" style="float: right; border-radius: 35px;  margin-top: 10px;"> <i class="fas fa-plus-circle"></i> Create Post</button>
                  </div>

              </div>
          </div>
      </div>
  </div>

<button type="button" id="" data-toggle="modal" data-target="#chooseCommunityModal"  class="btn btn-primary btn-sm" style="float: right; border-radius: 35px;  margin-top: 10px;"> <i class="fas fa-plus-circle"></i> Post</button>
</div>
</div>
</form>
</div>

</div>
</div>

</div>
