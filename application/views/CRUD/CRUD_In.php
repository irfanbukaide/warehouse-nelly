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
                Create Transaction In
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
                                <form action="<?= site_url('transaction/in/generate'); ?>" method="POST">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="transaction_id">Transaction ID</label>
                                            <input type="text" class="form-control" name="transaction_id"
                                                   id="transaction_id"
                                                   placeholder="ID" value="<?= $transaction_id; ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="transaction_date">Transaction Date</label>
                                            <input type="text" class="form-control" name="transaction_date"
                                                   id="transaction_date"
                                                   placeholder="Date" value="<?= $transaction_date; ?>">
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="transaction_item">Item</label>
                                            <select name="transaction_item" id="transaction_item" class="form-control"
                                                    required>
                                                <option value="">Select item</option>
                                                <?php if ($items): ?>
                                                    <?php foreach ($items as $item): ?>
                                                        <option value="<?= $item->item_id; ?>"><?= $item->item_name; ?></option>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-accent">Generate</button>
                                    <a href="<?= base_url('transaction'); ?>" class="btn btn-danger">Return to In &
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
        $('#transaction_id').keydown(function (e) {
            e.preventDefault();
        });

        $('#transaction_date').keydown(function (e) {
            e.preventDefault();
        });
    })
</script>