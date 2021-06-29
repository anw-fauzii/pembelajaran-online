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
                        <div class="position-relative row form-group"><label class="col-sm-4 col-form-label" for="kelas_id">Kelas</label>
                            <div class="col-sm-8">
                                <select name="kelas_id" id="kelas_id" class="form-control">
                                    <option disable="true" selected="true" disabled>--- Pilih Kelas ---</option>
                                        @foreach ($kelas as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="position-relative row form-group"><label class="col-sm-4 col-form-label" for="mapel_id">Mata Pelajaran</label>
                            <div class="col-sm-8">
                                <select name="mapel_id" id="mapel_id" class="form-control">
                                    <option disable="true" selected="true" disabled>--- Pilih Mapel ---</option>
                                        @foreach ($mapel as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="position-relative row form-group"><label class="col-sm-4 col-form-label" for="guru_id">Guru</label>
                            <div class="col-sm-8">
                                <select name="guru_id" id="guru_id" class="form-control">
                                    <option disable="true" selected="true" disabled>--- Pilih Guru ---</option>
                                        @foreach ($guru as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="position-relative row form-group"><label class="col-sm-4 col-form-label" for="hari">Hari</label>
                            <div class="col-sm-8">
                                <select name="hari" id="hari" class="form-control">
                                    <option disable="true" selected="true" disabled>--- Pilih Hari ---</option>
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jumat</option>
                                        <option value="Sabtu">Sabtu</option>
                                </select>
                            </div>
                        </div>
                        <div class="position-relative row form-group"><label class="col-sm-4 col-form-label" for="jam_mulai">Jam Mulai</label>
                            <div class="col-sm-8"><input type="time" class="form-control" id="jam_mulai" name="jam_mulai" placeholder="Masukan Jurusan" value="" maxlength="50" required="">
                                </div>
                        </div>
                        <div class="position-relative row form-group"><label class="col-sm-4 col-form-label" for="jam_selesai">Jam Selesai</label>
                            <div class="col-sm-8"><input type="time" class="form-control" id="jam_selesai" name="jam_selesai" placeholder="Masukan Jurusan" value="" maxlength="50" required="">
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