
    <?php  
      
    $conn = new mysqli("localhost", "root", "", "althealth1"); 
    mysqli_select_db($conn, 'events');  
      
    $setSql = "SELECT `id`,`title`,`start_event`,`end_event`,`userPasswID`,`remarks`,`dosage`,`treatment` FROM `events`";   
 
    $setRec = mysqli_query($conn, $setSql);  
      
    $columnHeader = '';  
    $columnHeader = "App_ID" . "\t" . "Title" . "\t" . "Appointment Date"  . "\t" . "Appointment End"  . "\t" . "User ID" . "\t" . "Remarks"  . "\t" . "Dosage"   . "\t" . "Treatment" . "\t";  
	
      
    $setData = '';  
      
    while ($rec = mysqli_fetch_row($setRec)) {  
        $rowData = '';  
        foreach ($rec as $value) {  
            $value = '"' . $value . '"' . "\t";  
            $rowData .= $value;  
        }  
        $setData .= trim($rowData) . "\n";  
    }  
      
      
    header("Content-type: application/octet-stream");  
    header("Content-Disposition: attachment; filename=User_Detail_Reoprt.xls");  
    header("Pragma: no-cache");  
    header("Expires: 0");  
      
    echo ucwords($columnHeader) . "\n" . $setData . "\n";  
      
    ?>  
