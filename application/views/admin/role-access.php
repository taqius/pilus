<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Default box -->
        <div class="card col-lg-6">
            <div class=" card-body">
                <?= $this->session->flashdata('message'); ?>
                <div class="row">
                    <div class="col">
                        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>">
                        </div>
                        <h5>Role : <?= $role['role']; ?></h5>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col">Access</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($menu as $m) : ?>
                                    <tr>
                                        <th scope="row"><?= $i++; ?></th>
                                        <td><?= $m['menu']; ?></td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>">
                                            </div>
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