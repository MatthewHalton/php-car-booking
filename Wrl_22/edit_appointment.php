<?php
// Includes
include_once("connection.inc.php");

// Ensure the ID has been set to pull back a specific article
if(!isset($_GET["id"]) || !is_numeric($_GET["id"])){
  header("Location: view_appointments2.php");
}
// Retrieve post details
$id = $_GET["id"];

$sql = "SELECT * from tbl_appointment WHERE id='$id' LIMIT 1";
$result = mysqli_query($conn, $sql) or die("Unable to run query.");
$row = mysqli_fetch_row($result);

if($_SERVER["REQUEST_METHOD"] == "POST")
{
  // Check to see all fields have been completed
  $forename = $_POST['forename'];
  // n12br - inserts line breaks (\n) where new lines occcur in the string
  $surname = $_POST['surname'];
  $email = $_POST['email'];
  $phonenumber = $_POST['phonenumber'];
  $bookingdate = $_POST['bookingdate'];
  $typeservice =  $_POST['Typeservice'];
	$notes = $_POST['Notes'];


	if (!empty($forename) && !empty($surname) && !empty($email) && !empty($phonenumber) && !empty($bookingdate) && !empty($typeservice) && !empty($notes))
  {
    // Create an SQL query to add the comment
    $sql = "UPDATE tbl_appointment SET forename = '$forename', surname = '$surname', email = '$email', phonenumber = '$phonenumber', bookingdate = '$bookingdate', typeservice = '$typeservice', notes = '$notes' WHERE id = $id";

    // Run the query and store the result in a variable
    $result = mysqli_query($conn, $sql) or die("Could not run query");

    // Close connection to the database
    mysqli_close($conn);

    // Check if query was successful, then post a different message dependant on our result
    if ($result)
    {
      $message = '<p>You have successfully edited your post.</p><p>Please <a href="view_article.php">Click Here</a> to view appointment.</p>';
    }
    else
    {
      $message = '<p>There was an error editing your post, please try again</p>';
    }
  }
  else
  {
    $message = '<p>Please make sure you fill all fields in before submitting the form.</p>';
  }
}
?>

<!DOCTYPE html>

<html>

	<head>
		<title>Sample Webpage - View Articles</title>
		<link rel="stylesheet" href="styles.css">
	</head>

	<body>

	<div class="container">
	<h1 class="title">Edit Post</h1>

  <br>
  <?php
  // If message has been set, we'll tell them the message and direct them to an appropriate page. If it hasn't, we'll show the form.
  if (isset($message)){
    echo '<p>' . $message . '</p>';
  } else {
?>

    <form action="<?php echo $_SERVER['PHP_SELF'] . "?id=" . $id;?>" method="post" class="form_add">

      <!-- This is a hidden input. It allows us to pass the ID through with GET once more, for the update query. -->
      <input type="hidden" name="id" id="id" value="<?php echo $id;?>"/>


      <form action="appointment_process.php" method="post" class="form_add">
        <input type="text" name="Forename" placeholder="Forename" class="add_forename">
        <br>
        <br>
        <input type="text" name="Surname" placeholder="Surname" class="add_surname">
        <br>
        <br>
        <input type="text" name="Email" placeholder="Email" class="add_email">
        <br>
        <br>
        <input type="text" name="Phonenumber" placeholder="Phone Number" class="add_phonenumber">
        <br>
        <br>
        <input type="text" name="Bookingdate" placeholder="Booking Date" class="add_bookingdate">
        <br>
        <br>
        <input type="text" name="Typeservice" placeholder="Type of service" class="add_Typeservice">
        <br>
        <br>
        <input type="text" name="Notes" placeholder = "notes" class= "add_notes">

    <br>
    <br>
        <input type="submit" value="Make Appointment" class="add_button">
      </form>










      <input type="text" name="title" value="<?php echo $row[1];?>" class="add_title">
      <br>
      <textarea name="post" style="text-align: left" class="add_post"><?php echo $row[2];?></textarea>
      <br>
      <input type="text" name="name" value="<?php echo $row[3];?>" class="add_author">
      <br>
      <input type="submit" value="Post Now!" class="add_button">
    </form>

  </div>

	</body>
<?php } ?>
</html>
