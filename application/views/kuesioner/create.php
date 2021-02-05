<!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Add Kuesioner</h1>
             <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Add Kuesioner</a></div>
            </div>
          </div>

          <div class="section-body">
            <form method="POST" action="<?=base_url('kuesioner/save')?>" enctype="multipart/form-data">
              <div class="row">
                  <div class="col-sm-6">
                      <div class="card">
                          <div class="card-body">
                            <div class="form-group">
                              <label>Pilih Kategori</label>
                              <select class="form-control select2" name='kategori_id' id='kategori_id' required>
                              <option value="" disabled selected>Pilih Kategori</option>
                              <?php foreach($kategori as $db):?>
                                <option value="<?=$db['id']?>"><?=$db['nama']?></option>
                                <?php endforeach?>
                              </select> 
                            </div>
                          </div>
                      </div>
                  </div>
              </div>

              <section id="pertanyaan">
                  <input type="hidden" name="jumlah" id="jumlah" value=1>
                  <div id="pertanyaan_id">
                    <input type="hidden" name="id[]" id="id_row_1" value=1>
                  </div>

                  <div class="row" id="row_1">
                    <div class="col-sm-12">
                      <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-sm-12">
                                  <label for="pertanyaan_1">Pertanyaan</label>
                                    <div class="input-group mb-3">
                                      <input id="pertanyaan_1" type="text" class="form-control" name="pertanyaan_1" autofocus required>
                                      <div class="input-group-append">
                                        <button class="btn btn-icon btn-outline-success" type="button" onclick="tambah(`row_1`)" title="Tambah Jawaban"><i class="fas fa-plus"></i></button>
                                      </div>
                                      <div class="input-group-append">
                                        <button class="btn btn-icon btn-outline-danger" type="button" onclick="hapus(`row_1`)" title="Hapus Pertanyaan"><i class="fas fa-times"></i></button>
                                      </div>
                                  </div>
                                </div>
                            </div>
                            <div class="jawaban">
                                <input type="hidden" id="row_1_jawaban" value=1>
                                <div class="row" id="row_1_jawaban_1">
                                    <div class="form-group col-sm-8">
                                    <label for="">Jawaban Dan Skoring</label>
                                    <div class="input-group">
                                      <input type="text" class="form-control" name="row_1_jawaban[]" id="row_1_jawaban_1" required placeholder="Jawaban">
                                      <input type="number" class="form-control" style="max-width:100px !important;" name="row_1_skor[]" id="row_1_skor_1" required placeholder="Skor">
                                      <div class="input-group-append">
                                        <button class="btn btn-icon btn-outline-danger" type="button" onclick="hapusJawaban(`row_1_jawaban_1`)" title="Hapus Jawaban"><i class="fas fa-times"></i></button>
                                      </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>

              </section>

              <div class="row">
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <button type="button" class="btn btn-success" onclick="tambahPertanyaan()">Tambah</button>
                      <a href="<?=base_url('kuesioner')?>" class="btn btn-danger">Batal</a>
                      <button tyoe="submit" class="btn btn-primary">Simpan</button>
                      <h6 class="d-inline ml-3">Total Pertanyaan : </h6>
                      <h5 class="d-inline ml-1 jumlah">1</h5>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </section>
      </div>

      <script>
        var id_pertanyaan = 1;
        function tambahPertanyaan() {
          id_pertanyaan = id_pertanyaan + 1;
          var jumlah = parseInt($('#jumlah').val()) + 1;
          var html = `<div class="row" id="row_`+id_pertanyaan+`">
                      <div class="col-sm-12">
                        <div class="card">
                          <div class="card-body">
                              <div class="row">
                                  <div class="form-group col-sm-12">
                                    <label for="pertanyaan_`+id_pertanyaan+`">Pertanyaan</label>
                                      <div class="input-group mb-3">
                                        <input id="pertanyaan_`+id_pertanyaan+`" type="text" class="form-control" name="pertanyaan_`+id_pertanyaan+`" autofocus required>
                                        <div class="input-group-append">
                                          <button class="btn btn-icon btn-outline-success" type="button" onclick="tambah('row_`+id_pertanyaan+`')" title="Tambah Jawaban"><i class="fas fa-plus"></i></button>
                                        </div>
                                        <div class="input-group-append">
                                          <button class="btn btn-icon btn-outline-danger" type="button" onclick="hapus('row_`+id_pertanyaan+`')" title="Hapus Pertanyaan"><i class="fas fa-times"></i></button>
                                        </div>
                                    </div>
                                  </div>
                              </div>
                              <div class="jawaban">
                                  <input type="hidden" id="row_`+id_pertanyaan+`_jawaban" value=1>
                                  <div class="row" id="row_`+id_pertanyaan+`_jawaban_1">
                                      <div class="form-group col-sm-8">
                                      <label for="">Jawaban Dan Skoring</label>
                                      <div class="input-group">
                                        <input type="text" class="form-control" name="row_`+id_pertanyaan+`_jawaban[]" id="row_`+id_pertanyaan+`_jawaban_1" required placeholder="Jawaban">
                                        <input type="number" class="form-control" style="max-width:100px !important;" name="row_`+id_pertanyaan+`_skor[]" id="row_`+id_pertanyaan+`_skor_1" required placeholder="Skor">
                                        <div class="input-group-append">
                                          <button class="btn btn-icon btn-outline-danger" type="button" onclick="hapusJawaban('row_`+id_pertanyaan+`_jawaban_1')" title="Hapus Jawaban"><i class="fas fa-times"></i></button>
                                        </div>
                                      </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>`;

          var pertanyaan_id = `<input type="hidden" name="id[]" id="id_row_`+id_pertanyaan+`" value=`+id_pertanyaan+`>`;
          
          $('#jumlah').val(jumlah);
          $('.jumlah').html(jumlah);
          $("#pertanyaan").append(html);
          $("#pertanyaan_id").append(pertanyaan_id);
        }

        function tambah(params) {
          // var rowJawaban = document.querySelectorAll(`#`+params+` .jawaban > .row`);
          var rowJawaban = parseInt($(`#`+params+`_jawaban`).val()) + 1;
          var html = `<div class="row" id="`+params+`_jawaban_`+(rowJawaban)+`">
                        <div class="form-group col-sm-8">
                        <div class="input-group">
                            <input type="text" class="form-control" name="`+params+`_jawaban[]" id="`+params+`_jawaban_`+(rowJawaban)+`" required placeholder="Jawaban">
                            <input type="number" class="form-control" style="max-width:100px !important;" name="`+params+`_skor[]" id="`+params+`_skor_`+(rowJawaban)+`" required placeholder="Skor">
                            <div class="input-group-append">
                              <button class="btn btn-icon btn-outline-danger" type="button" onclick="hapusJawaban('`+params+`_jawaban_`+(rowJawaban)+`')" title="Hapus Jawaban"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        </div>
                      </div>`;

          $(`#`+params+` .jawaban`).append(html);
          $(`#`+params+`_jawaban`).val(rowJawaban);
        }

        function hapus(params) {
          var jumlah = parseInt($('#jumlah').val()) - 1;
          $('#jumlah').val(jumlah);
          $('.jumlah').html(jumlah);
          $(`#`+params).remove();
          $(`#id_`+params).remove();
        }

        function hapusJawaban(params) {
          // var rowJawaban = parseInt($(`#`+params+`_jawaban`).val()) - 1;
          $(`#`+params).remove();
        }
      </script>
      