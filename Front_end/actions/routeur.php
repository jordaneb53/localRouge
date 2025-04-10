<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SESSION['garage_solidaire'] == 1) {
    header("Location: garage_solidaire/accueil.php");
    exit();
} else {
    header("Location: public/accueil.php");
    exit();
}
