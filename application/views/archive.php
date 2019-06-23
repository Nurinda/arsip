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
