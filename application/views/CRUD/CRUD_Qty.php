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
        <div class="col-12 col-sm-4 text-center text-sm-left mb-4 mb-sm-0">
            <span class="text-uppercase page-subtitle">Transaction</span>
            <h3 class="page-title"><i class="material-icons">swap_horiz</i>QTY</h3>
        </div>
    </div>
    <!-- File Manager -->
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-3 mb-2">
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
                                                   id="item_qty_bahan" min="0"
                                                   placeholder="0" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-6">
                                            <label for="item_qty_sablon">Sablon</label>
                                            <input type="number" class="form-control" name="item_qty_sablon"
                                                   id="item_qty_sablon" min="0"
                                                   placeholder="0" required disabled>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="sablon_rusak">BS</label>
                                            <input type="number" class="form-control" name="sablon_rusak"
                                                   id="sablon_rusak" min="0"
                                                   placeholder="0" disabled>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-6">
                                            <label for="item_qty_jahit">Jahitan</label>
                                            <input type="number" class="form-control" name="item_qty_jahit"
                                                   id="item_qty_jahit" min="0"
                                                   placeholder="0" required disabled>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="jahit_rusak">BS</label>
                                            <input type="number" class="form-control" name="jahit_rusak"
                                                   id="jahit_rusak" min="0"
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
        <div class="col-12 col-sm-12 col-md-12 col-lg-9">
            <table class="table table-responsive">
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
                            <td class="text-left"><?= date_format(date_create($qty->item_qty_date), 'd-M-Y'); ?></td>
                            <td class="text-left"><?= $qty->item_name; ?></td>
                            <td><?= $qty->item_qty_bahan; ?></td>
                            <td><?= $qty->item_qty_sablon; ?> / <span
                                        class="text-danger"><?= $qty->sablon_rusak; ?></span></td>
                            <td><?= $qty->item_qty_jahit; ?> / <span
                                        class="text-danger"><?= $qty->jahit_rusak; ?></span></td>
                            <td><span class="text-success"><?= $qty->item_qty_jahit; ?></span></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
                <tfoot>
                <tr>
                    <th colspan="2"></th>
                    <th class="text-center"><?= isset($bahan_total) ? $bahan_total : '-'; ?></th>
                    <th class="text-center"><?= isset($sablon_total) ? $sablon_total : '-'; ?> / <span
                                class="text-danger"><?= isset($sablon_rusak) ? $sablon_rusak : '-'; ?></span>
                    </th>
                    <th class="text-center"><?= isset($jahit_total) ? $jahit_total : '-'; ?> / <span
                                class="text-danger"><?= isset($jahit_rusak) ? $jahit_rusak : '-'; ?></span></th>
                    <th class="text-center"><span
                                class="text-success"><?= isset($grand_total) ? $grand_total : '-'; ?></span>
                    </th>
                </tr>
                </tfoot>
            </table>

        </div>

    </div>
    <!-- End Default Light Table -->
</div>
<script>
    $(document).ready(function () {
        $('[id^=item_id]').select2({
            theme: 'bootstrap4'
        });

        $('.table').DataTable({
            "order": [[0, "desc"]],
            "paging": false,
            "searching": false,
            "info": false
        });
    });

    $(function () {
        var item_qty_bahan = $('#item_qty_bahan'),
            item_qty_sablon = $('#item_qty_sablon'),
            sablon_rusak = $('#sablon_rusak'),
            item_qty_jahit = $('#item_qty_jahit'),
            jahit_rusak = $('#jahit_rusak');

        item_qty_bahan.keyup(function () {
            if (item_qty_bahan.val() < 1) {
                item_qty_sablon.attr('disabled', 'disabled').val(0);
                item_qty_jahit.attr('disabled', 'disabled').val(0);
            } else {
                item_qty_sablon.removeAttr('disabled');
                item_qty_sablon.attr('max', item_qty_bahan.val())

            }
        });

        item_qty_sablon.keyup(function () {
            if (item_qty_sablon.val() < 1) {
                item_qty_jahit.attr('disabled', 'disabled').val(0);
            } else {
                item_qty_sablon.attr('max', item_qty_bahan.val());

                item_qty_jahit.removeAttr('disabled');
                item_qty_jahit.attr('max', item_qty_sablon.val());

                sablon_rusak.val(item_qty_bahan.val() - item_qty_sablon.val());
            }
        });

        item_qty_jahit.keyup(function () {
            if (item_qty_jahit.val() > 1) {
                item_qty_jahit.attr('max', item_qty_sablon.val());

                jahit_rusak.val(item_qty_sablon.val() - item_qty_jahit.val());
            }
        })
    })
</script>