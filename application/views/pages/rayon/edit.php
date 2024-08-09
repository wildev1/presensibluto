<?php foreach ($rayon as $rayon) {?>
<!-- add modal -->
<div class="modal fade rayon<?php echo $rayon->rayon_id; ?>" tabindex="-1" role="dialog"
    aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Delete Rayon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo site_url('rayon/update'); ?>" method="post">
                    <div class="form-group">
                        <label for="kode_rayon">Kode Rayon</label>
                        <input type="hidden" class="form-control" id="rayon_id" name="rayon_id"
                            value="<?php echo $rayon->rayon_id; ?>">
                        <input type="text" class="form-control" id="kode_rayon" readonly name="kode_rayon"
                            value="<?php echo $rayon->kode_rayon; ?>">
                    </div>
                    <div class="form-group">
                        <label for="rayon">Nama Rayon</label>
                        <input type="text" class="form-control" id="rayon" name="nama_rayon"
                            value="<?php echo $rayon->nama_rayon; ?>">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                            value="<?php echo $rayon->deskripsi; ?>">
                    </div>
                    <hr>
                    <div align="right">
                        <button type="submit" class="btn btn-primary btn-sm w-md">Submit</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php }?>
