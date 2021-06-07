<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>PENGUMUMAN - MTs Raudhatussa'adah</title>
    <meta content="Admin Dashboard" name="description" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <style type="text/css">
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        th {
            border: 1px solid black;
            text-align: left;
            padding: 8px;
        }

        td {
            border: 1px solid black;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #e9ecef;
            max-width: 100%;
        }

        .tittle {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            text-align: center;
            font-size: 14px;
            font-weight: bold;
            margin-left: 50;
            display: inline-block;
            /* padding-bottom: 20px; */
        }

        hr {
            border: 0;
            border-top: 3px double #8c8c8c;
            position: relative;
            display: block;
        }

        .content {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
            text-align: justify;
            /* padding-bottom: 20px; */
        }

        .img-fluid {
            display: inline-block;
            width: 125px;
            margin-bottom: 0px;
            padding-bottom: 0px;
        }
    </style>
</head>

<body>
    <header>
        <img src="assets/frontend/images/logo.png" class="img-fluid" />
        <div class="tittle">
            <span style="color: #70bf5d;">YAYASAN PERMATASARI BOGOR</span> <br>
            <span style="color: #70bf5d; font-size: 18px;">MADRASAH TSANAWIYAH RAUDHATUSSA’ADAH</span> <br>
            <span style="color: #70bf5d; font-size: 11px;">STATUS : TERAKREDITASI A</span> <br>
            <span style="color: red; font-size: 11px;">No : 02.00/207/BAP-SM/SK/X/2012 NSM :121.2.32.01.0137 NPSN : 20277622</span><br>
            <span style="font-size: 11px;">Jl. Raya Sukamanah No. 123 Tamansari – Rumpin – Bogor, 16350 Telp (021)75790753</span> <br>
            <span style="font-size: 11px;">Email : mts_raudhatussaadah@yahoo.co.id</span>
        </div>
        <hr>
    </header>
    <div class="content">
        <?php $years = date("Y"); ?>
        <?php $tahun = strtotime("+1 year"); ?>
        <?php $date = date("Y", $tahun); ?>
        <p style="font-size: 20px; font-weight: bold; text-align: center;"><u>PENGUMUMAN</u></p>
        <p>Berdasarkan hasil tes seleksi yg telah dilaksanakan, memutuskan bahwa nama-nama yg tertera pada daftar dibawah ini dinyatakan <b><u>diterima</u></b> sebagai calon siswa baru <b>Jenjang MTs Raudhatussa'adah Rumpin</b> Tahun ajaran <?php echo $years . "/" . $date ?></p>
    </div>
    <div style="font-size:12px;">
        <table>
            <thead style="background-color:#ffffbf;">
                <tr>
                    <th style="text-align: center; width: 0cm;">NO.</th>
                    <th style="width: 2cm">NO. REGISTRASI</th>
                    <th style="width: 2cm">NISN</th>
                    <th style="width: 6cm;">NAMA PESERTA</th>
                    <th style="width: 3cm;">RATA - RATA</th>
                    <th>KETERANGAN</th>
                </tr>
            </thead>
            <?php foreach ($data as $key => $value) { ?>
                <tr>
                    <td style="text-align: center;"><?php echo ++$key . "." ?></td>
                    <td><?php echo $value->no_form ?></td>
                    <td><?php echo $value->pendidikan_nisn ?></td>
                    <td><?php echo strtoupper($value->nama_lengkap) ?></td>
                    <td><?php echo $value->nilai_rata2 ?></td>
                    <td><?php echo strtoupper($value->status_tes) ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>