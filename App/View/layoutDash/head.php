<?php include ext('layoutDash.menuDash') ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title><?= isset($titulo) ? $titulo : 'Dashboard'  ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="https://coderthemes.com/minton/layouts/assets/images/favicon.ico">

    <!-- App css -->
    <?php foreach ($linksCss as $value) : ?>
        <link href="<?= $value ?>" rel="stylesheet" />
    <?php endforeach; ?>
</head>

<!-- body start -->

<body class="loading">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <div class="navbar-custom">
            <div class="container-fluid">

                <ul class="list-unstyled topnav-menu float-end mb-0">

                    <li class="dropdown d-none d-lg-inline-block">
                        <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen" href="#">
                            <i class="bi bi-arrows-fullscreen"></i>
                        </a>
                    </li>


                    <li class="dropdown notification-list topbar-dropdown">
                        <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <!-- <img src="assets/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle"> -->
                            <i class="bi bi-person-bounding-box"></i>
                            <span class="pro-user-name ms-1">
                                <?= $userName ?> <i class="bi bi-chevron-compact-down"></i>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Bienvenido !</h6>
                            </div>

                            <?php foreach ($menuSession as $ms) : ?>

                                <a href="<?= $ms['url'] ?>" class="dropdown-item notify-item">
                                    <i class="<?= $ms['icon'] ?>"></i>
                                    <span><?= $ms['text'] ?></span>
                                </a>

                            <?php endforeach; ?>

                        </div>
                    </li>

                </ul>


                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect waves-light">
                            <i class="bi bi-list"></i>
                        </button>
                    </li>

                    <li>
                        <!-- Mobile menu toggle (Horizontal Layout)-->
                        <a class="navbar-toggle nav-link" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">

            <!-- LOGO -->
            <div class="logo-box">

                <a href="<?= $mainLink ?>" class="logo logo-light text-center">
                    <span class="logo-sm">
                        <span class="logo-lg-text-light"><?= $titleShort ?></span>
                    </span>
                    <span class="logo-lg">
                        <span class="logo-lg-text-light"><?= $title ?></span>
                    </span>
                </a>
            </div>

            <div class="h-100" data-simplebar>

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <ul id="side-menu">

                        <?php foreach ($linksSidebar as $key => $value) : ?>
                            <!-- UNA SOLA LINEA - TITULO-->
                            <?php if (isset($value['header'])) : ?>
                                <li class="menu-title"><?= $value['header']; ?></li>
                            <?php endif; ?>
                            <!-- UNA SOLA LINEA - LINK-->
                            <?php if (isset($value['mode']) && $value['mode'] == 'menu') : ?>
                                <li class="<?= $active ? 'menuitem-active' : '' ?>">
                                    <a href="<?= $value['url']; ?>">
                                        <i class="<?= $value['icon']; ?>"></i>
                                        <span> <?= $value['text']; ?> </span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <!-- SUBMENUS - LINK-->
                            <?php if (isset($value['mode']) && $value['mode'] == 'submenu') : ?>

                                <li>
                                    <a href="#sidebar<?= $value['text']; ?>" data-bs-toggle="collapse" aria-expanded="false" aria-controls="sidebar<?= $value['text']; ?>">
                                        <i class="<?= $value['icon']; ?>"></i>
                                        <span> <?= $value['text']; ?> </span>
                                        <span class="menu-arrow bi bi-caret-right"></span>
                                    </a>
                                    <div class="collapse" id="sidebar<?= $value['text']; ?>">
                                        <ul class="nav-second-level">
                                            <?php foreach ($value['submenu'] as $subValue) : ?>
                                                <li>
                                                    <a href="<?= $subValue['url']; ?>"><?= $subValue['text']; ?></a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </li>
                            <?php endif; ?>

                        <?php endforeach; ?>

                    </ul>

                </div>
                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">