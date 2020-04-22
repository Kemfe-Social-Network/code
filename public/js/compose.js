var pstTextDiv =
  '<div class="rawdevRichEditorytt">' +
  '<div class="topFormwysiwygtttt">' +
  '<input placeholder="Title" class="form-control" />' +
  "</div>" +
  '<div class="rawdevRibbonyy">' +
  "</div>" +
  '<div id="combakSearch">' +
  '<div class="col-md-12">' +
  '<input type="text" class="form-control" id="insertLinkData" placeholder="Please insert your link" required>' +
  '<button type="button" id="insertLink" class="btn btn-sm btn-info"><i class="fas fa-link"></i> Insert</button>' +
  "</div>" +
  "</div>" +
  '<div id="combakSearchImage">' +
  '<div class="col-md-12">' +
  '<input type="text" class="form-control" id="insertImgData" placeholder="Please enter your image link" required>' +
  '<button type="button" id="insertLinkImg" class="btn btn-sm btn-warning"><i class="fas fa-link"></i> Insert</button>' +
  "</div>" +
  "</div>" +
  '<div class="rawdevTextArea">' +
  '<iframe name="rawdewIframe" class="rawdewIframe" src="" width="" height="" frameborder="0">' +
  "</iframe>" +
  "</div>" +
  "</div>";
var pstPhotoDiv =
  '<div id="imgpstdiv">  <div id="gifDisplayNew" style="display: none;"></div>' +
  '<div class="row customBorder" id="divForImgAndGif">' +
  '<div class="col-md-6 text-center resetBpadd">' +
  '<div style=" height:195px;" class="myl brdes">' +
  '<button class="custom-btn btn" onclick="addmoreImages()" style="color: #989898;">' +
  '<i class="fas fa-camera" style="font-size: 60px;"></i>  Upload Photos' +
  "</button>" +
  "</div>" +
  "</div>" +
  '<div class="col-md-6 text-center resetBpadd">' +
  '<div style=" height:195px;" class="myl ">' +
  '<button class="custom-btn  btn" style="color: #989898;"  onclick="loadGifDivPst()">' +
  '<img src="/public/images/gif-post.svg" class="img-fluid"  style="height: 60px;"/>  Add GIF' +
  "</button>" +
  "</div>" +
  "</div>" +
  "</div>" +
  '<div id="postDispalayNew" style=""></div>' +
  '<div id="postDispalayNewAddmoreImage" style=""></div>' +
  '<textarea placeholder="Add a caption, if you like" id="imageCaption" name="imageCaption"  class="my-form-control form-control"></textarea>' +
  "</div>";
var pstPollDiv = "<h1>Poll</h1>";
var pstLinkDiv =
  '<div id="imgpstdiv">' +
  '<div class="row customBorder" id="divForImgAndUrl">' +
  '<div class="col-md-12 text-center resetBpadd">' +
  '<div style=" " class="myl ">' +
  '<input type="url" onchange="AnEventHasOccurred()"  id="urlpstNew" class="form-control" placeholder="Type or paste a URL" />' +
  "</div>" +
  "</div>" +
  "</div>" +
  '<textarea placeholder="Add a caption, if you like" id="imageCaption" name="imageCaption"  class="my-form-control form-control"></textarea>' +
  "</div>";

