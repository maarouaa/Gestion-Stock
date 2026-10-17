<?php
include 'connexion.php';

if (
    !empty($_POST['nom']) &&
    !empty($_POST['prenom']) &&
    !empty($_POST['telephone']) &&
    !empty($_POST['email']) &&
    !empty($_POST['id'])
) {
    $sql = "UPDATE fournisseurs SET nom=?, prenom=?, telephone=?, email=? WHERE id=?";
    $req = $connexion->prepare($sql);

    $req->execute(array(
        $_POST['nom'],
        $_POST['prenom'],
        $_POST['telephone'],
        $_POST['email'],
        $_POST['id']
    ));

    if ($req->rowCount() != 0) {
        $_SESSION['message']['text'] = "Fournisseur modifié avec succès!";
        $_SESSION['message']['type'] = "success";
    } else {
        $_SESSION['message']['text'] = "Rien n'a été modifié !";
        $_SESSION['message']['type'] = "warning";
    }    

} else {
    $_SESSION['message']['text'] = "Une information obligatoire non renseignée !";
    $_SESSION['message']['type'] = "danger";
}

header('location: ../vue/fournisseurs.php');
