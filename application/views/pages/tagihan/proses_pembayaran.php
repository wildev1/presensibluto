<?php foreach ($tagihan as $result) {?>
<!-- add modal -->
<div class="modal fade proses<?php echo $result->tagihan_id; ?>" tabindex="-1" role="dialog"
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
                        <label for="tagihan_id">Kode Rayon</label>
                        <input type="hidden" class="form-control" id="tagihan_id" name="tagihan_id"
                            value="<?php echo $result->tagihan_id; ?>">
                        <input type="text" class="form-control" id="jenis_tagihan" readonly name="jenis_tagihan"
                            value="<?php echo $result->jenis_tagihan; ?>">
                    </div>
                    <div class="form-group">
                        <label for="Jumlah_tagihan">Jumlah Jagihan</label>
                        <input type="text" class="form-control" id="Jumlah_tagihan" name="jumlah_tagihan"
                            value="<?php echo number_format($result->jumlah_tagihan, 0, ',', '.'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="potongan">Jumlah Jagihan</label>
                        <input type="text" class="form-control" id="potongan" name="potongan"
                            value="<?php echo $result->total; ?>">
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
