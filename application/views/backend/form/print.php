<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>DOC REG - MTs Raudhatussa'adah</title>
    <meta content="Admin Dashboard" name="description" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <style type="text/css">
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            border: 1px solid black;
        }

        th {
            /* border: 1px solid black; */
            text-align: left;
            padding: 8px;
        }

        td {
            /* border: 1px solid black; */
            text-align: left;
            padding: 8px;
            font-size: 14px;
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
            font-weight: bold;
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
            <span style="font-family: 'Times New Roman', Times, serif;">YAYASAN PERMATASARI BOGOR</span> <br>
            <span style="font-family: 'Times New Roman', Times, serif; font-size: 18px;">MADRASAH TSANAWIYAH RAUDHATUSSA’ADAH</span> <br>
            <span style="font-size: 11px;">STATUS : TERAKREDITASI A</span> <br>
            <span style="font-size: 11px;">No : 02.00/207/BAP-SM/SK/X/2012 NSM :121.2.32.01.0137 NPSN : 20277622</span><br>
            <span style="font-size: 11px;">Jl. Raya Sukamanah No. 123 Tamansari – Rumpin – Bogor, 16350 Telp (021)75790753</span> <br>
            <span style="font-size: 11px;">Email : mts_raudhatussaadah@yahoo.co.id</span>
        </div>
        <hr>
    </header>
    <div class="content">
        <p>A. Keterangan Calon Siswa</p>
    </div>
    <table>
        <tr>
            <td width="35%">1. Nama Lengkap (sesuai ijazah)</td>
            <td width="1%">:</td>
            <td><?php echo strtoupper($data->nama_lengkap); ?></td>
        </tr>
        <tr>
            <td width="35%">2. Jenis Kelamin</td>
            <td width="1%">:</td>
            <td><?php echo strtoupper($data->jenis_kelamin); ?></td>
        </tr>
        <tr>
            <td width="35%">3. Tempat / Tanggal Lahir</td>
            <td width="1%">:</td>
            <td><?php echo strtoupper($data->tempat_lahir); ?></td>
        </tr>
        <tr>
            <td width="35%">4. Agama</td>
            <td width="1%">:</td>
            <td><?php echo strtoupper($data->agama); ?></td>
        </tr>
        <tr>
            <td width="35%">5. Anak ke</td>
            <td width="1%">:</td>
            <td><?php echo $data->anak_ke; ?></td>
        </tr>
        <tr>
            <td width="35%">6. Jumlah Saudara</td>
            <td width="1%">:</td>
            <td><?php echo $data->anak_kandung; ?></td>
        </tr>
        <tr>
            <td width="35%">7. Status Dalam Keluarga</td>
            <td width="1%">:</td>
            <td><?php echo strtoupper($data->status_keluarga); ?></td>
        </tr>
        <tr>
            <td width="35%">8. Alamat Rumah Lengkap</td>
            <td width="1%">:</td>
            <td><?php echo strtoupper($data->alamat_lengkap); ?></td>
        <tr>
            <td width="35%"></td>
            <td width="1%"></td>
            <td>
                <table>
                    <tr>
                        <td style="border: 1px solid black;">RT&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<?php echo strtoupper($data->alamat_rt); ?></td>
                        <td style="border: 1px solid black;">RW&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<?php echo strtoupper($data->alamat_rw); ?></td>
                        <td style="border: 1px solid black;">NO&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<?php echo strtoupper($data->alamat_no); ?></td>
                    </tr>
                </table>
                <table style="border: 0px;">
                    <tr>
                        <td width="10%">Desa/Kelurahan</td>
                        <td width="1%">:</td>
                        <td><?php echo strtoupper($data->alamat_desa); ?></td>
                    </tr>
                    <tr>
                        <td width="10%">Kecamatan</td>
                        <td width="1%">:</td>
                        <td><?php echo strtoupper($data->alamat_kecamatan); ?></td>
                    </tr>
                    <tr>
                        <td width="10%">Kabupaten/Kota</td>
                        <td width="1%">:</td>
                        <td><?php echo strtoupper($data->alamat_kabupaten); ?></td>
                    </tr>
                    <tr>
                        <td width="10%">Telepon/HP</td>
                        <td width="1%">:</td>
                        <td><?php echo strtoupper($data->alamat_hp); ?></td>
                    </tr>
                    <tr>
                        <td width="10%">Kode Pos</td>
                        <td width="1%">:</td>
                        <td><?php echo strtoupper($data->alamat_kodepos); ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        </tr>
    </table>

    <div class="content">
        <p>B. Riwayat Pendidikan</p>
    </div>
    <table>
        <tr>
            <td width="35%">1. Lulusan dari</td>
            <td width="1%">:</td>
            <td>SD / MI <?php echo strtoupper($data->pendidikan_asal); ?></td>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;a.&nbsp;&nbsp; No. Ijazah</td>
            <td width="1%">:</td>
            <td><?php echo strtoupper($data->pendidikan_no_ijazah); ?></td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;b.&nbsp;&nbsp; Tahun Ijazah</td>
            <td width="1%">:</td>
            <td><?php echo strtoupper($data->pendidikan_tahun_ijazah); ?></td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;c.&nbsp;&nbsp; Nomor Induk Siswa Nasional</td>
            <td width="1%">:</td>
            <td><?php echo strtoupper($data->pendidikan_nisn); ?></td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;d.&nbsp;&nbsp; Nomor Peserta Ujian Nasional</td>
            <td width="1%">:</td>
            <td><?php echo strtoupper($data->pendidikan_npun); ?></td>
        </tr>
        </tr>
    </table>
    <br><br><br><br><br>
    <div class="content">
        <p>C. Keterangan Orang Tua Wali</p>
    </div>
    <table>
        <tr>
            <td width="35%">1. Nama Ayah</td>
            <td width="1%">:</td>
            <td><?php echo strtoupper($data->orangtua_ayah); ?></td>
        </tr>
        <tr>
            <td width="35%">2. Nama Ibu</td>
            <td width="1%">:</td>
            <td><?php echo strtoupper($data->orangtua_ibu); ?></td>
        </tr>
        <tr>
            <td width="35%">3. Pendidikan</td>
            <td width="1%"></td>
            <td></td>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;a.&nbsp;&nbsp; Ayah</td>
            <td width="1%">:</td>
            <td><?php echo strtoupper($data->orangtua_pendidikan_ayah); ?></td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;b.&nbsp;&nbsp; Ibu</td>
            <td width="1%">:</td>
            <td><?php echo strtoupper($data->orangtua_pendidikan_ibu); ?></td>
        </tr>
        </tr>
        <tr>
            <td width="35%">4. Pekerjaan</td>
            <td width="1%"></td>
            <td></td>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;a.&nbsp;&nbsp; Ayah</td>
            <td width="1%">:</td>
            <td><?php echo strtoupper($data->orangtua_pekerjaan_ibu); ?></td>
        </tr>
        <tr>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;b.&nbsp;&nbsp; Ibu</td>
            <td width="1%">:</td>
            <td><?php echo strtoupper($data->nama_lengkap); ?></td>
        </tr>
        </tr>
        <tr>
            <td width="35%">5. Alamat Rumah Lengkap</td>
            <td width="1%">:</td>
            <td><?php echo strtoupper($data->orangtua_alamat_lengkap); ?></td>
        <tr>
            <td width="35%"></td>
            <td width="1%"></td>
            <td>
                <table>
                    <tr>
                        <td style="border: 1px solid black;">RT&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<?php echo strtoupper($data->orangtua_alamat_rt); ?></td>
                        <td style="border: 1px solid black;">RW&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<?php echo strtoupper($data->orangtua_alamat_rw); ?></td>
                        <td style="border: 1px solid black;">NO&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<?php echo strtoupper($data->orangtua_alamat_no); ?></td>
                    </tr>
                </table>
                <table style="border: 0px;">
                    <tr>
                        <td width="10%">Desa/Kelurahan</td>
                        <td width="1%">:</td>
                        <td><?php echo strtoupper($data->orangtua_alamat_desa); ?></td>
                    </tr>
                    <tr>
                        <td width="10%">Kecamatan</td>
                        <td width="1%">:</td>
                        <td><?php echo strtoupper($data->orangtua_alamat_kecamatan); ?></td>
                    </tr>
                    <tr>
                        <td width="10%">Kabupaten/Kota</td>
                        <td width="1%">:</td>
                        <td><?php echo strtoupper($data->orangtua_alamat_kabupaten); ?></td>
                    </tr>
                    <tr>
                        <td width="10%">Telepon/HP</td>
                        <td width="1%">:</td>
                        <td><?php echo strtoupper($data->orangtua_alamat_hp); ?></td>
                    </tr>
                    <tr>
                        <td width="10%">Kode Pos :</td>
                        <td width="1%">:</td>
                        <td><?php echo strtoupper($data->orangtua_alamat_kodepos); ?></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <?php $date = date('d M Y'); ?>
    <p style="float: right; padding-right: 40px; margin-top: 40px; padding-bottom: 20px;">Bogor, <?php echo $date ?></p>
    <br>
    <div>
        <pre>&nbsp;&nbsp;&nbsp;&nbsp;Orang Tua/Wali                                       Calon Siswa</pre>
        <br><br><br><br>
    </div>
    <div>
        <pre>______________________     Petugas Pendaftaran     &nbsp;_____________________</pre>
        <br><br><br><br>
    </div>
    <div>
        <pre>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_________________________</pre>
    </div>
    <div>
        <p><b>NOTE :</b></p>
        <ul>
            <li>Coret yang Tidak Perlu di Bagian SD / MI</li>
        </ul>
    </div>
</body>

</html>