<?php
    include 'entete.php';

    if (!empty($_GET['id'])) {
        $article = getCommande($_GET['id']);
    }


?>
<div class="home-content">
    <button class="hidden-print" id="btnprint" style="position: relative; left:45%; text"><i class="bx bx-printer">Imprimer</i></button>
                <div class="page">
                    <div class="cote-a-cote">
                        <h2>G-stock</h2>
                        <div>
                            <p>Reçu N°: <? $commandes['id'] ?></p>
                            <p>Dtae : <? date('d/m/y H:i:s', strtotime($commandes['date_commande'])) ?></p>
                        </div>
                    </div>
                    <div class="cote-a-cote" style="width: 50%;">
                        <p>Nom :</p>
                        <p><? $commandes['nom']. "". $commandes['prenom'] ?></p>
                    </div>
                    <div class="cote-a-cote" style="width: 50%;" >
                        <p>Telephone :</p>
                        <p><? $commandes['telephone'] ?></p>
                    </div>
                    <div class="cote-a-cote" style="width: 50%;" >
                        <p>Adresse :</p>
                        <p><? $commandes['adresse'] ?></p>
                    </div>

                    <br>
                    <table class="mtable">
                    <tr>
                        <th>Article</th>
                        <th>Quantité</th>
                        <th>Prix unitaire</th>
                        <th>Prix totale</th>
                    </tr>
                    <tr>
                        <td><?= $commande['nom_article'] ?></td>
                        <td><?= $commande['quantite'] ?></td>
                        <td><?= $commande['prix_unitaire'] ?></td>
                        <td><?= $commande['prix'] ?></td>
                    </tr>
                    </table>
                </div>
</div>
</section>

<?php
    include 'pied.php';
?>
<script>
    var btnprint = document.querySelector('#bntprint');
    btnprint.addEventListener('click', () => {
        window.print();
    });
    function setPrice() {
        var article = document.querySelector('#id-article');
        var quantite = document.querySelector('#quantite');
        var prix = document.querySelector('prix');

        var prixUnitaire = article.option[article.selectedIndex].getAttribute('data-prix');

        prix.value = Number(quantite.value) * Number(prixUnitaire);
    }
</script>