<?php
$host = "localhost";
$user = "root";
$pass = ""; // your MySQL password
$db = "coffee_house";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT id, name, password FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows == 1) {
    $stmt->bind_result($id, $name, $hashed_password);
    $stmt->fetch();

    if (password_verify($password, $hashed_password)) {
        session_start();
        $_SESSION['user_id'] = $id;
        $_SESSION['user_name'] = $name;
        echo "Login successful. Welcome, $name!";
        // header("Location: dashboard.php"); // Uncomment to redirect
    } else {
        echo "Incorrect password.";
    }
} else {
    echo "No user found with that email.";
}

$stmt->close();
$conn->close();
?>
