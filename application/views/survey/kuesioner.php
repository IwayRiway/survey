<!-- Main Content -->
<div class="main-content">
<section class="section">
    <div class="section-header">
    <h1>Detail Kuesioner</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Detail Kuesioner</a></div>
        </div>
    </div>

    <div class="section-body">
    <form action="<?=base_url('shp/survey/saveKuesioner')?>" method="post">
    <input type="hidden" name="id" id="id" value="<?=$store_survey?>">

        <?php foreach ($data as $key => $value):?>
        <h2 class="section-title"><?=$key?></h2>

        <?php foreach ($data[$key] as $key2 => $value2):?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h6><?=$key2?></h6>
                            <?php $i=0; foreach($data[$key][$key2] as $db):?>
                                <p><?=chr($i+65)?>. <?=$db['jawaban']?></p>
                            <?php $i++; endforeach?>
                            <div class="form-group col-sm-2">
                                <label class="form-label">Jawab : </label>
                                <div class="selectgroup w-100">
                                    <?php $i=0; foreach($data[$key][$key2] as $db):?>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="value<?=$db['pertanyaan_id']?>" value="" class="selectgroup-input">
                                        <span class="selectgroup-button"><?=chr($i+65)?></span>
                                    </label>
                                    <?php $i++; endforeach?>
                                </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach?>
        <?php endforeach?>
    </div>

</section>
</div>
