<div class="card">
  <div class="card-body">
    <form method="post">
      <div class="row">
        <div class="col-md-11">
          <div class="form-group">
            <label>Judul Video</label>
            <input type="text" name="title" class="form-control" placeholder="Masukan judul video " value="<?php echo $content['detail']->title; ?>" required>
          </div>
        </div>
        <div class="col-md-1">
          <div class="form-group">
            <label>No.</label>
            <input type="text" name="video_number" class="form-control" placeholder="Masukan nomor video " value="<?php echo $content['detail']->video_number; ?>" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 pr-1">
          <div class="form-group">
            <label>Deskripsi Video</label>
            <textarea name="description" class="form-control" rows="3" cols="80" required><?php echo $content['detail']->description; ?></textarea>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label>Produser</label>
            <input type="text" name="producer" class="form-control" placeholder="Masukan nama produser" value="<?php echo $content['detail']->producer; ?>" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Tanggal Produksi</label>
            <input type="text" name="production_date" class="form-control" placeholder="Masukan Tanggal Produksi" value="<?php echo $content['detail']->production_date; ?>" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Tempat Produksi</label>
            <input type="text" name="production_place" class="form-control" placeholder="Masukan Tempat Produksi" value="<?php echo $content['detail']->production_place; ?>" required>
          </div>
        </div>

      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label>copyright</label>
            <input type="text" name="copyright" class="form-control" placeholder="Masukan copyright" value="<?php echo $content['detail']->copyright; ?>" required>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label>Durasi Jam</label>
            <input type="text" name="duration_hour" class="form-control" value="<?php echo $content['detail']->duration_hour; ?>" required>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label>Durasi Menit</label>
            <input type="text" name="duration_minute" class="form-control" value="<?php echo $content['detail']->duration_minute; ?>" required>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label>Durasi Detik</label>
            <input type="text" name="duration_second" class="form-control" value="<?php echo $content['detail']->duration_second; ?>" required>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label>Tipe Data</label>
            <input type="text" name="filetype" class="form-control" placeholder="Masukan Tipe Data" value="<?php echo $content['detail']->filetype; ?>" required>
          </div>
        </div>
        <div class="col-md-7">
          <div class="form-group">
            <label>Link Video</label>
            <input type="text" name="link" class="form-control" placeholder="Masukan alamat youtube" value="<?php echo $content['detail']->link; ?>" required>
          </div>
        </div>
        <div class="col-md-5">
          <div class="form-group">
            <label>Tempat Penyimpanan</label>
            <input type="text" name="storage" class="form-control" placeholder="Masukan Tempat Penyimpanan Arsip" value="<?php echo $content['detail']->storage; ?>" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label>Kategori Video</label>
            <select class="js-example-1" name="sub_category">
              <option value="0" disabled >Silahkan Pilih</option>
              <?php foreach ($content['category'] as $item): ?>
                <?php foreach ($content['sub_category'] as $item1): if($item1->id_category!=$item->id){continue;}?>
                  <option value="<?php echo $item1->id; ?>" <?php if($item1->id == $content['detail']->sub_category){echo 'selected';} ?>><?php echo $item->category.' - '.$item1->sub_category; ?></option>
                <?php endforeach; ?>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
      </div>

      <div class="button-container">
        <a href="<?php echo base_url('detailArchive/'.$content['detail']->id); ?>" class="btn btn-grey">Kembali</a>
        <button type="submit" class="btn btn-warning" value="updateArchive" name="updateArchive">Update Arsip</button>

      </div>
    </form>
  </div>
</div>
