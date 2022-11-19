<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finaliser votre commander</title>
</head>

  <link rel="stylesheet" href="../public/css/vendor/bootstrap.css">
  <link rel="stylesheet" href="../public/css/css/footer.css">
  <link rel="stylesheet" href="../public/css/css/styles.css">
  <link rel="stylesheet" href="../public/css/css/formulaire-commande.css">
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
          <li class="nav-item">
          <a class="nav-link" href="panier.php">Panier</a>
        </li>
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


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                            <div class="formulaire_flex">
                                <div class="formulaire_container">
                                    <form>
                                      <input class="input_cmd" type="text" placeholder="Nom" name="nom">
                                      <input class="input_cmd" type="text" placeholder="Prenom" name="prenom">
                                      <input class="input_cmd" type="text" placeholder="Email" name="email">
                                      <input class="input_cmd" type="text" placeholder="Adresse" name="adresse">
                                      <input class="input_cmd" type="text" placeholder="Ville" name="ville">
                                      <input class="input_cmd" type="text" placeholder="Code Postal" name="codepostal">
                                      <select class="input_cmd form-control" name="pay">
                                            <option>Benin</option>
                                            <option>Togo</option>
                                            <option>Nigeria</option>
                                            <option>Niger</option>
                                      </select>
                                      <button class="btn_cmd reset" type="reset">Reinitialiser le formulaire</button>
                                      <div class="divider_cmd" type="submit">
                                         <div class="line_cmd"></div>
                                         <div class="text_divider_cmd">ou</div>
                                         <div class="line_cmd"></div>
                                      </div>
                                      <button class="btn_cmd payer" type="submit">PAYER
                                         <img class="img-fluid" src="../public/assets/payment-method-img/PayPal.svg"/>
                                      </button>
                                    </form>
                                  
                                </div>
                            </div>
                    </div>
                </div>
        </div>
    </div>

</div>


<?php include("../components/footer.php"); ?>



<script src="../public/js/vendor/JQuery/Jquery.js"></script>
<script src="../public/js/vendor/bootstrap/bootstrap.js"></script>
<script src="../public/js/form_cmd.js"></script>
</body>
</html>