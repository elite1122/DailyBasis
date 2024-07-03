<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="registration.css" />
<title>Registration</title>
</head>
<body>
    <div class="bg-image">
        <img src="wbubbles.gif" class = "image" style="filter: blur(0px)">
    </div>
    
<div class="login">

<?php
require('db.php');
if (isset($_POST['username']))
{
    $var = 0;
    if(isset($_POST['Email']))
    {
    $username = ($_POST['username']);
    $Email = ($_POST['Email']);
    $password = ($_POST['password']);
    
    if(!filter_var($Email, FILTER_VALIDATE_EMAIL))
    {
        $msg = 'The Email you have entered is invalid, please try again.';
        echo $msg;
    }else{

        $query = "INSERT INTO `users` (`username`, `password`, `Email`) VALUES ('$username', '$password', '$Email');"; 
        $result1 = mysqli_query($conn,$query);

        if($result1)
        {
            echo "<div class='form'>
            <h3>You are registered successfully.</h3>
            <br/>Click here to start <a href='start.php'>Login</a></div>";
        }
  }  
  $conn->close();
    }
        }
else{
?>

<div class="form">
<h1>Register Here!!</h1>
<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="username" required />
<input type="Email" name="Email" placeholder="Email" required />
<input type="password" name="password" placeholder="Password" required />
<input type="submit" name="submit" value="Click me to Register" />
</form>
</div>
<?php } ?>
</body>
</html>