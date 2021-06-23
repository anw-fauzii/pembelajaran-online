<div class="modal fade" id="modalCreateMapel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="mapelFormCreate" name="mapelFormCreate" class="form-horizontal">
                    <input type="hidden" name="mapel_id" id="mapel_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-5 control-label">Kode</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="kd_mapel" name="kd_mapel" placeholder="Masukan Kode Mata Pelajaran" value="" maxlength="50" required="">
                        </div>
                        <label for="name" class="col-sm-5 control-label">Mata Pelajaran</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" placeholder="Masukan Mata Pelajaran" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create"><i class="metismenu-icon pe-7s-paper-plane"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>