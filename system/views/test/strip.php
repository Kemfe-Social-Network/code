<?php

$htmlContent = '<div>Content goes here... <img src="one.png"/></div>';

//preg_match('/<div>(.*?)<\/div>/s', $htmlContent, $match);
echo strtolower("0x97D4d7B0F42DFB1f0EfB979138579366Df7563FE");
echo (strip_tags($htmlContent,  '<img>'));
?>

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

              <button class="boldBtn" type="button" name="boldBtn"><i class="fas fa-bold"></i></button>
              <button class="italicBtn" type="button" name="button"><i class="fas fa-italic"></i></button>

              <button class="headingBtn" type="button" name="button"><i class="fas fa-heading"></i></button>
              <button class="strikethroughBtn" type="button" name="button"><i class="fas fa-strikethrough"></i></button>
              <button class="listOlBtn" type="button" name="button"><i class="fas fa-list-ol"></i></button>
              <button class="listUlBtn" type="button" name="button"><i class="fas fa-list"></i></button>
              <button onclick="showLinkBox()" type="button" name="button"><i class="fas fa-link"></i></button>
              <button onclick="showImageBox()" type="button" name="button"><i class="fas fa-image"></i></button>
              <button class="alignCenter" type="button" name="button"><i class="fas fa-align-center"></i></button>
              <button class="alignLeft" type="button" name="button"><i class="fas fa-align-left"></i></button>
              <button class="alignRight" type="button" name="button"><i class="fas fa-align-right"></i></button>


              <!-- <select class="fontsizeChanger" name="">

                <script>
                  for (var i = 1; i < 11; i++) {
                    document.write("<option value='"+i+"'>"+i+"</option>")
                  }
                </script>
              </select> -->
            </div>
            <div id="combakSearch">
              <div class="col-md-12">
               <input type="text" class="form-control" id="insertLinkData" placeholder="Please insert your link" required>
               <button type="button" id="insertLink" class="btn btn-sm btn-info"><i class="fas fa-link"></i> Insert</button>
              </div>
            </div>

            <div id="combakSearchImage">
              <div class="col-md-12">
               <input type="text" class="form-control" id="insertImgData" placeholder="Please enter your image link" required>
               <button type="button" id="insertLinkImg" class="btn btn-sm btn-warning"><i class="fas fa-link"></i> Insert</button>
              </div>
            </div>
            <div class="rawdevTextArea">
              <iframe name="rawdewIframe" id="rawdewIframe" class="rawdewIframe" src="" width="" height="" frameborder="0">

              </iframe>
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