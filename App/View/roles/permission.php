<?php include ext('layoutdash.head') ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Permisos para: <?= $rol->rol_name ?></h4>
                </div>
            </div>
        </div>
        <!-- end page title -->


        <!-- end row -->
        <form action="<?= route('roles.permissions') ?>" method="post">
            <div class="row border bg-light py-2">
                <?= csrf() ?>
                <?php foreach ($permissionsGroup as $g) : ?>
                    <div class="col-md-3">
                        <div class="card h-80">
                            <div class="card-header p-2 bg-primary text-white">
                                <h5 class="card-title m-0"><?= ucfirst($g[0]->title) ?></h5>
                            </div>
                            <div class="card-body p-2">
                                <?php foreach ($g as $p) : ?>
                                    <div class="form-check">
                                        <input class="form-check-input" id="<?= $p->id ?>" type="checkbox" name="<?= $p->per_name ?>" value="<?= $p->id ?>" id="<?= $p->id ?>" <?= in_array($p->per_name, array_column((array)$permisosRol, 'per_name')) ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="<?= $p->id ?>">
                                            <?= $p->description ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <div class="col-12 text-center">
                    <input type="hidden" name="rol_id" value="<?= $rol->id ?>">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </div>
        </form>
        <!-- end row -->


    </div> <!-- container -->

</div> <!-- content -->

<?php include ext('layoutdash.footer') ?>