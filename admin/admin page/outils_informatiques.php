<?php 
session_start();
require("../dbConnexion.php");
if (isset($_SESSION["idAdmin"])) {
    $DB = new PDODB("localhost","root","","commerce-lap");
    $dbRequest = $DB->PDOConnecte();
    $usersRequest = $dbRequest->query("SELECT * FROM `products` WHERE categorie_id=2");
    $usersInfo = $usersRequest->fetchAll(PDO::FETCH_OBJ);

    
   
}else{
    header("location:../connexion/connexion-admin.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../public/css/vendor/bootstrap.css">
    <link rel="stylesheet" href="../../public/css/css/style_two.css">
    <link rel="stylesheet" href="../../public/css/css/menu-rond-style.css">
    <link rel="stylesheet" href="../../public/css/css/footer.css">

</head>
<body>
<div class="menu-burger p-3">
        <svg fill="white" id="Outline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <title>185 menu dots vertical</title>
            <circle cx="12" cy="2" r="2" />
            <circle cx="12" cy="12" r="2" />
            <circle cx="12" cy="22" r="2" />
        </svg>
    </div>

    <!-- MENU BULBE  -->
    <div class="menu-acceuil menu-bulbe">
        <a href="../index.php">
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

 

    <div class="menu-inscription menu-bulbe">
        <div class="menu-acceuil-r shadow">
            <svg fill="white" id="Outline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <title>95 add user</title>
                <path d="M23,11H21V9a1,1,0,0,0-2,0v2H17a1,1,0,0,0,0,2h2v2a1,1,0,0,0,2,0V13h2a1,1,0,0,0,0-2Z" />
                <path d="M9,12A6,6,0,1,0,3,6,6.006,6.006,0,0,0,9,12ZM9,2A4,4,0,1,1,5,6,4,4,0,0,1,9,2Z" />
                <path d="M9,14a9.01,9.01,0,0,0-9,9,1,1,0,0,0,2,0,7,7,0,0,1,14,0,1,1,0,0,0,2,0A9.01,9.01,0,0,0,9,14Z" />
            </svg>
        </div>
        <div class="menu-acceuil-text shadow-sm">
            <div class="menu-acceuil-text-flex">
                INSCRIPTION
            </div>

        </div>
    </div>

    <div class="menu-connexion menu-bulbe">
<a href="connexion.php">
        <div class="menu-acceuil-r shadow menu-connexion-bulbe">
            <svg fill="white" id="Outline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <title>192 log in</title>
                <path
                    d="M7,22H5a3,3,0,0,1-3-3V5A3,3,0,0,1,5,2H7A1,1,0,0,0,7,0H5A5.006,5.006,0,0,0,0,5V19a5.006,5.006,0,0,0,5,5H7a1,1,0,0,0,0-2Z" />
                <path
                    d="M10.462,5.293,5.875,9.879a3.007,3.007,0,0,0,0,4.242l4.586,4.586a1,1,0,1,0,1.414-1.414L7.584,13H23a1,1,0,0,0,0-2H7.583l4.293-4.293a1,1,0,1,0-1.414-1.414Z" />
            </svg>
        </div>
    </a>
        <div class="menu-acceuil-text shadow-sm">
            <div class="menu-acceuil-text-flex">
                CONNEXION
            </div>

        </div>

    </div>


    <div class="menu-smart menu-bulbe">
        <a href="categories/smartphone/smartphone.html">
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

    <div class="menu-panier menu-bulbe">
        <a href="categories/laptop/laptop.html">
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

   
    </div>
    <!-- MENU BULBE  -->







    <header class="header"> 
        <div class="container">
              <div class="header-title">
                    Autoriser qu'aux administrateurs
              </div>
              <div class="header-text">
                   Cette page est construire seulement pour les admistrateurs. Veuillez vous déconnectez de cette
                   page si vous n'etes pas administrateur du site web. Cette permet au administrateur d'ajouter des produits recents 
                   et des les editer. 
              </div>
        </div>

        <div class="row justify-content-center">
             <div class="col-md-4">
                    <div class="first-svg"></div>
             </div>
             <div class="col-md-4">
                    <div class="two-svg"></div>
             </div>
             <div class="col-md-4">
                    <div class="three-svg"></div>
             </div>
        </div>
    </header>





    <h4 class="mt-4 title" align="center">Smartphone</h4>

  
<div class="container">



    <div class="row justify-content-center">

       <div class="col-md-12">
       <table class="table">
        <thead>
             <tr>
                  <th scope="col">#</th>
                  <th scope="col">produit</th>
                  <th scope="col">Editeur</th>
             </tr>
        </thead>
        <tbody>
        <?php  foreach ($usersInfo as $key => $value) : ?>
             <tr>
                 <th scope="row"> <?= $value->id ?></th>
                 <td  style="word-wrap:break-word;word-break: break-all;"> <?= $value->lib_product ?></td>
                 <td  style="word-wrap: break-word;word-break: break-all;"><a href="editer/outils_editer.php?id=<?= $value->id ?>"><button class="btn btn-dark">EDITER</button></a><a href="delete.php?id=<?= $value->id ?>"><button class="btn btn-danger">DELETE</button></a></td>
             </tr>
        <?php endforeach ?>
        </tbody>
    </table>


       </div>

</div>


</div>







    

      <!-- FOOTER REPLESENTATION -->


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




    <script src="../../public/js/vendor/gsap/gsap.js"></script>
    <script src="../../public/js/vendor/JQuery/jquery.js"></script>
    <script src="../../public/js/animation/menu-animation.js"></script>
    <script src="../../public/js/vendor/bootstrap/bootstrap.js"></script>
</body>
</html> 