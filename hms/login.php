<!DOCTYPE html>
<html lang="en">
	<head>
		<title>55097650 Assignment-3</title> 
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<?php include 'menue.inc';?>
	<link rel="stylesheet" href="main.css">
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

		</script>
		
		<style>
		*{margin:0px 0px 0px 0px; }
		


#errorMessage{
	width: 30%;  
	margin-top: 20%;
	margin-left: 35%;
	height: 40px; 
letter-spacing: 2px;
	
	color: #FF0000;
	text-align: center;
	padding-top: 8px;
	
}





/* Full-width input fields */
	input[type=text], input[type=password] {
    width: 90%;
    padding: 12px 20px;
    margin: 8px 26px;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
	font-size:16px;
}

/* Set a style for all buttons */
	button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 26px;
    border: none;
    cursor: pointer;
    width: 90%;
	font-size:20px;
}
button:hover {
    opacity: 0.8;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}
.avatar {
    width: 200px;
	height:200px;
    border-radius: 50%;
}

/* The Modal (background) */
.modal {
	display:none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.4);
}

/* Modal Content Box */
.modal-content {
    background-color: #fefefe;
    margin: 4% auto 15% auto;
    border: 1px solid #888;
    width: 40%; 
	padding-bottom: 30px;
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}
.close:hover,.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    animation: zoom 0.6s
}
@keyframes zoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}
</style>
			
		<link rel="stylesheet" href="main.css">
		<?php
		$message1 =" Your are logged in";
		$message2 = "Your Username/Password combination are incorrect!";
		$message3 = "You are not the Doctor";
		session_start();
		
		//connect to db
		$db = mysqli_connect("localhost", "root", "", "althealth1");
		
		if(isset($_POST['btnlogin'])){
		
			
				//Declare variables and counterparts
			
	$userName = mysql_real_escape_string($_POST['userName']);
	$userPassword = mysql_real_escape_string($_POST['userPassword']);

	$sql = "SELECT * FROM registration WHERE C_name='$userName' AND Password='$userPassword'";
	$result = mysqli_query($db, $sql);
	
	if(mysqli_num_rows($result) == 1){
		$_SESSION['message'] = "You are now logged in";
		$_SESSION['userName'] = $userName;
		$_SESSION['userPassword'] = $userPassword;
		header("location: useraccount.php");
		}else{
			$_SESSION['message'] = "Wrong Username/Password Combination !!";
		}
		
		}

		?>


<?php
	
		
		//connect to db
		$db = mysqli_connect("localhost", "root", "", "althealth1");
		
		if(isset($_POST['doclogin'])){
		
			
				//Declare variables and counterparts
			
	$docUsername = mysql_real_escape_string($_POST['docUsername']);
	$docPass = mysql_real_escape_string($_POST['docPass']);

	$sql = "SELECT * FROM doctorLogin WHERE docUserName='$docUsername' AND docPass='$docPass'";
	$result = mysqli_query($db, $sql);
	
	if(mysqli_num_rows($result) == 1){
		$_SESSION['message'] = "You are now logged in";
		$_SESSION['docUsername'] = $docUsername;
		$_SESSION['docPass'] = $docPass;
		header("location: hcpdashboard.php");
		}else{
			$_SESSION['message'] = "You are not the Doctor !!!";
		}
		
		}

		?>

<?php

		
		//connect to db
		$db2 = mysqli_connect("localhost", "root", "", "althealth1");
		
		if(isset($_POST['adminlogin'])){
		
			
				//Declare variables and counterparts
			
	$adminusername = mysql_real_escape_string($_POST['adminusername']);
	$adminpass = mysql_real_escape_string($_POST['adminpass']);

	$sql2 = "SELECT * FROM adminlogin WHERE adminusername='$adminusername' AND adminpass='$adminpass'";
	$result2 = mysqli_query($db2, $sql2);
	
	if(mysqli_num_rows($result2) == 1){
		$_SESSION['message'] = "You are now logged in";
		$_SESSION['adminusername'] = $adminusername;
		$_SESSION['adminpass'] = $adminpass;
		header("location: gadashboard.php");
		}else{
			$_SESSION['message'] = "You are not the Administrator !!!";
		}
		
		}

		?>

	
	</head>
	<body>
	
	<div id="loginAs">
		<h3>Login As</h3>
	
	</div>
	<?php
						
	//code for error messages
		if (isset($_SESSION['message'])) {
			echo "<div id='errorMessage'>".$_SESSION['message']."</div>";
			unset($_SESSION['message']);
											}	
		
	?>		
		
				
		<div id="loginMain">
			
			<div class="loginrow">
				
					<div class="column2">
						 <div id="adminIcon" onclick="document.getElementById('modal-wrapperAdmin').style.display='block'">
							<div class="multi-borderLogin">
										<img src="./pictures/admin.png" alt="Admin" style="width:158px" style="height: 126px" onmouseover="ShowAdmin()" onmouseout="ShowAdmin()">
											<li id="ShowAdmin" style="display: none;">Admin</li>
							</div>
						</div>
						
					</div>
					

					<div class="column2">
						<div id="adminIcon" onclick="document.getElementById('modal-wrapper').style.display='block'">
							<div class="multi-borderLogin">
								 <img src="./pictures/patient.png" alt="Patient" style="width:158px" style="height: 126px" onmouseover="ShowPatient()" onmouseout="ShowPatient()">
									<li id="ShowPatient" style="display: none;">Patient</li>
							</div>
						</div>
					</div>
					

					<div class="column2">
						<div id="adminIcon" onclick="document.getElementById('modal-wrapperDoctor').style.display='block'">
							<div class="multi-borderLogin">
							 <img src="./pictures/doctor2.png" alt="Doctor" style="width:158px" style="height: 126px" onmouseover="ShowDoctor()" onmouseout="ShowDoctor()">
								<li id="ShowDoctor" style="display: none;">Doctor</li>
							</div>
						</div>
					</div>
		</div>
		</div>

