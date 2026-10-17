<?php
include 'connexion.php';


if (isset($_POST['submit'])) {

    if (isset($_POST['login']) && !empty($_POST['login'])) {

        if (filter_var($_POST['login'], FILTER_VALIDATE_EMAIL)) {

            if (isset($_POST['password']) && !empty($_POST['password'])) {

                require "../model/server.php";

                $getdata = $pdo->prepare("SELECT login FROM login WHERE login=? and password=? ");
                $getdata->execute(array($_POST['login'], $_POST['password']));

                $rows = $getdata->rowCount();

                if ($rows == true) {
                    $_SESSION['admin'] = $_POST['login'];

                    header("location:../vue/home.php");
                } else {
                    $erreur = "login ou mot de passe inconnu !";
                }

            } else {
                $erreur = "Veuillez saisir votre password !";
            }
        } else {
            $erreur = "Veuillez saisir un login valide !";
        }
    } else {
        $erreur = "Veuillez saisir votre login !";
    }
}
?>