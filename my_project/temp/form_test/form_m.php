<?php
?>
<!DOCTYPE html>
<html>

<head>
	<title>Submit Form Without Page Refresh Using Ajax</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>


	<style>
		body {
			width: 50%;
			margin: 0 auto;
		}

	    .swal-wide{
			width:250px  ;
		}

	</style>
</head>

<body>
	<button class="third">Title, Text and Icon</button>

	<h1>Submit Form Without Page Refresh Using Ajax, jQuery and PHP</h1>

	<div>

		<form name="ContactForm" method="post" action="">
			<div class="form-group">
				<label for="name">Name:</label>
				<input type="text" class="form-control" id="name">
			</div>
			<div class="form-group">
				<label for="phone">Mobile No:</label>
				<input type="text" class="form-control" id="phone">
			</div>

			<div class="form-group">
				<label for="email">Email Address:</label>
				<input type="email" class="form-control" id="email">
			</div>
			<div class="form-group">
				<label for="message">Message:</label>
				<textarea name="message" class="form-control" id="message"></textarea>
			</div>
			<button type="submit" class="btn btn-default sub">Submit</button>
		</form>

		<div class="message_box" style="margin:10px 0px;">
		</div>
	</div>

	<br /><br />
	<script src="js/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>

	<script>
		document.querySelector(".third").addEventListener('click', function () {
			//swal("Thank You!!", "जॉईन बटणावर क्लिक केल्या नंतर आपल्या स्क्रीन वर  दाखवलेला क्रमांक हा Smart Maharashtra नावाने सेव्ह करा!.* ", "success");
			swal({
				title:  ' <h3 class=font_st><strong>Thank You!!</strong><h3>',
				text: "A custom <span style='color:red;'>जॉईन बटणावर क्लिक केल्या नंतर आपल्या स्क्रीन वर  दाखवलेला क्रमांक हा Smart Maharashtra नावाने सेव्ह करा!.*</span> message.",
				html:" <span style='color:red;'><h4>जॉईन बटणावर क्लिक केल्या नंतर <br> +91 9890890697  हा क्रमांक <br>Smart Maharashtra नावाने सेव्ह करा!.</h4></span> ",
				type: "success",
				width:"100",
				//customClass: 'swal-wide',
				showCancelButton: false,
				showConfirmButton:true
			});
			/*swal({
				title: "Profile Picture",
				text: "Do you want to make the above image your profile picture?",
				imageUrl: "https://images3.imgbox.com/4f/e6/wOhuryw6_o.jpg",
				imageWidth: 550,
				imageHeight: 225,
				width:900,
				imageAlt: "Eagle Image",
				showCancelButton: true,
				confirmButtonText: "Yes",
				cancelButtonText: "No",
				confirmButtonColor: "#00ff55",
				cancelButtonColor: "#999999",
				reverseButtons: true,
			  });*/
		});
	</script>
	<script>
		$(document).ready(function () {
			var delay = 2000;
			$('.sub').click(function (e) {
				e.preventDefault();
				var name = $('#name').val();
				if (name == '') {
					$('.message_box').html(
						'<span style="color:red;">Enter Your Name!</span>'
					);
					$('#name').focus();
					return false;
				}

				var phonerx = /^\d{10}$/;

				var phone = $('#phone').val();
				if (phone == '') {
					$('.message_box').html(
						'<span style="color:red;">Enter Mobile Number!</span>'
					);
					$('#phone').focus();
					return false;
				}
				if ($("#phone").val() != '') {
					if (!phone.match(phonerx)) {
						$('.message_box').html(
							'<span style="color:red;">Provided Mobile Number is incorrect(Enter 10 digit No.)!</span>'
						);
						$('#phone').focus();
						return false;
					}
				}


				var email = $('#email').val();
				/*if(email == ''){
			$('.message_box').html(
			'<span style="color:red;">Enter Email Address!</span>'
			);
			$('#email').focus();
            return false;
			}*/
				if ($("#email").val() != '') {
					if (!isValidEmailAddress($("#email").val())) {
						$('.message_box').html(
							'<span style="color:red;">Provided email address is incorrect!</span>'
						);
						$('#email').focus();
						return false;
					}
				}

				var message = $('#message').val();
				if (message == '') {
					$('.message_box').html(
						'<span style="color:red;">Enter Your Message Here!</span>'
					);
					$('#message').focus();
					return false;
				}

				// var values = "Date="+"Timestamp"+"&Name="+name+"&Mobile_Number="+phone+"&Email="+email+"&Message="+message ;
				var values = JSON.stringify({
					"Date": "Timestamp",
					"Name": name,
					"Mobile_Number": phone,
					"Email": email,
					"Message": message
				});
				console.log(values);
				console.log("hi");

				$.ajax({
					/* type: "GET",
			 url: "https://script.google.com/macros/s/AKfycbzziTpkA3CxMSmSuCyMyVaVn3KZCzkb3zZs17TcuBN-77xAuy5Z/exec",
             data:  "Date="+"Timestamp"+"&name="+name+"&phone="+phone+"&email="+email+"&message="+message,
			 beforeSend: function() {
			 $('.message_box').html(
			 '<img src="Loader.gif" width="25" height="25"/>'
			 );
			 },		 
             success: function(data)
			 {
				 setTimeout(function() {
                    $('.message_box').html(data);
                }, delay);
			
             }*/


					url: "https://script.google.com/macros/s/AKfycbzziTpkA3CxMSmSuCyMyVaVn3KZCzkb3zZs17TcuBN-77xAuy5Z/exec",
					type: "post",
					data: values,

					beforeSend: function () {
						$('.message_box').html(
							'<img src="/form_test/loading_2.gif" width="25" height="25"/>'
						);
					},

					success: function (data, status) {
						console.log(data, status);

						setTimeout(function () {
							$('.message_box').html(
								"<span style='color:Green; font-weight:bold; font-size:20px'> Thank you for contacting us, we will get back to you shortly. </span><br>Feel Free to call us."
							);

							swal("Thank You!!", "जॉईन बटणावर क्लिक केल्या नंतर आपल्या स्क्रीन वर  दाखवलेला क्रमांक हा Smart Maharashtra नावाने सेव्ह करा.*With some body text and success icon!", "success");
							/*swal({
								title: "Profile Picture",
								text: "Do you want to make the above image your profile picture?",
								imageUrl: "https://images3.imgbox.com/4f/e6/wOhuryw6_o.jpg",
								imageWidth: 550,
								imageHeight: 225,
								height:250,
								imageAlt: "Eagle Image",
								showCancelButton: true,
								confirmButtonText: "Yes",
								cancelButtonText: "No",
								confirmButtonColor: "#00ff55",
								cancelButtonColor: "#999999",
								reverseButtons: true,
							  });*/
						}, delay);

						// You will get response from your PHP page (what you echo or print)
					},
					error: function (jqXHR, textStatus, errorThrown) {
						console.log(textStatus, errorThrown);

						setTimeout(function () {

							$('.message_box').html(
								"<span style='color:red; font-weight:bold; font-size:20px;'>Sorry! Your form submission is failed.<br>Feel Free to call Us. </span>"
							);
						}, delay);
					}


				});
			});

		});

		//Email validation Function	
		function isValidEmailAddress(emailAddress) {
			var pattern =
				/^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
			return pattern.test(emailAddress);
		};
	</script>


</body>

</html>