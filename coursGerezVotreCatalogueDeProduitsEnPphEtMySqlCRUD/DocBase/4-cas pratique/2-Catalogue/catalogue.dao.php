<?php
require_once("MonPDO.class.php");

function getCoursBD(){
    $pdo = MonPDO::getPDO();
    $req = "SELECT * FROM cours";
    $stmt = $pdo->prepare($req);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getTypesBD(){
    $pdo = MonPDO::getPDO();
    $req = "SELECT * FROM type";
    $stmt = $pdo->prepare($req);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getNomType($idType){
    $pdo = MonPDO::getPDO();
    $req = "SELECT libelle FROM type WHERE idType = :idType";
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":idType", $idType,PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getCoursNameToDeleteBD($idCours){
    $pdo = MonPDO::getPDO();
    $req = 'SELECT CONCAT(idCours, " : ",libelle) as monCours FROM cours WHERE idCours = :cours';
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":cours", $idCours,PDO::PARAM_INT);
    $stmt->execute();
    $res = $stmt->fetch(PDO::FETCH_ASSOC);
    return $res['monCours'];
}

function deleteCoursBD($idCours){
    $pdo = MonPDO::getPDO();
    $req = 'DELETE FROM cours WHERE idCours = :cours';
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":cours", $idCours,PDO::PARAM_INT);
    return $stmt->execute();
}

function modifierCoursBD($idCours,$libelle,$description,$idType){
    $pdo = MonPDO::getPDO();
    $req = 'UPDATE cours SET libelle = :libelle, description = :desc, idType = :idType WHERE idCours = :cours';
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":cours", $idCours,PDO::PARAM_INT);
    $stmt->bindValue(":libelle", $libelle,PDO::PARAM_STR);
    $stmt->bindValue(":desc", $description,PDO::PARAM_STR);
    $stmt->bindValue(":idType", $idType,PDO::PARAM_INT);
    return $stmt->execute();
}

function ajouterCoursBD($libelle,$description,$idType,$image){
    $pdo = MonPDO::getPDO();
    $req = 'INSERT INTO cours (libelle,description,image,idType)
    values(:libelle,:description,:image,:type)';
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":libelle", $libelle,PDO::PARAM_STR);
    $stmt->bindValue(":description", $description,PDO::PARAM_STR);
    $stmt->bindValue(":image", $image,PDO::PARAM_STR);
    $stmt->bindValue(":type", $idType,PDO::PARAM_INT);
    return $stmt->execute();
}

function getImageToDelete($idCours){
    $pdo = MonPDO::getPDO();
    $req = 'SELECT image FROM cours WHERE idCours = :cours';
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":cours", $idCours,PDO::PARAM_INT);
    $stmt->execute();
    $res = $stmt->fetch(PDO::FETCH_ASSOC);
    return $res['image'];
}