<?php
session_start();
if(!isset($_SESSION["loggedin"])){
  header('Location: adminlogin.php');
}

include("dbconfig.php");
$name = $_POST["name"];
$description = $_POST["description"];
$date = $_POST["date"];
$eventcategory = $_POST["eventcategory"];
$eventstatus = $_POST["eventstatus"];
$featuredstatus = $_POST["featuredstatus"];
$eventid = $_POST["edit"];

?>
<!DOCTYPE html>
<html>
  <head>
    <title>edit</title>
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

//checking if you have uploaded new image file
if (!empty($_FILES["file"]["name"])) {
  //echo "image is uploaded";
  //target path for the image
  $targetDir = 'eventimguploads/';
  $fileName = basename($_FILES["file"]["name"]);
  $targetFilePath = $targetDir . $fileName;
  $fileType = strtolower(pathinfo($targetFilePath,PATHINFO_EXTENSION));
}


if(isset($_POST["edit"]) && !empty($_FILES["file"]["name"])){  //if image is uploaded
    // Allow certain file formats
    $allowedTypes = array('jpg','png','jpeg','gif');
    if(in_array($fileType, $allowedTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file nnd other data into database
            $sql = "UPDATE events SET name='$name',description='$description',eventdate='$date',image='".$fileName."',category='$eventcategory',status=$eventstatus,featured=$featuredstatus WHERE id='$eventid'";
            $retval = mysqli_query($conn,$sql);
            if($retval){
                $statusMsg = "the data along with the image ".$fileName. " has been updated successfully.";
            }else{
                $statusMsg = "Image upload failed, please try again.".mysqli_error($conn);
            }
        }else{
            $statusMsg = "Sorry, there was an error uploading your image.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF files are allowed to upload.';
    }
}else if (isset($_POST["edit"]) && empty($_FILES["file"]["name"])) {  //if image is not uploaded/updated
  $sql = "UPDATE events SET name='$name',description='$description',eventdate='$date',category='$eventcategory',status=$eventstatus,featured=$featuredstatus WHERE id='$eventid'";
  $retval1 = mysqli_query($conn,$sql);
  if($retval1){
      $statusMsg = "evnt updated successfully.";
  }else{
      $statusMsg = "EVENT update failed, please try again.".mysqli_error($conn);
  }
}else{
    $statusMsg = 'update failed';
}

// Display status message
echo $statusMsg;
?>

</body>
</html>
