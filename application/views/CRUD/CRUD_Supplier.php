<?php
// inisialisasi
if ($mode == 'create') {
    $supplier_id = $id;
    $supplier_name = '';
    $supplier_contact = '';
    $supplier_email = '';
    $supplier_address = '';

} elseif ($mode == 'edit') {
    $supplier_id = $supplier->supplier_id;
    $supplier_name = $supplier->supplier_name;
    $supplier_contact = $supplier->supplier_contact;
    $supplier_email = $supplier->supplier_email;
    $supplier_address = $supplier->supplier_address;
}
?>
<div class="main-content-container container-fluid px-4 pb-4">
    <div class="page-header row no-gutters py-4">
        <div class="col">
            <span class="text-uppercase page-subtitle">Master</span>
            <h3 class="page-title">Supplier</h3>
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
                                <form action="<?= site_url('supplier/save'); ?>" method="post">
                                    <input type="hidden" name="supplier_id" value="<?= $supplier_id; ?>">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="supplier_name">Supplier Name</label>
                                            <input type="text" class="form-control" name="supplier_name"
                                                   id="supplier_name" placeholder="Name" value="<?= $supplier_name; ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="supplier_contact">Supplier Contact</label>
                                            <input type="text" class="form-control" name="supplier_contact"
                                                   id="supplier_contact" placeholder="Contact"
                                                   value="<?= $supplier_contact; ?>">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="supplier_email">Supplier E-mail</label>
                                            <input type="text" class="form-control" name="supplier_email"
                                                   id="supplier_email" placeholder="E-mail"
                                                   value="<?= $supplier_email; ?>">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="province_id">Province</label>
                                            <select id="province_id" class="form-control">
                                                <option value="">Select Province</option>
                                                <option>...</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="supplier_address">Supplier Address</label>
                                        <textarea type="text" class="form-control" name="supplier_address"
                                                  id="supplier_address"
                                                  placeholder="Address"><?= $supplier_address; ?></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-accent">Save</button>
                                    <a href="<?= site_url('supplier'); ?>" class="btn btn-danger">Return to Supplier
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