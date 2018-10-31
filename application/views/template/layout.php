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
          href="assets/styles/shards-dashboards.1.2.0.min.css">
    <link rel="stylesheet" href="assets/styles/extras.1.2.0.min.css">
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.dataTables.min.css"/>
    <!-- JS -->
    <?php echo $scripts_header; ?>
</head>
<body class="h-100">
<div class="container-fluid">
    <div class="row">
        <?php echo $sidebar; ?>
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
            <?php echo $top_menu; ?>
            <?php echo $content; ?>
            <?php echo $footer; ?>
        </main>
    </div>
</div>

<?php echo $scripts_footer; ?>
</body>
</html>
