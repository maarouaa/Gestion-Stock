
<?php
    include 'entete.php';

    if (!empty($_GET['id'])) {
        $article = getCommande($_GET['id']);
    }


?>
<div class="home-content">

    <div class="overview-boxes">

        <div class="box">
            <table class="mtable">
                <tr>
                    <th>Article</th>
                    <th>Fournisseur</th>
                    <th>Quantité</th>
                    <th>Prix</th>
                    <th>Date du commande</th>
                </tr>
                <?php
                    $commandes = getCommande();

                    if (!empty($commandes) && is_array($commandes)) {
                        foreach ($commandes as $key => $value) {
                ?>

                <tr>
                    <td><?= $value['nom_article'] ?></td>
                    <td><?= $value['nom']. "". $value['prenom'] ?></td>
                    <td><?= $value['quantite'] ?></td>
                    <td><?= $value['prix'] ?></td>
                    <td><?= date('d/m/Y H:i:s', strtotime($value['date_commande'])) ?></td>

                </tr>

                <?php
                    }
                }
                ?>
            </table>

            <div class="box">
            <form action=" <?= (!empty($_GET['id'])) ? "../model/editcommande.php" : "../model/ajoutcommande.php" ?> " method="post">
                <input value="<?= (!empty($_GET['id'])) ? $article['id'] : "" ?>" type="hidden" name="id" id="id" >
                <label for="id_articles">Article</label>
                <select name="id_articles" id="id_articles">
                    <?php
                        $article = getArticle();
                        if (!empty($articles) && is_array($articles)) {
                            foreach ($articles as $key => $value) {
                                ?>
                                <option value="<?= $value['id'] ?> "><?= $value['nom_article']. "". $value['quantite']. " Disponible"?></option>
                                <?php 
                            }
                        }
                    ?>
                </select><br>
                <label for="id_fournisseurs">Fournisseur</label>
                <select name="id_fournisseurs" id="id_fournisseurs">
                    <?php
                        $fournisseurs = getCommande();
                        if (!empty($commandes) && is_array($commandes)) {
                            foreach ($commandes as $key => $value) {
                                ?>
                                <option value="<?php echo $value['id']; ?>"><?php echo $value['nom']. " ". $value['prenom']; ?></option>
                                <?php 
                            }
                        }
                    ?>
                </select><br>
               <label for="quantite">Quantité</label>
                <input  value="<?= (!empty($_GET['id'])) ? $article['quantite'] : "" ?>" type="number" name="quantite" id="quantite" placeholder="La quantité"><br>

                <label for="Prix">Prix</label>
                <input  value="<?= (!empty($_GET['id'])) ? $article['Prix'] : "" ?>" type="text" name="Prix" id="Prix" placeholder="Prix"><br>
                 
                <button type="submit">Effectuer</button>

                <?php
                if (!empty($_SESSION['message'] ['text'])) {
                ?>
                    <div class="alert <?= $_SESSION['message'] ['type'] ?> ">
                        <?= $_SESSION['message'] ['text'] ?>
                    </div>
                <?php
                }
                ?>

            </form>

            

        </div>
            
        </div>
    </div>
</section>

<?php
    include 'pied.php';
?>
