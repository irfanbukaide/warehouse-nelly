<?php
// inisialisasi
if ($mode == 'create') {
    $item_id = $id;
    $item_code = '';
    $item_code2 = '';
    $item_status = 'checked="checked"';
    $item_description = '';
    $category_id = '';
} elseif ($mode == 'edit') {
    $item_id = $item->item_id;
    $item_code = $item->item_code;
    $item_code2 = $item->item_code2;
    $item_status = $item->item_status == 1 ? 'checked="checked"' : '';
    $item_description = $item->item_description;
    $category_id = isset($item->category_id) ? $item->category_id : '';
}

?>
<div class="main-content-container container-fluid px-4 pb-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col">
            <span class="text-uppercase page-subtitle">Master</span>
            <h3 class="page-title">
                <i class="material-icons">layers</i>
                Item
            </h3>
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
                                <form action="<?= site_url('item/save'); ?>" method="post">
                                    <input type="hidden" name="item_id" value="<?= $item_id; ?>">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="item_code">Item Code</label>
                                            <input type="text" class="form-control" name="item_code" id="item_code"
                                                   placeholder="Item Code" value="<?= $item_code; ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="item_code2">Item Code2</label>
                                            <input type="text" class="form-control" name="item_code2" id="item_code2"
                                                   placeholder="Item Code2" value="<?= $item_code2; ?>">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="category_id">Category</label>
                                            <select name="category_id" id="category_id" class="form-control">
                                                <option selected>Select Category</option>
                                                <?php if ($categories != NULL): ?>
                                                    <?php foreach ($categories as $category): ?>
                                                        <option value="<?= $category->category_id; ?>" <?= $category->category_id == $category_id ? 'selected' : ''; ?>><?= $category->category_name; ?></option>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row ">
                                        <div class="form-group col-md-12">
                                            <label for="item_status">Item Status</label>
                                            <div class="custom-control custom-toggle custom-toggle-sm">
                                                <input type="checkbox" id="item_status" name="item_status"
                                                       class="custom-control-input" <?= $item_status; ?> value="1">
                                                <label class="custom-control-label" for="item_status">Available</label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="item_description">Description</label>
                                            <textarea name="item_description" id="item_description"
                                                      class="form-control"><?= $item_description; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <button type="submit" class="btn btn-accent">Save</button>
                                            <a href="<?= site_url('item'); ?>" class="btn btn-danger">Return to Item</a>
                                        </div>
                                    </div>
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
<script>
    $(document).ready(function () {
        $('#category_id').select2({
            theme: 'bootstrap4'
        });

        $('#item_code2').select2({
            theme: 'bootstrap4'
        });
    })
</script>