<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.min.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.all.min.js"></script>
        <link rel="stylesheet" href="./static/style.css">
        <title>To-Do List</title>

    </head>

    <body>
        <?php include './data/conexion.php' ?>

        <div class="container">
            <!--Registro !-->
            <!-- Modal Trigger -->
            <h2 style='text-align: center;'>To-Do List</h2>
            <hr>
            <?php include 'modal.php';?>
            <div class="container-tbl" id='card'>
                <?php
                $sql = $conexion->query("SELECT * FROM list");
                while ($data = $sql->fetch_object()) {
                    ?>
                <div class="card" data-target="modal1" id='<?= $data->Id ?>' data-toggle="modal"
                    data-target="#modal-<?= $data->Id ?>">
                    <p>
                        <?php if ($data->Estado == 1): ?>
                        <label class='xd' id='lab-<?= $data->Id ?>'>
                            <input type="checkbox" />
                            <span style='color: black; font-size:1.5rem'><?= $data->Titulo ?></span>
                        </label>
                        <?php else:?>
                        <label class='xd' id='lab-<?= $data->Id ?>'>
                            <input type="checkbox" checked />
                            <span
                                style='color: rgb(196, 37, 37); font-size:1.5rem; text-decoration: line-through;'><?= $data->Titulo ?></span>
                        </label>
                        <?php endif; ?>
                    </p>
                    <div class="contenedor-xd">
                        <span class='fecha'><?= $data->Fecha ?></span>
                    </div>
                    <input type="hidden" name="estado" id='esta-<?= $data->Id ?>' value='<?= $data->Estado ?>'>
                    <?php if ($data->Estado == 1): ?>
                    <span id='estado'>Pendiente</span>
                    <?php else:?>
                    <span id='estado'>Completado</span>
                    <?php endif; ?>

                </div>
                <?php include 'editar.php';?>
                <?php } ?>
            </div>

            <button onclick='openModal(0)' id='boton' class="btn modal-trigger">+</button>


        </div>

    </body>
    <script src="./static/scripts/modal.js"></script>r
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</html>
