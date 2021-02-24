<?php
session_start();
if(!isset($_SESSION["loggedin"])){
  header('Location: adminlogin.php');
}
 ?>
<html>
<head>
  <title>Add Event</title>
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

  <h4>Add Event</h4><br>
  <button style="float:right; margin:0 30px 0 0;"><a href="adminlogout.php">LOG OUT </a></button>

<div class="containerlargerforms">
  <br>
  <br>

  <form class="" id="addform" action="add.php" method="post" onsubmit="return addformvalidate(this)" enctype="multipart/form-data">
    <div class="row">
    <div class="col-25">
      <label>EVENT NAME:</label>
    </div>
    <div class="col-75">
    <input type="text" name="name" value="" required>
  </div>
</div>
<div class="row">
<div class="col-25">
  <label>DESCRIPTION:</label>
</div>
    <div class="col-75">
      <textarea name="description" form="addform" required></textarea>
    </div>
  </div>
  <div class="row">
  <div class="col-25">
    <label>DATE:</label>
  </div>
    <div class="col-75">
      <input type="date" name="date" value="" required>
    </div>
  </div>
  <div class="row">
  <div class="col-25">
    <label>IMAGE:</label>
  </div>
    <div class="col-75">
      <input type="file" name="file" accept=".png, .jpg, .jpeg, .gif" required>
    </div>
  </div>
  <div class="row">
  <div class="col-25">
    <label>CATEGORY:</label>
  </div>
    <div class="col-75">
      <select class="" name="eventcategory">
      <option value="cricket">cricket</option>
      <option value="football" selected>football</option>
      <option value="swimming">swimming</option>
      <option value="hockey">hockey</option>
      <option value="badminton">badminton</option>
      <option value="tennis">tennis</option>
    </select>
  </div>
</div>
<div class="row">
<div class="col-25">
  <label>EVENT STATUS:</label>
</div>
    <div class="col-75"><input type="radio" name="eventstatus" value="true" checked> Enable
                 <input type="radio" name="eventstatus" value="false"> Disable
                 <br>
               </div>
             </div>
             <div class="row">
             <div class="col-25">
               <label>FEATURED EVENT:</label>
             </div>
    <div class="col-75">
      <input type="radio" name="featuredstatus" value="true"> Yes
                 <input type="radio" name="featuredstatus" value="false" checked> No
                 <br>
               </div>
             </div>
             <br>
             <br>
    <div class="row">
        <input type="submit" name="add" value="add">
      </div>
  </form>


  </div>

<script src="formvalidation.js"></script>
</body>
</html>
