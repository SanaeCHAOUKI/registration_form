<?php
    session_start();

    include("database.php");

    if($_SERVER['REQUEST_METHOD'] == "POST" ){
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];

        if( filter_var($email, FILTER_VALIDATE_EMAIL) &&
            is_numeric($telephone) &&
            preg_match("/^[a-zA-ZÀ-ÿ\s'-]+$/", $nom) &&
            preg_match("/^[a-zA-ZÀ-ÿ\s'-]+$/", $prenom) ) 
        {

            $query = "INSERT INTO users(nom, prenom, email, telephone) VALUES ('$nom', '$prenom', '$email', '$telephone')";
            
            mysqli_query($conn, $query);

            echo"<script type='text/javascript'> alert('Informations envoyées avec succès.') </script>";
        }
        else{
            echo"<script type='text/javascript'> alert('Veuillez saisir des informations valides!') </script>";
        }

    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div>
        <img src="images/login-logo.png" alt="login logo">
        
        <form action="database-conn.php" method="POST" >
            <input type="text" id="nom" name="nom" placeholder="Entrez votre nom" required> <br>
            <input type="text" id="prenom" name="prenom" placeholder="Entrez votre prénom" required> <br>
            <input type="email" id="email" name="email" placeholder="Entrez votre e-mail" required> <br>
            <input type="text" id="telephone" name="telephone" placeholder="Entrez votre numéro de telephone" required> <br>
            <button type="submit"><b>Envoyer</b></button>
        </form>
    </div>
</body>
</html>
