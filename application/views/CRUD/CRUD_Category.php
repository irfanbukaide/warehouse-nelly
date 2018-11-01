<?php
// inisialisasi
if ($mode == 'create') {
    $category_id = $id;
    $category_name = '';
    $category_description = '';
    $category_active = 'checked="checked"';

} elseif ($mode == 'edit') {
    $category_id = $category->category_id;
    $category_name = $category->category_name;
    $category_description = $category->category_description;
    $category_active = $category->category_active == 1 ? 'checked="checked"' : '';
}
?>

<?php if (isset($_SESSION['gagal'])): ?>
    <div id="message" class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <?= $_SESSION['gagal']; ?>
    </div>
<?php endif; ?>

<div class="main-content-container container-fluid px-4 pb-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col">
            <span class="text-uppercase page-subtitle">Master</span>
            <h3 class="page-title">Category</h3>
        </div>
    </div>
    <!-- End Page Header -->

    <!-- File Manager -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card card-small mb-4">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                        <div class="row">
                            <div class="col">
                                <form action="<?= site_url('category/save'); ?>" method="POST">
                                    <input type="hidden" name="category_id" value="<?= $category_id; ?>">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="category_name">Category Name</label>
                                            <input type="text" class="form-control" name="category_name"
                                                   id="category_name"
                                                   placeholder="Name" value="<?= $category_name; ?>" required autofocus>
                                            <div class="invalid-feedback"><?= form_error('category_name'); ?></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="category_description">Category Description</label>
                                            <textarea class="form-control" name="category_description"
                                                      id="category_description"
                                                      rows="5"
                                                      placeholder="Description"><?= $category_description; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <div class="custom-control custom-toggle custom-toggle-sm mb-1">
                                                <input type="checkbox" id="category_active" name="category_active"
                                                       class="custom-control-input" <?= $category_active; ?> value="1">
                                                <label class="custom-control-label" for="category_active">Active</label>
                                            </div>
                                        </div>

                                    </div>
                                    <button type="submit" class="btn btn-accent">Save</button>
                                    <a href="<?= base_url('category'); ?>" class="btn btn-danger">Return to Category</a>
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Default Light Table -->
</div>