var gif_popupDivs =
  '<div class="gif_popup" >' +
  '<div class="gif_popup-query" >' +
  '<div class="gif_popup_input_wrapper">' +
  '<label class="sr-only" for="inlineFormInputGroupUsername"></label>' +
  '<div class="input-group">' +
  '<div class="input-group-prepend">' +
  '<div class="input-group-text"><i class="fas fa-search"></i></div>' +
  "</div>" +
  '<input type="text" style="font-size: 13px;" class="form-control" onkeyup="initGif()" id="inlineFormInputGroupGIFName" placeholder="Search for a GIF">' +
  "</div>" +
  "</div>" +
  "</div>" +
  '<div class="col-md-12" style="height: 337px; overflow-y: scroll ;">' +
  '<div class="row" id="popupSearchResult" style=" text-align: center; padding: 5px; margin-right: -15px; margin-left: -15px; ">' +
  '<div class="col-md-6" style=" padding-left: 0; padding-right:0;">' +
  '<div style="height: 102.25px; margin:  5px; background-image: url(public/images/post-assets/giphy-downsized-medium.gif); background-size: cover;">' +
  '<div class="gif-popup-category" id="gifsearchevent_1" onclick="gif_popup_text(this.id);">Agree</div>' +
  "</div>" +
  "</div>" +
  '<div class="col-md-6" style=" padding-left: 0; padding-right:0;">' +
  '<div style="height: 102.25px; margin:  5px; background-image: url(public/images/post-assets/applause.gif); background-size: cover;">' +
  '<div class="gif-popup-category" id="gifsearchevent_2" onclick="gif_popup_text(this.id);">Applause</div>' +
  "</div>" +
  "</div>" +
  '<div class="col-md-6" style=" padding-left: 0; padding-right:0;">' +
  '<div style="height: 102.25px; margin:  5px; background-image: url(public/images/post-assets/giphy.webp); background-size: cover;">' +
  '<div class="gif-popup-category" id="gifsearchevent_3" onclick="gif_popup_text(this.id);">Awww</div>' +
  "</div>" +
  "</div>" +
  '<div class="col-md-6" style=" padding-left: 0; padding-right:0;">' +
  '<div style="height: 102.25px; margin:  5px; background-image: url(public/images/post-assets/dance.gif); background-size: cover;">' +
  '<div class="gif-popup-category" id="gifsearchevent_4" onclick="gif_popup_text(this.id);">Dance</div>' +
  "</div>" +
  "</div>" +
  '<div class="col-md-6" style=" padding-left: 0; padding-right:0;">' +
  '<div style="height: 102.25px; margin:  5px; background-image: url(public/images/post-assets/giphy2.webp); background-size: cover;">' +
  '<div class="gif-popup-category" id="gifsearchevent_5" onclick="gif_popup_text(this.id);">Deal with it</div>' +
  "</div>" +
  "</div>" +
  '<div class="col-md-6" style=" padding-left: 0; padding-right:0;">' +
  '<div style="height: 102.25px; margin: 5px; background-image: url(public/images/post-assets/tenor.gif); background-size: cover;">' +
  '<div class="gif-popup-category" id="gifsearchevent_6" onclick="gif_popup_text(this.id);">Do not want</div>' +
  "</div>" +
  "</div>" +
  "</div>" +
  "</div>" +
  "</div>";
//$('#').modal({backdrop: 'static', keyboard: false})
function loadGifDivPst() {
  $("#imgpstdiv").prepend(gif_popupDivs);

  $("#divForImgAndGif").remove();
}

function loadPstView(whichView) {
  switch (whichView) {
    case "text":
      //  $("#actiavtePstCustomModal").trigger("click");
      $("#pstCustomModal2").modal({ backdrop: "static", keyboard: false });
      break;
    case "photo":
      $("#dynamicForms").html(pstPhotoDiv);
      //  $("#actiavtePstCustomModal").trigger("click");
      $("#pstCustomModal").modal({ backdrop: "static", keyboard: false });
      loadRichEditor();
      break;
    case "poll":
      //  $("#pstCustomModalDiv").html(pstPollDiv);
      //  $("#actiavtePstCustomModal").trigger("click");
      $("#pstCustomModal").modal({ backdrop: "static", keyboard: false });
      break;

    case "link":
      $("#dynamicForms").html(pstLinkDiv);
      //$("#actiavtePstCustomModal").trigger("click");
      $("#pstCustomModal").modal({ backdrop: "static", keyboard: false });
      break;
    default:
  }
}

