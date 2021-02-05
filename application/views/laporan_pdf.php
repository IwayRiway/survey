<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <style>
            .wrapper{
                border-bottom : 1px solid black;
                padding-bottom :10px;
                margin-top: -30px;
            }

            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border: 1px solid #000000;
                text-align: left;
                padding: 8px;
            }

            .none{
                border: none;
                padding: 5px;
            }
        </style>
    </head>
    <body>
        <div class="wrapper">
            <div style="max-width:90px">
                <img src="<?=base_url('assets/img/logo.png')?>" alt="" style="max-width:90px">
            </div>
            <div style="text-align:center; margin-top: -100px; margin-left:20px;">
                <h3>PT Mywayout By IwayRiway</h3>
                <p>Perum Pondok Tanah Mas RT 002 RW 013 Kel. Wanasari Kec.Cibitung Bekasi</p>
            </div>
        </div>
        <div class="content">
            <h3 style="text-align:center; margin-top: 10px; margin-bottom:10px;">Hasil Survey Store Lapangan</h3>
            <p>Berikut merupkan hasil pengisian kuesioner berdasarkan data yang ada dilapangan :</p>
            <h4 style="margin-bottom:3px;">Data User :</h4>
            
            <table>
                <tr>
                    <td class='none' style="width:150px">Nama</td>
                    <td class='none'>: Riway Restu Islami Yudha</td>
                </tr>
                <tr>
                    <td class='none' style="width:150px">Hp</td>
                    <td class='none'>: 08571191079</td>
                </tr>
                <tr>
                    <td class='none' style="width:150px">Email</td>
                    <td class='none'>: riway.restu@gmail.com</td>
                </tr>
            </table>

            <h4 style="margin-bottom:3px;">Data Store :</h4>

            <table>
                <tr>
                    <td class='none' style="width:150px">Nama</td>
                    <td class='none'>: Toko ABC</td>
                </tr>
                <tr>
                    <td class='none' style="width:150px">Region</td>
                    <td class='none'>: Jaksel</td>
                </tr>
                <tr>
                    <td class='none' style="width:150px">Manager</td>
                    <td class='none'>: Roby Handoyo</td>
                </tr>
                <tr>
                    <td class='none' style="width:150px">Alamat</td>
                    <td class='none'>: JL. Teukeu Umar Jakarta Selatan</td>
                </tr>
                <tr>
                    <td class='none' style="width:150px">Tanggal Survei</td>
                    <td class='none'>: 2 April 2021</td>
                </tr>
                <tr>
                    <td class='none' style="width:150px"><b>Pernsentase</b></td>
                    <td class='none'><b>: 90%</b></td>
                </tr>
            </table>

            <h4 style="margin-bottom:3px;">Detail Hasil Survey :</h4>
            <div>
                <table>
                    <thead>
                        <tr>
                            <th>Kategori</th>
                            <th>Persentase</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Kebersihan</td>
                            <td>80%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>