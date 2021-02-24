<?php
session_start();
if(!isset($_SESSION["loggedin"])){
  header('Location: adminlogin.php');
}


include("dbconfig.php");
 ?>
<html>
<head>
  <title>Admin - List/edit/Delete events</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="tables.css">
</head>
<body>
  <nav>
        <label class="logo">MYsports.com</label>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a  href="viewevents.php">Events</a></li>
          <li><a href="about.php">About</a></li>
        </ul>
      </nav>
      <br>
      <button style="float:right; margin:0 30px 0 0;"><a href="adminlogout.php">LOG OUT </a></button>
      <br>
      <br>
      <br>
    <table width="80%" border="1">
        <tr>
           <th>EVENT ID</th>
           <th>EVENT NAME</th>
    	     <th>EVENT DESCRIPTION</th>
    	     <th>EVENT DATE</th>
           <th>EVENT IMAGE</th>
    	     <th>EVENT CATEGORY</th>
    	     <th>EVENT STATUS</th>
           <th>ENABLE/DISABLE EVENT</th>
           <th>FEATURED EVENT</th>
           <th>EDIT EVENT</th>
           <th>DELETE EVENT</th>
          </tr>

    <?php
    $sql = 'SELECT * FROM events';
    $retval = mysqli_query($conn,$sql);

    if (mysqli_num_rows($retval)>0) {
      while($row = mysqli_fetch_assoc($retval)){
    ?>
              <tr>
                 <td><?php echo $row['id'];?></td>
                 <td><?php echo $row['name'];?></td>
                 <td><?php echo $row['description'];?></td>
                 <td><?php echo date('d-m-Y', strtotime( $row['eventdate'] ));?></td>
                 <td><?php echo $row['image'];?></td>
                 <td><?php echo $row['category'];?></td>
                 <td><?php ($row['status'] == 1)? print"Enabled":print"Disabled";?></td>
                 <td><form method="post" action="eventtoggle.php"><button type="submit" name="toggle" value="<?= $row['id']; ?>"><?php ($row['status'] == 1)? print"DISABLE":print"ENABLE";?></button></form></td>
                 <td><?php ($row['featured'] == 1)? print"yes":print"No";?></td>
                 <td><form method="post" action="editevent.php"><button type="submit" name="edit" value="<?= $row['id']; ?>">EDIT</button></form></td>
                 <td><form method="post" action="delete.php"><button type="submit" name="delete" value="<?= $row['id']; ?>">DELETE</button></form></td>
             </tr>
    <?php
      }

    }else {
      echo("no records");
    }

    ?>

    </table>

  </body>
  </html>
