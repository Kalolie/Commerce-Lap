$(function () {


    var reader = {};
    var file = {};
    var slice_size = 1000 * 1024;

  

    function start_upload(e) {
        e.preventDefault();

         let  descriptions = document.querySelector("#form-smart").other_desc_product_sm.value;
                   

         let lib_product = document.querySelector("#form-smart").lib_product.value;
                    
         let price_product = document.querySelector("#form-smart").price_product.value;

         let submit_btn_outil =  document.querySelector(".btn_submit_outil");

         let choice_outil = document.querySelector("#form-smart").choice_outil.value;
         if (descriptions == "" || lib_product == "" || price_product == "" || document.querySelector("#file-input-smart").files[0] == undefined) {
            submit_btn_outil.classList.remove("btn-primary");
            submit_btn_outil.classList.add("btn-danger");
            submit_btn_outil.innerHTML = "Remplissez tous les champs";
         } else {
            reader = new FileReader();
            file = document.querySelector("#file-input-smart").files[0];
            upload_file(0);
         }



      
    }

    $("#button-smart").on("click", start_upload);


    function upload_file(start) {

        var next_slice = start + slice_size + 1;
        var blob = file.slice(start, next_slice);

        reader.onloadend = function (event) {


            if (event.target.readyState !== FileReader.DONE) {
                return;
            }
            var date = new Date();
            var dataTime = date.getTime();
            let choice_outil_input = document.querySelector("#form-smart").choice_outil.value;
            $.ajax({

               
                url: choice_outil_input == "insert" ?  "insertSmart.php" : "../../insertSmart.php",
                type: "POST",
                dataType: "json",
                cache: false,
                data: {

                    descriptions: document.querySelector("#form-smart").other_desc_product_sm.value,
                   

                    lib_product: document.querySelector("#form-smart").lib_product.value,
                    choice_outil:document.querySelector("#form-smart").choice_outil.value,
                    price_product: document.querySelector("#form-smart").price_product.value,
                    id_get:choice_outil_input == "insert" ?  "" : document.querySelector("#form-smart").id_get.value,


                    


                    


                    file_data: event.target.result,
                    file: dataTime + file.name
                },

                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(errorThrown);
                    // console.log("None");
                },

                success: function (data) {
                    var size_done = start + slice_size;
                    var percent_done = Math.floor((size_done / file.size) * 100);

                    if (next_slice < file.size) {
                        $("#upload-progress").html("Uploading File - " + percent_done + "%");
                        upload_file(next_slice);

                    } else {

                        let choice_outil=document.querySelector("#form-smart").choice_outil.value;

                        if (choice_outil == "insert") {
                            document.querySelector("#form-smart").other_desc_product_sm.value = "";
                   

                            document.querySelector("#form-smart").lib_product.value = "";
                                    
                            document.querySelector("#form-smart").price_product.value = "";
                            
                            let submit_btn_outil = document.querySelector(".btn_submit_outil");
                            submit_btn_outil.classList.remove("btn-danger");
                            submit_btn_outil.innerHTML = "Le produit à été bien inséré";
                            submit_btn_outil.classList.add("btn-primary");
                        } else {
                            window.location.reload();
                        }
                        
                    }
                }


            });


        };
        reader.readAsDataURL(blob);
    }
});