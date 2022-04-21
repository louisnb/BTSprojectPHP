<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Competitions</title>
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
        <section class="competition">

<?php  
    $servername = 'localhost';
    $username = 'root';
    $password = '';

    $conn = new PDO("mysql:host=$servername;dbname=ping", $username, $password);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sth = $conn->prepare("SELECT COUNT(DISTINCT id) FROM competitions");
    $sth -> execute();
    $resultCount = $sth -> fetch();
    

    $nbrCompetitions = $resultCount['0'];

            
    $sth = $conn -> prepare("ALTER TABLE competitions AUTO_INCREMENT = $nbrCompetitions");
    $sth -> execute();
  
    $sth = $conn->prepare("SELECT * FROM competitions WHERE id = '1'");
                $sth -> execute();
                $result = $sth -> fetch();
                
                echo "<h2>";
                echo "Compétition " . $result['nom'];
                echo "</h2>";
                echo "<br/>";
                echo "<p>";
                echo "<strong>Type : </strong>" . $result['type'] . ".";
                echo "<br/><br/>";
                echo "<strong>Catégorie des joueurs : </strong>" . $result['categorieJoueur'];
                echo "</p>";
                echo "<p>";
                echo "<br/>";
                echo "<strong>Date : </strong>" . $result['date'] . ".";
                echo "<br/><br/>";
                echo "<strong>Ville : </strong>" . $result['ville'] . ".";
                echo "<br/><br/>";
                echo "<strong>Code Postal : </strong>" . $result['codePostal'] . ".";
                
?>
    <form method="post" action="competitions.php">
    <div class="submit">
        <button type="submit" name="supprimer">Supprimer</button>
    </div>
    </form>
    <?php 
    $sth = $conn -> prepare("DELETE FROM competitions WHERE id= '1'");
    if(isset($_POST['supprimer']))
    {
        $sth -> execute();
        header("Refresh:0.5");
    }

    

    ?>
    
    <form method="post" action="./modifierCompetition.php">
    <div class="submit">
        <button type="submit">Modifier</button>
    </div>
    </form>

        </section>
    </main>
    
  
</body>
</html>