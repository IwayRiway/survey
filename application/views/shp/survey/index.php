<!-- Main Content -->
<div class="main-content">
<section class="section">
    <div class="section-header">
    <h1><?=$judul?></h1>

        <div class="section-header-button">
            <a href="<?=base_url('shp/survey/create')?>" class="btn btn-primary">Add New</a>
        </div>

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
                            <?php $i=1; foreach($survey as $db):?>
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$db['nama']?></td>
                                    <td><?=$db['alamat']?></td>
                                    <td><?=$db['batas_waktu']?></td>
                                    <td><i class="fas fa-stop text-<?=$db['surveyed']==1?'success':'danger'?>"></i></td>
                                    <td><i class="fas fa-stop text-<?=$db['kuesioner']==1?'success':'danger'?>"></i></td>
                                    <td>
                                        <a href="<?=base_url('shp/survey/survey/')?><?=$db['id']?>" class="btn btn-icon btn-sm btn-success mr-2" title="Survey"><i class="fas fa-check"></i></a>

                                        <?php if($db['surveyed']==1 AND $db['kuesioner']==0):?>
                                            <a href="<?=base_url('survey/detail/')?><?=$db['id']?>" class="btn btn-icon btn-sm btn-info mr-2" title="Kuesioner"><i class="fas fa-edit"></i></a>
                                        <?php endif?>
                                    </td>
                                </tr>
                            <?php endforeach?>
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
