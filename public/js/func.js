function orientation(width, height) {
  var orientation;

  if (parseInt(width) >= parseInt(height)) {
    orientation = "landscape";
  } else if (parseInt(width) < parseInt(height)) {
    orientation = "portrait";
  } else {
    if (parseInt(height) >= 500) {
      orientation = "landscape";
    } else if (parseInt(height) < 500) {
      orientation = "landscape";
    }
  }
  return orientation;
}

function disabledBtn(msg, id) {
  $("#" + id).attr("disabled", true);
  var text =
    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> ' +
    msg +
    "...";
  $("#" + id).html(text);
}

function enableBtn(msg, id) {
  $("#" + id).removeAttr("disabled");

  $("#" + id).html(msg);
}

function msgAlert(type, message) {
  var txt =
    '<div class="alert alert-' +
    type +
    ' alert-dismissible fade show" role="alert">' +
    "" +
    message +
    "" +
    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
    '<span aria-hidden="true">&times;</span>' +
    "</button></div>";
  return txt;
}

function url_post_format(vv) {
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
  var formated_footer = format_footer(vv);
  if (vv.user_img == "user_default") {
    img_user =
      '<img width="45" height="45" src="/public/images/community-images/default_user.png" class="rounded-circle mr-3 topCommunity">';
  } else {
    img_user =
      '<img class="rounded-circle" src="/public/images/user-images/' +
      vv.user_img +
      '" width="45" alt="">';
  }
  var header_format = format_header(vv);
  var txt =
    header_format +
    "" +
    '<div class="card-body pt-0 pb-2">' +
    "" +
    mysay +
    "" +
    "</div>" +
    ' <img class="card-img-top" src="' +
    img +
    '" alt="" style="">' +
    '<div class="card-body pt-0 pb-2"> <a href="/c/' +
    name +
    "/" +
    unique_id +
    "/" +
    post_url +
    '/">' +
    title +
    " </a></div>" +
    formated_footer +
    "";

  return txt;
}

function single_gif_post_format(vv) {
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
  var formated_footer = format_footer(vv);
  if (vv.user_img == "user_default") {
    img_user =
      '<img width="45" height="45" src="/public/images/community-images/default_user.png" class="rounded-circle mr-3 topCommunity">';
  } else {
    img_user =
      '<img class="rounded-circle" src="/public/images/user-images/' +
      vv.user_img +
      '" width="45" alt="">';
  }
  var header_format = format_header(vv);
  var txt =
    header_format +
    "" +
    '<div class="card-body pt-0 pb-2">' +
    "</div>" +
    '<div class="card-body pt-0 pb-2"> <a href="/c/' +
    name +
    "/" +
    unique_id +
    "/" +
    post_url +
    '/">' +
    title +
    "</a> </div>" +
    ' <img class="card-img-top" src="' +
    img +
    '" alt="" style="">' +
    formated_footer +
    "";

  return txt;
}

function multi_gif_post_txt(vv) {
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
  var formated_footer = format_footer(vv);
  var img_user;

  var str = vv.post_images;

  var res = str.split(" ");
  if (vv.user_img == "user_default") {
    img_user =
      '<img width="45" height="45" src="/public/images/community-images/default_user.png" class="rounded-circle mr-3 topCommunity">';
  } else {
    img_user =
      '<img class="rounded-circle" src="/public/images/user-images/' +
      vv.user_img +
      '" width="45" alt="">';
  }
  // ' + content + ' textPostPst textPostPst
  var header_format = format_header(vv);
  var txt =
    header_format +
    "" +
    '<div class=" mybody pt-0 pb-2"><a href="/c/' +
    name +
    "/" +
    unique_id +
    "/" +
    post_url +
    '/"><h4 class="textpstTtl">' +
    title +
    "</h4></a>" +
    '<a href="/c/' +
    name +
    "/" +
    unique_id +
    "/" +
    post_url +
    '/"><div class="">       </div></a>' +
    "</div>" +
    formated_footer +
    "";
  return txt;
}

function loadSlider(id, index) {
  var images = $("#modalImagesId_" + id).val();

  var res = images.trim().split(" ");
  var innnerImages;
  var imgcc = res.length;
  var cc = 0;
  $.each(res, function(key, value) {
    cc++;
    var dim = value.trim().split("-");

    innnerImages +=
      '<div class="mySlides">' +
      '<div class="numbertext">' +
      cc +
      " / " +
      imgcc +
      "</div>" +
      '<img src="/public/images/post-images/' +
      dim[0] +
      '" style=" max-height: 600px;" class="img-fluid">' +
      "</div>";
  });
  $(".mySlides").remove();
  $("#kemfeModaLPopupContent").append(innnerImages);
  openModal();
  currentSlide(index);
}

