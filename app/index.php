<?php
require_once 'includes/form_validation.php';
require_once 'includes/dbconnect.php';
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Document</title>
</head>
<body>
<main class="mt-5">
    <h1>Formulaire d'inscription</h1>
    <form action="" method="POST">
        <div class="name">
            <label for="lastname">Nom</label>
            <input type="text" id="lastname" name="lastname" placeholder="Votre nom" value="<?= $lastName ?? ''; ?>"/>
            <?php if (isset($errorsInput['lastnameError'])) : ; ?>
                <p class="errors"><?= $errorsInput['lastnameError']; ?></p>
            <?php endif; ?>
        </div>

        <!-- Firstname input -->
        <div class="firstname">
            <label for="firstname">Prénom</label>
            <input type="text" id="firstname" name="firstname" placeholder="Votre prénom"
                   value="<?= $firstName ?? ''; ?>"/>
            <?php if (isset($errorsInput['firstnameError'])) : ; ?>
                <p class="errors"><?= $errorsInput['firstnameError']; ?></p>
            <?php endif; ?>
        </div>

        <!-- Email input -->
        <div class="email">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" placeholder="Votre email" value="<?= $email ?? ''; ?>"/>
            <?php if (isset($errorsInput['emailError'])) : ; ?>
                <p class="errors"><?= $errorsInput['emailError']; ?></p>
            <?php endif; ?>
        </div>

        <!-- password input -->
        <div class="password">
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" placeholder="Votre mot de passe"/>
            <?php if (isset($errorsInput['pwdError'])) : ; ?>
                <p class="errors"><?= $errorsInput['pwdError']; ?></p>
            <?php endif; ?>
        </div>

        <!-- Password Confirm input -->
        <div class="passwordConfirm">
            <label for="passwordConfirm">Confirmez le mot de passe</label>
            <input type="password" id="passwordConfirm" name="passwordConfirm"
                   placeholder="Confirmez votre mot de passe"/>
            <?php if (isset($errorsInput['pwdConfError'])) : ; ?>
                <p class="errors"><?= $errorsInput['pwdConfError']; ?></p>
            <?php endif; ?>
        </div>

        <!-- RGPD check -->
        <div class="rgpd">
            <input type="checkbox" id="rgpd" name="rgpd" value="<?= $rgpd ?? '';?>"/>
            <label for="rgpd">J'accepte les conditions RGPD</label>
            <?php if (isset($errorsInput['rgpdError'])) : ; ?>
                <p class="text-danger fs-3"><?= $errorsInput['rgpdError']; ?></p>
            <?php endif; ?>
        </div>

        <div class="submit">
            <button type="submit">Inscription</button>
        </div>
    </form>
    <div class="bg-warning rounded-3">
        <?php
        $message = $lastMessage['succes'] ?? $lastMessage['failed'] ?? '';
        if(!empty($message)) :; ?>
            <p class="fs-1 p-1 m-0"><?= $lastMessage['succes'] ?? $lastMessage['failed'] ?? '';?></p>
        <?php endif; ?>
    </div>
</main>
</body>
</html>