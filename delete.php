<?php
session_start();
if(!isset($_SESSION["loggedin"])){
  header('Location: adminlogin.php');
}

include("dbconfig.php");

$eventid = $_POST["delete"];
?>
<!DOCTYPE html>
<html>
  <head>
    <title>delete</title>
    <link rel="stylesheet" href="styles.css">
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

<?php
$sql = "DELETE FROM events WHERE id='$eventid'";
$retval = mysqli_query($conn,$sql);

if ($retval) {
  echo "successfully deleted";
}else {
  echo "deleing failed/entry doesnt exist".mysqli_error($conn);
}
?>

</body>
</html>
