<?php
session_start();

// 03StudSelectType feeds into here.
// This selects what page you go to next depending on which button you pushed.
if ($_POST["type"] == "Group"){
	$_SESSION["advisor"] = $_POST["type"];
	header('Location: 08StudSelectTime.php');
}
elseif ($_POST["type"] == "Individual"){
	header('Location: 07StudSelectAdvisor.php');
}
?>