<?php
require_once "db.php";

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST["title"]);
    $video_id = trim($_POST["video_id"]);
    $comment = trim($_POST["comment"]);

    if (!preg_match('/^[a-zA-Z0-9_-]{11}$/', $video_id)) {
        $error = "L'ID YouTube fourni est invalide.";
    } else {
        $result = addVideo($title, $video_id, $comment);
        if ($result === true) {
            $success = "Vidéo ajoutée avec succès !";
        } else {
            $error = $result;
        }
    }
}
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
        <h1>Ajouter une vidéo</h1>

        <?php if (!empty($error)) : ?>
            <p style="color:red;"><?php echo $error; ?></p>
        <?php endif; ?>

        <?php if (!empty($success)) : ?>
            <p style="color:green;"><?php echo $success; ?></p>
        <?php endif; ?>

        <form method="POST">
            <label for="title">Titre de la vidéo :</label><br>
            <input type="text" name="title" required><br>

            <label for="video_id">ID YouTube :</label><br>
            <input type="text" name="video_id" required><br>

            <label for="comment">Commentaire :</label><br>
            <textarea name="comment" required></textarea><br>

            <button class="add-btn btn" type="submit">Ajouter</button>
        </form>
        <br>
        <div class="button-container">
            <form action="index.php">
                <button class="btn" type="submit">Retour à l'accueil</button>
            </form>
        </div>

    </div>

    <div class="footer">
        © <?php echo date("Y"); ?> - Application Vidéo | Créé par Alexandre
    </div>


</body>

</html>