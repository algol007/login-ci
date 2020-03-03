<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message') ?>
            <form action="<?= base_url('user/password') ?>" method="post">
                <div class="form-group">
                    <label for="password">Current Password</label>
                    <input type="password" class="form-control" id="password" name="password0">
                    <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="password1">New Password</label>
                    <input type="password" class="form-control" id="password1" name="password1">
                    <?= form_error('password1', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="form-group">
                    <label for="password2">Confirm Password</label>
                    <input type="password" class="form-control" id="password2" name="password2">
                    <?= form_error('password2', '<small class="text-danger">', '</small>') ?>
                </div>
                <button type="submit" class="btn btn-primary">Change Password</button>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->