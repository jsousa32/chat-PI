const form = document.querySelector(".cadastro form"),
btnContinuar = form.querySelector(".button input"),
errorText = form.querySelector(".error-txt");

form.onsubmit = (e)=>{
    e.preventDefault();
}

btnContinuar.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/cadastro.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data == "Sucesso"){
                    location.href = "chat-real-time-usuario.php";
                }else{
                    errorText.textContent = data;
                    errorText.style.display = "block";
                }
            }
        }
    }

    
    let formData = new FormData(form);
    xhr.send(formData);
}