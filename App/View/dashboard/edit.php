<?php include ext('layout.head') ?>

<div class="container">
    <div class="form-product w-100 m-auto">
        <form action="<?= route('dashboard.edit') ?>" method="POST">
            <div class="row g-3">

                <?php include_once 'imputs.php' ?>

                <div class="col-md-12">
                    <button class="btn btn-lg btn-primary mt-3" type="submit">Editar Producto</button>
                </div>
            </div>
        </form>

    </div>
</div>

<?php include ext('layout.footer') ?>