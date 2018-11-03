<?php
// inisialisasi
$item_qty_id = $id;
?>
<div class="main-content-container container-fluid px-4 pb-4">
    <div class="page-header row no-gutters py-4">
        <div class="col">
            <span class="text-uppercase page-subtitle">Transaction</span>
            <h3 class="page-title"><i class="material-icons">swap_horiz</i>QTY</h3>
        </div>
    </div>
    <!-- File Manager -->
    <div class="row">
        <div class="col-lg-6">
            <table class="file-manager file-manager-list table-responsive">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Item</th>
                    <th>Type</th>
                    <th>Total</th>
                    <th>Grand Total</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>

        </div>
        <div class="col-lg-6">
            <div class="card card-small mb-4">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                        <div class="row">
                            <div class="col">
                                <form action="<?= site_url('qty/save'); ?>" method="post">
                                    <input type="hidden" name="item_qty_id" value="<?= $item_qty_id; ?>">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="item_id">Item</label>
                                            <select name="item_id" id="item_id" class="form-control">
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
                                        <div class="form-group col-md-6">
                                            <label for="item_qty_type">Qty Type</label>
                                            <select name="item_qty_type" id="item_qty_type" class="form-control">
                                                <option value="">Select Type</option>
                                                <option value="1">Jumlah Potongan</option>
                                                <option value="2">Jumlah Sablon</option>
                                                <option value="3">Jumlah Jahit</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="item_qty_total">Total</label>
                                            <input type="text" class="form-control" name="item_qty_total"
                                                   id="item_qty_total"
                                                   placeholder="QTY">
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
        $('#item_id').select2();
    })
</script>