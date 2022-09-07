<?php include ext('layoutdash.head') ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Panel de permisos</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->


        <!-- end row -->

        <div class="row">
            <div class="p-2 mb-2">
                <a href="<?= route('permissions.create') ?>" class="btn btn-outline-dark btn-sm">Crear permisos</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($permissions as $p) : ?>
                        <tr>
                            <th scope="row"><?= $p->id ?></th>
                            <td><?= $p->per_name ?></td>
                            <td><?= $p->description ?></td>
                            <td><a href="<?= route('permissions.edit') . '?id=' . $p->id ?>" class="btn btn-outline-warning btn-sm"><i class="bi bi-pencil"></i></a></td>
                            <td><a href=<?= route('permissions.destroy') . '?id=' . $p->id ?>" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash3"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- end row -->
    </div> <!-- container -->

</div> <!-- content -->

<?php include ext('layoutdash.footer') ?>