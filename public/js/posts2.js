var noData = false;
var post_type_current = $("#url_for_post").val();

function fetch_posts(type, current_page) {
  var url_for_post = type;
  var page = current_page;

  var value = "type=" + url_for_post;
  value += "&page=" + page;
  console.log(value);

  $.ajax({
    type: "POST",
    dataType: "json",
    data: value,
    url: "/feed/fetch_post_other",
    complete: function(data) {
      //console.log(data.responseJSON.length, noData);

      try {
        if (
          typeof data.responseJSON.length == "undefined" ||
          data.responseJSON.length == 0
        ) {
          noData = true;
          $("#loading").remove();
        }

        $("#loading").hide();
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
      } catch (e) {
        noData = true;
        $("#loading").remove();
      }
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

fetch_community_joined();
fetch_community();
fetch_posts(post_type_current, 1);
// function readURL(input) {
//
// 			if (input.files && input.files[0]) {
//         for (var i = 0, f; f = input.files[i]; i++) {
// 				var reader = new FileReader();
// 				reader.onload = function (e) {
//
//           var img = '<div class="img_image_wrapper"><img src="'+e.target.result+'" id="dynamic" class="img-fluid" style="height: 60px; float: left;"> '+
//           '<button type="button" onclick="pscloseImgBtn()" class="pscloseImgBtn "> <i class="fas fa-times-circle"></i> </button>'+
//           '</div>'; //Equivalent: $(document.createElement('img'))
//
//
//           $('#postDispalay').append(img);
//
//
//           $( "#ps-title-desc" ).css( "border-bottom", "none" );
//           $( "#ps-title-desc" ).css( "border-radius", "4px 4px 0 0" );
// 				};
// 				reader.readAsDataURL(input.files[f]);
// 			}
//     }
// 		}

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

function joinCommunity(id) {
  disabledBtn("Joining", id);
  var value = "id=" + id + "";
  $.ajax({
    url: "/api/join_community",
    type: "POST",
    data: value,
    success: function(response) {
      var data = JSON.parse(response);
      enableBtn('<i class="fas fa-plus"></i> Join', id);

      if (data.Ok) {
        fetch_community_joined_by_id(id);

        toastMessage("Success", "Joined", "success", "slide");
      } else {
        console.log(data.error);
        toastMessage("Error", data.error.msg, "error", "slide");
      }
      // you will get response from your php page (what you echo or print)
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log(textStatus, errorThrown);
    }
  });
}

function joinCommunityString(id) {
  disabledBtn("Joining", id);
  var value = "id=" + id + "";
  $.ajax({
    url: "/api/join_community_string",
    type: "POST",
    data: value,
    success: function(response) {
      console.log(response);

      var data = JSON.parse(response);
      enableBtn('<i class="fas fa-plus"></i> Join', id);

      if (data.Ok) {
        fetch_community_joined_by_id(id);

        toastMessage("Success", "Joined", "success", "slide");
      } else {
        console.log(data.error);
        toastMessage("Error", data.error.msg, "error", "slide");
      }
      // you will get response from your php page (what you echo or print)
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log(textStatus, errorThrown);
    }
  });
}

function leaveCommunity(id) {
  disabledBtn("Leaving", id);
  var value = "id=" + id + "";
  $.ajax({
    url: "/api/leave_community",
    type: "POST",
    data: value,
    success: function(response) {
      var data = JSON.parse(response);
      enableBtn('<i class="fas fa-times"></i> Leave', id);

      if (data.Ok) {
        toastMessage("Success", data.Ok, "success", "slide");
      } else {
        console.log(data.error);
        toastMessage("Error", data.error.msg, "error", "slide");
      }
      // you will get response from your php page (what you echo or print)
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log(textStatus, errorThrown);
    }
  });
}

$(document).ready(function() {
  var page = 1;
  var isLoading = false;

  $(window).scroll(function() {
    if ($(this).scrollTop() + 1 >= $("body").height() - $(window).height()) {
      page += 1;
      if (isLoading == false && noData == false) {
        isLoading = true;

        $("#loading").show();

        fetch_posts(post_type_current, page);
        isLoading = false;
      }
    }
  });
});

// $(document).ready(function() {
//   var win = $(window);
//   var page = 1;
//   var isLoading = false;
//   // Each time the user scrolls
//   win.scroll(function() {
//     // End of the document reached?
//     if ($(document).height() - win.height() == win.scrollTop()) {
//       page += 1;

//       if (isLoading == false && noData == false) {
//         isLoading = true;

//         $("#loading").show();
//         fetch_posts(post_type_current, page);

//         isLoading = false;
//       }
//     }
//   });
// });

// $("#psBtnSubmit").click(function() {
//   alert("What Oush")
//   return false;
// })

/*
 * LetterAvatar
 *
 * Artur Heinze
 * Create Letter avatar based on Initials
 * based on https://gist.github.com/leecrossley/6027780
 */

(function(w, d) {
  function LetterAvatar(name, size) {
    name = name || "";
    size = size || 60;

    var colours = [
        "#1abc9c",
        "#2ecc71",
        "#3498db",
        "#9b59b6",
        "#34495e",
        "#16a085",
        "#27ae60",
        "#2980b9",
        "#8e44ad",
        "#2c3e50",
        "#f1c40f",
        "#e67e22",
        "#e74c3c",
        "#ecf0f1",
        "#95a5a6",
        "#f39c12",
        "#d35400",
        "#c0392b",
        "#bdc3c7",
        "#7f8c8d"
      ],
      nameSplit = String(name)
        .toUpperCase()
        .split(" "),
      initials,
      charIndex,
      colourIndex,
      canvas,
      context,
      dataURI;

    if (nameSplit.length == 1) {
      initials = nameSplit[0] ? nameSplit[0].charAt(0) : "?";
    } else {
      initials = nameSplit[0].charAt(0) + nameSplit[1].charAt(0);
    }

    if (w.devicePixelRatio) {
      size = size * w.devicePixelRatio;
    }

    charIndex = (initials == "?" ? 72 : initials.charCodeAt(0)) - 64;
    colourIndex = charIndex % 20;
    canvas = d.createElement("canvas");
    canvas.width = size;
    canvas.height = size;
    context = canvas.getContext("2d");

    context.fillStyle = colours[colourIndex - 1];
    context.fillRect(0, 0, canvas.width, canvas.height);
    context.font = Math.round(canvas.width / 2) + "px Arial";
    context.textAlign = "center";
    context.fillStyle = "#FFF";
    context.fillText(initials, size / 2, size / 1.5);

    dataURI = canvas.toDataURL();
    canvas = null;

    return dataURI;
  }

  LetterAvatar.transform = function() {
    Array.prototype.forEach.call(d.querySelectorAll("img[avatar]"), function(
      img,
      name
    ) {
      name = img.getAttribute("avatar");
      img.src = LetterAvatar(name, img.getAttribute("width"));
      img.removeAttribute("avatar");
      img.setAttribute("alt", name);
    });
  };

  // AMD support
  if (typeof define === "function" && define.amd) {
    define(function() {
      return LetterAvatar;
    });

    // CommonJS and Node.js module support.
  } else if (typeof exports !== "undefined") {
    // Support Node.js specific `module.exports` (which can be a function)
    if (typeof module != "undefined" && module.exports) {
      exports = module.exports = LetterAvatar;
    }

    // But always support CommonJS module 1.1.1 spec (`exports` cannot be a function)
    exports.LetterAvatar = LetterAvatar;
  } else {
    window.LetterAvatar = LetterAvatar;

    d.addEventListener("readystatechange", function(event) {
      LetterAvatar.transform();
    });
  }
})(window, document);
