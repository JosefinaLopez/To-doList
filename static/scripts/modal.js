function openModal(id) {
    var modal = document.getElementById(`modal-${id}`);
    modal.style.display = "block";
    modal.style.zIndex = "999"
}
function closeModal(id) {
    var modal = document.getElementById(`modal-${id}`);
    modal.style.display = "none";
}
function openModalEditar(id) {
    var modal = document.getElementById(`modal-${id}`);
    modal.style.display = "block";
    modal.style.zIndex = "999";
}

function Cambiar(id, estado) {
    var data = "id=" + id + "&estado=" + estado;
    //alert(data)

    fetch("cambiar.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: data
    })
        .then(response => {
            if (response.ok) {
                return response.text();
            }
            throw new Error("Error en la respuesta del servidor");
        })
        .then(data => {
            window.location.href = "index.php";
        })
        .catch(error => {
            console.error("Error en la solicitud AJAX:", error);
        });
}
let card = document.querySelectorAll(" .card");
card.forEach(function (elemento) {

    elemento.addEventListener("click", function () {
        var id = elemento.id;
        let estado = document.getElementById(`esta-${id}`).value;
        let titulo = document.getElementById(`lab-${id}`);

        titulo.addEventListener("click", function () {
            closeModal(id);
            if (estado == 1) {
                Cambiar(id, 0);
            }
            if (estado == 0) {
                Cambiar(id, 1)
            }
        })


    })
    elemento.addEventListener("dblclick", function () {
        var id = elemento.id;
        openModalEditar(id);
    })
})


document.addEventListener('DOMContentLoaded', function () {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems);
});