<?php
session_start();

if (isset($_SESSION['password'])) {

    echo "<div class='text-center mt-5'> La password generata è: {$_SESSION['password']} </div>";
} else {

    header('Location: ./index.php');
    exit;
}
