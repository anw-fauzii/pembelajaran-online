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
                    <input type="hidden" name="nis_old" id="nis_old">
                        <div class="position-relative row form-group"><label class="col-sm-4 col-form-label" for="nis">NIS</label>
                            <div class="col-sm-8"><input type="text" class="form-control" id="nis" name="nis" placeholder="Masukan Kode Jurusan" value="" maxlength="50" required="">
                                </div>
                        </div>
                        <div class="position-relative row form-group"><label class="col-sm-4 col-form-label" for="nama">Nama Siswa</label>
                            <div class="col-sm-8"><input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Mata Pelajaran" value="" maxlength="50" required="">
                                </div>
                        </div>
                        <div class="position-relative row form-group"><label class="col-sm-4 col-form-label" for="">JK</label>
                            <div class="col-sm-8">
                                <div>
                                    <div class="custom-radio custom-control custom-control-inline jk"><input type="radio" id="Laki-Laki" value="Laki-Laki" name="jk" id="jk" class="custom-control-input"><label class="custom-control-label"
                                        for="Laki-Laki">Laki-Laki</label></div>
                                    <div class="custom-radio custom-control custom-control-inline jk"><input type="radio" id="Perempuan" Value="Perempuan" name="jk" id="jk" class="custom-control-input"><label class="custom-control-label"
                                        for="Perempuan">Perempuan</label></div>
                                </div>
                            </div>
                        </div>
                        <div class="position-relative row form-group"><label class="col-sm-4 col-form-label" for="ortu">Orang Tua</label>
                            <div class="col-sm-8"><input type="text" class="form-control" id="ortu" name="ortu" placeholder="Masukan Jurusan" value="" maxlength="50" required="">
                                </div>
                        </div>
                        <div class="position-relative row form-group"><label class="col-sm-4 col-form-label" for="kontak">Kontak</label>
                            <div class="col-sm-8"><input type="text" class="form-control" id="kontak" name="kontak" placeholder="Masukan Jurusan" value="" maxlength="50" required="">
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