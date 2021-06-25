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
                        <div class="position-relative row form-group"><label class="col-sm-4 col-form-label" for="kd_mapel">Kode</label>
                            <div class="col-sm-8"><input type="text" class="form-control" id="kd_mapel" name="kd_mapel" placeholder="Masukan Kode Mapel" value="" maxlength="50" required="">
                                </div>
                        </div>
                        <div class="position-relative row form-group"><label class="col-sm-4 col-form-label" for="nama_mapel">Mata Pelajaran</label>
                            <div class="col-sm-8"><input type="text" class="form-control" id="nama_mapel" name="nama_mapel" placeholder="Masukan Mata Pelajaran" value="" maxlength="50" required="">
                                </div>
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