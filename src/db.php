<?php
// Connexion à la base de données
$servername = "db";
$username = "alex";
$password = "azerty";
$database = "yt";

function connectDB() {
    $conn = new mysqli($GLOBALS['servername'], $GLOBALS['username'], $GLOBALS['password'], $GLOBALS['database']);

    if ($conn->connect_error) {
        die("Échec de la connexion : " . $conn->connect_error);
    }

    return $conn;
}

// Fonction pour ajouter une vidéo
function addVideo($title, $video_id, $comment) {
    $conn = connectDB();
    $stmt = $conn->prepare("INSERT INTO videos (title, video_id, comment) VALUES (?, ?, ?)");
    if (!$stmt) {
        return "Erreur de préparation : " . $conn->error;
    }
    
    $stmt->bind_param("sss", $title, $video_id, $comment);
    $success = $stmt->execute();
    $stmt->close();
    $conn->close();

    return $success ? true : "Erreur lors de l'ajout : " . $conn->error;
}

// Fonction pour récupérer toutes les vidéos
function getVideos() {
    $conn = connectDB();
    $sql = "SELECT id, title FROM videos";
    $result = $conn->query($sql);
    $videos = [];

    while ($row = $result->fetch_assoc()) {
        $videos[] = $row;
    }

    $conn->close();
    return $videos;
}

// Fonction pour récupérer une vidéo par ID
function getVideoById($id) {
    $conn = connectDB();
    $stmt = $conn->prepare("SELECT title, video_id, comment FROM videos WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $video = $result->fetch_assoc();
    
    $stmt->close();
    $conn->close();
    
    return $video;
}

// Fonction pour supprimer une vidéo
function deleteVideo($id) {
    $conn = connectDB();
    $stmt = $conn->prepare("DELETE FROM videos WHERE id = ?");
    $stmt->bind_param("i", $id);
    $success = $stmt->execute();
    
    $stmt->close();
    $conn->close();

    return $success;
}

?>
