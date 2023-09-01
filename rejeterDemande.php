<?php
    if(!isset($_GET["id"]) || !isset($_GET["reason"]))
    {
        header("location:listeDemandesAdmin.php");
        exit();
    }
   
        $id = $_GET["id"];
        $reason = $_GET["reason"];
        require "db.php";
        $stmt = $pdo->prepare(
            "UPDATE demandes SET etat = :etat , description = :reason WHERE id = :id"
        );
        $stmt->bindValue(":etat" , "Rejetée");
        $stmt->bindParam(":id",$id);
        $stmt->bindValue(":reason" , $reason);
        $stmt->execute();
        header("location:listeDemandesAdmin.php");

  
?>
