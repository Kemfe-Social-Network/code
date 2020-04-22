function vote(id) {
  var voter = id.split("_");
  var type = voter[0];
  var post_id = voter[1];
  var post_author = voter[2];

  var value = "id=" + post_id + "&type=" + type + "&author=" + post_author + "";
  disabledBtn("", id);
  $("#downvote_" + post_id + "_" + post_author).attr("disabled", true);
  $("#upvote_" + post_id + "_" + post_author).attr("disabled", true);
  $.ajax({
    url: "/api/vote_post",
    type: "POST",
    data: value,
    success: function(response) {
      var data = JSON.parse(response);

      if (data.Ok) {
        if (type == "upvote") {
          var pre_count = $("#vote_count_" + post_id).text();
          var now_count = parseInt(pre_count) + 1;
          $("#vote_count_" + post_id).html(now_count);
        }
        $("#" + id).html('<i class="fa fa-check"></i>');
        toastMessage("Success", "Voted", "success", "slide");
      } else {
        toastMessage("Error", data.error.msg, "error", "slide");
      }
      // you will get response from your php page (what you echo or print)
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log(textStatus, errorThrown);
    }
  });
}

function commentvote(id) {
  var voter = id.split("_");
  var type = voter[0];
  var comment_id = voter[1];
  var post_id = voter[2];
  var comment_author = voter[3];

  var value =
    "id=" +
    comment_id +
    "&post_id=" +
    post_id +
    "&type=" +
    type +
    "&author=" +
    comment_author +
    "";
  disabledBtn("", id);

  $.ajax({
    url: "/api/commentvote_post",
    type: "POST",
    data: value,
    success: function(response) {
      console.log(response);

      var data = JSON.parse(response);

      if (data.Ok) {
        if (type == "upvote") {
          var pre_count = $("#vote_count_" + comment_id).text();
          var now_count = parseInt(pre_count) + 1;
          $("#vote_count_" + comment_id).html(now_count);
        }
        $("#" + id).html('<i class="fa fa-check"></i>');
        toastMessage("Success", "Voted", "success", "slide");
      } else {
        toastMessage("Error", data.error.msg, "error", "slide");
      }
      // you will get response from your php page (what you echo or print)
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log(textStatus, errorThrown);
    }
  });
}
function site_wide_join(id) {
  disabledBtn("", id);
  var value = "id=" + id + "";

  $.ajax({
    url: "/api/join_community",
    type: "POST",
    data: value,
    success: function(response) {
      var data = JSON.parse(response);
      enableBtn('<i class="fas fa-plus"></i> Join', id);

      if (data.Ok) {
        $(".site_wide_btn_" + id).remove();

        toastMessage("Success", "Joined", "success", "slide");
      } else {
        toastMessage("Error", data.error.msg, "error", "slide");
      }
      // you will get response from your php page (what you echo or print)
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log(textStatus, errorThrown);
    }
  });
}
