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
                                <th width="10%">Kode Berkas</th>
                                <th width="20%">Berkas</th>
                                <th>Keterangan</th>
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
                    <input type="hidden" value="" name="id_md_rubrik_detail" />
                    <div class="form-body">
                        <div class="form-group row"><label class="col-lg-2 col-form-label">Jenis Berkas</label>
                            <div class="col-lg-10">
                                <select class="form-control" name="rubrik" id="rubrik">
                                    <option value="">--Rubrik--</option>
                                    <?php for ($i = 0; $i < sizeof($rubrik); $i++) : ?>
                                        <option value="<?= $rubrik[$i]['id_md_rubrik'] ?>"><?= $rubrik[$i]['rubrik'] ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row"><label class="col-lg-2 col-form-label">Kode Berkas</label>
                            <div class="col-lg-10">
                                <input type="text" placeholder="Kode Rubrik" class="form-control" name="kode_berkas">
                                <span class="form-text m-b-none">AA,GH, dll</span>
                            </div>
                        </div>
                        <div class="form-group row"><label class="col-lg-2 col-form-label">Berkas</label>
                            <div class="col-lg-10">
                                <input type="text" placeholder="Berkas" class="form-control" name="berkas">
                                <span class="form-text m-b-none">Kepegawaian, Hukum, dll</span>
                            </div>
                        </div>
                        <div class="form-group row"><label class="col-lg-2 col-form-label">Keterangan</label>
                            <div class="col-lg-10">
                                <textarea class="form-control" rows="5" name="keterangan"></textarea>
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
        getTable();

    });

    function add() {
        save_method = 'add';
        $('#form')[0].reset(); // reset form on modals
        $('#modal_form').modal('show'); // show bootstrap modal
        $('.modal-title').text('Add Data Rubrik'); // Set Title to Bootstrap modal title
    }

    function save() {
        var url;
        if (save_method == 'add') {
            url = "<?php echo site_url('Action/rubrikDet/1') ?>";
        } else {
            url = "<?php echo site_url('Action/rubrikDet/2') ?>";
        }

        // ajax adding data to database
        $.ajax({
            url: url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data) {
                //if success close modal and reload ajax table
                $('#modal_form').modal('hide');
                location.reload(); // for reload a page
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error adding / update data');
            }
        });
    }

    function edit(id) {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        <?php header('Content-type: application/json'); ?>
        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url('Data/getRubrikDet/') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                console.log(data);
                $('[name="id_md_rubrik_detail"]').val(data.id_md_rubrik_detail);
                $('[name="kode_berkas"]').val(data.kode_berkas);
                $('[name="berkas"]').val(data.berkas);
                $('[name="keterangan"]').val(data.keterangan);
                //$('[name="rubrik"]').val(data.id_md_rubrik);
                $("#rubrik").val(data.id_md_rubrik);

                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Book'); // Set title to Bootstrap modal title

            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                alert('Error get data from ajax');
            }
        });
    }

    function die(id) {
        if (confirm('Are you sure delete this data?')) {
            // ajax delete data from database
            $.ajax({
                url: "<?php echo site_url('Action/rubrikDet/3/') ?>/" + id,
                type: "POST",
                dataType: "JSON",
                success: function(data) {

                    location.reload();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error deleting data');
                }
            });

        }
    }

    function getTable() {
        tablexx = $('#tabel_serverside').DataTable();
        tablexx.destroy();
        //datatables
        tablexx = $('#tabel_serverside').DataTable({
            "processing": true,
            "pageLength": 10,
            "responsive": true,
            "dom": '<"html5buttons"B>lTfgitp',
            "order": [],
            "ajax": {
                url: "<?php echo base_url("Data/rubrikDet"); ?>", // json datasource
                type: "post", // method  , by default get
                error: function() { // error handling
                    $(".tabel_serverside-error").html("");
                    $("#tabel_serverside").append('<tbody class="tabel_serverside-error"><tr><th colspan="3">Data Tidak Ditemukan di Server</th></tr></tbody>');
                    $("#tabel_serverside_processing").css("display", "none");

                }
            },
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],
            "ordering": true,
            "info": true,
            "serverSide": true,
            "stateSave": true,
            "scrollX": true,
            buttons: [{
                    extend: 'copy'
                },
                {
                    extend: 'csv'
                },
                {
                    extend: 'excel',
                    title: 'ExampleFile'
                },
                {
                    extend: 'pdf',
                    title: 'ExampleFile'
                },

                {
                    extend: 'print',
                    customize: function(win) {
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');
                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    }
                }
            ],
        });
    }
</script>
<?= $this->endSection(); ?>