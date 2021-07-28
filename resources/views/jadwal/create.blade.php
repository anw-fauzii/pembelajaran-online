<div class="modal fade" id="modalEdit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeadingE"></h4>
            </div>
            <div class="modal-body">
                <form id="formEdit" name="formEdit" class="form-horizontal">
                    <div class="form-group">
                    <input type="hidden" name="id" id="id">
                        <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="guru_id">Guru</label>
                            <div class="col-sm-9">
                                <select name="guru_idE" id="guru_idE" class="form-control">
                                    <option disable="true" selected="true" disabled>--- Pilih Guru ---</option>
                                        @foreach ($guru as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="mapel_id">Mata Pelajaran</label>
                            <div class="col-sm-9">
                                <select name="mapel_idE" id="mapel_idE" class="form-control">
                                    <option disable="true" selected="true" disabled>--- Pilih Mapel ---</option>
                                        @foreach ($mapel as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="kelas_id">Kelas</label>
                            <div class="col-sm-9">
                                <select name="kelas_idE" id="kelas_idE" class="form-control">
                                    <option disable="true" selected="true" disabled>--- Pilih Kelas ---</option>
                                        @foreach ($kelas as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="tp">Tahun Ajaran</label>
                            <div class="col-sm-9"><input type="text" readonly class="form-control" id="tp" name="tp" placeholder="Masukan Angkatan" value="{{$tp->tp}}" maxlength="50" required="">
                                </div>
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="editBtn" value="create"><i class="metismenu-icon pe-7s-paper-plane"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalCreate" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="formCreate" name="formCreate" class="form-horizontal">
                    <div class="form-group">
                        <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="guru_id">Guru</label>
                            <div class="col-sm-9">
                                <select name="guru_id" id="guru_id" class="form-control">
                                    <option disable="true" selected="true" disabled>--- Pilih Guru ---</option>
                                        @foreach ($guru as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="mapel_id">Mata Pelajaran</label>
                            <div class="col-sm-9">
                                <select name="mapel_id" id="mapel_id" class="form-control">
                                    <option disable="true" selected="true" disabled>--- Pilih Mapel ---</option>
                                        @foreach ($mapel as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="kelas_id">Kelas</label>
                            <div class="col-sm-9">
                                <select multiple id='myselect' class="form-control" type="select" name="kelas_id[]" >
                                    @foreach ($kelas as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="tp">Tahun Ajaran</label>
                            <div class="col-sm-9"><input type="text" readonly class="form-control" id="tp" name="tp" placeholder="Masukan Angkatan" value="{{$tp->tp}}" maxlength="50" required="">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>