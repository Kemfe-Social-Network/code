function fetch_posts() {
    var community_id = $("#community_id").val();

    $.ajax({
        type: "GET",
        dataType: 'json',
        url: "/manage/fetch_post/" + community_id + "/",
        complete: function(data) {
            console.log(data);

            $.each(data.responseJSON, function(k, v) {

                if (v.post_type == "url") {
                    var post_data_mongo = admin_url_post_format(v);



                    $("#post_wrapper_div").append(post_data_mongo);
                } else if (v.post_type == "youtube") {
                    var post_data_mongo = admin_youtube_post_format(v);
                    $("#post_wrapper_div").append(post_data_mongo);
                } else if (v.post_type == "image" && v.is_multi_image == 1) {
                    var post_data_mongo = admin_multi_image_post_format(v);
                    $("#post_wrapper_div").append(post_data_mongo);

                } else if (v.post_type == "image" && v.is_multi_image == 0) {
                    var post_data_mongo = admin_multi_image_post_format(v);
                    $("#post_wrapper_div").append(post_data_mongo);
                } else if (v.post_type == "text") {

                    var post_data_mongo = admin_multi_gif_post_txt(v);
                    $("#post_wrapper_div").append(post_data_mongo);
                } else if (v.post_type == "gif" && v.is_multi_image == 0) {
                    var post_data_mongo = admin_single_gif_post_format(v);
                    $("#post_wrapper_div").append(post_data_mongo);
                }

            });



        }
    });
}

function delete_post(id) {

    var type = "delete";
    var value = "id=" + id + "&type=" + type + "";
    disabledBtn("", id);

    $.ajax({
        url: "/manage/approva_and_delete",
        type: "POST",
        data: value,
        success: function(response) {

            var data = JSON.parse(response);



            if (data.Ok) {

                $("#post-wrapper_" + id).remove();
                toastMessage("Success", "Done!", 'success', "slide");
            } else {

                toastMessage("Error", data.error.msg, 'error', "slide");
            }
            // you will get response from your php page (what you echo or print)

        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }


    });
}

function approve(id) {
    var type = "approve";
    var value = "id=" + id + "&type=" + type + "";
    disabledBtn("", id);

    $.ajax({
        url: "/manage/approva_and_delete",
        type: "POST",
        data: value,
        success: function(response) {

            var data = JSON.parse(response);



            if (data.Ok) {

                $("#post-wrapper_" + id).remove();
                toastMessage("Success", "Done!", 'success', "slide");
            } else {

                toastMessage("Error", data.error.msg, 'error', "slide");
            }
            // you will get response from your php page (what you echo or print)

        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }


    });
}
fetch_posts();