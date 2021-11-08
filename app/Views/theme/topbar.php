<nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <form role="search" class="navbar-form-custom" action="search_results.html">
            <div class="form-group">
                <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
            </div>
        </form>
    </div>
    <ul class="nav navbar-top-links navbar-right">
        <li>
            <span class="m-r-sm text-muted welcome-message">Welcome to E-Office Nusamed Healthcare</span>
        </li>
        <li>
            <a href="<?= site_url('Apps'); ?>">
                <i class="fa fa-home"></i> Home
            </a>
        </li>
        <li>
            <a href="<?= site_url('Auth/logout'); ?>">
                <i class="fa fa-sign-out"></i> Log out
            </a>
        </li>
    </ul>

</nav>