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
       
        $name =  $_POST['custname'];
        $email =  $_POST['custemail'];
        $phone =  $_POST['custphone'];

        $date = date("Y-m-d H:i:s");
$error = "";
     

  

if($error!=""){
	echo $error;
	
}else{

    // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO footer_data (name, email, phone, date) VALUES ('$name',
        '$email','$phone','$date')";
         
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

         
       
$mail = "sales@sandudevelopers.com";


$sub = "Submission Confirmation on Sandu Web Let's Connect.";
$message = 
"

Name : $name

Email : $email

Phone : $phone


Thank You

Support Team
Sandu Developers
______________________________________________________


";
	mail($mail, $sub, $message,
    "From: \" Sandu Developers \" <sales@sandudevelopers.com/>\r\n" .
     "X-Mailer: PHP/" . phpversion());
		
		
/*echo"<script type='text/javascript'> alert('Your query has been successfully submitted.');</script>";*/
echo"<script type='text/javascript'> window.location = 'ThankYou.html'</script>";




	}
	
?>