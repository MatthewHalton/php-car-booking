<!Doctype html>

<html>

 <head>
   <title>Sample Webpage - View Articles</title>
   <link rel="stylesheet" href="styles.css">
 </head>

 <body>

   <div class="container">
  <h1 class="title"> add appointment</h1>

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
