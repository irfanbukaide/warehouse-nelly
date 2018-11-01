<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-4 mb-sm-0">
            <span class="text-uppercase page-subtitle">Master</span>
            <h3 class="page-title">Category</h3>
        </div>
        <div class="col d-flex">
            <div class="btn-primary rounded d-inline-flex ml-auto my-auto" role="group" aria-label="Table row actions">
                <a href="<?= base_url('category/add'); ?>" class="btn btn-white">
                    <i class="material-icons">local_hospital</i>
                    <span>Add Category</span>
                </a>
            </div>
        </div>
    </div>
    <?php if (isset($_SESSION['berhasil'])): ?>
        <div class="alert alert-success alert-dismissible fade show mb-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <i class="fa fa-check mx-2"></i>
            <?= $_SESSION['berhasil']; ?>
        </div>
    <?php elseif (isset($_SESSION['gagal'])): ?>
        <div class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <i class="fa fa-times mx-2"></i>
            <?= $_SESSION['gagal']; ?>
        </div>
    <?php endif; ?>
    <table class="file-manager file-manager-list table-responsive">
        <thead>
        <tr>
            <th class="text-left">Category Name</th>
            <th class="text-left">Category Description</th>
            <th class="text-left">Category Status</th>
            <th class="text-left">Created at</th>
            <th class="text-left">Updated at</th>
            <th class="text-left">Actions</th>
        </tr>
        </thead>
        <tbody>

        <?php if ($categories != NULL): ?>
            <?php foreach ($categories as $category): ?>
                <tr>
                    <td class="text-left"><?= $category->category_name; ?></td>
                    <td class="text-left"><?= $category->category_description != NULL ? $category->category_description : '-'; ?></td>
                    <td class="text-left"><?= $category->category_active == 1 ? '<div class="text-success">Active</div>' : '<div class="text-default">Disabled</div>'; ?></td>
                    <td class="text-left"><?= $category->created_at; ?></td>
                    <td class="text-left"><?= $category->updated_at != NULL ? $category->updated_at : '-'; ?></td>
                    <td class="file-manager__item-actions">
                        <div class="btn-group btn-group-sm d-flex" role="group"
                             aria-label="Table row actions">
                            <a href="<?= site_url('category/edit/' . $category->category_id); ?>"
                               class="btn btn-white active-light">
                                <i class="material-icons">&#xE254;</i>
                                Edit
                            </a>
                            <a href="<?= site_url('category/delete/' . $category->category_id); ?>"
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
