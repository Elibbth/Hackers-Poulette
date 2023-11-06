<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Ressources/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&family=Philosopher:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ceda9163bb.js" crossorigin="anonymous"></script>
    <title>Hackers Poulette</title>
</head>
<body>
    <fieldset class="formulaire">
        <legend>Formulaire de contact </legend>
        <form method="POST" action="">
            <fieldset class="coordonnees">
                <legend>Coordonnées:</legend> 
                    <label for="nom">Nom: </label>
                        <input id="nom" type="text" placeholder="name" required>
                        <br>
                    <label for="prenom">Prénom: </label>
                        <input id="prenom" type="text" placeholder="firstname" required>
                        <br>
                    <label for="country"><i class="fa-solid fa-globe"></i> Pays:</label>
                        <input id="country" type="text"  placeholder="country" required>
                        <br>
            </fieldset>
            <fieldset class="genre">
                <legend>Genre:</legend> 
                    <label for="genre">Woman</label>
                        <input id="genre" type="radio" name="genre" value="gonz"> 
                    <label for="genre">Men</label>
                        <input id="genre" type="radio" name="genre" value="mec" checked>
                        <br>
            </fieldset>
            <fieldset class="request">
                <legend>Requête:</legend>
                    <label for="sujets"><i class="fa-solid fa-circle-question"></i> De quoi as-tu besoin ?</label>
                        <select id="sujets" name="sujets">
                            <option value="">Autres:</option>
                            <option value="apresVente">Service après-vente</option>
                            <option value="defaut">Défauts de fabrication</option>
                            <option value="livraison">Délai de livraison</option>
                        </select>
                        <br>
                    <label for="message"><i class="fa-regular fa-pen-to-square"></i> Dis moi:</label>
                        <textarea id="message" name="message" required></textarea>
                        <br>
                    <label for="email"><i class="fa-regular fa-envelope"></i> Email:</label>
                        <input type="email" id="email" required>    <!--pattern=".+@globex\.com"-->
                        <br>
            </fieldset>
            <button type="submit" name="submit" value=" "><i class="fa-solid fa-paper-plane"></i> Envoyer</button>
        </form>
    </fieldset>
</body>
</html>
<!-- PHP -->
<?php
    // if (isset($_POST['nom'])) {
    //     if
    //     else
    // }
    // if (isset($_POST['prenom'])) {
    //     if
    //     else
    // }   
    // if (isset($_POST['genre'])) {
    //     if
    //     else
    // }
    // if (isset($_POST['prenom'])) {
    //     if
    //     else
    // }
?>

