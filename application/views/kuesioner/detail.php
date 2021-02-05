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
        <h2 class="section-title"><?=$kategori['nama']?></h2>

        <?php foreach ($data as $key => $value):?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h6><?=$key?></h6>
                            <?php $i=0; foreach($data[$key] as $db):?>
                            <?//php for ($i=0; $i < count($data[$key]); $i++)?>
                            <p><?=chr($i+65)?>. <?=$db['jawaban']?> <strong><i class="fas fa-long-arrow-alt-right mx-2"></i></strong> <?=$db['skor']?></p>
                            <?php $i++; endforeach?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach?>

    </div>

</section>
</div>
