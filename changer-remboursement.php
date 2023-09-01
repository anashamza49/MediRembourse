<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Changement du taux</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background: rgb(238, 174, 202);
            background: radial-gradient(circle, rgb(230, 174, 198) 0%, rgba(148, 188, 233, 0.994) 100%);
        }

        .container {
            max-width: 400px;
            margin: auto;
            background-color: rgba(112, 34, 34, 0.35);
            padding: 10px;
            margin-top: 10px;
            border-radius: 7px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        }

        h2 {
            margin-top: 80px;
            text-align: center;
            padding: 25px 0;
            color: rgba(112, 34, 34, 1);
            font-weight: bold;
            background: linear-gradient(45deg, #0d47a1, #c2185b);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        label {
            display: block;
            font-weight: bolder;
            color: #fff;
            margin-bottom: 8px;
        }

        input[type="number"] {
            width: 100%;
            padding: 14px;
            font-size: large;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: rgba(112, 34, 34, 1);
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 15px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 5px;
            margin-left: 140px;
        }

        button:hover {
            background-color: #ff714a;
        }

        #message {
            margin-top: 10px;
            padding: 10px;
            background-color: rgba(112, 34, 34, 1);
            color: white;
            border-radius: 5px;
            text-align: center;
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
            <li><a href="listeDemandesAdmin.php">Gestion des demandes</a></li>
        </ul>
        <div class="header-btn">
            <a href="login.php" class="sign-in">Se déconnecter</a>
        </div>
    </header>
    <div class="head">
    <h2>Changement Du Taux De Remboursement</h2>
    </div>

    <div class="container">
        <form id="remboursement-form">
            <label for="nouveauRemboursement">Nouveau taux :</label>
            <input type="number" id="nouveauRemboursement" step="0.1" min="0" max="0.9" required>
            <button type="submit">Changer</button>
        </form>
        <p id="message"></p>
    </div>

    <script>
        const remboursementForm = document.getElementById('remboursement-form');

        remboursementForm.addEventListener('submit', function(event) {
            event.preventDefault();

            const nouveauRemboursement = parseFloat(remboursementForm.elements.nouveauRemboursement.value);

            // Stockage de la nouvelle valeur de remboursement dans un cookie
            document.cookie = `nouveauRemboursement=${nouveauRemboursement}`;

            const messageElement = document.getElementById('message');
            messageElement.textContent = "Le taux de remboursement a été changé avec succès.";
        });
    </script>

</body>
<script src="https://unpkg.com/scrollreveal"></script>
<script src="main.js"></script>

</html>