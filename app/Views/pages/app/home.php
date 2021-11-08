<?= $this->extend('theme/theme2'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <?php for ($i = 0; $i < sizeof($modules); $i++) : ?>
        <div class="col-lg-3">
            <div class="widget style1 <?= $modules[$i]['color'] ?>-bg">
                <div class="row">
                    <div class="col-4">
                        <i class="fa <?= $modules[$i]['icon'] ?> fa-5x"></i>
                    </div>
                    <div class="col-8 text-right">
                        <span> Module </span>
                        <a href="<?= site_url() . $modules[$i]["url"]; ?>" style="color:white;">
                            <h2 class="font-bold"><?= $modules[$i]['modules'] ?></h2>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endfor; ?>
</div>
<!-- Page-Level Scripts -->
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {

    });
</script>
<?= $this->endSection(); ?>