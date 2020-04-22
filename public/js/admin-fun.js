function admin_url_post_format(vv) {
    var img = vv.post_images;
    var mysay = vv.mySay;
    var comment = vv.post_comment_count;
    var vote = vv.up_vote;
    var id = vv.id;
    var name = vv.name;
    var user_id = vv.user_id;
    var user_img = vv.user_img;
    var date = vv.post_date;
    var post_url = vv.post_url;
    var unique_id = vv.post_unique_id;
    var post_author = vv.post_author;
    var type_of_vote = vv.type_of_vote;
    var title = vv.post_title;
    var img_user;
    var formated_footer = admin_format_footer(vote, id, post_author, unique_id, name, post_url, comment, vv.post_earnings, type_of_vote);
    if (vv.user_img == "user_default") {
        img_user = '<img width="45" height="45" src="/public/images/community-images/default_user.png" class="rounded-circle mr-3 topCommunity">';
    } else {
        img_user = '<img class="rounded-circle" src="/public/images/user-images/' + vv.user_img + '" width="45" alt="">';

    }
    var header_format = admin_format_header(img_user, id, user_id, name, date);
    var txt = header_format + '' +
        '<div class="card-body pt-0 pb-2">' +
        '' + mysay + '' +
        '</div>' +
        ' <img class="card-img-top" src="' + img + '" alt="" style="">' +
        '<div class="card-body pt-0 pb-2"> <a href="/c/' + name + '/' + unique_id + '/' + post_url + '/">' + title + ' </a></div>' + formated_footer + '';

    return txt;

}


function admin_single_gif_post_format(vv) {
    var img = vv.post_images;
    var title = vv.post_title;
    var comment = vv.post_comment_count;
    var vote = vv.up_vote;
    var id = vv.id;
    var name = vv.name;
    var user_id = vv.user_id;
    var user_img = vv.user_img;
    var date = vv.post_date;
    var post_url = vv.post_url;
    var unique_id = vv.post_unique_id;
    var post_author = vv.post_author;
    var type_of_vote = vv.type_of_vote;
    var img_user;
    var formated_footer = admin_format_footer(vote, id, post_author, unique_id, name, post_url, comment, vv.post_earnings, type_of_vote);
    if (vv.user_img == "user_default") {
        img_user = '<img width="45" height="45" src="/public/images/community-images/default_user.png" class="rounded-circle mr-3 topCommunity">';
    } else {
        img_user = '<img class="rounded-circle" src="/public/images/user-images/' + vv.user_img + '" width="45" alt="">';

    }
    var header_format = admin_format_header(img_user, id, user_id, name, date);
    var txt = header_format + '' +
        '<div class="card-body pt-0 pb-2">' +

        '</div>' +
        '<div class="card-body pt-0 pb-2"> <a href="/c/' + name + '/' + unique_id + '/' + post_url + '/">' + title + '</a> </div>' +
        ' <img class="card-img-top" src="' + img + '" alt="" style="">' + formated_footer + '';

    return txt;

}



function admin_multi_gif_post_txt(vv) {
    var img = vv.post_images;
    var title = vv.post_title;
    var comment = vv.post_comment_count;
    var vote = vv.up_vote;
    var id = vv.id;
    var name = vv.name;
    var user_id = vv.user_id;
    var user_img = vv.user_img;
    var date = vv.post_date;
    var post_url = vv.post_url;
    var unique_id = vv.post_unique_id;
    var post_author = vv.post_author;
    var type_of_vote = vv.type_of_vote;
    var content = vv.post_content;
    var formated_footer = admin_format_footer(vote, id, post_author, unique_id, name, post_url, comment, vv.post_earnings, type_of_vote);
    var img_user;

    var str = vv.post_images;

    var res = str.split(" ");
    if (vv.user_img == "user_default") {
        img_user = '<img width="45" height="45" src="/public/images/community-images/default_user.png" class="rounded-circle mr-3 topCommunity">';
    } else {
        img_user = '<img class="rounded-circle" src="/public/images/user-images/' + vv.user_img + '" width="45" alt="">';

    }

    var header_format = admin_format_header(img_user, id, user_id, name, date);
    var txt = header_format + '' +
        '<div class=" mybody pt-0 pb-2"><a href="/c/' + name + '/' + unique_id + '/' + post_url + '/"><h4 class="textpstTtl">' + title + '</h4></a>' +
        '<a href="/c/' + name + '/' + unique_id + '/' + post_url + '/"><div class="textPostPst">' + content + '</div></a>' +
        '</div>' + formated_footer + '';
    return txt;

}





