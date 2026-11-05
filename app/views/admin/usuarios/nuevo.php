<?php require_once __DIR__ . '/../../layouts/header.php'; ?>
<div class="card p-3">
    <h3 class="text-center text-success">REGISTRAR USUARIO NUEVO</h3><br>
    <form action="<?= BASE_URL ?>/admin/usuarios/guardar" method="post" id="form-usuario-nuevo" autocomplete="off">
        <div class="row">
            
            <div class="col-md-2 form-group">
                <label for="rol_id">Rol :</label>
                <select name="rol_id" id="rol_id" class="form-control" required autocomplete="off">
                    <option value="">SELECCIONE UN ROL</option>
                    <option value="1">Administrador</option>
                    <option value="2">Cliente / Empleado</option>
                </select>
            </div>

            <div class="col-md-2 form-group">
                <label for="nombre">Nombre :</label>
                <input type="text" name="nombre" id="nombre" class="form-control" maxlength="100" required autocomplete="off">
            </div>

            <div class="col-md-4 form-group">
                <label for="apellidos">Apellidos :</label>
                <input type="text" name="apellidos" id="apellidos" class="form-control" maxlength="100" required autocomplete="off">
            </div>

            <div class="col-md-4 form-group mt-2">
                <label for="email">Correo Electrónico :</label>
                <input type="email" name="email" id="email" class="form-control" maxlength="150" required autocomplete="off">
            </div>

            <div class="col-md-4 form-group mt-2">
                <label for="password">Contraseña :</label>
                <input type="password" name="password" id="password" class="form-control" required autocomplete="new-password">
            </div>

            <div class="col-md-4 form-group mt-2">
                <label for="telefono">Teléfono :</label>
                <input type="text" name="telefono" id="telefono" class="form-control" maxlength="20" autocomplete="off">
            </div>

            <div class="col-md-4 form-group mt-2">
                <label for="activo">Estado :</label>
                <select name="activo" id="activo" class="form-control" required autocomplete="off">
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
            </div>

        </div>
        <div class="text-center mt-3">
            <a href="<?= BASE_URL ?>/admin/usuarios" class="btn btn-danger" type="button"><i class="fas fa-times"></i> Cancelar</a>
            <button class="btn btn-info" type="reset"><i class="fas fa-trash"></i> Limpiar</button>
            <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Guardar</button>
        </div>
    </form>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('form-usuario-nuevo');
    if (!form) return;

    form.reset();

    form.querySelectorAll('input, select').forEach(function (field) {
        if (field.tagName === 'SELECT') {
            field.selectedIndex = 0;
        } else {
            field.value = '';
        }
    });
});
</script>
<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>