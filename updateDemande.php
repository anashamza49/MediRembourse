<?php
    $errFileType = "";
    $errChamps = "";

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if (!isset($_GET["id"])) {
        header("location:listeDemandes.php");
        exit();
    }

    $idDemande = $_GET["id"];
    require "db.php";
    $stmt = $pdo->prepare(
        "SELECT * FROM demandes WHERE id = :id"
    );
    $stmt->bindValue(":id", $idDemande);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["nom"])) {
        $nom = $_POST["nom"];
        $date = $_POST['dateBulletin'];
        $type = $_POST["typeSoin"];
        $montant = $_POST["montant"];

        if (!empty($nom) && !empty($date) && !empty($type) && !empty($montant)) {
            if (!is_numeric($montant)) {
                $errMontant = "Le montant doit être un numéro !";
            }
        } else {
            $errChamps = "Veuillez remplir tous les champs !";
        }

        if (empty($errChamps) && empty($errMontant)) {
            $stmt = $pdo->prepare(
                "UPDATE demandes SET nom = :nom , date = :date , type = :type , montant = :montant WHERE id = :id"
            );
            $stmt->bindValue(":nom", $nom);
            $stmt->bindValue(":date", $date);
            $stmt->bindValue(":type", $type);
            $stmt->bindValue(":montant", $montant);
            $stmt->bindValue(":id", $idDemande);
            $stmt->execute();

            header("location:listeDemandes.php");
            exit();
        }
    } else {
        header("location:listeDemandes.php");
        exit();
    }
}

foreach ($result as $row) :
    $nomAssureValue = $row["nom"];
    $dateBulletinValue = $row["date"];
    $typeSoinValue = $row["type"];
    $montantValue = $row["montant"];
    $filesname = $row["filesname"];
    $existingFiles = explode("_", $filesname);
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
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu:400,700&display=swap">
        <title>Modifier Demande</title>
        <style>
            body {
                background: rgb(238, 174, 202);
                background: radial-gradient(circle, rgb(230, 174, 198) 0%, rgba(148, 188, 233, 0.994) 100%);
                font-weight: lighter;
            }
            .container {
                max-width: 550px;
                margin: auto;
                background-color: rgba(112, 34, 34, 0.35);
                color: rgb(112, 28, 28);
                padding: 10px;
                margin-top: 20px;
                margin-bottom: 40px;
                border-radius: 7px;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            }
            h2 {
                margin-top: 90px;
                text-align: center;
                padding: 25px 0;
                color: rgba(112, 34, 34, 1);
                background: linear-gradient(45deg, #0d47a1, #c2185b);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }
            label {
                display: block;
                margin-bottom: 5px;
            }
            input[type="text"], input[type="date"], select, input[type="number"], input[type="file"] {
                width: 100%;
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ccccccd0;
                border-radius: 8px;
            }

            select {
                height: 38px;
            }

            input[type="submit"] {
                background-color: rgba(112, 34, 34, 1);
                color: #ffffff;
                margin-left: 175px;
                padding: 10px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            input[type="submit"]:hover {
                background-color: #fe5b3d;
                transform: scale(1.06, 1);
            }
        </style>
    </head>

    <body>
        <header>
            <a href="#" class="logo"><img src="img/Health-Insurance.png" alt="car-logo"></a>
            <div class="bx bx-menu" id="menu-icon"></div>
            <ul class="navbar">
                <li><a href="user_page.php">Mon Espace</a></li>
                <li><a href="addDemande.php">Ajouter une demande</a></li>
                <li><a href="listeDemandes.php">Consulter mes demandes</a></li>
                <li><a href="page_calcul.php">Calcul</a></li>
            </ul>
            <div class="header-btn">
                <a href="login.php" class="sign-in">Se déconnecter</a>
            </div>
        </header>
        <div class="head">
            <h2>Modifier la demande de Remboursement</h2>
        </div>
        <div class="container">
            <form action="#" method="post">
                <label for="nom">Nom d'assuré</label>
                <input type="text" id="nomAssure" name="nom" value="<?= $row["nom"] ?>">
                <label for="dateBulletin">Date du bulletin de soin :</label>
                <input type="date" id="dateBulletin" name="dateBulletin" value="<?= $row["date"] ?>" required>

                <label for="typeSoin">Type de soin :</label>
                <select id="typeSoin" name="typeSoin" required>
                    <option value="consultation" selected>Consultation médicale</option>
                    <option value="traitement">Traitement médical</option>
                    <option value="chirurgie">Chirurgie</option>
                </select>

                <label for="montant">Montant :</label>
                <input type="number" id="montant" name="montant" step="10" value="<?= $row["montant"] ?>" required>
                <label for="documents">Télécharger les nouveaux documents :</label>
                <input type="file" id="documents" name="documents[]" multiple accept=".pdf">

                <p>Documents existants :</p>
                <ul>
                    <?php foreach ($existingFiles as $file) : ?>
                        <li><?= $file ?></li>
                    <?php endforeach; ?><br>
                </ul>
                <input type="submit" value="Modifier la demande">
            </form>
            <p><?= $errFileType ?></p>
            <p><?= $errChamps ?></p>
        </div>
    <?php
endforeach;
    ?>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="main.js"></script>
    </body>

    </html>