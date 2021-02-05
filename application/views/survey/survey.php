<!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Survey Store</h1>
             <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Survey Store</a></div>
            </div>
          </div>

          <div class="section-body">
            <form method="POST" action="<?=base_url('shp/survey/save')?>" enctype="multipart/form-data">
              <input type="hidden" name="id" id="id" value="">
              <div class="row">
                  <div class="col-sm-6">
                      <div class="card">
                          <div class="card-body">
                              <div class="row">
                                  <div class="form-group col-sm-12">
                                  <label for="nama">Nama Store</label>
                                  <input id="nama" type="text" class="form-control" name="nama" disabled>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="form-group col-sm-12">
                                  <label for="nama">Alamat Store</label>
                                    <textarea id="nama" type="text" class="form-control" name="nama" disabled></textarea>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="form-group col-sm-12">
                                  <label for="nama">Batas Waktu Survey</label>
                                  <input id="nama" type="text" class="form-control" name="nama" disabled>
                                  </div>
                              </div>

                              <div class="row">
                                  <div class="form-group col-sm-12">
                                  <label for="nama">Lokasi Anda</label>
                                  <div class="input-group">
                                  <input type="text" class="form-control" name="latitude" id="latitude" required readonly>
                                    <input type="text" class="form-control" name="longitude" id="longitude" required readonly>
                                    <div class="input-group-append">
                                      <button class="btn btn-success" type="button" onclick="getLocation()"><i class="fas fa-map-marker-alt"></i></button>
                                    </div>
                                  </div>
                                  </div>
                              </div>

                              <div class="row">
                                  <div class="form-group col-sm-12">
                                  <label for="nama">Ambil Gambar</label>
                                    <div class="input-group mb-3">
                                      <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="file" name="file" required accept="image/*" capture="camera">
                                          <label class="custom-file-label" for="file">Choose Photo</label>
                                      </div>
                                  </div>
                                  </div>
                              </div>

                              <div class="card-footer text-center">
                                 <button class="btn btn-primary mr-1" type="submit">Simpan</button>
                                 <a href="<?=base_url('shp/survey')?>" class="btn btn-danger">Batal</a>
                              </div>

                          </div>
                      </div>
                  </div>
              </div>
            </form>
          </div>
        </section>
      </div>

      <script>
      function getLocation() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(showPosition);
        } else {
          alert("Geolocation is not supported by this browser.");
        }
      }

      function showPosition(position) {
        $('#latitude').val(position.coords.latitude);
        $('#longitude').val(position.coords.longitude);
      }

      $(document).ready(function(){
          $('.custom-file-input').on('change', function(){
            let filename = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(filename);
          });
      });
      </script>