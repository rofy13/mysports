<?php
include("dbconfig.php");
 ?>
<html>
<head>
  <title>Events</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="forms.css">
  <style>

    /*search box*/
     input.searchbar {
      width: 40%;
      padding: 6px;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: vertical;
    }

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
          <li><a  class="active" href="#">Events</a></li>
          <li><a href="about.php">About</a></li>
        </ul>
      </nav>
      <br>

<div align="center">
  search box: Enter name of the EVENT
<br>
<br>
<br>
  <form class="" action="searchevent.php" method="post" enctype="multipart/form-data">
    <input type="text" class="searchbar" name="searchname" value="" required><br>
<br>
<br>
        <input type="submit" name="searchevent" value="searchevent">
  </form>
</div>


  <div class="row">

  <?php
  //fetching event by name and only those that are active
  $sql = "SELECT * FROM events WHERE status=1";
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
