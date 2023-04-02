<?php
include("connection.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $forename = $_POST['forename'];
  $surname = $_POST['surname'];
  $email = $_POST['email'];
  $address = $_POST['address'];




  // Attach our statement to a variable
  $sql = "INSERT INTO tbl_user (username, password, forename, surname, email, address) VALUES ('$username', '$password', '$forename', '$surname', '$email', '$address')";

  // Connect and run our query
  if (mysqli_query($conn, $sql)) {
    header("location: signin.php");
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  // Close connection
  $conn->close();
}
?>