function multi_image_post_format(vv) {
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
  var formated_footer = format_footer(vv);
  var str = vv.post_images;

  var res = str.split(" ");
  if (vv.user_img == "user_default") {
    img_user =
      '<img width="45" height="45" src="/public/images/community-images/default_user.png" class="rounded-circle mr-3 topCommunity">';
  } else {
    img_user =
      '<img class="rounded-circle" src="/public/images/user-images/' +
      vv.user_img +
      '" width="45" alt="">';
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
    var img_gag = "/public/images/post-images/" + dim[0] + "";
    if (image_coin == 1) {
      orient = orientation(dim[1], dim[2]);
    }
    if (res.length > 5 && image_coin == 5) {
      var moreCount = res.length - 5;
      carousel_item +=
        '<div onclick="loadSlider(' +
        id +
        ", " +
        image_coin +
        ');" class="' +
        is_active +
        '"  style="background-image: url(' +
        img_gag +
        ')">' +
        '<div class="moreImages">+' +
        moreCount +
        "</div></div>";
    } else {
      carousel_item +=
        '<div onclick="loadSlider(' +
        id +
        ", " +
        image_coin +
        ')" class="' +
        is_active +
        '"  style="background-image: url(' +
        img_gag +
        ')">' +
        '<input type="hidden" id="modalImagesId_' +
        id +
        '" value="' +
        img +
        '">' +
        "</div>";
    }
  });

  if (res.length > 5) {
    orient = "demo_5";
  }
  var header_format = format_header(vv);
  var txt =
    header_format +
    "" +
    '<div class="card-body pt-0 pb-2"><a style="text-decoration: none; color: #222;" class="textPostPst" href="/c/' +
    vv.slug +
    "/" +
    unique_id +
    "/" +
    post_url +
    '/">' +
    title +
    "</a>" +
    '<div id="" class="demo_' +
    image_coin +
    " " +
    orient +
    '">' +
    carousel_item +
    "" +
    "</div>" +
    "</div>" +
    formated_footer +
    "";

  return txt;
}

function format_footer(data) {
  //  console.log(data);

  var butn;
  if (data.type_of_vote == "upvote" || data.type_of_vote == "downvote") {
    var up = '<i class="fa fa-arrow-circle-up" aria-hidden="true"></i>';
    var down = '<i class="fa fa-arrow-circle-down" aria-hidden="true"></i>';
    if (data.type_of_vote == "downvote") {
      down = '<i class="fa fa-check" aria-hidden="true"></i>';
    } else if (data.type_of_vote == "upvote") {
      up = '<i class="fa fa-check" aria-hidden="true"></i>';
    }
    butn =
      '<button type="button" disabled title="upvote" class="btn  btn-sm pstUp" >' +
      up +
      " </button> " +
      "<span>" +
      data.up_vote +
      '</span> <button disabled type="button" title="downvote" class="btn  btn-sm pstDown"> ' +
      down +
      "</button>";
  } else {
    butn =
      '<button type="button" title="upvote" id="upvote_' +
      data.id +
      "_" +
      data.post_author +
      '" class="btn  btn-sm pstUp" onclick="vote(this.id)"> <i class="fa fa-arrow-circle-up" aria-hidden="true"></i></button> ' +
      '<span id="vote_count_' +
      data.id +
      '">' +
      data.up_vote +
      '</span> <button type="button" title="downvote" id="downvote_' +
      data.id +
      "_" +
      data.post_author +
      '" class="btn  btn-sm pstDown" onclick="vote(this.id)"> <i class="fa fa-arrow-circle-down" aria-hidden="true"></i></button>';
  }
  var footer =
    '<div class="card-footer bg-hush border-0 p-0">' +
    '<div class="d-flex justify-content-between align-items-center my-1">' +
    '<div class="updowncount">' +
    butn +
    "</div>" +
    '<div class="pstcom">' +
    '<a href="/c/' +
    data.slug +
    "/" +
    data.post_unique_id +
    "/" +
    data.post_url +
    '/" class="btn btn-link btn-sm"><i class="fa fa-comment" aria-hidden="true"></i> Comment(' +
    data.post_comment_count +
    ")</a></div>" +
    '<div class="pstearn btn"><span class="badge  badge-pill" style="font-size: 12px;"> <span class="text-success"><img src="/public/images/espals-logo.png" style="height: 14px;" class="img-fluid"/></span> ' +
    data.post_earnings +
    " </span>" +
    "</div></div></div></div>";
  return footer;
}

