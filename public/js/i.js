function fetch_community_joined_by_id(id) {
  $.ajax({
    type: "GET",
    dataType: "json",
    url: "/feed/fetch_community_joined_by_id/" + id + "",
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
          ' <br><small class="twelvepx">' +
          v.members +
          " Members</small></h5>" +
          '<button onclick="leaveCommunity(this.id)" id="' +
          v.id +
          '" class="btn btn-sm btn-outline-danger mediaObject"><i class="fas fa-times twelvepx"></i> Leave</button>' +
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

function follow_user(id) {
  var voter = id.split("-");
  var user = voter[1];

  var value = "id=" + user + "";
  disabledBtn("", id);
  $.ajax({
    url: "/api/follow",
    type: "POST",
    data: value,
    success: function(response) {
      var data = JSON.parse(response);

      if (data.Ok) {
        toastMessage("Success", "Followed", "success", "slide");
        window.location.reload();
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

function fetch_community() {
  $.ajax({
    type: "GET",
    dataType: "json",
    url: "/feed/fetch_community/5",
    complete: function(data) {
      //  console.log(data);

      $.each(data.responseJSON, function(k, v) {
        bt = "";

        if (v.enterred == null) {
          bt =
            '<button onclick="joinCommunity(this.id)" id="' +
            v.id +
            '" class="btn btn-sm btn-primary mediaObject"><i class="fas fa-plus twelvepx"></i> Join</button>';
        } else {
          bt =
            '<button disabled class="btn btn-sm btn-warning mediaObject">Joined</button>';
        }
        var avarta =
          '<div class="media mb-2">' +
          '<img width="32" height="32" avatar="' +
          v.name +
          '" class="rounded-circle mr-3 topCommunity">' +
          '<div class="media-body">' +
          '<h5 class="mt-0 twelvepx"><a href="/g/' +
          v.slug +
          '/" class="link_members">' +
          v.name +
          ' <br><small class="twelvepx">' +
          v.members +
          " Members</small></a></h5>" +
          "" +
          bt +
          "</div>" +
          "</div>";
        $("#avartaCommunity").append(avarta);
      });
    }
  });
}

function delete_post(params) {
  //alert(params);

  //disabledBtn("Leaving", params);

  $.ajax({
    url: "/crud/delete_post/" + params,
    type: "GET",

    success: function(data) {
      rs = JSON.parse(data);

      if (rs.Ok == true) {
        toastMessage("Success", rs.msg, "success", "slide");
        $("#post_wrapper_" + params).remove();
      } else {
        toastMessage("Error", rs.error.msg, "error", "slide");
      }
      // you will get response from your php page (what you echo or print)
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log(textStatus, errorThrown);
    }
  });
}

function report_post(params) {
  $("#postReportId").val(params);
  $("#reportPostBtn").trigger("click");
}

function edit_post(params) {
  var fetching = true;
  $("#editPostBtn").trigger("click");
  $.ajax({
    url: "/crud/get_post_title/" + params,
    type: "GET",

    success: function(data) {
      rs = JSON.parse(data);

      if (rs.Ok == true) {
        $("#loadingEdit").hide("slow");
        $("#postEditTextareaInmodal").show("slow");
        $("#postEditTextareaInmodal").text(rs.title);
        $("#postEditId").val(params);
      } else {
        $("#editPostBtn").trigger("click");
      }
      // you will get response from your php page (what you echo or print)
    },
    error: function(jqXHR, textStatus, errorThrown) {
      $("#editPostBtn").trigger("click");
      console.log(textStatus, errorThrown);
    }
  });
}

function save_edit_post() {
  disabledBtn("", "editPostBtnSubmit");

  $.ajax({
    url: "/crud/save_edit_post",

    type: "POST",

    data: $("#editPostFormInModal").serialize(),
    success: function(data, textStatus, jQxhr) {
      rs = JSON.parse(data);
      if (rs.Ok == true) {
        location.reload();
      }
    },
    error: function(jqXhr, textStatus, errorThrown) {
      console.log(errorThrown);
    }
  });
}

function save_report_post() {
  disabledBtn("", "reportPostBtnSubmit");

  $.ajax({
    url: "/crud/save_report_post",

    type: "POST",

    data: $("#reportPostFormInModal").serialize(),
    success: function(data, textStatus, jQxhr) {
      console.log(data);

      rs = JSON.parse(data);
      if (rs.Ok == true) {
        toastMessage(
          "Success",
          "This post reported successfully, Wait for admin to take action",
          "success",
          "slide"
        );
        $("#reportPostBtn").trigger("click");
      } else {
        toastMessage(
          "Error",
          "Unable to report this post. Please try again later",
          "error",
          "slide"
        );
      }
    },
    error: function(jqXhr, textStatus, errorThrown) {
      console.log(errorThrown);
    }
  });
}
