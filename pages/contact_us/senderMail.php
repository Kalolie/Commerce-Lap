<?php
require("../panier/dbConnexion.php");
// SEND MAIL SYSTEM 

class SendMailDescription{
    public $emailClient;
    public $emailSite;
    public $objet;
    public $content;

    function __construct($emailClient,$objet,$content,$emailSite){
        function validateInput($var){
            $var = trim($var);
            $var = htmlspecialchars($var);
            $var = stripslashes($var);
            return $var;
        }
        $this->objet = validateInput($objet);
        $this->content = validateInput($content);
        $this->emailClient = $emailClient;
        $this->emailSite = $emailSite;
        
    }
  public function SendMail(){
      $arrayDescription = array('errorSend' =>"");
    //   if (empty($this->ClientBudget) || empty($this->DescriptionSite)) {
    //        $error = $arrayDescription["errorSend"] = "Le remplissage de tout les champs est obligatoire";
    //        return $error ;
    //   }
      $emailText = "";
 
      $emailText .= "Email $this->emailClient\n";
      $emailText .= "Objet $this->objet\n";
      $emailText .= "Message $this->content\n";
      
      $headerMail = "From: <$this->emailClient>\r\nReply-To:$this->emailClient";
      mail($this->emailSite,"Message", $emailText, $headerMail);
      $this->content = $this->objet = $this->emailClient = "";   
  }

}
// SEND MAIL SYSTEM 