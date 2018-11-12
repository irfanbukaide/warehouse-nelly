<?php
// inisialisasi
$transaction_id = $id;
$transaction_date = date('d/m/Y H:i');
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
            <span class="text-uppercase page-subtitle">In & Out</span>
            <h3 class="page-title">
                <i class="material-icons">swap_horiz</i>
                Transaction Out
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
                                <form id="frmgenerate" action="<?= site_url('transaction/out/generate'); ?>"
                                      method="POST">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="transaction_id">Transaction ID</label>
                                            <input type="text" class="form-control" name="transaction_id"
                                                   id="transaction_id"
                                                   placeholder="ID" value="<?= $transaction_id; ?>">
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="transaction_customer">Customer</label>
                                            <select name="transaction_customer" id="transaction_customer"
                                                    class="form-control"
                                                    required>
                                                <option value="">Select Customer</option>
                                                <?php if ($customers): ?>
                                                    <?php foreach ($customers as $customer): ?>
                                                        <option value="<?= $customer->customer_id; ?>"><?= $customer->customer_name; ?></option>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="transaction_item">Item</label>
                                            <select name="transaction_item" id="transaction_item"
                                                    class="form-control"
                                                    required>
                                                <option value="">Select Item</option>
                                                <?php if ($items): ?>
                                                    <?php foreach ($items as $item): ?>
                                                        <option value="<?= $item->item_id; ?>"
                                                                data-qty="<?= $item->item_qty; ?>"><?= $item->item_name; ?></option>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="transaction_qty">QTY</label>
                                            <input type="number" class="form-control" name="transaction_qty"
                                                   id="transaction_qty" value="0" placeholder="0" disabled>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                    </div>
                                    <button type="submit" class="btn btn-accent">Generate</button>
                                    <a href="<?= base_url('transaction/out/index'); ?>" class="btn btn-danger">Return to
                                        In &
                                        Out</a>
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
        var transaction_item = $('#transaction_item');
        var transaction_customer = $('#transaction_customer');
        var transaction_qty = $('#transaction_qty');

        transaction_customer.select2({
            theme: 'bootstrap4'
        });

        transaction_item.select2({
            theme: 'bootstrap4'
        });

        transaction_item.change(function () {
            var val = $(this).find('option:selected').data('qty');
            transaction_qty.removeAttr('disabled');
            transaction_qty.attr('required', 'required');
            transaction_qty.val(val);
            transaction_qty.attr('max', val);
            transaction_qty.attr('min', 1);
        });



        $('#transaction_id').keydown(function (e) {
            e.preventDefault();
        });

        $('#transaction_date').keydown(function (e) {
            e.preventDefault();
        });
    });
</script>