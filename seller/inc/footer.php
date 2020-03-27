</div>
<div class="app-wrapper-footer">
    <div class="app-footer">
        <div class="">
            <div class="app-footer__inner">
                <div class="app-footer-left">
                    <div class="footer-dots">
                        <div class="" style="font-size: 11px; color: #999999;">Copyright © <?php echo date('Y'); ?> OJARH.com - All rights
                            reserved. </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

<!-- dispute form -->
<div class="modal fade" id="disputeform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form action="../api/controllers/dispute_resolution.php" method="POST" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dispute Resolution Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="mb-0 text-danger">Please be careful of the report you provide. If information are found false, it might result to total ban/blacklisting on this platform.</p>
                <hr>
                <div class="position-relative form-group">
                  <label class="mb-0">List of customers:</label>
                  <select class="form-control planner" name="customerid" id="customerid" required>
                    <option value="Basic">Basic</option>
                    <option value="Premium">Premium</option>
                  </select>
                </div>
                <div class="position-relative form-group">
                  <label class="mb-0">Subject:</label>
                  <input class="form-control" id="subject" name="subject" required>
                </div>
                <div class="position-relative form-group">
                  <label class="mb-0">Priority</label>
                  <select class="form-control planner" name="priority" id="priority" required>
                    <option value="Low">Low</option>
                    <option value="Medium">Medium</option>
                    <option value="High">High</option>
                  </select>
                </div>
                <div class="position-relative form-group">
                    <label for="product_description">Details of complaint</label>
                    <textarea class="form-control" name="details_priority" id="details_priority" rows="5" required></textarea>
                </div>
                <div class="divider"></div>
                <div class="position-relative form-group">
                  <label for="exampleEmail4">Upload case image or file if theres any. </label>
                  <input type="file" name="file" id="file" class="form-control col-md-11">
                </div>
            </div>
            <div class="modal-footer">
                <div class="text-center" id="info"></div>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger btn-sm" id="disputeBtn">Make Report</button>
            </div>
        </div>
      </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Account Upgrades</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="mb-0">By upgrading my account, i hereby agree to the terms and conditions as stated on this platform.</p>
                <div class="divider"></div>
                <label class="mb-1">Select plan:</label>
                <select class="form-control planner" name="plan" id="plan">
                  <option value="Basic">Basic</option>
                  <option value="Premium">Premium</option>
                </select>
                <div class="divider"></div>
                <label class="mb-1">Select duration:</label>
                <select class="form-control planner" name="durate" id="durate">
                  <option value="1">1-month</option>
                  <option value="6">6-months</option>
                  <option value="12">12-months</option>
                </select>
            </div>
            <div class="modal-footer">
                <div class="text-center" id="mess"></div>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger btn-sm" id="upgradeBtn" onclick="payWithPaystack('<?php echo $_SESSION['userid']; ?>', '<?php echo $userDetails->email; ?>', '<?php echo $userDetails->fname; ?>', '<?php echo $userDetails->lname; ?>',  '<?php echo $userDetails->phone; ?>', '<?php echo $acctType->account_type; ?>')">Request upgrade</button>
                <script src="https://js.paystack.co/v1/inline.js"></script>
            </div>
        </div>
    </div>
</div>

<!-- <div class="modal fade" id="disputeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div> -->


<div class="modal fade" id="disputeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="recipient-name" class="col-form-label">Complainant:</label>
          <input type="text" class="form-control" id="senderusername" value="" readonly>
        </div>
        <div class="form-group">
          <label for="recipient-name" class="col-form-label">Against:</label>
          <input type="text" class="form-control" id="againstusername" value="" readonly>
        </div>
        <div class="form-group">
          <label for="message-text" class="col-form-label">Message:</label>
          <textarea class="form-control" id="dispute_message" value=""></textarea>
        </div>
      </div>
      <input type="hidden" class="form-control" id="disputeid" value="">
      <input type="hidden" class="form-control" id="senderid" value="">
      <input type="hidden" class="form-control" id="againstid" value="">
      <div id="disputer_result"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="disputeResponseBtn">Send Message</button>
      </div>
    </div>
  </div>
</div>

<div class="app-drawer-overlay d-none animated fadeIn"></div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>
<script>
    var editor = null;
    ClassicEditor.create(document.querySelector("#editor"), {
        toolbar: [
            "bold",
            "italic",
            "link",
            "bulletedList",
            "numberedList",
            "blockQuote",
            "undo",
            "redo"
        ]
    })
            .then(editor => {
        //debugger;
        window.editor = editor;
    })
    .catch(error => {
        console.error(error);
    });

