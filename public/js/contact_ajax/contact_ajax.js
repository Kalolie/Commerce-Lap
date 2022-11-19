(function () {
         

         let btn_sendmail = document.querySelector(".send_mail");

         btn_sendmail.addEventListener("click",(event)=>{
            let content = document.querySelector("#form_mail").content.value;
            let email = document.querySelector("#form_mail").email.value;
            let objet = document.querySelector("#form_mail").object.value;
                
            event.preventDefault();
                console.log(content)

                let tab  = [];
                
                if (document.querySelector("#form_mail").content.value !== "" && document.querySelector("#form_mail").object.value.length !== 0 &&  document.querySelector("#form_mail").email.value.length !== 0) {

                     $.ajax({
                        url:"../../../pages/contact_us/contact_ajax.php",
                        type:"POST",
                        dataType:"json",
                        data: {
                                content : document.querySelector("#form_mail").content.value,
                                email : document.querySelector("#form_mail").email.value,
                                objet : document.querySelector("#form_mail").object.value,
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                          console.log(jqXHR, textStatus, errorThrown);
                        },
                        success:function () {
                            btn_sendmail.style.backgroundColor = "dodgerblue";
                            btn_sendmail.innerHTML = "Votre mail a été bien envoyé";
                            
                        }
                     })
                } else {
                    btn_sendmail.style.backgroundColor = "crimson";
                    btn_sendmail.innerHTML = "Remplissez tout les champs";

                    
                }
         })
        
         

         

}())