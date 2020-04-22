<button class="" id="editPostBtn" data-toggle="modal" data-target="#editPostModal" style="display: none;"> </button>
<!-- Modal -->
<div class="modal fade" id="editPostModal" tabindex="-1" role="dialog" aria-labelledby="editPostModalLabel" aria-hidden="true">
    <div class="modal-center">
        <div class="modal-dialog .modal-align-center">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editPostModalLabel">Edit Post</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>

                    </button>


                </div>
                <div class="modal-body">
                    <div id="loadingEdit" style="text-align:center;"><img src="/public/images/spinner.svg" class="img-fluid" style="height: 80px;" /></div>
                    <form id="editPostFormInModal">
                        <textarea name="editPostTitle" class="form-control" id="postEditTextareaInmodal" placeholder="Edit post" style="border: none; display: none;;"></textarea>
                        <input type="hidden" name="editPostId" id="postEditId" value="">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger btn-sm" id="editPostBtnSubmit" onclick="save_edit_post()">Update</button>
                </div>
            </div>
        </div>
    </div>
</div>


<button class="" id="reportPostBtn" data-toggle="modal" data-target="#reportPostModal" style="display: none;"> </button>
<!-- Modal -->
<div class="modal fade" id="reportPostModal" tabindex="-1" role="dialog" aria-labelledby="reportPostModalLabel" aria-hidden="true">
    <div class="modal-center">
        <div class="modal-dialog .modal-align-center">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editPostModalLabel">Report Post</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>

                    </button>


                </div>
                <div class="modal-body">
                    <form id="reportPostFormInModal">
                        <textarea name="reportPostTitle" class="form-control" id="postReportTextareaInmodal" placeholder="Why do you want to report this post?" style="border: none; "></textarea>
                        <input type="hidden" name="reportPostId" id="postReportId" value="">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger btn-sm" id="reportPostBtnSubmit" onclick="save_report_post()">Report</button>
                </div>
            </div>
        </div>
    </div>
</div>