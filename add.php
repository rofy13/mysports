<?php
session_start();
if(!isset($_SESSION["loggedin"])){
  header('Location: adminlogin.php');
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add</title>
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

include("dbconfig.php");
$name = $_POST["name"];
$description = $_POST["description"];
$date = $_POST["date"];
$eventcategory = $_POST["eventcategory"];
$eventstatus = $_POST["eventstatus"];
$featuredstatus = $_POST["featuredstatus"];

//target path for the image
$targetDir = 'eventimguploads/';
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = strtolower(pathinfo($targetFilePath,PATHINFO_EXTENSION));

if(isset($_POST["add"]) && !empty($_FILES["file"]["name"])){
  //trimming name and description front and end spaces
  $name = trim($name);
  $description = trim($description);
    // Allow certain file formats
    $allowedTypes = array('jpg','png','jpeg','gif');
    if(in_array($fileType, $allowedTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file nnd other data into database
            $sql = "INSERT INTO events (name,description,eventdate,image,category,status,featured) VALUES ('$name','$description','$date','".$fileName."','$eventcategory',$eventstatus,$featuredstatus)";
            $retval = mysqli_query($conn,$sql);
            if($retval){
                $statusMsg = "The image ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "Image upload failed, please try again.".mysqli_error($conn);
            }
        }else{
            $statusMsg = "Sorry, there was an error uploading your image.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo $statusMsg;
?>

</body>
</html>
