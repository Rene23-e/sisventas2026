<?php 

require __DIR__ . '/../../layouts/header.php'; ?>

<div class="card p-3">
    <h3>EDITAR DATOS DEL USUARIO</h3>
    <form action="<?= BASE_URL ?>/admin/usuarios/actualizar" method="post">
        <input type="hidden" name="id" value="<?= htmlspecialchars($usuario['id']) ?>">
        
        <div class="row">
            <div class="col-md-4 form-group">
                <label for="nombre">Nombre :</label>
                <input type="text" class="form-control" name="nombre" id="nombre" maxlength="40" value="<?= htmlspecialchars($usuario['nombre']) ?>" required>
            </div>

            <div class="col-md-4 form-group">
                <label for="apellidos">Apellidos :</label>
                <input type="text" class="form-control" name="apellidos" id="apellidos" maxlength="80" value="<?= htmlspecialchars($usuario['apellidos']) ?>" required>
            </div>

            <div class="col-md-4 form-group">
                <label for="email">Correo Electrónico :</label>
                <input type="email" class="form-control" name="email" id="email" maxlength="150" value="<?= htmlspecialchars($usuario['email']) ?>" required>
            </div>

            <div class="col-md-2 form-group">
                <label for="telefono">Teléfono :</label>
                <input type="text" class="form-control" name="telefono" id="telefono" maxlength="20" value="<?= htmlspecialchars($usuario['telefono'] ?? '') ?>">
            </div>

            <div class="col-md-2 form-group">
                <label for="rol_id">Rol :</label>
                <select name="rol_id" id="rol_id" class="form-control" required>
                    <option value="1" <?= ($usuario['rol_id'] == 1) ? 'selected' : '' ?>>Administrador</option>
                    <option value="2" <?= ($usuario['rol_id'] == 2) ? 'selected' : '' ?>>Usuario</option>
                </select>
            </div>

            <div class="col-md-4 form-group">
                <label for="activo">Estado :</label>
                <select name="activo" id="activo" class="form-control">
                    <option value="1" <?= ($usuario['activo'] == 1) ? 'selected' : '' ?>>Activo</option>
                    <option value="0" <?= ($usuario['activo'] == 0) ? 'selected' : '' ?>>Inactivo</option>
                </select>
            </div>

            <div class="col-md-4 form-group">
                <label for="password">Nueva Contraseña :</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Bay-an a bakante no saan mo kayat a suktan">
            </div>
        </div>

        <div class="mt-3 text-center">
            <a class="btn btn-danger" href="<?= BASE_URL ?>/admin/usuarios"><i class="fas fa-times"></i> Cancelar</a>
            <button class="btn btn-info" type="reset"><i class="fas fa-trash"></i> Limpiar</button>
            <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Actualizar</button>
        </div>
    </form>
</div>
<?php require __DIR__ . '/../../layouts/footer.php'; ?>