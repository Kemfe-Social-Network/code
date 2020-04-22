// $(".textBoxClass").keypress(function(e)
// {
//     // if the key pressed is the enter key
//     if (e.which == 13)
//     {
//         alert("world of your own");
//     }
// });
// $("#commentBox_2").keyup(function() {
//   alert("type")
// });
//
// $(document).on("k", selector, function(){ //do stuff here })

function reply_comment() {
  disabledBtn("", "send_btn_2");
  var values = $("#replay_form_dynamics").serialize();

  $.ajax({
    url: "/api/comments_post",
    type: "POST",
    data: values,
    success: function(response) {
      var data = JSON.parse(response);
      enableBtn('<i class="fas fa-location-arrow"></i>', "send_btn_2");
      if (data.Ok) {
        $("#commentBox_2").val("");
        toastMessage("Success", "Post was successful", "success", "slide");
        listComment();
      } else {
        enableBtn('<i class="fas fa-location-arrow"></i>', "send_btn_2");
        toastMessage("Error", data.error.msg, "error", "slide");
      }
      // you will get response from your php page (what you echo or print)
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log(textStatus, errorThrown);
    }
  });
}
$("#boo").on("click", function(event) {
  event.preventDefault();

  disabledBtn("", "send_btn");
  var values = $("#cs_form_dynamics").serialize();

  $.ajax({
    url: "/api/comments_post",
    type: "POST",
    data: values,
    success: function(response) {
      console.log(response, "The reos");
      var data = JSON.parse(response);
      enableBtn('<i class="fas fa-location-arrow"></i>', "send_btn");

      if (data.Ok) {
        $("#commentBox").val("");
        toastMessage("Success", "Post was successful", "success", "slide");
        listComment();
      } else {
        toastMessage("Error", data.error.msg, "error", "slide");
      }
      // you will get response from your php page (what you echo or print)
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log(textStatus, errorThrown);
    }
  });
  return false;
});

function postReply(commentId) {
  var post_id = $("#post_id_server").val();

  var form =
    '<div id="" class="rplForm">' +
    '<form method="post" id="replay_form_dynamics" class="cs_form_dynamics">' +
    '<div class="newCome_wrapper" style="">' +
    '<div class="input-group">' +
    '<div class="input-group-append">' +
    '<span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>' +
    "</div>" +
    '<textarea name="text" id="commentBox_2" class="form-control type_msg" placeholder="Type your message..."></textarea>' +
    '<div class="input-group-append" id="boo_2">' +
    '<span class="input-group-text send_btn" id="send_btn_2" onclick="reply_comment()"><i class="fas fa-location-arrow"></i></span>' +
    "</div>" +
    "</div>" +
    "</div>" +
    '<input type="hidden" id="parent_id_2" name="parent_id" value="' +
    commentId +
    '" />' +
    '<input type="hidden" name="comment_type" value="text_comment" />' +
    '<input type="hidden" name="post_id" value="' +
    post_id +
    '" />' +
    "</form>" +
    "</div>";
  $(".rplForm").remove();
  $("#btn_reply_" + commentId).after(form);

  // $('#parent_id').val(commentId);
  // $("#commentBox").focus();
}

