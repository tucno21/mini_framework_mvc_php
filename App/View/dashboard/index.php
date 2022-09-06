<?php include ext('layoutdash.head') ?>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Panel de control</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->


        <!-- end row -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card text-white bg-secondary mb-4">
                    <div class="card-header bg-transparent border-bottom">Hola: <?= $userName ?></div>
                    <div class="card-body">
                        <h5 class="card-title">email: <?= session()->user()->email ?></h5>
                        <p class="card-text">rol: <?= session()->user()->rol_name ?></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->


    </div> <!-- container -->

</div> <!-- content -->

<?php include ext('layoutdash.footer') ?>