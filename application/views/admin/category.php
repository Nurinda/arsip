<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Tambahkan Kategori Baru</button>
        <button class="btn btn-info" data-toggle="modal" data-target="#myModal1">Pencarian</button>

        <table class="table">
          <thead>
            <tr>
              <th class="text-center">Kode</th>
              <th class="text-center">Kategori</th>
              <th class="text-center">Jumlah Sub kategori</th>
              <th class="text-center">Opsi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; foreach ($content['category'] as $item): ?>
              <tr>
                <td class="text-center"><?php echo $item->id; ?></td>
                <td class="text-center"><?php echo $item->category; ?></td>
                <td class="text-center"><?php echo $item->sub_count; ?></td>
                <td class="td-actions text-center">
                  <center>
                    <a href="<?php echo base_url('detailCategory/'.$item->id); ?>">
                      <button type="button" rel="tooltip" class="btn btn-info">
                        <i class="material-icons">library_books</i>&nbsp;&nbsp;Detail
                      </button>
                    </a>
                  </center>
                </td>
                <?php $i++; endforeach; ?>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form  method="post">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambahkan Kategori Baru</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Kode</label>
              <input type="text" name="id" class="form-control" placeholder="Masukan kode kategori" value="">
            </div>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Nama Kategori</label>
              <input type="text" name="category" class="form-control" placeholder="Masukan nama kategori" value="">
            </div>
          </div>

          <div class="modal-footer modal-danger">
            <button type="submit" class="btn btn-warning" name="createCategory" value="createCategory">Buat Kategori Baru</button>
            <button type="button" class="btn btn-grey" data-dismiss="modal">Kembali</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form  method="post" >
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Pencarian Akun</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Kata Kunci</label>
              <input type="text" name="keyword" class="form-control" placeholder="Masukan kata kunci" value="">
            </div>
          </div>

          <div class="modal-footer modal-danger">
            <button type="submit" class="btn btn-warning" name="search" value="search">Cari</button>
            <button type="button" class="btn btn-grey" data-dismiss="modal">Kembali</button>
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
          <button type="submit" class="btn btn-danger" name="deleteArchive" value="deleteArchive" <?php if(!$this->session->userdata['login']){echo 'hidden';} ?>>Hapus Arsip</button>
          <button type="button" class="btn btn-grey" data-dismiss="modal">Kembali</button>
        </div>
      </div>
    </form>
  </div>
</div>