function listComment() {
  var servrId = $("#post_id_server").val();
  console.log("Server: " + servrId);

  $.post("/feed/fetch_comment/" + servrId + "", function(data) {
    var data = JSON.parse(data);
    console.log(data);
    var comments = "";
    var replies = "";
    var item = "";
    var parent = -1;
    var results = new Array();

    var list = $("<ul class='outer-comment'>");
    var item = $("<li>").html(comments);

    for (var i = 0; i < data.length; i++) {
      var commentId = data[i]["id"];
      parent = data[i]["parent_comment_id"];

      if (parent == "0") {
        var img_url_full;
        if (data[i]["user_img"] != "user_default") {
          img_url_full = "/public/images/user-images/" + data[i]["user_img"];
        } else {
          img_url_full = "/public/images/user_default.png";
        }
        comments =
          "<div class='comment-row'>" +
          "<div class='media mb-2'>" +
          "<img width='32' height='32' class='rounded-circle mr3 topCommunity' src='" +
          img_url_full +
          "' alt='Sport'>" +
          "<div class='media-body'>" +
          "<div class='txt_comment mt-0 twelvepx dont-break-out'><span class='posted-by'><a href='/u/" +
          data[i]["user_id"] +
          "'>" +
          data[i]["user_id"] +
          " </a></span>" +
          data[i]["comment"] +
          "</div>" +
          "<div class='btn_wrapper' id='btn_reply_" +
          commentId +
          "'>" +
          "<button id='' class='' onclick='postReply(" +
          commentId +
          ")'><i></i>Reply</button>" +
          "<button class=''>report</button>" +
          "<button class=''><span class='posted-at''>" +
          data[i]["date"] +
          "</span></button>" +
          "<div class='updowncount' style='float: left;'><button type='button' title='upvote' id='commentupvote_" +
          data[i]["id"] +
          "_" +
          data[i]["post_id"] +
          "_" +
          data[i]["comment_sender_id"] +
          "' class='btn  btn-sm pstUp' onclick='commentvote(this.id)'> <i class='fa fa-arrow-circle-up' aria-hidden='true'></i>" +
          "</button>" +
          "<span id='vote_count_" +
          data[i]["id"] +
          "'>" +
          data[i]["comment_upvote"] +
          "</span>" +
          "<button type='button' title='downvote' id='commentdownvote_" +
          data[i]["id"] +
          "_" +
          data[i]["post_id"] +
          "_" +
          data[i]["comment_sender_id"] +
          "' class='btn  btn-sm pstDown' onclick='commentvote(this.id)'> <i class='fa fa-arrow-circle-down' aria-hidden='true'></i>" +
          "</button>" +
          "</div>" +
          "</div>" +
          "</div>" +
          "</div>" +
          "</div>";
        var item = $("<li>").html(comments);
        list.append(item);
        var reply_list = $("<ul>");
        item.append(reply_list);
        listReplies(commentId, data, reply_list);
      }
    }

    $("#output").html(list);
  });
}

function listReplies(commentId, data, list) {
  for (var i = 0; i < data.length; i++) {
    if (commentId == data[i].parent_comment_id) {
      var img_url_full;
      if (data[i]["user_img"] != "user_default") {
        img_url_full = "/public/images/user-images/" + data[i]["user_img"];
      } else {
        img_url_full = "/public/images/user_default.png";
      }
      comments =
        "<div class='comment-row'>" +
        "<div class='media mb-2'>" +
        "<img width='32' height='32' class='rounded-circle mr3 topCommunity' src='" +
        img_url_full +
        "' alt='Sport'>" +
        "<div class='media-body'>" +
        "<p class='txt_comment mt-0 dont-break-out twelvepx'><span class='posted-by'><a href='/u/" +
        data[i]["user_id"] +
        "'>" +
        data[i]["user_id"] +
        " </a></span>" +
        data[i]["comment"] +
        "</p>" +
        "<div class='btn_wrapper' id='btn_reply_" +
        data[i]["id"] +
        "'>" +
        "<button id='' class='' onclick='postReply(" +
        data[i]["id"] +
        ")'><i></i>Reply</button>" +
        "<button class=''>report</button>" +
        "<button class=''><span class='posted-at''>" +
        data[i]["date"] +
        "</span></button>" +
        "<div class='updowncount' style='float: left;'><button type='button' title='upvote' id='commentupvote_" +
        data[i]["id"] +
        "_" +
        data[i]["post_id"] +
        "_" +
        data[i]["comment_sender_id"] +
        "' class='btn  btn-sm pstUp' onclick='commentvote(this.id)'> <i class='fa fa-arrow-circle-up' aria-hidden='true'></i>" +
        "</button>" +
        "<span id='vote_count_" +
        data[i]["id"] +
        "'>" +
        data[i]["comment_upvote"] +
        "</span>" +
        "<button type='button' title='downvote' id='commentdownvote_" +
        data[i]["id"] +
        "_" +
        data[i]["post_id"] +
        "_" +
        data[i]["comment_sender_id"] +
        "'' class='btn  btn-sm pstDown' onclick='commentvote(this.id)'> <i class='fa fa-arrow-circle-down' aria-hidden='true'></i>" +
        "</button>" +
        "</div>" +
        "</div>" +
        "</div>" +
        "</div>" +
        "</div>";
      var item = $("<li>").html(comments);
      var reply_list = $("<ul>");
      list.append(item);
      item.append(reply_list);
      listReplies(data[i].id, data, reply_list);
    }
  }
}

$(document).ready(function() {
  listComment();
});
