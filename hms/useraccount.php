<?php 
	session_start();
	
?>
								<!-- ... -->

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>55097650 Assignment-3</title> 
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" href="main.css" type="text/css">
		<link rel="stylesheet" href="mainUseraccount.css" type="text/css">
		
			<?php
								//code for error messages
					if (isset($_SESSION['message'])) {
						echo "<div id='errorMessage'>".$_SESSION['message']."</div>";
						unset($_SESSION['message']);
														}		
			?>
		
		
		
			<script type="text/javascript">
					function ShowAdmin(){
						var element = document.getElementById('ShowAdmin');
							if(element.style.display == 'none'){
								element.style.display = 'block';
									}else{
								element.style.display = 'none';
											}
									}//End of show admin function	
					function ShowPatient(){
						var element = document.getElementById('ShowPatient');	
							if(element.style.display == 'none'){
								element.style.display = 'block';
								}else{
							element.style.display = 'none';
									}
								}//End of show patient function
			
					function ShowDoctor(){
						var element = document.getElementById('ShowDoctor');
				
							if(element.style.display == 'none'){
								element.style.display = 'block';
									}else{
								element.style.display = 'none';
										}
								}	
			//Function to show of gide the Update form
			
					function showHideForm() {
						var x = document.getElementById("updateForm");
							if (x.style.display == "block") {
									x.style.display = "none";
							} else {
									x.style.display = "block";
									}
							}

		</script>								<!-- End of javaScript -->

	</head>
	
	<body>
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
						
		<!-- What can the user do HERE? ICON SECTION   -->
	
	<div id="iconContainer">
			
			<div class="iconRow">
				
					<div class="iconPlacing">
						 <div id="adminIcon" onclick="document.getElementById('modal-wrapper').style.display='block'">
										<img src="./pictures/userProfile.png" id="updateProfile" alt="Admin" style="width:158px" style="height: 126px" onmouseover="ShowAdmin()" onmouseout="ShowAdmin()" onclick="showHideForm()">
											<li id="ShowAdmin" style="display: none;"><b>Update</b></li>
							
						</div>
						
					</div>
					
					<div class="iconPlacing">
						<div id="adminIcon" onclick="document.getElementById('modal-wrapper').style.display='block'">
							<div class="multi-borderLogin">
								<a href =calender.php id="">  <img src="./pictures/calander.png" alt="Patient" style="width:158px" style="height: 126px" onmouseover="ShowPatient()" onmouseout="ShowPatient()"></a>
									<li id="ShowPatient" style="display: none;"><b>Book Appointment</b></li>
							</div>
						</div>
					</div>
					
					<div class="iconPlacing">
						<div id="adminIcon" onclick="document.getElementById('modal-wrapper').style.display='block'">
							<div class="multi-borderLogin">
								<a href =userperscriptions.php id=""> <img src="./pictures/perscriptions.png" alt="Doctor" style="width:158px" style="height: 126px" onmouseover="ShowDoctor()" onmouseout="ShowDoctor()""></a>
									<li id="ShowDoctor" style="display: none;"><b>View Perscriptions</b></li>
							</div>
						</div>
					</div>
			</div>
	</div>
	<!-- End of ICON SECTION -->
	
	
	<a href="logout.php" class="button btn btn-block2 btn-primary"><h3>Logout</h3></a>
	
    <?php
		
$userPassword = $_SESSION['userPassword'];	
	
$mysqli = new mysqli('localhost', 'root', '','althealth1');
$query = $mysqli->query("SELECT * FROM `registration` WHERE  `Password`='$userPassword'");
$row = $query->fetch_assoc();

if(isset($_POST['btnUpdate'])){
$id = $_POST['userID'];
$name = $_POST['userName'] ;
$surname = $_POST['userSurname'] ;
$address = $_POST['userAddress'] ;
$code = $_POST['userPcode'] ;
$tel = $_POST['userTel']  ;
$cell = $_POST['userCell'] ;
$email = $_POST['userEmail']  ;
$gender = $_POST['userGender']  ;
$dob = $_POST['userDob']  ;
$uPword = $_POST['userPWD'] ;

$results = $mysqli->query("UPDATE `registration` SET `C_name`='$name',`C_surname`='$surname',`Address`='$address ',`Code`='$code',`C_Tel_H`='$tel',`C_Tel_Cell`='$cell',`C_Email`='$email',`Gender`='$gender',`Date_Of_Birth`='$dob', `Password`='$uPword' WHERE `Client_id`='$id'");
	if($results){
		echo "UPDATE SUCESSFULL";
	}else{
		echo "SOMETHING WENT WRONG";
	} 

}
?>	       

<!-- Beginning of user update section -->
		<form  action="useraccount.php" method="post" id="updateForm">
		
		
					<h4>Update Your Profile</h4>
							<label>ID Number</label> <input type="text" value="<?php echo $row['Client_id']?>" name="userID" id="userID" style="color:black" readonly /> 
							<label>Name</label> <input type="text" value="<?php echo $row['C_name']?>" name="userName"  id="userName" style="color:black"/>
							<label>Surname</label> <input type="text" value="<?php echo $row['C_surname']?>" name="userSurname" id="userSurname" style="color:black"/>
							<label>Address</label> <input type="text" value="<?php echo $row['Address']?>" name="userAddress"  id="userAddress" style="color:black"/>
							<label>Code</label> <input type="text" value="<?php echo $row['Code']?>" name="userPcode" id="userPcode" style="color:black"/>
							<label>Tel</label> <input type="text" value="<?php echo $row['C_Tel_H']?>" name="userTel" id="userTel" style="color:black"/>
							<label>Cell</label> <input type="text" value="<?php echo $row['C_Tel_Cell']?>" name="userCell"  id="userCell" style="color:black"/>
							<label>Email</label> <input type="email" value="<?php echo $row['C_Email']?>" name="userEmail"  id="userEmail" style="color:black"/>
							<label>Gender</label> <input type="text" value="<?php echo $row['Gender']?>" name="userGender" id="userGender" style="color:black"/>
							<label>DoB</label> <input type="date" value="<?php echo $row['Date_Of_Birth']?>" name="userDob" id="userDob" style="color:black"/>
							<label></label> Password<input type="text" value="<?php echo $row['Password']?>" name="userPWD" id="userPWD" autocomplete="new-password"  style="color:black"/>
						
							<input type="submit" value="Update" name="btnUpdate" id="btnUpdate" class="btn btn-block btn-primary" />
		</form>
		

	<!-- End of ICON SECTION       -->


	



</body>

</html>