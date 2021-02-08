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
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Total Store Survey</h4>
                        </div>
                        <div class="card-body">
                            <?=$total?>
                        </div>
                    </div>
                </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                    <i class="fas fa-user-check"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Selesai</h4>
                        </div>
                        <div class="card-body">
                        <?=$selesai?>
                        </div>
                    </div>
                </div>
        </div>
        
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-user-tag"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Survey ke-1</h4>
                        </div>
                        <div class="card-body">
                            <?=$satu['selesai']?> / <?=$satu['total']?>
                        </div>
                    </div>
                </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-user-tag"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                        <h4>Survey Ke-2</h4>
                        </div>
                        <div class="card-body">
                            <?php if($setting['maks_survey']!=1):?>
                            <?=$dua['selesai']?> / <?=$dua['total']?>
                            <?php else :?>
                            N / A
                            <?php endif?>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </div>

    <div class="row">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">
                    <h6>Data Store</h6>
                </div>
                <div class="card-body" id="data-store" style="height:400px; width:100%;">
                    <div class="text-center"><i class="fa fa-spinner fa-spin"></i></div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                  <h6>Pesentase < 80%</h6>   
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Persentase</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach($store as $db):?>
                                    <tr role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="true">
                                        <td><?=$i++?></td>
                                        <td><?=$db['nama']?></td>
                                        <td><?=$db['persentase']?> %</td>
                                    </tr>
                                    <tr class="collapse" id="panel-body-1">
                                        <td></td>
                                        <td>
                                            <?php foreach ($db['detail'] as $key) {
                                                echo $key['nama'] . "<br>";
                                            }?>
                                        </td>
                                        <td>
                                            <?php foreach ($db['detail'] as $key) {
                                                echo $key['persentase'] . " %<br>";
                                            }?>
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

</section>
</div>

<script src="<?=base_url('assets/js/echarts/echarts.min.js')?>"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable({"ordering": false});
        getDataStore();
    });

    function getDataStore() {
        $.ajax({
            url:"<?= base_url('dashboard2/getDataStoreByRegion')?>",
            type:"POST",
            dataType: 'json',
            data:{},
            success:function(data){
                dataStore(data);
            }
        });
    }

    function dataStore(param) {
        var store = echarts.init(document.getElementById('data-store'));
        store.clear();
        option1 = {
            legend: {
                data: ['Persentase Store']
            },
            animation: true,
            tooltip: {
                show: true,
                trigger: 'axis',
            },
            toolbox: {
                feature: {
                    restore: {
                        title: 'Reset',
                    },
                    saveAsImage: {
                        title: 'Save Png',
                    }
                }
            },
            title: {
                left: 'center',
                text: '',
            },
            xAxis: {
                type: 'category',
                data: param.store,
                splitLine: {
                    show: true,
                    onGap: null,
                    // Garis Pebatas
                    lineStyle: {
                        color: '#E4E4E4',
                        type: 'solid',
                        width: 1,
                        shadowColor: 'rgba(0,0,0,0)',
                        shadowBlur: 5,
                        shadowOffsetX: 3,
                        shadowOffsetY: 3,
                    },
                },
            },
            yAxis: {
                type: 'value',
                name: "%"
                // boundaryGap: [0, '5%']
            },
            grid: {
                x: 60,
                y: 20,
                x2: 40,
                y2: 80
            },
            dataZoom: [{
                    type: 'inside',
                    start: 0,
                },
                {
                    start: 0,
                    handleSize: '100%',
                    handleStyle: {
                        color: '#fff',
                        shadowBlur: 10,
                        shadowColor: 'rgba(0, 0, 0, 0.6)',
                        shadowOffsetX: 2,
                        shadowOffsetY: 2
                    }
                }
            ],
            series: [{
                name: 'Persentase Store',
                type: 'bar',
                barGap: '2%',
                data: param.persentase
            }],
            color: ['#0047ff']
        };
        store.setOption(option1);
    }

</script>

