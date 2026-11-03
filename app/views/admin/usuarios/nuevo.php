<?php require_once __DIR__ . '/../../layouts/header.php'; ?>
<div class="card p-3">
    <h3>REGISTRAR USUARIO</h3>
    <form action="<?= BASE_URL ?>/admin/usuarios/guardar" method="post">
        <div class="row">
            
            <div class="col-md-4 form-group">
                <label for="rol_id">Rol :</label>
                <!-- Si tienes una variable $roles desde el controlador, puedes iterarla con un foreach similar a categorías -->
                <select name="rol_id" id="rol_id" class="form-control" required>
                    <option value="">Seleccione un rol...</option>
                    <option value="1">Administrador</option>
                    <option value="2">Cliente / Empleado</option>
                </select>
            </div>

            <div class="col-md-4 form-group">
                <label for="nombre">Nombre :</label>
                <input type="text" name="nombre" id="nombre" class="form-control" maxlength="100" required>
            </div>

            <div class="col-md-4 form-group">
                <label for="apellidos">Apellidos :</label>
                <input type="text" name="apellidos" id="apellidos" class="form-control" maxlength="100" required>
            </div>

            <div class="col-md-6 form-group mt-2">
                <label for="email">Correo Electrónico :</label>
                <input type="email" name="email" id="email" class="form-control" maxlength="150" required>
            </div>

            <div class="col-md-6 form-group mt-2">
                <label for="password">Contraseña :</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <div class="col-md-6 form-group mt-2">
                <label for="telefono">Teléfono :</label>
                <input type="text" name="telefono" id="telefono" class="form-control" maxlength="20">
            </div>

            <div class="col-md-6 form-group mt-2">
                <label for="activo">Estado :</label>
                <select name="activo" id="activo" class="form-control" required>
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
<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>