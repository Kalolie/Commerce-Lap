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
    
        $file_path = 'product/laptop/'.$_POST['file'];
        // $file_path_record =  'products-img/smartphone/'.$_POST['file-smart'];
    
    
        $file_data = decode_chunk($_POST['file_data']);
        if (false === $file_data) {
            echo "error";
        }

    file_put_contents($file_path,$file_data,FILE_APPEND);
     echo json_encode([]);



      
        
        $DB = new PDODB("localhost","root","","commerce-lap");
        $dbRequest = $DB->PDOConnecte();
        // var_dump($_POST);
        $nbrCat = 1;
        $price = (int)($_POST["price_product_lap"]);
      
        $choice_laptop = $_POST["choice_laptop"];


        if ($choice_laptop == "insert") {
            $insertProduct = $dbRequest->prepare("INSERT INTO `products` (`price`,`lib_product`,`categorie_id`,`img_link_product`) VALUES (:price,:lib_product,:categorie_id,:img_link_product)");
            $insertProduct->execute(array("price"=>$price,"lib_product"=>$_POST["lib_product_lap"],"categorie_id"=>$nbrCat,"img_link_product"=>$file_path));

        

            $countDescRequest = $dbRequest->query("SELECT id As endCount FROM products ORDER BY id DESC LIMIT 1");
            $idFetch = $countDescRequest->fetchAll(PDO::FETCH_NUM);
            $id=$idFetch[0][0];
        



            $insertDescSm = $dbRequest->prepare("INSERT INTO `description_laptop` (`rom_product`,`ram_product`,`processor_product`,`graphique_product`,`other_description`,`screen_product`,`id_product`)  VALUES  (:rom_product,:ram_product,:processor_product,:graphique_product,:other_description,:screen_product,:id_product)");
            $insertDescSm->execute(array("rom_product"=>$_POST["rom_lap"],"ram_product"=>$_POST["ram_lap"],"processor_product"=>$_POST["processor_lap"],"graphique_product"=>$_POST["graphique_lap"],"other_description"=>$_POST["other_description"],"screen_product"=>$_POST["screen_lap"],"id_product"=>$id));
        
        }

        if ($choice_laptop == "update") {
            

                  $id = (int)$_POST["id_get"];

               

                
                    
                    $updateProduct = $dbRequest->prepare("UPDATE `products` SET `price`=:price,`lib_product`=:lib_product,`categorie_id`=:categorie_id,`img_link_product`=:img_link_product WHERE id=:id_product");
                    $updateProduct->execute(array("price"=>$price,"lib_product"=>$_POST["lib_product_lap"],"categorie_id"=>$nbrCat,"img_link_product"=>$file_path,"id_product"=>$id));
        
                

                    $updateDescSm = $dbRequest->prepare("UPDATE `description_laptop` SET `rom_product`=:rom_product,`ram_product`=:ram_product,`processor_product`=:processor_product,`graphique_product`=:graphique_product,`other_description`=:other_description,`screen_product`=:screen_product WHERE id_product=:id_product");

                    $updateDescSm->execute(array("rom_product"=>$_POST["rom_lap"],"ram_product"=>$_POST["ram_lap"],"processor_product"=>$_POST["processor_lap"],"graphique_product"=>$_POST["graphique_lap"],"other_description"=>$_POST["other_description"],"screen_product"=>$_POST["screen_lap"],"id_product"=>$id));
                
                
                
               
            
            
           
        
        }


       
        
        
        
        
        
        
        
    





}else{
    header("location:connexion/connexion-admin.php");
}







?>