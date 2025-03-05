<?php

include "conn.php";

$id = $_GET["id"];


$query = "DELETE FROM notes where Id=$id";

$result = mysqli_query($conn, $query);

if ($result) {
    header("Location: index.php");
    exit();
}
?>