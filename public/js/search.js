function fetch_posts() {

    $.ajax({
        type: "GET",
        dataType: 'json',
        url: "/search/fetch_data/" + $("#search_post").val(),
        complete: function(data) {

            var searched_qry = (data.responseText);

            $.each(JSON.parse(searched_qry), function(k, v) {
                console.log(v.kwese);

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



        }
    });
}
fetch_posts();