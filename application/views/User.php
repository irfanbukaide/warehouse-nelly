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
<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-4 mb-sm-0">
            <span class="text-uppercase page-subtitle">Master</span>
            <h3 class="page-title">
                <i class="material-icons">account_circle</i>
                User
            </h3>
        </div>
        <div class="col d-flex">
            <div class="btn-primary rounded d-inline-flex ml-auto my-auto" role="group" aria-label="Table row actions">
                <a href="<?= site_url('user/add'); ?>" class="btn btn-white">
                    <i class="material-icons">local_hospital</i>
                    <span>Tambah Data</span>
                </a>
            </div>
        </div>
    </div>
    <table class="file-manager file-manager-list table-responsive">
        <thead>
        <tr>
            <th class="text-left">Fullname</th>
            <th class="text-left">Username</th>
            <th class="text-left">User Role</th>
            <th class="text-left">Created at</th>
            <th class="text-left">Updated at</th>
            <th class="text-left">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php if ($users != NULL): ?>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td class="text-left"><?= $user->user_fullname; ?></td>
                    <td class="text-left"><?= $user->user_name; ?></td>
                    <td class="text-left"><?= $user->user_admin == 1 ? 'Admin' : 'User'; ?></td>
                    <td class="text-left"><?= $user->created_at; ?></td>
                    <td class="text-left"><?= $user->updated_at; ?></td>
                    <td class="file-manager__item-actions">
                        <div class="btn-group btn-group-sm d-flex" role="group"
                             aria-label="Table row actions">
                            <a href="<?= site_url('user/edit/' . $user->user_id); ?>"
                               class="btn btn-white active-light">
                                <i class="material-icons">&#xE254;</i>
                                Edit
                            </a>
                            <a href="<?= site_url('user/delete/' . $user->user_id); ?>" class="btn btn-danger">
                                <i class="material-icons">&#xE872;</i>
                                Delete
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
    <!-- End Page Header -->
</div>
