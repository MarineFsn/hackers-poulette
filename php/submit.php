<?php
$recaptcha_token = $_POST['recaptcha_token'];


$recaptcha_secret = '6LcLy7wmAAAAAAm7q4yTPHJlFn3arJa2hfF16VO6';
$recaptcha_response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $recaptcha_secret . '&response=' . $recaptcha_token);
$recaptcha_data = json_decode($recaptcha_response);

if ($recaptcha_data->success) {
    echo "Le formulaire a été soumis avec succès.";
} else {
    echo "Erreur : Veuillez remplir le captcha correctement.";
}
?>