(function() {

    let container_description = document.querySelector(".description_product_container_laptop");
    let container_description_outil = document.querySelector(".description_product_container_outil");
    let timelineDescriptionLaptop = new TimelineMax({paused:true});
    let timelineDescriptionOutil = new TimelineMax({paused:true});

    timelineDescriptionLaptop.to(container_description,{
        clipPath:"polygon(0% 0%,100% 0%,100% 100%,0% 100%)",
    })

    timelineDescriptionOutil.to(container_description_outil,{
        clipPath:"polygon(0% 0%,100% 0%,100% 100%,0% 100%)",
    })



    let btnCloseLaptop = document.querySelector(".btn_close_laptop_description")
    let btnCloseOutil = document.querySelector(".btn_close_outil_description")

    btnCloseLaptop.addEventListener("click",()=>timelineDescriptionLaptop.reverse())
    btnCloseOutil.addEventListener("click",()=>timelineDescriptionOutil.reverse())



    if (window.location.pathname == "/") {
	    var btnClassName = ".product_info_plus";
    } else {
        var btnClassName = ".product_info_plus_clone";
    }

    $(btnClassName).click(function(event) {
        event.preventDefault();
        $.get($(this).attr("href"),{},function(data) {

            let type = parseInt(data.product.categorie_id);

           

            console.log(type);
            
            let path_img = "../../../admin/"+data.product.img_link_product;
     

           

            if (type == 1) {

                
            document.querySelector(".laptop_name").innerHTML = data.product.lib_product;
            document.querySelector(".description_product_container_laptop .description_img").style.backgroundImage = `url('${path_img}')`;
            
            let container_description = document.querySelector(".description_product_container_laptop");
            container_description.style.display = "flex";


            let rom_product = document.querySelector(".rom").innerHTML =  data.description_product.rom_product;
            let ram_product = document.querySelector(".ram").innerHTML = data.description_product.ram_product;
            let screen_product  = document.querySelector(".screen").innerHTML = data.description_product.screen_product;
            let processor_product = document.querySelector(".processor").innerHTML = data.description_product.processor_product;
            let graphique_product = document.querySelector(".graphique").innerHTML = data.description_product.graphique_product;
            let other_description = document.querySelector(".other_description").innerHTML = data.description_product.other_description;
            timelineDescriptionLaptop.play();
            



            } 

            if (type == 2) {




                document.querySelector(".description_product_container_outil .description_img").style.backgroundImage = `url('${path_img}')`;
                document.querySelector(".outil_name").innerHTML = data.product.lib_product;
                let container_description = document.querySelector(".description_product_container_outil");
                container_description.style.display = "flex";


              
                let other_description = document.querySelector(".description_product_container_outil .other_description").innerHTML = data.description_product.descriptions;
                timelineDescriptionOutil.play();

               
            }
            
          

            
        },"json");



        
    })



    $(".article-add").click(function(event) {
        event.preventDefault();
        let articleAdd = document.querySelectorAll(".article-add div");
        $(this).html("<img src='../../../design-img/chargement/R695888b4fdc4e4ed6c0f3f6fad921d26.gif' class='img-fluid'>")
        
        $.get($(this).attr("href"),{},function(data) {
        
            console.log(data);
            
        },"json");
        setTimeout(() => {

            $(this).html(`<svg fill="white" id="Outline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <title>110 add to shopping bag</title>
            <path
                d="M23,19H21V17a1,1,0,0,0-2,0v2H17a1,1,0,0,0,0,2h2v2a1,1,0,0,0,2,0V21h2a1,1,0,0,0,0-2Z" />
            <path
                d="M21,6H18A6,6,0,0,0,6,6H3A3,3,0,0,0,0,9V19a5.006,5.006,0,0,0,5,5h9a1,1,0,0,0,0-2H5a3,3,0,0,1-3-3V9A1,1,0,0,1,3,8H6v2a1,1,0,0,0,2,0V8h8v2a1,1,0,0,0,2,0V8h3a1,1,0,0,1,1,1v5a1,1,0,0,0,2,0V9A3,3,0,0,0,21,6ZM8,6a4,4,0,0,1,8,0Z" />
        </svg>`)
            
        }, 1000);
        
    })
}())