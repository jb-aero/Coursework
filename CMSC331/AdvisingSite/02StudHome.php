<?php
session_start();
?>

<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title>Student Advising Home</title>
		<link rel='stylesheet' type='text/css' href='./css/standard.css'/>
	</head>
	
	<body>
		<div id="login">
			<div id="form">
				<div class="top">
					<h2>Hello 
					<?php
						echo $_SESSION["firstN"];
					?>
					</h2>
					
					<div class="selections">
						<form action="StudProcessHome.php" method="post" name="Home">
							<?php
								$debug = false;
								include('../CommonMethods.php');
								$COMMON = new Common($debug);
								
								$_SESSION["studExist"] = false;
								$adminCancel = false;
								$noApp = false;
								$studid = $_SESSION["studID"];

								$sql = "select * from Proj2Students where `StudentID` = '$studid'";
								$rs = $COMMON->executeQuery($sql, $_SERVER["SCRIPT_NAME"]);
								$row = mysql_fetch_row($rs);
								
								if (!empty($row)){
									// $row[6] used in this block is the 'status' column of the students table
									$_SESSION["studExist"] = true;
									if($row[6] == 'C'){
										$adminCancel = true;
									}
									if($row[6] == 'N'){
										$noApp = true;
									}
								}

								// What is going on here is, no data is written to the database until the first time the student
								// schedules an appointment. This saves storage space when it comes to people who log in then do nothing,
								// but by not requiring a password, anyone can log in as any student whose StudentID they know.
								// This will be detailed in the written documentation.
								if ($_SESSION["studExist"] == false || $adminCancel == true || $noApp == true){
									if($adminCancel == true){
										echo "<div class=\"statusMessage\">The advisor has cancelled your appointment! Please schedule a new appointment.</div>";
									}
									echo "<button type='submit' name='selection' class='button large selection' value='Signup'>Signup for an appointment</button><br>";
								}
								else{
									echo "<button type='submit' name='selection' class='button large selection' value='View'>View my appointment</button><br>";
									echo "<button type='submit' name='selection' class='button large selection' value='Reschedule'>Reschedule my appointment</button><br>";
									echo "<button type='submit' name='selection' class='button large selection' value='Cancel'>Cancel my appointment</button><br>";
								}
								echo "<button type='submit' name='selection' class='button large selection' value='Search'>Search for appointment</button><br>";
								echo "<button type='submit' name='selection' class='button large selection' value='Edit'>Edit student information</button><br>";
							?>
						</form>
					</div>
					
					<form action="Logout.php" method="post" name="Logout">
						<div class="logoutButton">
							<input type="submit" name="logout" class="button large go" value="Logout">
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>