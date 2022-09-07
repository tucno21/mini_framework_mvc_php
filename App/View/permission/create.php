<?php include ext('layoutdash.head') ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Crear Permisos</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->


        <!-- end row -->

        <div class="row">
            <form action="<?= route('permissions.create') ?>" method="POST">
                <div class="row g-3">

                    <?php include_once 'imputs.php' ?>

                    <div class="col-md-12">
                        <button class="btn btn-lg btn-primary mt-3" type="submit">Crear permiso</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- end row -->


    </div> <!-- container -->

</div> <!-- content -->

<?php include ext('layoutdash.footer') ?>