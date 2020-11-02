<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <!-- Default box -->
        <div class="card col-lg-6">
            <div class="card-title text-light mt-3 ml-3">
                <a class="btn btn-primary" data-toggle="modal" data-target="#newUser">Add New User</a>
            </div>
            <div class="card-body">
                <?= form_error('menu', '<div class="text-danger">', '</div>');

                ?>
                <?= $this->session->flashdata('message'); ?>
                <div class="row">
                    <div class="col">
                        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>">
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($userrole as $r) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $r['nama']; ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/roleaccess'); ?>/<?= $r['id']; ?>" class="badge badge-success setRole" data-toggle="modal" data-target="#newUser" data-id="<?= $r['id']; ?>" data-nama="<?= $r['nama']; ?>" data-roleid="<?= $r['role_id']; ?>">set role</a>
                                            <a href="<?= base_url('admin/hapus'); ?>/<?= $r['id']; ?>" class="badge badge-danger tombol-hapus">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </div>
</section>
<!-- /.content -->

<!-- Modal -->
<div class="modal fade" id="newUser" tabindex="-1" aria-labelledby="newUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newUserLabel">Add New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
                        <input type="hidden" id="id" name="id">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password2" name="password2" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="role_id" name="role_id">
                            <option value="">Select Role</option>
                            <?php foreach ($role as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['role']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>