(function () {


    let tl1 = new TimelineMax({
        paused: false
    });
    tl1.to(".menu-burger", {
        delay: 3,
        duration: 1,
        scale: 1,
        ease: "bounce.inOut"
    })


    // BULBE 
    let buttonMenu = document.querySelector(".menu-burger");
    let menuBulbe = document.querySelectorAll(".menu-bulbe")


    let tlMenu = new TimelineMax({
        paused: true
    })

    tlMenu.to(menuBulbe, {
        duration: 1,
        transform: "translateX(12px)",
        stagger: {
            amount: 2
        },
        ease: "elastic"
    })

    buttonMenu.addEventListener("click", () => {
        buttonMenu.classList.toggle("play");
        let bool = buttonMenu.classList.contains("play")
        if (bool) {
            tlMenu.play();
        } else {
            tlMenu.reverse();
        }

    })


    let menuAcceuilRs = document.querySelectorAll(".menu-acceuil-r");
    let menuAcceuilTexts = document.querySelectorAll(".menu-acceuil-text");

    let menuTacceuil = menuAcceuilTexts[0];
    let menuRacceuil = menuAcceuilRs[0];


    let menuTpanier = menuAcceuilTexts[1];
    let menuRpanier = menuAcceuilRs[1];


    let menuTinscription = menuAcceuilTexts[2];
    let menuRinscription = menuAcceuilRs[2];


    let menuTconnexion = menuAcceuilTexts[3];
    let menuRconnexion = menuAcceuilRs[3];




    let menuTsmart = menuAcceuilTexts[4];
    let menuRsmart = menuAcceuilRs[4];



    let menuTpc = menuAcceuilTexts[5];
    let menuRpc = menuAcceuilRs[5];

    let menuTapropos = menuAcceuilTexts[6];
    let menuRapropos = menuAcceuilRs[6];




    // TIMELINE 
    let tlMenuRond_acceuil = new TimelineMax({
        paused: true
    })
    tlMenuRond_acceuil.to(menuTacceuil, {
        clipPath: "polygon(0% 0%,100% 0%,100% 100%,0% 100%)",
        ease: "bounce"
    })


    let tlMenuRond_panier = new TimelineMax({
        paused: true
    })
    tlMenuRond_panier.to(menuTpanier, {
        clipPath: "polygon(0% 0%,100% 0%,100% 100%,0% 100%)",
        ease: "bounce"
    })



    let tlMenuRond_inscription = new TimelineMax({
        paused: true
    })
    tlMenuRond_inscription.to(menuTinscription, {
        clipPath: "polygon(0% 0%,100% 0%,100% 100%,0% 100%)",
        ease: "bounce"
    })



    let tlMenuRond_connexion = new TimelineMax({
        paused: true
    })
    tlMenuRond_connexion.to(menuTconnexion, {
        clipPath: "polygon(0% 0%,100% 0%,100% 100%,0% 100%)",
        ease: "bounce"
    })


    let tlMenuRond_smart = new TimelineMax({
        paused: true
    })
    tlMenuRond_smart.to(menuTsmart, {
        clipPath: "polygon(0% 0%,100% 0%,100% 100%,0% 100%)",
        ease: "bounce"
    })


    let tlMenuRond_pc = new TimelineMax({
        paused: true
    })
    tlMenuRond_pc.to(menuTpc, {
        clipPath: "polygon(0% 0%,100% 0%,100% 100%,0% 100%)",
        ease: "bounce"
    })


    let tlMenuRond_apropos = new TimelineMax({
        paused: true
    })
    tlMenuRond_apropos.to(menuTapropos, {
        clipPath: "polygon(0% 0%,100% 0%,100% 100%,0% 100%)",
        ease: "bounce"
    })








    // TIMELINE 


    // ADD EVENTS
    menuRacceuil.addEventListener("mouseenter", () => {
        tlMenuRond_acceuil.play();
    })
    menuRacceuil.addEventListener("mouseleave", () => {
        tlMenuRond_acceuil.reverse();
    })


    menuRpanier.addEventListener("mouseenter", () => {
        tlMenuRond_panier.play();
    })
    menuRpanier.addEventListener("mouseleave", () => {
        tlMenuRond_panier.reverse();
    })


    menuRinscription.addEventListener("mouseenter", () => {
        tlMenuRond_inscription.play();
    })
    menuRinscription.addEventListener("mouseleave", () => {
        tlMenuRond_inscription.reverse();
    })


    menuRconnexion.addEventListener("mouseenter", () => {
        tlMenuRond_connexion.play();
    })
    menuRconnexion.addEventListener("mouseleave", () => {
        tlMenuRond_connexion.reverse();
    })




    menuRsmart.addEventListener("mouseenter", () => {
        tlMenuRond_smart.play();
    })
    menuRsmart.addEventListener("mouseleave", () => {
        tlMenuRond_smart.reverse();
    })




    menuRpc.addEventListener("mouseenter", () => {
        tlMenuRond_pc.play();
    })
    menuRpc.addEventListener("mouseleave", () => {
        tlMenuRond_pc.reverse();
    })




    menuRapropos.addEventListener("mouseenter", () => {
        tlMenuRond_apropos.play();
    })
    menuRapropos.addEventListener("mouseleave", () => {
        tlMenuRond_apropos.reverse();
    })



    // ADD EVENTS



}())