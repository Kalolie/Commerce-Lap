<?php 
require("../dbConnexion.php");
if (isset($_POST["email"]) && isset($_POST["password"]) ) {

    if (!empty($_POST["email"])  && !empty($_POST["password"])) {
        function validateInput($var){
            $var = trim($var);
            $var = htmlspecialchars($var);
            $var = stripslashes($var);
            return $var;
        }
        function emailValidate($varEmail){
            return filter_var($varEmail,FILTER_VALIDATE_EMAIL);
        }
        $email = validateInput($_POST["email"]);
        $password = validateInput($_POST["password"]);

        if (emailValidate($email)) {

            
            $dbConnexion = new PDODB("localhost","root","","commerce-lap");
            $dbRequestEmail = $dbConnexion->PDOConnecte();
            $dbRquestConnexion = $dbRequestEmail->prepare("SELECT * FROM admin WHERE email= :email AND password_admin= :password");  
            $dbRquestConnexion->execute(array('email' => $email,'password' => $password));
            $adminInfo =  $dbRquestConnexion->fetch();
            $ClientsVerifieMailline = $dbRquestConnexion->rowcount();

            if ($ClientsVerifieMailline > 0) {
                session_start();
                $_SESSION['idAdmin']=$adminInfo['id'];
                header('location:../index.php?id='.$_SESSION['idAdmin']);
                
                    
             
                
                    
                    
            } else {
                $error = "Entrez des identifiants valide";
            }
            
            
        } else {
            $error = "Entrez un email valide";
        }
        
    } else {
       $error = "Remplissez tous les champs";
    }
    
    

    
}
    

    
    



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/css/connexion-admin.css">
    <link rel="stylesheet" href="../../public/css/vendor/bootstrap.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Connectez vous</title>
</head>
<body>
    <div class="body">
        <div class="card shadow p-5" style="background-color: rgb(255, 255, 255);">
             <form action="" method="post" name="form">
                 <label for="email" class="mb-2">Email<span class="text-danger">*</span></label>
                 <input type="email" name="email" class="form-control" placeholder="email">
                 <label for="password" class="mt-5 mb-2">Password<span class="text-danger">*</span></label>
                 <input type="password" name="password" class="form-control mb-2" placeholder="password">
                 <?php if (isset($error)) : ?>
                 <div class="alert alert-danger"><?= $error ?></div>
                 <?php endif ?>
                 <button type="submit" class="btn btn-primary">CONNECTER</button>
             </form>
        </div>
    </div>
</body>


</html>