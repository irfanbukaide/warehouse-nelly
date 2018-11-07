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
    <table class="transaction-history d-none">
        <thead>
        <tr>
            <th class="hide-sort-icons">Item Image</th>
            <th>Item Code</th>
            <th>Item Code2</th>
            <th>Category</th>
            <th>Item Status</th>
            <!--            <th>Created at</th>-->
            <!--            <th>Updated at</th>-->
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php if ($items != NULL): ?>
            <?php foreach ($items as $item): ?>
                <tr>
                    <td class="lo-stats__image">
                        <?php if ($item->item_image != NULL): ?>
                            <a id="btnshowimage" href="<?= $item->item_image; ?>">
                                <img class="border rounded" src="<?= $item->item_image; ?>">
                            </a>
                        <?php else: ?>
                            <img class="border rounded" src="<?= base_url('assets/images/notfound.png'); ?>">
                        <?php endif; ?>

                    </td>
                    <td><?= $item->item_code; ?></td>
                    <td><?= $item->item_code2; ?></td>
                    <td><?= isset($item->category) ? $item->category : '-'; ?></td>
                    <td><?= $item->item_status == 1 ? 'Available' : 'Empty'; ?></td>
                    <td class="file-manager__item-actions">
                        <div class="btn-group btn-group-sm d-flex" role="group"
                             aria-label="Table row actions">
                            <a id="btnupload" href="<?= site_url('image/item_upload/' . $item->item_id); ?>"
                               data-remote="false" data-toggle="modal" data-target="#modalupload"
                               class="btn btn-white active-light">
                                <i class="material-icons">add_photo_alternate</i>
                                Upload
                            </a>
                            <a id="btnedit" href="<?= site_url('item/edit/' . $item->item_id); ?>"
                               class="btn btn-white active-light">
                                <i class="material-icons">&#xE254;</i>
                                Edit
                            </a>
                            <a id="btndelete" href="<?= site_url('item/delete/' . $item->item_id); ?>"
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
    <!-- End File Manager -->
</div>
<div class="modal fade" id="modalupload" tabindex="-1" role="dialog" aria-labelledby="modalupload_title"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalupload_title">Picture</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="modalupload_body" class="modal-body">
                ...
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('[id^=btnupload]').click(function (e) {
            e.preventDefault();
            var url = $(this).attr('href'),
                modal = $('#modalupload'),
                modalbody = $('#modalupload_body');
            modal.modal('show');
            modalbody.load(url);

        });


    })
</script>
