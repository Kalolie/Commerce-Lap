<?php
session_start();
require_once("../../admin/dbConnexion.php");
require_once("panier.class.php");


if (isset($_SESSION["id"]) && isset($_SESSION["panier"])) {
           

    if (!empty($_SESSION["panier"])) {
        $notProduct = false;
        if (isset($_GET["del"])) {
            if (isset($_SESSION["panier"][$_GET["del"]])) {
                if ($_SESSION["panier"][$_GET["del"]] == 1) {
                    unset($_SESSION["panier"][$_GET["del"]]);
                } else {
                    $_SESSION["panier"][$_GET["del"]] -= 1;
                }
                
               
            }else{
                header("Location:../../index.php");
            }
        }
        


        $ids = array_keys($_SESSION["panier"]);
        $idsNumber = implode(',',$ids);

        if (!empty($_SESSION["panier"])) {
            $notProduct = false;
            
        $DB = new PDODB("localhost","root","","ecommerce");
        $DBCONNECTE = $DB->PDOConnecte();

        $requestSmart = $DBCONNECTE->query("SELECT * FROM product WHERE id_product IN ($idsNumber) AND id_categorie=1");
        $requestLaptop = $DBCONNECTE->query("SELECT * FROM product WHERE id_product IN ($idsNumber) AND id_categorie=2");

       
        $Laptops = $requestLaptop->fetchAll(PDO::FETCH_OBJ);
        $Smartphones = $requestSmart->fetchAll(PDO::FETCH_OBJ);


        $LaptopIdArray = array();

        $SmartIdArray = array();
        
        foreach ($Laptops as $key => $Laptop) {
              $id = $Laptop->id_product;
              array_push($LaptopIdArray,$id);
        }

        foreach ($Smartphones as $key => $Smartphone) {
            $id = $Smartphone->id_product;
            array_push($SmartIdArray,$id);
        }


        $idSmartImplode = implode(",",$SmartIdArray);
        $idLaptopImplode = implode(",",$LaptopIdArray);


        if ($idLaptopImplode == '') {
            $requestDescriptionLaptop = $DBCONNECTE->prepare("SELECT * FROM description_pc WHERE id_product IN (:implodeLaptop)");
            $requestDescriptionLaptop->execute(array("implodeLaptop"=>$idLaptopImplode));
        } else {
            $requestDescriptionLaptop = $DBCONNECTE->query("SELECT * FROM description_pc WHERE id_product IN ($idLaptopImplode)");
            
        }
        
       
        if ($idSmartImplode == '') {
            $requestDescriptionSmart = $DBCONNECTE->prepare("SELECT * FROM description_sm WHERE id_product IN (:implodeSmart)");
            $requestDescriptionSmart->execute(array("implodeSmart"=>$idSmartImplode));
        } else {
            $requestDescriptionSmart = $DBCONNECTE->query("SELECT * FROM description_sm WHERE id_product IN ($idSmartImplode)");
           
        }
        

        


        
        
        $descriptionsLaptop = $requestDescriptionLaptop->fetchAll(PDO::FETCH_OBJ);
        $descriptionsSmart = $requestDescriptionSmart->fetchAll(PDO::FETCH_OBJ);

        
       

        


                    
        $panier = new panier();
        $total = $panier->total();

        $count = $panier->count();
            

        } else {
            $notProduct = true;
            // header("Location:../../index.php");
        }
    }else{
        $notProduct = true;
    }
            
            


    
} else {
    header("Location:../../index.php");
}


?>
 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/css/menu-rond-style.css">
    <link rel="stylesheet" href="../../css/vendor/bootstrap.css">
    <link rel="stylesheet" href="../../css/vendor/locomotive-scroll.css">
    <link rel="stylesheet" href="../../css/css/footer.css">
    <link rel="stylesheet" href="../../css/css/panier.css">
    <title>Panier</title>
</head>

<body>




  <!-- MENU BULBE  -->
  <div class="menu-burger p-3">
    <svg fill="white" id="Outline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <title>185 menu dots vertical</title>
        <circle cx="12" cy="2" r="2" />
        <circle cx="12" cy="12" r="2" />
        <circle cx="12" cy="22" r="2" />
    </svg>
