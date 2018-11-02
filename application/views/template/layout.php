<!doctype html>
<html class="no-js h-100" lang="<?php echo $lang; ?>">
<head>
    <!-- Google Tag Manager -->
    <script>dataLayer = [{'ga-tracking-id': 'UA-115105611-1'}];</script>
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-WGLBNC8');</script>
    <!-- End Google Tag Manager -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $site_title; ?></title>
    <meta name="description" content="<?php echo $site_description; ?>"/>
    <meta name="keywords" content="<?php echo $site_keywords; ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo $meta_tag; ?>
    <?php echo $styles; ?>
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.2.0"
          href="<?= base_url('assets/styles/shards-dashboards.1.2.0.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/styles/extras.1.2.0.min.css'); ?>">
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css"/>
    <!-- JS -->
    <?php echo $scripts_header; ?>
</head>
<body class="h-100">
<div class="container-fluid">
    <div class="row">
        <!-- Main Sidebar -->
        <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
            <div class="main-navbar">
                <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
                    <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                        <div class="d-table m-auto">
                            <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;"
                                 src="<?= base_url('assets/images/shards-dashboards-logo.svg'); ?>"
                                 alt="Shards Dashboard">
                            <span class="d-none d-md-inline ml-1">Fashion Stock</span>
                        </div>
                    </a>
                    <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                        <i class="material-icons"></i>
                    </a>
                </nav>
            </div>
            <form action="#" class="main-sidebar__search w-100 border-right d-sm-flex d-md-none d-lg-none">
            </form>
            <div class="nav-wrapper">
                <h6 class="main-sidebar__nav-title">Dashboard</h6>
                <ul class="nav nav--no-borders flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('analytic'); ?>">
                            <i class="material-icons"></i>
                            <span>Analytic</span>
                        </a>
                    </li>
                </ul>
                <h6 class="main-sidebar__nav-title">Master</h6>
                <ul class="nav nav--no-borders flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('category'); ?>">
                            <i class="material-icons">local_offer</i>
                            <span>Category</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('item'); ?>">
                            <i class="material-icons">local_offer</i>
                            <span>Item</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('supplier'); ?>">
                            <i class="material-icons">local_offer</i>
                            <span>Supplier</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('user'); ?>">
                            <i class="material-icons">local_offer</i>
                            <span>User</span>
                        </a>
                    </li>
                </ul>
                <h6 class="main-sidebar__nav-title">Transaction</h6>
                <ul class="nav nav--no-borders flex-column">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                            <i class="material-icons"></i>
                            <span>Transaction</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-small">
                            <a class="dropdown-item " href="transaksi-masuk.html">Income Order</a>
                            <a class="dropdown-item " href="transaksi-keluar.html">Outcome Order</a>
                            <a class="dropdown-item " href="transaksi-retur.html">Return Order</a>
                            <a class="dropdown-item " href="delivery-order.html">Delivery Order</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="false" aria-expanded="false">
                            <i class="material-icons">print</i>
                            <span>Report</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-small">
                            <a class="dropdown-item " href="report-masuk.html">Barang Masuk</a>
                            <a class="dropdown-item " href="report-keluar.html">Barang Keluar</a>
                            <a class="dropdown-item " href="report-retur.html">Barang Retur</a>
                        </div>
                    </li>

                </ul>
                <h6 class="main-sidebar__nav-title">Documentation</h6>
                <ul class="nav nav--no-borders flex-column">
                    <li class="nav-item">
                        <a class="nav-link " href="dokumentasi.html">
                            <i class="material-icons">help</i>
                            <span>Help</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <!-- End Main Sidebar -->
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
            <!--top menu-->
            <div class="main-navbar sticky-top bg-white">
                <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
                    <form action="#" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
                        <div class="input-group input-group-seamless ml-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-search"></i>
                                </div>
                            </div>
                            <input class="navbar-search form-control" type="text" placeholder="Pencarian ..."
                                   aria-label="Search">
                        </div>
                    </form>
                    <ul class="navbar-nav border-left flex-row ">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#"
                               role="button" aria-haspopup="true" aria-expanded="false">
                                <img class="user-avatar rounded-circle mr-2"
                                     src="<?= base_url('assets/images/avatars/0.jpg'); ?>"
                                     alt="User Avatar"> <span class="d-none d-md-inline-block">Admin Fashion</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-small">
                                <a class="dropdown-item" href="user-profile.html"><i class="material-icons"></i>
                                    Profile</a>
                                <a class="dropdown-item text-danger" href="#"><i
                                            class="material-icons text-danger"></i> Logout </a>
                            </div>
                        </li>
                    </ul>
                    <nav class="nav">
                        <a href="#"
                           class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left"
                           data-toggle="collapse" data-target=".header-navbar" aria-expanded="false"
                           aria-controls="header-navbar">
                            <i class="material-icons"></i>
                        </a>
                    </nav>
                </nav>
            </div>
            <!--end top menu -->

            <!--content-->
            <?php echo $content; ?>
            <!--end content-->

        </main>
    </div>
</div>

<?php echo $scripts_footer; ?>
<script>
    $(document).ready(function () {
        setTimeout(function () {
            $('#message').fadeOut();
        }, 3000)
    })
</script>
</body>
</html>
