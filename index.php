<?php session_start()?>
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
	include 'header2.php' 
?>

<!DOCTYPE html>
<html lang="en">
  <!-- Content Wrapper. Contains page content -->
  <div >
        <section class="page-section bg-white" id="search">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">
				<div class="col-lg-12">
				<h4 class="sent-notification"></h4>
					<div class="card card-outline">
						<div class="card-body">
							<div class="d-flex w-100 px-1 py-2 justify-content-center align-items-center">
								<label for="">Enter Order Number</label>
								<div class="input-group col-sm-5">
									<input type="search" id="ref_no" class="form-control form-control-sm" placeholder="Enter order number here..">
									<div class="input-group-append">
										<button type="button" id="track-btn" class="btn btn-sm btn-primary btn-gradient-primary">
											<i class="fa fa-search"></i>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8 offset-md-2">
							<div class="timeline" id="disk_history">							
							</div>
						</div>
					</div>
				</div>
			<div id="clone_timeline-item" class="d-none">
				<div class="iitem">
					<i class="fas fa-box bg-orange"></i>
					<div class="timeline-item">
					  <span class="time"><i class="fas fa-clock"></i> <span class="dtime">12:05</span></span>
					  <div class="timeline-body">
					  </div>
					</div>
				  </div>
			</div>
				</div>
			</div>
				<!--a class="btn btn-light btn-xl" href="#services">Get Started!</a-->
			</div>
        </section>
		
		        <!-- Services-->
        <section class="page-section bg-white" id="services">
            <div class="container px-4 px-lg-5">
                <h2 class="text-center mt-0">Our Services</h2>
                <hr class="divider" />
                <div class="row gx-4 gx-lg-5 justify-content-xl-center">
                    <div class=" col-lg-6 col-md-6 text-center">
                        <a href="./datarecovery.php"><div class=" card mt-5">
                            <div class="container mb-2"><i class="bi bi-arrow-repeat fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">Data Recovery</h3>
                            <p class="text-muted mb-0">A solution to recover data from damaged, corrupted or inaccessible digital storage &hellip;</p>
                        </div></a>
                    </div>
					
                    <div class=" col-lg-6 col-md-6 text-center ">
                        <a href="./datasanitize.php"><div class="card mt-5">
                            <div class="container mb-2"><i class="bi bi-hdd fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">Data Sanitization</h3>
                            <p class="text-muted mb-0">Secure your deletion of data from unused storage devices. &hellip;</p>
                        </div></a>
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
						//alert_toast('Unkown Order Number.',"error")
						$('.sent-notification').text("Unkown Order Number.");
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
