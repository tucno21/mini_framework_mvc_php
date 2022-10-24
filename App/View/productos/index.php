<?php include ext('layoutdash.head') ?>
<div class="pcoded-content">
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col d-flex flex-column flex-md-row justify-content-between align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Panel de Productos</h5>
                    </div>
                    <div class="">
                        <?php if (can('products.create')) : ?>
                            <a href="<?= route('products.create') ?>" class="btn btn-outline-dark btn-sm">Crear producto</a>
                        <?php endif;  ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->

    <!-- [ Main Content ] start -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h5>Lista de usuarios</h5>
                </div>
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table table-striped">
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
                                        <td><?= $prod->name ?></td>
                                        <td><?= $prod->producto ?></td>
                                        <td><?= $prod->descripcion ?></td>
                                        <td><?= $prod->precio ?></td>
                                        <td><?= $prod->created_at ?></td>
                                        <td><?= $prod->updated_at ?></td>
                                        <?php if (can('products.edit')) : ?>
                                            <td><a href="<?= route('products.edit') . '?id=' . $prod->id ?>" class="btn btn-outline-warning btn-sm"><i class="bi bi-pencil"></i></a></td>
                                        <?php endif;  ?>
                                        <?php if (can('products.destroy')) : ?>
                                            <td><a href=<?= route('products.destroy') . '?id=' . $prod->id ?>" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash3"></i></a></td>
                                        <?php endif;  ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
</div>
<?php include ext('layoutdash.footer') ?>