<?= extend('layout.head') ?>

<div class="container">
    <div class="bg-success bg-gradient bg-opacity-25 p-3 rounded">
        <div class="col-sm-8 mx-auto">
            <h1 class="text-center">Bienvenido <?= auth()->user()->name ?></h1>
        </div>
    </div>
</div>

<?= extend('layout.footer') ?>