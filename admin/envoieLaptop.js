$(function () {


    var reader = {};
    var file = {};
    var slice_size = 1000 * 1024;

  



    function start_upload(e) {
       

        e.preventDefault();




        let rom_lap = document.querySelector("#form-laptop").interne_lap.value;
        let ram_lap = document.querySelector("#form-laptop").ram_lap.value;
        let processor_lap = document.querySelector("#form-laptop").processeur_lap.value;
        let graphique_lap = document.querySelector("#form-laptop").graphique_lap.value;
        let other_description = document.querySelector("#form-laptop").other_desc_product_pc.value;
        let screen_lap = document.querySelector("#form-laptop").ecran_lap.value;
        let lib_product_lap = document.querySelector("#form-laptop").lib_product_lap.value;
        let price_product_lap = document.querySelector("#form-laptop").price_product_lap.value;


        let submit_btn = document.querySelector(".btn_laptop_submit");
        let choice_laptop = document.querySelector("#form-laptop").choice_laptop.value;
        if (rom_lap == "" || ram_lap == "" || processor_lap == "" || graphique_lap == "" || other_description == "" || screen_lap == "" || lib_product_lap == "" || price_product_lap == "" || document.querySelector("#file-input-laptop").files[0] == undefined) {
            submit_btn.classList.remove("btn-primary");
            submit_btn.classList.add("btn-danger");
            submit_btn.innerHTML = "Remplissez tous les champs";
            
        } else {
            reader = new FileReader();
            file = document.querySelector("#file-input-laptop").files[0];
            upload_file(0);
        }




        
    }

    $("#button-laptop").on("click", start_upload);


    function upload_file(start) {

        var next_slice = start + slice_size + 1;
        var blob = file.slice(start, next_slice);

        reader.onloadend = function (event) {


            if (event.target.readyState !== FileReader.DONE) {
                return;
            }
            var date = new Date();
            var dataTime = date.getTime();
            let choice_laptop_input = document.querySelector("#form-laptop").choice_laptop.value;
            $.ajax({

                url: choice_laptop_input == "insert" ?  "insertLaptop.php" : "../../insertLaptop.php",
                type: "POST",
                dataType: "json",
                cache: false,
                data: {

                    rom_lap:document.querySelector("#form-laptop").interne_lap.value,

                    ram_lap:document.querySelector("#form-laptop").ram_lap.value,

                    processor_lap:document.querySelector("#form-laptop").processeur_lap.value,



                    graphique_lap:document.querySelector("#form-laptop").graphique_lap.value,

                    choice_laptop:document.querySelector("#form-laptop").choice_laptop.value,




                    other_description:document.querySelector("#form-laptop").other_desc_product_pc.value,
                  
                    screen_lap:document.querySelector("#form-laptop").ecran_lap.value,
                   

                    lib_product_lap:document.querySelector("#form-laptop").lib_product_lap.value,
                    
                    price_product_lap:document.querySelector("#form-laptop").price_product_lap.value,
                    id_get:choice_laptop_input=="update" ? document.querySelector("#form-laptop").id_get.value : "",


                   

                    

                    

                

                
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
                        let choice_laptop=document.querySelector("#form-laptop").choice_laptop.value;
                        if (choice_laptop == "insert") {
                                document.querySelector("#form-laptop").interne_lap.value = "";
                            document.querySelector("#form-laptop").ram_lap.value= "";
                        
                            document.querySelector("#form-laptop").processeur_lap.value = "";
                        
                            document.querySelector("#form-laptop").graphique_lap.value = "";
                            
                            document.querySelector("#form-laptop").other_desc_product_pc.value = "";
            
                            document.querySelector("#form-laptop").ecran_lap.value = "";
                        
                            document.querySelector("#form-laptop").lib_product_lap.value = "";
                        
                            document.querySelector("#form-laptop").price_product_lap.value = "";


                            let submit_btn = document.querySelector(".btn_laptop_submit");
                            submit_btn.classList.remove("btn-danger");
                            submit_btn.innerHTML = "Le produit à été bien inséré";
                            submit_btn.classList.add("btn-primary");
                        }
                        if (choice_laptop == "update") {
                            window.location.reload();
                        }
                       
                        

                    }
                }


            });


        };
        reader.readAsDataURL(blob);
    }
});