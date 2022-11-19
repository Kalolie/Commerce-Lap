<?php 
session_start();
require("dbConnexion.php");
if (isset($_SESSION["idAdmin"])) {
    


    




        function decode_chunk($data){

            $data = explode(';base64,',$data);
            if (!is_array($data) || !isset($data[1])) {
                return false ; 
            
            }

            $data = base64_decode($data[1]);
    
            if (!$data) {
                return false;
            }
            return $data;

        }
    
        $file_path = 'product/outils/'.$_POST['file'];
        // $file_path_record =  'products-img/smartphone/'.$_POST['file-smart'];
    
    
        $file_data = decode_chunk($_POST['file_data']);
        if (false === $file_data) {
            echo "error";
        }

    file_put_contents($file_path,$file_data,FILE_APPEND);
     echo json_encode([]);



        $DB = new PDODB("localhost","root","","commerce-lap");
        $dbRequest = $DB->PDOConnecte();
       
        
        
    
        $nbrCat = 2;

        $price = (int)($_POST["price_product"]);



        $choice_outil = $_POST["choice_outil"]; 


        if ($choice_outil == "insert") {
            $insertProduct = $dbRequest->prepare("INSERT INTO `products` (`lib_product`,`price`,`categorie_id`,`img_link_product`) VALUES (:lib_product,:price,:categorie_id,:img_link_product)");
            $insertProduct->execute( array("lib_product"=>$_POST["lib_product"],"price"=>$price,"categorie_id"=>$nbrCat,"img_link_product"=>$file_path));


            $countDescRequest = $dbRequest->query("SELECT id As endCount FROM products ORDER BY id DESC LIMIT 1");
            $idFetch = $countDescRequest->fetchAll(PDO::FETCH_NUM);
            $id = $idFetch[0][0];


            $insertDescSm = $dbRequest->prepare("INSERT INTO `description_outil` (`descriptions`,`id_product`)  VALUES  (:descriptions,:id_product)");
            $insertDescSm->execute(array("descriptions"=>$_POST["descriptions"],"id_product"=>$id));
        }
       
        if ($choice_outil == "update") {
            $id = (int)$_POST["id_get"];

               

            $nbrCat =2;
                    
            $updateProduct = $dbRequest->prepare("UPDATE `products` SET `price`=:price,`lib_product`=:lib_product,`categorie_id`=:categorie_id,`img_link_product`=:img_link_product WHERE id=:id_product");
            $updateProduct->execute(array("price"=>$price,"lib_product"=>$_POST["lib_product"],"categorie_id"=>$nbrCat,"img_link_product"=>$file_path,"id_product"=>$id));

            $updateDescSm = $dbRequest->prepare("UPDATE `description_outil` SET `descriptions`=:descriptions WHERE id_product=:id_product");

            $updateDescSm->execute(array("descriptions"=>$_POST["descriptions"],"id_product"=>$id));
        
        }
        
   
        
        
        
    





}else{
    header("location:connexion/connexion-admin.php");
}







?>