function gif_popup_text(text) {
  var search = "";
  switch (text) {
    case "gifsearchevent_1":
      var search = "Agree";
      break;
    case "gifsearchevent_2":
      var search = "Applause";
      break;

    case "gifsearchevent_3":
      var search = "Awww";
      break;

    case "gifsearchevent_4":
      var search = "Dance";
      break;

    case "gifsearchevent_5":
      var search = "Deal with it";
      break;
    case "gifsearchevent_6":
      var search = "Do not want";
      break;

    default:
  }
  $("#inlineFormInputGroupGIFName").val(search);
  initGif();
}

function IsValidImageUrl(urlOfImage) {
  return url.match(/\.(jpeg|jpg|gif|png)$/) != null;
}

function initGif() {
  /// process the search

  var itemText =
    '<div class="spinner-grow text-primary text-center" role="status">' +
    "</div>" +
    '<div class="spinner-grow text-secondary text-center" role="status">' +
    "</div>" +
    '<div class="spinner-grow text-success text-center" role="status">' +
    "</div>" +
    '<div class="spinner-grow text-danger text-center" role="status">' +
    "</div>" +
    '<div class="spinner-grow text-warning text-center" role="status">' +
    "</div>" +
    '<div class="spinner-grow text-info text-center" role="status">' +
    "</div>" +
    '<div class="spinner-grow text-light text-center" role="status">' +
    "</div>" +
    '<div class="spinner-grow text-dark text-center" role="status">' +
    "</div>";
  $("#popupSearchResult").html(itemText);
  var url = "https://api.tenor.com/v1/anonid?key=" + "54UE5DSZJU3W";

  // start the flow by getting a new anonymous id and having the callback pass it to grab_data
  httpGetAsync(url, tenorCallback_anonid);
}

function httpGetAsync(theUrl, callback) {
  // create the request object
  var xmlHttp = new XMLHttpRequest();

  // set the state change callback to capture when the response comes in
  xmlHttp.onreadystatechange = function() {
    if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
      callback(xmlHttp.responseText);
    }
  };

  // open as a GET call, pass in the url and set async = True
  xmlHttp.open("GET", theUrl, true);

  // call send with no params as they were passed in on the url string
  xmlHttp.send(null);

  return;
}

function grab_data(anon_id) {
  // set the apikey and limit
  var apikey = "54UE5DSZJU3W";
  var lmt = 8;

  // test search term
  var search_term = $("#inlineFormInputGroupGIFName").val();

  // using default locale of en_US
  var search_url =
    "https://api.tenor.com/v1/search?tag=" +
    search_term +
    "&key=" +
    apikey +
    "&limit=" +
    lmt +
    "&anon_id=" +
    anon_id;

  httpGetAsync(search_url, tenorCallback_search);

  // data will be loaded by each call's callback
  return;
}

function tenorCallback_search(responsetext) {
  // parse the json response
  var response_objects = JSON.parse(responsetext);

  top_10_gifs = response_objects["results"];

  $("#popupSearchResult").html("");
  var count = 0;
  $.each(top_10_gifs, function(i, item) {
    count++;

    var GIG_url = item.media[0].gif.url;
    var tiny_GIG_url = item.media[0].tinygif.url;
    var img =
      '<div id="cop_' +
      count +
      '" class="col-md-6 mb-2" style=" padding-left: 0; padding-right:0;">' +
      '<div style="height: 102.25px; margin:  5px; ">' +
      '<div class="gif-popup-category" id="' +
      count +
      '" onclick="add_gif_popup_img(this.id)">' +
      '<img src="' +
      tiny_GIG_url +
      '" og-src="' +
      GIG_url +
      '" class="img-fluid" id="img_' +
      count +
      '" />' +
      "</div>" +
      "</div>" +
      "</div>";

    $("#popupSearchResult").append(img);
    //  console.log(item.media[0].tinygif.url);
  });
  // load the GIFs -- for our example we will load the first GIFs preview size (nanogif) and share size (tinygif)

  return;
}

