<?php
//index.php
$connect = new PDO("mysql:host=localhost;dbname=althealth1", "root", "");
$connect2 = new PDO("mysql:host=localhost;dbname=althealth1", "root", "");
$query = "SELECT * FROM registration, events WHERE Client_id = userPasswID";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Alternative Healthcare Solutions</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <style>
	
		tr:nth-child(even) {background-color:#99d6ff;}
		
		#bodyMsg{
			width: 400px;
			height: 50px;
			border-radius: 9px;
			background-color: #99d6ff;
		}
	
			
		
		</style>
  
  
 </head>
 <body>
  <br />
  <div class="container">
   <h3 align="center">Alternative Healthcare Solutions</h3>
   <br />
   <div class="table-responsive">
    <table class="table table-bordered table-striped">
     <tr>
      <th>Customer Name</th>
	  <th>Appointment Date</th>
      <th>Email</th>
      <th>Select</th>
      <th>Action</th>
     </tr>
     <?php
     $count = 0;
     foreach($result as $row)
     {
      $count++;
      echo '
      <tr>
       <td>'.$row["C_name"].'</td>
	    <td>'.$row["start_event"].'</td>
       <td>'.$row["C_Email"].'</td>
       <td>
        <input type="checkbox" name="single_select" class="single_select" data-email="'.$row["C_Email"].'" data-name="'.$row["C_name"].'" />
       </td>
       <td><button type="button" name="email_button" class="btn btn-info btn-xs email_button" id="'.$count.'" data-email="'.$row["C_Email"].'" data-name="'.$row["C_name"].'" data-action="single">Send Single</button></td>
      </tr>
      ';
     }
     ?>
     <tr>
      <td colspan="3"></td>
      <td><button type="button" name="bulk_email" class="btn btn-info email_button" id="bulk_email" data-action="bulk">Send Bulk</button></td></td>
     </td>
    </table>
	<form  action="send_mail.php" method="post" >
		<input type="text" placeholder="Message" name="bodyMsg" id="bodyMsg" />
	</form>
   </div>
  </div>
 </body>
</html>

<script>
$(document).ready(function(){
 $('.email_button').click(function(){
  $(this).attr('disabled', 'disabled');
  var id = $(this).attr("id");
  var action = $(this).data("action");
  var email_data = [];
  if(action == 'single')
  {
   email_data.push({
    email: $(this).data("email"),
    name: $(this).data("name")
   });
  }
  else
  {
   $('.single_select').each(function(){
    if($(this). prop("checked") == true)
    {
     email_data.push({
      email: $(this).data("email"),
      name: $(this).data('name')
     });
    }
   });
  }
  
  $.ajax({
   url:"send_mail.php",
   method:"POST",
   data:{email_data:email_data},
   beforeSend:function(){
    $('#'+id).html('Sending...');
    $('#'+id).addClass('btn-danger');
   },
   success:function(data){
    if(data = 'ok')
    {
     $('#'+id).text('Success');
     $('#'+id).removeClass('btn-danger');
     $('#'+id).removeClass('btn-info');
     $('#'+id).addClass('btn-success');
    }
    else
    {
     $('#'+id).text(data);
    }
    $('#'+id).attr('disabled', false);
   }
   
  });
 });
});
</script>

