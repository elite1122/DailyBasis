<?php


$message = $_POST['message'];

include('../authentication/db.php');
echo $message;

$sql = "INSERT INTO `notebook`(`message`) VALUES ('$message')";
mysqli_query($conn, $sql);

// $message = $_POST['message'];
// // Include the authentication file
// include('../authentication/db.php');

// try {
    
//     $sql = "INSERT INTO notebook('message') VALUES ('$message')";
//     mysqli_query($conn, $sql);

//     // Example usage: echo the value of $message
//     echo $message;

//     // Create Event
//     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//         $message = $_POST['message'];

//         $sql = "INSERT INTO `notebook`(`message`) VALUES ('$message')";
//         $stmt = $pdo->prepare($sql);
//         $stmt->bindParam(':message', $message);
//         $stmt->execute();
//     }

//     // Read Events
//     $events = [];
//     $sql = "SELECT * FROM notebook";
//     $stmt = $pdo->query($sql);
//     while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//         $events[] = $row;
//     }

//     // Update Event
//     if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {
//         $id = $_POST['id'];
//         $newMessage = $_POST['newMessage'];

//         $sql = "UPDATE notebook SET message = :newMessage WHERE id = :id";
//         $stmt = $pdo->prepare($sql);
//         $stmt->bindParam(':newMessage', $newMessage);
//         $stmt->bindParam(':id', $id);
//         $stmt->execute();
//     }

//     // Delete Event
//     if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
//         $id = $_POST['id'];

//         $sql = "DELETE FROM notebook WHERE id = :id";
//         $stmt = $pdo->prepare($sql);
//         $stmt->bindParam(':id', $id);
//         $stmt->execute();
//     }
// } catch (PDOException $e) {
//     echo "Error: " . $e->getMessage();
// }
?>
