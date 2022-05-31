const senhaCampo = document.querySelector(".form input[type='password']"),
toggleBtn = document.querySelector(".form .field i");

toggleBtn.onclick = ()=>{
    if(senhaCampo.type == "password"){
        senhaCampo.type = "text";
        toggleBtn.classList.add("active");
    }else{
        senhaCampo.type = "password";
        toggleBtn.classList.remove("active");
    }
}