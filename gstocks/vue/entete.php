<?php
include_once '../model/function.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Gestion de Stock</title>
    <link rel="stylesheet" href="../public/css/style10.css" />
    <!-- Boxicons CDN Link -->
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
    <div class="sidebar">
      <div class="logo-details">
        <img src="../public/img/Logo_cdgdev.png" alt="logo">
      </div>
      <ul class="nav-links">
        <li>
          <a href="home.php" >
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="personnels.php">
            <i class='bx bx-user-check'></i>
            <span class="links_name">Personnels</span>
          </a>
        </li>
        <li>
          <a href="fournisseurs.php">
          <i class='bx bxs-user-detail'></i>
            <span class="links_name">Fournisseurs</span>
          </a>
        </li>
        <li>
          <a href="articles.php">
            <i class="bx bx-box"></i>
            <span class="links_name">Articles</span>
          </a>
        </li>
        <li>
          <a href="commandes.php">
            <i class="bx bx-list-ul"></i>
            <span class="links_name">Commandes</span>
          </a>
        </li>
        <li>
          <a href="analyses.php">
            <i class="bx bx-pie-chart-alt-2"></i>
            <span class="links_name">Analyses</span>
          </a>
        </li>
        <li>
          <a href="stock.php">
            <i class="bx bx-coin-stack"></i>
            <span class="links_name">Stock</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-cog"></i>
            <span class="links_name">Configuration</span>
          </a>
        </li>
        <li class="log_out">
          <a href="login.php">
            <i class="bx bx-log-out"></i>
            <span class="links_name">Déconnexion</span>
          </a>
        </li>
      </ul>
    </div>
    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
        </div>
        <div class="search-box">
          <input type="text" placeholder="Recherche..." />
          <i class="bx bx-search"></i>
        </div>
      </nav>