</script>
<script type="text/javascript">

  function replyDispute(disputeid, senderid, againstid, recipientname){
    var fields = recipientname.split('-');
    var senderusername = fields[0];
    var againstusername = fields[1];
    document.getElementById("againstusername").value = againstusername;
    document.getElementById("senderusername").value = senderusername;
    document.getElementById("disputeid").value = disputeid;
    document.getElementById("senderid").value = senderid;
    document.getElementById("againstid").value = againstid;
    document.getElementById("exampleModalLabel").innerHTML = "RE: Dispute Between " + senderusername + " &amp; " + againstusername;
    $('#disputeModal').modal('show');
  }

  function payWithPaystack(userid, useremail, fname, lname, fone, readyPlan){

    var planner = $('#plan').val();
    var durate = $('#durate').val();

    // alert(readyPlan + ' ' + planner);
    // return;

    if(planner == readyPlan){
      console.log('You are already on this plan!');
      document.getElementById('mess').innerHTML = "<span class='alert alert-warning alert-sm' style='font-size: 12px;'>You are already on this plan!</span>";
      setTimeout(function () {
        $('#mess').fadeOut();
      }, 4000);
      return;
    }

    if(planner == 'Basic'){
      var amountToPay = 200000;
    }else if(planner == 'Premium'){
      var amountToPay = 400000;
    }

    if(durate == 1){
      var amountToPay = amountToPay*1;
    }else if(durate == 6){
      var amountToPay = amountToPay*6;
    }else if(durate == 12){
      var amountToPay = amountToPay*12;
    }

    var handler = PaystackPop.setup({
      key: 'pk_test_7974282ff9c7f73d5afc1a79fd11746cba653e28',
      first_name: fname,
      last_name: lname,
      email: useremail,
      amount: amountToPay,
      currency: "NGN",
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: fone
            }
         ]
      },
      callback: function(response){
           // alert('success. transaction ref is ' + response.message);
           // alert(response.status);
           // return;
          if(response.status == 'success'){
            submitUpgrade(userid, useremail);
          }else{
            alert('Error:' + response.message)
          }
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  }

  function submitUpgrade(userid, useremail){
    document.getElementById('upgradeBtn').innerHTML = "Please wait...";
    document.getElementById('upgradeBtn').disabled = true;

    var plan = $('#plan').val();
    var durate = $('#durate').val();

    $.ajax({
        type: 'POST',
        url: '../api/controllers/upgrade_account.php',
        data: {
          plan : plan,
          durate : durate,
          userid : userid,
          useremail : useremail
        },
        cache: false,
        dataType: 'text',
        success: function (response) {
          // alert(response);
          // return;
          if(response == 'success'){
            document.getElementById('upgradeBtn').innerHTML = "Reloading...";
            document.getElementById('upgradeBtn').disabled = true;
            document.getElementById('mess').innerHTML = "<span class='alert alert-success alert-sm' style='font-size: 12px;'>Account upgrade successful.</span>";
            setTimeout(function () {
              window.location.reload();
            }, 3000);
          }else if(response='already'){
            document.getElementById('upgradeBtn').innerHTML = "Request upgrade";
            document.getElementById('upgradeBtn').disabled = false;
            console.log(response);
            document.getElementById('mess').innerHTML = "<span class='alert alert-danger alert-sm' style='font-size: 12px;'>Account already on the plan!</span>";
            setTimeout(function () {
              $('#mess').fadeOut();
            }, 2000);
          }else{
            document.getElementById('upgradeBtn').innerHTML = "Request upgrade";
            document.getElementById('upgradeBtn').disabled = false;
            console.log(response);
            document.getElementById('mess').innerHTML = "<span class='alert alert-danger alert-sm' style='font-size: 12px;'>Account upgrade not successful, try again!</span>";
            setTimeout(function () {
              $('#mess').fadeOut();
            }, 2000);
          }
        }
    });
    event.preventDefault();
  }

    $(document).ready(function () {

      $("#disputeResponseBtn").on('click',(function(e){
        document.getElementById('disputeResponseBtn').innerHTML = "Please wait...";
        document.getElementById('disputeResponseBtn').disabled = true;
        document.getElementById('disputer_result').innerHTML = '';

        if($('#dispute_message').val() != ''){
          $.ajax({
                type: 'POST',
                url: '../api/controllers/dispute_response_user.php',
                data: {
                  senderusername : $('#senderusername').val(),
                  againstusername : $('#againstusername').val(),
                  dispute_message : $('#dispute_message').val(),
                  disputeid : $('#disputeid').val(),
                  senderid : $('#senderid').val(),
                  againstid : $('#againstid').val()
                },
                cache: false,
                dataType: 'text',
                success: function (response) {
                  console.log(response);
                    if(response == 'success'){
                      document.getElementById('disputeResponseBtn').innerHTML = "Success";
                      document.getElementById('disputeResponseBtn').disabled = true;
                      document.getElementById('disputer_result').innerHTML = '<p class="alert alert-success">Dispute responded to and waiting for confirmation!</p>';
                      setTimeout(function () {
                          window.location.reload();
                      }, 3000);
                    }
                    else if(response == 'exist'){
                      document.getElementById('disputeResponseBtn').innerHTML = "Send Message";
                      document.getElementById('disputeResponseBtn').disabled = false;
                      document.getElementById('disputer_result').innerHTML = '<p class="alert alert-danger">You have submitted this request, our admin is currently investigating, please wait!</p>';
                      setTimeout(function () {
                        $('#disputeModal').modal('dispose');
                        $('#disputer_result').fadeOut();
                      }, 5000);
                    }else{
                        document.getElementById('disputeResponseBtn').innerHTML = "Send Message";
                        document.getElementById('disputeResponseBtn').disabled = false;
                        document.getElementById('disputer_result').innerHTML = '<p class="alert alert-warning">' + response + '</p>';
                        setTimeout(function () {
                          $('#disputeModal').modal('dispose');
                          $('#disputer_result').fadeOut();
                        }, 4000);
                    }
                }
            });
            event.preventDefault();
        }else{
            document.getElementById('disputeResponseBtn').innerHTML = "Send Message";
            document.getElementById('disputeResponseBtn').disabled = false;
            document.getElementById('disputer_result').innerHTML = '<p class="alert alert-danger">State your response to the complaint or request.</p>';
            setTimeout(function () {
                $('#disputer_result').fadeOut();
            }, 4000);
        }
      }));

        $('#logoutBtn').on('click', function(){
            window.location = '../api/controllers/logout.php';
        });

        $('#profileSet').on('click', function () {
            $('#pfBody').show();
            $('#rpBody').hide();
            $('#dBody').hide();
            $('#tdBody').hide();
            $('#storepicture').hide();
            $('#storevideo').hide();
        });

        $('#returnPolicy').on('click', function () {
            $('#pfBody').hide();
            $('#rpBody').show();
            $('#dBody').hide();
            $('#tdBody').hide();
            $('#storepicture').hide();
            $('#storevideo').hide();
        });

        $('#disclaimer').on('click', function () {
            $('#pfBody').hide();
            $('#rpBody').hide();
            $('#dBody').show();
            $('#tdBody').hide();
            $('#storepicture').hide();
            $('#storevideo').hide();
        });

        $('#timeDelivery').on('click', function () {
            $('#pfBody').hide();
            $('#rpBody').hide();
            $('#dBody').hide();
            $('#tdBody').show();
            $('#storepicture').hide();
            $('#storevideo').hide();
        });

        $('#timeDelivery').on('click', function () {
            $('#pfBody').hide();
            $('#rpBody').hide();
            $('#dBody').hide();
            $('#tdBody').show();
            $('#storepicture').hide();
            $('#storevideo').hide();
        });

        $('#storepic').on('click', function () {
            $('#pfBody').hide();
            $('#rpBody').hide();
            $('#dBody').hide();
            $('#tdBody').hide();
            $('#storepicture').show();
            $('#storevideo').hide();
        });

        $('#storevid').on('click', function () {
            $('#pfBody').hide();
            $('#rpBody').hide();
            $('#dBody').hide();
            $('#tdBody').hide();
            $('#storepicture').hide();
            $('#storevideo').show();
        });

        $('.carousel.carousel-multi-item.v-2 .carousel-item').each(function () {
            var next = $(this).next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));

            for (var i = 0; i < 4; i++) {
                next = next.next();
                if (!next.length) {
                    next = $(this).siblings(':first');
                }
                next.children(':first-child').clone().appendTo($(this));
            }
        });

        $("#catBtn").on('click',(function(e){
          document.getElementById('catBtn').innerHTML = "Please wait...";
          document.getElementById('catBtn').disabled = true;
          var catData = {
            catname : $("#catname").val(),
            catdescription : $("#catdescription").val()
          }
          $.ajax({
                  type: 'POST',
                  url: '../api/controllers/user_category.php',
                  data: catData,
                  cache: false,
                  dataType: 'text',
                  success: function (response) {
                      // alert(response);
                      // return;
                      if(response == 'success'){
                        document.getElementById('catBtn').innerHTML = "Create Category";
                        document.getElementById('catBtn').disabled = false;
                        document.getElementById('result').innerHTML = '<p class="alert alert-success">Category added!</p>';
                        window.location.reload();
                          return true;
                      }
                      else if(response == 'exist'){
                        document.getElementById('catBtn').innerHTML = "Create Category";
                        document.getElementById('catBtn').disabled = false;
                        document.getElementById('result').innerHTML = '<p class="alert alert-danger">Category exist!</p>';
                        return true;
                      }else{
                          document.getElementById('catBtn').innerHTML = "Create Category";
                          document.getElementById('catBtn').disabled = false;
                          document.getElementById('result').innerHTML = '<p class="alert alert-warning">' + response + '</p>';
                          return true;
                      }
                  }
              });
              event.preventDefault();
          }));

        var num = 1;
        var max_fields = 8;
        var wrapper = $("#container1");
        var add_button = $("#add");

        var x = 1;
        $(add_button).click(function(e) {
            e.preventDefault();
            if (x < max_fields) {
                var num = x++;
                $(wrapper).append('<div class="row"><div class="col-md-3"><div class="position-relative form-group"><label for="exampleEmail11" class="">Product pack</label><select class="form-control" id="product_pack'+num+'" name="product_pack'+num+'"><option value="">Choose...</option><option value="3">3</option><option value="5">5</option><option value="6">6</option><option value="9">9</option><option value="10">10</option><option value="12">12</option><option value="Pack">Pack</option><option value="Carton">Carton</option></select></div></div><div class="col-md-5"><div class="position-relative form-group"><label for="exampleEmail11" class="">Product Price</label><input name="product_price'+num+'" id="product_price'+num+'"  type="number" class="form-control" required></div></div><div class="col-md-3"><div class="position-relative form-group"><label for="exampleEmail11" class="">Discount(in %)</label><input id="product_discount'+num+'" name="product_discount'+num+'" type="number" class="form-control" value="0"></div></div><button class="btn btn-danger btn-sm btn-shadow delete mt-4 mb-5"><i class="fa fa-times"></i></button></div>'); //add input box
            } else {
                alert('You Reached the limits');
            }
        });

        $(wrapper).on("click", ".delete", function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        });


        var nums = 1;
        var max_fieldss = 7;
        var wrappers = $("#container2");
        var add_buttons = $("#addImgFile");

        var xx = 1;
        $(add_buttons).click(function(e) {
            e.preventDefault();
            if (xx < max_fieldss) {
                var nums = xx++;
                $(wrappers).append('<div class="row"><label for="exampleEmail4">More product images</label><input type="file" name="productimg'+nums+'" id="productimg'+nums+'" class="form-control col-md-11"><button class="btn btn-danger btn-sm btn-shadow deletes col-md-1" style=""><i class="fa fa-times"></i></button></div>');
            } else {
                alert('You cannot add more than 7 product picture.');
            }
        });

        $(wrappers).on("click", ".deletes", function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
            xx--;
        });

        var numss = 1;
        var max_fieldsss = 5;
        var wrapperss = $("#container3");
        var add_buttonss = $("#addImgFiles");

        var xxs = 1;
        $(add_buttonss).click(function(e) {
            e.preventDefault();
            if (xxs < max_fieldsss) {
                var numss = xxs++;
                $(wrapperss).append('<div class="row"><label for="exampleEmail4">More product images</label><input type="file" name="productimg'+numss+'" id="productimg'+numss+'" class="form-control col-md-11"><button class="btn btn-danger btn-sm btn-shadow deletes col-md-1" style=""><i class="fa fa-times"></i></button></div>');
            } else {
                alert('You cannot add more than 5 store picture.');
            }
        });

        $(wrapperss).on("click", ".deletes", function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
            xxs--;
        });
    });

// var num = 1;
// document.getElementById('add').addEventListener("click",addInput);

// function addInput(){
// var demo = document.getElementById('demo');
// demo.insertAdjacentHTML('beforeend','<div class="row"><div class="col-md-3"><div class="position-relative form-group"><label for="exampleEmail11" class="">Product pack</label><select class="form-control" id="product_pack['+num+']" name="product_pack['+num+']"><option value="3">3</option><option value="5">5</option><option value="6">6</option><option value="9">9</option><option value="10">10</option><option value="12">12</option><option value="Pack">Pack</option><option value="Carton">Carton</option></select></div></div><div class="col-md-5"><div class="position-relative form-group"><label for="exampleEmail11" class="">Product Price</label><input name="product_price['+num+']" id="product_price['+num+']"  type="number" class="form-control"></div></div><div class="col-md-3"><div class="position-relative form-group"><label for="exampleEmail11" class="">Discount(in %)</label><input id="product_discount['+num+']" name="product_discount['+num+']" type="number" class="form-control"></div></div><div class="col-md-1" style="padding-top: 34px;"><a href="#" class="delete"><button class="btn btn-danger btn-sm btn-shadow"><i class="fa fa-times"></i></button></a></div></div>');
//  num++;
// }



</script>
</body>

</html>