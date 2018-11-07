<?php
// inisialisasi
if ($mode == 'create') {
    $customer_id = $id;
    $customer_name = '';
    $customer_contact = '';
    $customer_email = '';
    $customer_address = '';
    $province_id = '';

} elseif ($mode == 'edit') {
    $customer_id = $customer->customer_id;
    $customer_name = $customer->customer_name;
    $customer_contact = $customer->customer_contact;
    $customer_email = $customer->customer_email;
    $customer_address = $customer->customer_address;
    $province_id = $customer->province_id;
}
?>
<div class="main-content-container container-fluid px-4 pb-4">
    <div class="page-header row no-gutters py-4">
        <div class="col">
            <span class="text-uppercase page-subtitle">Master</span>
            <h3 class="page-title"><i class="material-icons">contacts</i>Customer</h3>
        </div>
    </div>
    <!-- File Manager -->
    <div class="row">
        <div class="col-lg-8">
            <div class="card card-small mb-4">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                        <div class="row">
                            <div class="col">
                                <form action="<?= site_url('customer/save'); ?>" method="post">
                                    <input type="hidden" name="customer_id" value="<?= $customer_id; ?>">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="customer_name">Customer Name</label>
                                            <input type="text" class="form-control" name="customer_name"
                                                   id="customer_name" placeholder="Name" value="<?= $customer_name; ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="customer_contact">Customer Contact</label>
                                            <input type="text" class="form-control" name="customer_contact"
                                                   id="customer_contact" placeholder="Contact"
                                                   value="<?= $customer_contact; ?>">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="customer_email">Customer E-mail</label>
                                            <input type="text" class="form-control" name="customer_email"
                                                   id="customer_email" placeholder="E-mail"
                                                   value="<?= $customer_email; ?>">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="province_id">Province</label>
                                            <select name="province_id" id="province_id" class="form-control">
                                                <option value="">Select Province</option>
                                                <?php if ($provinces != NULL): ?>
                                                    <?php foreach ($provinces as $province): ?>
                                                        <option value="<?= $province->id; ?>" <?= $province->id == $province_id ? 'selected' : ''; ?>><?= $province->name; ?></option>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="customer_address">Customer Address</label>
                                        <textarea class="form-control" name="customer_address"
                                                  id="customer_address"
                                                  placeholder="Address"><?= $customer_address; ?></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-accent">Save</button>
                                    <a href="<?= site_url('Customer'); ?>" class="btn btn-danger">Return to Customer
                                        List</a>
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
        $('#province_id').select2({
            theme: 'bootstrap4'
        });
    })
</script>