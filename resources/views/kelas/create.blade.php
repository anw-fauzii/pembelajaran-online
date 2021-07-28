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
                        <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="nama">Kelas</label>
                            <div class="col-sm-9"><input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Kelas" value="" maxlength="50" required="">
                                </div>
                        </div>
                        <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="jurusan_id">Jurusan</label>
                            <div class="col-sm-9">
                                <select name="jurusan_id" id="jurusan_id" class="form-control">
                                    <option disable="true" selected="true" disabled>--- Pilih Jurusan ---</option>
                                        @foreach ($jurusan as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="angkatan">Angkatan</label>
                            <div class="col-sm-9"><input type="text" class="form-control" id="angkatan" name="angkatan" placeholder="Masukan Angkatan" value="" maxlength="50" required="">
                                </div>
                        </div>
                        <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="nama">Wali Kelas</label>
                            <div class="col-sm-9">
                                <select name="guru_id" id="guru_id" class="form-control">
                                    <option disable="true" selected="true" disabled>--- Pilih Wali Kelas ---</option>
                                        @foreach ($guru as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                </select>
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