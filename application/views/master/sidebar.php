<!-- Main Sidebar -->
<aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
    <div class="main-navbar">
        <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
            <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                <div class="d-table m-auto">
                    <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;"
                         src="<?= base_url('assets/images/shards-dashboards-logo.svg'); ?>" alt="Shards Dashboard">
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
        <h6 class="main-sidebar__nav-title">Menu</h6>
        <ul class="nav nav--no-borders flex-column">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('Analytic'); ?>">
                    <i class="material-icons"></i>
                    <span>Dashboard</span>
                </a>
            </li>
        </ul>
        <ul class="nav nav--no-borders flex-column">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="material-icons">local_offer</i>
                    <span>Master</span>
                </a>
                <div class="dropdown-menu dropdown-menu-small">
                    <a class="dropdown-item " href="<?= base_url('category'); ?>">Category</a>
                    <a class="dropdown-item " href="<?= base_url('item'); ?>">Item</a>
                    <a class="dropdown-item " href="<?= base_url('supplier'); ?>">Supplier</a>
                    <a class="dropdown-item " href="<?= base_url('user'); ?>">User</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
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
                <a class="nav-link dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="material-icons">print</i>
                    <span>Report</span>
                </a>
                <div class="dropdown-menu dropdown-menu-small">
                    <a class="dropdown-item " href="report-masuk.html">Barang Masuk</a>
                    <a class="dropdown-item " href="report-keluar.html">Barang Keluar</a>
                    <a class="dropdown-item " href="report-retur.html">Barang Retur</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="dokumentasi.html">
                    <i class="material-icons">help</i>
                    <span>Bantuan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="error.html">
                    <i class="material-icons">error</i>
                    <span>Errors</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
<!-- End Main Sidebar -->