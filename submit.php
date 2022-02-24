<?php 
error_reporting(0);


//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname = "tridhaatu";
 $conn = mysqli_connect("localhost", "sandu_lead", "lead123!@#aA", "sandu_lead");

if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
 //$timestamp = date("Y-m-d H:i:s");


// Taking all 5 values from the form data(input)
$name =  $_POST['name'];
$email =  $_POST['email'];
$phone = $_POST['phone'];
$url = $_POST['url'];
$date = date("Y-m-d H:i:s");
$error = "";
     

  

if($error!=""){
	echo $error;
	
}else{

    // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO lead (name, email, phone, url, date) VALUES ('$name',
            '$email','$phone','$url','$date')";
         
        if(mysqli_query($conn, $sql)){
            //echo "<h3>data stored in a database successfully."
             //   . " Please browse your localhost php my admin"
              //  . " to view the updated data</h3>";
 
           // echo nl2br("\n$name\n $email\n "
              //  . "$phone\n $date");
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }
/*echo "<script type='text/javascript'>document.getElementById('queryform').innerHTML='Dear Icons,<br/> Thank you for your interest We will get in touch with you shortly <br/><a id=dbtn  href=assets/images/AranyaEbrochure.pdf download=AranyaEbrochure.pdf class=bdbbtn>Download Brochure</a>  ';</script>";*/

         
       
$mail = "admin@sandudevelopers.com";


$sub = "Submission Confirmation on Sandu Web Lead.";
$message = 
"

Name : $name

Email : $email

Mobile : $phone

Source : $url

Thank You

Support Team
Sandu Developers
______________________________________________________


";
	mail($mail, $sub, $message,
    "From: \" Sandu Developers \" <admin@sandudevelopers.com/>\r\n" .
     "X-Mailer: PHP/" . phpversion());
		
		
/*echo"<script type='text/javascript'> alert('Your query has been successfully submitted.');</script>";*/
echo"<script type='text/javascript'> window.location = 'thankyou.html'</script>";




	}
	
?>