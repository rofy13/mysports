<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include("dbconfig.php");
$searchname = $_POST["searchname"];
if(!isset($_POST["searchname"])){
  header('Location: viewevents.php');
}
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <title>Search events</title>
     <link rel="stylesheet" href="styles.css">
     <style>
     .containerevent
     {
       width:900px;
       height:350px;
       text-align:center;
       background-color:rgba(52,73,94,0.5);
       border-radius:4px;
       border-color: blue;
       margin:0 auto;
       margin-top:30px;
       padding: 90px;

       }
     </style>
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


         <div class="row">

     <?php
     //fetching event by name and only those that are active
     $sql = "SELECT * FROM events WHERE name LIKE '%$searchname%' AND status=1";
     $retval = mysqli_query($conn,$sql);

     if (mysqli_num_rows($retval)>0) {
       while($row = mysqli_fetch_assoc($retval)){
     ?>
     <div class="containerevent">
       <h2><?php echo $row['name'];?></h2><br><br><br>
       <p>DATE : <?php echo date('j-F-Y', strtotime( $row['eventdate'] ));?><br><br><br><br><form method="post" action="eventdetails.php"><button type="submit" name="details" value="<?= $row['id']; ?>">More Details</button></form></p>
     </div>
     <?php
       }

     }else {
       echo("no records");
     }

     ?>

   </div>


   </body>
 </html>
