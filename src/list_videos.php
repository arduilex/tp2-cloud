<?php
require_once "db.php";

// Suppression d'une vidéo si "delete" est appelé
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_id"])) {
    $delete_id = intval($_POST["delete_id"]);
    if (deleteVideo($delete_id)) {
        $message = "Vidéo supprimée avec succès.";
    } else {
        $error = "Erreur lors de la suppression.";
    }
}

// Récupération des vidéos
$videos = getVideos();
?>

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
        <h1>Liste des vidéos</h1>

        <?php if (!empty($message)) : ?>
            <p style="color:green;"><?php echo $message; ?></p>
        <?php endif; ?>

        <?php if (!empty($error)) : ?>
            <p style="color:red;"><?php echo $error; ?></p>
        <?php endif; ?>

        <ul>
            <?php if (!empty($videos)) : ?>
                <?php foreach ($videos as $video) : ?>
                    <li class="video-item">
                        <span><?php echo htmlspecialchars($video["title"]); ?></span>
                        <div>
                            <form action="view_video.php" method="GET" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $video["id"]; ?>">
                                <button class="btn" type="submit">Voir</button>
                            </form>
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="delete_id" value="<?php echo $video["id"]; ?>">
                                <button class="btn delete-btn" type="submit">Supprimer</button>
                            </form>
                        </div>
                    </li>
                <?php endforeach; ?>
            <?php else : ?>
                <li>Aucune vidéo enregistrée.</li>
            <?php endif; ?>
        </ul>

        <div class="button-container">
            <form action="index.php">
                <button class="btn" type="submit">Retour à l'accueil</button>
            </form>
        </div>

        <div class="footer">
            © <?php echo date("Y"); ?> - Application Vidéo | Créé par Alexandre
        </div>

</body>

</html>