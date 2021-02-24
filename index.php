<?php
include("dbconfig.php");
 ?>
<html>
<head>
  <title>Home</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <nav>
        <label class="logo">MYsports.com</label>
        <ul>
          <li><a class="active" href="#">Home</a></li>
          <li><a href="viewevents.php">Events</a></li>
          <li><a href="about.php">About</a></li>
        </ul>
      </nav>
      <br>
      <h4>FEATURED EVENTS</h4><br>

  <!-- Slideshow container -->
  <div class="slideshow-container">

  <?php
  //fetching event by name and only those that are active
  $sql = "SELECT * FROM events WHERE status=1 AND featured=1";
  $retval = mysqli_query($conn,$sql);
  $numrows = mysqli_num_rows($retval);
  if ($numrows>0) {
    while($row = mysqli_fetch_assoc($retval)){
  ?>

  <div class="mySlides fade">
    <img src="eventimguploads/<?php echo $row['image'];?>" style="width:100%" height="450px">
    <div class="text"><?php echo $row['name'];?><br><form method="post" action="eventdetails.php"><button type="submit" name="details" value="<?= $row['id']; ?>">Event Details</button></form></div>
  </div>



  <?php
    }

  }else {
    echo("no events");
  }

  ?>

  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>

<div style="text-align:center">
<?php
for ($i=1; $i <= $numrows; $i++) {
  ?>
  <span class="dot" onclick="currentSlide(<?php echo $i; ?>)"></span>
  <?php
}
 ?>
</div>


<center>
  View All Sports Events By clicking here:
<br>
<br>
<br>
<a style="background: #5FD3EF; padding: 19px; color: #fff;" href="viewevents.php">View All events</a>
</center>

<script src="index.js"></script>
</body>
</html>
