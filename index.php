<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <h1>Simulation de jeu de moustique</h1>

    <!--Bouton jourer-->
    <form method="post">
        <button type="submit" name="start">Jouer</button>
    </form>

    <!--Bouton rejouer-->
    <form method="post">
        <button type="submit" name="restart">Rejouer</button>
    </form>

    <?php
    session_start();

    use Class\Game;

    require_once './vendor/autoload.php';

    // Instancier le jeu
    $game = new Game();

    // Attaque le moustique
    if (isset($_POST['start'])) {
        echo '<ul>';
        echo $game->randomMosquito(true);
        echo '</ul>';
    }

    // Recommence le jeu
    if (isset($_POST['restart']) || !isset($_POST['start'])) {
        session_unset();
        echo '<ul>';
        echo $game->randomMosquito(false);
        echo '</ul>';
    }

    ?>
</body>

</html>