</div>
<div class="menu-acceuil menu-bulbe">
    <a class="link-style" href="../../../index.php">
    
    <div class="menu-acceuil-r shadow">
        <svg fill="white" id="Outline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <title>127 home</title>
            <path
                d="M23.121,9.069,15.536,1.483a5.008,5.008,0,0,0-7.072,0L.879,9.069A2.978,2.978,0,0,0,0,11.19v9.817a3,3,0,0,0,3,3H21a3,3,0,0,0,3-3V11.19A2.978,2.978,0,0,0,23.121,9.069ZM15,22.007H9V18.073a3,3,0,0,1,6,0Zm7-1a1,1,0,0,1-1,1H17V18.073a5,5,0,0,0-10,0v3.934H3a1,1,0,0,1-1-1V11.19a1.008,1.008,0,0,1,.293-.707L9.878,2.9a3.008,3.008,0,0,1,4.244,0l7.585,7.586A1.008,1.008,0,0,1,22,11.19Z" />
        </svg>
    </div>
   </a>
   
    <div class="menu-acceuil-text shadow-sm">
        <div class="menu-acceuil-text-flex">
            ACCEUIL
        </div>

    </div>
</div>

<div class="menu-panier menu-bulbe">
    <a class="link-style">
        <div class="menu-acceuil-r shadow">
            <svg fill="white" id="Outline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <title>103 shopping cart</title>
                <path
                    d="M22.713,4.077A2.993,2.993,0,0,0,20.41,3H4.242L4.2,2.649A3,3,0,0,0,1.222,0H1A1,1,0,0,0,1,2h.222a1,1,0,0,1,.993.883l1.376,11.7A5,5,0,0,0,8.557,19H19a1,1,0,0,0,0-2H8.557a3,3,0,0,1-2.82-2h11.92a5,5,0,0,0,4.921-4.113l.785-4.354A2.994,2.994,0,0,0,22.713,4.077ZM21.4,6.178l-.786,4.354A3,3,0,0,1,17.657,13H5.419L4.478,5H20.41A1,1,0,0,1,21.4,6.178Z" />
                <circle cx="7" cy="22" r="2" />
                <circle cx="17" cy="22" r="2" />
            </svg>
        </div>
    </a>
    
    <div class="menu-acceuil-text shadow-sm">
        <div class="menu-acceuil-text-flex">
            PANIER
        </div>

    </div>
</div>


<div class="menu-inscription menu-bulbe">
    <a class="link-style" href="../../public/inscription.html">
        <div class="menu-acceuil-r shadow">
            <svg fill="white" id="Outline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <title>95 add user</title>
                <path d="M23,11H21V9a1,1,0,0,0-2,0v2H17a1,1,0,0,0,0,2h2v2a1,1,0,0,0,2,0V13h2a1,1,0,0,0,0-2Z" />
                <path d="M9,12A6,6,0,1,0,3,6,6.006,6.006,0,0,0,9,12ZM9,2A4,4,0,1,1,5,6,4,4,0,0,1,9,2Z" />
                <path
                    d="M9,14a9.01,9.01,0,0,0-9,9,1,1,0,0,0,2,0,7,7,0,0,1,14,0,1,1,0,0,0,2,0A9.01,9.01,0,0,0,9,14Z" />
            </svg>
        </div>
    </a>
    <div class="menu-acceuil-text shadow-sm">
        <div class="menu-acceuil-text-flex">
            INSCRIPTION
        </div>

    </div>
</div>

<div class="menu-connexion menu-bulbe">
    <div class="menu-acceuil-r shadow menu-connexion-bulbe">
        <svg fill="white" id="Outline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <title>192 log in</title>
            <path
                d="M7,22H5a3,3,0,0,1-3-3V5A3,3,0,0,1,5,2H7A1,1,0,0,0,7,0H5A5.006,5.006,0,0,0,0,5V19a5.006,5.006,0,0,0,5,5H7a1,1,0,0,0,0-2Z" />
            <path
                d="M10.462,5.293,5.875,9.879a3.007,3.007,0,0,0,0,4.242l4.586,4.586a1,1,0,1,0,1.414-1.414L7.584,13H23a1,1,0,0,0,0-2H7.583l4.293-4.293a1,1,0,1,0-1.414-1.414Z" />
        </svg>
    </div>

    <div class="menu-acceuil-text shadow-sm">
        <div class="menu-acceuil-text-flex">
            CONNEXION
        </div>

    </div>

</div>


