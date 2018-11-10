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
                <a href="<?= site_url('transaction/in/create'); ?>" class="btn btn-white">
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
            <th>Supplier</th>
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
                    <td><?= $transaction_out->transactin_id; ?></td>
                    <td><?= $transaction_out->transactin_id; ?></td>
                    <td><?= $transaction_out->item->item_code; ?></td>
                    <td><?= $transaction_out->transactin_qty; ?></td>
                    <td><?= $transaction_out->transactin_date; ?></td>
                    <td><?= $transaction_out->transactin_status == 1 ? '<div class="text-success">OK</div>' : '<div class="text-danger">PENDING</div>'; ?></td>
                    <td class="file-manager__item-actions">
                        <div class="btn-group btn-group-sm d-flex justify-content-center" role="group"
                             aria-label="Table row actions">
                            <?php if ($transaction_out->transactin_status == 1): ?>
                                <button disabled type="button" class="btn btn-white active-light">
                                    Approved
                                </button>
                            <?php else: ?>
                                <a class="btn btn-white active-light"
                                   href="<?php site_url('transaction/approve/' . $transaction_out->transactin_id); ?>">
                                    Approve
                                </a>
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