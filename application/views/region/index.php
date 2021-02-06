<!-- Main Content -->
<div class="main-content">
<section class="section">
    <div class="section-header">
    <h1><?=$judul?></h1>
        <div class="section-header-button">
            <a href="<?=base_url('region/create')?>" class="btn btn-primary">Add New</a>
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
                                <th>Nama</th>
                                <th>Supervisor</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; foreach($region as $db):?>
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$db['nama']?></td>
                                    <td><?=$db['supervisor']?></td>
                                    <td>
                                        <a href="<?=base_url('region/edit/')?><?=$db['id']?>" class="btn btn-icon btn-sm btn-success mr-2" title="Edit"><i class="fas fa-edit"></i></a>
                                        <a href="<?=base_url('region/delete/')?><?=$db['id']?>" class="btn btn-icon btn-sm btn-danger mr-2 tombol-hapus" title="Delete"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach?>
                        </tbody>
                    </table>
                    </div>

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
