// border: solid 1px rgb(109, 143, 255) ;
//     border-radius: 0.5rem;
//     outline-style: solid;
//     outline-width: 4px;
//     outline-color: #0d6dfd52;
    
(function () {

    let formInput = document.querySelectorAll(".input_cmd");
 
    function change_style(id) {
         
        let formInput = document.querySelectorAll(".input_cmd");
        formInput.forEach(input_isdisabled => {
            input_isdisabled.style.border = "solid 1px rgb(226, 226, 226)"
            input_isdisabled.style.outline = "none";
        });
        formInput[id].style.border = "solid 1px rgb(109, 143, 255)";
        formInput[id].style.borderRadius = "0.5rem";
        formInput[id].style.outline = "solid 4px #0d6dfd52";
    }
   

    formInput.forEach((input_cmd,key)=>{
        input_cmd.addEventListener("focus",()=>change_style(key));
    })
    
}())