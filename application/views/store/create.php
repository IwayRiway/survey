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
                            <form method="POST" action="<?=base_url('store/save')?>" enctype="multipart/form-data">
                            
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                    <label for="nama">Nama Store</label>
                                    <input id="nama" type="text" class="form-control" name="nama" autofocus required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-sm-12">
                                    <label for="alamat">Alamat</label>
                                    <textarea id="alamat" type="text" class="form-control" name="alamat" autofocus required></textarea>
                                    </div>
                                </div>

                                <div class="row">
                                  <div class="form-group col-sm-12">
                                    <label for="">Lokasi ( Latitude - Longitude)</label>
                                    <div class="input-group">
                                      <input type="text" class="form-control" name="latitude" id="latitude" required placeholder="Latitude">
                                      <input type="text" class="form-control" name="longitude" id="longitude" required placeholder="Longitude">
                                    </div>
                                  </div>
                              </div>

                              <div class="row">
                                  <div class="form-group col-sm-12">
                                    <label for="nama">Poto Depan Store</label>
                                      <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="file" name="file" required accept="image/*">
                                            <label class="custom-file-label" for="file">Choose Photo</label>
                                        </div>
                                    </div>
                                  </div>
                              </div>

                              <div class="row">
                                  <div class="form-group col-sm-12">
                                    <label for="nama">Poto Sekitar Store</label>
                                      <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="file_multiple" name="file_multiple[]" accept="image/*" multiple="multiple">
                                            <label class="custom-file-label" for="file">Choose Photo</label>
                                        </div>
                                    </div>
                                  </div>
                              </div>

                              <div class="row">
                                    <div class="form-group col-sm-12">
                                      <label>Pilih Region</label>
                                      <select class="form-control select2" name='region_id' id='region_id' required>
                                        <option value="" disabled selected>Pilih Region</option>
                                        <?php foreach($region as $db):?>
                                          <option value="<?=$db['id']?>"><?=$db['nama']?></option>
                                          <?php endforeach?>
                                      </select> 
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-sm-12">
                                    <label for="manager">Nama Manager</label>
                                    <input id="manager" type="text" class="form-control" name="manager" autofocus required>
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
      