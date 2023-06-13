//VISOR EYE PASSWORD
function showPass() {
    var tipo = document.getElementById("passInput");
    var eye = document.getElementById("eye");
    if (tipo.type == "password") {
        tipo.type = "text";
        eye.className = "fa-regular fa-eye-slash";

    } else {
        tipo.type = "password";
        eye.className = "fa-solid fa-eye";
    }

}

//
//var myForm= document.getElementById("myForm");

//myForm.addEventListener("click", verifyPass());

function verifyPass(){
    var pass1 = document.getElementById("pass1").value;
    var pass2 = document.getElementById("pass2").value;
        if(pass1 !== pass2){
            //event.preventDefault();
            alert("Las claves introducidas no son iguales");
            return false;
    }
}

function addProduct(){
    alert("Producto añadido");
    
   //var div = document.getElementById("cart");
  //  if (div.style.display === 'none') {
    //    div.style.display = 'block';
   // }
   // else {
     //   div.style.display = 'none';
    //}
}
/*
function showModal(){
    var myModal = document.getElementById('myModal').style.display='block';
}

function closeModal(){
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
}*/




/**
function update(){
    var select = document.getElementById('listaHoras');
    var option = select.options[select.selectedIndex];
    var horaSeleccionada = document.getElementById('horaSeleccionada').value = option.value;
    //horaSeleccionada.setAttribute("value", value);
}
update();**/


function closeModal(){
const cont_cookies  = document.querySelector('.cookies-box');
cont_cookies.style.display = "none";

window.location="./CONTROLADORES/ControladorCookie.php";
//window.location.href = "./CONTROLADORES/ControladorCookie.php";

}



