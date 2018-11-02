<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col">
            <span class="text-uppercase page-subtitle">Master</span>
            <h3 class="page-title">
                <i class="material-icons">layers</i>
                Item
            </h3>
        </div>
        <div class="col d-flex">
            <div class="btn-primary rounded d-inline-flex ml-auto my-auto" role="group" aria-label="Table row actions">
                <a href="<?= site_url('item/add'); ?>" class="btn btn-white">
                    <i class="material-icons">local_hospital</i>
                    <span>Add Item</span>
                </a>
            </div>
        </div>
    </div>
    <!-- End Page Header -->
    <!-- File Manager -->
    <table class="file-manager file-manager-list d-none table-responsive">
        <thead>
        <tr>
            <th class="hide-sort-icons">Gambar</th>
            <th>Artikel Fast</th>
            <th>Artikel Paloma</th>
            <th>Kategori</th>
            <th>Harga Pokok</th>
            <th>Harga Jual</th>
            <th>Status</th>
            <th class="text-right">Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="lo-stats__image">
                <a href="#">
                    <img class="border rounded" src="images/sales-overview/product-order-1.jpg">
                </a>
            </td>
            <td>FAS001</td>
            <td>PAL00A</td>
            <td>Dress</td>
            <td>Rp. 65.000</td>
            <td>Rp. 75.000</td>
            <td>Tersedia</td>
            <td class="file-manager__item-actions">
                <div class="btn-group btn-group-sm d-flex justify-content-end" role="group"
                     aria-label="Table row actions">
                    <button type="button" class="btn btn-white active-light">
                        <i class="material-icons">&#xE254;</i>
                    </button>
                    <button type="button" class="btn btn-danger">
                        <i class="material-icons">&#xE872;</i>
                    </button>
                </div>
            </td>
        </tr>
        <tr>
            <td class="lo-stats__image">
                <a href="#">
                    <img class="border rounded" src="images/sales-overview/product-sportswear.jpg">
                </a>
            </td>
            <td>FAS002</td>
            <td>PAL00B</td>
            <td>Jaket</td>
            <td>Rp. 125.000</td>
            <td>Rp. 135.000</td>
            <td>Tersedia</td>
            <td class="file-manager__item-actions">
                <div class="btn-group btn-group-sm d-flex justify-content-end" role="group"
                     aria-label="Table row actions">
                    <button type="button" class="btn btn-white active-light">
                        <i class="material-icons">&#xE254;</i>
                    </button>
                    <button type="button" class="btn btn-danger">
                        <i class="material-icons">&#xE872;</i>
                    </button>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
    <!-- End File Manager -->
</div>
