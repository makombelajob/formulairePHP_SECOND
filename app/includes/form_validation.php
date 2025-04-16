<?php
$errorsInput = $lastMessage =  [];
$lastNValid = $firstNValid = $emailValid = $passwdValid = $passwdConfValid = $rgpdValid = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Lastname verification
    $lastName = htmlspecialchars($_POST['lastname']) ?? '';
    if (strlen($lastName) < 2 || strlen($lastName) > 30) {
        $errorsInput['lastnameError'] = 'Le nom doit être valide';
    }else{
        $lastNValid = true;
    }

    //Firstname verification
    $firstName = htmlspecialchars($_POST['firstname']) ?? '';
    if (strlen($firstName) < 2 || strlen($firstName) > 30) {
        $errorsInput['firstnameError'] = 'Le prénom doit être valide';
    }else{
        $firstNValid = true;
    }

    //Email verification
    $email = $_POST['email'] ?? '';
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errorsInput['emailError'] = 'L\'email doit être valide';
    }else{
        $emailValid = true;
    }

    //Password verification
    $pwd = htmlspecialchars($_POST['password']);
    if(strlen($pwd) < 5){
        $errorsInput['pwdError'] = 'Le mot de passe doit être valide';
    }else{
        $passwdValid = true;
    }

    // Password Confirmation Verification
    $pwdConf = htmlspecialchars($_POST['passwordConfirm']);
    if($pwd !== $pwdConf){
        $errorsInput['pwdConfError'] = 'Les mots de passes ne sont pas cohérants !';
    }else{
        $passwdConfValid = true;
    }

    //RGPD verification
    $rgpd = isset($_POST['rgpd']) ?? '';
    if(!$rgpd){
        $errorsInput['rgpdError'] = 'Vous devez cocher cette case';
    }else{
        $rgpdValid = true;
    }

    if(empty($errorsInput)){
        $lastName = $firstName = $email = $rgpd = '';
        $lastMessage['succes'] = 'Inscriptiion reussie !';
    } else{
        $lastMessage['failed'] = 'Au moins un champs n\'est pas valide';
    }
}