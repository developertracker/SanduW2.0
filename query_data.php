<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sandu Lead Form Data</title>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

.expbtn { background-color:green; color:#fff; float: right;
margin:20px 10px; display:block; text-decoration:none; padding:10px; border-radius:10px;}
</style>
</head>

<body>

<?php 
$conn = mysqli_connect("localhost", "sandu_lead", "lead123!@#aA", "sandu_lead");

if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
?>

<table class="table">

<h1> Sandu's web form lead data </h1>
<a href="export.php" class="expbtn"> Export to Excel </a>

  <thead>
    <tr>
      <th scope="col">Sr.No</th>
      <th scope="col">Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
       <th scope="col">Source</th>
<th scope="col">Created On</th>
    </tr>
  </thead>
  <tbody>
<?php

	$sql=mysqli_query($conn,"SELECT * FROM lead ORDER BY date DESC");
?>

<?php if (!empty($sql)):  

$i=0; 
	while($row=mysqli_fetch_array($sql)){$i++;
	?>
    <tr>
		<td><?php echo $i ?></td>
		<td><?php echo $row[1]; ?></td>

		<td><?php echo $row[2]; ?></td>
		<td><?php echo $row[3]; ?></td>
<td><?php echo $row[4]; ?></td>
<td><?php echo $row[5]; ?></td>

</tr>
</td>

	</tr>
	<?php } ?>

 <?php else: ?>
            <tr><td colspan="4">No Data Found.</td></tr>
        <?php endif; ?>

  </tbody>
</table>

<table>

	
	
</body>
</html>