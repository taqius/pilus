<div class="navbar-nav ml-2">
    <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
</div>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('user'); ?>" class="brand-link">
        <i alt="AdminLTE Logo" class="brand-text elevation-3 fas fa-laptop-code" style="opacity: .8"></i>
        <span class="brand-text font-weight-light">
            <strong>Adm</strong> Binus v.3.1
        </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <!-- <div class="image">
                <img src="<?= base_url('assets/images'); ?>/LOGO SMK.png" class="img-circle elevation-2" alt="User Image">
            </div> -->
            <div class="info">
                <a href="<?= base_url('user'); ?>" class="d-block"><?= $user['nama']; ?></a>
            </div>
            <div class="image">
                <img src="<?= base_url('assets/images'); ?>/<?= $user['image']; ?>" class="img-circle elevation-2" alt="User Image">
            </div>
        </div>

        <!-- QUERY MENU -->
        <?php
        $role_id = $this->session->userdata('role_id');
        $queryMenu =     "SELECT `user_menu`.`id`,`menu`
                            FROM `user_menu` JOIN `user_access_menu`
                              ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                           WHERE `user_access_menu`.`role_id`=$role_id
                        ORDER BY `user_access_menu`.`menu_id` ASC
                    ";
        $menu = $this->db->query($queryMenu)->result_array();

        ?>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <!-- Looping Menu -->
            <ul class="nav nav-pills nav-sidebar flex-column user-panel" role="menu">
                <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                <?php foreach ($menu as $m) : ?>
                    <div class="sidebar-heading text-gray">
                        <?= $m['menu']; ?>
                    </div>
                    <!-- lOOPING SUB MENU, SIAPKAN SUB MENU SESUAI MENU -->
                    <?php
                    $querySubMenu = "SELECT *
                            FROM `user_sub_menu` 
                           WHERE `menu_id` = {$m['id']}
                    ";
                    $subMenu = $this->db->query($querySubMenu)->result_array();
                    ?>
                    <?php foreach ($subMenu as $sm) : ?>
                        <li class="nav-item">
                            <?php if ($judul == $sm['title']) : ?>
                                <a href="<?= base_url() . $sm['url']; ?>" class="nav-link text-light">
                                <?php else : ?>
                                    <a href="<?= base_url() . $sm['url']; ?>" class="nav-link text-white-50">
                                    <?php endif; ?>

                                    <i class="nav-icon <?= $sm['icon']; ?>"></i>
                                    <p>
                                        <?= $sm['title']; ?>
                                    </p>
                                    </a>
                                <?php endforeach; ?>
                        </li>
                        <!-- END SUB MENU -->
                    <?php endforeach; ?>
                    <!-- END MENU  -->
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                <div class="sidebar-heading text-gray">
                    Log Out
                </div>
                <li class="nav-item user-panel">
                    <a href="<?= base_url('auth/logout'); ?>" class="nav-link">
                        <p>
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            Log Out
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>