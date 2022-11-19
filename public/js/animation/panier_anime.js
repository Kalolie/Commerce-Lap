(function () {
    let timelineProducts = new TimelineMax({paused:true});
    let products_card = document.querySelectorAll(".product_card_clone");
    


    timelineProducts.from(products_card,{
        opacity:0,
        y:100,
    })

    setTimeout(() => {
        timelineProducts.play();
    }, 1500);



}())