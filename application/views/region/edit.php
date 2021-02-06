<!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Add Region</h1>
             <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Add Region</a></div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="<?=base_url('region/update')?>" enctype="multipart/form-data">
                              <input type="hidden" name="id" id="id" value="<?=$region['id']?>">
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                    <label for="nama">Nama Region</label>
                                    <input id="nama" type="text" class="form-control" name="nama" autofocus required value="<?=$region['nama']?>">
                                    </div>
                                </div>
                            
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                      <label>Pilih Supervisor</label>
                                      <select class="form-control select2" name='supervisor_id' id='supervisor_id' required>
                                        <option value="" disabled selected>Pilih Supervisor</option>
                                        <option value="<?=$region['supervisor_id']?>" selected><?=$region['supervisor']?></option>
                                        <?php foreach($supervisor as $db):?>
                                          <option value="<?=$db['id']?>"><?=$db['nama']?></option>
                                          <?php endforeach?>
                                      </select> 
                                    </div>
                                </div>

                                <div class="card-footer text-center">
                                 <button class="btn btn-primary mr-1" type="submit">Simpan</button>
                                 <a href="<?=base_url('region')?>" class="btn btn-danger">Batal</a>
                              </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </section>
      </div>
      