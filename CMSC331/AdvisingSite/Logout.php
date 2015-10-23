<?php
session_start();
$flag = false;

// Admin does not enter or set studID
if(isset($_SESSION['studID'])) { $flag = true; }

// Here we will get rid of the login session
session_unset();
session_destroy();

// direct to the login screen they logged in from
if($flag) { header("Location: 01StudSignIn.html"); }
else { header("Location: admin/AdminSignIn.html"); }

?>