<div class="modal fade" id="modalImport" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading">Import Siswa</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('siswa.import')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="position-relative row form-group"><label class="col-sm-3 col-form-label" for="ortu">Pilih File</label>
                        <div class="col-sm-9"><input type="file" name="file" required="required">
                            </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary"><i class="metismenu-icon pe-7s-upload"></i> Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>