function loadPost(type) {
    // console.log(type);

    $.ajax({
        type: "GET",
        dataType: 'json',
        url: "/g/fetch_post/" + type,
        complete: function(data) {
            try {
                if (data.responseJSON.length > 0) {
                    $("#gifLoader").remove();
                    $.each(data.responseJSON, function(k, v) {

                        if (v.post_type == "url") {
                            var post_data_mongo = url_post_format(v);



                            $("#post_wrapper_div").append(post_data_mongo);
                        } else if (v.post_type == "youtube") {
                            var post_data_mongo = youtube_post_format(v);
                            $("#post_wrapper_div").append(post_data_mongo);
                        } else if (v.post_type == "image" && v.is_multi_image == 1) {
                            var post_data_mongo = multi_image_post_format(v);
                            $("#post_wrapper_div").append(post_data_mongo);

                        } else if (v.post_type == "image" && v.is_multi_image == 0) {
                            var post_data_mongo = multi_image_post_format(v);
                            $("#post_wrapper_div").append(post_data_mongo);
                        } else if (v.post_type == "text") {

                            var post_data_mongo = multi_gif_post_txt(v);
                            $("#post_wrapper_div").append(post_data_mongo);
                        } else if (v.post_type == "gif" && v.is_multi_image == 0) {
                            var post_data_mongo = single_gif_post_format(v);
                            $("#post_wrapper_div").append(post_data_mongo);
                        }

                    });
                } else {
                    var no_data = '<p>Sorry we couldn\'t find any matches your <b>criteria,</b>' +
                        '<p>please try searching with another term</p>';
                    $("#post_wrapper_div").html(no_data);

                    /// load data empty
                }
            } catch (err) {
                var no_data = '<div class="text-center bg-white" style="padding: 10px;">' +
                    '<img src="/public/images/blank.png" /> <p>Sorry we couldn\'t find any matches your <b>criteria,</b> please try searching with another term' +
                    '</div>';
                $("#post_wrapper_div").html(no_data);
            }



        }
    });
}
var itemText = '<div class="text-center" id="gifLoader"><div class="spinner-grow text-primary text-center" role="status">' +

    '</div>' +
    '<div class="spinner-grow text-secondary text-center" role="status">' +

    '</div>' +
    '<div class="spinner-grow text-warning text-center" role="status">' +

    '</div></div>';
var getCom = $("#pod_id").val();
loadPost(getCom + "_best");
$('select').on('change', function() {

    $("#post_wrapper_div").html(itemText)
    loadPost(this.value);
});

function filter(id) {


    $("#post_wrapper_div").html(itemText)
    loadPost(id);
    var current = $("#" + id).html();
    $("#dropdownMenuLink").html(current + " <i class=\"fa fa-caret-down\"></i>");
}


function joinCommunity(id) {
    disabledBtn("Joining", id);
    var value = "id=" + id + "";
    $.ajax({
        url: "/api/join_community_name",
        type: "POST",
        data: value,
        success: function(response) {

            var data = JSON.parse(response);
            enableBtn("<i class=\"fas fa-plus\"></i> Join", id);

            if (data.Ok) {
                fetch_community_joined_by_id(id);

                toastMessage("Success", "Joined", 'success', "slide");
            } else {
                console.log(data.error);
                toastMessage("Error", data.error.msg, 'error', "slide");
            }
            // you will get response from your php page (what you echo or print)

        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }


    });
}