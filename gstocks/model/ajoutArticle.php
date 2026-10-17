<?php
include 'connexion.php';

if (
    !empty($_POST['nom_article']) &&
    !empty($_POST['categorie']) &&
    !empty($_POST['ref_article']) &&
    !empty($_POST['num_serie']) &&
    !empty($_POST['quantite']) &&
    !empty($_POST['date_entree'])
) {
    $sql = "INSERT INTO article(nom_article, categorie, ref_article, num_serie, quantite, date_entree) VALUES (?, ?, ?, ?, ?, ?)";
    $req = $connexion->prepare($sql);

    $req->execute(array(
        $_POST['nom_article'],
        $_POST['categorie'],
        $_POST['ref_article'],
        $_POST['num_serie'],
        $_POST['quantite'],
        $_POST['date_entree']
    ));

    if ($req->rowCount() != 0) {
        $_SESSION['message']['text'] = "Article ajouté avec succès!";
        $_SESSION['message']['type'] = "success";
    } else {
        $_SESSION['message']['text'] = "Une erreur s'est produite lors de l'ajout de l'article";
        $_SESSION['message']['type'] = "warning";
    }    

} else {
    $_SESSION['message']['text'] = "Une information obligatoire non renseignée !";
    $_SESSION['message']['type'] = "danger";
}

header('location: ../vue/articles.php');
