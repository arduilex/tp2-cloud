<?php
require_once "db.php";

if (!isset($_GET["id"]) || empty($_GET["id"])) {
    die("ID de la vidéo manquant.");
}

$id = intval($_GET["id"]);
$video = getVideoById($id);

if (!$video) {
    die("Vidéo non trouvée.");
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($video["title"]); ?></title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>

    <div class="navbar">
        <a href="index.php">Accueil</a>
        <a href="add_video.php">Ajouter une vidéo</a>
        <a href="list_videos.php">Liste des vidéos</a>
    </div>


    <div class="container">
        <h1><?php echo htmlspecialchars($video["title"]); ?></h1>
        <div class="video-container">
            <iframe src="https://www.youtube.com/embed/<?php echo htmlspecialchars($video["video_id"]); ?>" allowfullscreen></iframe>
        </div>

        <p><strong>Commentaire :</strong> <?php echo nl2br(htmlspecialchars($video["comment"])); ?></p>
        <br>
        <div class="button-container">
            <form action="list_videos.php">
                <button class="btn" type="submit">Retour à la liste</button>
            </form>
        </div>
    </div>

    <div class="footer">
        © <?php echo date("Y"); ?> - Application Vidéo | Créé par Alexandre
    </div>


</body>

</html>