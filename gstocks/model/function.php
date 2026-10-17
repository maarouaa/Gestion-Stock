<?php
include 'connexion.php';

function getArticle($id=null)
{

    if (!empty($id)) {
        $sql = "SELECT * FROM articles WHERE id=? ";

        $req = $GLOBALS['connexion']->prepare($sql);
    
        $req->execute(array($id));
    
        return $req->fetch();
    } else {
        $sql = "SELECT * FROM articles ";

        $req = $GLOBALS['connexion']->prepare($sql);
    
        $req->execute();
    
        return $req->fetchAll();
    }
    
}

function getPersonnels($id=null)
{

    if (!empty($id)) {
        $sql = "SELECT * FROM personnels WHERE id=? ";

        $req = $GLOBALS['connexion']->prepare($sql);
    
        $req->execute(array($id));
    
        return $req->fetch();
    } else {
        $sql = "SELECT * FROM personnels ";

        $req = $GLOBALS['connexion']->prepare($sql);
    
        $req->execute();
    
        return $req->fetchAll();
    }
    
}

function getFournisseurs($id=null)
{

    if (!empty($id)) {
        $sql = "SELECT * FROM fournisseurs WHERE id=? ";

        $req = $GLOBALS['connexion']->prepare($sql);
    
        $req->execute(array($id));
    
        return $req->fetch();
    } else {
        $sql = "SELECT * FROM fournisseurs ";

        $req = $GLOBALS['connexion']->prepare($sql);
    
        $req->execute();
    
        return $req->fetchAll();
    }
    
}


function getCommande($id=null)
{

    if (!empty($id)) {
        $sql = "SELECT * FROM commandes WHERE id=? ";

        $req = $GLOBALS['connexion']->prepare($sql);
    
        $req->execute(array($id));
    
        return $req->fetch();
    } else {
        $sql = "SELECT * FROM commandes ";

        $req = $GLOBALS['connexion']->prepare($sql);
    
        $req->execute();
    
        return $req->fetchAll();
    }
    
}