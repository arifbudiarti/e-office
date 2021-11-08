<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" src="img/profile_small.jpg" />
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold">David Williams</span>
                        <span class="text-muted text-xs block">Art Director <b class="caret"></b></span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                        <li class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="login.html">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <?php if (isset($menu)) : ?>
                <?php for ($i = 0; $i < sizeof($menu); $i++) : ?>
                    <?php if (!empty($menu[$i]['url'])) { ?>
                        <li <?= $menu[$i]['aktif'] ?>>
                            <a href="<?= site_url() . $menu[$i]['url'] . "/" . $menu[$i]['id_md_menu'] ?>"><i class="fa <?= $menu[$i]['icon'] ?>"></i> <span class="nav-label"><?= $menu[$i]['menu'] ?></span></a>
                        </li>
                    <?php } else { ?>
                        <li <?= $menu[$i]['aktif'] ?>>
                            <a href="<?= site_url() . $menu[$i]['url'] ?>"><i class="fa <?= $menu[$i]['icon'] ?>"></i> <span class="nav-label"><?= $menu[$i]['menu'] ?> </span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <?php for ($j = 0; $j < sizeof($menu[$i]['detail']); $j++) : ?>
                                    <li>
                                        <a href="<?= site_url() . $menu[$i]['detail'][$j]['url'] . "/" . $menu[$i]['detail'][$j]['ref'] ?>">
                                            <i class="fa <?= $menu[$i]['detail'][$j]['icon'] ?>"></i> <?= $menu[$i]['detail'][$j]['menu'] ?>
                                        </a>
                                    </li>
                                <?php endfor; ?>
                            </ul>
                        </li>
                    <?php } ?>
                <?php endfor; ?>
            <?php endif; ?>
        </ul>

    </div>
</nav>