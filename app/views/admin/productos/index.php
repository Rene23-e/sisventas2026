<?php require __DIR__ . '/../../layouts/header.php'; ?>
<div class="card p-2">
    <h3 class="text-center fw-bold text-warning fst-italic text-uppercase">LISTA DE PRODUCTOS</h3>
    <br>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="<?= BASE_URL ?>/admin/productos/nuevo" class="btn btn-success col-2">Nuevo</a>
        <input type="text" id="buscarProducto" class="form-control w-25" placeholder="Buscar producto...">
    </div>
  <table id="tablaProductos" class="table table-hover align-middle mb-0">
        <thead class="table-primary text-primary text-uppercase border-bottom">    
            <tr>
                <th>Nro</th>
                <th>Categoria</th>
                <th>Código</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
             $contador = 0;
             foreach($productos as $producto){
                $contador +=1;
             ?>
                <tr>
                    <td><?= $contador?></td>
                    <td><?= $producto['categoria_nombre'] ?></td>
                    <td><?= $producto['codigo_sku'] ?></td>
                    <td><?= $producto['nombre'] ?></td>
                    <td><?= $producto['precio_venta'] ?></td>
                    <td><?= $producto['stock_actual'] ?></td>
                    <td class="p-2">
                        <a class="btn btn-outline-primary" title="Editar" href="<?= BASE_URL ?>/admin/productos/editar/<?= $producto['id'] ?>"><i class="fa fa-edit"></i>></a>
                        <a class="btn btn-outline-danger" title="Eliminar" href="<?= BASE_URL ?>/admin/productos/eliminar/<?= $producto['id'] ?>" onclick="return confirm('¿Estás seguro de eliminar este producto?');"><i class="fa fa-trash"></i>></a>
                    </td>
                </tr>
                <?php } ?>
        </tbody>
    </table>
</div>
<script>
    document.getElementById('buscarProducto').addEventListener('input', function () {
        const busqueda = this.value.toLowerCase();
        document.querySelectorAll('#tablaProductos tbody tr').forEach(function (fila) {
            fila.style.display = fila.textContent.toLowerCase().includes(busqueda) ? '' : 'none';
        });
    });
</script>
<?php require __DIR__ . '/../../layouts/footer.php'; ?>