<div class="menu-smart menu-bulbe">
    <a href="../categories/smartphone/smartphone.php">
    <div class="menu-acceuil-r shadow">
        <svg fill="white" id="Outline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <title>44 smartphone</title>
            <path
                d="M15,0H9A5.006,5.006,0,0,0,4,5V19a5.006,5.006,0,0,0,5,5h6a5.006,5.006,0,0,0,5-5V5A5.006,5.006,0,0,0,15,0ZM9,2h6a3,3,0,0,1,3,3V16H6V5A3,3,0,0,1,9,2Zm6,20H9a3,3,0,0,1-3-3V18H18v1A3,3,0,0,1,15,22Z" />
            <circle cx="12" cy="20" r="1" />
        </svg>
    </div>
</a>
    <div class="menu-acceuil-text shadow-sm">
        <div class="menu-acceuil-text-flex">
            SMARTPHONE
        </div>

    </div>
</div>

<div class="menu-pc menu-bulbe">
    <a href="../categories/laptop/laptop.php">
    <div class="menu-acceuil-r shadow">
        <svg fill="white" id="Outline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <title>46 computer</title>
            <path
                d="M19,1H5A5.006,5.006,0,0,0,0,6v8a5.006,5.006,0,0,0,5,5h6v2H7a1,1,0,0,0,0,2H17a1,1,0,0,0,0-2H13V19h6a5.006,5.006,0,0,0,5-5V6A5.006,5.006,0,0,0,19,1ZM5,3H19a3,3,0,0,1,3,3v7H2V6A3,3,0,0,1,5,3ZM19,17H5a3,3,0,0,1-2.816-2H21.816A3,3,0,0,1,19,17Z" />
        </svg>
    </div>
</a>
    <div class="menu-acceuil-text shadow-sm">
        <div class="menu-acceuil-text-flex">
            ORDINATEUR
        </div>

    </div>
</div>

<div class="menu-apropos menu-bulbe">
    <a href="../../about.html">
    <div class="menu-acceuil-r shadow">
        <svg fill="white" id="Outline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <title>91 info</title>
            <path
                d="M12,0A12,12,0,1,0,24,12,12.013,12.013,0,0,0,12,0Zm0,22A10,10,0,1,1,22,12,10.011,10.011,0,0,1,12,22Z" />
            <path d="M12,10H11a1,1,0,0,0,0,2h1v6a1,1,0,0,0,2,0V12A2,2,0,0,0,12,10Z" />
            <circle cx="12" cy="6.5" r="1.5" />
        </svg>
    </div>
</a>
    <div class="menu-acceuil-text shadow-sm">
        <div class="menu-acceuil-text-flex">
            A PROPOS
        </div>

    </div>
</div>
<!-- MENU BULBE  -->














    <div class="body">
        <header class="header">
            <div class="container">
                <div class="header_title pt-5">
                    Panier et les produit
                </div>
                <div class="header_text mt-4">
                    <div class="row">
                        <div class="col-md-8">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aut explicabo itaque nihil, ea,
                            amet nesciunt iusto quos, blanditiis neque esse reprehenderit ducimus maiores vitae odio.
                            Ratione obcaecati beatae nemo quibusdam!
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <div class="page-title">
            PANIER
        </div>























 <!-- PAS DE PRODUICT DANS LE PANIER -->
<?php if ($notProduct == true) : ?>
    <div class="container"> 
           <div class="card shadow p-4">
               <h3 align="center">Vos Produit</h3>
               <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptate asperiores aspernatur sapiente fugiat pariatur itaque consequatur quas quod iste, autem id nemo dolore doloribus odio eveniet reiciendis ipsum eligendi omnis.</p>
           </div> 
     </div>
<?php endif ?>

 <!-- PAS DE PRODUICT DANS LE PANIER -->











 <!-- PRODUCT  REPRESENTATION -->
