<?php
session_start();
require_once("../admin/dbConnexion.php");
require_once("panier/panier.class.php");


if (isset($_SESSION["panier"])) {
           

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
            
        $DB = new PDODB("localhost","root","","commerce-lap");
        $DBCONNECTE = $DB->PDOConnecte();

        $requestOutils = $DBCONNECTE->query("SELECT * FROM products WHERE id IN ($idsNumber) AND categorie_id=2");
        $requestLaptop = $DBCONNECTE->query("SELECT * FROM products WHERE id IN ($idsNumber) AND categorie_id=1");

       
        $Laptops = $requestLaptop->fetchAll(PDO::FETCH_OBJ);
        $Outils = $requestOutils->fetchAll(PDO::FETCH_OBJ);


        $LaptopIdArray = array();

        $OutilsIdArray = array();
        
        foreach ($Laptops as $key => $Laptop) {
              $id = $Laptop->id;
              array_push($LaptopIdArray,$id);
        }

        foreach ($Outils as $key => $Outil) {
            $id = $Outil->id;
            array_push($OutilsIdArray,$id);
        }


        $idOutilsImplode = implode(",",$OutilsIdArray);
        $idLaptopImplode = implode(",",$LaptopIdArray);


        if ($idLaptopImplode == '') {
            $requestDescriptionLaptop = $DBCONNECTE->prepare("SELECT * FROM description_laptop WHERE id IN (:implodeLaptop)");
            $requestDescriptionLaptop->execute(array("implodeLaptop"=>$idLaptopImplode));
        } else {
            $requestDescriptionLaptop = $DBCONNECTE->query("SELECT * FROM description_laptop WHERE id IN ($idLaptopImplode)");
            
        }
        
       
        if ($idOutilsImplode == '') {
            $requestDescriptionOutils = $DBCONNECTE->prepare("SELECT * FROM description_outil WHERE id IN (:implodeOutils)");
            $requestDescriptionOutils->execute(array("implodeOutils"=>$idOutilsImplode));
        } else {
            $requestDescriptionOutils = $DBCONNECTE->query("SELECT * FROM description_outil WHERE id IN ($idOutilsImplode)");
           
        }
        

        


        
        
        $descriptionsLaptop = $requestDescriptionLaptop->fetchAll(PDO::FETCH_OBJ);
        $descriptionsOutil = $requestDescriptionOutils->fetchAll(PDO::FETCH_OBJ);

        
       

        


                    
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
  $notProduct = true;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="Acheter vos portable et pc en ligne depuis n'importe quel lieu">
  <meta name="keywords" content="smartphone;pc;achat;acheter;vente en ligne">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="../public/css/vendor/bootstrap.css">
  <link rel="stylesheet" href="../public/css/css/footer.css">
  <link rel="stylesheet" href="../public/css/css/styles.css">
  <link rel="stylesheet" href="../public/css/css/panier.css">

  <title>Vos produits</title>

</head>

<body>



  <!-- Header  -->
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
        aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
        aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="img_header img_header_one">
          <div class="img_header_text">
            <div class="container">
              <div class="img_header_title">Reduction de 20% sur l'achat d'un laptop.</div>
              <div class="img_header_text_small">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repudiandae
                consequatur distinctio iusto, sequi nam corporis adipisci.
                velit consequatur illum exercitationem amet omnis fuga corporis dolores aperiam nesciunt, repellat quis
                voluptates!
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="img_header img_header_two">
          <div class="img_header_text">
            <div class="container">
              <div class="img_header_title">Reduction de 50% sur l'achat d'un smartphone.</div>
              <div class="img_header_text_small">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repudiandae
                consequatur distinctio iusto, sequi nam corporis adipisci.
                velit consequatur illum exercitationem amet nesciunt, repellat quis voluptates!
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="img_header img_header_three">
          <div class="img_header_text">
            <div class="container">
              <div class="img_header_title">20% sur l'achat d'une unité centrale.</div>
              <div class="img_header_text_small">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repudiandae
                consequatur distinctio iusto, sequi nam corporis adipisci.
                velit consequatur illum exercitationem amet omnis fuga corporis dolores aperiam nesciunt, repellat quis
                voluptates!
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
      data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
      data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- Header  -->



  <!-- NavBar  -->
  <nav class="navbar navbar navbar-light bg-light navbar-expand-lg">


    <div class="container">
      <a class="navbar-brand" id="logo" href="/">Commerce-Lap</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
        aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Acceuil</a>
          </li>
          <!-- <li class="nav-item">
          <a class="nav-link" href="pages/panier.php">Panier</a>
        </li> -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              Categories
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
               <li><a class="dropdown-item" href="all_products.php?page=1">All products</a></li>
              <li><a class="dropdown-item" href="laptop.php?page=1">Laptop</a></li>
              <li><a class="dropdown-item" href="outils_informatique.php?page=1">Outis informatique</a></li>

            </ul>
          </li>

        </ul>
     
      </div>
    </div>


  </nav>
  <!-- NavBar  -->





  <!-- CONTENT  -->

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="row justify-content-center">
          <div class="col-md-12 p-2">
            <div class="row">
              <div class="page_big_title mb-4">Panier</div>
              <?php if(!isset($_SESSION["panier"]) || empty($_SESSION["panier"])) :?>
                    <p>
                        Les produits que vous ajouter à votre panier sont affichés ici. Veuillez ajouter un produit à votre panier.
                    </p>
                   
              <?php endif ?>


              <?php if(isset($_SESSION["panier"]) && !empty($_SESSION["panier"])) :?>
              <div class="col-md-8">
              
                <div class="products_panier_container">



                  <!-- PRODUCT OUTILS -->

             <?php foreach ($Outils as $key => $value) : ?>

                <div class="product_panier">
                <a href="panier.php?del=<?= $value->id ?>" style="text-decoration:none;"><div class="del-btn"><div>-</div></div></a>
                  <div class="product_panier_img_card">
                    <div class="product_panier_img" style="background-image:url('../admin/<?= $value->img_link_product ?>');">

                    </div>
                  </div>
                  <div class="product_panier_info">
                    <div class="product_panier_name">
                      <?= $value->lib_product ?>
                    </div>
                    <div class="product_panier_price">
                      <?= $value->price ?> $
                    </div>
                    <div class="product_panier_price" style="font-size:0.7rem">
                      QUANTITE: <span><?= $_SESSION["panier"][$value->id] ?></span>
                    </div>


                    <a href="panier/addPanier.php?id=<?= $value->id  ?>">
                    <div class="product_panier_add">
                        <svg fill="white" id="Outline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                          <title>110 add to shopping bag</title>
                          <path d="M23,19H21V17a1,1,0,0,0-2,0v2H17a1,1,0,0,0,0,2h2v2a1,1,0,0,0,2,0V21h2a1,1,0,0,0,0-2Z" />
                          <path
                            d="M21,6H18A6,6,0,0,0,6,6H3A3,3,0,0,0,0,9V19a5.006,5.006,0,0,0,5,5h9a1,1,0,0,0,0-2H5a3,3,0,0,1-3-3V9A1,1,0,0,1,3,8H6v2a1,1,0,0,0,2,0V8h8v2a1,1,0,0,0,2,0V8h3a1,1,0,0,1,1,1v5a1,1,0,0,0,2,0V9A3,3,0,0,0,21,6ZM8,6a4,4,0,0,1,8,0Z" />
                        </svg>
                    </div>
                    </a>


                  </div>

                  


                </div>
           <?php endforeach ?>

          <!-- PRODUCT OUTILS-->




                  <!-- PRODUCT LAPTOP -->

                  <?php foreach ($Laptops as $key => $value) : ?>

                  <div class="product_panier">
                  <a href="panier.php?del=<?= $value->id ?>" style="text-decoration:none;"><div class="del-btn"><div>-</div></div></a>
                    <div class="product_panier_img_card">
                      <div class="product_panier_img" style="background-image:url('../admin/<?= $value->img_link_product ?>');">
          
                      </div>
                    </div>
                    <div class="product_panier_info">
                      <div class="product_panier_name">
                        <?= $value->lib_product ?>
                      </div>
                      <div class="product_panier_price">
                         <?= $value->price ?> $
                      </div>
                      <div class="product_panier_price" style="font-size:0.7rem">
                        QUANTITE: <span><?= $_SESSION["panier"][$value->id] ?></span>
                      </div>


                      <a href="panier/addPanier.php?id=<?= $value->id  ?>"><div class="product_panier_add">
                      <svg fill="white" id="Outline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <title>110 add to shopping bag</title>
                        <path d="M23,19H21V17a1,1,0,0,0-2,0v2H17a1,1,0,0,0,0,2h2v2a1,1,0,0,0,2,0V21h2a1,1,0,0,0,0-2Z" />
                        <path
                          d="M21,6H18A6,6,0,0,0,6,6H3A3,3,0,0,0,0,9V19a5.006,5.006,0,0,0,5,5h9a1,1,0,0,0,0-2H5a3,3,0,0,1-3-3V9A1,1,0,0,1,3,8H6v2a1,1,0,0,0,2,0V8h8v2a1,1,0,0,0,2,0V8h3a1,1,0,0,1,1,1v5a1,1,0,0,0,2,0V9A3,3,0,0,0,21,6ZM8,6a4,4,0,0,1,8,0Z" />
                      </svg>
                    </div>
                  </a>


                    </div>

                    


                  </div>
                  <?php endforeach ?>

                <!-- PRODUCT LAPTOP-->
              







                </div>
              </div>











              <div class="col-md-4">
                <div class="panier_info p-4">

                  <div class="panier_info_container">
                    <span class="panier_info_tile">
                         TOTAL TVA :
                    </span>
                    <span class="panier_info_value">
                        <?= $total ?> $
                    </span>
                  </div>

                  <div class="panier_info_container">
                    <span class="panier_info_tile">
                         TOTAL SANS TVA :
                    </span>
                    <span class="panier_info_value">
                      <?= $total-200 ?> $
                    </span>
                  </div>

                  <div class="panier_info_container">
                    <span class="panier_info_tile">
                         TOTAL:
                    </span>
                    <span class="panier_info_value">
                        <?= $total ?> $
                    </span>
                  </div>




                  <div class="panier_info_container">
                    <span class="panier_info_tile">
                         QUANTITE DE PRODUIT :
                    </span>
                    <span class="panier_info_value">
                       <?= $count ?>
                    </span>
                  </div>


                  <a href="formulaire-commande.php" style="text-decoration:none;"><div class="button_pay">PAYER LA COMMANDE</div></a>

                </div>


              </div>


            <?php endif ?>





            </div>


          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- CONTENT  -->










  <?php include("../components/footer.php"); ?>



  <!-- CONTENT  -->

  <!-- <h1>Page Home</h1> -->
</body>

<script src="../public/js/vendor/JQuery/Jquery.js"></script>
<script src="../public/js/vendor/bootstrap/bootstrap.js"></script>


</html>