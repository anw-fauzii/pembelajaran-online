<div class="modal fade" id="modalCreateJurusan" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="jurusanFormCreate" name="jurusanFormCreate" class="form-horizontal">
                    <input type="hidden" name="jurusan_id" id="jurusan_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-5 control-label">Kode</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="kd_jurusan" name="kd_jurusan" placeholder="Masukan Kode Jurusan" value="" maxlength="50" required="">
                        </div>
                        <label for="name" class="col-sm-5 control-label">Jurusan</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan" placeholder="Masukan Jurusan" value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveJurusan" value="create"><i class="metismenu-icon pe-7s-paper-plane"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>