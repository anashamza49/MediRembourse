<?php
    if(!isset($_GET["id"]))
    {
        header("location:listeDemandesAdmin.php");
        exit();
    }
    $id = $_GET["id"];
    require "db.php";
    $stmt = $pdo->prepare(
        "UPDATE demandes SET etat = :etat , description = :description WHERE id = :id"
    );
    $stmt->bindValue(":etat" , "Approuvée");
    $stmt->bindParam(":id",$id);
    $stmt->bindValue(":description" , "");
    $stmt->execute();
    header("location:listeDemandesAdmin.php");

?>