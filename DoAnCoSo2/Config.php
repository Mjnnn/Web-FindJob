<?php

require_once('vendor/autoload.php');
// require_once('vendor/facebook/graph-sdk/src/Facebook/autoload.php');
session_start();

$google_client = new Google_Client();

$google_client->setClientId('217990298862-5tdph7a50crb0efdttmuagsull3oc1es.apps.googleusercontent.com');

$google_client->setClientSecret('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');

$google_client->setRedirectUri('http://localhost/DoAnCoSo2/Home.php');

$google_client->setRedirectUri('http://localhost:3000/Home.php');


$google_client->addScope('email');

$google_client->addScope('profile');

$fb = new \Facebook\Facebook([
    'app_id' => '841852273906066',
    'app_secret' => '2ba473f7110e43e3699b38a318cd66fa',
    'default_graph_version' => 'v2.10',
    //'default_access_token' => '{access-token}', // optional
]);

$helper = $fb->getRedirectLoginHelper();
$login_url = $helper->getLoginUrl("http://localhost/DoAnCoSo2/");

try {
    $accessToken = $helper->getAccessToken();
    if (isset($accessToken)) {
        $_SESSION['access_token'] = (string) $accessToken;
    }
} catch (Exception $exc) {
    // echo $exc->getTraceAsString();
}

if (isset($_SESSION['access_token'])) {
    try {
        $fb->setDefaultAccessToken($_SESSION['access_token']);
        $res = $fb->get('/me?locale=en_US&fields=name,email');
        $user = $res->getGraphUser();
        // $user->getField('name'); name fb:
    } catch (Exception $exc) {
        // echo $exc->getTraceAsString();
    }
}
