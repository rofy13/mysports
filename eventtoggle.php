<?php
session_start();
if(!isset($_SESSION["loggedin"])){
  header('Location: adminlogin.php');
}

include("dbconfig.php");

$eventid = $_POST["toggle"];

$currentstatus = 2; //initializing default

$sql1 = "SELECT status FROM events WHERE id='$eventid'";
$result1 = mysqli_query($conn,$sql1);
if (mysqli_num_rows($result1)>0) {
  $row = mysqli_fetch_assoc($result1);
  $currentstatus = $row["status"];
}else{
  echo "no rows".mysqli_error($conn);
  die("exiting");
}


$newstatus = 2; //initializing default

if ($currentstatus == 1) {
  $newstatus = 0;   //if true then set false
}else if ($currentstatus == 0) {
  $newstatus = 1;   //if false then set true
}
$sql2 = "UPDATE events SET status=$newstatus WHERE id='$eventid'";
$result2 = mysqli_query($conn,$sql2);

if ($result2) {
  echo "successfully updated event status";
  $previousPage = $_SERVER["HTTP_REFERER"];
  header('Location: '.$previousPage);
}else {
  echo "updating status failed/entry doesnt exist".mysqli_error($conn);
}


 ?>
