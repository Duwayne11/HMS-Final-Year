
    <?php  
    
    $conn = new mysqli("localhost", "root", "", "althealth1"); 
    mysqli_select_db($conn, 'registration');  
      
    $setSql = "SELECT `Client_id`,`C_name`,`C_surname`,`Address`,`Code`,`C_Tel_H`,`C_Tel_Cell`,`C_Email`,`Gender`,`Date_Of_Birth`,`Password` FROM `registration`"; 
 
    $setRec = mysqli_query($conn, $setSql);  
      
    $columnHeader = '';  
    $columnHeader = "Patient Id" . "\t" . "Name" . "\t" . "Surname"  . "\t" . "Address"  . "\t" . "Code" . "\t" . "Tel"  . "\t" . "Cell"   . "\t" . "Email" . "\t" . "Gender" . "\t" . "DOB " . "\t" . "Password" . "\t";  
	
      
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
