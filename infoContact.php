<?php

    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Parcours du tableau $_POST pour afficher toutes les données (débbugging)
        foreach ($_POST as $key => $value) {
            echo $key . ": " . $value . "<br>";
        }

        $nom = filter_input(INPUT_POST, 'nom', FILTER_UNSAFE_RAW);
        $prenom = filter_input(INPUT_POST, 'prenom', FILTER_UNSAFE_RAW);
        $genre = filter_input(INPUT_POST, 'genre', FILTER_UNSAFE_RAW);
        $sujets = filter_input(INPUT_POST, 'sujets', FILTER_UNSAFE_RAW);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $country = filter_input(INPUT_POST, 'country', FILTER_UNSAFE_RAW);
        $message = filter_input(INPUT_POST, 'message', FILTER_UNSAFE_RAW);
        // Nettoyer les autres champs du formulaire si nécessaire

        // Utilise regex pour vérifier que le nom contient des lettres, des espaces et des tirets
        if (preg_match("/^[a-zA-Z -]+$/", $nom)) {
            // si le nom est valide
        } else {
            // sinon le nom contient des caractères non autorisés
            $_SESSION['erreur_nom'] = "Des caractères spéciaux ont été détectés dans le champ nom. Veuillez corriger.";
        }

        // Utilise  -filter_var- pour valider l'adresse email
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // L'adresse email est valide
        } else {
            // L'adresse email est invalide
            $_SESSION['erreur_email'] = "Votre adresse email n'est pas valide.";
        }

        // Traitement du formulaire
    }
?>