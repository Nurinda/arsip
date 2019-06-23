<div class="card">
  <div class="card-body">
    <form method="post">
      <div class="form-group">
        <label>Nama Sub Kategori</label>
        <input type="text" name="sub_category" class="form-control" placeholder="Masukan nama sub kategori" value="<?php echo $content['detail']->sub_category;?>">
      </div>
      <div class="form-group">
        <label>Nomor Sub Kategori</label>
        <input type="text" name="id" class="form-control" placeholder="Masukan id sub kategori" value="<?php echo $content['detail']->id;?>">
      </div>


      <div class="button-container">
        <a href="<?php echo base_url('category'); ?>" class="btn btn-grey">Kembali</a>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteSubcategory">Hapus sub kategori</button>
        <button type="submit" name="updateSubcategory" value="updateSubcategory" class="btn btn-info">Update Sub Kategori</button>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="deleteSubcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form  method="post">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus sub kategori ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Apakah anda sudah yakin menghapus sub kategori ini? silahkan lanjutkan dengan memasukan password akun anda</p>
          <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Masukan password akun anda" value=""  required>
          </div>
        </div>

        <div class="modal-footer modal-danger">
          <button type="submit" class="btn btn-danger" name="deleteSubcategory" value="deleteSubcategory">Hapus sub kategori</button>
          <button type="button" class="btn btn-grey" data-dismiss="modal">Kembali</button>
        </div>
      </div>
    </form>
  </div>
</div>
