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

    <?php if($this->session->userdata('department_id')==10):?>
    <h2 class="section-title">Pengajuan Karyawan Baru</h2>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="<?=base_url('pengajuan/history')?>">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Total Pengajuan Karyawan</h4>
                        </div>
                        <div class="card-body">
                        <?=$total_pkb?>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="<?=base_url('pengajuan/pengajuan')?>">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-user-clock"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Pengajuan (Pending)</h4>
                        </div>
                        <div class="card-body">
                        <?=$pengajuan_pkb?>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Pengajuan (Accept)</h4>
                        </div>
                        <div class="card-body">
                        <?=$acc_pkb?>
                        </div>
                    </div>
                </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-user-times"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Pengajuan (Decline)</h4>
                        </div>
                        <div class="card-body">
                        <?=$dc_pkb?>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <?php endif?>

    <?php if($this->session->userdata('jabatan_id')==3):?>
    <h2 class="section-title">Pengajuan Cuti Staff</h2>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="<?=base_url('cuti/history')?>">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-calendar-alt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Total Pengajuan Cuti</h4>
                        </div>
                        <div class="card-body">
                        <?=$total_c?>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="<?=base_url('cuti/pengajuan')?>">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-calendar-minus"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Pengajuan (Pending)</h4>
                        </div>
                        <div class="card-body">
                        <?=$pengajuan_c?>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="far fa-calendar-check"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Pengajuan (Accept)</h4>
                        </div>
                        <div class="card-body">
                        <?=$acc_c?>
                        </div>
                    </div>
                </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-calendar-times"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Pengajuan (Decline)</h4>
                        </div>
                        <div class="card-body">
                        <?=$dc_c?>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <h2 class="section-title">Pengajuan Lembur Staff</h2>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="<?=base_url('lembur/history')?>">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-calendar-alt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Total Pengajuan Lembur</h4>
                        </div>
                        <div class="card-body">
                        <?=$total_l?>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="<?=base_url('lembur/pengajuan')?>">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-calendar-minus"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Pengajuan (Pending)</h4>
                        </div>
                        <div class="card-body">
                        <?=$pengajuan_l?>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="far fa-calendar-check"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Pengajuan (Accept)</h4>
                        </div>
                        <div class="card-body">
                        <?=$acc_l?>
                        </div>
                    </div>
                </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-calendar-times"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Pengajuan (Decline)</h4>
                        </div>
                        <div class="card-body">
                        <?=$dc_l?>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <h2 class="section-title">Pengajuan Karyawan Baru Anda</h2>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="#">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Total Pengajuan Karyawan Baru</h4>
                        </div>
                        <div class="card-body">
                        <?=$total_pkb_m?>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="#">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-user-clock"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Pengajuan (Pending)</h4>
                        </div>
                        <div class="card-body">
                        <?=$pengajuan_pkb_m?>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Pengajuan (Accept)</h4>
                        </div>
                        <div class="card-body">
                        <?=$acc_pkb_m?>
                        </div>
                    </div>
                </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-user-times"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Pengajuan (Decline)</h4>
                        </div>
                        <div class="card-body">
                        <?=$dc_pkb_m?>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <?php endif?>

    <h2 class="section-title">Pengajuan Cuti Anda</h2>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="#">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-calendar-alt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Total Pengajuan Cuti</h4>
                        </div>
                        <div class="card-body">
                        <?=$total_cs?>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="#">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-calendar-minus"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Pengajuan (Pending)</h4>
                        </div>
                        <div class="card-body">
                        <?=$pengajuan_cs?>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="far fa-calendar-check"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Pengajuan (Accept)</h4>
                        </div>
                        <div class="card-body">
                        <?=$acc_cs?>
                        </div>
                    </div>
                </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-calendar-times"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Pengajuan (Decline)</h4>
                        </div>
                        <div class="card-body">
                        <?=$dc_cs?>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <h2 class="section-title">Pengajuan Lembur Anda</h2>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="#">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-calendar-alt"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Total Pengajuan Lembur</h4>
                        </div>
                        <div class="card-body">
                        <?=$total_ls?>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="#">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-calendar-minus"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Pengajuan (Pending)</h4>
                        </div>
                        <div class="card-body">
                        <?=$pengajuan_ls?>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="far fa-calendar-check"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Pengajuan (Accept)</h4>
                        </div>
                        <div class="card-body">
                        <?=$acc_ls?>
                        </div>
                    </div>
                </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-calendar-times"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Pengajuan (Decline)</h4>
                        </div>
                        <div class="card-body">
                        <?=$dc_ls?>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    </div>

</section>
</div>

