<?php

include("connection.inc.php");

?>

<!DOCTYPE html>
<html>

<head>
  <title>Form</title>
  <meta charset="utf-8">
  	<link rel="stylesheet" href="styles.css">
</head>

<body>
  <form action="register_process.php" method="post">
    <label for="username">username</label>
    <input type="text" name="username">
    <br><br>

    <label for="password">password</label>
    <input type="password" name="password">
    <br><br>

    <label for="forename">forename</label>
    <input type="text" name="forename">
    <br><br>

    <label for="surname">surname</label>
    <input type="text" name="surname">
    <br><br>

    <label for="email">email</label>
    <input type="email" name="email">
    <br><br>

    <label for="address">address</label>
    <input type="text" name="address">
    <br><br>


    <input type="submit" value="Submit">
  </form>
</body>

</html>
