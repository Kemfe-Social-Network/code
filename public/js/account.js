function claimit(params) {
  disabledBtn("", params);
  var rs = params.split("-");
  var value = "id=" + rs[0] + "";
  value += "&amount=" + rs[1] + "";
  $.ajax({
    url: "/account/claim",
    type: "POST",
    data: value,
    success: function(response) {
      var data = JSON.parse(response);
      enableBtn('<i class="fas fa-arrow-right"></i> Withdraw', "withdrawBTN");

      if (data.Ok) {
        toastMessage("Success", data.msg, "success", "slide");
        location.reload(true);
      } else {
        toastMessage("Error", data.error.msg, "error", "slide");
      }
      // you will get response from your php page (what you echo or print)
    },
    error: function(jqXHR, textStatus, errorThrown) {}
  });
}

function fetch_referral_by_user(page) {
  $.ajax({
    type: "GET",
    dataType: "json",
    url: "/account/fetch_referral/" + page + "",
    complete: function(data) {
      var txt = "";
      $.each(data.responseJSON, function(k, v) {
        txt +=
          "<tr>" +
          '<td data-th="Name">' +
          '<div class="row">' +
          '<div class="col-sm-12">' +
          '<h4 class="nomargin">' +
          v.name +
          "</h4>" +
          "</div>" +
          "</div>" +
          "</td>" +
          '<td data-th="Email">' +
          v.email +
          "</td>" +
          '<td data-th="Earned">' +
          v.earned +
          "</td>" +
          '<td data-th="Date" class="text-center">' +
          v.date +
          "</td>" +
          '<td class="actions" data-th="">' +
          v.status +
          "</td>" +
          "  </tr>";
      });

      $("#referral_table_data").html(txt);
    }
  });
}

function fetch_user_reward(page) {
  $.ajax({
    type: "GET",
    dataType: "json",
    url: "/account/get_user_rewards/" + page + "",
    complete: function(data) {
      var txt = "";
      $.each(data.responseJSON, function(k, v) {
        txt +=
          "<tr>" +
          '<td data-th="Name">' +
          '<div class="row">' +
          '<div class="col-sm-12">' +
          '<h4 class="nomargin">' +
          v.name +
          "</h4>" +
          "</div>" +
          "</div>" +
          "</td>" +
          '<td data-th="Source">' +
          v.type +
          "</td>" +
          '<td data-th="Amount">' +
          v.earn +
          "</td>" +
          '<td data-th="Date" class="text-center">' +
          v.date +
          "</td>" +
          '<td class="actions" data-th="Action">' +
          v.status +
          "</td>" +
          "  </tr>";
      });

      $("#reward_table_data").html(txt);
    }
  });
}

function fetch_withdrawal_by_user(page) {
  $.ajax({
    type: "GET",
    dataType: "json",
    url: "/account/fetch_withdrawal_by_user/" + page + "",
    complete: function(data) {
      var txt = "";
      $.each(data.responseJSON, function(k, v) {
        let fee = parseFloat(v.bank) * 0.05;
        let sent = parseFloat(v.bank) - fee;

        txt +=
          "<tr>" +
          '<td data-th="Name">' +
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
          '<td data-th="Receive Amount	">' +
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

function fetch_user_deposit(page) {
  $.ajax({
    type: "GET",
    dataType: "json",
    url: "/account/fetch_user_deposit/" + page + "",
    complete: function(data) {
      var txt = "";
      $.each(data.responseJSON, function(k, v) {
        txt +=
          "<tr>" +
          '<td data-th="Transaction ID">' +
          '<div class="row">' +
          '<div class="col-sm-12">' +
          '<input class="form-control" value="' +
          v.trans_id +
          '">' +
          "</div>" +
          "</div>" +
          "</td>" +
          '<td data-th="Reference">' +
          v.reference +
          "</td>" +
          '<td data-th="Amount">' +
          v.amount +
          "</td>" +
          '<td data-th="Date" class="text-center">' +
          v.date +
          "</td>" +
          '<td class="actions" data-th="">' +
          v.status +
          "</td>" +
          "  </tr>";
      });

      $("#user_deposit_table_data").html(txt);
    }
  });
}

function Withdraw() {
  // var bank = $("#bank")
  //   .val()
  //   .trim();
  var name = $("#name")
    .val()
    .trim();
  // var number = $("#number")
  //   .val()
  //   .trim();
  var amount = $("#amount")
    .val()
    .trim();

  disabledBtn("", "withdrawBTN");
  //var value = "bank=" + bank + "";
  var value = "&name=" + name + "";
  // value += "&number=" + number + "";
  value += "&amount=" + amount + "";

  $.ajax({
    url: "/account/user_withdraw",
    type: "POST",
    data: value,
    success: function(response) {
      var data = JSON.parse(response);
      enableBtn('<i class="fas fa-arrow-right"></i> Withdraw', "withdrawBTN");

      if (data.Ok) {
        toastMessage("Success", data.msg, "success", "slide");
        location.reload(true);
      } else {
        toastMessage("Error", data.error.msg, "error", "slide");
      }
      // you will get response from your php page (what you echo or print)
    },
    error: function(jqXHR, textStatus, errorThrown) {}
  });
}
fetch_user_reward(1);
fetch_referral_by_user(1);
fetch_user_deposit(1);
fetch_withdrawal_by_user(1);
