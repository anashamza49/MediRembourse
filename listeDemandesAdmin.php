<?php
    require "db.php";
    $stmt = $pdo->prepare(
        "SELECT * FROM demandes"
    );
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $fileArray = explode("_", $result["filesname"]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demandes Reçus</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&family=Ubuntu:wght@300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background: rgb(238, 174, 202);
            color: rgba(112, 34, 34, 1);
            background: radial-gradient(circle, rgb(230, 174, 198) 0%, rgba(148, 188, 233, 0.994) 100%);
        }

        .table-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        h2 {
            margin-top: 60px;
            text-align: center;
            padding: 25px 0;
            color: rgba(112, 34, 34, 1);
            font-weight: bold;
            background: linear-gradient(45deg, #0d47a1, #c2185b);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        table {
            width: 70%;
            border-collapse: collapse;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        }

        th,
        td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #ccc;
        }

        th {
            background-color: rgba(112, 34, 34, 1);
            color: #fff;
            border-bottom: 2px solid #D95353;
        }

        td {
            background-color: #fff;
        }

        .action-button {
            display: inline-block;
            padding: 8px 16px;
            margin: 2px;
            border: 1px solid #ccc;
            border-radius: 6px;
            text-decoration: none;
            color: white;
            background-color: rgba(112, 34, 34, 1);
            transition: background-color 0.3s ease;
            cursor: pointer;
        }

        .download {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        .download:hover {
            background-color: #fe5b3d;
            color: #fff;
        }

        .action-button:hover {
            background-color: #fe5b3d;
            color: #fff;
        }
    </style>
</head>

<body>
    <header>
        <a href="index.php" class="logo"><img src="img/Health-Insurance.png" alt="car-logo"></a>
        <div class="bx bx-menu" id="menu-icon"></div>
        <ul class="navbar">
            <li><a href="admin_page.php">Espace Admin</a></li>
            <li><a href="manage_clients.php">Gestion des comptes</a></li>
            <li><a href="changer-remboursement.php">Changer taux</a></li>
        </ul>
        <div class="header-btn">
            <a href="login.php" class="sign-in">Se déconnecter</a>
        </div>
    </header>
    <div class="container">
        <h2>Liste Des Demandes Reçus</h2>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Date</th>
                        <th>Type</th>
                        <th>Montant</th>
                        <th>Etat</th>
                        <th>Fichiers</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($result as $row) : ?>
                        <tr>
                            <td>
                                <?= $row["nom"] ?>
                            </td>
                            <td>
                                <?= $row["date"] ?>
                            </td>
                            <td>
                                <?= $row["type"] ?>
                            </td>
                            <td>
                                <?= $row["montant"] ?>
                            </td>
                            <td>
                                <?= $row["etat"] ?>
                            </td>
                            <td>
                                <?php
                                $files = explode('_', $row["filesname"]);
                                foreach ($files as $file) :
                                ?>
                                    <a class="download" href="<?= "demandes/" . $row["id"] . "_" . $file  ?>">TELECHARGER</a>
                                <?php
                                endforeach;
                                ?>
                            </td>
                            <td>
                                <a class="action-button" href="aprouverDemande.php?id=<?= $row["id"] ?>">Approuver</a>
                                <a class="action-button reject-link" href="#" data-id="<?= $row["id"] ?>">Rejeter</a>

                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const rejectLinks = document.querySelectorAll(".reject-link");

        rejectLinks.forEach(link => {
            // l'ajout d'un écouteur d'événement au clic sur chaque lien
            link.addEventListener("click", function(event) {
                event.preventDefault();
                const demandId = this.getAttribute("data-id");
                const rejectionReason = prompt("Raison du rejet :");

                if (rejectionReason !== null) {
                    // Envoie du texte de rejet au serveur
                    window.location.href = "rejeterDemande.php?id=" + demandId + "&reason=" + encodeURIComponent(rejectionReason);
                }
            });
        });
    });
</script>
<script src="https://unpkg.com/scrollreveal"></script>
<script src="main.js"></script>

</html>