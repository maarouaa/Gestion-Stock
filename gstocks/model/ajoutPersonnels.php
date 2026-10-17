<?php
include 'connexion.php';

if (
    !empty($_POST['nom']) &&
    !empty($_POST['prenom']) &&
    !empty($_POST['telephone']) &&
    !empty($_POST['email'])
) {
    $sql = "INSERT INTO personnels(nom, prenom, telephone, email) VALUES (?, ?, ?, ?)";
    $req = $connexion->prepare($sql);

    $req->execute(array(
        $_POST['nom'],
        $_POST['prenom'],
        $_POST['telephone'],
        $_POST['email']
    ));

    if ($req->rowCount() != 0) {
        $_SESSION['message']['text'] = "Personnel ajouté avec succès!";
        $_SESSION['message']['type'] = "success";
    } else {
        $_SESSION['message']['text'] = "Une erreur s'est produite lors de l'ajout";
        $_SESSION['message']['type'] = "warning";
    }    

} else {
    $_SESSION['message']['text'] = "Une information obligatoire non renseignée !";
    $_SESSION['message']['type'] = "danger";
}

header('location: ../vue/personnels.php');
