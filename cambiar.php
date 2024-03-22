<?php 
    include './data/conexion.php';
    if (isset( $_POST['id'] ) && isset( $_POST['estado'] )){
        $id = $_POST['id'];
        $estado = $_POST['estado'];
        $query = $conexion -> query("UPDATE list SET Estado = '$estado' WHERE Id = '$id'");
        echo '
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.all.min.js"></script>
                    <script>
                        Swal.fire({
                            icon: "success",
                            title: "¡Exito!",
                            text: "Tarea Completada"
                        });
                    </script>';
    }
    echo "XDD";

?>
