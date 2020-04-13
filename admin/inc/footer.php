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
<script type="text/javascript">

	function validate(productid) {
		if (document.getElementById('productSetting').checked) {
			$.ajax({
				type: 'POST',
				url: '../api/controllers/updateProductSettings.php',
				data: {
					productid : productid,
					productsetting : 1
				},
				cache: false,
				dataType: 'text',
				success: function (response) {
					if(response == 'success'){
						document.getElementById('result').innerHTML = '<p class="alert alert-success">Product setting updated!</p>';
						setTimeout(function () {
							window.location.reload();
						}, 3000);
						return;
					}else{
						document.getElementById('result').innerHTML = '<p class="alert alert-warning">' + response + '</p>';
						setTimeout(function () {
							window.location.reload();
						}, 3000);
						return;
					}
				}
			});
			event.preventDefault();
		} else {
			$.ajax({
				type: 'POST',
				url: '../api/controllers/updateProductSettings.php',
				data: {
					productid : productid,
					productsetting : 0
				},
				cache: false,
				dataType: 'text',
				success: function (response) {
					if(response == 'success'){
						document.getElementById('result').innerHTML = '<p class="alert alert-success">Product setting updated!</p>';
						setTimeout(function () {
							window.location.reload();
						}, 3000);
						return;

					}else{
						document.getElementById('result').innerHTML = '<p class="alert alert-warning">' + response + '</p>';
						setTimeout(function () {
							window.location.reload();
						}, 3000);
						return;
					}
				}
			});
			event.preventDefault();
		}
	}

	function replySender(disputeid, senderid, againstid, recipientname){
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

	function replyAgainst(disputeid, senderid, againstid, recipientname){
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

	function resolvedDispute(disputeid, senderid, againstid){
		$.ajax({
			type: 'POST',
			url: '../api/controllers/dispute_resolved.php',
			data: {
				disputeid : disputeid,
				senderid : senderid,
				againstid : againstid
			},
			cache: false,
			dataType: 'text',
			success: function (response) {
            // alert(response);
            // return;
            if(response == 'success'){
            	document.getElementById('result').innerHTML = '<p class="alert alert-success">Dispute resolved!</p>';
            	setTimeout(function () {
            		window.location.reload();
            	}, 3000);
            	return;
            }else{
            	document.getElementById('result').innerHTML = '<p class="alert alert-warning">' + response + '</p>';
            	setTimeout(function () {
            		window.location.reload();
            	}, 3000);
            	return;
            }
          }
        });
		event.preventDefault();
	}


	$(".settingsUpdater").click(function(){
		var column = $(this).attr("data-column");
		var input = $(this).attr("data-input");
		var output = $(this).attr("data-output");
		var type = $(this).attr("data-type");

		$.ajax({
      		type: 'POST',
      		url: '../api/controllers/updateSettings.php',
      		data: {
      			column: column,
      			value: $(input).val()
      		},
      		cache: false,
      		dataType: 'text',
      		success: function (response) {
              // return;
              document.getElementById('result').innerHTML = response;
              if(type)
              {
              	$(output).attr(type, $(input).val());
              }
            }
          });
      	event.preventDefault();
	})


	$('#finalNextBtn').on('click', function () {
		document.getElementById('mess3').innerHTML = '';
		$('#finalNextBtn').hide();
		$('#loaders2').show();

		var state = $('#statelocal').val();
		var country = $('#countrylocal').val();

		let data2 = {
			fname : $('#fname').val(),
			lname : $('#lname').val(),
			phone : $('#phone').val(),
			state : state,
			country : country,
			address : $('#address').val()
		}

		if(!validatePhone(data2.phone)){
			document.getElementById('mess3').innerHTML = 'Phone number not properly formatted.';
			$('#finalNextBtn').show();
			$('#loaders2').hide();
			return false;
		}

		if(data2.fname !== '' || data2.lname!=='' || data2.phone!=='' || data2.country !=='' || data2.state !== '' || data2.address!==''){
			$.ajax({
				type: 'POST',
				url: '../api/controllers/create_user.php',
				data: {
					role : $('#role').val(),
					username : $('#username').val(),
					email: $('#email').val(),
					password : $('#password').val(),
					fname : $('#fname').val(),
					lname : $('#lname').val(),
					phone : $('#phone').val(),
					state : state,
					country : country,
					address : $('#address').val()
				},
				cache: false,
				dataType: 'text',
				success: function(response) {
					console.log(response);
          // return;
          if(response == "username"){
          	document.getElementById('mess3').innerHTML = 'Username taken!';
          	$('#finalNextBtn').show();
          	$('#loaders2').hide();
          	return;
          }else if(response == "email"){
          	document.getElementById('mess3').innerHTML = 'Email already in use!';
          	$('#finalNextBtn').show();
          	$('#loaders2').hide();
          	return;
          }else if(response == "success"){
          	document.getElementById('finalNextBtn').innerHTML = 'Redirecting...';
          	document.getElementById('mess3').innerHTML = 'Success. Redirecting...';
          	setTimeout(function () {
          		window.location = 'administrators.php?result=Admin Account Created!';
          	}, 3000);
          	return;
          }else{
          	document.getElementById('mess3').innerHTML = response;
          	$('#finalNextBtn').show();
          	$('#loaders2').hide();
          	return;
          }

        }
      });
			event.preventDefault();
		}else{
			document.getElementById('mess3').innerHTML = 'Field(s) empty!';
			$('#finalNextBtn').show();
			$('#loaders2').hide();
		}
	});

	function validateEmail(email) {
		var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		return re.test(email);
	}

	function validatePhone(phone) {
		var re = /^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]*$/g;
		return re.test(phone);
	}

	$(document).ready(function () {

		$('#logoutBtn').on('click', function(){
			window.location = '../api/controllers/logout.php';
		});

		$("#disputeResponseBtn").on('click',(function(e){
			document.getElementById('disputeResponseBtn').innerHTML = "Please wait...";
			document.getElementById('disputeResponseBtn').disabled = true;
			document.getElementById('disputer_result').innerHTML = '';

			if($('#dispute_message').val() != ''){
				$.ajax({
					type: 'POST',
					url: '../api/controllers/dispute_response.php',
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


		$("#catBtn").on('click',(function(e){
			document.getElementById('catBtn').innerHTML = "Please wait...";
			document.getElementById('catBtn').disabled = true;
			var catData = {
				catname : $("#catname").val(),
				catdescription : $("#catdescription").val()
			}
			$.ajax({
				type: 'POST',
				url: '../api/controllers/category_add.php',
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

	});

      function activateSeller(userid, userType="Seller"){
      	$.ajax({
      		type: 'POST',
      		url: '../api/controllers/activate_seller.php',
      		data: {
      			userid : userid
      		},
      		cache: false,
      		dataType: 'text',
      		success: function (response) {
              // alert(response);
              // return;
              if(response == 'success'){
              	document.getElementById('result').innerHTML = '<p class="alert alert-success">' + userType + ' approved!</p>';
              	setTimeout(function () {
              		window.location.reload();
              	}, 3000);
              	return;
              }else{
              	document.getElementById('result').innerHTML = '<p class="alert alert-warning">' + response + '</p>';
              	setTimeout(function () {
              		window.location.reload();
              	}, 3000);
              	return;
              }
            }
          });
      	event.preventDefault();
      }

      function deactivateSeller(userid, userType="Seller"){
      	$.ajax({
      		type: 'POST',
      		url: '../api/controllers/deactivate_seller.php',
      		data: {
      			userid : userid
      		},
      		cache: false,
      		dataType: 'text',
      		success: function (response) {
              // alert(response);
              // return;
              if(response == 'success'){
              	document.getElementById('result').innerHTML = '<p class="alert alert-danger">' + userType + ' Disapproved!</p>';
              	setTimeout(function () {
              		window.location.reload();
              	}, 3000);
              	return;
              }else{
              	document.getElementById('result').innerHTML = '<p class="alert alert-warning">' + response + '</p>';
              	setTimeout(function () {
              		window.location.reload();
              	}, 3000);
              	return;
              }
            }
          });
      	event.preventDefault();
      }

      function activateProduct(productid, sellerid){
      	$.ajax({
      		type: 'POST',
      		url: '../api/controllers/activate_product.php',
      		data: {
      			productid : productid,
      			sellerid : sellerid
      		},
      		cache: false,
      		dataType: 'text',
      		success: function (response) {
      			console.log(response);
              // return;
              if(response == 'success'){
              	document.getElementById('result').innerHTML = '<p class="alert alert-success">Product Approved!</p>';
              	setTimeout(function () {
              		window.location.reload();
              	}, 3000);
              	return;
              }else{
              	document.getElementById('result').innerHTML = '<p class="alert alert-warning">' + response + '</p>';
              	setTimeout(function () {
              		window.location.reload();
              	}, 3000);
              	return;
              }
            }
          });
      	event.preventDefault();
      }

      function deactivateProduct(productid, sellerid){
      // alert(sellerid);
      // return;
      $.ajax({
      	type: 'POST',
      	url: '../api/controllers/deactivate_product.php',
      	data: {
      		productid : productid,
      		sellerid : sellerid
      	},
      	cache: false,
      	dataType: 'text',
      	success: function (response) {
              // alert(response);
              // return;
              if(response == 'success'){
              	document.getElementById('result').innerHTML = '<p class="alert alert-danger">Product Disapproved!</p>';
              	setTimeout(function () {
              		window.location.reload();
              	}, 3000);
              	return;
              }else{
              	document.getElementById('result').innerHTML = '<p class="alert alert-warning">' + response + '</p>';
              	setTimeout(function () {
              		window.location.reload();
              	}, 3000);
              	return;
              }
            }
          });
      event.preventDefault();
    }

    function activateAgent(agentid){
  // alert(agentid);
  // return;
  $.ajax({
  	type: 'POST',
  	url: '../api/controllers/activate_agent.php',
  	data: {
  		agentid : agentid
  	},
  	cache: false,
  	dataType: 'text',
  	success: function (response) {
          // alert(response);
          // return;
          if(response == 'success'){
          	document.getElementById('result').innerHTML = '<p class="alert alert-success">Agent Approved!</p>';
          	setTimeout(function () {
          		window.location.reload();
          	}, 3000);
          	return;
          }else{
          	document.getElementById('result').innerHTML = '<p class="alert alert-warning">' + response + '</p>';
          	setTimeout(function () {
          		window.location.reload();
          	}, 3000);
          	return;
          }
        }
      });
  event.preventDefault();
}

function deactivateAgent(agentid){
  // alert(agentid);
  // return;
  $.ajax({
  	type: 'POST',
  	url: '../api/controllers/deactivate_agent.php',
  	data: {
  		agentid : agentid
  	},
  	cache: false,
  	dataType: 'text',
  	success: function (response) {
          // alert(response);
          // return;
          if(response == 'success'){
          	document.getElementById('result').innerHTML = '<p class="alert alert-danger">Agent Disapproved!</p>';
          	setTimeout(function () {
          		window.location.reload();
          	}, 3000);
          	return;
          }else{
          	document.getElementById('result').innerHTML = '<p class="alert alert-warning">' + response + '</p>';
          	setTimeout(function () {
          		window.location.reload();
          	}, 3000);
          	return;
          }
        }
      });
  event.preventDefault();
}

function activateVerify(verifyid, userid){
  // alert(userid);
  // return;
  $.ajax({
  	type: 'POST',
  	url: '../api/controllers/activate_verify.php',
  	data: {
  		verifyid : verifyid,
  		userid : userid
  	},
  	cache: false,
  	dataType: 'text',
  	success: function (response) {
          // alert(response);
          // return;
          if(response == 'success'){
          	document.getElementById('result').innerHTML = '<p class="alert alert-success">Seller has been verified!</p>';
          	setTimeout(function () {
          		window.location.reload();
          	}, 3000);
          	return;
          }else{
          	document.getElementById('result').innerHTML = '<p class="alert alert-warning">' + response + '</p>';
          	setTimeout(function () {
          		window.location.reload();
          	}, 3000);
          	return;
          }
        }
      });
  event.preventDefault();
}

function deactivateVerify(verifyid, userid){
  // alert(userid);
  // return;
  $.ajax({
  	type: 'POST',
  	url: '../api/controllers/deactivate_verify.php',
  	data: {
  		verifyid : verifyid,
  		userid : userid
  	},
  	cache: false,
  	dataType: 'text',
  	success: function (response) {
          // alert(response);
          // return;
          if(response == 'success'){
          	document.getElementById('result').innerHTML = '<p class="alert alert-danger">Seller could not be verified!</p>';
          	setTimeout(function () {
          		window.location.reload();
          	}, 3000);
          	return;
          }else{
          	document.getElementById('result').innerHTML = '<p class="alert alert-warning">' + response + '</p>';
          	setTimeout(function () {
          		window.location.reload();
          	}, 3000);
          	return;
          }
        }
      });
  event.preventDefault();
}
</script>
</body>

</html>
