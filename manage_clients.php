<?php
    require "db.php";
    //  récupérer les informations des clients
    $stmt = $pdo->prepare("SELECT * FROM inscription");
    $stmt->execute();
    $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Gestion Comptes</title>
    <style>
        body {
            background: rgb(238, 174, 202);
            color: rgba(112, 34, 34, 1);
            background: radial-gradient(circle, rgb(230, 174, 198) 0%, rgba(148, 188, 233, 0.994) 100%);
        }

        h2 {
            margin-top: 90px;
            text-align: center;
            padding: 25px 0;
            color: rgba(112, 34, 34, 1);
            font-weight: bold;
            background: linear-gradient(45deg, #0d47a1, #c2185b);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .table-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
        }

        table {
            width: 80%;
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
        td{
            background-color: #fff;
        }
        th {
            background-color: rgba(112, 34, 34, 1);
            color: #fff;
            border-bottom: 2px solid #D95353;
        }

        tr.even {
            background-color: #f2f2f2;
        }

        tr.odd {
            background-color: #ffffff;
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
            <li><a href="listeDemandesAdmin.php">Gestion des demandes</a></li>
            <li><a href="changer-remboursement.php">Changer taux</a></li>
        </ul>
        <div class="header-btn">
            <a href="login.php" class="sign-in">Se déconnecter</a>
        </div>
    </header>
    <div class="head">
        <h2>Les Comptes Des Assurés</h2>
    </div>
    <div class="table-container head">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($clients as $client) : ?>
                    <tr>
                        <td><?= $client["id"] ?></td>
                        <td><?= $client["nom"] ?></td>
                        <td><?= $client["prenom"] ?></td>
                        <td><?= $client["email"] ?></td>
                        <td><?= $client["tel"] ?></td>
                        <td>
                            <a class="action-button" href="supprimerClient.php?id=<?= $client["id"] ?>">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
<script src="https://unpkg.com/scrollreveal"></script>
<script src="main.js"></script>
</html>