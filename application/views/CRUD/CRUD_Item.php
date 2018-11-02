<?php
// inisialisasi
if ($mode == 'create') {
    $item_id = $id;
    $item_code = '';
    $item_type = '';
    $item_name = '';
    $item_cost = '';
    $item_price = '';
    $item_status = 'checked="checked"';
    $category_id = '';
} elseif ($mode == 'edit') {
    $item_id = $item->item_id;
    $item_code = $item->item_code;
    $item_type = $item->item_type;
    $item_name = $item->item_name;
    $item_cost = $item->item_cost;
    $item_price = $item->item_price;
    $item_status = 'checked="checked"';
    $category_id = '';
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
                                                   placeholder="Item Code" value="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="item_type">Item Type</label>
                                            <select name="item_type" id="item_type" class="form-control">
                                                <option selected>Select Type ...</option>
                                                <option value="fast">Fast</option>
                                                <option value="paloma">Paloma</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="item_name">Item Name</label>
                                            <input type="text" class="form-control" name="item_name"
                                                   id="item_name" placeholder="Name" value="">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="item_hrg_modal">Item Cost</label>
                                            <input type="text" class="form-control" name="item_hrg_modal"
                                                   id="item_hrg_modal" placeholder="Cost" value="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="item_hrg_jual">Item Price</label>
                                            <input type="text" class="form-control" name="item_hrg_jual"
                                                   id="item_hrg_jual" placeholder="Price" value="">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="category_id">Category</label>
                                            <select name="category_id" id="category_id" class="form-control">
                                                <option selected>Select Category ...</option>
                                                <?php if ($categories != NULL): ?>
                                                    <?php foreach ($categories as $category): ?>
                                                        <option value="<?= $category->category_id; ?>"><?= $category->category_name; ?></option>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">

                                            <label for="item_img">Image</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="item_img">
                                                <label class="custom-file-label" for="item_img">Select Image ...</label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="item_status">Item Status</label>
                                            <div class="custom-control custom-toggle custom-toggle-sm">
                                                <input type="checkbox" id="item_status" name="item_status"
                                                       class="custom-control-input" <?= $item_status; ?>>
                                                <label class="custom-control-label" for="item_status">Available</label>
                                            </div>
                                        </div>

                                    </div>
                                    <button type="submit" class="btn btn-accent">Save</button>
                                    <a href="<?= site_url('item'); ?>" class="btn btn-danger">Return to Item</a>
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