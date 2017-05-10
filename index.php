<?php
session_start();
if(isset($_SESSION['logged_in']))
{
  //header("Location:dash.php");
}
include 'dbconfig.php';
include 'config.php';
$authUrl = $gClient->createAuthUrl();
$authUrl = filter_var($authUrl, FILTER_SANITIZE_URL);
$loginUrl = $facebook->getLoginUrl(array('redirect_uri'=>$homeurl,'scope'=>$fbPermissions));
$loginUrl = filter_var($loginUrl, FILTER_SANITIZE_URL);
?>
<!doctype html>
<html>
<head>
	<!-- Basic -->
	<title>CourseGrab</title>
	<!-- Define Charset -->
	<meta charset="utf-8">
	<!-- Responsive Metatag -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Page Description and Author -->
	<meta name="description" content="Edgrab for Courses">
	<meta name="author" content="Edgrab for Courses">
	<!-- Bootstrap CSS  -->
	<link rel="stylesheet" href="/courses/asset/css/bootstrap.min.css" type="text/css" media="screen">
	<!-- Font Awesome CSS -->
	<link rel="stylesheet" href="/courses/css/font-awesome.min.css" type="text/css" media="screen">
	<!-- Slicknav -->
	<link rel="stylesheet" type="text/css" href="/courses/css/slicknav.css" media="screen">
	<!-- CourseGrab CSS Styles  -->
	<link rel="stylesheet" type="text/css" href="/courses/css/style.css" media="screen">
	<!-- Responsive CSS Styles  -->
	<link rel="stylesheet" type="text/css" href="/courses/css/responsive.css" media="screen">
	<link href="/courses/fonts/josefinsans.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="css/normalize.min.css">
	<link rel="stylesheet" href="css/animate.min.css">

</head>
<body>
	<?php
	include '../../header.php';
	?>
	
	<div id="multi_step_form">
		<h1 style="color : white;margin-top:150px" align="center">Know Your Worth</h1>
		<!-- multistep form -->
		<form name="career_form" id="career_form" novalidate action="action.php"  method="post">
			<!-- progressbar -->
			<ul id="progressbar">
				<li class="active">Education</li>
				<li>Work Exeperience</li>
				<li>Your Skills</li>
				<li>Get Your Actual Value</li>
			</ul>
			<!-- fieldsets -->
			<fieldset id="education_details">
				<?php
				include 'templates/education_details.php';
				?>
			</fieldset>
			<fieldset id="work_details">
				<?php
				include 'templates/work_details.php';
				?>
			</fieldset>
			<fieldset id="skill_details">
				<?php
				include 'templates/skill_details.php';
				?>
			</fieldset>
			<fieldset id="login">
				<h2 class="fs-title">Last Step</h2>
				<div class="social login">
					<div class="col-md-6 col-sm-6 col-xs-6">

						<a href="<?php echo $loginUrl; ?>" class="btn  fb_login a facebook_button new_user" >Facebook</a>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6">
						<a href="<?php echo $authUrl; ?>" class="btn  google_login a google_button new_user">Google</a>

					</div>
				</div>
				<input type="button" name="previous" class="previous action-button" value="Previous" style="margin-right: 70px; margin-left: 20px;" />
			</fieldset>
		</form>
	</div>
	<?php include 'full-modal.php';?>
	<script type="text/javascript" src="/courses/js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="/courses/asset/js/bootstrap.min.js"></script>
	<script src="js/jquery.easing.min.js" type="text/javascript"></script> 
	<script src="js/animatedModal.min.js"></script>
	<script type="text/javascript" src="js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
	<script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script>
    webshims.setOptions('forms-ext', {types: 'date'});
webshims.polyfill('forms forms-ext');
</script>	
	<?php
	include '../../footer.php';
	?>
<script type="text/javascript">
	
	$(document).ready(function(){

 $(".remove_education").click(function(){
  $(this).hide();


 });


	});
</script>
</body>
</html>