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
<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-4 mb-sm-0">
            <span class="text-uppercase page-subtitle">Master</span>
            <h3 class="page-title">
                <i class="material-icons">contacts</i>
                Supplier
            </h3>
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
            <th>Supplier Name</th>
            <th>Supplier Contact</th>
            <th>Supplier Email</th>
            <th>Province</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php if ($suppliers != NULL): ?>
            <?php foreach ($suppliers as $supplier): ?>
                <tr>
                    <td><?= $supplier->supplier_name; ?></td>
                    <td><?= $supplier->supplier_contact; ?></td>
                    <td><?= $supplier->supplier_email; ?></td>
                    <td><?= $supplier->provinces->name; ?></td>
                    <td><?= $supplier->created_at; ?></td>
                    <td><?= $supplier->updated_at != NULL ? $supplier->updated_at : '-'; ?></td>
                    <td>
                        <div class="btn-group btn-group-sm d-flex" role="group"
                             aria-label="Table row actions">
                            <a href="<?= site_url('supplier/edit/' . $supplier->supplier_id); ?>"
                               class="btn btn-white active-light">
                                <i class="material-icons">&#xE254;</i>
                                Edit
                            </a>
                            <a href="<?= site_url('supplier/delete/' . $supplier->supplier_id); ?>"
                               class="btn btn-danger">
                                <i class="material-icons">&#xE872;</i>
                                Delete
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
    <!-- End Page Header -->
</div>
