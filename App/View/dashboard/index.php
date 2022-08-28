<?php include ext('layout.head') ?>

<div class="container">
    <div class="bg-success bg-gradient bg-opacity-25 p-3 rounded">
        <div class="col-sm-8 mx-auto">
            <h1 class="text-center">Bienvenido <?= auth()->user()->name ?></h1>
        </div>
    </div>
</div>
<div class="container mt-3">
    <div class="p-2 mb-2">
        <a href="<?= route('dashboard.create') ?>" class="btn btn-outline-dark btn-sm">Crear producto</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Registro</th>
                <th scope="col">Producto</th>
                <th scope="col">Descripción</th>
                <th scope="col">Precio</th>
                <th scope="col">F. creación</th>
                <th scope="col">F. actualización</th>
                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($product as $prod) : ?>
                <tr>
                    <th scope="row"><?= $prod->id ?></th>
                    <td><?= $prod->user_id ?></td>
                    <td><?= $prod->producto ?></td>
                    <td><?= $prod->descripcion ?></td>
                    <td><?= $prod->precio ?></td>
                    <td><?= $prod->created_at ?></td>
                    <td><?= $prod->updated_at ?></td>
                    <td><a href="<?= route('dashboard.edit') . '?id=' . $prod->id ?>" class="btn btn-outline-warning btn-sm">Editar</a></td>
                    <td><a href=<?= route('dashboard.destroy') . '?id=' . $prod->id ?>" class="btn btn-outline-danger btn-sm">Eliminar</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include ext('layout.footer') ?>