function add_gif_popup_img(id) {
  var images = $("#img_" + id).attr("og-src");
  var images2 = $("#img_" + id).attr("src");

  var img =
    '<div class="img_image_wrapper ' +
    id +
    '" id="img_ps_r' +
    id +
    '"><img src="' +
    images2 +
    '"  class="img-fluid" style="height: auto;"> ' +
    '<button type="button" id="' +
    id +
    '" onclick="pscloseImgBtn(this.id)" class="pscloseImgBtn"> <i class="fas fa-times-circle"></i> </button>' +
    "</div>";
  var input_data =
    '<input type="hidden" class="input_images_hidden_gif"  name="images[]"  id="input' +
    id +
    '" value="' +
    images +
    '" />';
  $(".input_images_hidden_gif").remove();
  $(".gif_popup").remove();
  $("#gifDisplayNew").html(img);
  $("#gifDisplayNew").show();

  $("#refinned").prepend(input_data);
  $("#url_type").val("gif");
}

function tenorCallback_anonid(responsetext) {
  // parse the json response
  var response_objects = JSON.parse(responsetext);

  anon_id = response_objects["anon_id"];

  user_anon_id = anon_id;

  // pass on to grab_data
  grab_data(anon_id);
}

$("#gifBtnGif").click(function() {
  $(".gif_popup").toggle("slow", "swing");
});
$(document).ready(function() {
  // Create the new select
  var select = $(".fancy-select");
  var selectOption = $(".fancy-select option");
  select.wrap('<div class="newSelect"></div>');
  $(".newSelect").prepend(
    '<div class="selectedOption">Choose an Option</div><div class="newOptions"></div>'
  );
  selectOption.each(function() {
    var optionContents = $(this).html();
    var optionValue = $(this).attr("value");
    $(".newOptions").append(
      '<div class="newOption" data-value="' +
        optionValue +
        '">' +
        optionContents +
        "</div>"
    );
  });
  // new select functionality
  var newSelect = $(".newSelect");
  var newOption = $(".newOption");
  var itemHeight = $(".newOption").height();
  var itemCount = $(".newOption").length;
  var optionsHeight = itemHeight * itemCount;
  newSelect.click(function() {
    $(this).addClass("clicked");
  });
  // update based on selection
  newOption.on("mouseup", function() {
    var newValue = $(this).attr("data-value");
    $(this)
      .parent()
      .prev(".selectedOption")
      .html(newValue)
      .addClass("selected");
    // update the actual input
    selectOption.each(function() {
      var optionValue = $(this).attr("value");
      if (newValue == optionValue) {
        $(this).prop("selected", true);
      } else {
        $(this).prop("selected", false);
      }
    });
  });
  newSelect.on("mouseleave", function() {
    $(this).removeClass("clicked");
  });
});

$("#ps_pic").on("click", function() {
  $("#image_upload").trigger("click");
});

function addmoreImages() {
  $("#image_upload").trigger("click");
}

function pscloseImgBtn(id) {
  intId--;

  var idm = "#img_ps_r" + id;
  $(idm).remove();
  $("#input" + id).remove();
  if (intId == 0) {
    $("#dynamicForms").html(pstPhotoDiv);
  }

  //  $( "#dynamic" ).hide("slow");
}

function isValidUrl(url) {
  var myVariable = url;
  if (
    /^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test(
      myVariable
    )
  ) {
    return true;
  } else {
    return false;
  }
}

function videoType(test_url) {
  var testLoc = document.createElement("a");
  testLoc.href = test_url.toLowerCase();
  url = testLoc.hostname;
  var what;
  if (url.indexOf("youtube.com") !== -1) {
    what = "Youtube";
  } else if (url.indexOf("vimeo.com") !== -1) {
    what = "Vimeo";
  } else if (url.indexOf("youtu.be") !== -1) {
    what = "youtu.be";
  } else {
    what = "None";
  }
  return what;
}

