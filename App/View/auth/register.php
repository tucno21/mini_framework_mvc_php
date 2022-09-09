<?php include ext('layout.head') ?>

<div class="container">
    <div class="form-signin w-100 m-auto text-center">
        <form action="<?= route('register') ?>" method="POST">
            <img class="mb-4" src="https://assets.stickpng.com/thumbs/58481791cef1014c0b5e4994.png" alt="" width="72" height="65">
            <h1 class="h3 mb-3 fw-normal">Registrar</h1>

            <div class="form-floating mb-2">
                <input name="name" type="text" class="form-control <?= isset($err->name) ? 'is-invalid' : '' ?> " id="name" value="<?= isset($data->name) ? $data->name : '' ?>">
                <label for="name">Nombre</label>
                <?php if (isset($err->name)) : ?>
                    <div class="invalid-feedback">
                        <?= $err->name ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="form-floating mb-2">
                <input name="email" type="email" class="form-control <?= isset($err->email) ? 'is-invalid' : '' ?> " id="email" value="<?= isset($data->email) ? $data->email : '' ?>">
                <label for="email">Email</label>
                <?php if (isset($err->email)) : ?>
                    <div class="invalid-feedback">
                        <?= $err->email ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="form-floating mb-2">
                <input name="password" type="password" class="form-control <?= isset($err->password) ? 'is-invalid' : '' ?> " id="password">
                <label for="password">Password</label>
                <?php if (isset($err->password)) : ?>
                    <div class="invalid-feedback">
                        <?= $err->password ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="form-floating">
                <input name="password_confirm" type="password" class="form-control <?= isset($err->password_confirm) ? 'is-invalid' : '' ?> " id="password_confirm">
                <label for="password_confirm">Confirmar contraseña</label>
                <?php if (isset($err->password_confirm)) : ?>
                    <div class="invalid-feedback">
                        <?= $err->password_confirm ?>
                    </div>
                <?php endif; ?>
            </div>
            <input type="hidden" name="_token" value="<?= csrf() ?>">
            <button class="w-90 btn btn-lg btn-primary mt-3" type="submit">Crear Cuenta</button>
        </form>

        <div class="checkbox mb-3">
            <p class="mt-5 mb-3 text-muted">si no tienes una cuenta
                <a href="<?= route('login') ?>">Iniciar Sesión</a>
            </p>
        </div>
    </div>
</div>

<?php include ext('layout.footer') ?>