<?php
if(isset($_GET["id"])) {
    $clientId = $_GET["id"];
    require "db.php";
    
    $stmt = $pdo->prepare("DELETE FROM inscription WHERE id = :id");
    $stmt->bindParam(":id", $clientId);
    $stmt->execute();

    // Rediriger vers la page gestion comptes
    header("Location: manage_clients.php");
    exit();
} else {
    // Si l'ID du client n'est pas défini -> rediriger vers la page gestion comptes
    header("Location: manage_clients.php");
    exit();
}
?>
