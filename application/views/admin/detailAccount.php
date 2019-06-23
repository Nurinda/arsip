<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-body">
        <form method="post">

          <div class="row">
            <div class="col-md-3 pr-1">
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" value="<?php echo "@".$content['account']->username; ?>" disabled>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" class="form-control" value="<?php echo $content['account']->fullname; ?>" disabled>
              </div>
            </div>
            <div class="col-md-5 pl-1">
              <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" value="<?php echo $content['account']->email; ?>" disabled>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-3 pr-1">
              <div class="form-group">
                <label>Lembaga / Institusi </label>
                <input type="text" class="form-control" value="<?php echo $content['account']->institute; ?>" disabled>
              </div>
            </div>

            <div class="col-md-9 pl-1">
              <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" value="<?php echo $content['account']->address; ?>" disabled>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 pr-1">
              <div class="form-group">
                <label>Kapasitas Awal</label>
                <input type="text" class="form-control" value="<?php echo $content['account']->capacity.' data '; ?>" disabled>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Kapasitas Digunakan</label>
                <input type="text" class="form-control" value="<?php echo $content['account']->storage_used.' data '; ?>" disabled>
              </div>
            </div>
            <div class="col-md-4 pl-1">
              <div class="form-group">
                <label>Kapasitas Tersedia</label>
                <input type="text" class="form-control" value="<?php echo $content['account']->storage_available.' data '; ?>" disabled>
              </div>
            </div>
          </div>


          <div class="button-container">
            <a href="<?php echo base_url('account'); ?>"><button type="button" class="btn btn-grey">Kembali</button></a>
            <button type="submit" class="btn btn-info" name="resetPassword" value="resetPassword">Reset password</button>
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#extend">Extend Kapasitas</button>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Hapus Akun</button>
          </div>
        </form>
      </div>
    </div>

  </div>
  <div class="col-md-4">
    <div class="card card-user">
      <div class="image">
        <img src="<?php echo base_url('./assets/upload/'.$content['account']->display_picture); ?>"  style="width: auto !important;height: auto !important;max-width: 100%;">
      </div>
      <div class="card-body">
        <center>
          <h5 ><?php echo $content['account']->fullname; ?></h5>
          <h6><?php echo "@".$content['account']->username ?></h6>
        </center>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <button class="btn btn-info" data-toggle="modal" data-target="#myModal1">Pencarian</button>
        <table class="table">
          <thead>
            <tr>
              <th class="text-center">No</th>
              <th class="text-center">Judul</th>
              <th class="text-center">Status</th>
              <th class="text-center">Opsi</th>
            </tr>
          </thead>
          <?php $no = 1; foreach ($content['archive'] as $item): if($item->id_contributor != $content['account']->id) {continue;}?>
            <tr>
              <td align="center"><?php echo $no; ?> </td>
              <td align="center"><?php echo $item->title; ?> </td>
              <td align="center"><?php if($item->status==1){echo 'Dipinjam';} else {echo 'Tersedia';} ?></td>
              <td align="center"><a href="<?php echo base_url('detailArchive/'.$item->id);?>" class="btn btn-warning">Detail</a> </td>
            </tr>
            <?php $no++; endforeach; ?>
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
          <h5 class="modal-title" id="exampleModalLabel">Hapus Akun ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Apabila anda sudah yakin menghapus akun ini? silahkan lanjutkan dengan memasukan password akun anda</p>
          <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Masukan password akun anda" value=""  required>
          </div>
        </div>

        <div class="modal-footer modal-danger">
          <button type="submit" class="btn btn-danger" name="deleteAccount" value="deleteAccount">Hapus Akun</button>
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
          <h5 class="modal-title" id="exampleModalLabel">Pencarian Dokumen</h5>
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
<div class="modal fade" id="extend" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form  method="post" >
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Kapasistas Entri Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Besaran Kapasitas</label>
            <input type="text" name="capacity" class="form-control" placeholder="Masukan kapasistas tambahan" value="<?php echo $content['account']->capacity; ?>">
          </div>
        </div>

        <div class="modal-footer modal-danger">
          <button type="submit" class="btn btn-warning" name="updateCapacity" value="updateCapacity">Update Kapasitas</button>
          <button type="button" class="btn btn-grey" data-dismiss="modal">Kembali</button>
        </div>
      </div>
    </form>
  </div>
</div>
