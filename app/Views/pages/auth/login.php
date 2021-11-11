<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-OFFICE | <?= $title ?></title>
    <!-- icon -->
    <link rel="icon" href="<?= base_url(); ?>/assets/img/nsm_potrait.png" type="image/x-icon" />
    <link href="<?= base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/css/animate.css" rel="stylesheet">
    <link href="<?= base_url(); ?>/assets/css/style.css" rel="stylesheet">
</head>

<body class="gray-bg">
    <div class="loginColumns animated fadeInDown">
        <div class="row">
            <div class="col-md-6">
                <h2 class="font-bold">Selamat Datang di E-OFFICE</h2>
                <p>
                    E-OFFICE merupakan digitalisasi proses surat menyurat dan disposisi.
                </p>
                <p>
                    E-OFFICE merupakan aplikasi inisiasi kantor pusat untuk menghemat kertas.
                </p>
                <p>
                    When an unknown printer took a galley of type and scrambled it to make a type specimen book.
                </p>
                <p>
                    <small>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</small>
                </p>
            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                    <form class="m-t" role="form" action="<?php echo base_url('Auth/checkAuth'); ?>" method="post">
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Username" required="" name="username">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" required="" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                        <a href="<?php echo base_url('Auth/forgot'); ?>">
                            <small>Forgot password?</small>
                        </a>

                        <p class="text-muted text-center">
                            <small>Do not have an account?</small>
                        </p>
                        <a class="btn btn-sm btn-white btn-block" href="<?php echo base_url('Auth/register'); ?>">Create an account</a>
                    </form>
                </div>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-6">
                Copyright PT NUSANTARA SEBELAS MEDIKA
            </div>
            <div class="col-md-6 text-right">
                <small>© 2021</small>
            </div>
        </div>
    </div>

</body>

</html>