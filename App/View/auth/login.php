<?= extend('layout.head') ?>

<div class="container">
    <div class="form-signin w-100 m-auto text-center">
        <form action="<?= route('login') ?>" method="POST">
            <img class="mb-4" src="https://assets.stickpng.com/thumbs/58481791cef1014c0b5e4994.png" alt="" width="72" height="65">
            <h1 class="h3 mb-3 fw-normal">Login</h1>

            <div class="form-floating mb-2">
                <input name="email" type="email" class="form-control <?= isset($err->email) ? 'is-invalid' : '' ?>" id="email" value="<?= isset($data->email) ? $data->email : '' ?>">
                <label for="email">Email</label>
                <?php if (isset($err->email)) : ?>
                    <div class="invalid-feedback">
                        <?= $err->email ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="form-floating">
                <input name="password" type="password" class="form-control <?= isset($err->password) ? 'is-invalid' : '' ?>" id="password">
                <label for="password">Password</label>
                <?php if (isset($err->password)) : ?>
                    <div class="invalid-feedback">
                        <?= $err->password ?>
                    </div>
                <?php endif; ?>
            </div>

            <button class="w-90 btn btn-lg btn-primary mt-3" type="submit">Iniciar Sesión</button>
        </form>

        <div class="checkbox mb-3">
            <p class="mt-5 mb-3 text-muted">si no tienes una cuenta
                <a href="<?= route('register') ?>">Registrate!</a>
            </p>
        </div>
    </div>
</div>

<?= extend('layout.footer') ?>