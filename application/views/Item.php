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
            <th class="hide-sort-icons">Item Image</th>
            <th>Item Type</th>
            <th>Item Code</th>
            <th>Category</th>
            <th>Item Cost</th>
            <th>Item Price</th>
            <th>Item Status</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php if ($items != NULL): ?>
            <?php foreach ($items as $item): ?>
                <tr>
                    <td class="lo-stats__image">
                        <a href="#">
                            <img class="border rounded" src="images/sales-overview/product-order-1.jpg">
                        </a>
                    </td>
                    <td><?= $item->item_type; ?></td>
                    <td><?= $item->item_code; ?></td>
                    <td><?= isset($item->category) ? $item->category : '-'; ?></td>
                    <td><?= $item->item_hrg_modal; ?></td>
                    <td><?= $item->item_hrg_jual; ?></td>
                    <td><?= $item->item_status == 1 ? 'Available' : 'Empty'; ?></td>
                    <td><?= $item->created_at; ?></td>
                    <td><?= $item->updated_at != NULL ? $item->updated_at : '-'; ?></td>
                    <td class="file-manager__item-actions">
                        <div class="btn-group btn-group-sm d-flex justify-content-end" role="group"
                             aria-label="Table row actions">
                            <a href="<?= site_url('item/edit/' . $item->item_id); ?>"
                               class="btn btn-white active-light">
                                <i class="material-icons">&#xE254;</i>
                                Edit
                            </a>
                            <a href="<?= site_url('item/delete/' . $item->item_id); ?>" class="btn btn-danger">
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
    <!-- End File Manager -->
</div>
