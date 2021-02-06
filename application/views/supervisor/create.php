<!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Add Supervisor</h1>
             <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Add Supervisor</a></div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="<?=base_url('supervisor/save')?>" enctype="multipart/form-data">
                            
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                    <label for="nama">Nama Supervisor</label>
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
                                    <label for="hp">No Hp</label>
                                    <input id="hp" type="text" class="form-control" name="hp" autofocus required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-sm-12">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email" autofocus required>
                                    </div>
                                </div>

                                <div class="card-footer text-center">
                                 <button class="btn btn-primary mr-1" type="submit">Simpan</button>
                                 <a href="<?=base_url('supervisor')?>" class="btn btn-danger">Batal</a>
                              </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </section>
      </div>
      