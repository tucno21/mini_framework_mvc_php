<?php include ext('layoutdash.head') ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Editar permisos</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->


        <!-- end row -->

        <div class="row">
            <form class="px-3" action="<?= route('roles.permissions') ?>" method="post">

                <div class="form-group">
                    <label for="permisos">Permisos</label>
                    <div class="row">
                        <?php foreach ($permissions as $p) : ?>
                            <div class="col-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="<?= $p->per_name ?>" value="<?= $p->id ?>" id="<?= $p->id ?>" <?= in_array($p->per_name, array_column((array)$permisosRol, 'per_name')) ? 'checked' : '' ?>>

                                    <label class="form-check-label" for="<?= $p->id ?>">
                                        <?= $p->description ?>
                                    </label>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <input type="hidden" name="rol_id" value="<?= $id ?>">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
        <!-- end row -->


    </div> <!-- container -->

</div> <!-- content -->

<?php include ext('layoutdash.footer') ?>