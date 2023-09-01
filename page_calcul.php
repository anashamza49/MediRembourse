<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcul Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&family=Ubuntu:wght@300&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <style>
        body {
            background: rgb(238, 174, 202);
            background: radial-gradient(circle, rgb(230, 174, 198) 0%, rgba(148, 188, 233, 0.994) 100%);
            font-family: 'Ubuntu', sans-serif;
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
        .container {
            max-width: 720px;
            margin: auto;
            margin-top: 30px;
            background-color: rgba(112, 34, 34, 0.35);
            color: rgb(112, 28, 28);
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            border-radius: 20px;
        }
        .calculator {
            margin-bottom: 20px;
            padding: 10px;
            font-size: 21px;
            border: solid silver;
            border-radius: 10px;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bolder;
        }
        select {
            padding: 5px;
        }
        input {
            padding: 5px;
        }
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .result {
            color: #ffffff;
            font-size: larger;
            font-weight: bolder;
            margin-top: 15px;
            text-align: center;
        }
        .result:hover {
            color: #ffffff;
            font-size: larger;
        }
        input[type="submit"] {
            display: block;
            margin: 0 auto;
            color: #ffffff;
            margin-top: 5px;
            background-color: rgba(112, 34, 34, 1);
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
        <a href="index.php" class="logo"><img src="img/Health-Insurance.png" alt="car-logo"></a>
        <div class="bx bx-menu" id="menu-icon"></div>
        <ul class="navbar">
            <li><a href="user_page.php">Mon Espace</a></li>
            <li><a href="addDemande.php">Ajouter une demande</a></li>
            <li><a href="listeDemandes.php">Consulter mes demandes</a></li>
        </ul>
        <div class="header-btn">
            <a href="login.php" class="sign-in">Se déconnecter</a>
        </div>
    </header>

    <div class="table-container">
        <h2>Calcul des Montants Remboursés</h2>
    </div>
    <div class="container">
        <div class="calculator">
            <form>
                <label for="typeSoin">Type de soin :</label>
                <select id="typeSoin" name="typeSoin">
                    <option value="consultation">Consultation médicale</option>
                    <option value="traitement">Traitement médical</option>
                    <option value="chirurgie">Chirurgie</option>
                </select>
                <label for="montant"><br>Montant :</label>
                <input type="number" id="montant" name="montant" step="10">
                <input type="submit" value="Calculer">
            </form>
            <div class="result" id="result">
                Montant remboursé : €0.00
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script>

        ////////////////////////////////////////////////////////////////////////////////////////////////////////

        const calculatorForm = document.querySelector('.calculator form');
        const resultElement = document.getElementById('result');

        calculatorForm.addEventListener('submit', function (event) {
            event.preventDefault();

            const typeSoin = calculatorForm.elements.typeSoin.value;
            const montant = parseFloat(calculatorForm.elements.montant.value);

            // Exemple de calcul factice (à remplacer avec votre propre logique) :
            let montantRembourse = montant * 0.7; // 70% de remboursement
            resultElement.textContent = `Montant remboursé : €€{montantRembourse.toFixed(2)}`;
        });

        ////////////////////////////////////////////////////////////////////////////////////////////////////////

        // Lisez la valeur de remboursement depuis le cookie
        const cookieData = document.cookie.split(';').find(cookie => cookie.includes('nouveauRemboursement='));
        let nouveauRemboursement = 0.7; // Valeur par défaut

        if (cookieData) {
            nouveauRemboursement = parseFloat(cookieData.split('=')[1]);
        }

        calculatorForm.addEventListener('submit', function (event) {
            event.preventDefault();

            const typeSoin = calculatorForm.elements.typeSoin.value;
            const montant = parseFloat(calculatorForm.elements.montant.value);

            // Utilisez la valeur de nouveauRemboursement pour le calcul
            let montantRembourse = montant * nouveauRemboursement;
            resultElement.textContent = `Montant remboursé : €${montantRembourse.toFixed(2)}`;
        });
    </script>
    
</body>
<script src="https://unpkg.com/scrollreveal"></script>
<script src="main.js"></script>
</html>