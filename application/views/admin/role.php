<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <!-- Default box -->
        <div class="card col-lg-6">
            <div class="card-title text-light mt-3 ml-3">
                <a class="btn btn-primary" data-toggle="modal" data-target="#newRoleModal">Add New Role</a>
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
                                foreach ($role as $r) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $r['role']; ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/roleaccess'); ?>/<?= $r['id']; ?>" class="badge badge-success">access</a>
                                            <a href="<?= base_url('role/hapus'); ?>/<?= $r['id']; ?>" class="badge badge-danger tombol-hapus">Delete</a>
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
<div class="modal fade" id="newRoleModal" tabindex="-1" aria-labelledby="newMRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModalLabel">Add New Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/role'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="role" name="role" placeholder="Role Name">
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