<?php require_once __DIR__ . '/../../layouts/header.php'; ?>
<div class="card p-3">
    <h3>REGISTRAR PRODUCTO</h3>
    <form action="<?= BASE_URL ?>/admin/productos/guardar" method="post">
        <div class="row">
            <div class="col-md-4 form-group">
                <label for="categoria">Categoria :</label>
                <select name="categoria" id="categoria" class="form-control" required>
                    <?php foreach($categorias as $categoria): ?>
                        <option value="<?= $categoria['id'] ?>"><?= htmlspecialchars($categoria['nombre']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
             <div class="col-md-4 form-group">
                <label for="codigo">Código :</label>
                <input type="text" name="codigo" id="codigo" class="form-control" maxlength="50" required>
            </div>

            <div class="col-md-4 form-group">
                <label for="nombre">Nombre :</label>
                <input type="text" name="nombre" id="nombre" class="form-control" maxlength="150" required>
            </div>

            <div class="col-md-8 form-group">
                <label for="descripcion">Descripción :</label>
                <textarea name="descripcion" id="descripcion" class="form-control" maxlength="500" required></textarea>
            </div>

            <div class="col-md-2 form-group">
                <label for="precio">Precio :</label>
                <input type="number" name="precio" id="precio" class="form-control" required min="0" step="0.1">
            </div>

            <div class="col-md-2 form-group">
                <label for="stock">Stock :</label>
                <input type="number" name="stock" id="stock" class="form-control"  min="1" required value="1">
            </div>
        </div>
        <div class="text-center mt-3">
            <button class="btn btn-danger" type="button"><i class="fas fa-times"></i>Cancelar</button>
            <button class="btn btn-info" type="reset"><i class="fas fa-trash"></i>Limpiar</button>
            <button class="btn btn-success" type="submit"><i class="fas fa-save"></i>Guardar</button>
        </div>
    </form>
</div>
<?php require_once __DIR__ . '/../../layouts/footer.php'; ?>