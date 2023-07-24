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
				<h1>Privacy Policy</h1>
				&nbsp;
				<div>
				<ul style="list-style-type:disc;">
				<li>Your Privacy <br> <p>This page explains our privacy policy which includes the use and protection of any information submitted by visitors. If you choose to transact using our web site or send an e-mail which provides personally identifiable data, this data maybe shared where necessary with other Government agencies so as to serve you in the most efficient and effective manner. An example might be in terms of resolving or addressing complaints that require escalation to other Government agencies.</p></li><br>
				<li>Information Collected <br> <p>No personally identifiable information is gathered during the browsing of this web site except for information given by you via e-mail or during registration of storage media on our system.</p></li><br>
				<li>Changes to this Policy <br> <p>If this privacy policy changes in any way, it will be updated on this page. Regularly reviewing this page ensures you are updated on the information which is collected, how it is used and under what circumstances, if any, it is shared with other parties.</p></li><br>
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
