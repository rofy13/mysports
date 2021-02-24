<?php
include("dbconfig.php");
$eventid = $_POST["details"];

if(!isset($_POST["details"])){
  header('Location: viewevents.php');
}
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <title>Event Details</title>
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

     <div class="eventviewcontainer" style="text-align:center">
     <?php
     //fetching event by name and only those that are active
     $sql = "SELECT * FROM events WHERE id='$eventid'";
     $retval = mysqli_query($conn,$sql);

     if (mysqli_num_rows($retval)>0) {
       while($row = mysqli_fetch_assoc($retval)){
     ?>
     <h2><?php echo $row['name'];?></h2><br>
     <img src="eventimguploads/<?php echo $row['image'];?>" width="1000px" height="450px"></img><br><br><br>
     <p>DATE : <?php echo date('j-F-Y', strtotime( $row['eventdate'] ));?></p><br><br>
     <p><?php echo $row['description'];?></p><br><br>
     <p><?php echo $row['category'];?></p><br><br>
     <p><?php ($row['featured'] == 1)? print"Featured Event":print"Basic Event";?></p><br><br>
     <?php
       }

     }else {
       echo("no records");
     }

     ?>
   </div>


   </body>
 </html>
