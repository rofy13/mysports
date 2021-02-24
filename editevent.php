<?php
session_start();
if(!isset($_SESSION["loggedin"])){
  header('Location: adminlogin.php');
}



include("dbconfig.php");

$eventid = $_POST["edit"];

$name;
$description;
$date;
$eventcategory;
$eventstatus;
$featuredstatus;

echo $eventid;
$sql = "SELECT * FROM events WHERE id=$eventid";
$retval = mysqli_query($conn,$sql);
if (mysqli_num_rows($retval)>0) {
  $row = mysqli_fetch_assoc($retval);

  //$name = $row['id'];
  $name = $row['name'];
  $description = $row['description'];
  $date = $row['eventdate'];
  //echo $row['image'];
  $eventcategory = $row['category'];
  $eventstatus = $row['status'];
  $featuredstatus = $row['featured'];

}else {
  echo("entry doesnt exist anymore");
}


 ?>
<html>
<head>
  <title>Edit Event</title>
  <link rel="stylesheet" href="styles.css">
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

  <h4>Edit Event </h4><br>
  <button style="float:right; margin:0 30px 0 0;"><a href="adminlogout.php">LOG OUT </a></button>
  <div class="containerlargerforms">
    <br>
    <br>

  <form class="" id="editform" action="edit.php" method="post" onsubmit="return addformvalidate(this)" enctype="multipart/form-data">
    <div class="row">
    <div class="col-25">
      <label>EVENT NAME:</label>
    </div>
    <div class="col-75">
      <input type="text" name="name" value="<?= $name ?>" required>
    </div>
  </div>
  <div class="row">
  <div class="col-25">
    <label>DESCRIPTION:</label>
  </div>
      <div class="col-75">
        <textarea name="description" form="editform" required><?= $description ?></textarea>
      </div>
    </div>
    <div class="row">
    <div class="col-25">
      <label>DATE:</label>
    </div>
      <div class="col-75">
        <input type="date" name="date" value="<?= $date ?>" required>
      </div>
    </div>
    <div class="row">
    <div class="col-25">
      <label>IMAGE:</label>
    </div>
      <div class="col-75">
    <input type="file" name="file" accept=".png, .jpg, .jpeg, .gif"><br> (choose the image if you want to update with existing image)<br>
  </div>
</div>
<div class="row">
<div class="col-25">
  <label>CATEGORY:</label>
</div>
  <div class="col-75">
    <select class="" name="eventcategory">
      <option <?php echo ($eventcategory == 'cricket')?"selected":"" ?> >cricket</option>
      <option <?php echo ($eventcategory == 'football')?"selected":"" ?> >football</option>
      <option <?php echo ($eventcategory == 'swimming')?"selected":"" ?> >swimming</option>
      <option <?php echo ($eventcategory == 'hockey')?"selected":"" ?> >hockey</option>
      <option <?php echo ($eventcategory == 'badminton')?"selected":"" ?> >badminton</option>
      <option <?php echo ($eventcategory == 'tennis')?"selected":"" ?> >tennis</option>
    </select>
  </div>
</div>
<div class="row">
<div class="col-25">
  <label>EVENT STATUS:</label>
</div>
    <div class="col-75"><input type="radio" name="eventstatus" value="true" <?php echo ($eventstatus == 1)?"checked":"" ?> > Enable
                 <input type="radio" name="eventstatus" value="false" <?php echo ($eventstatus == 0)?"checked":"" ?>> Disable
                 <br>
               </div>
             </div>
             <div class="row">
             <div class="col-25">
               <label>FEATURED EVENT:</label>
             </div>
    <div class="col-75">
    <input type="radio" name="featuredstatus" value="true" <?php echo ($featuredstatus == 1)?"checked":"" ?> > Yes
                 <input type="radio" name="featuredstatus" value="false" <?php echo ($featuredstatus == 0)?"checked":"" ?> > No
                 <br>
               </div>
             </div>
    <div class="row">
    <button type="submit" name="edit" value="<?= $eventid; ?>">Edit Event</button>
  </div>
  </form>
<br>
<br>
</div>

<script src="formvalidation.js"></script>
</body>
</html>
