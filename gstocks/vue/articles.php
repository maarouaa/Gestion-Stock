<?php
    $link=mysqli_connect('localhost','root','','gestion_stock');
    $requette="select * from categorie";
    $result=mysqli_query($link,$requette);

?>

<?php
    include 'entete.php';

    if (!empty($_GET['id'])) {
        $article = getArticle($_GET['id']);
    }


?>
<div class="home-content">

    <div class="overview-boxes">

        <div class="box">

            <form action="" method="get"></form>

            <table class="mtable">
                <tr>
                    <th>Nom d'article</th>
                    <th>Catégorie</th>
                    <th>Reference</th>
                    <th>N° de serie</th>
                    <th>Quantité</th>
                    <th>Date d'entré</th>
                    <th>Modifier</th>
                </tr>
                <?php
                    $articles = getArticle();

                    if (!empty($articles) && is_array($articles)) {
                        foreach ($articles as $key => $value) {
                ?>

                <tr>
                    <td><?= $value['nom_article'] ?></td>
                    <td><?= $value['categorie'] ?></td>
                    <td><?= $value['ref_article'] ?></td>
                    <td><?= $value['num_serie'] ?></td>
                    <td><?= $value['quantite'] ?></td>
                    <td><?= date('d/m/Y H:i:s', strtotime($value['date_entree'])) ?></td>
                    <td><a href=" ?id=<?= $value['id'] ?>" ><i class='bx bx-edit-alt'></i></a></td>

                </tr>

                <?php
                    }
                }
                ?>
            </table>

            <div class="box">
            <form action=" <?= (!empty($_GET['id'])) ? "../model/editarticle.php" : "../model/ajoutArticle.php" ?> " method="post">
                <label for="nom_article">Nom de l'article</label>
                <input value="<?= (!empty($_GET['id'])) ? $article['nom_article'] : "" ?>" type="text" name="nom_article" id="nom_article" placeholder="Le nom de l'article"><br>
                <input value="<?= (!empty($_GET['id'])) ? $article['id'] : "" ?>" type="hidden" name="id" id="id" >
                <label for="categorie">Catégorie</label>
                <select name="categorie" id="categorie">
                    <?php 
                    while ($data=mysqli_fetch_assoc($result)){?>
                        <option value=<?php echo $data['cod_categorie'];?>><?php echo $data ['lib_categorie'];?></option>
                    <?php     
                    } ?>
                </select><br>
                <label for="ref_article">Reference de l'article</label>
                <input  value="<?= (!empty($_GET['id'])) ? $article['ref_article'] : "" ?>" type="text" name="ref_article" id="ref_article" placeholder="Reference de l'article"><br>
                <label for="num_serie">N° de serie</label>
                <input  value="<?= (!empty($_GET['id'])) ? $article['num_serie'] : "" ?>" type="text" name="num_serie" id="num_serie" placeholder="Le num de serie"><br>
                <label for="quantite">Quantité</label>
                <input  value="<?= (!empty($_GET['id'])) ? $article['quantite'] : "" ?>" type="number" name="quantite" id="quantite" placeholder="La quantité"><br>
                <label for="date_entree">Date d'entré</label>
                <input  value="<?= (!empty($_GET['id'])) ? $article['date_entree'] : "" ?>" type="datetime-local" name="date_entree" id="date_entree" ><br>

                <button type="submit">Ajouter</button>

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
<?php 
mysqli_close($link);
?>