function admin_multi_image_post_format(vv) {
    var img = vv.post_images;
    var title = vv.post_title;
    var comment = vv.post_comment_count;
    var vote = vv.up_vote;
    var id = vv.id;
    var name = vv.name;
    var user_id = vv.user_id;
    var user_img = vv.user_img;
    var date = vv.post_date;
    var post_url = vv.post_url;
    var unique_id = vv.post_unique_id;
    var post_author = vv.post_author;
    var type_of_vote = vv.type_of_vote;
    var img_user;
    var formated_footer = admin_format_footer(vote, id, post_author, unique_id, name, post_url, comment, vv.post_earnings, type_of_vote);
    var str = vv.post_images;

    var res = str.split(" ");
    if (vv.user_img == "user_default") {
        img_user = '<img width="45" height="45" src="/public/images/community-images/default_user.png" class="rounded-circle mr-3 topCommunity">';
    } else {
        img_user = '<img class="rounded-circle" src="/public/images/user-images/' + vv.user_img + '" width="45" alt="">';

    }

    var indicators = "";
    var carousel_item = "";
    var orient = "";
    var image_coin = 0;

    $.each(res, function(key, value) {
        image_coin++;
        var dim = value.split("-");

        var is_active = "";

        if (key == 0) {
            is_active = "active";
        }
        var img_gag = '/public/images/post-images/' + dim[0] + '';
        if (image_coin == 1) {
            orient = orientation(dim[1], dim[2]);


        }
        if (res.length > 5 && image_coin == 5) {
            var moreCount = res.length - 5;
            carousel_item += '<div onclick="loadSlider(' + id + ', ' + image_coin + ');" class="' + is_active + '"  style="background-image: url(' + img_gag + ')">' +
                '<div class="moreImages">+' + moreCount + '</div></div>';
        } else {
            carousel_item += '<div onclick="loadSlider(' + id + ', ' + image_coin + ')" class="' + is_active + '"  style="background-image: url(' + img_gag + ')">' +
                '<input type="hidden" id="modalImagesId_' + id + '" value="' + img + '">' +
                '</div>';
        }



    });

    if (res.length > 5) {
        orient = "demo_5";
    }
    var header_format = admin_format_header(img_user, id, user_id, name, date);
    var txt = header_format + '' +
        '<div class="card-body pt-0 pb-2"><a href="/c/' + name + '/' + unique_id + '/' + post_url + '/">' + title + '</a>' +





        '<div id="" class="demo_' + image_coin + ' ' + orient + '">' + carousel_item + '' +

        '</div>' +
        '</div>' + formated_footer + '';

    return txt;

}

function admin_format_footer(vote, id, post_author, unique_id, name, post_url, comment, post_earnings, type) {
    var butn;

    var up = '<i class="fa fa-arrow-circle-up" aria-hidden="true"></i>';
    var down = '<i class="fa fa-arrow-circle-down" aria-hidden="true"></i>';


    butn = '<button type="button" title="upvote" id="' + id + '" class="btn  btn-sm pstUp" onclick="approve(this.id)">  <i class="fa fa-arrow-circle-up" aria-hidden="true"></i> Approve</button> ' +
        '<span id="vote_count_' + id + '"></span> <button type="button" title="downvote" id="' + id + '" class="btn  btn-sm pstDown" onclick="delete_post(this.id)"> <i class="fa fa-arrow-circle-down" aria-hidden="true"></i> Delete</button>';

    var footer = '<div class="card-footer bg-hush border-0 p-0">' +
        '<div class="d-flex justify-content-between align-items-center my-1">' +
        '<div class="updowncount">' + butn +

        '</div>' +
        '<div class="pstcom">' +
        '<a href="/c/' + name + '/' + unique_id + '/' + post_url + '/" class="btn btn-link btn-sm"> </a></div>' +
        '<div class="pstearn btn"><span class="badge  badge-pill" style="font-size: 12px;">   </span>' +
        '</div></div></div></div>';
    return footer;
}

function admin_format_header(img_user, id, user_id, name, date) {
    var text = '<div class="card mb-2" id="post-wrapper_' + id + '">' +
        '<div class="card-header bg-white border-0 py-2">' +
        '<div class="d-flex justify-content-between">' +
        '<div class="d-flex justify-content-between">' +
        '<a href="#">' + img_user + '</a>' +
        '<div class="ml-3"><div class="h6 m-0" style="text-transform: capitalize;"><a href="/u/' + user_id + '">' + user_id + '</a> <i class="fas fa-caret-right"></i> <a href="/g/' + name + '" style="text-transform: capitalize;">' + name + '</a></div><div class="text-muted h8">' + date + ' <i class="fa fa-clock" aria-hidden="true"></i></div></div></div>' +
        '<div class="dropdown"><button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton"data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>' +
        '<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a>' +
        '</div></div></div></div>';

    return text;
}

function admin_youtube_post_format(vv) {
    var title = vv.mySay;
    var comment = vv.post_comment_count;
    var vote = vv.up_vote;
    var id = vv.id;
    var name = vv.name;
    var user_id = vv.user_id;
    var user_img = vv.user_img;
    var date = vv.post_date;
    var post_url = vv.post_url;
    var unique_id = vv.post_unique_id;
    var post_author = vv.post_author;
    var type_of_vote = vv.type_of_vote;
    var url = vv.external_link;
    var str = url;
    var res = str.split("=");
    var img_user;
    var formated_footer = admin_format_footer(vote, id, post_author, unique_id, name, post_url, comment, vv.post_earnings, type_of_vote);

    if (vv.user_img == "user_default") {
        img_user = '<img width="45" height="45" src="/public/images/community-images/default_user.png" class="rounded-circle mr-3 topCommunity">';
    } else {
        img_user = '<img class="rounded-circle" src="/public/images/user-images/' + vv.user_img + '" width="45" alt="">';

    }
    var header_format = admin_format_header(img_user, id, user_id, name, date);
    var txt = header_format + '' +
        '<div class="card-body pt-0 pb-2"> <a href="/c/' + name + '/' + unique_id + '/' + post_url + '/">' + title + '</a>' +

        '</div>' +
        ' <iframe width="100%" height="400px" src="https://www.youtube.com/embed/' + res[1] + '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>' + formated_footer + '';

    return txt;

}