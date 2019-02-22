<!DOCTYPE html>
<html>
	<head>
		<title>55097650_Portfolio_3715</title> 
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" href="main.css" type="text/css">
		<link rel="stylesheet" href="mainUseraccount.css" type="text/css">

	
		<style>
		table{margin-bottom: 35px;
			margin-top: 30px;
			margin-left: 2%;
			border-collapse: collapse;
			
		}
		
		table, th, td {
				border: 2px solid grey;
}

		table th {
			padding: 5px;
		}
		
		table td {
			padding-left: 2px;
			
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
  height:30px;
  width:auto;
  display: inline-block;
  vertical-align: middle;
  height: 30px;
  padding: auto;
  margin-top: 3px;
  margin-bottom: 3px;
  margin-left: 2px;
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
					
					
									<!-- HCP Navigation Pannel -->
			<nav>
					<ul class="menueHcp">
						<li><a onclick="showHideForm()">Update Patient Profile </a></li>
						<li><a href =register.php>Add New Patient</a> </li>  
						<li><a href="calendar/doctorCal.php">My Appointment</a></li>
						<li><a href="hcpComment.php">Appointment Notes</a></li>
						<li><a href="hcpdashboard.php">Dashboard</a></li>
					</ul>		
			
			</nav>
		<!-- Below the banner -->
						
						<div id="banner">
							  	
							<h1>My Healthcare Dashboard</h1>
						</div>
	
	
		<?php

//load.php


$mysqli = mysqli_connect('localhost', 'root', '','althealth1');


if(isset($_POST['update'])){
	
 
   $addRemark = mysqli_query($mysqli,"UPDATE events SET remarks='$_POST[remark]' WHERE id='$_POST[hidden]'");

	
	
	};





$sql = "SELECT * FROM events";
$myData = mysqli_query($mysqli, $sql);

echo "<table border=1>
	<th>Appointment ID </th>
	<th>Patient ID/Name</th>
	<th>Appointment Date</th>
	<th>Appointment End</th>
	<th>HCP Remark/Comment<th>";
while($record = mysqli_fetch_array($myData)){
	echo "<form action=hcpComment.php method=post >";
	echo "<tr>";
	echo "<td>" . $record['id'] . "</td>";
	echo "<td>" . $record['title'] . "</td>";
	echo "<td>" . $record['start_event'] . "</td>";
	echo "<td>" . $record['end_event'] . "</td>";
	echo "<td>" . "<input type=text name=remark value=>" 						.  " " . $record['remarks'] 		. 		"</td>";
	echo "<td>" . "<input type='hidden' name=hidden value=" 					. $record['id']				. 		"</td>";
	echo "<td>" . "<input type='submit' name='update' value='Remark/Comment' class=btn>"											.		"</td>";
	echo "</form>";
	}

echo "</table>"; 
mysqli_close($mysqli);




?>
		
	</body>


</html>