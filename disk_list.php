<?php include'db_connect.php' ?>
<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-header">
			<div class="card-tools">
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary " href="./indexmin.php?page=new_disk"><i class="fa fa-plus"></i> Add New</a>
			</div>
		</div>
		<div class="card-body">
			<table class="table tabe-hover table-bordered" id="list">
				<!-- <colgroup>
					<col width="5%">
					<col width="15%">
					<col width="25%">
					<col width="25%">
					<col width="15%">
				</colgroup> -->
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Reference Order Number</th>
						<th>Sender Name</th>
						<th>Recipient Name</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$where = "";
					if(isset($_GET['s'])){
						$where = " where status = {$_GET['s']} ";
					}
					if($_SESSION['login_type'] != 1 ){
						if(empty($where))
							$where = " where ";
						else
							$where .= " and ";
						$where .= " (from_branch_id = {$_SESSION['login_branch_id']} or to_branch_id = {$_SESSION['login_branch_id']}) ";
					}
					$qry = $conn->query("SELECT * from disk $where order by  unix_timestamp(date_created) desc ");
					while($row= $qry->fetch_assoc()):
					?>
					<tr>
						<td class="text-center"><?php echo $i++ ?></td>
						<td><b><?php echo ($row['reference_number']) ?></b></td>
						<td><b><?php echo ucwords($row['sender_name']) ?></b></td>
						<td><b><?php echo ucwords($row['recipient_name']) ?></b></td>
						<td class="text-center">
							<?php 
							switch ($row['status']) {
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
									echo "<span class='badge badge-pill badge-primary'> Arrived At HQ</span>";
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
						</td>
						<td class="text-center">
		                    <div class="btn-group">
		                    	<button type="button" class="btn btn-info btn-flat view_disk" data-id="<?php echo $row['id'] ?>">
		                          <i class="fas fa-eye"></i>
		                        </button>
		                        <a href="indexmin.php?page=edit_disk&id=<?php echo $row['id'] ?>" class="btn btn-primary btn-flat ">
		                          <i class="fas fa-edit"></i>
		                        </a>
		                        <button type="button" class="btn btn-danger btn-flat delete_disk" data-id="<?php echo $row['id'] ?>">
		                          <i class="fas fa-trash"></i>
		                        </button>
	                      </div>
						</td>
					</tr>	
				<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<style>
	table td{
		vertical-align: middle !important;
	}
</style>
<script>
	$(document).ready(function(){
		$('#list').dataTable()
		$('.view_disk').click(function(){
			uni_modal("disk's Details","view_disk.php?id="+$(this).attr('data-id'),"large")
		})
	$('.delete_disk').click(function(){
	_conf("Are you sure to delete this disk?","delete_disk",[$(this).attr('data-id')])
	})
	})
	function delete_disk($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_disk',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>