function AnEventHasOccurred() {
  $("#dynamicBtnSubmitForm").attr("disabled", true);

  var url = $("#urlpstNew")
    .val()
    .trim();
  //https://youtu.be/xc4vZmGbSus

  var check = isValidUrl(url);
  if (check) {
    $("#urlpstNew").attr("disabled", true);

    var type_of_link = videoType(url);

    if (type_of_link == "Youtube" || type_of_link == "youtu.be") {
      var str = url;
      var video_link;
      if (type_of_link == "Youtube") {
        var res = str.split("=");
        video_link = res[1];
      } else {
        var res = str.split("/");
        video_link = res[3];
      }

      var myUrl =
        "https://www.googleapis.com/youtube/v3/videos?id=" +
        video_link +
        "&key=AIzaSyDzBardh6FzQVUv661YsFCYbYA4CPKO_Xo&part=snippet";
      //  But if you make it from a browser, then it will work without problem ...

      // However to make it work, we are going to use the cors-anywhere free service to bypass this
      var proxy = "https://cors-anywhere.herokuapp.com/";
      $.ajax({
        // The proxy url expects as first URL parameter the URL to be bypassed
        // https://cors-anywhere.herokuapp.com/{my-url-to-bypass}
        dataType: "json",
        url: myUrl,
        complete: function(data) {
          var img;
          var title = data.responseJSON.items[0].snippet.title;
          var desc = data.responseJSON.items[0].snippet.description;

          if (
            data.responseJSON.items[0].snippet.thumbnails.standard.url !=
            undefined
          ) {
            img = data.responseJSON.items[0].snippet.thumbnails.standard.url;
          } else {
            img = data.responseJSON.items[0].snippet.thumbnails.default.url;
          }

          var title1 = title.replace(/\"/g, "");
          var desc_og1 = desc.replace(/\"/g, "");

          var input_data_desc =
            '<input type="hidden" class="input_url_hidden"  name="url_desc"   value="' +
            desc_og1 +
            '" />';
          var input_data_title =
            '<input type="hidden" class="input_url_hidden"  name="url_title"   value="' +
            title1 +
            '" />';
          var input_data_image =
            '<input type="hidden" class="input_url_hidden"  name="url_image"   value="' +
            img +
            '" />';
          var input_data_url =
            '<input type="hidden" class="input_url_hidden"  name="url_post_url"   value="' +
            url +
            '" />';
          $("#url_type").val("youtube");

          $("#refinned").prepend(input_data_desc);
          $("#refinned").prepend(input_data_title);
          $("#refinned").prepend(input_data_image);
          $("#refinned").prepend(input_data_url);

          var it = dispalyLinkInfo(img, title);
          $("#divForImgAndUrl").html(it);
          //$("#divForImgAndUrl").hide();
          $("#urlpstNew").removeAttr("disabled");
          $("#dynamicBtnSubmitForm").removeAttr("disabled");
        }
      });
    } else if (type_of_link == "Vimeo") {
      // piaj
    } else if (type_of_link == "None") {
      var myUrl = url;
      //  But if you make it from a browser, then it will work without problem ...

      // However to make it work, we are going to use the cors-anywhere free service to bypass this
      var proxy = "https://cors-anywhere.herokuapp.com/";

      $.ajax({
        // The proxy url expects as first URL parameter the URL to be bypassed
        // https://cors-anywhere.herokuapp.com/{my-url-to-bypass}
        url: proxy + myUrl,
        complete: function(data) {
          var desc = $(data.responseText)
            .filter("meta[name=description]")
            .attr("content");
          var desc_og = $(data.responseText)
            .filter('meta[property="og:description"]')
            .attr("content");
          var desc_image = $(data.responseText)
            .filter('meta[property="og:image"]')
            .attr("content");

          var title = $(data.responseText)
            .filter("title")
            .text();
          // console.log(data.responseText);
          //
          // console.log(title);
          // console.log(desc_og);
          // console.log(desc_image);

          var title1 = title.replace(/\"/g, "");
          var desc_og1 = desc_og.replace(/\"/g, "");

          var input_data_desc =
            '<input type="hidden" class="input_url_hidden"  name="url_desc"   value="' +
            desc_og1 +
            '" />';
          var input_data_title =
            '<input type="hidden" class="input_url_hidden"  name="url_title"   value="' +
            title1 +
            '" />';
          var input_data_image =
            '<input type="hidden" class="input_url_hidden"  name="url_image"   value="' +
            desc_image +
            '" />';
          var input_data_url =
            '<input type="hidden" class="input_url_hidden"  name="url_post_url"   value="' +
            myUrl +
            '" />';
          $("#url_type").val("url");

          $("#refinned").prepend(input_data_desc);
          $("#refinned").prepend(input_data_title);
          $("#refinned").prepend(input_data_image);
          $("#refinned").prepend(input_data_url);

          var it = dispalyLinkInfo(desc_image, title);
          $("#divForImgAndUrl").html(it);

          $("#urlpstNew").removeAttr("disabled");
          $("#dynamicBtnSubmitForm").removeAttr("disabled");
        }
      });
    }
  } else {
    /// do normal
  }
}

$("#urlpstNew").on("keyup", function(e) {});

function loop() {
  var tex = $("#urlpstNew").val();

  if (tex != undefined) {
    if (tex.trim()) {
      AnEventHasOccurred();
    }
  }
}

setInterval(loop, 500);

function pst_btn_close_link() {
  $("#urlpstNew").val("");
  $("#pst_link_div").remove();
  loadPstView("link");
}

$("#dynamicBtnSubmitForm").on("click", function() {
  var category = $("#fetch_community_joined_option").val();
  if (category == "0") {
    var error = msgAlert("danger", "Please select community & try again");
    $(".mderrorDisplay").html(error);
  } else {
    var input_data =
      '<input type="hidden" class="input_images_hidden"  name="community"   value="' +
      category +
      '" />';

    $("#refinned").prepend(input_data);

    if (
      $("#imageCaption")
        .val()
        .trim()
    ) {
      var caption = $("#imageCaption")
        .val()
        .trim();
      var input_data =
        '<input type="hidden" class="input_images_hidden"  name="dynamicTitle"   value="' +
        caption +
        '" />';
      $("#refinned").prepend(input_data);
    }
    $("#refinned").trigger("submit");
  }
});

$("#dynamicBtnSubmitForm2").on("click", function() {
  var iframeContent = $("#rawdewIframe").val();
  // console.log(iframeContent);
  var textContent = iframeContent;

  var category = $("#fetch_community_joined_option2").val();
  if (category == "0") {
    var error = msgAlert("danger", "Please select community & try again");
    $(".mderrorDisplay").html(error);
  } else {
    var input_data =
      '<input type="hidden" class="input_images_hidden"  name="community"   value="' +
      category +
      '" />';

    $("#refinned").prepend(input_data);

    if (textContent.trim()) {
      var input_data =
        ' <textarea style="display: none;" class="input_images_hidden"  name="dynamicContent">' +
        textContent +
        "</textarea>";

      $("#refinned").prepend(input_data);
      if (
        $("#dynamicTitleNew")
          .val()
          .trim()
      ) {
        var caption = $("#dynamicTitleNew")
          .val()
          .trim();
        var input_data =
          '<input type="hidden" class="input_images_hidden"  name="dynamicTitle"   value="' +
          caption +
          '" />';
        $("#refinned").prepend(input_data);
        $("#refinned").trigger("submit");
      } else {
        var error = msgAlert("danger", "Please enter your title & try again");
        $(".mderrorDisplay").html(error);
      }
    } else {
      var error = msgAlert("danger", "Please enter your text & try again");
      $(".mderrorDisplay").html(error);
    }
  }
});

// function dispalyLinkInfo(img, title, desc) {
//     var items = '<div class="card" style="width:100%">' +
//         '<img class="card-img-top img-fluid" src="' + img + '" alt="">' +
//         '<div class="card-body">' +
//         '<h4 class="card-title">' + title + '</h4>' +

//         '<button type="button" class="btn btn-danger" style="position: absolute; top:15px;"> <i class="fas fa-times-circle"></i> </button>' +
//         '</div></div>';

//     return items;
// }

function dispalyLinkInfo(img, title, desc) {
  var items =
    '<div class="card" style="width:100%" id="pst_link_div">' +
    '<img class="card-img-top img-fluid" src="' +
    img +
    '" alt="">' +
    '<div class="card-body">' +
    '<h4 class="card-title">' +
    title +
    "</h4>" +
    '<button onclick="pst_btn_close_link()" type="button" class="btn btn-danger" style="position: absolute; top:15px;"> <i class="fas fa-times-circle"></i> </button>' +
    "</div></div>";

  return items;
}

$("#refinned").submit(function(event) {
  event.preventDefault();

  disabledBtn("posting...", "dynamicBtnSubmitForm");
  disabledBtn("posting...", "dynamicBtnSubmitForm2");
  var values = $("#refinned").serialize();
  //   console.log("----------------------------------");
  //   $('#refinned > input,#refinned > textarea').each(function(index) {
  //       console.log($(this).attr('name') + " = " + $(this).val());
  //   });
  //   console.log("----------------------------------");
  $.ajax({
    url: "/api/user_post",
    type: "POST",
    data: values,
    success: function(response) {
      console.log(response);

      var data = JSON.parse(response);
      enableBtn(
        '<i class="fas fa-plus-circle"></i> Post',
        "dynamicBtnSubmitForm"
      );
      //console.log(response);
      if (data.Ok) {
        //  $("#postDispalay").html("");
        //  $("#ps-title-desc").html("");

        $(".input_images_hidden").remove();
        $(".input_url_hidden").remove();
        $("#post_wrapper_div").html("");
        $("#dismisePstCustomModal").trigger("click");
        $("#dismisePstCustom2Modal").trigger("click");
        // location.reload();
        toastMessage("Success", "Post was successful", "success", "slide");

        window.location.replace("/r/new");
      } else {
        toastMessage("Error", "Post  was  not successful", "error", "slide");
      }
      // you will get response from your php page (what you echo or print)
    },
    error: function(jqXHR, textStatus, errorThrown) {
      // console.log(textStatus, errorThrown);
    }
  });
  return false;
});

var intId = 0;

function handleFileSelect(evt) {
  var files = evt.target.files; // FileList object

  // Loop through the FileList and render image files as thumbnails.
  for (var i = 0, f; (f = files[i]); i++) {
    // Only process image files.
    if (!f.type.match("image.*")) {
      continue;
    }

    var reader = new FileReader();

    // Closure to capture the file information.
    reader.onload = (function(theFile) {
      return function(e) {
        intId++;

        // Render thumbnail.
        // var span = document.createElement('span');
        // span.innerHTML = ['<img class="thumb" src="', e.target.result,
        //                   '" title="', escape(theFile.name), '"/>'].join('');
        // document.getElementById('list').insertBefore(span, null);
        var img =
          '<div class="img_image_wrapper ' +
          intId +
          '" id="img_ps_r' +
          intId +
          '"><img src="' +
          e.target.result +
          '"  class="img-fluid" style=""> ' +
          '<button type="button" id="' +
          intId +
          '" onclick="pscloseImgBtn(this.id)" class="pscloseImgBtn"> <i class="fas fa-times-circle"></i> </button>' +
          "</div>"; //Equivalent: $(document.createElement('img'))
        var input_data =
          '<input type="hidden" class="input_images_hidden"  name="images[]"  id="input' +
          intId +
          '" value="' +
          e.target.result +
          '" />';
        var addmoreBtn =
          '<button class="btn btn-link" onclick="addmoreImages()"  style="color: "><i class="fas fa-camera" style=""></i> Add more photos</button>';

        $("#postDispalayNew").append(img);
        $("#refinned").prepend(input_data);
        $("#divForImgAndGif").remove();
        $("#postDispalayNewAddmoreImage").html(addmoreBtn);

        //  $( "#ps-title-desc" ).css( "border-bottom", "none" );
        //$( "#ps-title-desc" ).css( "border-radius", "4px 4px 0 0" );
      };
    })(f);

    // Read in the image file as a data URL.
    reader.readAsDataURL(f);
  }
  $("#url_type").val("photo");
}

document
  .getElementById("image_upload")
  .addEventListener("change", handleFileSelect, false);
