<?php ob_start(); //NE PAS MODIFIER 
$titre = "Page d'ajout d'un produit"; //Mettre le nom du titre de la page que vous voulez
?>

<!-- mettre ici le code -->
<?php
require_once("catalogue.dao.php");
require_once("gestionImage.php");

if(isset($_POST['libelle'])) {
    $fileImage = $_FILES['imageCours'];
    $repertoire = "source/";
    try {
        $nomImage = ajoutImage($fileImage,$repertoire,$_POST['libelle']);
        $success =  ajouterCoursBD($_POST['libelle'],$_POST['description'],$_POST['idType'],$nomImage);
        if($success) { ?>
            <div class="alert alert-success" role="alert">
                L'ajout s'est bien déroulé !
            </div>
        <?php } else { ?>
            <div class="alert alert-danger" role="alert">
                L'ajout n'a pas fonctionné !
            </div>
        <?php }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

$types = getTypesBD();
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nom : </label>
        <input type="text" class="form-control" name="libelle" placeholder="Nom du cours" required />
    </div>
    <div class="form-group">
        <label>Description du cours : </label>
        <textarea class="form-control" name="description" rows="3" required></textarea>
    </div>
    <div class="form-group">
        <label>Types de cours : </label>
        <select name="idType" class="form-control" id="">
            <?php foreach($types as $type){ ?>
                <option value="<?= $type['idType'] ?>"><?= $type['libelle'] ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
       <label>Image du cours : </label>
       <input type="file" class="form-control-file" name="imageCours" />
    </div>
    <input type="submit" class="btn btn-primary" value="Valider" />
</form>

<?php
/************************
 * NE PAS MODIFIER
 * PERMET d INCLURE LE MENU ET LE TEMPLATE
 ************************/
    $content = ob_get_clean();
    require "../../global/common/template.php";
?>
