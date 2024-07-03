<?php
// Include the authentication file
include('../authentication/db.php');

$btn =  $_POST['addBtn'];
// Create Event
if (isset($btn)) {
    $title = $_POST['title'];
    $date = $_POST['date'];

    $sql = "INSERT INTO `events`(`title`, `date`) VALUES ('$title','$date')";
    mysqli_query($conn,$sql);
    echo "Success";
}

// Read Events
// $events = [];
// $sql = "SELECT * FROM events";
// $stmt = $pdo->query($sql);
// while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//     $events[] = $row;
// }

// Update Event
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Update'])) {
    $eventId = $_POST['event_id'];
    $newTitle = $_POST['new_title'];
    $newDate = $_POST['new_date'];

    $sql = "UPDATE events SET title = :newTitle, date = :newDate WHERE id = :eventId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':newTitle', $newTitle);
    $stmt->bindParam(':newDate', $newDate);
    $stmt->bindParam(':eventId', $eventId);
    $stmt->execute();
}

// Delete Event
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Delete'])) {
    $eventId = $_POST['event_id'];

    $sql = "DELETE FROM events WHERE id = :eventId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':eventId', $eventId);
    $stmt->execute();
}

?>