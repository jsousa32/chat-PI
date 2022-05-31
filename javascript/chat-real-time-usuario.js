const barraBusca = document.querySelector(".search input"),
btnBusca = document.querySelector(".search button"),
listaUsuario = document.querySelector(".usuario-list");

btnBusca.onclick = ()=>{
    barraBusca.classList.toggle("active");
    barraBusca.focus();
    btnBusca.classList.toggle("active");
    barraBusca.value = "";

}

barraBusca.onkeyup = ()=>{
    let searchTerm = barraBusca.value;
    if (searchTerm != ""){
        barraBusca.classList.add("active");
    }else{
        barraBusca.classList.remove("active");
    }
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/busca.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                listaUsuario.innerHTML = data;
                
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);
}

setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "php/usuario.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(!barraBusca.classList.contains("active")){
                    listaUsuario.innerHTML = data;
                }
                    
            }
        }
    }
    xhr.send();
},500)