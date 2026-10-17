<?php
    include 'entete.php';

    if (!empty($_GET['id'])) {
        $fournisseurs = getFournisseurs($_GET['id']);
    }

?>
<div class="home-content">

    <div class="overview-boxes">
        <div class="box">
            <form action=" <?= (!empty($_GET['id'])) ? "../model/editfournisseurs.php" : "../model/ajoutFournisseur.php" ?> " method="post">
                <label for="nom">Nom</label>
                <input value="<?= (!empty($_GET['id'])) ? $fournisseurs['nom'] : "" ?>" type="text" name="nom" id="nom" placeholder="Le nom"><br>
                <input value="<?= (!empty($_GET['id'])) ? $fournisseurs['id'] : "" ?>" type="hidden" name="id" id="id" >
                
                <label for="prenom">Prenom</label>
                <input value="<?= (!empty($_GET['id'])) ? $fournisseurs['prenom'] : "" ?>" type="text" name="prenom" id="prenom" placeholder="Le prenom "><br>
                
                <label for="telephone">Telephone</label>
                <input  value="<?= (!empty($_GET['id'])) ? $fournisseurs['telephone'] : "" ?>" type="text" name="telephone" id="telephone" placeholder="Le N° de Telephone"><br>
 

                <label for="email">Email</label>
                <input  value="<?= (!empty($_GET['id'])) ? $fournisseurs['email'] : "" ?>" type="text" name="email" id="email" placeholder="Email"><br>
                

                <button type="submit">Ajouter</button>

                <?php
                if (!empty($_SESSION['message'] ['text'])) {
                ?>
                    <div class="alert <?= $_SESSION['message'] ['type'] ?> ">
                        <?= $_SESSION['message'] ['text'] ?>
                    </div>
                <?php

                unset($_SESSION['message']);
                }
                ?>

            </form>

            

        </div>
        <div class="box">
            <table class="mtable">
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Telephone</th>
                    <th>Modifier</th>
                </tr>
                <?php
                    $fournisseurs = getFournisseurs();

                    if (!empty($fournisseurs) && is_array($fournisseurs)) {
                        foreach ($fournisseurs as $key => $value) {
                ?>

                <tr>
                    <td><?= $value['nom'] ?></td>
                    <td><?= $value['prenom'] ?></td>
                    <td><?= $value['telephone'] ?></td>
                    <td><?= $value['email'] ?></td>
                    <td><a href=" ?id=<?= $value['id'] ?>" ><i class='bx bx-edit-alt'></i></a></td>

                </tr>

                <?php
                    }
                }
                ?>
            </table>
        </div>
    </div>
</section>

<?php
    include 'pied.php';
?>
