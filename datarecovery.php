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
				<h1>Data Recovery</h1>
				<p>A solution to recover data from damaged, failed, corrupted or inaccessible digital storage media</p>
				<p>Data loss situations can occur due to several types of physical or logical damage to the media and the extent of the damage also defines the extent of data loss. Due to the complexity of a data loss situation and the criticality of the data, there is a need for a secure and structured approach to address the data recovery needs of a customer.</p>
				&nbsp;
				<h4>We Can Help In Any of The Following Situations</h4>
				<div>
				<ul style="list-style-type:disc;">
				<li>Unable to boot</li>
				<li>Inaccessible drives or partitions</li>
				<li>Fire and water damage</li>
				<li>Drive damage due to power issues</li>
				<li>Head stack failures; clicking hard drives</li>
				<li>Accidental format / deletion of data</li>
				<li>RAID failures, Filed arrays, RAID 0, RAID 1, RAID 5</li></ul>
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
