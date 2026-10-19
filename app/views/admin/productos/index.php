<?php require __DIR__ . '/../../layouts/header.php'; ?>
<div class="card p-2">
    <h3>Lista de Productos</h3>
    <table class="table-bordered m-3">
        <thead>
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
                $contador += 1;
             ?>
                <tr>
                    <td><?= $contador?></td>
                    <td><?= $producto['categoria_nombre'] ?></td>
                    <td><?= $producto['codigo_sku'] ?></td>
                    <td><?= $producto['nombre'] ?></td>
                    <td><?= $producto['precio_venta'] ?></td>
                    <td><?= $producto['stock_venta'] ?></td>
                    <td>botones</td>
                </tr>
                <?php } ?>
        </tbody>
    </table>
</div>
<?php require __DIR__ . '/../../layouts/footer.php'; ?>