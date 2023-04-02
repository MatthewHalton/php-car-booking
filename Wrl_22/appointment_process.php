<?php

// Include database connection file
include('connection.inc.php');

	// Collecting all fields from the form
	$forename = $_POST['Forename'];
	$surname = $_POST['Surname'];
	$email = $_POST['Email'];
	$phonenumber = $_POST['Phonenumber'];
	$bookingdate = $_POST['Bookingdate'];
	$typeservice =  $_POST['Typeservice'];
	$notes = $_POST['Notes'];


	if (!empty($forename) && !empty($surname) && !empty($email) && !empty($phonenumber) && !empty($bookingdate) && !empty($typeservice) && !empty($notes))
	{
		// Create an SQL query to add the comment
		$sql = "INSERT INTO tbl_appointment (Forename, Surname, Email, Phonenumber, Bookingdate, Typeservice, notes) VALUES ('$forename', '$surname', '$email', '$phonenumber', '$bookingdate', '$typeservice', '$notes')";

		// Run the query and store the result in a variable
		$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

		// Check if query was successful
		if ($result)
		{
			echo "Thank you for adding your post.";
		}
		else
		{
			echo "There was an error adding your post.";
		}
	}
	else
	{
		echo "Please make sure you fill in all the fields first.";
	}

?>
