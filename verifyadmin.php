<?php
include("dbconfig.php");

$user = $_POST["username"];
$pass = $_POST["password"];

$flag = 1;

$sql = 'SELECT * FROM adminlogin';
$retval = mysqli_query($conn,$sql);

if (mysqli_num_rows($retval)>0) {
  while($row = mysqli_fetch_assoc($retval)){

    $u = $row['username'];
    $p = $row['password'];

    if($user == $u && $pass == $p){
      echo "successfully logged in";
      session_start();
      $_SESSION["loggedin"]=true;
      header('Location: adminpanel.php');
      $flag = 0;
    }
  }

  if ($flag == 1) {
    echo "wrong username/password";
    ?>
    <html>
    <head>
      <title>Admin Panel</title>
      <link rel="stylesheet" type="text/css" href="styles.css">
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

    <button><a href="adminlogin.php">Click to Login again</a></button>

    <?php
  }

}else {
  echo("no admins in db");
}


?>

</body>
</html>
