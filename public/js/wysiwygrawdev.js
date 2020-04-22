function loadRichEditor() {
  window.addEventListener("load", function () {

    var editor = rawdewIframe.document;
    editor.designMode = "on";

    $(".boldBtn").on("click", function() {
      editor.execCommand("Bold");
    });

    $(".italicBtn").on("click", function() {
      editor.execCommand("italic");
    });

    $(".strikethroughBtn").on("click", function() {
      editor.execCommand("strikethrough", false);
    });

    $(".listOlBtn").on("click", function() {
      editor.execCommand("insertOrderedList", false);
    });

    $(".alignCenter").on("click", function() {
      editor.execCommand("justifyCenter", false);
    });

    $(".alignLeft").on("click", function() {
      editor.execCommand("justifyLeft", false);
    });

    $(".alignRight").on("click", function() {
      editor.execCommand("justifyRight", false);
    });

    $(".alignJustify").on("click", function() {
      editor.execCommand("justifyFull", false);
    });

    $(".listUlBtn").on("click", function() {
      editor.execCommand("insertUnorderedList", false);
    });

    $(".headingBtn").on("click", function() {
      var sText = editor.getSelection();

     editor.execCommand('insertHTML', false, '<h1>' + sText + '</h1>');

    });

    $("#insertLink").on("click", function() {
      var url = $("#insertLinkData").val();
      var sText = editor.getSelection();

     editor.execCommand('insertHTML', false, '<a class="btn btn-link" href="' + url + '" target="_blank">' + sText + '</a>');

      $("#combakSearch").hide();
    });

    $("#insertLinkImg").on("click", function() {

      var url = $("#insertImgData").val();
      var img = '<img src=\"'+url+'\" class="img-fluid" />';
      editor.execCommand("insertHTML", false, img);
      $("#combakSearchImage").hide();
    });


  }, false);
}
loadRichEditor();
function showLinkBox() {
  $("#combakSearchImage").hide();
  $("#combakSearch").toggle( "fold");
}

function showImageBox() {
  $("#combakSearch").hide();
  $("#combakSearchImage").toggle( "fold");

}
