<?php
ob_start();
date_default_timezone_set("Asia/Kuala_Lumpur");

$action = $_GET['action'];
include 'admin_class.php';
$crud = new Action();
if($action == 'login'){
	$login = $crud->login();
	if($login)
		echo $login;
}
if($action == 'login2'){
	$login = $crud->login2();
	if($login)
		echo $login;
}
if($action == 'logout'){
	$logout = $crud->logout();
	if($logout)
		echo $logout;
}
if($action == 'logout2'){
	$logout = $crud->logout2();
	if($logout)
		echo $logout;
}

if($action == 'signup'){
	$save = $crud->signup();
	if($save)
		echo $save;
}
if($action == 'save_user'){
	$save = $crud->save_user();
	if($save)
		echo $save;
}
if($action == 'update_user'){
	$save = $crud->update_user();
	if($save)
		echo $save;
}
if($action == 'delete_user'){
	$save = $crud->delete_user();
	if($save)
		echo $save;
}
if($action == 'delete_staff'){
	$save = $crud->delete_staff();
	if($save)
		echo $save;
}

if($action == 'save_disk'){
	$save = $crud->save_disk();
	if($save)
		echo $save;
}
if($action == 'delete_disk'){
	$save = $crud->delete_disk();
	if($save)
		echo $save;
}
if($action == 'update_disk'){
	$save = $crud->update_disk();
	if($save)
		echo $save;
}
if($action == 'get_disk_heistory'){
	$get = $crud->get_disk_heistory();
	if($get)
		echo $get;
}

ob_end_flush();
?>
