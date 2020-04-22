<?php require_once 'public/layouts/community.php';
require_once 'public/layouts/modal.php';
require_once 'public/layouts/edit.php';
?>

<style>
  #mybutton {
    position: fixed;
    bottom: -4px;
    right: 10px;
    display: none;
  }

  @media screen and (max-width: 826px) {
    #mybutton {
      display: block !important;
    }

    .row {
      margin: 0 auto !important;
    }
  }
</style>

<div id="mybutton">

  <button style="padding: 10px;" class="btn btn-primary btn-block btn-sm" data-toggle="modal" data-target="#communityModal"> + Create Community</button>
</div>
<div id="image_combo"></div>
<script>
  // 	$( "#dropdownSelect" ).click(function(e) {
  //   	return false;
  // });
</script>
<script src="/public/js/avarta.js"></script>
<script>
  function fetch_community_site_wide_menu() {

    $.ajax({
      type: "GET",
      dataType: 'json',
      url: "/feed/fetch_community/50",
      complete: function(data) {
        console.log(data);
        var com = "";
        $.each(data.responseJSON, function(k, v) {
          com += '<a class="dropdown-item" href="/g/' + v.slug + '"> <img src="/public/images/community-images/' + v.img_url + '" width="22" height="22" alt="logo"> ' + v.name + '</a>';



        });

        $("#pour_community").html(com);
      }
    });
  }
  fetch_community_site_wide_menu();
</script>
<script src="/public/js/compose.js?v=<?php echo $version; ?>" charset="utf-8"></script>
</body>

</html>