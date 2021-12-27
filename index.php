<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="">Accueil</a></li>
                <li><a href="./inscription.php">Inscription/ Connexion</a></li>
                <li><a href="./competitions.php">Competitions</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Accueil</h1>
        
        <div class="accueil">
            <img src="./images/accueil.jpg" alt="">
        </div>
    </main>

    <?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '../vendor/autoload.php';

$app = AppFactory::create();
$app->addErrorMiddleware(true, true, true);
$app->setBasePath("/project_folder/api");

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});

$app->run();
?>
</body>
</html>