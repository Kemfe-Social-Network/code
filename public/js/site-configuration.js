function change_reward_point_value(id) {
  var type = $("#" + id + "_type").val();
  var point = $("#" + id + "_point").val();
  var value = "type=" + type + "&point=" + point;

  disabledBtn("", id);

  $.ajax({
    url: "/storekeeper/update_point",
    type: "POST",
    data: value,
    success: function(response) {
      var data = JSON.parse(response);

      enableBtn('<i class="fas fa-save"></i> save', id);

      if (data.Ok) {
        toastMessage("Success", "Done!", "success", "slide");
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

function fetch_withdrawal_by_admin(page) {
  $.ajax({
    type: "GET",
    dataType: "json",
    url: "/account/fetch_withdrawal_by_admin/" + page + "",
    complete: function(data) {
      var txt = "";
      $.each(data.responseJSON, function(k, v) {
        let fee = parseFloat(v.bank) * 0.05;
        let sent = parseFloat(v.bank) - fee;

        txt +=
          "<tr>" +
          '<td data-th="Wallet">' +
          '<div class="row">' +
          '<div class="col-sm-12">' +
          '<h4 class="nomargin">' +
          v.name +
          "</h4>" +
          "</div>" +
          "</div>" +
          "</td>" +
          '<td data-th="Amount">' +
          v.amount +
          "</td>" +
          '<td data-th="Fee">' +
          fee +
          " KFC</td>" +
          '<td data-th="Final Amount	">' +
          sent +
          " KFC</td>" +
          '<td data-th="Date" class="text-center">' +
          v.date +
          "</td>" +
          '<td class="actions" data-th="">' +
          v.status +
          "</td>" +
          "  </tr>";
      });

      $("#withdrawal_table_data").html(txt);
    }
  });
}

$(document).ready(function() {
  fetch_withdrawal_by_admin(1);
});
