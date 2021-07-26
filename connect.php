<?php

file_uploads = On
	$Name = $_POST['Name'];
	$College_Id = $_POST['College_Id']
	$Registration_No = $_POST['Registration_No']
	$StudentId = $_POST['StudentId']



	$email = $_POST['email'];
	$password = $_POST['password'];
	

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration( Name, College Id,Registration_No ,StudentId,email, password) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $Name,$College_Id,$Registration_No,$StudentId, $email, $password);
		$execval = $stmt->execute();
		echo $execval;
		echo "Your details have been submitted successfully";
		$stmt->close();
		$conn->close();
	}
?>