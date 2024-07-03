<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
</head>


<body>
    <div style="display:inline;">
        <div class="hero">



            <div class="nav" style="background-color:#3a017a" style="position:fixed">
                <img src="./images/Daily-Basis.png" class="logo">
                <ul>
                    <li class=""><a href="start.php" style="color:#ffffff">Home</a></li>
                    <li><a href="../Weather/index.html" style="color:#ffffff">Weather</a></li>
                    <li><a href="../NoteBook/index.html" style="color:#ffffff">NoteBook</a></li>
                    <li><a href="../Daily-Quotes/quotes.html" style="color:#ffffff">Daily-Quotes</a></li>
                    <li><a href="../Events/event.html" style="color:#ffffff">Event</a></li>
                </ul>
            </div>

            <div class="bg-image">
                <img src="background.png" style="width:100%">
            </div>



        </div>
    </div>






    <div class="Footer">
        <p align="center"><br>This site is beta version<br>Daily-Basis reserves the right to change any of the
            information at any given time<br>All rights reserved © Daily-Basis 2023 </p>
    </div>

</body>

</html>