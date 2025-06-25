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
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');
        body{
            background: linear-gradient(130deg,#E8988A,#2A1458);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            font-family: "Raleway", sans-serif ;
        }

        div{
            background-color: rgba(255, 255, 255, 0.151);
            width: 100px;
            height: 180px;
            margin: auto;
            padding: 100px;
            display: block;
            text-align: left;
            border-radius: 30px;
            margin-top: 100px;
            backdrop-filter: blur(2px);
            box-shadow: 0 1px 18px #000000ea;
        }
        h1{
            color: whitesmoke;
            margin-top: -30px;
            margin-left: -16px;
        }
        input{
            border-radius: 20px;
            margin: 3px;
            padding: 9px;
            width: 220px;
            margin-left: -68px;
            border: none;
            font-size: small;
        }
        form{
            align-items: center;
            margin-top: 25px;
        }
        input:focus{
            background-color: rgb(185, 185, 185);
            outline: none;
        }
        button:active{
            transform: scale(0.96);
        }
        button {
            position: relative;
            margin: 5px;
            padding: 9px;
            margin-left: -50px;
            cursor: pointer;
            border: none;
            width: 200px;
            border-radius: 20px;
            outline: none;
            background: linear-gradient(90deg, #EC37D0, #D92B2B, #FFAA0D, #EC37D0);
            background-size: 400%;
            color: #fff;
            letter-spacing: 1px;
        }
button::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: -1;
  background: linear-gradient(90deg, #EC37D0, #D92B2B, #FFAA0D, #EC37D0);
  background-size: 400%;
  border-radius: 50px;
  opacity: 0;
  transition: .5s;
}
button:hover {
  animation: animate 10s linear infinite;
}
button:hover::before {
  filter: blur(25px);
  opacity: .8;
  animation: animate 10s linear infinite;
}
@keyframes animate {
  0% {
    background-position: 0%;
  }
  100% {
    background-position: 400%;
  }
}
    </style>
</head>
<body>
    <div>
        <h1>s'inscrire</h1>
        
        <form action="index.php" method="POST" >
            
            <input type="text" id="nom" name="nom" placeholder="Entrez votre nom" required> <br>
            <input type="text" id="prenom" name="prenom" placeholder="Entrez votre prénom" required> <br>
            <input type="email" id="email" name="email" placeholder="Entrez votre e-mail" required> <br>
            <input type="text" id="telephone" name="telephone" placeholder="Entrez votre numéro de telephone" required> <br>
            <button type="submit"><b>Envoyer</b></button>
            
        </form>
    </div>
</body>
</html>
