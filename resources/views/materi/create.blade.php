<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Tugas dan Materi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('materi.store') }}" method="post" enctype="multipart/form-data"> 
                    @csrf
                    @method('post')
                    <input type="hidden" id="materi_id" name="materi_id">
                    <div class="position-relative row form-group"><label class="col-sm-2 col-form-label" for="pertemuan">Pertemuan</label>
                            <div class="col-sm-10"><input type="text" class="form-control" id="pertemuan" name="pertemuan" placeholder="Masukan Pertemuan" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="position-relative row form-group"><label class="col-sm-2 col-form-label" for="judul">Judul</label>
                            <div class="col-sm-10"><input type="text" class="form-control" id="judul" name="judul" placeholder="Masukan Judul" maxlength="" required="">
                        </div>
                    </div>
                    <div class="position-relative row form-group"><label class="col-sm-2 col-form-label" for="keterangan">Deskripsi</label>
                            <div class="col-sm-10"><textarea type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukan Deskripsi" required=""></textarea>
                        </div>
                    </div>
                    <div class="position-relative row form-group"><label class="col-sm-2 col-form-label" for="jadwal_id">Kelas</label>
                        <div class="col-sm-10">
                            <select multiple id='myselect' class="multiselect-dropdown form-control" type="select" name="jadwal_id[]">
                                @foreach ($jadwal as $p)
                                    <option value="{{ $p->id }}">{{ $p->kelas->nama }}-{{ $p->mapel->nama_mapel }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="position-relative row form-group"><label class="col-sm-2 col-form-label" for="materi">Materi</label>
                        <div class="col-sm-10">
                            <div class="table-responsive">  
                                <table id="dynamic_field">  
                                    <tr>  
                                        <td width="90%"><input type="file" name="materi[]" placeholder="Enter your Name"></td>  
                                        <td width="10%"><button type="button" name="add" id="add" class="btn btn-success btn-sm">Tambah</button></td>  
                                    </tr>  
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm">
                                <i class="pe-7s-paper-plane"></i> Simpan
                            </button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function(){      
      var postURL = "<?php echo url('addmore'); ?>";
      var i=1;  


      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="file" name="materi[]" placeholder="Enter your Name"></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn-sm btn_remove">hapus</button></td></tr>');  
      });  


      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
    });
</script>