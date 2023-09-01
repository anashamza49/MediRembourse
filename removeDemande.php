<?php
    if (isset($_GET["id"]))
    {
        $id = $_GET["id"];
        require "db.php";
        $stmt = $pdo->prepare(
            "DELETE FROM demandes WHERE id = :id"
        );
        $stmt->bindValue(":id" , $id);
        $stmt->execute();
        header('Location:listeDemandes.php');
    }
?>