<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<? base_url('admin') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-lock"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Login CI</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- QUERY MENU -->
    <?php

    $role_id = $this->session->userdata('role_id');
    $queryMenu = "SELECT `tb_user_menu`.`id`, `menu`
                    FROM `tb_user_menu` JOIN `tb_user_access_menu` 
                      ON `tb_user_menu`.`id` = `tb_user_access_menu`.`menu_id`
                   WHERE `tb_user_access_menu`.`role_id` = $role_id
                ORDER BY `tb_user_access_menu`.`menu_id` ASC
                ";

    $menu = $this->db->query($queryMenu)->result_array();

    ?>

    <?php foreach ($menu as $menu) : ?>

        <!-- Heading -->
        <div class="sidebar-heading">
            <?= $menu['menu'] ?>
        </div>

        <?php

        // $menuId = $menu['id'];
        // $querySubMenu = "SELECT *
        //            FROM `tb_user_sub_menu` JOIN `tb_user_menu`
        //              ON `tb_user_sub_menu`.`menu_id` = `tb_user_menu`.`id`
        //           WHERE `tb_user_sub_menu`.`menu_id` = $menuId
        //             AND `tb_user_sub_menu`.`is_active` = 1
        //         ";

        $menuId = $menu['id'];
        $querySubMenu = "SELECT *
                           FROM `tb_user_submenu` 
                          WHERE `menu_id` = $menuId
                            AND `is_active` = 1
                        ";

        $subMenu = $this->db->query($querySubMenu)->result_array();

        ?>

        <?php foreach ($subMenu as $subMenu) : ?>
            <?php if ($title == $subMenu['title']) : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link pb-0" href="<?= base_url($subMenu['url']) ?>">
                    <i class="<?= $subMenu['icon'] ?>"></i>
                    <span><?= $subMenu['title'] ?></span></a>
                </li>
            <?php endforeach; ?>

            <hr class="sidebar-divider mt-3">

        <?php endforeach; ?>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth/logout') ?>">
                <i class="fas fa-fw fa-sign-in-alt"></i>
                <span>Logout</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>
<!-- End of Sidebar -->