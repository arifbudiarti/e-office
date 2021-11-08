<?= $this->extend('theme/theme'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5><?= $title ?></h5>
                <div class="ibox-tools">
                    <button type="button" class="btn btn-primary btn-xs" onclick="add()">Add Data</button>
                </div>
            </div>
            <div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="tabel_serverside">
                        <thead>
                            <tr>
                                <th width="3%">No</th>
                                <th>Rubrik</th>
                                <th width="10%">Status</th>
                                <th width="7%">&nbsp;</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Book Form</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id_md_rubrik" />
                    <div class="form-body">
                        <div class="form-group row"><label class="col-lg-2 col-form-label">Nama Rubrik</label>
                            <div class="col-lg-10">
                                <input type="text" placeholder="Rubrik" class="form-control" name="rubrik">
                                <span class="form-text m-b-none">Urusan Umum, Urusan Keuangan, dll</span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
<!-- Page-Level Scripts -->
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {

    });

    function add() {
        save_method = 'add';
        $('#form')[0].reset(); // reset form on modals
        $('#modal_form').modal('show'); // show bootstrap modal
        $('.modal-title').text('Add Data Rubrik'); // Set Title to Bootstrap modal title
    }
</script>
<?= $this->endSection(); ?>