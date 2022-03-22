<?php session_start()?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Connexion</title>
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
    <p>Veuillez-vous <a href="./inscription.php">inscrire</a> avant de vous connecter</p>
        <section>
            <form method="post" action="./profil.php">
            <div class="sign">
                    <label for="email">Entrez votre adresse e-mail</label>
                    <input type="email" id="mail" name="mail" placeholder="pierre.smith@example.com" required>
                </div>

                <div class="sign">
                    <label for="password">Entrez votre mot de passe</label>
                    <input type="password" id="mdp" name="motDePasse" placeholder="*********">
                </div>

                <div class="submit">
                    <button type="submit">Envoyer</button>
                </div>
            </form>
        </section>
    </main>

    
</body>
</html>