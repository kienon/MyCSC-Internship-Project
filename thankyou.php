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
					<div style="text-align:center;">
						<h1>Thank you!</h1>
							<p>Your submission has been received.</p>
							<p>This page will redirect in <span id="timer"></span> seconds.</p>
							</div>
							<script type="text/javascript">
							var count = 5;
							var redirect = "./";
							function countDown() {
							if(count > 0){
							count--;
							document.getElementById("timer").innerHTML = count;
							setTimeout("countDown()", 1000);
							}else{
							window.location.href = redirect;
							}
							}
						countDown();
					</script>					
				</div>
					&nbsp;
			</div>
			</div>
        </section>




</div>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<!-- Bootstrap -->
<?php include 'footer2.php' ?>
</body>
</html>
