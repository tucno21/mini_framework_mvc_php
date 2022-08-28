<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Carlos Tucno vasquez">
    <title><?= isset($title) ? $title : 'Mini Framework' ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            /* min-height: 75rem; */
            padding-top: 4.5rem;
        }

        .form-signin {
            max-width: 400px;
            padding: 15px;
        }
    </style>
</head>

<body>
    <main>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark" aria-label="Fourth navbar example">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= route('home') ?>">Mini Framework mvc Php</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExample04">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= route('login') ?>">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= route('register') ?>">Register</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

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

                    <button class="w-90 btn btn-lg btn-primary mt-3" type="submit">Crear Cuenta</button>
                </form>

                <div class="checkbox mb-3">
                    <p class="mt-5 mb-3 text-muted">si no tienes una cuenta
                        <a href="<?= route('register') ?>">Registrate!</a>
                    </p>
                </div>
            </div>
        </div>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>