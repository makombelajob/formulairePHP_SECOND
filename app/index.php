<?php
$errorsName = $errorsLastName = $errorsEmail = $errorsPassword = $errorsPasswordConfirm = $finalGoodMessage = $finalBadMessage = '';
$firstNameValid = $lastnameValid = $emailValid = $passwordValid = $passwordConfirmValid = $rgpdValid = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = trim($_POST['firstname'] ?? '');
    $lastName = trim($_POST['lastname'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $passwordConfirm = $_POST['passwordConfirm'] ?? '';
    $rgpd = empty($_POST['rgpd']) ? false : true;

    // Validation nom
    if (strlen($lastName) < 2 || strlen($lastName) > 30) {
        $errorsLastName = 'Veuillez entrer un nom valide';
        $lastnameValid = false;
    } else {
        $lastnameValid = true;
    }

    // Validation prénom
    if (strlen($firstName) < 2 || strlen($firstName) > 30) {
        $errorsName = 'Veuillez entrer un prénom valide';
        $firstNameValid = false;
    } else {
        $firstNameValid = true;
    }

    // Validation email
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorsEmail = 'Veuillez entrer un email valide';
        $emailValid = false;
    } else {
        $emailValid = true;
    }

    // Validation mot de passe
    if (empty($password)) {
        $errorsPassword = 'Veuillez entrer un mot de passe';
        $passwordValid = false;
    } else {
        $passwordValid = true;
    }

    // Validation confirmation du mot de passe
    if (empty($passwordConfirm)) {
        $errorsPasswordConfirm = 'Veuillez confirmer votre mot de passe';
        $passwordConfirmValid = false;
    } elseif ($password !== $passwordConfirm) {
        $errorsPasswordConfirm = 'Les mots de passe ne correspondent pas';
        $passwordConfirmValid = false;
    } else {
        $passwordConfirmValid = true;
    }

    // Validation RGPD
    $rgpdValid = $rgpd;

    // Traitement final si tout est valide
    if(
        $firstNameValid && $lastnameValid && $emailValid &&
        $passwordValid && $passwordConfirmValid && $rgpdValid
    ) {
        // Enregistrements, envoi en base de données ou autre traitement
        $finalGoodMessage =  'Inscription réussie !';
        header('Location: home.php');
    }else{
        $finalBadMessage = 'Au moins un champs n\'est pas valid';
    }
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/styles.css">
    <title>Document</title>
</head>
<body>
    <main>
        <h1>Formulaire d'inscription</h1>
        <form action="index.php" method="POST">
            <div class="name">
                <label for="lastname">Nom</label>
                <input type="text" id="lastname" name="lastname" placeholder="Votre nom" value="" />
                <p class="errors"><?= $errorsLastName ?></p>
            </div>

            <div class="firstname">
                <label for="firstname">Prénom</label>
                <input type="text" id="firstname" name="firstname" placeholder="Votre prénom" value="" />
                <p class="errors"><?= $errorsName ?></p>
            </div>


            <div class="email">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" placeholder="Votre email" value="" />
                <p class="errors"><?= $errorsEmail ?></p>
            </div>

            <div class="password">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" placeholder="Votre mot de passe" />
                <p class="errors"><?= $errorsPassword ?></p>
            </div>

            <div class="passwordConfirm">
                <label for="passwordConfirm">Confirmez le mot de passe</label>
                <input type="password" id="passwordConfirm" name="passwordConfirm" placeholder="Confirmez votre mot de passe" />
                <p class="errors"><?= $errorsPasswordConfirm ?></p>
            </div>

            <div class="rgpd">
                <input type="checkbox" id="rgpd" name="rgpd"/>
                <label for="rgpd">J'accepte les conditions RGPD</label>
            </div>

            <div class="submit">
                <button type="submit">Inscription</button>
            </div>
        </form>
    </main>
</body>
</html>