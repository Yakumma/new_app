<?php
include("db.php"); 
include('includes/header.php'); 

$search = mysqli_real_escape_string($conn, $_POST['search']);
$sql = "SELECT * FROM users WHERE name LIKE '%$search%' OR lastname LIKE '%$search%' OR phone_number LIKE '%$search%'";
$results = mysqli_query($conn, $sql);
$queryResults = mysqli_num_rows($results);
if($queryResults > 0){
	while($row=mysqli_fetch_assoc($results)){
		echo "<div class='col-md-4 mx-auto'>
		<h1> Search Result </h1>
		<h3> Name: ".$row['name']."<h3>
		<h3>Lastname: ".$row['lastname']."<h3>
		<h3>Phone Number: ".$row['phone_number']."<h3>
		</div>";
	}
}else{
	echo "There are nor results mathcing your search";
}

include('includes/footer.php'); ?>
