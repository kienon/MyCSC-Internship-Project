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
				<h1>Frequently Asked Questions</h1>
				&nbsp;
				<div>
				<ul style="list-style-type:disc;">
				<li>Where is MYCSC UMS located? <br> MyCSC UMS now operates at Faculty of Computer and Informatic, Ground Floor, Block A of FKJ Building, Jalan UMS, 88400, Kota Kinabalu, Sabah, Malaysia. </li><br>
				<li>What services are offered? <br> MyCSC UMS offering Data Recovery service and Data Sanitization.</li><br>
				<li>How many Services are there in MYCSC UMS? <br> There are 2 services offered in MyCSC UMS. </li><br>
				<li>Who should I contact for further information? <br> You can contact us at our enail mycsc_ums@ums.edu.my</li></ul><br>
				</div>
				</article>
				</div>
			</div>
			</div>
        </section>


<script>
	function track_now(){
		start_load()
		var tracking_num = $('#ref_no').val()
		if(tracking_num == ''){
			$('#disk_history').html('')
			end_load()
		}else{
			$.ajax({
				url:'ajax.php?action=get_disk_heistory',
				method:'POST',
				data:{ref_no:tracking_num},
				error:err=>{
					console.log(err)
					alert_toast("An error occured",'error')
					end_load()
				},
				success:function(resp){
					if(typeof resp === 'object' || Array.isArray(resp) || typeof JSON.parse(resp) === 'object'){
						resp = JSON.parse(resp)
						if(Object.keys(resp).length > 0){
							$('#disk_history').html('')
							Object.keys(resp).map(function(k){
								var tl = $('#clone_timeline-item .iitem').clone()
								tl.find('.dtime').text(resp[k].date_created)
								tl.find('.timeline-body').text(resp[k].status)
								$('#disk_history').append(tl)
							})
						}
					}else if(resp == 2){
						alert_toast('Unkown Order Number.',"error")
					}
				}
				,complete:function(){
					end_load()
				}
			})
		}
	}
	$('#track-btn').click(function(){
		track_now()
	})
	$('#ref_no').on('search',function(){
		track_now()
	})
</script>

</div>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<!-- Bootstrap -->
<?php include 'footer2.php' ?>
</body>
</html>
