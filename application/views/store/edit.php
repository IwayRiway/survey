<!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Add Store</h1>
             <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Add Store</a></div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="<?=base_url('store/update')?>" enctype="multipart/form-data">
                                <input type="hidden" name="id" id="id" value="<?=$store['id']?>">
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                    <label for="nama">Nama Store</label>
                                    <input id="nama" type="text" class="form-control" name="nama" autofocus required value="<?=$store['nama']?>">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-sm-12">
                                    <label for="alamat">Alamat</label>
                                    <textarea id="alamat" type="text" class="form-control" name="alamat" autofocus required><?=$store['alamat']?></textarea>
                                    </div>
                                </div>

                                <div class="row">
                                  <div class="form-group col-sm-12">
                                    <label for="">Lokasi ( Latitude - Longitude)</label>
                                    <div class="input-group">
                                      <?php $loc = explode(",", $store['lokasi'])?>
                                      <input type="text" class="form-control" name="latitude" id="latitude" required placeholder="Latitude" value="<?=$loc[0]?>">
                                      <input type="text" class="form-control" name="longitude" id="longitude" required placeholder="Longitude" value="<?=$loc[1]?>">
                                    </div>
                                  </div>
                              </div>

                              <div class="row">
                                  <div class="form-group col-sm-12" style="margin-bottom:-10px;">
                                    <label for="nama">Poto Depan Store</label>
                                      <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="file" name="file" accept="image/*">
                                            <label class="custom-file-label" for="file">Choose Photo</label>
                                        </div>
                                    </div>
                                  </div>
                                  <img src="<?=base_url('assets/')?><?=$store['poto']?>" alt="" width="150" style="border-radius:20px; margin-left:20px; margin-bottom:20px;">
                              </div>

                              <div class="row">
                                  <div class="form-group col-sm-12" style="margin-bottom:-10px;">
                                    <label for="nama">Poto Sekitar Store</label>
                                      <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="file_multiple" name="file_multiple[]" accept="image/*" multiple="multiple">
                                            <label class="custom-file-label" for="file">Choose Photo</label>
                                        </div>
                                    </div>
                                  </div>
                                  <?php if($store['poto_sekitar'] != null):?>
                                    <?php $poto = explode("|", $store['poto_sekitar']); 
                                      for ($i=0; $i < count($poto); $i++) :?>
                                        <img src="<?=base_url('assets/')?><?=$poto[$i]?>" alt="" width="150" style="border-radius:20px; margin-left:20px; margin-bottom:20px;"">
                                    <?php endfor?>
                                  <?php endif?>
                              </div>

                              <div class="row">
                                    <div class="form-group col-sm-12">
                                      <label>Pilih Region</label>
                                      <select class="form-control select2" name='region_id' id='region_id' required>
                                        <option value="" disabled selected>Pilih Region</option>
                                        <?php foreach($region as $db):?>
                                          <option value="<?=$db['id']?>" <?=$store['region_id']==$db['id']?'selected':''?>><?=$db['nama']?></option>
                                          <?php endforeach?>
                                      </select> 
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-sm-12">
                                    <label for="manager">Nama Manager</label>
                                    <input id="manager" type="text" class="form-control" name="manager" autofocus required value="<?=$store['manager']?>">
                                    </div>
                                </div>

                                <div class="card-footer text-center">
                                 <button class="btn btn-primary mr-1" type="submit">Simpan</button>
                                 <a href="<?=base_url('store')?>" class="btn btn-danger">Batal</a>
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
      $(document).ready(function(){
          $('.custom-file-input').on('change', function(){
            let filename = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(filename);
          });
      });
      </script>
      