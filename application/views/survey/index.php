<!-- Main Content -->
<div class="main-content">
<section class="section">
    <div class="section-header">
    <h1><?=$judul?></h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#"><?=$judul?></a></div>
        </div>
    </div>

    <div class="section-body">
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                    
                    <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Store</th>
                                <th>Alamat</th>
                                <th>Batas Waktu</th>
                                <th>Surveyed</th>
                                <th>Kuesioner</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <?php $i=1; foreach($kuesioner as $db):?>
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$db['nama']?></td>
                                    <td><?=$db['jumlah']?></td>
                                    <td>
                                        <a href="<?=base_url('kuesioner/detail/')?><?=$db['id']?>" class="btn btn-icon btn-sm btn-info mr-2" title="Detail"><i class="fas fa-eye"></i></a>
                                        <a href="<?=base_url('kuesioner/edit/')?><?=$db['id']?>" class="btn btn-icon btn-sm btn-success mr-2" title="Edit"><i class="fas fa-edit"></i></a>
                                        <a href="<?=base_url('kuesioner/deleteAll/')?><?=$db['id']?>" class="btn btn-icon btn-sm btn-danger mr-2 tombol-hapus" title="Delete"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach?> -->
                        </tbody>
                    </table>
                    </div>
                    
                    <h6>Keterangan :</h6>
                    <p><i class="fas fa-stop text-success"></i> Selesai</p>
                    <p style="margin-top:-20px"><i class="fas fa-stop text-danger"></i> Belum Selesai</p>
                    </div>
                </div>
            </div>
        </div>


    </div>

</section>
</div>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
