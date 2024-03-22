<!-- Modal Structure -->
<?php   include './data/conexion.php'; ?>
<div id="modal-<?= $data->Id?>" class="modal">
    <div class="modal-content">
        <h4>Editando Tarea</h4>
        <form method="post">
            <?php include 'registro_list.php' ?>
            <div class="input-field col s6">
                <input id="titulo" name="titulo" type="text" class="validate" value='<?= $data->Titulo ?>'>
                <label for="titulo">Titulo</label>
            </div>
            <div class="input-field col s6">
                <input type="text" name="descripcion" id="descripcion" class='validate'
                    value='<?= $data->Descripcion ?>'>
                <label for="descripcion">Descripcion</label>
            </div>
            <div class="container-hora" style='display: flex;'>
                <div class="input-field col s6">
                    <input type="date" name="fecha" id="fecha" class='validate' value='<?= $data->Fecha ?>'>
                    <label for="fecha">Fecha</label>
                </div>
                <div class="input-field col s6">
                    <input type="time" name="hora_inicio" id="hora_inicio" class='validate'
                        value='<?= $data->HoraInicio ?>'>
                    <label for="hora_inicio">Hora Inicio</label>
                </div>
                <div class="input-field col s6">
                    <input type="time" name="hora_final" id="hora_final" class='validate'
                        value='<?= $data->HoraFinal ?>'>
                    <label for="hora_final">Hora Final</label>
                    <input type="hidden" name="id" id='idxd' value='<?= $data->Id ?>'>
                </div>
            </div>
        <input type="submit" id='Eliminar' name='delete' class='waves-effect waves-light btn modal-trigger'
            style='cursor: pointer;' value="Eliminar">
        <input type="submit" id='Guardar' name='submit_button' class='waves-effect waves-light btn modal-trigger'
            style='cursor: pointer;' value="Guardar Cambios">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat"
                onclick='closeModal("<?= $data->Id ?>")'>Cerrar</a>
        </form>
    </div>
</div>
