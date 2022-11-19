<?php
   require_once("senderMail.php");
   $content = $_POST["content"];
   $objet = $_POST["objet"];
   $emailClient = $_POST["email"];
   $emailSite = "admin@gmail.com";

   $message = "Objet : $objet Message $content ";
   
   $sendMail = new SendMailDescription($emailClient,$objet,$content,$emailSite);
   $sendMail->SendMail();
   echo json_encode([]);

?>