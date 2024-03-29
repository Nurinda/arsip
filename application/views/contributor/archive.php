<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card card-nav-tabs card-plain">
        <div class="card-header card-header-warning">
          <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
              <ul class="nav nav-tabs" data-tabs="tabs">
                <li class="nav-item"><a class="nav-link active" href="#all" data-toggle="tab"><i class="material-icons">supervisor_account</i>Semua Arsip</a></li>
                <li class="nav-item"><a class="nav-link" href="#contributorOnly" data-toggle="tab"><i class="material-icons">person</i>Arsip Kontributor</a>
                  <li class="nav-item"><a class="nav-link" href="#addArchive" data-toggle="tab"><i class="material-icons">add_box</i>Tambah Arsip</a>

                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body ">
              <div class="tab-content text-justify">
                <div class="tab-pane active" id="all">
                  <div class="card-body">
                    <button class="btn btn-info" data-toggle="modal" data-target="#myModal1">Pencarian</button>
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="text-center">No</th>
                          <th class="text-center">Judul</th>
                          <th class="text-center">Instansi</th>
                          <th class="text-center">Status</th>
                          <th class="text-center">Opsi</th>
                        </tr>
                      </thead>
                      <?php $no = 1; foreach ($content['video'] as $item):?>
                        <tr>
                          <td align="center"><?php echo $no; ?> </td>
                          <td align="center"><?php echo $item->title; ?> </td>
                          <td align="center"><?php echo $item->institute; ?></td>
                          <td align="center"><?php if($item->status==1){echo 'Dipinjam';} else {echo 'Tersedia';} ?></td>
                          <td align="center"><a href="<?php echo base_url('detailArchive/'.$item->id);?>" class="btn btn-warning"><i class="material-icons">book</i>&nbsp;&nbsp; Detail</a><button type="button" class="btn btn-success" data-toggle="modal" data-target="#viewVideo<?php echo $item->id; ?>"><i class="material-icons">play_arrow</i>&nbsp;&nbsp; Lihat Video</button> </td>
                        </tr>
                        <?php $no++; endforeach; ?>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane" id="contributorOnly">
                    <div class="card-body">
                      <button class="btn btn-info" data-toggle="modal" data-target="#myModal1">Pencarian</button>
                      <table class="table">
                        <thead>
                          <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Judul</th>
                            <th class="text-center">Instansi</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Opsi</th>
                          </tr>
                        </thead>
                        <?php $no = 1; foreach ($content['video'] as $item): if($item->id_contributor!=$this->session->userdata['id']){continue;}?>
                          <tr>
                            <td align="center"><?php echo $no; ?> </td>
                            <td align="center"><?php echo $item->title; ?> </td>
                            <td align="center"><?php echo $item->institute; ?></td>
                            <td align="center"><?php if($item->status==1){echo 'Dipinjam';} else {echo 'Tersedia';} ?></td>
                            <td align="center"><a href="<?php echo base_url('detailArchive/'.$item->id);?>" class="btn btn-warning"><i class="material-icons">book</i>&nbsp;&nbsp; Detail</a><button type="button" class="btn btn-success" data-toggle="modal" data-target="#viewVideo<?php echo $item->id; ?>"><i class="material-icons">play_arrow</i>&nbsp;&nbsp; Lihat Video</button> </td>
                          </tr>
                          <?php $no++; endforeach; ?>
                        </table>
                      </div>
                    </div>
                    <div class="tab-pane" id="addArchive">
                      <div class="card-body">
                        <form  method="post">
                                <div class="row">
                                  <div class="col-md-11">
                                    <div class="form-group">
                                      <label>Judul Video</label>
                                      <input type="text" name="title" class="form-control" placeholder="Masukan judul video " value="" required>
                                    </div>
                                  </div>
                                  <div class="col-md-1">
                                    <div class="form-group">
                                      <label>No.</label>
                                      <input type="text" name="video_number" class="form-control" placeholder="Masukan nomor video " value="" required>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-12 pr-1">
                                    <div class="form-group">
                                      <label>Deskripsi Video</label>
                                      <textarea name="description" class="form-control" rows="3" cols="80" required></textarea>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label>Produser</label>
                                      <input type="text" name="producer" class="form-control" placeholder="Masukan nama produser" value="" required>
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label>Tanggal Produksi</label>
                                      <input type="text" name="production_date" class="form-control" placeholder="Masukan Tanggal Produksi" value="" required>
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label>Tempat Produksi</label>
                                      <input type="text" name="production_place" class="form-control" placeholder="Masukan Tempat Produksi" value="" required>
                                    </div>
                                  </div>

                                </div>
                                <div class="row">
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label>copyright</label>
                                      <input type="text" name="copyright" class="form-control" placeholder="Masukan copyright" value="" required>
                                    </div>
                                  </div>
                                  <div class="col-md-2">
                                    <div class="form-group">
                                      <label>Durasi Jam</label>
                                      <input type="text" name="duration_hour" class="form-control" value="" required>
                                    </div>
                                  </div>
                                  <div class="col-md-2">
                                    <div class="form-group">
                                      <label>Durasi Menit</label>
                                      <input type="text" name="duration_minute" class="form-control" value="" required>
                                    </div>
                                  </div>
                                  <div class="col-md-2">
                                    <div class="form-group">
                                      <label>Durasi Detik</label>
                                      <input type="text" name="duration_second" class="form-control" value="" required>
                                    </div>
                                  </div>
                                  <div class="col-md-2">
                                    <div class="form-group">
                                      <label>Tipe Data</label>
                                      <input type="text" name="filetype" class="form-control" placeholder="Masukan Tipe Data" value="" required>
                                    </div>
                                  </div>
                                  <div class="col-md-7">
                                    <div class="form-group">
                                      <label>Link Video</label>
                                      <input type="text" name="link" class="form-control" placeholder="Masukan alamat youtube" value="" required>
                                    </div>
                                  </div>
                                  <div class="col-md-5">
                                    <div class="form-group">
                                      <label>Tempat Penyimpanan</label>
                                      <input type="text" name="storage" class="form-control" placeholder="Masukan Tempat Penyimpanan Arsip" value="" required>
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
                                          <option value="<?php echo $item1->id; ?>"><?php echo $item->category.' - '.$item1->sub_category; ?></option>
                                        <?php endforeach; ?>
                                      <?php endforeach; ?>
                                      </select>
                                    </div>
                              </div>
                              </div>

                                <div class="button-container">
                                  <button type="submit" class="btn btn-success" name="addArchive" value="addArchive">Tambah Arsip</button>
                                </div>
                              </form>
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

        <?php $no = 1; foreach ($content['video'] as $item):?>

        <div class="modal fade" id="viewVideo<?php echo $item->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <form  method="post">
              <div class="modal-content">

                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Lihat Video</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <iframe width="100%" height="250px" src="https://www.youtube.com/embed/<?php echo $item->link; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>

                <div class="modal-footer modal-danger">
                  <button type="button" class="btn btn-grey" data-dismiss="modal">Kembali</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      <?php endforeach; ?>
