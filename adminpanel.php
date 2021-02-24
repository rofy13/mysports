<?php
session_start();
if(!isset($_SESSION["loggedin"])){
  header('Location: adminlogin.php');
}
 ?>
<html>
<head>
  <title>Admin Panel</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <link rel="stylesheet" type="text/css" href="forms.css">
  </head>
  <body>
  <nav>
        <label class="logo">MYsports.com</label>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="viewevents.php">Events</a></li>
          <li><a href="about.php">About</a></li>
        </ul>
      </nav>
      <br>

  <h4>Admin Panel</h4>
  <br>

  <button style="float:right; margin:0 30px 0 0;"><a href="adminlogout.php">LOG OUT </a></button>

  <div class="containerforms">
    <br>
    <br>
    <br>
    <br>
    <button><a href="addevent.php">Add Event</a></button>
    <br>
    <br>
    <br>
    <br>
    <button><a href="listevent.php">List / Edit / Delete Events </a></button>
  </div>

</body>
</html>
