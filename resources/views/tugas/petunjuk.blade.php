<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Detail Tugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                asasasasas
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Beri Nilai <span id="nama"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formCreate" name="formCreate" class="form-horizontal">
                    <div class="form-group">
                    <input type="hidden" name="tugas_id" id="tugas_id">
                    <input type="hidden" name="dinilai" id="dinilai" value="Dinilai">
                        <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="nilai">Nilai</label>
                            <div class="col-sm-9"><input type="text" class="form-control" id="nilai" name="nilai" placeholder="Masukan Nilai" value="" maxlength="50" required="">
                                </div>
                        </div>
                        <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="keterangan">Komentar</label>
                            <div class="col-sm-9"><input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukan Komentar" value="" maxlength="50" required="">
                                </div>
                        </div>
                        <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="">Aktif Diskusi</label>
                            <div class="col-sm-9">
                                <div>
                                    <div class="custom-radio custom-control custom-control-inline"><input type="radio" id="aktif" value="Aktif" name="diskusi" class="custom-control-input"><label class="custom-control-label"
                                        for="aktif">Aktif</label></div>
                                    <div class="custom-radio custom-control custom-control-inline"><input type="radio" id="tidak" Value="Tidak" name="diskusi" class="custom-control-input"><label class="custom-control-label"
                                        for="tidak">Tidak</label></div>
                                </div>
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