<?php include ext('layoutdash.head') ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Panel de Roles</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->


        <!-- end row -->

        <div class="row">
            <div class="p-2 mb-2">
                <a href="<?= route('roles.create') ?>" class="btn btn-outline-dark btn-sm">Crear Rol</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($roles as $r) : ?>
                        <tr>
                            <th scope="row"><?= $r->id ?></th>
                            <td><?= $r->rol_name ?></td>
                            <td><a href="<?= route('roles.edit') . '?id=' . $r->id ?>" class="btn btn-outline-warning btn-sm"><i class="bi bi-pencil"></i></a></td>
                            <td><a href=<?= route('roles.destroy') . '?id=' . $r->id ?>" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash3"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- end row -->
    </div> <!-- container -->

</div> <!-- content -->

<?php include ext('layoutdash.footer') ?>