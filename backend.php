<?php
session_start();
$data =$_POST['data'];
foreach ($data as $key => $value) {
	$_SESSION[$key] = $value;
}
/*if(isset($_POST['existing_user']) && !empty($_POST['existing_user']))
{
	$_SESSION['existing_user'] = 1;
}
if(isset($_POST['new_user']) && !empty($_POST['new_user']))
{
	$_SESSION['new_user'] = 1;
}
if(!empty($_POST['course']))
{
	$_SESSION['course'] = $_POST['course'];
}
if(!empty($_POST['college']))
{
	$_SESSION['college'] = $_POST['college'];
}
if(!empty($_POST['work_status']))
{
	$_SESSION['work_status'] = $_POST['work_status'];
}
if(!empty($_POST['company_name']))
{
	$_SESSION['company_name'] = $_POST['company_name'];
}
if(!empty($_POST['work_experience']))
{
	$_SESSION['work_experience'] = $_POST['work_experience'];
}
if(!empty($_POST['company_type']))
{
	$_SESSION['company_type'] = $_POST['company_type']; 
}
if(!empty($_POST['skills']))
{
	$_SESSION['skills'] = $_POST['skills'];
}*/
echo '<pre>';
var_dump($_SESSION);
echo '</pre>';
?>