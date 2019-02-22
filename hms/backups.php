<?php  
 $connect = mysqli_connect('localhost', 'root', '','althealth1');
 $query ="SELECT * FROM events ORDER BY id desc";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
          
		   
		   	<style>
		table{margin-bottom: 35px;
			margin-top: 10px;
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
		




			
.btn {
  text-overflow: ellipsis;
  white-space: nowrap;
  overflow: hidden;
  margin: 3px 30px;
  padding: 9px 20px;
  font-size: 15px;
  line-height: 20px;
  height: 30px;
  background-color: rgba(0, 0, 0, 0.15);
  color: #00aeff;
  border: 1px solid rgba(255, 255, 255, 0.15);
  box-shadow: 0 0 rgba(0, 0, 0, 0);
  border-radius: 4px;
  -webkit-transition: background-color 0.2s, box-shadow 0.2s, background-color 0.2s, border-color 0.2s, color 0.2s;
  transition: background-color 0.2s, box-shadow 0.2s, background-color 0.2s, border-color 0.2s, color 0.2s;
}
 
.btn.active,
.btn:active {
  padding: 7px 19px 5px 21px;
}


.btn.disabled:active,
.btn[disabled]:active,
.btn.disabled.active,
.btn[disabled].active {
  padding: 6px 20px !important;
}

.btn:hover,
.btn:focus {
  background-color: rgba(0, 0, 0, 0.25);
  color: #ffffff;
  border-color: rgba(255, 255, 255, 0.3);
  box-shadow: 0 0 rgba(0, 0, 0, 0);
}

.btn:active,
.btn.active {
  background-color: rgba(0, 0, 0, 0.15);
  color: rgba(255, 255, 255, 0.8);
  border-color: rgba(255, 255, 255, 0.07);
  box-shadow: inset 1.5px 1.5px 3px rgba(0, 0, 0, 0.5);
}

.btn-primary {
  background-color: #098cc8;
  color: #ffffff;
  border: 1px solid transparent;
  box-shadow: 0 0 rgba(0, 0, 0, 0);
  border-radius: 2px;
  -webkit-transition: background-color 0.2s, box-shadow 0.2s, background-color 0.2s, border-color 0.2s, color 0.2s;
  transition: background-color 0.2s, box-shadow 0.2s, background-color 0.2s, border-color 0.2s, color 0.2s;
  background-image: -webkit-linear-gradient(top, #0f9ada, #0076ad);
  background-image: linear-gradient(to bottom, #0f9ada, #0076ad);
  border: 0;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.3), 0 0 0 1px rgba(255, 255, 255, 0.15) inset;
}

.btn-primary:hover,
.btn-primary:focus {
  background-color: #21b0f1;
  color: #ffffff;
  border-color: transparent;
  box-shadow: 0 0 rgba(0, 0, 0, 0);
}

.btn-primary:active,
.btn-primary.active {
  background-color: #006899;
  color: rgba(255, 255, 255, 0.7);
  border-color: transparent;
  box-shadow: inset 1.5px 1.5px 3px rgba(0, 0, 0, 0.5);
}

.btn-primary:hover,
.btn-primary:focus {
  background-image: -webkit-linear-gradient(top, #37c0ff, #0097dd);
  background-image: linear-gradient(to bottom, #37c0ff, #0097dd);
}

.btn-block {
  display: block;
  width: 20%;
  padding-left: 5px;
  padding-right: 5px;
  padding-bottom: 2px;
}

h2 {color:#098cc8;
	margin-left: 30%;
}
		
		</style>
		
      </head>  
      <body>  
	  
          <h2>Backup Data Regularly To Avoid Data-Loss</h2>
                <form method="post" action="export.php" align="center">  
                     <input type="submit" name="export" value="Export Appointments Database" class="btn btn-block btn-primary" />  
                </form>  

                <div class="table-responsive" id="employee_table">  
                     <table class="table table-bordered">  
                          <tr>  
                                <th>ID</th>  
                               <th>Title</th>  
                               <th>Appointment Date</th>  
                               <th>Appointment End</th>  
                               <th>User ID</th>  
                               <th>HCP Remarks</th>  
							   <th>Dosage</th>  
							   <th>Treatment</th>  
                          </tr>  
                     <?php  
                     while($row = mysqli_fetch_array($result))  
                     {  
                     ?>  
                          <tr>  
                               <td><?php echo $row["id"]; ?></td>  
                               <td><?php echo $row["title"]; ?></td>  
                               <td><?php echo $row["start_event"]; ?></td>  
                               <td><?php echo $row["end_event"]; ?></td>  
                               <td><?php echo $row["userPasswID"]; ?></td>  
                               <td><?php echo $row["remarks"]; ?></td>
							   <td><?php echo $row["dosage"]; ?></td>
							   <td><?php echo $row["treatment"]; ?></td>
                          </tr>  
                     <?php       
                     }  
                     ?>  
                     </table>  
                </div>  
      
      </body>  
 </html>