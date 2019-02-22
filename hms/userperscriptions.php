<!DOCTYPE html>
<html>
	<head>
		<title>55097650_Portfolio_3715</title> 
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" href="main.css" type="text/css">
		<link rel="stylesheet" href="mainUseraccount.css" type="text/css">

	
		<style>
		/* Navigation Bar HCP*/
.menueUser {
	left: 0;
	padding: 5px 0 5px 0; /* padding for menue looks good keep it*/
	text-align: right;
	line-height: 26px;
	opacity: .7; 
	position: fixed;
	width: 100%;
	margin-top: -38px;	
}


.menueUser li {		/* keep as is display menue inline */
	display: inline;
	padding: 0 20px 0 20px;
	font-size: 20px;
}

.menueUser a {			/*keep as is seperates and formate menue text*/
	text-decoration: none;
	color: #fff;
	padding-top:8px;
	padding-bottom:8px;
	padding-right: 12px ;
	padding-left: 12px;
	font-variant: small-caption;
}



.menueUser a:hover,
.menueUser:focus {
			
			 
			
background-color:#fff;
    color:#444;
    -moz-border-radius:5px;
    -webkit-border-radius:5px;
    border-radius:5px;
    -moz-box-shadow:1px 1px 4px #666;
    -webkit-box-shadow:1px 1px 4px #666;
    box-shadow:1px 1px 4px #666;
					}

		
		
		table{margin-bottom: 35px;
			margin-top: 30px;
			margin-left: 29%;
			border-collapse: collapse;
			
		}
		
		table, th, td {
				border: 2px solid grey;
}

		table th {
			padding: 10px;
		}
		
		table td {
			padding: 5px;
			padding-left: 11px;
			padding-right: 11px;
			
		}


		
		tr:hover {background-color: lightgrey;}
		tr:nth-child(even) {background-color:#99d6ff;}
		
		
		select,
textarea,
input[type="text"],
input[type="password"],
input[type="email"],
input[type="date"]
{
  height: 18px;
  width:auto;
  display: inline-block;
  vertical-align: middle;
  height: 30px;

  margin-top: 2px;
  margin-bottom: 2px;
  margin-left: 1px;
  font-size: 15px;
  line-height: 20px;
  border: 1px solid rgba(255, 255, 255, 0.5);
  background-color: rgba(0, 0, 0, 0.3);
  color: rgba(255, 255, 255, 0.7);
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  border-radius: 2px;
}
			}
	
		
		</style>
		
		
	</head>
	
	<body>
	
	<?php 
	session_start();
	
?>
	
						<!-- HTML HEAD section with the main banner -->
					<header>	
						<div class="header">
							<img src="./pictures/logo.png" alt="logo" >
						</div>			
					</header>
								
						<!-- Below the banner -->
						
						<div class="banner">
							<h4>Welcome <?php echo $_SESSION['userName']; ?> <?php $_SESSION['userPassword']; ?> </h4>   	
							<h1>My Healthcare Dashboard</h1>
							
						</div>
					
						<nav>
							<ul class="menueUser">
								<li><a href="useraccount.php">My Dashboard</a></li>
						</nav>		
		<?php

//load.php


$mysqli = mysqli_connect('localhost', 'root', '','althealth1');



$sql = "SELECT * FROM events WHERE userPasswID='$_SESSION[userPassword]' ";
$myData = mysqli_query($mysqli, $sql);

echo "<table border=1>
	<th>App_Nr</th>
	<th>Patient ID/Name</th>
	<th>Appointment Date</th>
	<th>Treatment</th>
	<th>Dosage</th>";
while($record = mysqli_fetch_array($myData)){
	echo "<form action=perscriptions.php method=post >";
	echo "<tr>";
	echo "<td>" . $record['id'] . "</td>";
	echo "<td>" . $record['title'] . "</td>";
	echo "<td>" . $record['start_event'] . "</td>";
//	echo "<td>" . $record['end_event'] . "</td>";
	echo "<td>" . $record['treatment'] 	. "</td>";
	echo "<td>" . $record['dosage'] 		. 		"</td>";
	echo "<td>" . "<input type='hidden' name=hidden value=" 					.  $record['id']				. 		"</td>";
	echo "</form>";
	}

echo "</table>"; 
mysqli_close($mysqli);




?>
		
	</body>


</html>