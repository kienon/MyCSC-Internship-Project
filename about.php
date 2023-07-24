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
                    <div class="col-lg-8">
				<div class="col-lg-12">
				<article>
				<h3>WHO WE ARE?</h3><br>
				<p>MyCyberSecurity Clinic is the trusted partner for assuring control through proven services, people and technology that recover, analyze and manage information and is a trustworthy and credible entityfor secure data handling and recovery.</p>
				<p>MyCyberSecurity Clinic, as the specialist for data recovery and sanitization, plays a central role in protecting data while provides an opportunity to safely reuse and recycle the replaced or discarded digital storage devices.</p>
				<p>MyCyberSecurity provide an avenue for “Rakyat” (touch point) to obtain assistance and to resolve issues in relation to digital forensics services & ICT related services from a trusted service provider at competitive cost.</p>&nbsp;
				<h3>WHY US?</h3><br>
				<p>We manage information security assurance through the preservation of confidentialty, integrity and availability.</p>
				</article>
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
