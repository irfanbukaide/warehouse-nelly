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
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col">
            <span class="text-uppercase page-subtitle">Transaction</span>
            <h3 class="page-title">OUT</h3>
        </div>
        <div class="col-12 col-sm-4 d-flex align-items-center">
            <div id="analytics-overview-date-range" class="input-daterange input-group input-group-sm ml-auto">
                <input type="text" class="input-sm form-control" name="start" placeholder="Start Date"
                       id="analytics-overview-date-range-1">
                <input type="text" class="input-sm form-control" name="end" placeholder="End Date"
                       id="analytics-overview-date-range-2">
                <span class="input-group-append">
                    <span class="input-group-text">
                      <i class="material-icons">&#xE916;</i>
                    </span>
                  </span>
            </div>
        </div>
        <div class="col d-flex">
            <div class="btn-primary rounded d-inline-flex ml-auto my-auto" role="group" aria-label="Table row actions">
                <a href="<?= site_url('transaction/out/create'); ?>" class="btn btn-white">
                    <i class="material-icons">local_hospital</i>
                    <span>Create Transaction</span>
                </a>
            </div>
        </div>
    </div>
    <!-- End Page Header -->
    <!-- File Manager -->
    <table class="file-manager file-manager-list d-none table-responsive">
        <thead>
        <tr>
            <th>Transaction ID</th>
            <th>Customer</th>
            <th>Item</th>
            <th>QTY</th>
            <th>Date</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php if ($transaction_outs): ?>
            <?php foreach ($transaction_outs as $transaction_out): ?>
                <tr>
                    <td><?= $transaction_out->transactout_id; ?></td>
                    <td><?= $transaction_out->customer->customer_name; ?></td>
                    <td><?= $transaction_out->item_name; ?></td>
                    <td><?= $transaction_out->transactout_qty; ?></td>
                    <td><?= $transaction_out->transactout_date; ?></td>
                    <td><?= $transaction_out->transactout_status == 1 ? '<div class="text-success">OK</div>' : '<div class="text-danger">PENDING</div>'; ?></td>
                    <td class="file-manager__item-actions">
                        <div class="btn-group btn-group-sm d-flex justify-content-center" role="group"
                             aria-label="Table row actions">
                            <?php if ($transaction_out->transactout_status == 1 OR $akses_admin != 1): ?>
                                <button disabled type="button" class="btn btn-white active-light">
                                    Approved
                                </button>
                            <?php else: ?>
                                <button type="button" class="btn btn-success active-light"
                                        onclick="post_data($(this))"
                                        data-toggle="modal" data-target="#approve"
                                        data-href="<?= site_url('transaction/approve/out/' . $transaction_out->transactout_id . '/index'); ?>">
                                    Approve
                                </button>
                            <?php endif; ?>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        <!--        <tr>-->
        <!--            <td>IN-00001</td>-->
        <!--            <td>FAST-0001 (PALOMA-0001)</td>-->
        <!--            <td>400</td>-->
        <!--            <td>IDR 100.000 / IDR 120.000</td>-->
        <!--            <td>10/10/2018</td>-->
        <!--            <td>Pending</td>-->
        <!--            <td class="file-manager__item-actions">-->
        <!--                <div class="btn-group btn-group-sm d-flex" role="group" aria-label="Table row actions">-->
        <!--                    <button type="button" class="btn btn-white active-light">-->
        <!--                        Approve-->
        <!--                    </button>-->
        <!--                </div>-->
        <!--            </td>-->
        <!--        </tr>-->
        </tbody>
    </table>
    <!-- End File Manager -->
</div>

<div class="modal fade" id="approve" tabindex="-1" role="dialog" aria-labelledby="approveLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="approveLabel">Verifikasi Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>

<script>
    function post_data(data) {
        var d = data,
            url = d.data('href'),
            modal = $('#approve'),
            modalbody = modal.find('.modal-body');
        modalbody.load(url);
    }
</script>