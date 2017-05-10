<?php
//session_start();
//Include Google client library 
include_once '../../../src/Google_Client.php';
include_once '../../../src/contrib/Google_Oauth2Service.php';
/*
 * Configuration and setup Google API
 */
/*
$clientId = '11378979928-5dasvncohhccsk7clbn873klb9lhps51.apps.googleusercontent.com'; //Google client ID
$clientSecret = 'joJQMi8xzMTQmn6ijKyaFzCw'; //Google client secret
$redirectURL = 'https://edgrab.com/courses/demo/dash.php';//Callback URL
*/

// $clientId = '11378979928-5dasvncohhccsk7clbn873klb9lhps51.apps.googleusercontent.com'; //Google client ID
// $clientSecret = 'joJQMi8xzMTQmn6ijKyaFzCw'; //Google client secret
// $redirectURL = 'http://localhost:8888/courses/demo/multi_step_form/dashboard.php';//Callback URL

/*Sarthak's Localhost */

$clientId =
'11378979928-11kn96h5448b8t7kps19bqjb1tjgdnfu.apps.googleusercontent.com'; //Google client ID
$clientSecret = 'yf-9D6rnEYH1IY6-WstVGVyN'; //Google client secret
$redirectURL = 'http://localhost/courses/demo/multi-step-form/dashboard.php';//Callback URL



//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('edgrwwewab');
//$gClient->setApprovalPrompt('auto') ;
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);
$google_oauthV2 = new Google_Oauth2Service($gClient);
/*********************    facebook oauth config files    ***********/
include_once("../../../inc/facebook.php"); //include facebook SDK

######### Facebook API Configuration ##########
$appId = '1026881380770806'; //Facebook App ID
$appSecret = '2b1976ccbe09595e0e6a6b9b555397a4'; // Facebook App Secret
$homeurl = "https://edgrab.com/study";  //return to home
$fbPermissions = 'email';  //Required facebook permissions
//Call Facebook API
$facebook = new Facebook(array(
	'appId'  => $appId,
	'secret' => $appSecret
	));
$fbuser = $facebook->getUser();

//site specific configuration declartion
define( 'BASE_PATH', 'http://localhost');
define( 'DB_HOST', 'localhost' );
define( 'DB_USERNAME', 'root');
define( 'DB_PASSWORD', '-bus@[46f9)');
define( 'DB_NAME', 'edgrab');