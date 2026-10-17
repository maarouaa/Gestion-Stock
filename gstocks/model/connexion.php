<?php


  $hostname = "localhost";
  $dbname = "gestion_stock";
  $username = "root";
  $password = "";
  
    try {
        $connexion = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
        $connexion ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $connexion;
    } catch (Exception $e) {
        die("Connexion error: " . $e->getMessage());
    }

?>