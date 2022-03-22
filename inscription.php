<?php session_start()?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Inscription</title>
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
    <a href="./connexion.php">Connectez-vous</a>
        <section>
            <form method="post">
                <div class="sign">
                    <label for="nom">Entrez votre nom</label>
                    <input type="nom" id="nom" name="nom" placeholder="Smith" required>
                </div>

                <div class="sign">
                    <label for="prenom">Entrez votre prenom</label>
                    <input type="prenom" id="prenom" name="prenom" placeholder="Pierre" required>
                </div>

                <div class="sign">
                    <label for="Adresse postale">Entrez votre adresse postale</label>
                    <input type="adresse" id="adresse" name="adresse" placeholder="3 rue du Pont-neuf" required>
                </div>

                <div class="sign">
                    <label for="code postal">Entrez votre code postal</label>
                    <input type="CP" id="codePostal" name="codePostal" placeholder="34000" required>
                </div>

                <div class="sign">
                    <label for="ville">Entrez votre ville</label>
                    <input type="ville" id="ville" name="ville" placeholder="Lyon" required>
                </div>

                <div class="sign">
                    <label for="email">Entrez votre adresse e-mail</label>
                    <input type="email" id="mail" name="mail" placeholder="pierre.smith@example.com" required>
                </div>

                <div class="sign">
                    <label for="password">Entrez votre mot de passe</label>
                    <input type="password" id="mdp" name="mdp" placeholder="*********" required>
                </div>

                <div class="sign">
                    <label for="password">Vérifiez votre mot de passe</label>
                    <input type="password" id="password" placeholder="*********" required>
                </div>

                <div class="submit">
                    <button type="submit">Envoyer</button>
                </div>
            </form>
        </section>
    </main>

    <?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';

   

    if (isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["adresse"]) && isset($_POST["codePostal"]) && isset($_POST["ville"]) && isset($_POST["mail"]) && isset($_POST["mdp"]))
        {
            $nom = $_POST["nom"];
            $prenom = $_POST["prenom"];
            $adresse = $_POST["adresse"];
            $codePostal = $_POST["codePostal"];
            $ville = $_POST["ville"];
            $mail = $_POST["mail"];
            $_SESSION["mail"] = $mail;
            $mdp = $_POST["mdp"];
            $_SESSION["mdp"] = $mdp;
        } 
        else 
        {
            $nom = NULL;
            $prenom = NULL;
            $adresse = NULL;
            $codePostal = NULL;
            $ville = NULL;
            $mail = NULL;
            $mdp = NULL;
        }

        try{ 
            $conn = new PDO("mysql:host=$servername;dbname=ping", $username, $password);
            $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sth = $conn->prepare("SELECT COUNT(DISTINCT id) FROM adherents");
            $sth -> execute();
            $resultCount = $sth -> fetch();

            $nbrAdherents = $resultCount['0'];

            
            $sth = $conn -> prepare("ALTER TABLE adherents AUTO_INCREMENT = $nbrAdherents");
            $sth -> execute();
        
            $sth = $conn->prepare("INSERT INTO adherents VALUES(:id, :nom, :prenom, :adresse, :codePostal, :ville, :mail, :mdp)");

            $sth -> bindParam(':id', $id);
            $sth -> bindParam(':nom', $nom);
            $sth -> bindParam(':prenom', $prenom);
            $sth -> bindParam(':adresse', $adresse);
            $sth -> bindParam(':codePostal', $codePostal);
            $sth -> bindParam(':ville', $ville);
            $sth -> bindParam(':mail', $mail);
            $sth -> bindParam(':mdp', $mdp);
            $sth -> execute();
        }

        catch(PDOException $e){
           //echo "Erreur : " . $e->getMessage();
        }

    ?>
    
</body>
</html>