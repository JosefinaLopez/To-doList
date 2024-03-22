<!-- Modal Structure -->
<?php   include './data/conexion.php'; ?>

<div id="modal-0" class="modal">
    <div class="modal-content">
        <h4>Nueva Tarea</h4>
        <form method="post">
            <?php include 'registro_list.php' ?>
            <div class="input-field col s6">
                <input id="titulo" name="titulo" type="text" class="validate">
                <label for="titulo">Titulo</label>
            </div>
            <div class="input-field col s6">
                <input type="text" name="descripcion" id="descripcion" class='validate'>
                <label for="descripcion">Descripcion</label>
            </div>
            <div class="container-hora" style='display: flex;'>
                <div class="input-field col s6">
                    <input type="date" name="fecha" id="fecha" class='validate'>
                    <label for="fecha">Fecha</label>
                </div>
                <div class="input-field col s6">
                    <input type="time" name="hora_inicio" id="hora_inicio" class='validate'>
                    <label for="hora_inicio">Hora Inicio</label>
                </div>
                <div class="input-field col s6">
                    <input type="time" name="hora_final" id="hora_final" class='validate'>
                    <label for="hora_final">Hora Final</label>
                </div>
            </div>
            <input type="submit" id='Enviar' name='submit_button' class='waves-effect waves-light btn modal-trigger'
                style='cursor: pointer;' value="Agregar Tarea">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat" onclick='closeModal(0)'>Cerrar</a>
        </form>
    </div>
</div>
