<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$errFileType = "";
$errChamps = "";
$filesName = "";

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["nomAssure"]) && isset($_SESSION["idClient"])) {
        $nom = $_POST["nomAssure"];
        $date = $_POST['dateBulletin'];
        $type = $_POST["typeSoin"];
        $montant = $_POST["montant"];
        $files = $_FILES["documents"];

        if (!empty($nom) && !empty($date) && !empty($type) && !empty($montant)) {
            $cleanFileNames = array_map(function ($name) {
                $cleanedName = strtolower(preg_replace('/[^a-zA-Z0-9_.]/', '', $name));
                return $cleanedName;
            }, $files["name"]);

            foreach ($cleanFileNames as $key => $cleanedName) {
                $pdfFileType = strtolower(pathinfo($cleanedName, PATHINFO_EXTENSION));
                if ($pdfFileType !== "pdf") {
                    $errFileType = "Le format de fichier doit être en PDF !";
                    break;
                }
            }

            $filesName = implode("_", $cleanFileNames);

            if (empty($errFileType)) {
                require "db.php";
                $stmt = $pdo->prepare(
                    "INSERT into demandes (nom , date , type , montant , filesname, id_client) VALUES(:nom , :date , :type ,  :montant , :filesname,:idClient)"
                );
                $stmt->bindValue("nom", $nom);
                $stmt->bindValue('date', $date);
                $stmt->bindValue('type', $type);
                $stmt->bindValue('montant', $montant);
                $idClient = $_SESSION["idClient"];
                $stmt->bindValue('filesname', $filesName);
                $stmt->bindValue('idClient', $idClient);
                $stmt->execute();
                $id = $pdo->lastInsertId();

                foreach ($files["tmp_name"] as $key => $tmp_name) {
                    $newFileName = $id . "_" . $files["name"][$key];
                    move_uploaded_file($tmp_name, "demandes/" . $newFileName);
                }

                header("location:listeDemandes.php");
            } else {
                $errFileType = "Les fichiers doivent être en PDF !";
                exit;
            }
        } else {
            $errChamps = "Veuillez remplir tous les champs !";
        }
    } else {
        header("location:login.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande Remboursement</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<style>
    body {
        background: rgb(238, 174, 202);
        background: radial-gradient(circle, rgb(230, 174, 198) 0%, rgba(148, 188, 233, 0.994) 100%);
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
        font-weight: bold;
        background: linear-gradient(45deg, #0d47a1, #c2185b);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input[type="text"],
    input[type="date"],
    select,
    input[type="number"],
    input[type="file"] {
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

<body>
    <header>
        <a href="#" class="logo"><img src="img/Health-Insurance.png" alt="car-logo"></a>
        <div class="bx bx-menu" id="menu-icon"></div>
        <ul class="navbar">
            <li><a href="user_page.php">Mon Espace</a></li>
            <li><a href="listeDemandes.php">Consulter mes demandes</a></li>
            <li><a href="page_calcul.php">Calcul</a></li>
        </ul>
        <div class="header-btn">
            <a href="index.php" class="sign-in">Se déconnecter</a>
        </div>
    </header>

    <div class="head">
        <h2>Demande de Remboursement</h2>
    </div>

    <div class="container">
        <form action="#" method="post" enctype="multipart/form-data">
            <label for="nomAssure">Nom de l'assuré :</label>
            <input type="text" id="nomAssure" name="nomAssure" required>

            <label for="dateBulletin">Date du bulletin de soin :</label>
            <input type="date" id="dateBulletin" name="dateBulletin" required>

            <label for="typeSoin">Type de soin :</label>
            <select id="typeSoin" name="typeSoin" required>
                <option value="consultation">Consultation médicale</option>
                <option value="traitement">Traitement médical</option>
                <option value="chirurgie">Chirurgie</option>
            </select>

            <label for="montant">Montant :</label>
            <input type="number" id="montant" name="montant" step="10" required>

            <label for="documents">Télécharger les documents demandés :</label>
            <input type="file" id="documents" name="documents[]" multiple accept=".pdf">

            <input type="submit" value="Soumettre la demande">
        </form>
        <p>
            <?= $errFileType ?>
        </p>
        <p>
            <?= $errChamps ?>
        </p>
    </div>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="main.js"></script>
</body>

</html>