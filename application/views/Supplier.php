<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-4 mb-sm-0">
            <span class="text-uppercase page-subtitle">Master</span>
            <h3 class="page-title">Supplier</h3>
        </div>
        <div class="col d-flex">
            <div class="btn-primary rounded d-inline-flex ml-auto my-auto" role="group" aria-label="Table row actions">
                <a href="<?= site_url('supplier/add'); ?>" class="btn btn-white">
                    <i class="material-icons">local_hospital</i>
                    <span>Add Supplier</span>
                </a>
            </div>
        </div>
    </div>
    <table class="file-manager file-manager-list table-responsive">
        <thead>
        <tr>
            <th class="text-left">Nama Suplier</th>
            <th>Kontak</th>
            <th>Nama PIC</th>
            <th>Email</th>
            <th>Provinsi</th>
            <th>Alamat</th>
            <th class="text-right">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php if ($suppliers != NULL): ?>
            <?php foreach ($suppliers as $supplier): ?>

            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
    <!-- End Page Header -->
</div>
