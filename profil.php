<?php session_start()?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Profil</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="./index.php">Accueil</a></li>
                <li><a href="./inscription.php">Inscription/ Connexion</a></li>
                <li><a href="./competitions.php">Competitions</a></li>
            </ul>
        </nav>
    </header>

    <main>
    
        
    </main>
    <?php
            //include '../components/connexdb.php';

    if(isset($_POST['mail']) && isset($_POST['motDePasse']))
            {
                $motDePasse = $_POST["motDePasse"];
                $email = $_POST["mail"];

                $_SESSION['mail'] = $email; 
                $_SESSION['mdp'] = $motDePasse;

            }
    else
    {
        
    }

    $servername = 'localhost';
    $username = 'root';
    $password = '';

    try{ 
        $conn = new PDO("mysql:host=$servername;dbname=ping", $username, $password);
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sth = $conn->prepare("SELECT * FROM adherants WHERE mail = '$email' AND mdp = '$motDePasse'");
        $sth -> execute();
        $result = $sth -> fetch();

        if($result == NULL && $email != NULL && $motDePasse != NULL)
        {
            echo "Identifiant ou mot de passe incorrect";
        }
    }
    
    catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
    }

?>
    
</body>
</html>