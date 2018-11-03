<?php
// inisialisasi
$item_qty_id = $id;
?>
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
<div class="main-content-container container-fluid px-4 pb-4">
    <div class="page-header row no-gutters py-4">
        <div class="col">
            <span class="text-uppercase page-subtitle">Transaction</span>
            <h3 class="page-title"><i class="material-icons">swap_horiz</i>QTY</h3>
        </div>
    </div>
    <!-- File Manager -->
    <div class="row">
        <div class="col-9">
            <table class="transaction-history d-none">
                <thead>
                <tr>
                    <th class="text-left">Date</th>
                    <th class="text-left">Item</th>
                    <th>Bahan</th>
                    <th>Sablon / BS</th>
                    <th>Jahitan / BS</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                <?php if ($qtys != NULL): ?>
                    <?php foreach ($qtys as $qty): ?>
                        <tr>
                            <td class="text-left"><?= date_format(date_create($qty->created_at), 'd-M-Y'); ?></td>
                            <td class="text-left"><?= $qty->item->item_name; ?></td>
                            <td><?= $qty->item_qty_bahan; ?></td>
                            <td><?= $qty->item_qty_sablon; ?> / <span
                                        class="text-danger"><?= $qty->item_qty_bahan - $qty->item_qty_sablon; ?></span>
                            </td>
                            <td><?= $qty->item_qty_jahit; ?> / <span
                                        class="text-danger"><?= $qty->item_qty_sablon - $qty->item_qty_jahit; ?></span>
                            </td>
                            <td><span class="text-success"><?= $qty->item_qty_jahit; ?></span></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                <!--                <tr role="row">-->
                <!--                    <td colspan="2">Total</td>-->
                <!--                    <td>Bahan</td>-->
                <!--                    <td>Sablon</td>-->
                <!--                    <td>Jahit</td>-->
                <!--                    <td>Grand</td>-->
                <!--                </tr>-->
                </tbody>
            </table>

        </div>
        <div class="col-3">
            <div class="card card-small">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Input QTY</h6>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                        <div class="row">
                            <div class="col">
                                <form action="<?= site_url('qty/save'); ?>" method="post">
                                    <input type="hidden" name="item_qty_id" value="<?= $item_qty_id; ?>">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="item_id">Item</label>
                                            <select name="item_id" id="item_id" class="form-control" required autofocus>
                                                <option value="">Select Item</option>
                                                <?php if ($items != NULL): ?>
                                                    <?php foreach ($items as $item): ?>
                                                        <option value="<?= $item->item_id; ?>"><?= $item->item_name; ?>
                                                            (<?= $item->item_code; ?>)
                                                        </option>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label for="item_qty_bahan">Bahan</label>
                                            <input type="number" class="form-control" name="item_qty_bahan"
                                                   id="item_qty_bahan"
                                                   placeholder="0">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-8">
                                            <label for="item_qty_sablon">Sablon</label>
                                            <input type="number" class="form-control" name="item_qty_sablon"
                                                   id="item_qty_sablon"
                                                   placeholder="0">
                                        </div>
                                        <div class="form-group col-4">
                                            <label for="sablon_rusak">BS</label>
                                            <input type="number" class="form-control" name="sablon_rusak"
                                                   id="sablon_rusak"
                                                   placeholder="0" disabled>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-8">
                                            <label for="item_qty_jahit">Jahitan</label>
                                            <input type="number" class="form-control" name="item_qty_jahit"
                                                   id="item_qty_jahit"
                                                   placeholder="0">
                                        </div>
                                        <div class="form-group col-4">
                                            <label for="jahit_rusak">BS</label>
                                            <input type="number" class="form-control" name="jahit_rusak"
                                                   id="jahit_rusak"
                                                   placeholder="0" disabled>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-accent">Save</button>
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
        $('#item_id').select2({
            theme: 'bootstrap4'
        });
    })
</script>