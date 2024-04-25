 //
 $(document).ready(function () {

    $("#submit").click(function(){
        ingresaCompra($("#nombreTarjeta").val(), $("#numeroTarjeta").val(), $("#fecha").val(), $("#codigo").val());
    });

}); 


const ingresaCompra = async (pnombreTarjeta, pnumeroTarjeta, pfecha, pcodigo) => {
    try {
        $.ajax(
            {
                data: {
                    nombreTarjeta: pnombreTarjeta,
                    numeroTarjeta: pnumeroTarjeta,
                    fecha: pfecha,
                    codigo: pcodigo,
                },
                url: 'insertaCompra.php',
                type: 'POST',
                dataType: 'json',

            });

    } catch (err) {
        alert (err);
    }


    var respuesta = await fetch("conexion/insertaCompra.php", {
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
    document.querySelector("#formCompra").reset();
    setTimeout(() => {
       // window.location.href = "../gracias_compra.html";
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

function Almacenamiento(){
    var response = false;
    try {
        console.log("Se inicia el almacenamiento de la información!")
        var nombre = document.getElementById('nombre').value;
        var numero = document.getElementById('numero').value;
        var fecha = document.getElementById('fecha').value;
        var codigo = document.getElementById('codigo').value;

        sessionStorage.setItem("numero", numero);
        sessionStorage.setItem("codigo", codigo);

        localStorage.setItem("fecha", fecha);
        localStorage.setItem("nombre", nombre);
        console.log("La informacion se almacenó correctamente!")
        response = true;
         } catch (error){
            console.log("Hubo error");
         }
        return response;

    } 
