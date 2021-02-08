<!-- Main Content -->
<div class="main-content">
<section class="section">
    <div class="section-header">
    <h1><?=$judul?></h1>
        <div class="section-header-button">
            <a href="<?=base_url('survey/create')?>" class="btn btn-primary">Add New</a>
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
                                <th>Surveyor</th>
                                <th>Surveyed</th>
                                <th>Kuesioner</th>
                                <th>Survey Ke-</th>
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
                                    <td><?=$db['surveyor']?></td>
                                    <td><i class="fas fa-stop text-<?=$db['surveyed']==1?'success':'danger'?>"></i></td>
                                    <td><i class="fas fa-stop text-<?=$db['kuesioner']==1?'success':'danger'?>"></i></td>
                                    <td><?=$db['survey']?></td>
                                    <td>
                                        <?php if($db['surveyed'] !=1 AND $db['batas_waktu']>date('Y-m-d')):?>
                                            <a href="<?=base_url('survey/delete/')?><?=$db['id']?>" class="btn btn-icon btn-sm btn-danger mr-2 tombol-hapus" title="Delete"><i class="fas fa-trash"></i></a>
                                        <?php endif?>
                                        <?php if($db['surveyed'] ==1 AND $db['kuesioner'] ==1):?>
                                            <a href="<?=base_url('survey/report/')?><?=$db['id']?>" class="btn btn-icon btn-sm btn-info mr-2" title="File Pdf" target="_blank"><i class="fas fa-file-pdf"></i></a>
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
