<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Buat Tugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('tugas.store') }}" method="post" enctype="multipart/form-data"> 
                    @csrf
                    @method('post')
                    <input type="hidden" name="tugas_id" id="statusa">
                    <input type="hidden"  id="tugas">
                    <div class="position-relative row form-group"><label class="col-sm-2 col-form-label" for="judul">Status</label>
                            <div class="col-sm-10"><strong><h4 class="status" id="status"></h4></strong>
                        </div>
                    </div>
                    <div class="position-relative row form-group"><label class="col-sm-2 col-form-label" for="judul">Judul</label>
                            <div class="col-sm-10">Pertemuan <span id="pertemuan"></span> - <span id="judul"></span>
                        </div>
                    </div>
                    <div class="position-relative row form-group lihat" id="lihat"><label class="col-sm-2 col-form-label" for="judul">Tugas Anda</label>
                            <div class="col-sm-10"><span id="beres"></span>
                        </div>
                    </div>
                    <div class="position-relative row form-group"><label class="col-sm-2 col-form-label" for="materi">Materi</label>
                            <div class="col-sm-10"><input type="file" id="tugas" name="tugas" placeholder="Masukan Jurusan" required="">
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm">
                    <i class="pe-7s-paper-plane"></i> Upload
                </button>
                </form>
            </div>
        </div>
    </div>
</div>