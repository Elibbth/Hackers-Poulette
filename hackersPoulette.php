<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Ressources/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Bellota:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&family=Fredoka:wght@300;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ceda9163bb.js" crossorigin="anonymous"></script>
    <title>Hackers Poulette</title>

    <?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Parcours du tableau $_POST pour afficher toutes les données (débbugging)
        // foreach ($_POST as $key => $value) {
        //     echo $key . ": " . $value . "<br>";
        // }

        $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $genre = filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $sujets = filter_input(INPUT_POST, 'sujets', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        $erreur = false; // Variable pour suivre les erreurs
        
        if (empty($nom) || !preg_match("/^[a-zA-Z -]+$/", $nom)) {
            $erreur = true;
            $_SESSION['erreur_nom'] = "Le champ -nom- est invalide. Veuillez le corriger.";
        }
        
        if (empty($prenom) || !preg_match("/^[a-zA-Z -]+$/", $prenom)) {
            $erreur = true;
            $_SESSION['erreur_prenom'] = "Le champ -prénom- est invalide. Veuillez le corriger.";
        }
        
        if (empty($country) || !preg_match("/^[a-zA-Z -]+$/", $country)) {
            $erreur = true;
            $_SESSION['erreur_country'] = "Le champ -pays- est invalide. Veuillez le corriger.";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erreur = true;
            $_SESSION['erreur_email'] = "L'adresse email entrée n'est pas correcte. Veuillez la corriger.";
        }

        if (!$erreur) {
            // Tout est valide, envoyons l'e-mail et affichons la confirmation
            echo '<script>alert("Merci, votre demande a bien été envoyée.")</script>'; 
        

            // $destinataire = "adresse_email_destinataire@example.com";
            // $sujet = "Nouveau formulaire soumis";

            // $message = "Nom: " . $nom . "\n";
            // $message .= "Prénom: " . $prenom . "\n";
            // $message .= "Genre: " . $genre . "\n";
            // $message .= "Sujets: " . $sujets . "\n";
            // $message .= "Email: " . $email . "\n";
            // $message .= "Pays: " . $country . "\n";
            // $message .= "Message: " . $message . "\n";

            // $headers = "From: " . $email;

            // if (mail($destinataire, $sujet, $message, $headers)) {
            //     $_SESSION['confirmation'] = "Votre formulaire a été envoyé avec succès.";
            // } else {
            //     $_SESSION['erreur_envoi_email'] = "Une erreur s'est produite lors de l'envoi du formulaire.";
            // }
        }

        // Traitement du formulaire

        // truc pour envoyer le mail :
        // https://github.com/PHPMailer/PHPMailer
    }

    ?>

</head>
<body>
    <header>
        <nav class="navbar">
            <a class="buttonMenu" href="#"><img src="Ressources/overview hackersPoulette.png" class="logoWhite" alt="logoWhiteHackersPoulette"></a>
            <h1>Hackers Poulette</h1>
        </nav>
    </header>
    <div class="img">
        <img src="Ressources/hackers-poulette-logo.png" alt="logo">
    </div>

    <div class="form">
        <fieldset class="formulaire">
            <legend>Formulaire de contact </legend>
            <form method="POST" action="hackersPoulette.php">
                <fieldset class="coordonnees">
                    <legend>Coordonnées:</legend> 
                        <label for="nom"><i class="fa-solid fa-circle-user"></i> Nom: </label>
                            <br>
                            <input id="nom" type="text" name="nom" placeholder="name" required>
                            <?php
                                if (isset($_SESSION['erreur_nom'])) {
                                    echo '<div class="alert alert-danger">' . $_SESSION['erreur_nom'] . '</div>';
                                    unset($_SESSION['erreur_nom']); // Efface le message d'erreur après l'avoir affiché
                                }
                            ?>
                            <br>
                        <label for="prenom"><i class="fa-regular fa-circle-user"></i> Prénom: </label>
                            <br>
                            <input id="prenom" type="text" name="prenom" placeholder="firstname" required>
                            <?php
                                if (isset($_SESSION['erreur_prenom'])) {
                                    echo '<div class="alert alert-danger">' . $_SESSION['erreur_prenom'] . '</div>';
                                    unset($_SESSION['erreur_prenom']); // Efface le message d'erreur après l'avoir affiché
                                }
                            ?>
                            <br>
                        <label for="country"><i class="fa-solid fa-globe"></i> Pays:</label>
                            <br>
                            <input id="country" type="text" name="country" placeholder="country" required>
                            <?php
                                if (isset($_SESSION['erreur_country'])) {
                                    echo '<div class="alert alert-danger">' . $_SESSION['erreur_country'] . '</div>';
                                    unset($_SESSION['erreur_country']); // Efface le message d'erreur après l'avoir affiché
                                }
                            ?>
                            <br>
                </fieldset>
                <fieldset class="genre">
                    <legend>Genre:</legend> 
                        <label for="gonz">Woman</label>
                            <input id="gonz" type="radio" name="genre" value="gonz"> 
                        <label for="mec">Men</label>
                            <input id="mec" type="radio" name="genre" value="mec">
                        <label for="autre">Other</label>
                            <input id="autre" type="radio" name="genre" value="autre" checked>
                            <br>
                </fieldset>
                <fieldset class="request">
                    <legend>Requête:</legend>
                        <label for="sujets"><i class="fa-solid fa-circle-question"></i> Motif du message ?</label>
                            <select id="sujets" name="sujets">
                                <option value="autres">Autres:</option>
                                <option value="apresVente">Service après-vente</option>
                                <option value="defaut">Défauts de fabrication</option>
                                <option value="livraison">Délai de livraison</option>
                            </select>
                            <br>
                            <br>
                        <label for="message"><i class="fa-regular fa-pen-to-square"></i> Description:</label>
                            <br>
                            <textarea id="message" name="message" required rows="6" cols="40"></textarea>
                            <br>
                        <label for="email"><i class="fa-regular fa-envelope"></i> Email:</label>
                            <br>
                            <input type="email" id="email" name="email" required>    <!--pattern=".+@globex\.com"-->
                            <?php
                                if (isset($_SESSION['erreur_email'])) {
                                    echo '<div class="alert alert-danger">' . $_SESSION['erreur_email'] . '</div>';
                                    unset($_SESSION['erreur_email']); // Efface le message d'erreur après l'avoir affiché
                                }
                            ?>
                            <br>
                </fieldset>
                <br>
                <button type="submit" name="submit" value=" "><i class="fa-solid fa-paper-plane"></i> Envoyer</button>
            </form>
        </fieldset>
    </div>
    <footer>
        <div>
            <ul>
                <li><a href="https://www.linkedin.com/in/elisabeth-leyder/">Linkedin</a></li>
                <li><a href="https://facebook.com/elibbth">Facebook</a></li>
                <li><a href="https://github.com/Elibbth/Hackers-Poulette">Github</a></li>
                <li><p><i class="fa-regular fa-hand-peace" style="color: #ffffff;"></i></p></li>
            </ul>
        </div>
    </footer>
</body>
</html>
