<div class="modal fade" id="modalCreate" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="formCreate" name="formCreate" class="form-horizontal">
                    <div class="form-group">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="nip_old" id="nip_old">
                        <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="nip">NIP</label>
                            <div class="col-sm-9"><input type="text" class="form-control" id="nip" name="nip" placeholder="Masukan Kode Jurusan" value="" maxlength="50" required="">
                                </div>
                        </div>
                        <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="nama_guru">Nama</label>
                            <div class="col-sm-9"><input type="text" class="form-control" id="nama_guru" name="nama_guru" placeholder="Masukan Nama" value="" maxlength="50" required="">
                                </div>
                        </div>
                        <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="kontak">Kontak</label>
                            <div class="col-sm-9"><input type="text" class="form-control" id="kontak" name="kontak" placeholder="Masukan Kontak" value="" maxlength="50" required="">
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