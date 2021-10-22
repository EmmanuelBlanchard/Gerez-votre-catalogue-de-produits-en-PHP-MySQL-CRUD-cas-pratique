<?php ob_start(); //NE PAS MODIFIER 
$titre = "Un catalogue de produits"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
<?php
require_once("catalogue.dao.php");
$cours = getCoursBD();
?>
<a href="ajout.php" class="btn btn-primary">Ajout</a>

<div class="row no-gutters">
    <?php foreach($cours as $c) : ?>
        <div class="col-4">
            <div class="card m-2" style="">
                <img src="source/<?= $c['image'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $c['libelle'] ?></h5>
                    <p class="card-text"><?= $c['description'] ?></p>
                    <?php $typeTxt = getNomType($c['idType']);?>
                    <span class='badge badge-primary'><?= $typeTxt['libelle'] ?></span>
                </div>
                <div class="row no-gutters p-2">
                    <form action="" method="get" class="col-6 text-center">
                        <input type="hidden" name="idCours" value="<?= $c['idCours'] ?>">
                        <input type="hidden" name="type" value="modification">
                        <input type="submit" value="modifier" class="btn btn-primary">
                    </form>
                    <form action="" method="get" class="col-6 text-center">
                        <input type="hidden" name="idCours" value="<?= $c['idCours'] ?>">
                        <input type="hidden" name="type" value="suppression">
                        <input type="submit" value="supprimer" class="btn btn-danger">
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
    $content = ob_get_clean();
    require "../../global/common/template.php";
?>
