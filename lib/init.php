<?php

require_once __DIR__ . '/../vendor/autoload.php';

global $fb, $user, $appUrl, $appId;

$appUrl = 'http://'.$_SERVER['HTTP_HOST'];
$appId = '123'; // ADD APP ID HERE
$appSecret = '456'; // ADD APP SECRET HERE

if (!session_id()) {
    session_start();
}

$fb = new Facebook\Facebook([
	'app_id' => $appId,
	'app_secret' => $appSecret,
	'default_graph_version' => 'v2.2',
	'persistent_data_handler'=>'session'
]);

if (!empty($_SESSION['fb_access_token'])) {
	// logged in

	try {
	  // Returns a `Facebook\FacebookResponse` object
	  $response = $fb->get('/me?fields=id,name', $_SESSION['fb_access_token']);
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
	  echo 'Graph returned an error: ' . $e->getMessage();
	  exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
	  echo 'Facebook SDK returned an error: ' . $e->getMessage();
	  exit;
	}

	$user = $response->getGraphUser();

} else {
	// not logged in
}