<?php if ($notProduct == false) : ?>
        <!-- PRODUCT -->
        <div class="container" style="margin-bottom: 10rem;">
            <div class="row justify-content-center">

            
                <!-- PRODUCTS -->
                <div class="col-md-6">




                    
            <?php foreach ($Smartphones as $key => $Smartphone) : ?>


                <!--  PRODUCT -->

                    <div class="card shadow w-100 border-light p-3 mb-lg-5">

                        <!-- BTN ADD PRODUCT-->
                         <a href="addPanier.php?id=<?= $Smartphone->id_product  ?>"  class="article-add p-2"><div>
                            <svg fill="white" id="Outline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <title>110 add to shopping bag</title>
                                <path
                                    d="M23,19H21V17a1,1,0,0,0-2,0v2H17a1,1,0,0,0,0,2h2v2a1,1,0,0,0,2,0V21h2a1,1,0,0,0,0-2Z" />
                                <path
                                    d="M21,6H18A6,6,0,0,0,6,6H3A3,3,0,0,0,0,9V19a5.006,5.006,0,0,0,5,5h9a1,1,0,0,0,0-2H5a3,3,0,0,1-3-3V9A1,1,0,0,1,3,8H6v2a1,1,0,0,0,2,0V8h8v2a1,1,0,0,0,2,0V8h3a1,1,0,0,1,1,1v5a1,1,0,0,0,2,0V9A3,3,0,0,0,21,6ZM8,6a4,4,0,0,1,8,0Z" />
                            </svg>
                        </div>
                        </a>

                        <!-- BTN ADD PRODUCT-->
                        <div class="row">
                            <!-- PRODUCT IMG -->
                            <div class="col-md-4 flexer">
                                <img src="../../../admin/<?= $Smartphone->img_link_product ?>"
                                    class="img-fluid img-custom" alt="">
                            </div>
                            <!--  PRODUCT IMG -->

                            <!--  PRODUCT DESCRIPTION -->
                            <div class="col-md-8">


                                <span class="title-product">MARQUE : </span><span
                                    class="product-info"><?= $Smartphone->lib_product ?></span> <br>
                                <span class="title-product">Ecran : </span><span class="product-info"> <?= $descriptionsSmart[$key]->ecran_product ?></span> <br>
                                <span class="title-product">Processor : </span><span class="product-info"><?= $descriptionsSmart[$key]->processeur_product ?></span> <br>
                                
                                <span class="title-product">Camera : </span><span class="product-info"><?= $descriptionsSmart[$key]->camera_product ?></span> <br>
                               
                                    
                                <div class="mb-4"></div>
                                <div class="btn-grou">
                                <a href="panier.php?del=<?= $Smartphone->id_product ?>"><div class="btn btn-dark mt-4" style="font-size:0.8rem;font-weight:700;">RETIRER</div></a>
                                    <div class="btn btn-dark mt-4"  style="font-size:0.8rem;font-weight:700;">PRICE :<?= $Smartphone->price_product ?>€ </div>
                                   
                                    <div class="btn btn-dark mt-4"  style="font-size:0.8rem;font-weight:700;">QUANTITE : <?= $_SESSION["panier"][$Smartphone->id_product] ?> </div>
                                    
                                </div>

                            </div>
                            <!--  PRODUCT DESCRIPTION -->
                        </div>
                    </div>

                      <!--  PRODUCT -->
                
              <?php endforeach?>

                         



            <?php foreach ($Laptops as $key => $Laptop) : ?>


