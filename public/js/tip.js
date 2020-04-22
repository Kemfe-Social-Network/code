function tipUSer() {
  var tip_amount = $("#tip_amount")
    .val()
    .trim();
  var post_a = $("#post_a")
    .val()
    .trim();
  var post_a_id = $("#post_a_id")
    .val()
    .trim();

  disabledBtn("", "tipUserBtn");
  var value = "amount=" + tip_amount + "";
  value += "&user=" + post_a + "";
  value += "&post=" + post_a_id + "";

  $.ajax({
    url: "/c/donate",
    type: "POST",
    data: value,
    success: function(response) {
      console.log(response);
      var data = JSON.parse(response);
      enableBtn('<i class="fas fa-arrow-right"></i> Send', "tipUserBtn");

      if (data.Ok) {
        toastMessage("Success", data.msg, "success", "slide");
        //location.reload(true);
        $(".tipUser_btn").trigger("click");
      } else {
        toastMessage("Error", data.error.msg, "error", "slide");
        $(".tipUser_btn").trigger("click");
      }
      // you will get response from your php page (what you echo or print)
    },
    error: function(jqXHR, textStatus, errorThrown) {}
  });
}
