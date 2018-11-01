<?php
// inisialisasi
if ($mode == 'create') {
    $user_id = $id;
    $user_fullname = '';
    $user_name = '';
    $user_password = '';
    $user_admin = 'checked="checked"';

} elseif ($mode == 'edit') {
    $user_id = $user->user_id;
    $user_fullname = $user->user_fullname;
    $user_name = $user->user_name;
    $user_password = $user->user_password;
    $user_admin = $user->user_admin == 1 ? 'checked="checked"' : '';
}
?>
<div class="main-content-container container-fluid px-4 pb-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col">
            <span class="text-uppercase page-subtitle">Master</span>
            <h3 class="page-title">User</h3>
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
                                <form action="<?= site_url('user/save'); ?>" method="post">
                                    <input type="hidden" name="user_id" value="<?= $user_id; ?>">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="user_name">Username</label>
                                            <input type="text" class="form-control" name="user_name" id="user_name"
                                                   placeholder="Username" value="<?= $user_name; ?>" required autofocus>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="user_password">Password</label>
                                            <input type="password" class="form-control" name="user_password"
                                                   id="user_password" placeholder="Password"
                                                   value="<?= $user_password; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="user_fullname">Fullname</label>
                                            <input type="text" class="form-control" name="user_fullname"
                                                   id="user_fullname" placeholder="Full Name"
                                                   value="<?= $user_fullname; ?>">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <div class="custom-control custom-toggle custom-toggle-sm mb-1">
                                                <input type="checkbox" id="user_admin" name="user_admin"
                                                       class="custom-control-input" <?= $user_admin; ?> value="1">
                                                <label class="custom-control-label" for="user_admin">Admin</label>
                                            </div>
                                        </div>

                                    </div>
                                    <button type="submit" class="btn btn-accent">Save</button>
                                    <a href="<?= site_url('user'); ?>" class="btn btn-danger">Return to User</a>
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