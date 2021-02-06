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

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="<?=base_url('setting/update')?>" enctype="multipart/form-data">
                            <input type="hidden" name="id" id="id" value="<?=$setting['id']?>">
                            
                            <div class="row">
                                <div class="form-group col-sm-12">
                                <label for="maks_perhari">Maksimal Per-user Perhari</label>
                                <input id="maks_perhari" type="number" class="form-control" name="maks_perhari" required value="<?=$setting['maks_perhari']?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-sm-12">
                                <label for="maks_perbulan">Maksimal Per-user Perbulan</label>
                                <input id="maks_perbulan" type="number" class="form-control" name="maks_perbulan" required value="<?=$setting['maks_perbulan']?>">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="maks_survey">Maksimal Store Disurvey Perbulan</label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="maks_survey" value=1 class="selectgroup-input" <?=$setting['maks_survey']==1?'checked':''?>>
                                            <span class="selectgroup-button">1 ( Satu ) Kali</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="maks_survey" value=2 class="selectgroup-input" <?=$setting['maks_survey']==2?'checked':''?>>
                                            <span class="selectgroup-button">2 ( Dua ) Kali</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-center">
                                <button class="btn btn-primary mr-1" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

</section>
</div>
