<?php
    require_once(__DIR__ . '/vendor/autoload.php');
    $google = new Google_Client();

    $google->setClientId('497687775908-bn9gl5qb981k1cp5fe4hd49okep4tsl3.apps.googleusercontent.com');

    $google->setClientSecret('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');

    $google->setRedirectUri('http://localhost/skit_fawithfork/www.skit_teacher.com/home.php');

    $google->addScope('email');

    $google->addScope('profile');

    session_start();
?>

