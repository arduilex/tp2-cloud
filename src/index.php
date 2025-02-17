<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cloud - TP2</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>

    <div class="navbar">
        <a href="index.php">Accueil</a>
        <a href="add_video.php">Ajouter une vidéo</a>
        <a href="list_videos.php">Liste des vidéos</a>
    </div>

    <div class="container">
        <h1>Application Vidéo</h1>
        <p>Bienvenue sur l'application de gestion de vidéos</p>
        <div class="button-container">
            <form action="add_video.php">
                <button class="btn" type="submit">Ajouter une vidéo</button>
            </form>
            <form action="list_videos.php">
                <button class="btn" type="submit">Liste des vidéos</button>
            </form>
        </div>
    </div>

    <div class="footer">
        © <?php echo date("Y"); ?> - Application Vidéo | Créé par Alexandre
    </div>

</body>

</html>