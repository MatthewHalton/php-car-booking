<?php
// File: blog_delete.php

// Check if the ID has been set in the URL, so that we can only show the post that we want to
if (!isset($_GET['id']) || !is_numeric($_GET['id']))
{
 // Send the user back to management if ID isn't set
 // Remember, ! means NOT and || means OR in PHP
 header('Location: ./blog_manage.php');
}
else
{
 // Include our connection file
 include('./inc/connection.inc.php');

 // Get the ID so we can show specific information on the page
 $id = $_GET['id'];

 // Run our query and attach them to our row
 $sql = "SELECT * FROM tblblog WHERE id='$id' LIMIT 1";
 $result = mysqli_query($connection, $sql);
?>

<!-- HTML STARTS HERE -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- HEAD SECTION HERE -->
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title>Blog Example - Delete Post</title>
 <link href="./css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>

<!-- BODY SECTION HERE -->
<body>

 <div id="head">
   <h1>appointments</h1>
   <h2>Delete appointments</h2>
 </div>

 <p id="top">On this page you can confirm the deletion of a blog post.</p>

 <!-- Check we have a returned result from the DB, and that A hasn't been set. We are going to be using 'a' to post a success/error message later -->
 <div id="container">
 <?php
   if ($result && !isset($_GET['a']))
   {

   if($result=mysqli_query($connection, $sql))
   {
     // Fetch the ONE result row as part of an associative array, so we can use the key
     while ($row= mysqli_fetch_assoc($result))
     {
       ?>

       <!-- Display the post, so the user knows which article they're about to delete -->
       <div class="post">
         <p class="title"> <?php echo $row["title"]; ?> </p>
         <p class="article"> <?php echo $row["post"]; ?> </p>
         <p class="postedBy"> <?php echo $row["name"]; ?> </p>
       </div>
     <?php
   }
 }
 ?>

 <!-- Check the echo of $id - we use this to set 'a' to confirm, which should allow us to successfully run the delete script -->
   <div class="options">
     <span class="option"><a href="./blog_delete.php?id=<?php echo $id; ?>&a=confirm">Confirm Deletion</a></span>
     <span class="option"><a href="./blog_manage.php">Go back to manage blog</a></span>
   </div>
 <?php
   }
   // Remember where they pressed the confirm button? This is where we check the value of 'a'
   elseif ($result && $_GET['a'] == "confirm")
   {
     $sql = "DELETE FROM tblblog WHERE id='$id' LIMIT 1";
     $result = mysqli_query($connection, $sql);

     if ($result)
     {
 ?>
   <!-- If our query was successful, we print out our success message -->
   <div class="success">
     <p>This blog post has been successfully deleted.  <a href="./blog_manage.php">Click Here</a> to return to the Blog Management page</p>
   </div>

 <?php
     }
     else
     {
 ?>

 <!-- If our query wasn't successful, we print out that there was an error -->
   <div class="error">
     <p>There has been an error processing your request.  <a href="./blog_manage.php">Click Here</a> to return to the Blog Management page</p>
   </div>

 <?php
     }
   }
   else
   {
 ?>

 <!-- If we couldn't get the 'a' value, we print out that there was an error -->
  <div class="error">
     <p>There has been an error processing your request.  <a href="./blog_manage.php">Click Here</a> to return to the Blog Management page</p>
   </div>

 <?php
   }
 ?>

 </div>

 <?php
 $connection->close();
 ?>

 </div>

 <?php
 }
 ?>
