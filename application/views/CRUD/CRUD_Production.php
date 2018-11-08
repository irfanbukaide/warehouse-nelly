<?php
// inisialisasi
$item_production_id = $id;
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
            <h3 class="page-title"><i class="material-icons">swap_horiz</i>Production</h3>
        </div>
    </div>
    <!-- File Manager -->
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-3 mb-2">
            <div class="card card-small">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Input Production</h6>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                        <div class="row">
                            <div class="col">
                                <form action="<?= site_url('production/save'); ?>" method="post">
                                    <input type="hidden" name="item_prd_id" value="<?= $item_production_id; ?>">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="item_id">Item</label>
                                            <select name="item_id" id="item_id" class="form-control" required autofocus>
                                                <option value="">Select Item</option>
                                                <?php if ($items != NULL): ?>
                                                    <?php foreach ($items as $item): ?>
                                                        <option value="<?= $item->item_id; ?>"><?= $item->item_name; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label for="item_prd_bahan">Bahan</label>
                                            <input type="number" class="form-control" name="item_prd_bahan"
                                                   id="item_prd_bahan" min="0"
                                                   placeholder="0" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-6">
                                            <label for="item_prd_sablon">Sablon</label>
                                            <input type="number" class="form-control" name="item_prd_sablon"
                                                   id="item_prd_sablon" min="0"
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
                                            <label for="item_prd_jahit">Jahitan</label>
                                            <input type="number" class="form-control" name="item_prd_jahit"
                                                   id="item_prd_jahit" min="0"
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
                <?php if ($productions != NULL): ?>
                    <?php foreach ($productions as $production): ?>
                        <tr>
                            <td class="text-left"><?= date_format(date_create($production->created_at), 'd-M-Y H:i'); ?></td>
                            <td class="text-left"><?= $production->item_name; ?></td>
                            <td><?= $production->item_prd_bahan; ?></td>
                            <td><?= $production->item_prd_sablon; ?> / <span
                                        class="text-danger"><?= $production->sablon_rusak; ?></span></td>
                            <td><?= $production->item_prd_jahit; ?> / <span
                                        class="text-danger"><?= $production->jahit_rusak; ?></span></td>
                            <td><span class="text-success"><?= $production->item_prd_jahit; ?></span></td>
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
        var item_prd_bahan = $('#item_prd_bahan'),
            item_prd_sablon = $('#item_prd_sablon'),
            sablon_rusak = $('#sablon_rusak'),
            item_prd_jahit = $('#item_prd_jahit'),
            jahit_rusak = $('#jahit_rusak');

        item_prd_bahan.keyup(function () {
            if (item_prd_bahan.val() < 1) {
                item_prd_sablon.attr('disabled', 'disabled').val(0);
                item_prd_jahit.attr('disabled', 'disabled').val(0);
            } else {
                item_prd_sablon.removeAttr('disabled');
                item_prd_sablon.attr('max', item_prd_bahan.val())

            }
        });

        item_prd_sablon.keyup(function () {
            if (item_prd_sablon.val() < 1) {
                item_prd_jahit.attr('disabled', 'disabled').val(0);
            } else {
                item_prd_sablon.attr('max', item_prd_bahan.val());

                item_prd_jahit.removeAttr('disabled');
                item_prd_jahit.attr('max', item_prd_sablon.val());

                sablon_rusak.val(item_prd_bahan.val() - item_prd_sablon.val());
            }
        });

        item_prd_jahit.keyup(function () {
            if (item_prd_jahit.val() > 1) {
                item_prd_jahit.attr('max', item_prd_sablon.val());

                jahit_rusak.val(item_prd_sablon.val() - item_prd_jahit.val());
            }
        })
    })
</script>