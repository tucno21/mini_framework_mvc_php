<?php include ext('layoutdash.head') ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Panel de Usuarios</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->


        <!-- end row -->

        <div class="row">
            <?php if (can('users.create')) : ?>
                <div class="p-2 mb-2">
                    <a href="<?= route('users.create') ?>" class="btn btn-outline-dark btn-sm">Crear usuario</a>
                </div>
            <?php endif;  ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Email</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <th scope="row"><?= $user->id ?></th>
                            <td><?= $user->name ?></td>
                            <td><?= $user->email ?></td>
                            <td>
                                <p class="<?= $user->status == 1  ? 'btn btn-outline-success rounded-pill btn-xs  waves-effect waves-light' : 'btn btn-outline-danger rounded-pill btn-xs  waves-effect waves-light' ?>"><?= $user->status == 1  ? 'activo' : 'inactivo' ?> </p>
                            </td>
                            <td><?= $user->rol_name ?></td>

                            <?php if (can('users.edit')) : ?>
                                <td><a href="<?= route('users.edit') . '?id=' . $user->id ?>" class="btn btn-outline-warning btn-sm"><i class="bi bi-pencil"></i></a></td>
                            <?php endif;  ?>

                            <?php if (can('users.destroy')) : ?>
                                <td><a href=<?= route('users.destroy') . '?id=' . $user->id ?>" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash3"></i></a></td>
                            <?php endif;  ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- end row -->
    </div> <!-- container -->

</div> <!-- content -->

<?php include ext('layoutdash.footer') ?>