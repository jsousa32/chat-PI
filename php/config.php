<?php 
    $conn = mysqli_connect("localhost", "root", "", "chat-real-time");
    if(!$conn){
        echo "Database conectada" . mysqli_connect_error();
    }
?>