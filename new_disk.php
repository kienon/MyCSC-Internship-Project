<?php if(!isset($conn)){ include 'db_connect.php'; } ?>
<style>
  textarea{
    resize: none;
  }
</style>
<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">
			<form action="" id="manage-disk">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
        <div id="msg" class=""></div>
        <div class="row">
          <div class="col-md-6">
              <b>Client Information</b>
              <div class="form-group">
                <label for="" class="control-label">Name</label>
                <input type="text" id="name" name="sender_name" class="form-control form-control-sm" value="<?php echo isset($sender_name) ? $sender_name : '' ?>" required>
              </div>
              <div class="form-group">
                <label for="" class="control-label">Email</label>
                <input type="text" id="email" name="sender_email" class="form-control form-control-sm" value="<?php echo isset($sender_email) ? $sender_email : '' ?>" required>
              </div>
			  <div class="form-group">
                <label for="" class="control-label">IC Number</label>
                <input type="text" id="ic" name="sender_ic" class="form-control form-control-sm" value="<?php echo isset($sender_ic) ? $sender_ic : '' ?>" required>
              </div>
              <div class="form-group">
                <label for="" class="control-label">Contact </label>
                <input type="text" name="sender_contact" id="contact" class="form-control form-control-sm" value="<?php echo isset($sender_contact) ? $sender_contact : '' ?>" required>
              </div>
          </div>
          <div class="col-md-6">
              <b>Recipient Information</b>
              <div class="form-group">
                <label for="" class="control-label">Name</label>
                <input type="text" name="recipient_name" id="" class="form-control form-control-sm" value="<?php echo isset($recipient_name) ? $recipient_name : '' ?>" required>
              </div>
              <div class="form-group">
                <label for="" class="control-label">Email</label>
                <input type="text" name="recipient_email" id="" class="form-control form-control-sm" value="<?php echo isset($recipient_email) ? $recipient_email : '' ?>" required>
              </div>
              <div class="form-group">
                <label for="" class="control-label">Contact</label>
                <input type="text" name="recipient_contact" id="" class="form-control form-control-sm" value="<?php echo isset($recipient_contact) ? $recipient_contact : '' ?>" required>
              </div>
          </div>
		  <div class="form-group">
                <label for="" class="control-label">AUTHORIZATION AGREEMENT: </label>
                <a type="text" name="agreement authorization" id="" required>
				<p>By signing below, I hereby certify that during diagnosis, 
				MyCyberSecurity Clinic UMS may need to open the storage media and it might break a <b>warranty seal</b><br>(IF ANY). 
				</p>
				</a>
				<div class="icheck-primary">
              <input type="checkbox" id="agreement1" required>
              <label for="agreement1">
			  Allowing MyCyberSecurity Clinic UMS to proceed as necessary, 
			  should there be any issues, they should be brought to my attention for further confirmation.

			  </label>			  
            </div>
			<div class="icheck-primary">
			<input type="checkbox" id="agreement2" required>
				<label for="agreement2">
					Allowing MyCyberSecurity Clinic UMS to open storage media under all circumstances.
				</label>
			</div>
			<div class="icheck-primary">
			<input type="checkbox" id="agreement3" required>
				<label for="agreement3">
					I have read and Understood the important information provided at the above of this form,
					that in the event of a successful Data retrieval process Data Recovery services offered by
					MyCyberSecurity Clinic UMS will address the confidentiality and integrity of customers data.
					
				</label>
			</div>
              </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="dtype">Service Type</label>
              <input type="checkbox" name="type" id="dtype" <?php echo isset($type) && $type == 1 ? 'checked' : '' ?> data-bootstrap-switch data-toggle="toggle" data-on="Data Recovery" data-off="Data Sanitization" class="switch-toggle status_chk" data-size="xs" data-offstyle="info" data-width="5rem" value="1">
              <small>Data Recovery = recover data loss from the disk</small>
              <small>, Data Sanitization  = sanitize all the data from the disk</small>
            </div>
          </div>
          <div class="col-md-6" id=""  <?php echo isset($type) && $type == 1 ? 'style="display: none"' : '' ?>>
            <?php if($_SESSION['login_branch_id'] <= 0): ?>
              <div class="form-group" id="fbi-field">
                <label for="" class="control-label">Branch</label>
              <select name="from_branch_id" id="from_branch_id" class="form-control select2" required="">
                <option value=""></option>
                <?php 
                  $branches = $conn->query("SELECT *,concat(street,', ',city,', ',state,', ',zip_code,', ',country) as address FROM branches");
                    while($row = $branches->fetch_assoc()):
                ?>
                  <option value="<?php echo $row['id'] ?>" <?php echo isset($from_branch_id) && $from_branch_id == $row['id'] ? "selected":'' ?>><?php echo $row['branch_code']. ' | '.(ucwords($row['address'])) ?></option>
                <?php endwhile; ?>
              </select>
            </div>
            <?php else: ?>
              <input type="hidden" name="from_branch_id" value="<?php echo $_SESSION['login_branch_id'] ?>">
            <?php endif; ?>  
          </div>
        </div>
        <hr>
        <b>Disk Information</b>
        <table class="table table-bordered" id="disk-items">
          <thead>
            <tr>
              <th>Hardware Manufacturer</th>
              <th>Serial Number</th>
              <th>Model Number</th>
              <th>Storage Type</th>
              <th>Price</th>
              <?php if(!isset($id)): ?>
              <th></th>
            <?php endif; ?>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><input type="text" name='hardware[]' value="<?php echo isset($hardware) ? $hardware :'' ?>" required></td>
              <td><input type="text" name='serial[]' value="<?php echo isset($serial) ? $serial :'' ?>" required></td>
              <td><input type="text" name='storage[]' value="<?php echo isset($storage) ? $storage :'' ?>" required></td>
              <td><input type="text" name='model[]' value="<?php echo isset($model) ? $model :'' ?>" required></td>
              <td><input type="text" class="text-right number" name='price[]' value="<?php echo isset($price) ? $price :'' ?>"></td>
              <?php if(!isset($id)): ?>
              <td><button class="btn btn-sm btn-danger" type="button" onclick="$(this).closest('tr').remove() && calc()"><i class="fa fa-times"></i></button></td>
              <?php endif; ?>
            </tr>
          </tbody>
              <?php if(!isset($id)): ?>
          <tfoot>
            <th colspan="4" class="text-right">Total</th>
            <th class="text-right" id="tAmount">0.00</th>
            <th></th>
          </tfoot>
              <?php endif; ?>
        </table>
              <?php if(!isset($id)): ?>
        <div class="row">
          <div class="col-md-12 d-flex justify-content-end">
            <button  class="btn btn-sm btn-primary bg-gradient-primary" type="button" id="new_disk"><i class="fa fa-item"></i> Add Item</button>
          </div>
        </div>
              <?php endif; ?>
      </form>
  	</div>
  	<div class="card-footer border-top border-info">
  		<div class="d-flex w-100 justify-content-center align-items-center">
  			<button class="btn btn-primary btn-xl  bg-gradient-primary mx-2" form="manage-disk">Save</button>
  			<a class="btn btn-primary btn-xl bg-gradient-secondary mx-2" href="./indexmin.php?page=disk_list">Cancel</a>
  		</div>
  	</div>
	</div>
