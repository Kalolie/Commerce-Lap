<?php 
require("../../admin/dbConnexion.php");
if (isset($_GET["id"])) {

    $DB = new PDODB("localhost","root","","commerce-lap");
    $dbDescript = $DB->PDOConnecte();
    $id_product = $_GET["id"];

    $productType = $dbDescript->prepare("SELECT categorie_id FROM products  WHERE id=:id_product"); 
    $productType->execute(array("id_product"=>$id_product));
    $TypeProduct = $productType->fetch(PDO::FETCH_OBJ);



    if ((int)($TypeProduct->categorie_id) == 1) {

        $description = $dbDescript->prepare("SELECT * FROM description_laptop WHERE id_product=:id_product"); 
        $description->execute(array("id_product"=>$id_product));
        $descriptionProduct = $description->fetch();

    } 
    if ((int)($TypeProduct->categorie_id) == 2) {
        $description = $dbDescript->prepare("SELECT * FROM description_outil WHERE id_product=:id_product"); 
        $description->execute(array("id_product"=>$id_product));
        $descriptionProduct = $description->fetch();
    }
    

   

    $product = $dbDescript->prepare("SELECT lib_product,img_link_product,categorie_id FROM products WHERE id=:id_product"); 
    $product->execute(array("id_product"=>$id_product));
    $product = $product->fetch();
    
    $jsonArray = array("product"=>$product,"description_product"=>$descriptionProduct);

    
    echo json_encode($jsonArray);
    
   
}



?>