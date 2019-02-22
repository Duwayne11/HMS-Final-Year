<!DOCTYPE html>
<html>
	<head>
		<title>55097650 Assignment-3</title> 
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

		<link rel="stylesheet" href="form.css" type="text/css">
		<style>
			h4{		margin-top: 0px;
				padding-bottom: 0px;
				margin-left: 200px;
			
			}
		
		</style>
		
		
		<?php include 'menue.inc';?>
		
						<script type="text/javascript">
								function scaleUp(obj, size){
									obj.style.fontSize = size;
										}
						</script>
		
		<?php
		session_start();
		
		//connect to db
		$db = mysqli_connect("localhost", "root", "", "althealth1");
		
		if(isset($_POST['btnregister'])){
			session_start();
			
				//Declare variables and counterparts
	$userId = mysql_real_escape_string($_POST['userId']);				
	$userName = mysql_real_escape_string( $_POST['userName']);
	$userSurname = mysql_real_escape_string($_POST['userSurname']);
	$userAddress = mysql_real_escape_string($_POST['userAddress']);
	$userPcode = mysql_real_escape_string($_POST['userPcode']);
	$userTel = mysql_real_escape_string($_POST['userTel']);
	$userCell = mysql_real_escape_string($_POST['userCell']);
	$userEmail = mysql_real_escape_string($_POST['userEmail']);
	$gender = mysql_real_escape_string($_POST['gender']);
	$userDob = mysql_real_escape_string($_POST['userDob']);
	$userPassword = mysql_real_escape_string($_POST['userPassword']);
	$confirmpassword = mysql_real_escape_string($_POST['confirmpassword']);
	
	if($userPassword == $confirmpassword){
		//create user
		
		$sql = "INSERT INTO `registration`(`Client_id`, `C_name`, `C_surname`, `Address`, `Code`, `C_Tel_H`, `C_Tel_Cell`, `C_Email`, `Gender`,
					`Date_Of_Birth`, `Password`, `Confirm_Pass`) VALUES ('$userId', '$userName', '$userSurname', '$userAddress', '$userPcode', '$userTel', '$userCell', '$userEmail', '$gender', '$userDob', '$userPassword', '$confirmpassword')";
		mysqli_query($db, $sql);
		
		$_SESSION['message'] = "Thank you for regestering";
		$_SESSION['userName'] = $userName;
		$_SESSION['userPassword'] = $userPassword;
		$_SESSION['userId'] = $userId;
		header("location: useraccount.php");
	}else{
		//fail 
		$_SESSION['message'] = "Your Passwords do not match";
		
	}
			
		} 

		?>
		

	</head>
	<body>
		

		
				
		<div class="registerMain">
					<?php
	
						
								//code for error messages
							if (isset($_SESSION['message'])) {
								echo "<div id='regError'>".$_SESSION['message']."</div>";
								unset($_SESSION['message']);
																}	
						?>	
						
						
				<div id="sectionOne">
					
					<form class="form" action="register.php" method="post" >
					<h4>Sign Up</h4>
							<input type="text" placeholder="ID Number" name="userId" required style="color:black"/>
							<input type="text" placeholder="User Name" name="userName" required style="color:black"/>
							<input type="text" placeholder="Surname" name="userSurname" required style="color:black"/>
							<input type="text" placeholder="Address" name="userAddress" required style="color:black"/>
							<input type="text" placeholder="Postal Code" name="userPcode" required style="color:black"/>
							<input type="text" placeholder="Tel Number" name="userTel" required style="color:black"/>
							<input type="text" placeholder="Cell" name="userCell" required style="color:black"/>
							<input type="email" placeholder="Email" name="userEmail" required style="color:black"/>
							<input type="radio" name="gender" value="male"> Male<br>
							<input type="radio" name="gender" value="female"> Female<br>
							<input type="date" placeholder="Date Of Birth" name="userDob" required style="color:black"/>
							<input type="password" placeholder="Password" name="userPassword" autocomplete="new-password" required style="color:black"/>
							<input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required style="color:black"/>
						
							<input type="submit" value="Register" name="btnregister" class="btn btn-block btn-primary" />
							
							
					</form>
				</div>
		
			
		</div>		

	</body>
	
	<footer>
		<h2>OUR SERVICES</h2>
		
		<div id="footbox1">
			<p>Services</p>
			<ul class="services">
						<li onmouseover="scaleUp(this,'20px')"onmouseout="scaleUp(this,'17px')"> >> General Health </li> 
						<li onmouseover="scaleUp(this,'20px')"onmouseout="scaleUp(this,'17px')">>> Prevention & Wellness</li> 
						<li onmouseover="scaleUp(this,'20px')"onmouseout="scaleUp(this,'17px')">>> Work Injuries</li> 
						<li onmouseover="scaleUp(this,'20px')"onmouseout="scaleUp(this,'17px')">>> Medicals</li> 
						<li onmouseover="scaleUp(this,'20px')"onmouseout="scaleUp(this,'17px')">>> PDP's</li> 
						<li onmouseover="scaleUp(this,'20px')"onmouseout="scaleUp(this,'17px')">>> Minor Trauma</li> 
						<li onmouseover="scaleUp(this,'20px')"onmouseout="scaleUp(this,'17px')">>> Work Injuries</li> 
			</ul>
		</div>
		
		<div id="footbox2">
			<p>Additional Services </p>
		<ul class="services">
						<li onmouseover="scaleUp(this,'20px')"onmouseout="scaleUp(this,'17px')">>> Chronic Disease Managemen</li> 
						<li onmouseover="scaleUp(this,'20px')"onmouseout="scaleUp(this,'17px')">>> NeoStrata Skin Care</li> 
						<li onmouseover="scaleUp(this,'20px')"onmouseout="scaleUp(this,'17px')">>> Nisim Hair Care</li> 
						<li onmouseover="scaleUp(this,'20px')"onmouseout="scaleUp(this,'17px')">>> Heliocare Sun Care</li> 
						<li onmouseover="scaleUp(this,'20px')"onmouseout="scaleUp(this,'17px')">>> Dermapen Facial Treatments</li> 
						<li onmouseover="scaleUp(this,'20px')"onmouseout="scaleUp(this,'17px')">>> Sleep Studies</li> 
						<li onmouseover="scaleUp(this,'20px')"onmouseout="scaleUp(this,'17px')">>> Medical Home Care Products</li> 
			</ul>
		
		</div>
		
		<div id="footbox3">
			<p>Office Hours</p>
			<ul class="services">
						<li onmouseover="scaleUp(this,'20px')"onmouseout="scaleUp(this,'17px')">>> Monday </li> 
						<li onmouseover="scaleUp(this,'20px')"onmouseout="scaleUp(this,'17px')">>> Tuesday </li> 
						<li onmouseover="scaleUp(this,'20px')"onmouseout="scaleUp(this,'17px')">>> Wednesday  </li> 
						<li onmouseover="scaleUp(this,'20px')"onmouseout="scaleUp(this,'17px')">>> Thursday  </li> 
						<li onmouseover="scaleUp(this,'20px')"onmouseout="scaleUp(this,'17px')">>> Friday  </li> 
						<li onmouseover="scaleUp(this,'20px')"onmouseout="scaleUp(this,'17px')">>> Saturday  </li> 
						<li onmouseover="scaleUp(this,'20px')"onmouseout="scaleUp(this,'17px')">>> Sundays &nbsp &nbsp &nbsp &nbsp -- &nbsp &nbsp &nbsp &nbsp Closed</li> 
			</ul>
			
			
		</div>
			
	</footer>

	</html>

