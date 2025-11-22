<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coffee_house";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $conn->real_escape_string($_POST['first_name']);
    $last_name = $conn->real_escape_string($_POST['last_name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $message = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO bookings (first_name, last_name, email, phone, message) VALUES ('$first_name', '$last_name', '$email', '$phone', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "
        <div class='success-message'>
            <h2>🎉 Booking Confirmed!</h2>
            <p>Thank you, $first_name! Your table has been successfully booked. We can't wait to see you!</p>
            <a href='index.html' class='back-btn'>Back to Home</a>
        </div>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
