<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <button class="btn btn-info" data-toggle="modal" data-target="#myModal1">Pencarian</button>
        <table class="table">
          <thead>
            <tr>
              <th class="text-center">Judul</th>
              <th class="text-center">Id</th>
              <th class="text-center">Link</th>
              <th class="text-center">Status</th>
              <!-- <th class="text-center">Format</th>
              <th class="text-center">Tahun Diciptakan</th>
              <th class="text-center">Tokoh</th>
              <th class="text-center">Deskripsi</th>
              <th class="text-center">Asal</th>
              <th class="text-center">Cipta</th>
              <th class="text-center">Deskriptor</th>
              <th class="text-center">Tanggal Deskripsi</th>
              <th class="text-center">Tahun Alih Media</th>
              <th class="text-center">No Boks</th> -->
            </tr>
          </thead>
                      
            <?php $i = 1; foreach ($content['video'] as $item):?>
            <tr>
    <!-- <td align="center"><?php echo $no++; ?></td> -->
    <td align="center"><?php echo $item->judul; ?> </td>
    <td align="center"><?php echo $item->id; ?> </td>
    <td align="center"><?php echo $item->link; ?></td>
    <td align="center"><?php echo $item->status; ?></td>
    
  </tr>
    <?php $i++; endforeach; ?>
        </table>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form  method="post" enctype="multipart/form-data">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambahkan Dokumen Baru</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Nama Dokumen</label>
              <input type="text" name="document_name" class="form-control" placeholder="Masukan nama file" value="">
            </div>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Informasi</label>
              <input type="text" name="document_info" class="form-control" placeholder="Masukan Informasi" value="">
            </div>
          </div>
          <div class="modal-body">

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