function format_header(data) {
  var img_user;
  if (data.user_img == "user_default") {
    img_user =
      '<img width="45" height="45" src="/public/images/community-images/default_user.png" class="rounded-circle mr-3 topCommunity">';
  } else {
    img_user =
      '<img class="rounded-circle" src="/public/images/user-images/' +
      data.user_img +
      '" width="45" alt="">';
  }
  //console.log("user_id: " + user_id, " name:" + name, "kwese: " + kwese, "id: " + id);
  var btn = "";
  var drop_btn = "";
  drop_btn =
    '<button class="dropdown-item" id="' +
    data.id +
    '" onclick="report_post(this.id)"><i class="fas fa-edit"></i> Report</button>';

  if (data.kwese == data.post_author) {
    drop_btn =
      '<button id="' +
      data.id +
      '" class="dropdown-item" onclick="delete_post(this.id)"> <i class="fas fa-times text-danger"></i>  Delete </button>' +
      '<button class="dropdown-item" id="' +
      data.id +
      '" onclick="edit_post(this.id)"><i class="fas fa-edit"></i> Edit</button>';
  }
  if (data.kwese > 0) {
  } else {
    btn =
      '<button class="btn btn-info btn-sm site_wide_btn_' +
      data.cat_id +
      '"  id="' +
      data.cat_id +
      '" onclick=site_wide_join(this.id)>+ Join </button>';
  }
  var text =
    '<div class="card mb-2" id="post_wrapper_' +
    data.id +
    '">' +
    '<div class="card-header bg-white border-0 py-2">' +
    '<div class="d-flex justify-content-between">' +
    '<div class="d-flex justify-content-between">' +
    '<a href="#">' +
    img_user +
    "</a> " +
    '<div class="ml-3"><div class="h6 m-0" style="text-transform: capitalize;"><a href="/u/' +
    data.user_id +
    '">' +
    data.user_id +
    '</a> <i class="fas fa-caret-right"></i> <a href="/g/' +
    data.slug +
    '" style="text-transform: capitalize;">' +
    data.name +
    '</a></div><div class="text-muted h8">' +
    data.post_date +
    ' <i class="fa fa-clock" aria-hidden="true"></i></div></div></div>' +
    '<div class="">' +
    btn +
    "" +
    "</div></div></div>";
  var texte =
    '<div class="card mb-2" id="post_wrapper_' +
    data.id +
    '">' +
    '<div class="card-header bg-white border-0 py-2">' +
    '<div class="d-flex justify-content-between">' +
    '<div class="d-flex justify-content-between">' +
    '<a href="#">' +
    img_user +
    "</a>" +
    '<div class="ml-3"><div class="h6 m-0" style="text-transform: capitalize;"><a href="/u/' +
    data.user_id +
    '">' +
    data.user_id +
    '</a> <i class="fas fa-caret-right"></i> <a href="/g/' +
    data.slug +
    '" style="text-transform: capitalize;">' +
    data.name +
    '</a></div><div class="text-muted h8">' +
    data.post_date +
    ' <i class="fa fa-clock" aria-hidden="true"></i></div></div></div>' +
    '<div class="dropdown">' +
    btn +
    '<button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton"data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></button>' +
    '<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">' +
    drop_btn +
    "</div></div></div></div>";
  return texte;
}

function fetch_community_joined() {
  $.ajax({
    type: "GET",
    dataType: "json",
    url: "/feed/fetch_community_joined/5",
    complete: function(data) {
      $.each(data.responseJSON, function(k, v) {
        var avarta =
          '<div class="media mb-2" id="avarta-wrapper_' +
          v.id +
          '">' +
          '<img width="32" height="32" avatar="' +
          v.name +
          '" class="rounded-circle mr-3 topCommunity">' +
          '<div class="media-body">' +
          '<h5 class="mt-0 twelvepx">' +
          v.name +
          ' <br><small class="twelvepx"></small></h5>' +
          '<button onclick="leaveCommunity(this.id)" id="' +
          v.id +
          '" class="btn btn-sm btn-outline-danger mediaObject"><i class="fas fa-times twelvepx"></i> </button>' +
          "</div>" +
          "</div>";
        $("#fetch_community_joined_option").append(
          '<option value="' + v.community_id + '">' + v.name + "</option>"
        );
        $("#fetch_community_joined_option2").append(
          '<option value="' + v.community_id + '">' + v.name + "</option>"
        );

        $("#myAvartaCommunity").append(avarta);
      });
    }
  });
}

function youtube_post_format(vv) {
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
  var youtbe_url;
  youtbe_url = res[1];
  console.log(res[1]);

  if (typeof res[1] == "undefined") {
    var res = str.split("/");
    youtbe_url = res[3];
  }

  var img_user;
  var formated_footer = format_footer(vv);

  if (vv.user_img == "user_default") {
    img_user =
      '<img width="45" height="45" src="/public/images/community-images/default_user.png" class="rounded-circle mr-3 topCommunity">';
  } else {
    img_user =
      '<img class="rounded-circle" src="/public/images/user-images/' +
      vv.user_img +
      '" width="45" alt="">';
  }
  var header_format = format_header(vv);
  var txt =
    header_format +
    "" +
    '<div class="card-body pt-0 pb-2"> <a href="/c/' +
    name +
    "/" +
    unique_id +
    "/" +
    post_url +
    '/">' +
    title +
    "</a>" +
    "</div>" +
    ' <iframe width="100%" height="400px" src="https://www.youtube.com/embed/' +
    youtbe_url +
    '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>' +
    formated_footer +
    "";

  return txt;
}

function toastMessage(heading, text, icon_type, transition) {
  $.toast({
    heading: heading,
    text: text,
    showHideTransition: transition,
    icon: icon_type
  });
}

$(document).ready(function() {
  $("#rawdewIframe").summernote({
    height: 150, //set editable area's height
    toolbar: [
      // [groupName, [list of button]]
      ["style", ["bold", "italic", "underline", "clear"]],

      ["para", ["paragraph"]],

      ["insert", ["link", "picture"]]
    ],
    codemirror: {
      // codemirror options
      theme: "monokai"
    }
  });
});
