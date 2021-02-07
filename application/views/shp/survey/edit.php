<!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Edit Kuesioner</h1>
             <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Edit Kuesioner</a></div>
            </div>
          </div>

          <div class="section-body">
              <div class="row">
                  <div class="col-sm-6">
                      <div class="card">
                          <div class="card-body">
                            <div class="form-group">
                              <label>Pilih Kategori</label>
                              <select class="form-control select2" name='kategori_id' id='kategori_id' required>
                              <option value="" disabled selected>Pilih Kategori</option>
                              <?php foreach($kategori as $db):?>
                                <option value="<?=$db['id']?>" <?=$id==$db['id']?'selected':''?>><?=$db['nama']?></option>
                                <?php endforeach?>
                              </select> 
                            </div>
                          </div>
                      </div>
                  </div>
              </div>

              <section id="pertanyaan">
                  
                  <?php $i=1; foreach ($data as $key => $value):?>
                  <div class="row" id="row_<?=$i?>">
                    <div class="col-sm-12">
                      <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-sm-12">
                                  <label for="pertanyaan_<?=$i?>">Pertanyaan</label>
                                    <div class="input-group mb-3">
                                      <input id="pertanyaan_<?=$i?>" type="text" class="form-control" name="pertanyaan_<?=$i?>" required value="<?=$key?>">
                                      <div class="input-group-append">
                                        <button class="btn btn-icon btn-outline-info" type="button" onclick="ubah(1,`<?=$data[$key][0]['pertanyaan_id']?>`, <?=$i?>)" title="Simpan"><i class="fas fa-check"></i></button>
                                      </div>
                                      <div class="input-group-append">
                                        <button class="btn btn-icon btn-outline-success" type="button" onclick="tambah(`<?=$data[$key][0]['pertanyaan_id']?>`,`row_<?=$i?>`)" title="Tambah Jawaban"><i class="fas fa-plus"></i></button>
                                      </div>
                                      <div class="input-group-append">
                                        <button class="btn btn-icon btn-outline-danger" type="button" onclick="hapus(`<?=$data[$key][0]['pertanyaan_id']?>`, <?=$id?>)" title="Hapus Pertanyaan"><i class="fas fa-times"></i></button>
                                      </div>
                                  </div>
                                </div>
                            </div>
                            <div class="jawaban">
                                <input type="hidden" id="row_<?=$i?>_jawaban" value=<?=count($data[$key])?>>

                                <?php $j=1; foreach($data[$key] as $db):?>
                                <div class="row" id="row_<?=$i?>_jawaban_<?=$j?>">
                                    <div class="form-group col-sm-8">
                                    <?php if($j==0):?><label for="">Jawaban Dan Skoring</label><?php endif?>
                                    <div class="input-group">
                                      <input type="text" class="form-control row_<?=$i?>_jawaban_<?=$j?>" name="row_<?=$i?>_jawaban[]" id="row_<?=$i?>_jawaban_<?=$j?>" required placeholder="Jawaban" value="<?=$db['jawaban']?>">
                                      <input type="number" class="form-control" style="max-width:100px !important;" name="row_<?=$i?>_skor[]" id="row_<?=$i?>_skor_<?=$j?>" required placeholder="Skor" value="<?=$db['skor']?>">
                                      <div class="input-group-append">
                                        <button class="btn btn-icon btn-outline-info" type="button" onclick="ubah(0,`<?=$db['id']?>`,`<?=$i?>|<?=$j?>`)" title="Simpan Jawaban"><i class="fas fa-check"></i></button>
                                      </div>
                                      <div class="input-group-append">
                                        <button class="btn btn-icon btn-outline-danger" type="button" onclick="hapusJawaban(`<?=$db['id']?>`, <?=$id?>)" title="Hapus Jawaban"><i class="fas fa-times"></i></button>
                                      </div>
                                    </div>
                                    </div>
                                </div>
                                <?php $j++; endforeach?>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php $i++; endforeach?>

              </section>

          </div>
        </section>
      </div>

      <script>
      function success(params) {
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Berhasil',
            text: params,
            showConfirmButton: false,
            timer: 2500
          });
      }
      
        function ubah(tipe, id, row) {
          if(tipe == 1){
            var pertanyaan = $('#pertanyaan_'+row).val();
            var jawaban = '';
            var skor = '';
          } else {
            var split = row.split('|');
            var pertanyaan ='';
            var jawaban = $('.row_'+split[0]+'_jawaban_'+split[1]).val();
            var skor = $('#row_'+split[0]+'_skor_'+split[1]).val();
          }
          
          $.ajax({
            url:"<?= base_url('kuesioner/update')?>",
            type:"POST",
            dataType: 'json',
            data:{pertanyaan:pertanyaan, tipe:tipe, id:id, jawaban:jawaban, skor:skor},
            success:function(data){
                success("Data Berhasil di update");
            }
          });
        }

        function tambah(id,params) {
          var rowJawaban = parseInt($(`#`+params+`_jawaban`).val()) + 1;
          var html = `<div class="row" id="`+params+`_jawaban_`+(rowJawaban)+`">
                        <div class="form-group col-sm-8">
                        <div class="input-group">
                            <input type="text" class="form-control `+params+`_jawaban_`+(rowJawaban)+`" name="`+params+`_jawaban[]" id="`+params+`_jawaban_`+(rowJawaban)+`" required placeholder="Jawaban">
                            <input type="number" class="form-control" style="max-width:100px !important;" name="`+params+`_skor[]" id="`+params+`_skor_`+(rowJawaban)+`" required placeholder="Skor">
                            <div class="input-group-append">
                              <button class="btn btn-icon btn-outline-info" type="button" onclick="simpanJawaban(`+id+`,'`+params+`|`+(rowJawaban)+`', <?=$id?>)" title="Simpan Jawaban"><i class="fas fa-check"></i></button>
                            </div>
                            <div class="input-group-append">
                              <button class="btn btn-icon btn-outline-danger" type="button" onclick="hapusJawaban('`+params+`_jawaban_`+(rowJawaban)+`')" title="Hapus Jawaban"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        </div>
                      </div>`;

          $(`#`+params+` .jawaban`).append(html);
          $(`#`+params+`_jawaban`).val(rowJawaban);
        }

        function simpanJawaban(id,params, kategori) {
          var split = params.split('|');
          var jawaban = $('.'+split[0]+'_jawaban_'+split[1]).val();
          var skor = $('#'+split[0]+'_skor_'+split[1]).val();

          $.ajax({
            url:"<?= base_url('kuesioner/pilihan')?>",
            type:"POST",
            dataType: 'json',
            data:{id:id, jawaban:jawaban, skor:skor, kategori:kategori},
            success:function(data){
                success("Data Berhasil di simpan");
                document.location.href = "<?= base_url('kuesioner/edit')?>"+`/`+kategori;
            }
          });
        }

        function hapus(id, kategori) {
          Swal.fire({
            title: 'Yakin?',
            text: "Data ini Akan dihapus..?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yakin!',
            cancelButtonText: 'Batal'
          }).then((result) => {
            if (result.value) {
              $.ajax({
                url:"<?= base_url('kuesioner/delete')?>",
                type:"POST",
                dataType: 'json',
                data:{id:id, kategori:kategori},
                success:function(data){
                    success("Data Berhasil di hapus");
                    document.location.href = "<?= base_url('kuesioner/edit')?>"+`/`+kategori;
                }
              });
            }
          })
        }

        function hapusJawaban(id,kategori) {
          Swal.fire({
            title: 'Yakin?',
            text: "Data ini Akan dihapus..?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yakin!',
            cancelButtonText: 'Batal'
          }).then((result) => {
            if (result.value) {
              $.ajax({
                url:"<?= base_url('kuesioner/hapusJawaban')?>",
                type:"POST",
                dataType: 'json',
                data:{id:id, kategori:kategori},
                success:function(data){
                    success("Data Berhasil di hapus");
                    document.location.href = "<?= base_url('kuesioner/edit')?>"+`/`+kategori;
                }
              });
            }
          })
        }
      </script>
      