<!--  PRODUCT -->

    <div class="card shadow w-100 border-light p-3 mb-lg-5">

        <!-- BTN ADD PRODUCT-->
         <a href="addPanier.php?id=<?= $Laptop->id_product  ?>"  class="article-add p-2">
         <div>
            <svg fill="white" id="Outline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <title>110 add to shopping bag</title>
                <path
                    d="M23,19H21V17a1,1,0,0,0-2,0v2H17a1,1,0,0,0,0,2h2v2a1,1,0,0,0,2,0V21h2a1,1,0,0,0,0-2Z" />
                <path
                    d="M21,6H18A6,6,0,0,0,6,6H3A3,3,0,0,0,0,9V19a5.006,5.006,0,0,0,5,5h9a1,1,0,0,0,0-2H5a3,3,0,0,1-3-3V9A1,1,0,0,1,3,8H6v2a1,1,0,0,0,2,0V8h8v2a1,1,0,0,0,2,0V8h3a1,1,0,0,1,1,1v5a1,1,0,0,0,2,0V9A3,3,0,0,0,21,6ZM8,6a4,4,0,0,1,8,0Z" />
            </svg>
        </div>
        </a>

        <!-- BTN ADD PRODUCT-->
        <div class="row">
            <!-- PRODUCT IMG -->
            <div class="col-md-4 flexer">
                <img src="../../../admin/<?= $Laptop->img_link_product ?>"
                    class="img-fluid img-custom" alt="">
            </div>
            <!--  PRODUCT IMG -->

            <!--  PRODUCT DESCRIPTION -->
            <div class="col-md-8">


                <span class="title-product">MARQUE : </span><span
                    class="product-info"><?= $Laptop->lib_product ?></span> <br>
                <span class="title-product">Ecran : </span><span class="product-info"> <?= $descriptionsLaptop[$key]->ecran_product ?></span> <br>
                <span class="title-product">Processor : </span><span class="product-info"><?= $descriptionsLaptop[$key]->processeur_product ?></span> <br>
                
                <span class="title-product">Graphique : </span><span class="product-info"><?= $descriptionsLaptop[$key]->graphique_product ?></span> <br>

                <span class="title-product">Ram/Interne : </span><span class="product-info"><?= $descriptionsLaptop[$key]->ram_product ?>/<?= $descriptionsLaptop[$key]->interne_product ?></span> <br>
               
                    
                <div class="mb-4"></div>
                <div class="btn-grou">
                <a href="panier.php?del=<?= $Laptop->id_product ?>"><div class="btn btn-dark mt-4"  style="font-size:0.8rem;font-weight:700;">RETIRER</div></a>
                    <div class="btn btn-dark mt-4"  style="font-size:0.8rem;font-weight:700;">PRICE :<?= $Laptop->price_product ?>€ </div>
                   
                    <div class="btn btn-dark mt-4"  style="font-size:0.8rem;font-weight:700;">QUANTITE : <?= $_SESSION["panier"][$Laptop->id_product] ?> </div>
                    
                </div>

            </div>
            <!--  PRODUCT DESCRIPTION -->
        </div>
    </div>

      <!--  PRODUCT -->

<?php endforeach ?>









                    
                </div>
                <!-- PRODUCTS -->


                <!-- TOTAL PRODUCT INFORMATION -->
                <div class="col-md-2">
                    <div class="card panier_information p-4">
                        <div class="nbr-products_title">NOMDRE DE PRODUITS</div>
                        <div class="class nbr-products_value"><?= $count ?></div>

                        <div class="nbr-products_title">PRIX TOTAL</div>
                        <div class="class total-products_value"><?= $total ?>€</div>

                        

                        <div class="button-blue w-100 mt-3">PAYER LA COMMANDE</div>
                        <!-- <div class="button-red w-100 mt-3">VIDER LE PANIER</div> -->


                    </div>
                </div>
                <!-- TOTAL PRODUCT INFORMATION -->
            </div>
        </div>
        <!-- PRODUCT -->
    </div>


    <?php endif ?>
 <!-- PRODUCT  REPRESENTATION -->


















      <!-- FOOTER REPRESENTATION -->


      <footer class="footer pt-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-2">
                    <ul>
                        <li class="footer-title">Contact Us</li>
                        <li>Contact Information</li>
                        <li>Check order status</li>
                        <li>Find a Store</li>
                        <li>Get e Rebate</li>
                    </ul>


                </div>
                <div class="col-md-2">
                    <ul>
                        <li class="footer-title">Support</li>
                        <li>Contact Information</li>
                        <li>Check order status</li>
                        <li>Find a Store</li>
                        <li>Get e Rebate</li>
                    </ul>

                </div>
                <div class="col-md-2">
                    <ul>
                        <li class="footer-title">International</li>
                        <li>Cell phone</li>
                        <li>Phone & device</li>
                        <li>Find </li>
                        <li>Get e Rebate</li>
                    </ul>

                </div>
                <div class="col-md-2">
                    <ul>
                        <li class="footer-title">Plan</li>
                        <li>Business plans</li>
                        <li>Internet of Things</li>
                        <li>Find a Store</li>
                        <li>Get e Rebate</li>
                    </ul>


                </div>
            </div>
            <div class="divider-line"></div>
            <div class="footer-bottom mt-4">2005-2022 All right reserved</div>
        </div>
    </footer>



    <!-- FOOTER REPLESENTATION -->




    <script src="../../js/vendor/JQuery/jquery.js"></script>
    <script src="../../js/vendor/bootstrap/bootstrap.js"></script>
    <script src="../../js/vendor/loco/locomotive-scroll.js"></script>
    <script src="../../js/animation/panier-anime.js"></script>
    <script src="../../js/vendor/gsap/gsap.js"></script>
    <script src="../../js/animation/menu-animation.js"></script>
    <script src="../../js/description/ajax-description.js"></script>
    <script src="../../js/panier.js"></script>
</body>

</html>