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