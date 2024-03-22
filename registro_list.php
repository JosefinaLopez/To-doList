<?php
include './data/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["submit_button"]) || isset($_POST["delete"])) {

        if (!empty($_POST["titulo"]) && !empty($_POST["descripcion"]) && !empty($_POST["fecha"]) && !empty($_POST["hora_inicio"]) && !empty($_POST["hora_final"])) {
            $titulo = $_POST["titulo"];
            $descripcion = $_POST["descripcion"];
            $fecha = $_POST["fecha"];
            $hora_inicio = $_POST["hora_inicio"];
            $hora_final = $_POST["hora_final"];
            $id = $_POST["id"] ?? null;

            // Verificar si se está insertando un nuevo registro o actualizando uno existente
            if ($id === null) {
                // Verificar si ya existe un registro con el mismo título
                $verificar = $conexion->query("SELECT * FROM list WHERE titulo = '$titulo'");
                if ($verificar->num_rows == 0) {
                    // Insertar nuevo registro
                    $sql = $conexion->query("INSERT INTO list (titulo, descripcion, fecha, horainicio, horafinal) VALUES ('$titulo','$descripcion','$fecha','$hora_inicio','$hora_final')");
                    if ($sql) {
                        echo '
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.all.min.js"></script>
                        <script>
                            Swal.fire({
                                icon: "success",
                                title: "¡Éxito!",
                                text: "Registro Exitoso!"
                            });
                            setTimeout(function(){
                                window.location.href = "index.php"; // Redirige a la página actual
                            }, 5000); // 5 segundos
                        </script>';
                    } else {
                        echo '
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.all.min.js"></script>
                        <script>
                            Swal.fire({
                                icon: "error",
                                title: "¡Error!",
                                text: "Hubo un error al intentar registrar."
                            });
                        </script>';
                    }
                } 
            } else {
                // Eliminar registro
                if (isset($_POST["delete"])) {
                    $sql = $conexion->query("DELETE FROM list WHERE Id = '$id'");
                    if ($sql) {
                        echo '
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.all.min.js"></script>
                        <script>
                            Swal.fire({
                                icon: "success",
                                title: "¡Éxito!",
                                text: "El registro se ha eliminado exitosamente!"
                            });
                                window.location.href = "index.php"; // Redirige a la página actual
                        
                        </script>';
                    } else {
                        echo '
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.all.min.js"></script>
                        <script>
                            Swal.fire({
                                icon: "error",
                                title: "¡Error!",
                                text: "Hubo un error al intentar eliminar el registro."
                            });
                                window.location.href = "index.php"; // Redirige a la página actual

                        </script>';
                    }
                }

                // Actualizar registro
                $sql = $conexion->query("UPDATE list SET titulo = '$titulo', descripcion = '$descripcion', fecha = '$fecha', horainicio = '$hora_inicio', horafinal = '$hora_final' WHERE Id = '$id'");
                if ($sql) {
                    echo '
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.all.min.js"></script>
                    <script>
                        Swal.fire({
                            icon: "success",
                            title: "¡Exito!",
                            text: "Registro Modificado :)"
                        });
                            window.location.href = "index.php"; // Redirige a la página actual
                    </script>';
                } else {
                    echo '
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.all.min.js"></script>
                    <script>
                        Swal.fire({
                            icon: "error",
                            title: "¡Error!",
                            text: "Hubo un error al intentar modificar el registro."
                        });
                         window.location.href = "index.php"; // Redirige a la página actual

                    </script>';
                }
            }
        } else {
            echo '  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.all.min.js"></script>
                    <script>
                        Swal.fire({
                            icon: "error",
                            title: "¡Error!",
                            text: "Hubo un error al intentar modificar el registro."
                        });
                         window.location.href = "index.php"; // Redirige a la página actual

                    </script>';
        }
    }
}
?>
