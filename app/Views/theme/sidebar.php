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
                <?php for ($i = 0; $i < sizeof($menu['level1']); $i++) : ?>
                    <!-- id level 1 -->
                    <?php $id1 = $menu['level1'][$i]['id']; ?>
                    <?php if (!empty($menu['level1'][$i]['url'])) { ?>
                        <li>
                            <a href="<?= site_url() . $menu['level1'][$i]['url'] ?>"><i class="<?= $menu['level1'][$i]['icon'] ?>"></i> <span class="nav-label"><?= $menu['level1'][$i]['menu'] ?></span></a>
                        </li>
                    <?php } else { ?>
                        <li>
                            <a href=""><i class="fa <?= $menu['level1'][$i]['icon'] ?>"></i> <span class="nav-label"><?= $menu['level1'][$i]['menu'] ?> </span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <?php for ($j = 0; $j < sizeof($menu['level2'][$id1]); $j++) : ?>
                                    <?php $id2 = $menu['level2'][$id1][$j]['id']; ?>
                                    <?php if (!empty($menu['level2'][$id1][$j]['url'])) { ?>
                                        <li>
                                            <a href="<?= site_url() . $menu['level2'][$id1][$j]['url'] ?>">
                                                <i class="<?= $menu['level2'][$id1][$j]['icon'] ?>"></i> <?= $menu['level2'][$id1][$j]['menu'] ?>
                                            </a>
                                        </li>
                                    <?php } else { ?>
                                        <li>
                                            <a href="#" id="damian"><?= $menu['level2'][$id1][$j]['menu'] ?> <span class="fa arrow"></span></a>
                                            <ul class="nav nav-third-level">
                                                <?php for ($k = 0; $k < sizeof($menu['level3'][$id2]); $k++) : ?>
                                                    <li>
                                                        <a href="<?= site_url() . $menu['level3'][$id2][$k]['url'] ?>"><?= $menu['level3'][$id2][$k]['menu'] ?></a>
                                                    </li>
                                                    <li>
                                                    <?php endfor; ?>
                                            </ul>
                                        </li>
                                    <?php } ?>
                                <?php endfor; ?>
                            </ul>
                        </li>
                    <?php } ?>
                <?php endfor; ?>
            <?php endif; ?>
        </ul>

    </div>
</nav>