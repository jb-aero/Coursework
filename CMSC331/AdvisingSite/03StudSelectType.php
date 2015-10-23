<?php
session_start();
?>

<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title>Select Advising Type</title>
		<link rel='stylesheet' type='text/css' href='./css/standard.css'/>
	</head>
	<body>
		<div id="login">
			<div id="form">
				<div class="top">
					<h1>Schedule Appointment</h1>
					<h2>What kind of advising appointment would you like?</h2><br>
					
					<!-- This is hard thing about documentation. It is painfully obvious already this
						is the screen where you click Individual or Group. -->
					<form action="StudProcessType.php" method="post" name="SelectType">
						<div class="nextButton">
							<input type="submit" name="type" class="button large go" value="Individual">
							<input type="submit" name="type" class="button large go" value="Group" style="float: right;">
						</div>
					</form>
				</div>
			</div>

			<br>
			<br>
		
			<div>
				<form method="link" action="02StudHome.php">
					<input type="submit" name="home" class="button large" value="Cancel">
				</form>
			</div>
		</div>
	</body>
</html>