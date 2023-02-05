<?php
include('config.php');

$google_client->revokeToken();
unset($_SESSION['access_token']);
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['phonenumber']);
unset($_SESSION['email']);
unset($_SESSION['code']);
unset($_SESSION['code2']);
unset($_SESSION['email2']);
unset($_SESSION['username3']);
unset($_SESSION['img2']);
unset($_SESSION['codextemail']);
// unset($_SESSION['emaill']);
// unset($_SESSION['userAD']);
session_destroy();

header('location:Login.php');
