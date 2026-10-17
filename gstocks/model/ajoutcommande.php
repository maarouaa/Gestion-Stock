<?php
include 'connexion.php';
include 'function.php';

if (
    !empty($_POST['id_article']) &&
    !empty($_POST['id_fournisseurs']) &&
    !empty($_POST['quantite']) &&
    !empty($_POST['prix'])  
) {

    $articles = getArticle($_POST['id_article']);

    if (!empty($articles) && is_array($articles)) {
        if ($_POST['quantite']>$articles['quantite']) {
            $_SESSION['message']['text'] = "...";
            $_SESSION['message']['type'] = "warning";
        }else {
            $sql = "INSERT INTO article(id_article, id_fournisseurs, quantite, prix) VALUES (?, ?, ?, ?)";
            $req = $connexion->prepare($sql);
        
            $req->execute(array(
                $_POST['id_article'],
                $_POST['id_fournisseurs'],
                $_POST['quantite'],
                $_POST['prix']
            ));
        
            if ($req->rowCount() != 0) {

                $sql = "UPDATE articles SET quantite=quantite-? WHERE id=? ";

                $sql = "INSERT INTO article(id_article, id_fournisseurs, quantite, prix) VALUES (?, ?, ?, ?)";
            $req = $connexion->prepare($sql);
        
            $req->execute(array(
                $_POST['id_article'],
                $_POST['quantite']
            ));

            if (($req->rowCount() != 0)) {
                $_SESSION['message']['text'] = "Commande effectuée avec succès!";
                $_SESSION['message']['type'] = "success";
            } else {
                $_SESSION['message']['text'] = "Impossible de faire cette commande";
                $_SESSION['message']['type'] = "warning";
            }
            

                
            } else {
                $_SESSION['message']['text'] = "Une erreur s'est produite lors de la commande";
                $_SESSION['message']['type'] = "warning";
            }  
        }
    }

  

} else {
    $_SESSION['message']['text'] = "Une information obligatoire non renseignée !";
    $_SESSION['message']['type'] = "danger";
}

header('location: ../vue/commandes.php');
