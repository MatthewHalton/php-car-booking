
<?php
include("connection.inc.php");

session_start();

// Check if not logged in
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true){
	header("location: signin.php");
	exit;
}

$sql = "SELECT * FROM tbl_appointment";
$result = mysqli_query($conn, $sql);
?>



<html>

	<head>
		<title>View appointments</title>
		<link rel="stylesheet" href="styles.css">
	</head>


	<body>
    <h1>View all appointments</h1>
    <p> Here are all the current appointments </p>
		<a href="add_appointment.php">add appointment</a>
		<a href="edit_appointment.php">edit appointment</a>
		<a href="delete_appointment.php">delete appointment</a>
		<a href="logout.php">logout</a>
	<?php



	if(mysqli_num_rows($result) > 0){
?>
<table id="appointment">
  <tr>
  <th>ID</th>
  <th>Forename</th>
  <th>Surname</th>
  <th>Email</th>
  <th>Phonenumber</th>
  <th>Bookingdate</th>
  <th>Typeservice</th>
  <th>notes</th>
  </tr>


    <?php
		while($row = mysqli_fetch_assoc($result)){
      ?>
      <tr>
        <td><?php echo $row["ID"];?></td>
        <td><?php echo $row["Forename"];?></td>
        <td><?php echo $row["Surname"];?></td>
        <td><?php echo $row["Email"];?></td>
        <td><?php echo $row["Phonenumber"];?></td>
        <td><?php echo $row["Bookingdate"];?></td>
        <td><?php echo $row["Typeservice"];?></td>
        <td><?php echo $row["notes"];?></td>
      </tr>
  <?php
    }
  }
  ?>
  </body>
  </html>
