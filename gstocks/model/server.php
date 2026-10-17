<?php
include 'connexion.php';

try {
    $pdo = new PDO("mysql:hostname=$hostname;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die(print_r("erreur bdd:".$e->getMessage()));
}