<div id="modal-wrapper" class="modal">
  
  <form class="modal-content animate"  method="post" action="login.php">
        
    <div class="imgcontainer">
      <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
      <img src="./pictures/doctor.png" alt="Admin" style="width:158px" style="height: 126px" onmouseover="ShowAdmin()" onmouseout="ShowAdmin()">
      <h1 style="text-align:center">Please Login</h1>
    </div>

	
    <div class="container">
      <input type="text" placeholder="Enter Username" name="userName">
      <input type="password" placeholder="Enter Password" name="userPassword">        
      <button type="submit" name="btnlogin" >Patient Login</button>
      <input type="checkbox" style="margin:26px 30px;"> Remember me      
      <a href="register.php" style="text-decoration:none; float:right; margin-right:34px; margin-top:26px;">Registration ?</a>
    </div>
    
  </form>
  
</div>
	<!-- Doctor Login form op popup-->
<div id="modal-wrapperDoctor" class="modal">
  
  <form class="modal-content animate"  method="post" action="login.php">
        
    <div class="imgcontainer">
      <span onclick="document.getElementById('modal-wrapperDoctor').style.display='none'" class="close" title="Close PopUp">&times;</span>
      <img src="./pictures/doctor.png" alt="Admin" style="width:158px" style="height: 126px" onmouseover="ShowAdmin()" onmouseout="ShowAdmin()">
      <h1 style="text-align:center">Please Login</h1>
    </div>

	
    <div class="container">
      <input type="text" placeholder="Enter Username" name="docUsername">
      <input type="password" placeholder="Enter Password" name="docPass">        
      <button type="submit" name="doclogin" >Doctor Login</button>
      
     
    </div>
	
	   	<?php
						
	//code for error messages
		if (isset($_SESSION['message'])) {
			echo "<div id='errorMessage'>".$_SESSION['message']."</div>";
			unset($_SESSION['message']);
											}	
		
	?>
  </form>
  
</div> <!-- End Doctor Login form op popup-->
	
		<!-- Admin Login form op popup-->
<div id="modal-wrapperAdmin" class="modal">
  
  <form class="modal-content animate"  method="post" action="login.php">
        
    <div class="imgcontainer">
      <span onclick="document.getElementById('modal-wrapperAdmin').style.display='none'" class="close" title="Close PopUp">&times;</span>
      <img src="./pictures/doctor.png" alt="Admin" style="width:158px" style="height: 126px" onmouseover="ShowAdmin()" onmouseout="ShowAdmin()">
      <h1 style="text-align:center">Please Login</h1>
    </div>

	
    <div class="container">
      <input type="text" placeholder="Enter Username" name="adminusername">
      <input type="password" placeholder="Enter Password" name="adminpass">        
      <button type="submit" name="adminlogin" >Admin Login</button>
     
     
    </div>
	
    	<?php
						
	//code for error messages
		if (isset($_SESSION['message'])) {
			echo "<div id='errorMessage'>".$_SESSION['message']."</div>";
			unset($_SESSION['message']);
											}	
		
	?>
  </form>
  
</div>

<script>
// If user clicks anywhere outside of the modal, Modal will close

var modal = document.getElementById('modal-wrapper');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<script>
// Doctor Login popup Script

var modal = document.getElementById('modal-wrapperDoctor');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<script>
// Admin Login popup Script

var modal = document.getElementById('modal-wrapperAdmin');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>				

	</body>

</html>