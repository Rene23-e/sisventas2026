<?php require __DIR__ . '/../../layouts/header.php'; ?>
<div class="card p-3">
    <h3>Editar Categoría</h3>

    <form action="<?= BASE_URL ?>/admin/categorias/actualizar" method="POST">
        <input type="hidden" name="id" value="<?= (int)$categoria['id'] ?>">

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text"
                   name="nombre"
                   id="nombre"
                   class="form-control"
                   value="<?= htmlspecialchars($categoria['nombre']) ?>"
                   required>
        </div>

        <div class="form-group mt-3">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="4" required><?= htmlspecialchars($categoria['descripcion']) ?></textarea>
        </div>

        <div class="form-group mt-3">
            <label for="activo">Estado</label>
            <select name="activo" id="activo" class="form-control">
                <option value="1" <?= $categoria['activo'] == 1 ? 'selected' : '' ?>>Activo</option>
                <option value="0" <?= $categoria['activo'] == 0 ? 'selected' : '' ?>>Inactivo</option>
            </select>
        </div>

        <div class="mt-3">
            <a href="<?= BASE_URL ?>/admin/categorias" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </form>
</div>
<?php require __DIR__ . '/../../layouts/footer.php'; ?>