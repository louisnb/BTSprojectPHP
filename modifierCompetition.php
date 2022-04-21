<!--<?php
    //include '../components/session.php';
    ?>-->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>modifierCompetition</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="./profilAdmin.php">Accueil</a></li>
                <li><a href="./competitions.php">Competitions</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <form method="post">
                <div class="sign">
                    <label for="nom">Modifiez le nom de la compétition</label>
                    <input type="nom" id="nom" name="nom" placeholder="Critérium départemental" required>
                </div>

                <div class="sign">
                    <label for="type">Modifiez le type de Compétition</label>
                    <input type="type" id="type" name="type" placeholder="Individuelle" required>
                </div>

                <div class="sign">
                    <label for="catégorie joueur">Modifiez la catégorie des joueurs inscrits</label>
                    <input type="categorieJoueur" id="categorieJoueur" name="categorieJoueur" placeholder="Senior" required>
                </div>

                <div class="sign">
                    <label for="date">Modifiez la date</label>
                    <input type="date" id="date" name="date" placeholder="24/07/2000" required>
                </div>

                <div class="sign">
                    <label for="ville">Modifiez la ville</label>
                    <input type="ville" id="ville" name="ville" placeholder="Montpellier" required>
                </div>

                <div class="sign">
                    <label for="code postal">Modifiez le code postal</label>
                    <input type="number" id="codePostal" name="codePostal" placeholder="34000" required>
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

        //include '../components/connexdb.php';

       // if(isset($_SESSION['mail']) && isset($_SESSION['mdp']))
       // {
       //     $mail = $_SESSION['mail'];
       //     $motDePasse = $_SESSION['mdp'];
       // }

        if(isset($_POST['nom']) && isset($_POST['type']) && isset($_POST['categorieJoueur']) && isset($_POST['date']) && isset($_POST['ville']) && isset($_POST['codePostal']))
        {
            $nom = $_POST['nom'];
            $type = $_POST['type'];
            $categorieJoueur = $_POST['categorieJoueur'];
            $date = $_POST['date'];
            $ville = $_POST['ville'];
            $codePostal = $_POST['codePostal'];
        }
        else
        {
            $nom = NULL;
            $type = NULL;
            $categorieJoueur = NULL;
            $date = NULL;
            $ville = NULL;
            $codePostal = NULL;
        }

        try
        {
            $conn = new PDO("mysql:host=$servername;dbname=ping", $username, $password);
            $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sth = $conn -> prepare("UPDATE competitions SET nom = '$nom', type = '$type', categorieJoueur = '$categorieJoueur', date = '$date', ville = '$ville', codePostal = '$codePostal'");

            if(isset($_POST['nom']) && isset($_POST['type']) && isset($_POST['categorieJoueur']) && isset($_POST['date']) && isset($_POST['ville']) && isset($_POST['codePostal']))
            {
                $sth -> execute();

                echo 'Vos informations ont bien été changées !';
            }
        }
        catch(PDOException $e)
        {
            echo "Erreur : " . $e->getMessage();
        }
    ?>
    </div>
</body>
</html>