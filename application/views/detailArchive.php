<div class="card">
  <div class="card-body">
    <form method="post">
      <div class="row">
        <div class="col-md-11">
          <div class="form-group">
            <label>Judul Video</label>
            <input type="text" name="title" class="form-control" placeholder="Masukan judul video " value="<?php echo $content['detail']->title; ?>" disabled>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-group">
            <label>No.</label>
            <input type="text" name="video_number" class="form-control" placeholder="Masukan nomor video " value="<?php echo $content['detail']->video_number; ?>" disabled>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 pr-1">
          <div class="form-group">
            <label>Deskripsi Video</label>
            <textarea name="description" class="form-control" rows="3" cols="80" disabled><?php echo $content['detail']->description; ?></textarea>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label>Produser</label>
            <input type="text" name="producer" class="form-control" placeholder="Masukan nama produser" value="<?php echo $content['detail']->producer; ?>" disabled>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label>Tanggal Produksi</label>
            <input type="text" name="production_date" class="form-control" placeholder="Masukan Tanggal Produksi" value="<?php echo $content['detail']->production_date; ?>" disabled>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label>Tempat Produksi</label>
            <input type="text" name="production_place" class="form-control" placeholder="Masukan Tempat Produksi" value="<?php echo $content['detail']->production_place; ?>" disabled>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>copyright</label>
            <input type="text" name="copyright" class="form-control" placeholder="Masukan copyright" value="<?php echo $content['detail']->copyright; ?>" disabled>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label>Durasi</label>
            <input type="text" name="durasi" class="form-control" value="<?php echo $content['detail']->duration_hour.' Jam, '.$content['detail']->duration_minute.' Menit, '.$content['detail']->duration_second.' Detik'; ?>" disabled>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label>Tipe Data</label>
            <input type="text" name="filetype" class="form-control" placeholder="Masukan Tipe Data" value="<?php echo $content['detail']->filetype; ?>" disabled>
          </div>
        </div>
        <div class="col-md-7">
          <div class="form-group">
            <label>Link Video</label>
            <input type="text" name="link" class="form-control" placeholder="Masukan alamat youtube" value="<?php echo $content['detail']->link; ?>" disabled>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-2">
          <div class="form-group">
            <label>PIC</label>
            <input type="text" name="contributor" class="form-control" value="<?php echo $content['detail']->contributor; ?>" disabled>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Pencipta Arsip</label>
            <input type="text" name="institute" class="form-control" placeholder="Masukan nama institusi" value="<?php echo $content['detail']->institute; ?>" disabled>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Tempat Penyimpanan</label>
            <input type="text" name="storage" class="form-control" placeholder="Masukan Tempat Penyimpanan Arsip" value="<?php echo $content['detail']->storage; ?>" disabled>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label>Update Terakhir</label>
            <input type="text" name="entry_date" class="form-control" value="<?php echo $content['detail']->entry_date; ?>" disabled>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label>Status</label>
            <input type="text" name="status" class="form-control" value="<?php if($content['detail']->status==1){echo 'Dipinjam';} else {echo 'Tersedia';} ?>" disabled>
          </div>
        </div>
      </div>

      <div class="button-container">
        <a href="<?php echo base_url('archive'); ?>" class="btn btn-grey">Kembali</a>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form  method="post" enctype="multipart/form-data">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Upload Foto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <p>Silahkan upload foto anda dengan ukuran file maksimal 200kb</p>
          <div class="md-form">
            <div class="file-field">
              <div class="btn btn-primary btn-sm float-left">
                <span>Choose file</span>
                <input type="file" name="fileUpload">
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer modal-danger">
          <button type="submit" class="btn btn-warning" name="uploadFile" value="uploadFile">Upload</button>
          <button type="submit" class="btn btn-danger" name="deleteFile" value="deleteFile">Hapus Foto</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="deleteArchive" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form  method="post">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Arsip ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Apakah anda sudah yakin menghapus arsip ini? silahkan lanjutkan dengan memasukan password akun anda</p>
          <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Masukan password akun anda" value=""  required>
          </div>
        </div>

        <div class="modal-footer modal-danger">
          <button type="submit" class="btn btn-danger" name="deleteArchive" value="deleteArchive">Hapus Arsip</button>
          <button type="button" class="btn btn-grey" data-dismiss="modal">Kembali</button>
        </div>
      </div>
    </form>
  </div>
</div>
