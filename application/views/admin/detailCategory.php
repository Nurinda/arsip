<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card card-nav-tabs card-plain">
        <div class="card-header card-header-warning">
          <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
              <ul class="nav nav-tabs" data-tabs="tabs">
                <li class="nav-item"><a class="nav-link active" href="#info" data-toggle="tab"><i class="material-icons">supervisor_account</i>Informasi Umum</a></li>
                <li class="nav-item"><a class="nav-link" href="#subcategory" data-toggle="tab"><i class="material-icons">supervisor_account</i>Sub Kategori</a></li>

              </ul>
            </div>
          </div>
        </div>
        <div class="card-body ">
          <div class="tab-content text-justify">


            <div class="active tab-pane" id="info">
              <div class="card-body">
                <form  method="post">
                  <div class="row">
                    <div class="col-md-7">
                      <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" name="category" class="form-control" placeholder="Masukan nama kategori " value="<?php echo $content['detail']->category; ?>" required>
                      </div>
                    </div>
                    <div class="col-md-5">
                      <div class="form-group">
                        <label>Kode</label>
                        <input type="text" name="id" class="form-control" placeholder="Masukan id kategori " value="<?php echo $content['detail']->id; ?>" required>
                      </div>
                    </div>
                  </div>
                  <div class="button-container">
                    <button type="submit" class="btn btn-success" name="updateCategory" value="updateCategory">Update Kategori</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletecategory">Hapus kategori</button>
                  </div>
                </form>
              </div>
            </div>

            <div class="tab-pane" id="subcategory">
              <div class="card-body">
                <button class="btn btn-info" data-toggle="modal" data-target="#myModal1">Pencarian</button>
                <button class="btn btn-info" data-toggle="modal" data-target="#myModal2">Tambah Sub Kategori</button>

                <table class="table">
                  <thead>
                    <tr>
                      <th class="text-center">Kode</th>
                      <th class="text-center">Sub Kategori</th>
                      <th class="text-center">Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; foreach ($content['subcategory'] as $item): ?>
                      <tr>
                        <td class="text-center"><?php echo $item->id; ?></td>
                        <td class="text-center"><?php echo $item->sub_category; ?></td>
                        <td class="td-actions text-center">
                          <center>
                            <a href="<?php echo base_url('detailSubcategory/'.$item->id); ?>">
                              <button type="button" rel="tooltip" class="btn btn-info">
                                <i class="material-icons">person</i>Detail
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

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form  method="post" >
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pencarian</h5>
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

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form  method="post" >
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Buat Sub Kategori Baru</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Sub Kategori</label>
            <input type="text" name="sub_category" class="form-control" placeholder="Masukan kata kunci" value="">
          </div>
          <div class="form-group">
            <label>Nomor Sub Kategori</label>
            <input type="text" name="id" class="form-control" placeholder="<?php echo $content['detail']->id[0].' X X';?>" value="">
          </div>

        </div>

        <div class="modal-footer modal-danger">
          <button type="submit" class="btn btn-warning" name="createSubcategory" value="createSubcategory">Buat</button>
          <button type="button" class="btn btn-grey" data-dismiss="modal">Kembali</button>
        </div>
      </div>
    </form>
  </div>
</div>

<div class="modal fade" id="deletecategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form  method="post">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus kategori ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Apakah anda sudah yakin menghapus  kategori ini? silahkan lanjutkan dengan memasukan password akun anda</p>
          <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Masukan password akun anda" value=""  required>
          </div>
        </div>

        <div class="modal-footer modal-danger">
          <button type="submit" class="btn btn-danger" name="deletecategory" value="deletecategory">Hapus kategori</button>
          <button type="button" class="btn btn-grey" data-dismiss="modal">Kembali</button>
        </div>
      </div>
    </form>
  </div>
</div>