</div>
<div id="ptr_clone" class="d-none">
  <table>
    <tr>
        <td><input type="text" name='hardware[]' required></td>
        <td><input type="text" name='serial[]' required></td>
        <td><input type="text" name='storage[]' required></td>
        <td><input type="text" name='model[]' required></td>
        <td><input type="text" class="text-right number" name='price[]' required></td>
        <td><button class="btn btn-sm btn-danger" type="button" onclick="$(this).closest('tr').remove() && calc()"><i class="fa fa-times"></i></button></td>
      </tr>
  </table>
</div>
<script>
  $('#dtype').change(function(){
      if($(this).prop('checked') == true){
        $('#tbi-field').hide()
      }else{
        $('#tbi-field').show()
      }
  })
    $('[name="price[]"]').keyup(function(){
      calc()
    })
  $('#new_disk').click(function(){
    var tr = $('#ptr_clone tr').clone()
    $('#disk-items tbody').append(tr)
    $('[name="price[]"]').keyup(function(){
      calc()
    })
    $('.number').on('input keyup keypress',function(){
        var val = $(this).val()
        val = val.replace(/[^0-9]/, '');
        val = val.replace(/,/g, '');
        val = val > 0 ? parseFloat(val).toLocaleString("en-US") : 0;
        $(this).val(val)
    })

  })
	$('#manage-disk').submit(function(e){
		e.preventDefault()
		start_load()
    if($('#disk-items tbody tr').length <= 0){
      alert_toast("Please add atleast 1 disk information.","error")
      end_load()
      return false;
    }
		$.ajax({
			url:'ajax.php?action=save_disk',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
			// if(resp){
      //       resp = JSON.parse(resp)
      //       if(resp.status == 1){
      //         alert_toast('Data successfully saved',"success");
      //         end_load()
      //         var nw = window.open('print_pdets.php?ids='+resp.ids,"_blank","height=700,width=900")
      //       }
			// }
        if(resp == 1){
            alert_toast('Data successfully saved',"success");
            setTimeout(function(){
              location.href = 'indexmin.php?page=disk_list';
            },2000)

        }
		<?php

    if (isset($_POST['name']) && isset($_POST['email'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $body = $_POST['body'];
		
		require_once('PHPMailer/PHPMailerAutoload.php');
		
		$mail = new PHPMailer(); 
		$mail->SMTPDebug = SMTP::DEBUG_SERVER;  
		$mail->isSMTP ();
		$mail->SMTPAuth = true; 
		$mail->SMTPSecure = 'tls';
		$mail->Host = 'smtp-relay.sendinblue.com';
		$mail->Port = '587';
		$mail->isHTML();
		$mail->Username = 'kienonchannel@gmail.com'; //host_account
		$mail->Password = 'FI48xmEhzBJasyqd';
		$mail->SetFrom('kienonchannel@gmail.com'); //fromemail
		$mail->Subject = 'Dear $name';
		$mail->Body = ('here is your Order Number($data)'); //data for ref order nmber
		$mail->AddAddress($email); //toemail

		$mail->Send();
}
?>
			}
		})
	})
  function displayImgCover(input,_this) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
            $('#cover').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
      }
  }
  function calc(){

        var total = 0 ;
         $('#disk-items [name="price[]"]').each(function(){
          var p = $(this).val();
              p =  p.replace(/,/g,'')
              p = p > 0 ? p : 0;
            total = parseFloat(p) + parseFloat(total)
         })
         if($('#tAmount').length > 0)
         $('#tAmount').text(parseFloat(total).toLocaleString('en-US',{style:'decimal',maximumFractionDigits:2,minimumFractionDigits:2}))
  }
</script>
