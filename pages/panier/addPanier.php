<?php 
require("../../admin/dbConnexion.php");
require("panier.class.php");

    if (isset($_GET["id"])) {
        $DB = new PDODB("localhost","root","","commerce-lap");
        $DBCONNECTE = $DB->PDOConnecte();
        $request = $DBCONNECTE->prepare("SELECT id FROM products WHERE id = :id_product");
        $request->execute(array("id_product"=>$_GET["id"]));
        $product = $request->fetchAll(PDO::FETCH_OBJ);
    
        if (empty($product)) {
            die("Produit inexistant");
    
        } 
        $panier = new panier();
        $panier->add($_GET["id"]);
        header("Location:../panier.php");
        // die("Produit bien ajouté  <a href='javascript:history:back()'>RETOUR</a>");
        
    }else{
        header("Location:../for-our-for.php");
    }
