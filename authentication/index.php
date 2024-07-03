<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="indexstyle.css">
    <title>Login</title>
</head>

<body>

<img src="sudipto.gif" class = "bg-image" style="filter: blur(0px)">

<div class="center">
<?php
require('db.php');
session_start();

if (isset($_POST['username']))
{

    $username = $_REQUEST['username'];
	$password = ($_REQUEST['password']);
   
    $query = "SELECT * FROM `users` WHERE `username`='$username' and `password`='' + '$password'";
	$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['username'] = $username;
	    header("Location: start.php");
         }else{
	echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='index.php'>Login</a></div>";
	}
}
    else
    {
?>
<div class="form">

<form action="" method="post" name="login">
<div class="center">
        <!-- Home page button -->
      <input type="checkbox" id="click">
      <label for="click" class="click-me">LOG IN NOW!</label>


        <!-- Popup login form -->
        <div class="content">
          <div class="text">Daily Basis</div>
<label for="click" id="times" style="color:red">x</label>

        <form action="" method="POST" name="login">
          
            <label for="username">Username</label>
              <input type="text" name="username" placeholder="Username" required id="username"/>

              <label for="password">Password</label>
              <input type="password" name="password" placeholder="Password" required id="password"/>
          
              <!-- Create a login button in the popup login form -->
             <button input name="submit" type="submit" value="Login">Log In</button>

        </form>

        </div>
    </div>
<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
</form>
<p style="margin-left: 12%">Not registered yet? <a href='registration.php' style="color:orange">Register Here</a></p>
</div>

<?php 
} ?>

</body>
</html>
