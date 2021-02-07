<!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Add Store Survey</h1>
             <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Add Store Survey</a></div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="<?=base_url('survey/saveStoreSurvey')?>" enctype="multipart/form-data">
                            
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                      <label>Pilih Store</label>
                                      <select class="form-control select2" name='store_id' id='store_id' required>
                                        <option value="" disabled selected>Pilih store</option>
                                        <?php foreach($store as $db):?>
                                          <option value="<?=$db['id']?>"><?=$db['nama']?></option>
                                          <?php endforeach?>
                                      </select> 
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-sm-12">
                                    <label for="region">Region</label>
                                    <input id="region" type="text" class="form-control" name="region" required disabled>
                                    <input id="region_id" type="hidden" class="form-control" name="region_id" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-sm-12">
                                    <label for="batas_waktu">Tanggal</label>
                                    <input id="batas_waktu" type="date" class="form-control" name="batas_waktu" required min="<?=date('Y-m-d')?>" max="<?=date('Y-m-d')?>" style='display:none'>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-sm-12">
                                      <label>Pilih Supervisor</label>
                                      <select class="form-control select2" name='surveyor_id' id='surveyor_id' required>
                                        <option value="" disabled selected>Pilih Supervisor</option>
                                        <!-- <?php foreach($supervisor as $db):?>
                                          <option value="<?=$db['id']?>|0"><?=$db['nama']?></option>
                                          <?php endforeach?> -->
                                      </select> 
                                    </div>
                                </div>

                                <input type="hidden" name="survey" id="survey" value=1>

                                <div class="card-footer text-center button" style="display:none;">
                                 <button class="btn btn-primary mr-1" type="submit">Simpan</button>
                                 <a href="<?=base_url('survey')?>" class="btn btn-danger">Batal</a>
                              </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </section>
      </div>

      <script>
      $(document).ready(function() {
          $( "#store_id" ).change(function() {
              var id = $('#store_id').val();
              $.ajax({
                url:"<?= base_url('survey/store')?>",
                type:"POST",
                dataType: 'json',
                data:{id:id},
                success:function(data){
                  var html = `<option value="`+data.supervisor.id+`|1">`+data.supervisor.nama+`</option>`;

                  $('#region').val(data.region.region);
                  $('#region_id').val(data.region.region_id);

                  $('#batas_waktu').attr('min', data.tanggal.min);
                  $('#batas_waktu').attr('max', data.tanggal.maks);
                  $('#batas_waktu').css("display", "inline");

                  $('#survey').val(data.tanggal.survey);

                  $("#surveyor_id").append(html);
                }
              });
          });

          $( "#surveyor_id" ).change(function() {
            $('.button').css("display", "");
          });

      });
      </script>
      