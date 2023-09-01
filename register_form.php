<?php
$errMsg = "";
$errGenerale = "";
if (isset($_POST["prenom"])) {
    $nom = $_POST["name"];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPass = $_POST["cpassword"];
    $tel = $_POST["tel"];
    if (!empty($nom) && !empty($prenom) && !empty($tel) && !empty($email) && !empty($password) && !empty($confirmPass)) {
        if ($password != $confirmPass) :
            $errMsg = "Mot de passes Non Identiques !!";
        endif;
        if ($password == $confirmPass) {
            require "db.php";
            $stmt = $pdo->prepare(
                "INSERT INTO inscription (nom , prenom , tel , email , password) VALUES(:nom , :prenom , :tel , :email , :password)"
            );
            $stmt->bindValue(":nom", $nom);
            $stmt->bindValue(":prenom", $prenom);
            $stmt->bindValue("email", $email, PDO::PARAM_STR);
            $password = md5($password);
            $stmt->bindValue('password', $password);
            $stmt->bindValue("tel", $tel);
            $stmt->execute();
            header("location:login.php");
        } else $errGenerale = "veuiller verifier tous les champs!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rembourséo - S'inscrire</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .container {
            display: flex;
            background: rgb(238, 174, 202);
            background: radial-gradient(circle, rgb(230, 174, 198) 0%, rgba(148, 188, 233, 0.994) 100%);
            margin-top: 20px;
        }
        .login-header {
            font-weight: bold;
            color: rgba(112, 34, 34, 1);
        }
        .submit-btn {
            width: 100%;
            background: rgba(112, 34, 34, 1);
            border: none;
            border-radius: 30px;
            cursor: pointer;
            transition: .3s;
        }
        .submit-btn:hover {
            background: #fe5b3d;
            transform: scale(1.05, 1);
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>

<body>
    <header>
        <a href="index.php" class="logo"><img src="img/Health-Insurance.png" alt="car-logo"></a>
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

    <div class="container">
        <div class="login-box">
            <form action="#" method="post" class="registration-form">
                <div class="login-header">
                    <span>S'inscrire</span>
                </div>
                <div class="input-box">
                    <input type="text" name="name" class="input-field" placeholder="Entrer votre nom" autocomplete="off" required>
                </div>
                <div class="input-box">
                    <input type="text" name="prenom" class="input-field" placeholder="Entrer votre prenom" autocomplete="off" required>
                </div>
                <div class="input-box">
                    <input type="email" name="email" class="input-field" placeholder="Entrer votre email" autocomplete="off" required>
                </div>
                <div class="input-box">
                    <input type="tel" name="tel" class="input-field" placeholder="Entrer votre Telephone" required>
                </div>
                <div class="input-box">
                    <input type="password" name="password" class="input-field" placeholder="Entrer votre mot de passe" autocomplete="off" required>
                </div>
                <div class="input-box">
                    <input type="password" name="cpassword" class="input-field" placeholder="Confirmer votre mot de passe" autocomplete="off" required>
                </div>

                <div class="input-submit">
                    <button class="submit-btn" id="submit"></button>
                    <label for="submit">S'inscrire</label>
                </div>
            </form>
            <p><?= $errMsg ?></p>
            <p><?= $errGenerale ?></p>
            <div class="already">
                Vous avez déjà un compte? <a href="login.php">Se connecter</a>
            </div>
        </div>
    </div>

    <div class="already">
        <script src="https://unpkg.com/scrollreveal"></script>
        <script>
            const sr = ScrollReveal({
                distance: '60px',
                duration: 2500,
                delay: 400,
                reset: true
            })

            sr.reveal('.login-box', {
                delay: 200,
                origin: 'top'
            })
        </script>
</body>

</html>