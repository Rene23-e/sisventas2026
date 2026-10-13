<?php require __DIR__ . '/../../layouts/header.php'; ?>
<div class = "card p-3">
    <h3>Registrar Nuevo Producto</h3>
    <form action="" method="POST">
        <div class="row">
            <div class="col-md-4 form-group">
                <label for="">Categoria :</label>
                <select name="categoria_id" id="categoria_id" class="form-control" required>
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

            <div class="col-md-4 form-group">
                <label for="descripcion">Descripción :</label>
                <textarea name="descripcion" id="descripcion" class="form-control" maxlength="500" required></textarea>
            </div>

            <div class="col-md-4 form-group">
                <label for="precio">Precio :</label>
                <input type="number" name="precio" id="precio" class="form-control" step="0.01" required>
            </div>

            <div class="col-md-4 form-group">
                <label for="stock">Stock :</label>
                <input type="number" name="stock" id="stock" class="form-control" step="1" min="0" required>
            </div>
        </div>
    </form>
</div>

<?php require __DIR__ . '/../../layouts/footer.php'; ?>