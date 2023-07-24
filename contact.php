<!DOCTYPE html>
<html lang="en">
<?php session_start() ?>
<?php 

    include 'db_connect.php';
    ob_start();
  if(!isset($_SESSION['system'])){

    $system = $conn->query("SELECT * FROM system_settings")->fetch_array();
    foreach($system as $k => $v){
      $_SESSION['system'][$k] = $v;
    }
  }
  ob_end_flush();

	include 'header3.php' 
?>


  <!-- Content Wrapper. Contains page content -->
  <div >

        <section class="page-section bg-white" id="about">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">
				<div class="col-lg-12">
					<center>
					<h4 class="sent-notification"></h4>

					<form id="myForm">
										<!-- Name input-->
										<div class="form-floating mb-3">
											<input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
											<label for="name">Full name</label>
											<div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
										</div>
										<!-- Email address input-->
										<div class="form-floating mb-3">
											<input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
											<label for="email">Email address</label>
											<div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
											<div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
										</div>
										<!-- Phone number input-->
										<div class="form-floating mb-3">
											<input class="form-control" id="subject" type="text" placeholder="" data-sb-validations="required" />
											<label for="phone">Subject</label>
											<div class="invalid-feedback" data-sb-feedback="phone:required">Subject is required.</div>
										</div>
										<!-- Message input-->
										<div class="form-floating mb-3">
											<textarea class="form-control" id="body" type="text" onclick="sendEmail()" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
											<label for="message">Message</label>
											<div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
										</div>

										<!-- Submit Button-->
										<div class="d-grid"><button class="btn btn-primary btn-xl" id="btn" type="button" onclick="sendEmail()" >Submit</button> </div>
										
									</form>
					</center>
					&nbsp;
				<div class="map">          
					<div class="map-responsive">
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d31741.656734827608!2d116.121845!3d6.034875!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd0231ba91f9917c2!2sMy%20Cyber%20Security%20Clinic%20-%20UMS%20(MyCSC)!5e0!3m2!1sen!2smy!4v1647100044650!5m2!1sen!2smy" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>					
					</div>
				</div>

	
				</div>
					&nbsp;
			</div>
			</div>
        </section>
	<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
        function sendEmail() {
            var name = $("#name");
            var email = $("#email");
            var subject = $("#subject");
            var body = $("#body");
			
            if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
                $.ajax({
                   url: 'sendEmail.php',
                   method: 'POST',
                   dataType: 'json',
                   data: {
                       name: name.val(),
                       email: email.val(),
                       subject: subject.val(),
                       body: body.val()
                   }, success: function (response) {
                        //$('.sent-notification').text("Thank You! Your submission has been received.");
						$(location).prop('href', './thankyou.php')
                   }
                });
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }
    </script>

</div>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<!-- Bootstrap -->
<?php include 'footer2.php' ?>
</body>
</html>
