//
$(document).ready(function () {

    $("#submit").click(function(){
        ingresaReservacion($("#TourID").val(), $("#fecha").val(), $("#Telefono").val());
    });

}); 


const ingresaReservacion = async (pTourID, pFecha, pTelefono) => {
    try {
        $.ajax(
            {
                data: {
                    TourID: pTourID,
                    Fecha: pFecha,
                    Telefono: pTelefono,
                },
                url: 'insertaReservacion.php',
                type: 'POST',
                dataType: 'json',

            });

    } catch (err) {
        alert (err);
    }


    var respuesta = await fetch("conexion/insertaReservacion.php", {
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
    document.querySelector("#formReservacion").reset();
    setTimeout(() => {
       // window.location.href = "../gracias_reservacion.html";
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
        var TourID = document.getElementById('TourID').value;
        var Fecha = document.getElementById('Fecha').value;
        var Telefono = document.getElementById('Telefono').value;

        localStorage.setItem("TourID", TourID);
        localStorage.setItem("Fecha", Fecha);
        localStorage.setItem("Telefono", Telefono);
        console.log("La informacion se almacenó correctamente!")
        response = true;
         } catch (error){
            console.log("Hubo error");
         }
        return response;

    } 