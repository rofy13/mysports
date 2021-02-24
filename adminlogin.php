<html>
<head>
  <title>Admin Login</title>
  <link rel="stylesheet" href="styles.css">
  <style>
  .containeradminlogin
  {
  	width:500px;
  	height:300px;
  	text-align:center;
  	background-color:rgba(52,73,94,0.5);
  	border-radius:4px;
  	margin:0 auto;
  	margin-top:100px;

  }

  input[type=submit] {
    background-color: #0082e6;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: center;
  }

  input[type=submit]:hover {
    background-color: #0073e6;
  }

  input[type=text],input[type=password] {
    width: 30%;
    padding: 6px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
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

  <div class="containeradminlogin">
    <br><br><br><br>
    <form action="verifyadmin.php" method="post">
      <p color="white">USERNAME: </p></br>
      <input type="text" name="username" value="" required><br></br>
      <p color="white">PASSWORD: </p></br>
      <input type="password" name="password" value="" required><br></br>
      <input type="submit" name="adminLogin" value="login">
    </form>
  </div>


</body>
</html>
