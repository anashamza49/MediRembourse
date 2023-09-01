<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <style>
        .container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: rgb(238, 174, 202);
            background: radial-gradient(circle, rgb(230, 174, 198) 0%, rgba(148, 188, 233, 0.994) 100%);
            padding-bottom: 60px;
        }

        .container .content {
            text-align: center;
        }

        .container .content h3 {
            font-size: 30px;
            color: #333;
        }

        .container .content h3 span {
            background: #801818e3;
            color: #fff;
            border-radius: 5px;
            padding: 0 15px;
        }

        .container .content h3 span:hover {
            background: #fe5b3d;
        }

        .container .content h1 {
            font-size: 50px;
            color: #333;
        }

        .container .content h1 span {
            color: #fe5b3d;
        }

        .container .content p {
            font-size: 25px;
            margin-bottom: 20px;
        }

        .content h2 {
            margin-top: 10px;
            margin-bottom: 15px;
        }

        .choice {
            display: flex;
        }
        .choice a {
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
        }

        .container .content .btn {
            display: inline-block;
            padding: 10px 30px;
            font-size: 20px;
            background: rgba(112, 34, 34, 1);
            color: #fff;
            margin: 0 5px;
            border-radius: 8px;
        }

        .container .content .btn:hover {
            background: #fe5b3d;
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
            <li><a href="page_calcul.php">Calcul</a></li>
        </ul>
        <div class="header-btn">
            <a href="login.php" class="sign-in">Se déconnecter</a>
        </div>
    </header>
    <div class="container">
        <div class="content">
            <?php if (isset($_SESSION["userFirstName"])) : ?>
                <h3>Bonjour, <span><?php echo $_SESSION["userFirstName"]; ?></span></h3>
            <?php else : ?>
                <h3>Bonjour, <span>Utilisateur</span></h3>
            <?php endif; ?><h1>Bienvenue</h1>
            <h2>Veuillez choisir : </h2>
            <div class="choice">
                <a href="addDemande.php" class="btn">Ajouter une demande</a>
                <a href="listeDemandes.php" class="btn">Consulter mes demandes</a>
                <a href="page_calcul.php" class="btn">Calcul des montants remboursés </a>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/scrollreveal"></script>
    <script>
        const sr = ScrollReveal({
            distance: '60px',
            duration: 2500,
            delay: 400,
            reset: true
        })
        sr.reveal('.content', {
            delay: 200,
            origin: 'top'
        })
    </script>
</body>

</html>