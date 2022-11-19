<?php 
session_start();
require("../dbConnexion.php");
if (isset($_SESSION["idAdmin"])) {
    $DB = new PDODB("localhost","root","","commerce-lap");
    
    $id = (int)$_GET["id"];



    $dbRequest = $DB->PDOConnecte();
    $idCatRequest = $dbRequest->prepare("SELECT * FROM `products` WHERE id=:id");
    $idCatRequest->execute(array("id"=>$id));
    $count = $idCatRequest->rowcount();

    if ($count != 0) {
        $idRequest = $idCatRequest->fetchAll(PDO::FETCH_OBJ);

        $categorie_id = (int)$idRequest[0]->categorie_id;
    
        echo($idRequest[0]->categorie_id);




         if($categorie_id == 1){

            $deletePDRequest = $dbRequest->prepare("DELETE FROM products WHERE id=:id");
            $deletePDRequest->execute(array('id'=>$id));

            $deleteDESCRequest = $dbRequest->prepare("DELETE FROM description_laptop WHERE id_product=:id");   
            $deleteDESCRequest->execute(array('id'=>$id));
           
            header("location:laptop.php");

         }

        if($categorie_id == 2){
            $deletePDOutilsRequest = $dbRequest->prepare("DELETE FROM products WHERE id=:id");
            $deletePDOutilsRequest->execute(array('id'=>$id));

            $deleteDESCOutilsRequest = $dbRequest->prepare("DELETE FROM description_outil WHERE id_product=:id");   
            $deleteDESCOutilsRequest->execute(array('id'=>$id));

            header("location:outils_informatiques.php");
        }


    } else {
        header("location:../connexion/connexion-admin.php");
    }
        



   

   

    
   
}else{
    header("location:../connexion/connexion-admin.php");
}

?>