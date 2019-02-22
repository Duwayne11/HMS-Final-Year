<!DOCTYPE html>
<html>
	<head>
		<title>55097650_Portfolio_3715</title> 
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" href="../main.css" type="text/css">
		<link rel="stylesheet" href="../mainUseraccount.css" type="text/css">

	
		<style>
		h4{margin-top: 30px;
		color: #5a5c5e;
		}
		table{margin-bottom: 35px;
			
			margin-left: 2%;
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
		


.btn-block {

  width: 33%;
  padding-left: 0;
  padding-right: 0;
}		

		</style>
		
		
	</head>
	
	<body>
	
		<!-- HTML HEAD section with the main banner -->
					<header>	
						<div class="header">
							<img src="../pictures/logo.png" alt="logo" >
						</div>			
					</header>
					
					
									<!-- HCP Navigation Pannel -->
			<nav>
				<ul class="menueHcp">
						
						<li><a href="calendar/doctorCal.php">My Appointment</a></li>
						<li><a href =register.php>Add New Patient</a> </li>  
						<li><a href =appointmentList.php>Appointment List</a> </li> 
						<li><a href =gadashboard.php>My Dashboard</a> </li> 

					</ul>	
			
			</nav>
		<!-- Below the banner -->
						
						<div id="banner">
							<h1>My Healthcare Dashboard</h1>
						</div>
	<h4>Appointment Data</h4>
        <table>  
            <tr>  
                <th>App_ID</th>  
                <th>Title</th>  
                <th>Appointment Date</th>
				<th>Appointment End</th>
				<th>User ID</th>
				<th>Remarks</th>
				<th>Dosage</th>
				<th>Treatment</th>
            </tr>  
            <?php  
   $mysqli = mysqli_connect('localhost', 'root', '','althealth1');  
  
      
    $sql = mysqli_query($mysqli,"SELECT `id`,`title`,`start_event`,`end_event`,`userPasswID`,`remarks`,`dosage`,`treatment` FROM `events`");  
      
      
    while($data = mysqli_fetch_row($sql)){  
    echo '  
    <tr>  
    <td>'.$data[0].'</td>  
    <td>'.$data[1].'</td>  
    <td>'.$data[2].'</td>  
	<td>'.$data[3].'</td>  
	<td>'.$data[4].'</td>  
	<td>'.$data[5].'</td>  
	<td>'.$data[6].'</td>  
	<td>'.$data[7].'</td>
    </tr>  
    ';  
    }  
    ?>  
        </table> 
	
		<a href="excel.php" class="btn btn-block btn-primary"><h3>Export To Excel</h3></a>
	<br>
<br>;	



	<h4>Patient Data</h4>
        <table>  
            <tr>  
                <th>ID</th>  
                <th>Name</th>  
                <th>Surname</th>
				<th>Address</th>
				<th>Code</th>
				<th>Telephone Nr</th>
				<th>Cell</th>
				<th>Email Address</th>
				<th>Gender</th>
				<th>Date Of Bith</th>
				<th>Password</th>
            </tr>  
<?php  
   $mysqli2 = mysqli_connect('localhost', 'root', '','althealth1');  
     
      
    $sql2 = mysqli_query($mysqli2,"SELECT `Client_id`,`C_name`,`C_surname`,`Address`,`Code`,`C_Tel_H`,`C_Tel_Cell`,`C_Email`,`Gender`,`Date_Of_Birth`,`Password` FROM `registration`");  
      
      
    while($data = mysqli_fetch_row($sql2)){  
    echo '  
    <tr>  
    <td>'.$data[0].'</td>  
    <td>'.$data[1].'</td>  
    <td>'.$data[2].'</td>  
	<td>'.$data[3].'</td>  
	<td>'.$data[4].'</td>  
	<td>'.$data[5].'</td>  
	<td>'.$data[6].'</td>  
	<td>'.$data[7].'</td>
	<td>'.$data[8].'</td>
	<td>'.$data[9].'</td>
	<td>'.$data[10].'</td>
    </tr>  
    ';  
    }  
    ?>  
        </table> 
	
		<a href="excel2.php" class="btn btn-block btn-primary"><h3>Export To Excel</h3></a>
	<br>
<br>
		
		
		</body>  
      
    </html>  
