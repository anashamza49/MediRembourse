<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rembourséo - Accueil</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&family=Ubuntu:wght@300&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background: rgb(238, 174, 202);
            color: rgba(112, 34, 34, 1);
            background: radial-gradient(circle, rgb(230, 174, 198) 0%, rgba(148, 188, 233, 0.994) 100%);
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

</head>

<body>
    <header>
        <a href="#" class="logo"><img src="img/Health-Insurance.png" alt="car-logo"></a>
        <div class="bx bx-menu" id="menu-icon"></div>
        <ul class="navbar">
            <li><a href="index.php">Accueil</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Actualités</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
        <div class="header-btn">
            <a href="register_form.php" class="sign-up">S'inscrire</a>
            <a href="login.php" class="sign-in">Se connecter</a>
        </div>
    </header>

    <section class="home" id="home">
        <div class="text">
            <h1><span>Découvrez</span> Vos<br>Options de Remboursement Médical avec Simplicité</h1>
            <p>Découvrez aisément vos options de remboursement médical grâce à notre service. Nous simplifions votre
                décision en fournissant les informations nécessaires pour maîtriser vos remboursements de manière
                éclairée, mettant ainsi en main votre santé financière.</p>
        </div>
        <div class="back">
            <img src="img/MedicalImage.png">
        </div>
    </section>

    <section class="title">
        <div class="heading">
            <span><b>NOS SERVICES</b></span>
            <h1>Choisir parmi nos services</h1>
        </div>
        <div class="service">
            <div class="box">
                <i class="bx bx-clinic"></i>
                <h2>Remboursement Médical</h2>
                <p>Nous vous aidons à naviguer à travers les différentes options de remboursement médical pour trouver
                    celle qui correspond le mieux à vos besoins et à votre situation.</p>
            </div>
            <div class="box">
                <i class="bx bx-blanket"></i>
                <h2>Assistance Administrative</h2>
                <p>Nous prenons en charge les tâches administratives complexes liées aux remboursements médicaux, vous
                    permettant ainsi de vous concentrer sur votre santé plutôt que sur la paperasse.</p>
            </div>
            <div class="box">
                <i class="bx bxs-capsule"></i>
                <h2>Conseils et Orientations</h2>
                <p>Nos experts en remboursement médical sont là pour répondre à toutes vos questions et vous fournir des
                    conseils avisés sur les meilleures pratiques pour maximiser vos avantages de remboursement.</p>
            </div>
        </div>
    </section>
    <section class="about" id="about">
        <div class="heading">
            <span><b>À propos de nous</b></span>
        </div>
        <div class="about-container">
            <div class="about-img">
                <img src="img/family.png" alt="about">
            </div>
            <div class="about-text">
                <p>Nous sommes une plateforme dédiée à simplifier la gestion de vos remboursements médicaux. Notre site
                    web a été spécialement conçu pour vous permettre, en tant qu'assuré, de gérer en toute simplicité
                    vos demandes de remboursement. Grâce à notre solution conviviale, vous pourrez ajouter aisément les
                    documents requis, suivre l'état de vos demandes et même calculer les montants à rembourser. Notre
                    engagement est de vous offrir un contrôle total sur vos remboursements de bulletins de soin,
                    facilitant ainsi votre expérience dans le domaine de la santé financière.</p>
                <a href="#" class="btn">En savoir plus</a>
            </div>
        </div>
    </section>
    <footer class="footer-distributed">

        <div class="footer-left">
            <h3>Rembour<span>Séo</span></h3>

            <p class="footer-links">
                <a href="index.php">Accueil</a>
                |
                <a href="#">Service</a>
                |
                <a href="#">Actualités</a>
                |
                <a href="#">Contact</a>
            </p>

            <p class="footer-company-name">Copyright © 2023 <strong>Rembourséo</strong> All rights reserved</p>
        </div>

        <div class="footer-center">
            <div>
                <i class="fa fa-map-marker"></i>
                <p>Paris <b>France</b></p>
            </div>

            <div>
                <i class="fa fa-phone"></i>
                <p>+33 75 36 82 58</p>
            </div>
            <div>
                <i class="fa fa-envelope"></i>
                <p><a href="remborseo@gmail.com">xyz@gmail.com</a></p>
            </div>
        </div>
        <div class="footer-right">
            <p class="footer-company-about">
                <span>À propos</span>
                <strong>Rembourséo</strong> Découvrez aisément vos options de remboursement médical grâce à notre
                service.
            </p>
            <div class="footer-icons">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-youtube"></i></a>
            </div>
        </div>
    </footer>
    
    <!--Scrollreveal-->
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="main.js"></script>
</body>

</html>