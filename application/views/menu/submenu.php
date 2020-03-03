<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="row">
        <div class="col-lg">
            <?php if ($this->session->flashdata('message')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= $this->session->flashdata('message') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <!-- <?php if ($this->session->flashdata('error')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $this->session->flashdata('error') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?> -->
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors() ?>
                </div>
            <?php endif; ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addSubmenu">Add Submenu</a>
            <table class="table table-hover table-responsive-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Submenu</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Url</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Active</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($submenu as $submenu) : ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td class="title"><?= $submenu['title'] ?></td>
                            <td><?= $submenu['menu'] ?></td>
                            <td><?= $submenu['url'] ?></td>
                            <td><?= $submenu['icon'] ?></td>
                            <td><?= $submenu['is_active'] ?></td>
                            <td>
                                <a href="#editSubmenu" class="open-editSubmenu badge badge-warning" data-toggle="modal" data-id="<?= $submenu['id'] ?>" data-title="<?= $submenu['title'] ?>" data-menu="<?= $submenu['menu'] ?>" data-url="<?= $submenu['url'] ?>" data-icon="<?= $submenu['icon'] ?>">Edit</a>
                                <a href="<?= base_url() ?>menu/deleteSubmenu/<?= $submenu['id'] ?>" class="badge badge-danger">Delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- Add Menu Modal -->
<div class=" modal fade" id="addSubmenu" tabindex="-1" role="dialog" aria-labelledby="addSubmenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSubmenuLabel">Add New Submenu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/addSubmenu') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" placeholder="Submenu name">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="menu_id">
                            <option value="">Pilih Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="url" placeholder="Url">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="icon" placeholder="Icon">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="is_active">
                            <option value="0">Tidak Aktif</option>
                            <option value="1">Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Submenu</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Menu Modal -->
<div class="modal fade" id="editSubmenu" tabindex="-1" role="dialog" aria-labelledby="editSubmenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSubmenuLabel">Edit Submenu</h5>
                <!-- <?php print_r($menu) ?> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/editSubmenu') ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" id="title">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="menu_id">
                            <option value="">Pilih Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="url" id="url">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="icon" id="icon">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="is_active" id="is_active">
                            <option value="0">Tidak Aktif</option>
                            <option value="1">Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit Submenu</button>
                </div>
            </form>

            <!-- <form action="<?= base_url('menu/edit') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="id" id="id">
                        <input type="text" class="form-control" id="menu" name="menu">
                    </div>
                </div>
                <div class=" modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit Submenu</button>
                </div>
            </form> -->
        </div>
    </div>
</div>