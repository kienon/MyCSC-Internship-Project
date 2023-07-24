<?php
include 'db_connect.php';
$qry = $conn->query("SELECT * FROM disk where id = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}

?>
<div class="container-fluid">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-md-12">
				<div class="callout callout-info">
					<dl>
						<dt>Order Number:</dt>
						<dd> <h4><b><?php echo $reference_number ?></b></h4></dd>
					</dl>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="callout callout-info">
					<b class="border-bottom border-primary">Client's Information</b>
					<dl>
						<dt>Name:</dt>
						<dd><?php echo ucwords($sender_name) ?></dd>
						<dt>Email:</dt>
						<dd><?php echo ucwords($sender_email) ?></dd>
						<dt>IC Number:</dt>
						<dd><?php echo ucwords($sender_ic) ?></dd>
						<dt>Contact:</dt>
						<dd><?php echo ucwords($sender_contact) ?></dd>
					</dl>
				</div>
				<div class="callout callout-info">
					<b class="border-bottom border-primary">Recipient Information</b>
					<dl>
						<dt>Name:</dt>
						<dd><?php echo ucwords($recipient_name) ?></dd>
						<dt>Email:</dt>
						<dd><?php echo ucwords($recipient_email) ?></dd>
						<dt>Contact:</dt>
						<dd><?php echo ucwords($recipient_contact) ?></dd>
					</dl>
				</div>
			</div>
			<div class="col-md-6">
				<div class="callout callout-info">
					<b class="border-bottom border-primary">Disk Details</b>
						<div class="row">
							<div class="col-sm-6">
								<dl>
									<dt>Hardware Manufacturer:</dt>
									<dd><?php echo $hardware ?></dd>
									<dt>Serial Number:</dt>
									<dd><?php echo $serial ?></dd>
									<dt>Price:</dt>
									<dd><?php echo number_format($price,2) ?></dd>
								</dl>	
							</div>
							<div class="col-sm-6">
								<dl>
									<dt>Model Number:</dt>
									<dd><?php echo $model ?></dd>
									<dt>Storage Type:</dt>
									<dd><?php echo $storage ?></dd>
									<dt>Service Type:</dt>
									<dd><?php echo $type == 1 ? "<span class='badge badge-primary'>Data Recovery</span>":"<span class='badge badge-info'>Data Sanitization</span>" ?></dd>
								</dl>	
							</div>
						</div>
					<dl>
						<dt>Status:</dt>
						<dd>
							<?php 
							switch ($status) {
								case '1':
									echo "<span class='badge badge-pill badge-info'> Analyze</span>";
									break;
								case '2':
									echo "<span class='badge badge-pill badge-info'> Further Analyze at Our HQ</span>";
									break;
								case '3':
									echo "<span class='badge badge-pill badge-primary'> Posted to HQ</span>";
									break;
								case '4':
									echo "<span class='badge badge-pill badge-primary'> Arrived at HQ</span>";
									break;
								case '5':
									echo "<span class='badge badge-pill badge-primary'> Unsuccessfull Recovery Attempt</span>";
									break;
								case '6':
									echo "<span class='badge badge-pill badge-primary'> Unsuccessfull Sanitize Attempt</span>";
									break;
								case '7':
									echo "<span class='badge badge-pill badge-success'>Recovering/Sanitizing</span>";
									break;
								case '8':
									echo "<span class='badge badge-pill badge-success'> Done</span>";
									break;
								case '9':
									echo "<span class='badge badge-pill badge-danger'> Retrieved By Client</span>";
									break;
								
								default:
									echo "<span class='badge badge-pill badge-info'> Item Accepted by Staff</span>";
									
									break;
							}

							?>
							<span class="btn badge badge-primary bg-gradient-primary" id='update_status'><i class="fa fa-edit"></i> Update Status</span>
						</dd>

					</dl>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal-footer display p-0 m-0">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
<style>
	#uni_modal .modal-footer{
		display: none
	}
	#uni_modal .modal-footer.display{
		display: flex
	}
</style>
<noscript>
	<style>
		table.table{
			width:100%;
			border-collapse: collapse;
		}
		table.table tr,table.table th, table.table td{
			border:1px solid;
		}
		.text-cnter{
			text-align: center;
		}
	</style>
	<h3 class="text-center"><b>Student Result</b></h3>
</noscript>
<script>
	$('#update_status').click(function(){
		uni_modal("Update Status of: <?php echo $reference_number ?>","manage_disk_status.php?id=<?php echo $id ?>&cs=<?php echo $status ?>","")
	})
</script>