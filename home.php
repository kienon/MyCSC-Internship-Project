<?php include('db_connect.php') ?>
<?php
$twhere ="";
if($_SESSION['login_type'] != 1)
  $twhere = "  ";
?>
<!-- Info boxes -->
<?php if($_SESSION['login_type'] == 1): ?>
        <div class="row">
           <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box bg-light shadow-sm border">
              <div class="inner">
                <h3><?php echo $conn->query("SELECT * FROM disk")->num_rows; ?></h3>

                <p>Total Disk</p>
              </div>
              <div class="icon">
                <i class="fa fa-boxes"></i>
              </div>
            </div>
          </div>
           <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box bg-light shadow-sm border">
              <div class="inner">
                <h3><?php echo $conn->query("SELECT * FROM users where type != 1")->num_rows; ?></h3>

                <p>Total Staff</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
            </div>
          </div>
          <hr>
          <?php 
               $status_arr = array("Item Accepted by Staff","Analyze","Further Analyze at Our HQ","Posted to HQ","Arrived at HQ","Unsuccessfull Recovery Attempt","Unsuccessfull Sanitize Attempt","Recovering","Done","Retrieved By Client");
               foreach($status_arr as $k =>$v):
          ?>
          <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box bg-light shadow-sm border">
              <div class="inner">
                <h3><?php echo $conn->query("SELECT * FROM disk where status = {$k} ")->num_rows; ?></h3>

                <p><?php echo $v ?></p>
              </div>
              <div class="icon">
                <i class="fa fa-boxes"></i>
              </div>
            </div>
          </div>
            <?php endforeach; ?>
      </div>

<?php else: ?>
	 <div class="col-12">
          <div class="card">
          	<div class="card-body">
          		Welcome <?php echo $_SESSION['login_name'] ?>!
          	</div>
          </div>
      </div>
          
<?php endif; ?>
