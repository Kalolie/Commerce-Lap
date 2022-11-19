<?php 
// require_once("dbConnexion.php");
class panier{
    public function __construct(){
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION["panier"])) {
            $_SESSION["panier"] = array();
        }
    }


    public function add($product_id){
        if (isset($_SESSION["panier"][$product_id])) {
            $_SESSION["panier"][$product_id]++;

        }else{
            $_SESSION["panier"][$product_id] = 1 ;
        }
    }

    public function del($product_id){
        if (isset($_SESSION["panier"][$product_id])) {
            unset($_SESSION["panier"][$product_id]);
        }else{
            header("Location:../panier.php");
        }
    }

    public function count(){
        return array_sum($_SESSION["panier"]);
         }
    public function total(){
        $total = 0 ;
        $ids = array_keys($_SESSION["panier"]);

        if (empty($ids)) {
            $produits = array();
        }else{
            $idsImplode = implode(',',$ids);
            $dbConnexion = new PDODB("localhost","root","","commerce-lap");
            $dbRequest = $dbConnexion->PDOConnecte();
            $dbRquestConnexion = $dbRequest->query("SELECT id,price FROM products WHERE id IN ($idsImplode)");  
            $dbResult = $dbRquestConnexion->fetchAll(PDO::FETCH_OBJ);

           
        }
        foreach ($dbResult as $key => $result) {
            $total += $result->price * $_SESSION["panier"][$result->id];
        }
        return $total;
    }



}


