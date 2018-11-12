<!doctype html>
<html class="no-js h-100" lang="en">
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
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Fashion Stock Storage</title>
    <meta name="description"
          content="A premium collection of beautiful hand-crafted Bootstrap 4 admin dashboard templates and dozens of custom components built for data-driven applications.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.2.0"
          href="<?= base_url('assets/styles/shards-dashboards.1.2.0.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/styles/extras.1.2.0.min.css'); ?>">
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</head>
<body class="h-100">
<!--<div class="color-switcher-toggle animated pulse infinite">-->
<!--<i class="material-icons">settings</i>-->
<!--</div>-->
<div class="container-fluid icon-sidebar-nav h-100">
    <div class="row h-100">

        <main class="main-content col">
            <div class="main-content-container container-fluid px-4 my-auto h-100">
                <div class="row no-gutters h-100">
                    <div class="col-lg-3 col-md-5 auth-form mx-auto my-auto">
                        <?php if (isset($_SESSION['berhasil'])): ?>
                            <div id="message" class="alert alert-success alert-dismissible fade show mb-2" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <i class="fa fa-check mx-2"></i>
                                <?= $_SESSION['berhasil']; ?>
                            </div>
                        <?php elseif (isset($_SESSION['gagal'])): ?>
                            <div id="message" class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <i class="fa fa-times mx-2"></i>
                                <?= $_SESSION['gagal']; ?>
                            </div>
                        <?php endif; ?>
                        <div class="card">
                            <div class="card-body">
                                <img class="auth-form__logo d-table mx-auto mb-3"
                                     src="<?= base_url('assets/images/shards-dashboards-logo.svg'); ?>"
                                     alt="Shards Dashboards - Register Template">
                                <h5 class="auth-form__title text-center mb-4">Fashion Garment</h5>
                                <form action="<?= site_url('auth/login/do'); ?>" method="post">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username"
                                               aria-describedby="Username" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                               placeholder="Password">
                                    </div>
                                    <button type="submit" class="btn btn-pill btn-accent d-table mx-auto">Login</button>
                                </form>
                            </div>
                        </div>
                        <!--<div class="auth-form__meta d-flex mt-4">-->
                        <!--<a href="forgot-password.html">Forgot your password?</a>-->
                        <!--<a class="ml-auto" href="register.html">Create new account?</a>-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
<script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
<script src="<?= base_url('assets/scripts/extras.1.2.0.min.js'); ?>"></script>
<script src="<?= base_url('assets/scripts/shards-dashboards.1.2.0.min.js'); ?>"></script>
</body>
</html>