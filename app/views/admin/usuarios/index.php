<?php require __DIR__ . '/../../layouts/header.php'; ?>


    <h3 class="text-center fw-bold text-success fst-italic text-uppercase">LISTA DE USUARIOS</h3>

  <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="<?= BASE_URL ?>/admin/usuarios/nuevo" class="btn btn-success col-2">Nuevo</a>
        <input type="text" id="buscarUsuario" class="form-control w-25" placeholder="Buscar usuario">
    </div> <br>
     <table id="tablaUsuarios" class="table table-hover align-middle mb-0">
        <thead class="table-primary text-primary text-uppercase border-bottom">            <tr>
                <th>Nro</th>
                <th>Rol</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $contador = 0;
            foreach($usuarios as $usuario){
               $contador += 1;
            ?>
                <tr>
                    <td><?= $contador ?></td>
                    <td><?= $usuario['rol_id'] ?></td>
                    <td><?= htmlspecialchars($usuario['nombre']) ?></td>
                    <td><?= htmlspecialchars($usuario['apellidos']) ?></td>
                    <td><?= htmlspecialchars($usuario['email']) ?></td>
                    <td><?= htmlspecialchars($usuario['telefono']) ?></td>
                    <td>
                        <?= ($usuario['activo'] == 1) ? '<span class="badge bg-success">Activo</span>' : '<span class="badge bg-danger">Inactivo</span>' ?>
                    </td>
                    <td class="p-2">
                        <a class="btn btn-outline-primary" title="Editar" href="<?= BASE_URL ?>/admin/usuarios/editar/<?= $usuario['id'] ?>"><i class="fa fa-edit"></i></a>
                        <a class="btn btn-outline-danger" title="Eliminar" href="<?= BASE_URL ?>/admin/usuarios/eliminar/<?= $usuario['id'] ?>" onclick="return confirm('¿Estás seguro de eliminar este usuario?');"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                
            <?php } ?>
        </tbody>
    </table>
</div>
<script>
    document.getElementById('buscarUsuario').addEventListener('input', function () {
        const busqueda = this.value.toLowerCase();
        document.querySelectorAll('#tablaUsuarios tbody tr').forEach(function (fila) {
            fila.style.display = fila.textContent.toLowerCase().includes(busqueda) ? '' : 'none';
        });
    });
</script>
<?php require __DIR__ . '/../../layouts/footer.php'; ?>