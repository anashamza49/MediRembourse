<?php

    require "db.php";
    // Configuration d'affichage des erreurs pour le développement //
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $stmt = $pdo->prepare(
        "SELECT * FROM demandes WHERE id_client = :idClient"
    );
    session_start();
    $id = $_SESSION["idClient"];
    $stmt->bindValue(":idClient", $id);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <title>Mes Demandes</title>
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
            margin-top: 20px;
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

        .add-demande-container {
            text-align: center;
            margin-top: 20px;
        }

        .add-demande-link {
            display: inline-block;
            padding: 12px;
            margin-top: 20px;
            text-decoration: none;
            color: #fff;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <header>
        <a href="index.php" class="logo"><img src="img/Health-Insurance.png" alt="car-logo"></a>
        <div class="bx bx-menu" id="menu-icon"></div>
        <ul class="navbar">
            <li><a href="user_page.php">Mon Espace</a></li>
            <li><a href="addDemande.php">Ajouter une demande</a></li>
            <li><a href="page_calcul.php">Calcul</a></li>
        </ul>
        <div class="header-btn">
            <a href="login.php" class="sign-in">Se déconnecter</a>
        </div>
    </header>
    <div class="head">
        <h2>Mes demandes</h2>
    </div>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Montant</th>
                    <th>Etat</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $index => $row) : ?>
                    <tr class="<?= $index % 2 === 0 ? 'even' : 'odd' ?>">
                        <td><?= $row['nom'] ?></td>
                        <td><?= $row['date'] ?></td>
                        <td><?= $row['type'] ?></td>
                        <td><?= $row['montant'] ?></td>
                        <td><?= $row['etat'] ?></td>
                        <td><?= $row['description'] ?></td>
                        <td>
                            <a class="action-button" href="updateDemande.php?id=<?= $row['id'] ?>">Modifier</a>
                            <a class="action-button" href="removeDemande.php?id=<?= $row['id'] ?>">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="add-demande-container head">
        <a class="add-demande-link action-button" href="addDemande.php">Ajouter une demande</a>
    </div>
</body>
<script src="https://unpkg.com/scrollreveal"></script>
<script src="main.js"></script>
</html>