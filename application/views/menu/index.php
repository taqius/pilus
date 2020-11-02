<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <!-- Default box -->
        <div class="card col-lg-6">
            <div class="card-title text-light mt-3 ml-3">
                <a class="btn btn-primary addnewmenu" data-toggle="modal" data-target="#newMenuModal">Add New Menu</a>
            </div>
            <div class=" card-body">
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
                                    <th scope="col">Menu</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($menu as $m) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $m['menu']; ?></td>
                                        <td>
                                            <a href="<?= base_url('menu/ubah'); ?>/<?= $m['id']; ?>" class="badge badge-success menuEdit" data-toggle="modal" data-target="#newMenuModal" data-id="<?= $m['id']; ?>" data-menu="<?= $m['menu']; ?>">Edit</a>
                                            <a href="<?= base_url('menu/hapus'); ?>/<?= $m['id']; ?>" class="badge badge-danger tombol-hapus">Delete</a>
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
<div class="modal fade" id="newMenuModal" tabindex="-1" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Add New Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="id" id="id">
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu Name">
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