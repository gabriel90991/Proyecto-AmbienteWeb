//Vamos alamacenar con local, sesion  y cookie
var sesion= localStorage.getItem("nombre");
var Correo= sessionStorage.getItem("correo");

const checarSesion=()=>{
    if(sesion!=null){
        Swal.fire({
            title: '<strong>Usuario </strong>' + sesion,
            icon: 'info',
            html:
              'Ya inicio sesion con <b> el correo </b>' + Correo,
            showCloseButton: true,
            focusConfirm: true,
            confirmButtonText:
              '<i class="fa fa-thumbs-up"></i> Great!',
          })
          setTimeout(() => {
            window.location.href="home.php"
        }, 2000);
    }
}

//Para home que se lo lleve a iniciar sesion si no tiene un nombre
const mostrar=()=>{
    if(sesion==null){
        window.location.href="inicio_sesion.html";
    }
}

//Cerrar sesion 
const cerrarSesion=()=>{
    localStorage.clear();
    window.location.href="inicio_sesion.hmtl";
}

//Expresiones regulares para validar 
const validarCorreo = (email) => {
    return /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/.test(email.trim());
}

const validarContraseña = (contrasena) => {
    return /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,25}$/.test(contrasena.trim());
}

const validarNombre = (nombre) => {
    return /^([a-z ñáéíóú]{2,20})$/i.test(nombre.trim());
}

const registrarUsuario = async () => {
    var nombre = document.querySelector("#nombre").value;
    var correo = document.querySelector("#email").value;
    var contrasena = document.querySelector("#contrasena").value;

    // Validando datos 
    if (correo.trim() === '' ||
        contrasena.trim() === '' ||
        nombre.trim() === '') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Por favor completa todos los datos ',
            footer: ''
        })
    }

    if (!validarNombre(nombre)) {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'El nombre que digito es invalido',
            showConfirmButton: false,
            timer: 1500
        })
        return;
    }

    if (!validarCorreo(correo)) {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'El correo que digito es invalido',
            showConfirmButton: false,
            timer: 1500
        })
        return;
    }

    if (!validarContrasena(contrasena)) {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'La contraseña que digito es invalida. <br> Tiene que tener mayúsculas, minúsculas, números y Mín 8 caracteres',
            showConfirmButton: false,
            timer: 2000
        })
        return;
        
    }

    //Insertar a la base de datos 
    const datos = new FormData();
    datos.append("email", correo);
    datos.append("contrasena", contrasena);
    datos.append("nombre", nombre);

    //Utilizamos Fetch una investigacion que se realiazo que es mas utilizado que Ajax

    var respuesta = await fetch("conexion/RegistrarUsuario.php", {
        method: 'POST',
        body: datos
    });

    var resultado = await respuesta.json();

    if (resultado.success == true) {
        Swal.fire({
            icon: 'success',
            title: 'Excelente',
            text: resultado.mensaje,
            footer: ''
        })
        document.querySelector("#formRegistro").reset();
        setTimeout(() => {
            window.location.href = "inicio_sesion.html";
        }, 2000);
    } else {
        Swal.fire({
            icon: 'error',
            title: 'ERROR',
            text: resultado.mensaje,
            footer: ''
        })
    }
}

const loginUsuario = async () => {
    var correo = document.querySelector("#email").value;
    var contrasena = document.querySelector("#contrasena").value;

    // Validando datos 
    if (correo.trim() === '' ||
        contrasena.trim() === '') {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Por favor completa todos los datos ',
            footer: ''
        })
    }

    if (!validarCorreo(correo)) {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'El correo que digito es invalido',
            showConfirmButton: false,
            timer: 1500
        })
        return;
    }

    if (!validarContrasena(contrasena)) {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'La contraseña que digito es invalida. <br> Tiene que tener mayúsculas, minúsculas, números y Mín 8 caracteres',
            showConfirmButton: false,
            timer: 2000
        })
        return;
    }

    //Insertar a la base de datos 
    const datos = new FormData();
    datos.append("email", correo);
    datos.append("contrasena", contrasena);

    //Utilizamos Fetch una investigacion que se realiazo que es mas utilizado que Ajax
    var respuesta = await fetch("conexion/LoginUsuario.php", {
        method: 'POST',
        body: datos
    });

    var resultado = await respuesta.json();

    if (resultado.success == true) {
        Swal.fire({
            icon: 'success',
            title: 'Excelente',
            text: resultado.mensaje,
            footer: ''
        })
        document.querySelector("#formIniciar").reset();
        localStorage.setItem("nombre",resultado.nombre);
        sessionStorage.setItem("correo",resultado.correo);
        setTimeout(() => {
            window.location.href = "home.php";
        }, 2000);
    } else {
        Swal.fire({
            icon: 'error',
            title: 'ERROR',
            text: resultado.mensaje,
            footer: ''
        })
    }
}
