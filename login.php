<?php
session_start();
$errMssg = "";

if (isset($_POST["email"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    require "db.php";

    // Check admin login
    $stat = $pdo->prepare(
        "SELECT * FROM admin WHERE email = :email AND password = :password"
    );
    $stat->bindValue(":email", $email);
    $stat->bindValue(":password", $password);
    $stat->execute();
    $data = $stat->fetch(PDO::FETCH_ASSOC);

    if ($data) {
        $_SESSION["isAdmin"] = true;
        header("location:admin_page.php");
        exit();
    } else {
        // Check user login
        $stmt = $pdo->prepare(
            "SELECT * FROM inscription WHERE email = :email AND password = :password"
        );
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":password", md5($password));
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $_SESSION["idClient"] = $result["id"];
            $_SESSION["userFirstName"] = $result["prenom"]; // Store the user's first name
            header("location:user_page.php");
            exit();
        } else {
            $errMssg = "Email or Password incorrect";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rembourséo - Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: rgb(238, 174, 202);
            background: radial-gradient(circle, rgb(230, 174, 198) 0%, rgba(148, 188, 233, 0.994) 100%);
            border: #000 solide;
        }

        .login-box {
            display: flex;
            justify-content: center;
            flex-direction: column;
            width: 440px;
            height: 480px;
            padding: 30px;
        }

        .login-header {
            text-align: center;
            margin: 20px 0 40px 0;
        }

        .login-header span {
            font-size: 2.5rem;
        }

        .login-header header {
            color: #333;
            font-size: 30px;
            font-weight: 600;
        }

        .input-box .input-field {
            width: 100%;
            height: 60px;
            font-size: 17px;
            padding: 0 25px;
            margin-bottom: 15px;
            border-radius: 30px;
            border: none;
            box-shadow: 0px 5px 10px 1px rgba(0, 0, 0, 0.05);
            outline: none;
            transition: .3s;
        }

        ::placeholder {
            font-weight: 500;
            color: #222;
        }

        .input-field:focus {
            width: 105%;
        }

        .forgot {
            display: flex;
            justify-content: space-around;
            margin-bottom: 35px;
        }

        section {
            display: flex;
            align-items: center;
            font-size: 14px;
            color: #555;
        }

        #check {
            margin-right: 10px;
        }

        a {
            text-decoration: none;
        }

        section a {
            color: #555;
        }

        .input-submit {
            position: relative;
        }

        .submit-btn {
            width: 100%;
            height: 60px;
            background: rgba(112, 34, 34, 1);
            border: none;
            border-radius: 30px;
            cursor: pointer;
            transition: .3s;
        }

        .input-submit label {
            position: absolute;
            top: 45%;
            left: 50%;
            color: #fff;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            cursor: pointer;
        }

        .submit-btn:hover {
            background: #fe5b3d;
            transform: scale(1.05, 1);
        }

        .sign-up-link {
            text-align: center;
            font-size: 15px;
            margin-top: 20px;
        }

        .sign-up-link a {
            color: #000;
            font-weight: 600;
        }

        .login-header {
            font-weight: bold;
            color: rgba(112, 34, 34, 1);
        }
    </style>
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
            <form action="#" method="post" class="login-form">
                <div class="login-header">
                    <span>Se connecter</span>
                </div>
                <div class="input-box">
                    <input type="text" name="email" class="input-field" placeholder="Email" autocomplete="off" required>
                </div>
                <div class="input-box">
                    <input type="password" name="password" class="input-field" placeholder="Mot de passe" autocomplete="off" required>
                </div>
                <div class="forgot">
                    <div>
                        <input type="checkbox" id="check">
                        <label for="check">Souviens de moi</label>
                    </div>
                    <div>
                        <a href="register_form.php">Mot de passe oublié?</a>
                    </div>
                </div>
                <div class="input-submit">
                    <button class="submit-btn" id="submit"></button>
                    <label for="submit">Se connecter</label>
                </div>
                <p><?= $errMssg ?></p>
                <div class="sign-up-link">
                    <p>Vous n'avez pas de compte ?<br><a href="register_form.php">S'inscrire</a></p>
                </div>
            </form>
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

        sr.reveal('.login-box', {
            delay: 200,
            origin: 'top'
        })
    </script>
</body>

</html>