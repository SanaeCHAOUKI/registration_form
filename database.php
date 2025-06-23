<?php

    $conn = mysqli_connect("localhost", "root", "", "users_db");
    
    if (!$conn) {
        die("Connexion échouée : " . mysqli_connect_error());
    }
?>