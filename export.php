<?php 
//header info for browser
header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=$fileName.xls");  
header("Pragma: no-cache"); 
header("Expires: 0");

// Include the database config file 
$conn = mysqli_connect("localhost", "sandu_lead", "lead123!@#aA", "sandu_lead");

if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
 
// Filter the excel data 
function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
} 
 
// Excel file name for download 
$fileName = "sandu-lead-" . date('Ymd') . ".csv"; 
 
// Column names 
$fields = array( 'Sr.No', 'NAME', 'EMAIL', 'PHONE', 'URL', 'CREATED'); 
 
// Display column names as first row 
$excelData .= 'Sr.No , ';
$excelData .= 'Name , ';
$excelData .= 'EMAIL ,';
$excelData .= 'PHONE ,';
$excelData .= 'URL ,';
$excelData .= 'CREATED ,';
$excelData .=  "\n"; 
 
// Get records from the database 
$query = $conn->query("SELECT * FROM lead ORDER BY date DESC"); 
if($query->num_rows > 0){ 
    // Output each row of the data 
    $i=0; 
    while($row = $query->fetch_assoc()){ $i++; 
        $rowData = array($i, $row['name'], $row['email'], $row['phone'],$row['url'], $row['date']); 
        array_walk($rowData, 'filterData'); 
        $excelData .= implode(",", array_values($rowData)) . "\n"; 
    } 
}else{ 
    $excelData .= 'No records found...'. "\n"; 
     
} 
 
// Headers for download 
header("Content-Disposition: attachment; filename=\"$fileName\""); 
header("Content-Type: application/vnd.ms-excel"); 
 
// Render excel data 
echo $excelData; 
 
exit;

?>