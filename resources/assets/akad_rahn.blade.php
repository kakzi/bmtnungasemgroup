<html moznomarginboxes mozdisallowselectionprint>

<head>
    <title>Akad-Rahn-<?= $print_mrbh['nama_pemohon']; ?>-Tanggal-Akad-<?= $print_mrbh['date_akad']; ?></title>
    <style>
        @page {
            width: 215.9mm;
            height: 330mm;
            margin: 0cm 0cm;
        }

        .content {
            margin-top: 6cm;
            page-break-after: always;
        }

        /** Define now the real margins of every page in the PDF **/
        body {
            margin-top: 3cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 0cm;
        }
        

        /** Define the header rules **/
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 5cm;
        }

        /** Define the footer rules **/
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
        }
    </style>
</head>

<body onload="window.print()">

    <!-- Define header and footer blocks before your content -->
    <header>
        <img src="<?= base_url(); ?>assets/kop.png" width="100%" height="100%" />
    </header>
    <footer>
        <img src="<?= base_url(); ?>assets/footer.png" width="100%" height="100%" />
    </footer>

    <main>
        <!-- Isian Data Permohonan Pembiayaan -->
        <div class="content">
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:-.25in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                <strong><u><span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>ISIAN DATA PERMOHONAN
                            PEMBIAYAAN</span></u></strong>
            </p>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:-.25in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Nomor Pengajuan :
                    Noomr49293 Tanggal : 19</span>
            </p>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:4.65pt;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>&nbsp;</span></strong>
            </p>
            <table style="border: none;border-collapse:collapse;">
                <tbody>
                    <tr>
                        <td style="width: 153.9pt;padding: 0in 5.4pt;height: 14.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>No Akad</span>
                            </p>
                        </td>
                        <td style="width: 337.5pt;padding: 0in 5.4pt;height: 14.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>:&nbsp;</span></strong><strong><span style='font-size:16px;font-family:"Times New Roman",serif;'>109293</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 153.9pt;padding: 0in 5.4pt;height: 14.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Hari</span>
                            </p>
                        </td>
                        <td style="width: 337.5pt;padding: 0in 5.4pt;height: 14.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>:
                                        Senin</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 153.9pt;padding: 0in 5.4pt;height: 14.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Tanggal</span>
                            </p>
                        </td>
                        <td style="width: 337.5pt;padding: 0in 5.4pt;height: 14.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>:
                                        <?= tgl_indo($print_mrbh['date_akad']); ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 153.9pt;padding: 0in 5.4pt;height: 14.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Petugas
                                    Akad</span>
                            </p>
                        </td>
                        <td style="width: 337.5pt;padding: 0in 5.4pt;height: 14.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['petugas_akad'] ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="width: 491.4pt;padding: 0in 5.4pt;height: 14.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>&nbsp;</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="width: 491.4pt;background: yellow;padding: 0in 5.4pt;height: 14.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>DATA
                                        PEMOHON</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 153.9pt;padding: 0in 5.4pt;height: 14.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Nama
                                    Lengkap</span>
                            </p>
                        </td>
                        <td style="width: 337.5pt;padding: 0in 5.4pt;height: 14.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['nama_pemohon'] ?> </span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 153.9pt;padding: 0in 5.4pt;height: 14.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Tempat, Tanggal
                                    lahir</span>
                            </p>
                        </td>
                        <td style="width: 337.5pt;padding: 0in 5.4pt;height: 14.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['tempat_lahir'] ?>, <?= tgl_indo($print_mrbh['ttl']); ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 153.9pt;padding: 0in 5.4pt;height: 14.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>No. KTP</span>
                            </p>
                        </td>
                        <td style="width: 337.5pt;padding: 0in 5.4pt;height: 14.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['nik_ktp'] ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 153.9pt;padding: 0in 5.4pt;height: 14.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Jenis
                                    Kelamin</span>
                            </p>
                        </td>
                        <td style="width: 337.5pt;padding: 0in 5.4pt;height: 14.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['jenis_kelamin'] ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 153.9pt;padding: 0in 5.4pt;height: 14.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Usia</span>
                            </p>
                        </td>
                        <td style="width: 337.5pt;padding: 0in 5.4pt;height: 14.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['umur'] ?> tahun</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 153.9pt;padding: 0in 5.4pt;height: 15.05pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Pendidikan
                                    terakhir</span>
                            </p>
                        </td>
                        <td style="width: 337.5pt;padding: 0in 5.4pt;height: 15.05pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['pendidikan'] ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 153.9pt;padding: 0in 5.4pt;height: 14.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Alamat
                                    rumah</span>
                            </p>
                        </td>
                        <td style="width: 337.5pt;padding: 0in 5.4pt;height: 14.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['alamat_rumah'] ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 153.9pt;padding: 0in 5.4pt;height: 14.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>No. HP</span>
                            </p>
                        </td>
                        <td style="width: 337.5pt;padding: 0in 5.4pt;height: 14.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['no_hp_pemohon'] ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 153.9pt;padding: 0in 5.4pt;height: 14.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Status
                                    rumah</span>
                            </p>
                        </td>
                        <td style="width: 337.5pt;padding: 0in 5.4pt;height: 14.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['status_rumah'] ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 153.9pt;padding: 0in 5.4pt;height: 14.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Pekerjaan /
                                    Usaha</span>
                            </p>
                        </td>
                        <td style="width: 337.5pt;padding: 0in 5.4pt;height: 14.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['pekerjaan'] ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 153.9pt;padding: 0in 5.4pt;height: 14.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Alamat kerja /
                                    Usaha</span>
                            </p>
                        </td>
                        <td style="width: 337.5pt;padding: 0in 5.4pt;height: 14.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['alamat_usaha'] ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 153.9pt;padding: 0in 5.4pt;height: 14.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Nama Suami / Istri
                                    / Wali</span>
                            </p>
                        </td>
                        <td style="width: 337.5pt;padding: 0in 5.4pt;height: 14.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['ahli_waris'] ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 153.9pt;padding: 0in 5.4pt;height: 14.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Nama Ahli
                                    Waris</span>
                            </p>
                        </td>
                        <td style="width: 337.5pt;padding: 0in 5.4pt;height: 14.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['ahli_waris'] ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 153.9pt;padding: 0in 5.4pt;height: 15.05pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Alamat</span>
                            </p>
                        </td>
                        <td style="width: 337.5pt;padding: 0in 5.4pt;height: 15.05pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['alamat_ahli'] ?></span></strong>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                <strong><span style='font-size:11px;font-family:"Times New Roman",serif;color:black;'>&nbsp;</span></strong>
            </p>
            <table style="border: none;border-collapse:collapse;">
                <tbody>
                    <tr>
                        <td colspan="4" style="width: 462.1pt;background: yellow;padding: 0in 5.4pt;height: 14.65pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>TANGGUNGAN
                                        KELUARGA</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 144.9pt;padding: 0in 5.4pt;height: 0.25in;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;margin:0in;text-align:justify;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Suami /
                                    Istri</span>
                            </p>
                        </td>
                        <td style="width: 103.5pt;padding: 0in 5.4pt;height: 0.25in;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['istri'] ?> Orang</span></strong>
                            </p>
                        </td>
                        <td style="width: 117pt;padding: 0in 5.4pt;height: 0.25in;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:30.05pt;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Orang tua</span>
                            </p>
                        </td>
                        <td style="width: 96.7pt;padding: 0in 5.4pt;height: 0.25in;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['orang_tua'] ?> Orang</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 144.9pt;padding: 0in 5.4pt;height: 14.65pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;margin:0in;text-align:justify;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Anak</span>
                            </p>
                        </td>
                        <td style="width: 103.5pt;padding: 0in 5.4pt;height: 14.65pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['anak'] ?> Orang</span></strong>
                            </p>
                        </td>
                        <td style="width: 117pt;padding: 0in 5.4pt;height: 14.65pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:30.05pt;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Lain-lain</span>
                            </p>
                        </td>
                        <td style="width: 96.7pt;padding: 0in 5.4pt;height: 14.65pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['lain_lain'] ?> Orang</span></strong>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>&nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp;</span></strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp;</span>
            </p>
            <table style="border: none;margin-left:.9pt;border-collapse:collapse;">
                <tbody>
                    <tr>
                        <td colspan="2" style="width: 461.2pt;background: yellow;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>DATA
                                        PEMBIAYAAN</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 208.55pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;margin:0in;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Jenis
                                    Pembiayaan</span>
                            </p>
                        </td>
                        <td style="width: 252.65pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['akad_pemby'] ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 208.55pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;margin:0in;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Jumlah Plafond
                                    Pembiayaan</span>
                            </p>
                        </td>
                        <td style="width: 252.65pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>:
                                        <?= convertRupiah($print_mrbh['nominal_acc']); ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 208.55pt;padding: 0in 5.4pt;height: 14.15pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;margin:0in;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Angsuran Pokok Per
                                    Bulan</span>
                            </p>
                        </td>
                        <td style="width: 252.65pt;padding: 0in 5.4pt;height: 14.15pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['qard_pokok'] == null ? "0" : convertRupiah($print_mrbh['qard_pokok']); ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 208.55pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;margin:0in;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Ujrotul Khifdi Per
                                    Bulan</span>
                            </p>
                        </td>
                        <td style="width: 252.65pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['qard_ujroh'] == null ? "0" : convertRupiah($print_mrbh['qard_ujroh']); ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 208.55pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;margin:0in;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Total Angsuran Per
                                    Bulan</span>
                            </p>
                        </td>
                        <td style="width: 252.65pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>:
                                        <?= convertRupiah($print_mrbh['qard_pokok'] + $print_mrbh['qard_ujroh']); ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 208.55pt;padding: 0in 5.4pt;height: 14.15pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;margin:0in;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Periode
                                    Angsuran</span>
                            </p>
                        </td>
                        <td style="width: 252.65pt;padding: 0in 5.4pt;height: 14.15pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['p_angsuran'] ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 208.55pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;margin:0in;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Jangka
                                    Waktu</span>
                            </p>
                        </td>
                        <td style="width: 252.65pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['jangka_waktu'] ?> <?php
                                                                            if ($print_mrbh['p_angsuran'] == 'Harian') {
                                                                                echo 'Hari';
                                                                            } else {
                                                                                echo 'Bulan';
                                                                            }
                                                                            ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 208.55pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;margin:0in;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Jaminan
                                    Berupa</span>
                            </p>
                        </td>
                        <td style="width: 252.65pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>:
                                        <?php if ($print_mrbh['merk'] != null) {
                                            echo 'BPKB';
                                        } else {
                                            echo '';
                                        } ?>
                                        <?php if ($print_mrbh['no_nib'] != null) {
                                            echo '/SHM';
                                        } else {
                                            echo '';
                                        } ?>

                                        <?php if ($print_mrbh['no_porsi'] != null) {
                                            echo '/NOMOR PORSI';
                                        } else {
                                            echo '';
                                        }
                                        ?>


                                    </span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 208.55pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;margin:0in;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Pembiayaan
                                    Ke</span>
                            </p>
                        </td>
                        <td style="width: 252.65pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>:
                                    </span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 208.55pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;margin:0in;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Tanggal mulai
                                    angsuran</span>
                            </p>
                        </td>
                        <td style="width: 252.65pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>:
                                        <?= tgl_indo($print_mrbh['tempo_s']); ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 208.55pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;margin:0in;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Tanggal jatuh
                                    tempo angsuran</span>
                            </p>
                        </td>
                        <td style="width: 252.65pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>:
                                        <?= tgl_indo($print_mrbh['tempo_d']); ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 208.55pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;margin:0in;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Keperluan
                                    Pembiayaan</span>
                            </p>
                        </td>
                        <td style="width: 252.65pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['keperluan'] ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="width: 461.2pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>&nbsp;</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="width: 461.2pt;background: yellow;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>BIAYA
                                        INFAQ PENGURUSAN PEMBIAYAAN</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 208.55pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;margin:0in;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Materai</span>
                            </p>
                        </td>
                        <td style="width: 252.65pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>:
                                        <?= convertRupiah($print_mrbh['materai']) ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 208.55pt;padding: 0in 5.4pt;height: 14.15pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;margin:0in;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>ATK</span>
                            </p>
                        </td>
                        <td style="width: 252.65pt;padding: 0in 5.4pt;height: 14.15pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>:
                                        <?= convertRupiah($print_mrbh['atk']) ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 208.55pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;margin:0in;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Tabarru
                                    Pembiayaan</span>
                            </p>
                        </td>
                        <td style="width: 252.65pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>:
                                        <?= convertRupiah($print_mrbh['tabarru']) ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 208.55pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;margin:0in;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Wakaf</span>
                            </p>
                        </td>
                        <td style="width: 252.65pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>:
                                        <?= convertRupiah($print_mrbh['wakaf']) ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 208.55pt;padding: 0in 5.4pt;height: 14.15pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;margin:0in;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Simp. Wajib</span>
                            </p>
                        </td>
                        <td style="width: 252.65pt;padding: 0in 5.4pt;height: 14.15pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>:
                                        <?= convertRupiah($print_mrbh['simp_wajib']) ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 208.55pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Total Biaya</span>
                            </p>
                        </td>
                        <td style="width: 252.65pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>:
                                        <?= convertRupiah($print_mrbh['t_biaya_akad']) ?></span></strong>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table style="border: none;margin-left:.9pt;border-collapse:collapse;">
                <tbody>
                    <tr>
                        <td style="width: 208.55pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;"><br></td>
                        <td style="width: 252.65pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <br>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>

        {{-- <div class="content">
            <table style="width:490.5pt;margin-left:.9pt;border-collapse:collapse;border:none;">
                <tbody>
                    <tr>
                        <td colspan="2" style="width: 490.5pt;background: yellow;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>DATA
                                        JAMINAN</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="width: 490.5pt;background: rgb(146, 208, 80);padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <div style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <ol style="margin-bottom:0in;list-style-type: decimal;">
                                    <li style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                        <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;color:#1D1B11;'>BPKB</span></strong>
                                    </li>
                                </ol>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.15pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Jenis / Merk / Tahun</span>
                            </p>
                        </td>
                        <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.15pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        <?= $print_mrbh['jenis_bpkb'] == null ? "-" : $print_mrbh['jenis_bpkb'] ?>/<?= $print_mrbh['merk'] == null ? "-" : $print_mrbh['merk'] ?>/<?= $print_mrbh['tahun_bpkb'] == null ? "-" : $print_mrbh['tahun_bpkb'] ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>No. BPKB</span>
                            </p>
                        </td>
                        <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        <?= $print_mrbh['no_bpkb'] == null ? "-" : $print_mrbh['no_bpkb'] ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.15pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Atas Nama</span>
                            </p>
                        </td>
                        <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.15pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        <?= $print_mrbh['an_bpkb'] == null ? "-" : $print_mrbh['an_bpkb'] ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Alamat</span>
                            </p>
                        </td>
                        <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        <?= $print_mrbh['alamat_bpkb'] == null ? "-" : $print_mrbh['alamat_bpkb'] ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.15pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Warna</span>
                            </p>
                        </td>
                        <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.15pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        <?= $print_mrbh['warna'] == null ? "-" : $print_mrbh['warna'] ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>No. Polisi</span>
                            </p>
                        </td>
                        <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        <?= $print_mrbh['no_polisi'] == null ? "-" : $print_mrbh['no_polisi'] ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>No. Rangka / Mesin</span>
                            </p>
                        </td>
                        <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        <?= $print_mrbh['no_rangka'] == null ? "-" : $print_mrbh['no_rangka'] ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Dikeluarkan Oleh</span>
                            </p>
                        </td>
                        <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        <?= $print_mrbh['outby'] == null ? "-" : $print_mrbh['outby'] ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="width: 490.5pt;background: rgb(146, 208, 80);padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <div style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <ol style="margin-bottom:0in;list-style-type: undefined;">
                                    <li style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                        <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;color:#1D1B11;'>SERTIFIKAT
                                                HAK MILIK</span></strong>
                                    </li>
                                </ol>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Jenis</span>
                            </p>
                        </td>
                        <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        <?php if ($print_mrbh['no_nib'] != null) {
                                            echo 'SHM';
                                        } else {
                                            echo '';
                                        } ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>No. NIB</span>
                            </p>
                        </td>
                        <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        <?= $print_mrbh['no_nib'] == null ? "-" : $print_mrbh['no_nib'] ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Atas Nama</span>
                            </p>
                        </td>
                        <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        <?= $print_mrbh['an_sertifikat'] == null ? "-" : $print_mrbh['an_sertifikat'] ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Luas</span>
                            </p>
                        </td>
                        <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        <?= $print_mrbh['luas'] == null ? "-" : $print_mrbh['luas'] ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Alamat</span>
                            </p>
                        </td>
                        <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        <?= $print_mrbh['alamat_sertifikat'] == null ? "-" : $print_mrbh['alamat_sertifikat'] ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Nilai Taksir Agunan</span>
                            </p>
                        </td>
                        <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        <?= $print_mrbh['nilai_sertifikat'] == null ? "-" : convertRupiah($print_mrbh['nilai_sertifikat']); ?></span></strong>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                <strong><span style='font-size:11px;line-height:115%;font-family:"Times New Roman",serif;color:#1D1B11;'>&nbsp;</span></strong>
            </p>
            <table style="width:491.4pt;border-collapse:collapse;border:none;">
                <tbody>
                    <tr>
                        <td colspan="2" style="width: 491.4pt;background: rgb(146, 208, 80);padding: 0in 5.4pt;height: 13.9pt;vertical-align: top;">
                            <div style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <ol style="margin-bottom:0in;list-style-type: undefined;">
                                    <li style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                        <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;color:#1D1B11;'>BPIH/NOMOR
                                                PORSI HAJI</span></strong>
                                    </li>
                                </ol>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 217pt;padding: 0in 5.4pt;height: 13.9pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Nama</span>
                            </p>
                        </td>
                        <td style="width: 274.4pt;padding: 0in 5.4pt;height: 13.9pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        <?= $print_mrbh['nama_porsi'] == null ? "-" : $print_mrbh['nama_porsi']; ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 217pt;padding: 0in 5.4pt;height: 13.1pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Alamat</span>
                            </p>
                        </td>
                        <td style="width: 274.4pt;padding: 0in 5.4pt;height: 13.1pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        <?= $print_mrbh['alamat_porsi'] == null ? "-" : $print_mrbh['alamat_porsi']; ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 217pt;padding: 0in 5.4pt;height: 13.9pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>No. Porsi</span>
                            </p>
                        </td>
                        <td style="width: 274.4pt;padding: 0in 5.4pt;height: 13.9pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        <?= $print_mrbh['no_porsi'] == null ? "-" : $print_mrbh['no_porsi']; ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 217pt;padding: 0in 5.4pt;height: 13.9pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Bank</span>
                            </p>
                        </td>
                        <td style="width: 274.4pt;padding: 0in 5.4pt;height: 13.9pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        <?= $print_mrbh['bank'] == null ? "-" : $print_mrbh['bank']; ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="width: 491.4pt;background: rgb(146, 208, 80);padding: 0in 5.4pt;height: 13.1pt;vertical-align: top;">
                            <div style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <ol style="margin-bottom:0in;list-style-type: undefined;">
                                    <li style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                        <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>JAMINAN
                                                LAINYA</span></strong>
                                    </li>
                                </ol>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="width: 491.4pt;padding: 0in 5.4pt;height: 13.1pt;vertical-align: top;">
                            <div style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <ol start="1" style="margin-bottom:0in;list-style-type: lower-alpha;">
                                    <li style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                        <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'><?= $print_mrbh['jenis_jaminan_o'] == null ? "-" : $print_mrbh['jenis_jaminan_o']; ?></span></strong>
                                    </li>
                                </ol>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 217pt;padding: 0in 5.4pt;height: 13.9pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Nama</span>
                            </p>
                        </td>
                        <td style="width: 274.4pt;padding: 0in 5.4pt;height: 13.9pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        <?= $print_mrbh['nama_jaminan_o'] == null ? "-" : $print_mrbh['nama_jaminan_o']; ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 217pt;padding: 0in 5.4pt;height: 13.9pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Nomor </span>
                            </p>
                        </td>
                        <td style="width: 274.4pt;padding: 0in 5.4pt;height: 13.9pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        <?= $print_mrbh['nomorjlain'] == null ? "-" : $print_mrbh['nomorjlain']; ?></span></strong>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:4.65pt;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>&nbsp;&nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp;</span></strong>
            </p>
            <table style="border-collapse:collapse;border:none;">
                <tbody>
                    <tr>
                        <td colspan="2" style="width: 491.4pt;background: yellow;padding: 0in 5.4pt;height: 14.9pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>DATA
                                        SAKSI</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 216.9pt;padding: 0in 5.4pt;height: 14.9pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Nama
                                    Lengkap</span>
                            </p>
                        </td>
                        <td style="width: 274.5pt;padding: 0in 5.4pt;height: 14.9pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['nama_lengkap_saksi'] == null ? "-" : $print_mrbh['nama_lengkap_saksi']; ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 216.9pt;padding: 0in 5.4pt;height: 14.9pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Tempat, Tanggal
                                    lahir</span>
                            </p>
                        </td>
                        <td style="width: 274.5pt;padding: 0in 5.4pt;height: 14.9pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['tempat_lahir_saksi'] == null ? "-" : $print_mrbh['tempat_lahir_saksi']; ?>,
                                        <?= $print_mrbh['tgl_lahir_saksi'] == null ? "-" : tgl_indo($print_mrbh['tgl_lahir_saksi']); ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 216.9pt;padding: 0in 5.4pt;height: 14.9pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>NIK. KTP</span>
                            </p>
                        </td>
                        <td style="width: 274.5pt;padding: 0in 5.4pt;height: 14.9pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['nik_saksi'] == null ? "-" : $print_mrbh['nik_saksi']; ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 216.9pt;padding: 0in 5.4pt;height: 14.9pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Jenis
                                    Kelamin</span>
                            </p>
                        </td>
                        <td style="width: 274.5pt;padding: 0in 5.4pt;height: 14.9pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['jenis_kel_saksi'] == null ? "-" : $print_mrbh['jenis_kel_saksi']; ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 216.9pt;padding: 0in 5.4pt;height: 14.9pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Usia</span>
                            </p>
                        </td>
                        <td style="width: 274.5pt;padding: 0in 5.4pt;height: 14.9pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['usia_saksi'] == null ? "-" : $print_mrbh['usia_saksi']; ?>
                                        tahun</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 216.9pt;padding: 0in 5.4pt;height: 14.9pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Alamat
                                    rumah</span>
                            </p>
                        </td>
                        <td style="width: 274.5pt;padding: 0in 5.4pt;height: 14.9pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['alamat_saksi'] == null ? "-" : $print_mrbh['alamat_saksi']; ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 216.9pt;padding: 0in 5.4pt;height: 15.85pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Pekerjaan</span>
                            </p>
                        </td>
                        <td style="width: 274.5pt;padding: 0in 5.4pt;height: 15.85pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['pekerjaan_saksi'] == null ? "-" : $print_mrbh['pekerjaan_saksi']; ?></span></strong>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="content">
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                <span style='font-family:"Times New Roman",serif;color:black;'>Kepada Yth</span>
            </p>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                <strong><span style='font-family:"Times New Roman",serif;color:black;'>Manager KOPSYAH BMT NU
                        NGASEM</span></strong>
            </p>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                <strong><span style='font-family:"Times New Roman",serif;color:black;'>Permohonan Pembiayaan</span></strong>
            </p>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                <span style='font-size:13px;font-family:"Times New Roman",serif;color:black;'>Sesuai Berkas Permohonan Nomor :
                    <?= $print_mrbh['no_pemohon'] == null ? "-" : $print_mrbh['no_pemohon']; ?></span>
            </p>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:4.65pt;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                <span style='font-family:"Times New Roman",serif;color:black;'>&nbsp;</span>
            </p>
            <table style="border: none;border-collapse:collapse;">
                <tbody>
                    <tr>
                        <td style="width: 2.2in;padding: 0in 5.4pt;height: 14.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>No Akad</span>
                            </p>
                        </td>
                        <td style="width: 331.6pt;padding: 0in 5.4pt;height: 14.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:&nbsp;</span></strong><strong><span style='font-family:"Times New Roman",serif;'><?= $print_mrbh['no_akad'] == null ? "-" : $print_mrbh['no_akad']; ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 2.2in;padding: 0in 5.4pt;height: 14.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Hari</span>
                            </p>
                        </td>
                        <td style="width: 331.6pt;padding: 0in 5.4pt;height: 14.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['date_akad'] == null ? "-" : hari_ini($print_mrbh['date_akad']); ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 2.2in;padding: 0in 5.4pt;height: 14.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Tanggal</span>
                            </p>
                        </td>
                        <td style="width: 331.6pt;padding: 0in 5.4pt;height: 14.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['date_akad'] == null ? "-" : tgl_indo($print_mrbh['date_akad']); ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 2.2in;padding: 0in 5.4pt;height: 14.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Petugas Akad</span>
                            </p>
                        </td>
                        <td style="width: 331.6pt;padding: 0in 5.4pt;height: 14.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['petugas_akad'] == null ? "-" : $print_mrbh['petugas_akad']; ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 2.2in;padding: 0in 5.4pt;height: 14.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>&nbsp;</span>
                            </p>
                        </td>
                        <td style="width: 331.6pt;padding: 0in 5.4pt;height: 14.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>&nbsp;</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="width: 490pt;background: yellow;padding: 0in 5.4pt;height: 14.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>DATA
                                        PEMOHON</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 2.2in;padding: 0in 5.4pt;height: 14.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Nama Lengkap</span>
                            </p>
                        </td>
                        <td style="width: 331.6pt;padding: 0in 5.4pt;height: 14.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['nama_pemohon'] == null ? "-" : $print_mrbh['nama_pemohon']; ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 2.2in;padding: 0in 5.4pt;height: 14.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Tempat, Tanggal lahir</span>
                            </p>
                        </td>
                        <td style="width: 331.6pt;padding: 0in 5.4pt;height: 14.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['tempat_lahir'] == null ? "-" : $print_mrbh['tempat_lahir']; ?>,
                                        <?= $print_mrbh['ttl'] == null ? "-" : tgl_indo($print_mrbh['ttl']); ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 2.2in;padding: 0in 5.4pt;height: 14.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>No. KTP</span>
                            </p>
                        </td>
                        <td style="width: 331.6pt;padding: 0in 5.4pt;height: 14.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['nik_ktp'] == null ? "-" : $print_mrbh['nik_ktp']; ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 2.2in;padding: 0in 5.4pt;height: 14.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Jenis Kelamin</span>
                            </p>
                        </td>
                        <td style="width: 331.6pt;padding: 0in 5.4pt;height: 14.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['jenis_kelamin'] == null ? "-" : $print_mrbh['jenis_kelamin']; ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 2.2in;padding: 0in 5.4pt;height: 14.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Usia</span>
                            </p>
                        </td>
                        <td style="width: 331.6pt;padding: 0in 5.4pt;height: 14.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['umur'] == null ? "-" : $print_mrbh['umur']; ?> tahun</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 2.2in;padding: 0in 5.4pt;height: 15.1pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Pendidikan terakhir</span>
                            </p>
                        </td>
                        <td style="width: 331.6pt;padding: 0in 5.4pt;height: 15.1pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['pendidikan'] == null ? "-" : $print_mrbh['pendidikan']; ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 2.2in;padding: 0in 5.4pt;height: 14.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Alamat rumah</span>
                            </p>
                        </td>
                        <td style="width: 331.6pt;padding: 0in 5.4pt;height: 14.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['alamat_rumah'] == null ? "-" : $print_mrbh['alamat_rumah']; ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 2.2in;padding: 0in 5.4pt;height: 14.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>No. HP</span>
                            </p>
                        </td>
                        <td style="width: 331.6pt;padding: 0in 5.4pt;height: 14.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['no_hp_pemohon'] == null ? "-" : $print_mrbh['no_hp_pemohon']; ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 2.2in;padding: 0in 5.4pt;height: 14.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Status rumah</span>
                            </p>
                        </td>
                        <td style="width: 331.6pt;padding: 0in 5.4pt;height: 14.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['status_rumah'] == null ? "-" : $print_mrbh['status_rumah']; ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 2.2in;padding: 0in 5.4pt;height: 14.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Pekerjaan / Usaha</span>
                            </p>
                        </td>
                        <td style="width: 331.6pt;padding: 0in 5.4pt;height: 14.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['pekerjaan'] == null ? "-" : $print_mrbh['pekerjaan']; ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 2.2in;padding: 0in 5.4pt;height: 14.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Alamat kerja / Usaha</span>
                            </p>
                        </td>
                        <td style="width: 331.6pt;padding: 0in 5.4pt;height: 14.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['alamat_usaha'] == null ? "-" : $print_mrbh['alamat_usaha']; ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 2.2in;padding: 0in 5.4pt;height: 14.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Nama Suami / Istri / Wali</span>
                            </p>
                        </td>
                        <td style="width: 331.6pt;padding: 0in 5.4pt;height: 14.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['ahli_waris'] == null ? "-" : $print_mrbh['ahli_waris']; ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 2.2in;padding: 0in 5.4pt;height: 14.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Nama Ahli Waris</span>
                            </p>
                        </td>
                        <td style="width: 331.6pt;padding: 0in 5.4pt;height: 14.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['ahli_waris'] == null ? "-" : $print_mrbh['ahli_waris']; ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 2.2in;padding: 0in 5.4pt;height: 15.1pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Alamat</span>
                            </p>
                        </td>
                        <td style="width: 331.6pt;padding: 0in 5.4pt;height: 15.1pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['alamat_ahli'] == null ? "-" : $print_mrbh['alamat_ahli']; ?></span></strong>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                <strong><span style='font-family:"Times New Roman",serif;color:black;'>&nbsp;</span></strong>
            </p>
            <table style="border: none;border-collapse:collapse;">
                <tbody>
                    <tr>
                        <td colspan="4" style="width: 462.1pt;background: yellow;padding: 0in 5.4pt;height: 15.65pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>TANGGUNGAN
                                        KELUARGA</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 149.4pt;padding: 0in 5.4pt;height: 15.65pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;margin:0in;text-align:justify;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Suami / Istri</span>
                            </p>
                        </td>
                        <td style="width: 1.5in;padding: 0in 5.4pt;height: 15.65pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['istri'] == null ? "0" : $print_mrbh['istri']; ?>
                                        Orang</span></strong>
                            </p>
                        </td>
                        <td style="width: 76.5pt;padding: 0in 5.4pt;height: 15.65pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;margin:0in;text-align:justify;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Orang tua</span>
                            </p>
                        </td>
                        <td style="width: 128.2pt;padding: 0in 5.4pt;height: 15.65pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['orang_tua'] == null ? "0" : $print_mrbh['orang_tua']; ?>
                                        Orang</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 149.4pt;padding: 0in 5.4pt;height: 15.65pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;margin:0in;text-align:justify;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Anak</span>
                            </p>
                        </td>
                        <td style="width: 1.5in;padding: 0in 5.4pt;height: 15.65pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['anak'] == null ? "0" : $print_mrbh['anak']; ?>
                                        Orang</span></strong>
                            </p>
                        </td>
                        <td style="width: 76.5pt;padding: 0in 5.4pt;height: 15.65pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;margin:0in;text-align:justify;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Lain-lain</span>
                            </p>
                        </td>
                        <td style="width: 128.2pt;padding: 0in 5.4pt;height: 15.65pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['lain_lain'] == null ? "0" : $print_mrbh['lain_lain']; ?>
                                        Orang</span></strong>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                <strong><span style='font-family:"Times New Roman",serif;color:black;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp;</span></strong><span style='font-family:"Times New Roman",serif;color:black;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span>
            </p>
            <table style="border: none;margin-left:.9pt;border-collapse:collapse;">
                <tbody>
                    <tr>
                        <td colspan="2" style="width: 461.2pt;background: yellow;padding: 0in 5.4pt;height: 13.3pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>DATA
                                        PEMBIAYAAN</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 148.5pt;padding: 0in 5.4pt;height: 13.3pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;margin:0in;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Jenis Pembiayaan</span>
                            </p>
                        </td>
                        <td style="width: 312.7pt;padding: 0in 5.4pt;height: 13.3pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['akad_pemby'] == null ? "-" : $print_mrbh['akad_pemby']; ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 148.5pt;padding: 0in 5.4pt;height: 13.3pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;margin:0in;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Jumlah Plafond Pembiayaan</span>
                            </p>
                        </td>
                        <td style="width: 312.7pt;padding: 0in 5.4pt;height: 13.3pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['nominal_acc'] == null ? "0" : convertRupiah($print_mrbh['nominal_acc']); ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 148.5pt;padding: 0in 5.4pt;height: 14.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;margin:0in;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Angsuran Pokok Per Bulan</span>
                            </p>
                        </td>
                        <td style="width: 312.7pt;padding: 0in 5.4pt;height: 14.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['qard_pokok'] == null ? "0" : convertRupiah($print_mrbh['qard_pokok']); ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 148.5pt;padding: 0in 5.4pt;height: 13.3pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;margin:0in;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Ujrotul Khifdi Per Bulan</span>
                            </p>
                        </td>
                        <td style="width: 312.7pt;padding: 0in 5.4pt;height: 13.3pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['qard_ujroh'] == null ? "0" : convertRupiah($print_mrbh['qard_ujroh']); ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 148.5pt;padding: 0in 5.4pt;height: 13.3pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;margin:0in;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Total Angsuran Per Bulan</span>
                            </p>
                        </td>
                        <td style="width: 312.7pt;padding: 0in 5.4pt;height: 13.3pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['angsuran_qard'] == null ? "0" : convertRupiah($print_mrbh['angsuran_qard']); ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 148.5pt;padding: 0in 5.4pt;height: 14.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;margin:0in;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Periode Angsuran</span>
                            </p>
                        </td>
                        <td style="width: 312.7pt;padding: 0in 5.4pt;height: 14.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['p_angsuran'] == null ? "0" : $print_mrbh['p_angsuran']; ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 148.5pt;padding: 0in 5.4pt;height: 13.3pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;margin:0in;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Jangka Waktu</span>
                            </p>
                        </td>
                        <td style="width: 312.7pt;padding: 0in 5.4pt;height: 13.3pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['jangka_waktu'] == null ? "0" : $print_mrbh['jangka_waktu']; ?>
                                        <?php
                                        if ($print_mrbh['p_angsuran'] == 'Harian') {
                                            echo 'Hari';
                                        } else {
                                            echo 'Bulan';
                                        }
                                        ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 148.5pt;padding: 0in 5.4pt;height: 13.3pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;margin:0in;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Jaminan Berupa</span>
                            </p>
                        </td>
                        <td style="width: 312.7pt;padding: 0in 5.4pt;height: 13.3pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?php if ($print_mrbh['merk'] != null) {
                                            echo 'BPKB';
                                        } else {
                                            echo '';
                                        } ?>
                                        <?php if ($print_mrbh['no_nib'] != null) {
                                            echo '/SHM';
                                        } else {
                                            echo '';
                                        } ?>

                                        <?php if ($print_mrbh['no_porsi'] != null) {
                                            echo '/NOMOR PORSI';
                                        } else {
                                            echo '';
                                        }
                                        ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 148.5pt;padding: 0in 5.4pt;height: 13.3pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;margin:0in;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Pembiayaan Ke</span>
                            </p>
                        </td>
                        <td style="width: 312.7pt;padding: 0in 5.4pt;height: 13.3pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>: </span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 148.5pt;padding: 0in 5.4pt;height: 13.3pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;margin:0in;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Tanggal mulai angsuran</span>
                            </p>
                        </td>
                        <td style="width: 312.7pt;padding: 0in 5.4pt;height: 13.3pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['tempo_s'] == null ? "0" : tgl_indo($print_mrbh['tempo_s']); ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 148.5pt;padding: 0in 5.4pt;height: 13.3pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;margin:0in;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Tanggal jatuh tempo
                                    angsuran</span>
                            </p>
                        </td>
                        <td style="width: 312.7pt;padding: 0in 5.4pt;height: 13.3pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['tempo_s'] == null ? "0" : tgl_indo($print_mrbh['tempo_d']); ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 148.5pt;padding: 0in 5.4pt;height: 13.3pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;margin:0in;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Keperluan Pembiayaan</span>
                            </p>
                        </td>
                        <td style="width: 312.7pt;padding: 0in 5.4pt;height: 13.3pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['keperluan'] == null ? "0" : $print_mrbh['keperluan']; ?></span></strong>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table style="border: none;margin-left:.9pt;border-collapse:collapse;">
                <tbody>
                    <tr>
                        <td style="width: 171pt;padding: 0in 5.4pt;height: 13.3pt;vertical-align: top;"><br></td>
                        <td style="width: 290.2pt;padding: 0in 5.4pt;height: 13.3pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <br>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="content">
            <table style="border: none;margin-left:.9pt;border-collapse:collapse;">
                <tbody>
                    <tr>
                        <td colspan="2" style="width: 461.2pt;background: yellow;padding: 0in 5.4pt;height: 13.3pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>BIAYA INFAQ PENGURUSAN
                                        PEMBIAYAAN</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 171pt;padding: 0in 5.4pt;height: 13.3pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;margin:0in;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Materai</span>
                            </p>
                        </td>
                        <td style="width: 290.2pt;padding: 0in 5.4pt;height: 13.3pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['materai'] == null ? "0" : convertRupiah($print_mrbh['materai']); ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 171pt;padding: 0in 5.4pt;height: 14.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;margin:0in;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>ATK</span>
                            </p>
                        </td>
                        <td style="width: 290.2pt;padding: 0in 5.4pt;height: 14.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['atk'] == null ? "0" : convertRupiah($print_mrbh['atk']); ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 171pt;padding: 0in 5.4pt;height: 13.3pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;margin:0in;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Tabarru Pembiayaan</span>
                            </p>
                        </td>
                        <td style="width: 290.2pt;padding: 0in 5.4pt;height: 13.3pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['tabarru'] == null ? "0" : convertRupiah($print_mrbh['tabarru']); ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 171pt;padding: 0in 5.4pt;height: 13.3pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;margin:0in;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Wakaf</span>
                            </p>
                        </td>
                        <td style="width: 290.2pt;padding: 0in 5.4pt;height: 13.3pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['wakaf'] == null ? "0" : convertRupiah($print_mrbh['wakaf']); ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 171pt;padding: 0in 5.4pt;height: 14.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;margin:0in;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Simp. Wajib</span>
                            </p>
                        </td>
                        <td style="width: 290.2pt;padding: 0in 5.4pt;height: 14.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['simp_wajib'] == null ? "0" : convertRupiah($print_mrbh['simp_wajib']); ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 171pt;padding: 0in 5.4pt;height: 13.3pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Total Biaya</span>
                            </p>
                        </td>
                        <td style="width: 290.2pt;padding: 0in 5.4pt;height: 13.3pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['t_biaya_akad'] == null ? "0" : convertRupiah($print_mrbh['t_biaya_akad']); ?></span></strong>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-indent:35.45pt;'>
                <span style='font-family:"Times New Roman",serif;color:black;'>&nbsp;</span>
            </p>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-indent:35.45pt;'>
                <span style='font-family:"Times New Roman",serif;color:black;'>Sebagai bahan pertimbangan, kami lampirkan
                    :</span>
            </p>

            <p><?php
                $string = $print_mrbh['berkas_persyaratan'];
                $array = explode(',', $string);
                foreach ($array as $a => $berkas) {
                    echo ($a + 1) . '. ' . $berkas . '<br>';
                }
                ?></span></li>
            </p>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                <span style='font-family:"Times New Roman",serif;color:black;'>&nbsp;</span>
            </p>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:35.45pt;'>
                <span style='font-family:"Times New Roman",serif;color:black;'>Demikian permohonan ini kami buat dengan
                    sesungguhnya &amp; kami sanggup mentaati peraturan Kopsyah BMT NU Ngasem Jawa Timur &nbsp;yang berkait
                    dengan pembiayaan.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp;&nbsp;</span>
            </p>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:4.65pt;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                <span style='font-family:"Times New Roman",serif;color:black;'>&nbsp;</span>
            </p>
            <table style="border: none;border-collapse:collapse;">
                <tbody>
                    <tr>
                        <td style="width: 244.05pt;padding: 0in 5.4pt;height: 18.2pt;vertical-align: top;">
                            <p style='margin-top:1.45pt;margin-right:0in;margin-bottom:1.45pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <span style='font-family:"Times New Roman",serif;'>Ikut bertanggung-jawab</span>
                            </p>
                        </td>
                        <td style="width: 244.05pt;padding: 0in 5.4pt;height: 18.2pt;vertical-align: top;">
                            <p style='margin-top:1.45pt;margin-right:0in;margin-bottom:1.45pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <span style='font-family:"Times New Roman",serif;'><?= $print_mrbh['desa'] == null ? "0" : $print_mrbh['desa']; ?>,
                                    <?= $print_mrbh['date_akad'] == null ? "0" : tgl_indo($print_mrbh['date_akad']); ?></span>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 244.05pt;padding: 0in 5.4pt;height: 18.2pt;vertical-align: top;">
                            <p style='margin-top:1.45pt;margin-right:0in;margin-bottom:1.45pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><span style='font-family:"Times New Roman",serif;'>Suami / Istri / Wali
                                        /&nbsp;</span></strong>
                            </p>
                        </td>
                        <td style="width: 244.05pt;padding: 0in 5.4pt;height: 18.2pt;vertical-align: top;">
                            <p style='margin-top:1.45pt;margin-right:0in;margin-bottom:1.45pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><span style='font-family:"Times New Roman",serif;'>Pemohon</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 244.05pt;padding: 0in 5.4pt;height: 59.2pt;vertical-align: top;">
                            <p style='margin-top:1.45pt;margin-right:0in;margin-bottom:  1.45pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></strong>
                            </p>
                        </td>
                        <td style="width: 244.05pt;padding: 0in 5.4pt;height: 59.2pt;vertical-align: top;">
                            <p style='margin-top:1.45pt;margin-right:0in;margin-bottom:1.45pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 244.05pt;padding: 0in 5.4pt;height: 17.5pt;vertical-align: top;">
                            <p style='margin-top:1.45pt;margin-right:0in;margin-bottom:1.45pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><span style='font-family:"Times New Roman",serif;'>(<?= $print_mrbh['nama_lengkap_saksi'] == null ? "0" : $print_mrbh['nama_lengkap_saksi']; ?>)</span></strong>
                            </p>
                        </td>
                        <td style="width: 244.05pt;padding: 0in 5.4pt;height: 17.5pt;vertical-align: top;">
                            <p style='margin-top:1.45pt;margin-right:0in;margin-bottom:1.45pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><span style='font-family:"Times New Roman",serif;'>(<?= $print_mrbh['nama_pemohon'] == null ? "0" : $print_mrbh['nama_pemohon']; ?>)</span></strong>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="content">
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                <strong><span style='font-size:21px;font-family:"Times New Roman",serif;color:black;'>SURAT PERSETUJUAN SUAMI /
                        ISTRI /WALI</span></strong>
            </p>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp;</span>
            </p>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                <strong><em><span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Bismillahirrahmanirrahim,</span></em></strong>
            </p>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:4.65pt;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-indent:30.8pt;'>
                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>&nbsp;</span>
            </p>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:4.65pt;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-indent:30.8pt;'>
                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Yang bertanda tangan dibawah ini
                    :&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span>
            </p>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:4.65pt;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>
            </p>
            <table style="margin-left:4.65pt;border-collapse:collapse;border:none;">
                <tbody>
                    <tr>
                        <td style="width: 188.1pt;border: 1pt solid windowtext;padding: 0in 5.4pt;height: 14.35pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    Nama</span>
                            </p>
                        </td>
                        <td style="width: 293.55pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0in 5.4pt;height: 14.35pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['ahli_waris'] == null ? "0" : $print_mrbh['ahli_waris']; ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 188.1pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0in 5.4pt;height: 15.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-indent:  30.8pt;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Tempat, tanggal
                                    lahir</span>
                            </p>
                        </td>
                        <td style="width: 293.55pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;height: 15.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['tempat_lahir_ahli'] == null ? "0" : $print_mrbh['tempat_lahir_ahli']; ?>,
                                        <?= $print_mrbh['tgl_lahir_ahli'] == null ? "0" : tgl_indo($print_mrbh['tgl_lahir_ahli']); ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 188.1pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0in 5.4pt;height: 14.35pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-indent:  30.8pt;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Alamat
                                    rumah</span>
                            </p>
                        </td>
                        <td style="width: 293.55pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;height: 14.35pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['alamat_ahli'] == null ? "0" : $print_mrbh['alamat_ahli']; ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 188.1pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0in 5.4pt;height: 15.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-indent:  30.8pt;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Pekerjaan</span>
                            </p>
                        </td>
                        <td style="width: 293.55pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;height: 15.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['pekerjaa_ahli'] == null ? "0" : $print_mrbh['pekerjaa_ahli']; ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 188.1pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0in 5.4pt;height: 15.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-indent:  30.8pt;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>No. KTP</span>
                            </p>
                        </td>
                        <td style="width: 293.55pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;height: 15.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['nik_ahli'] == null ? "0" : $print_mrbh['nik_ahli']; ?></span></strong>
                            </p>
                        </td>
                    </tr>

                </tbody>
            </table>

            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span>
            </p>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-indent:35.45pt;'>
                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Menyatakan dengan ini menyetujui
                    terhadap Suami / Istri / Wali saya &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp;&nbsp;</span>
            </p>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:4.65pt;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>&nbsp;</span>
            </p>
            <table style="margin-left:4.65pt;border-collapse:collapse;border:none;">
                <tbody>
                    <tr>

                        <td style="width: 188.1pt;border: 1pt solid windowtext;padding: 0in 5.4pt;height: 14.35pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I.
                                    Nama</span>
                            </p>
                        </td>

                        <td style="width: 293.55pt;border-top: 1pt solid windowtext;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-image: initial;border-left: none;padding: 0in 5.4pt;height: 14.35pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['nama_pemohon'] == null ? "0" : $print_mrbh['nama_pemohon']; ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 188.1pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0in 5.4pt;height: 15.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-indent:  30.8pt;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Tempat, tanggal
                                    lahir</span>
                            </p>
                        </td>
                        <td style="width: 293.55pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;height: 15.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['tempat_lahir'] == null ? "0" : $print_mrbh['tempat_lahir']; ?>,
                                        <?= $print_mrbh['ttl'] == null ? "0" : tgl_indo($print_mrbh['ttl']); ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 188.1pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0in 5.4pt;height: 14.35pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-indent:  30.8pt;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Alamat
                                    rumah</span>
                            </p>
                        </td>
                        <td style="width: 293.55pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;height: 14.35pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['alamat_rumah'] == null ? "0" : $print_mrbh['alamat_rumah']; ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 188.1pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0in 5.4pt;height: 15.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-indent:  30.8pt;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Pekerjaan</span>
                            </p>
                        </td>
                        <td style="width: 293.55pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;height: 15.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['pekerjaan'] == null ? "0" : $print_mrbh['pekerjaan']; ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 188.1pt;border-right: 1pt solid windowtext;border-bottom: 1pt solid windowtext;border-left: 1pt solid windowtext;border-image: initial;border-top: none;padding: 0in 5.4pt;height: 15.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-indent:  30.8pt;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>NIK. KTP</span>
                            </p>
                        </td>
                        <td style="width: 293.55pt;border-top: none;border-left: none;border-bottom: 1pt solid windowtext;border-right: 1pt solid windowtext;padding: 0in 5.4pt;height: 15.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['nik_ktp'] == null ? "0" : $print_mrbh['nik_ktp']; ?></span></strong>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>

            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span>
            </p>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:35.45pt;'>
                <span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;color:black;'>Untuk mengajukan
                    permohonan pembiayaan ke<strong>&nbsp;KOPSYAH BMTNU NGASEM
                        <?= $print_mrbh['kantor_akad'] == null ? "0" : $print_mrbh['kantor_akad']; ?></strong>, dengan surat
                    pernyataan ini saya juga bertanggung jawab atas pengambilan / pembayaran angsuran sampai dengan pembiayaan
                    dengan atas nama
                    <strong><?= $print_mrbh['nama_pemohon'] == null ? "0" : $print_mrbh['nama_pemohon']; ?></strong> dinyatakan
                    <u>LUNAS&nbsp;</u>oleh petugas <strong>KOPSYAH BMTNU NGASEM JAWA TIMUR
                        <?= $print_mrbh['kantor_akad'] == null ? "0" : $print_mrbh['kantor_akad']; ?></strong><u>.</u></span>
            </p>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:35.45pt;'>
                <span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;color:black;'>Demikian surat
                    pernyataan ini saya buat dengan sebenarnya tanpa ada tekanan ataupun paksaan dari pihak mana pun.</span>
            </p>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                <span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span>
            </p>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                <span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span>
            </p>
            <table style="float: right;border-collapse:collapse;border:none;margin-left:6.75pt;margin-right:6.75pt;">
                <tbody>
                    <tr>
                        <td style="width: 175.2pt;padding: 0in 5.4pt;height: 12.45pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'><?= $print_mrbh['tempat_lahir'] == null ? "0" : $print_mrbh['tempat_lahir']; ?>,
                                        <?= $print_mrbh['date_akad'] == null ? "0" : tgl_indo($print_mrbh['date_akad']); ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 175.2pt;padding: 0in 5.4pt;height: 5.5pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Menyetujui</span>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 175.2pt;padding: 0in 5.4pt;height: 55.4pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>&nbsp;</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 175.2pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>(<?= $print_mrbh['ahli_waris'] == null ? "0" : $print_mrbh['ahli_waris']; ?>)</span></strong>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                <span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span>
            </p>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                <span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span>
            </p>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                <span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span>
            </p>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                <span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;'>&nbsp;</span>
            </p>
        </div>
        <div class="content">
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:-.25in;line-height:normal;font-size:24px;font-family:"Calibri",sans-serif;text-align:center;'>
                <strong><u><span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>BERITA ACARA
                            ASESOR</span></u></strong>
            </p>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:-.25in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Nomor Pengajuan :
                    <?= $print_mrbh['no_pemohon']; ?> Tanggal Survey : <?= tgl_indo($print_mrbh['date_survey']); ?> </span>
            </p>
            <p style="text-align: center;">&nbsp;</p>
            <p style="text-align: center;"><strong>BISMILLAHIRROHMANIRROHIM</strong></p>
            <table>
                <tbody>
                    <tr>
                        <td colspan="3" width="606">
                            <p>Setelah saya Analisa dari Data Surveyor maka Pengajuan Pembiayaan di bawah ini :</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" width="606">
                            <p>&nbsp;</p>
                        </td>
                    </tr>
                    <tr>
                        <td width="150">
                            <p>Nama</p>
                        </td>
                        <td colspan="2" width="456">
                            <p><strong>: <?= $print_mrbh['nama_pemohon']; ?></strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="150">
                            <p>Alamat</p>
                        </td>
                        <td colspan="2" width="456">
                            <p><strong>: <?= $print_mrbh['alamat_rumah']; ?></strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="150">
                            <p>Pekerjaan</p>
                        </td>
                        <td colspan="2" width="456">
                            <p><strong>: <?= $print_mrbh['pekerjaan']; ?></strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="150">
                            <p>Agunan</p>
                        </td>
                        <td colspan="2" width="456">
                            <p><strong>: <?php if ($print_mrbh['an_bpkb'] != null) {
                                                echo 'BPKB /';
                                            } else if ($print_mrbh['no_nib'] != null) {
                                                echo 'SHM /';
                                            } else if ($print_mrbh['nama_porsi'] != null) {
                                                echo 'Nomor Porsi /';
                                            } ?></strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="150">
                            <p>Nominal Pembiayaan</p>
                        </td>
                        <td colspan="2" width="456">
                            <p><strong>: <?= convertRupiah($print_mrbh['nominal_acc']) ?></strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="150">
                            <p>Jangka Waktu</p>
                        </td>
                        <td colspan="2" width="456">
                            <p><strong>: <?= $print_mrbh['jangka_waktu']; ?> <?php
                                                                                if ($print_mrbh['p_angsuran'] == 'Harian') {
                                                                                    echo 'Hari';
                                                                                } else {
                                                                                    echo 'Bulan';
                                                                                }
                                                                                ?></strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="150">
                            <p>Jumlah Angsuran</p>
                        </td>
                        <td colspan="2" width="456">
                            <p><strong>: <?= convertRupiah($print_mrbh['angsuran_qard']) ?></strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" width="606">
                            <p><strong>&nbsp;</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" width="606">
                            <p>Untuk <strong><?php if ($print_mrbh['status_permohonan'] == 'ACC') {
                                                    echo 'Di Setujui ';
                                                } else if ($print_mrbh['status_permohonan'] == 'Pengajuan di Tolak') {
                                                    echo 'Tidak di Setujui ';
                                                } ?></strong>pembiayaannya di Kopsyah BMT NU NGASEM JAWA TIMUR dan demikian
                                surat persetujuan ini dibuat dengan sebenar-benarnya.</p>
                            <p>&nbsp;</p>
                        </td>
                    </tr>

                    <table>
                        <tbody>
                            <tr>
                                <td width="342">
                                    <p>&nbsp;</p>
                                </td>
                                <td width="245">
                                    <p><?= $print_mrbh['desa']; ?>, <?= tgl_indo($print_mrbh['date_acc']); ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="342">
                                    <p>&nbsp;</p>
                                </td>
                                <td width="245">
                                    <p><strong>Petugas Assesor</strong></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="342">
                                    <p>&nbsp;</p>
                                </td>
                                <td rowspan="3" width="245">
                                    <!-- <img src="<?= base_url('assets/img/ttd_image/') . $print_mrbh['ttd_acc']; ?>"> -->
                                </td>
                            </tr>
                            <tr>
                                <td width="342">
                                    <p>&nbsp;</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="342">
                                    <p>&nbsp;</p>
                                </td>
                            </tr>
                            <tr>
                                <td width="342">
                                    <p>&nbsp;</p>
                                </td>
                                <td width="245">
                                    <p><strong>(<?= $print_mrbh['user_acc']; ?>)</strong><br>
                                        <?= $print_mrbh['jabatan_acc']; ?></p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p style="text-align: center;">&nbsp;</p>
                    <p style="text-align: center;">&nbsp;</p>
                </tbody>
            </table>
        </div> --}}
        <!-- View Berkas Akad -->
        {{-- <?php if ($print_mrbh['p_angsuran'] == 'Bulanan') {
            $this->load->view('akad/rahn_bulanan');
        } else if ($print_mrbh['p_angsuran'] == 'Musiman') {
            $this->load->view('akad/rahn_musiman');
        } else {
            $this->load->view('akad/rahn_harian');
        } ?> --}}

        {{-- <div class="content">
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                <strong><span style='font-size:21px;font-family:"Times New Roman",serif;color:black;'>SURAT PENGAKUAN
                        PEMBIAYAAN</span></strong>
            </p>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:4.65pt;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                <strong><span style='font-family:"Times New Roman",serif;color:black;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></strong>
            </p>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:4.65pt;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                <span style='font-family:"Times New Roman",serif;color:black;'>Yang bertanda tangan di bawah ini :&nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp;</span>
            </p>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:4.65pt;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                <span style='font-family:"Times New Roman",serif;color:black;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp;&nbsp;</span>
            </p>
            <table style="border: none;margin-left:4.65pt;border-collapse:collapse;">
                <tbody>
                    <tr>
                        <td style="width: 188.1pt;padding: 0in 5.4pt;height: 14.35pt;vertical-align: top;">
                            <div style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <ol style="margin-bottom:0in;list-style-type: upper-roman;margin-left:0.25in;">
                                    <li style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                        <span style="color:black;">Nama Lengkap</span>
                                    </li>
                                </ol>
                            </div>
                        </td>
                        <td style="width: 293.55pt;padding: 0in 5.4pt;height: 14.35pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['nama_pemohon'] ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 188.1pt;padding: 0in 5.4pt;height: 15.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-indent:  30.8pt;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Tempat, tanggal lahir</span>
                            </p>
                        </td>
                        <td style="width: 293.55pt;padding: 0in 5.4pt;height: 15.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['tempat_lahir'] ?>, <?= tgl_indo($print_mrbh['ttl']) ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 188.1pt;padding: 0in 5.4pt;height: 14.35pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-indent:  30.8pt;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Alamat rumah</span>
                            </p>
                        </td>
                        <td style="width: 293.55pt;padding: 0in 5.4pt;height: 14.35pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['alamat_rumah'] ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 188.1pt;padding: 0in 5.4pt;height: 15.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-indent:  30.8pt;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Pekerjaan</span>
                            </p>
                        </td>
                        <td style="width: 293.55pt;padding: 0in 5.4pt;height: 15.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['pekerjaan'] ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 188.1pt;padding: 0in 5.4pt;height: 15.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-indent:  30.8pt;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Status</span>
                            </p>
                        </td>
                        <td style="width: 293.55pt;padding: 0in 5.4pt;height: 15.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>: Penerima
                                        Pembiayaan</span></strong>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:4.65pt;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                <span style='font-family:"Times New Roman",serif;color:black;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp;&nbsp;</span>
            </p>
            <table style="border: none;margin-left:4.65pt;border-collapse:collapse;">
                <tbody>
                    <tr>
                        <td style="width: 188.1pt;padding: 0in 5.4pt;height: 14.35pt;vertical-align: top;">
                            <div style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <ol style="margin-bottom:0in;list-style-type: undefined;margin-left:20.8px;">
                                    <li style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                        <span style="color:black;">Nama Lengkap</span>
                                    </li>
                                </ol>
                            </div>
                        </td>
                        <td style="width: 293.55pt;padding: 0in 5.4pt;height: 14.35pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['nama_lengkap_saksi'] ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 188.1pt;padding: 0in 5.4pt;height: 15.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-indent:  30.8pt;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Tempat, tanggal lahir</span>
                            </p>
                        </td>
                        <td style="width: 293.55pt;padding: 0in 5.4pt;height: 15.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['tempat_lahir_saksi'] ?>,
                                        <?= tgl_indo($print_mrbh['tgl_lahir_saksi']) ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 188.1pt;padding: 0in 5.4pt;height: 14.35pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-indent:  30.8pt;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Alamat rumah</span>
                            </p>
                        </td>
                        <td style="width: 293.55pt;padding: 0in 5.4pt;height: 14.35pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['alamat_saksi']; ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 188.1pt;padding: 0in 5.4pt;height: 15.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-indent:  30.8pt;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Pekerjaan</span>
                            </p>
                        </td>
                        <td style="width: 293.55pt;padding: 0in 5.4pt;height: 15.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        <?= $print_mrbh['pekerjaan_saksi']; ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 188.1pt;padding: 0in 5.4pt;height: 15.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-indent:  30.8pt;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Status</span>
                            </p>
                        </td>
                        <td style="width: 293.55pt;padding: 0in 5.4pt;height: 15.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>: Saksi</span></strong>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-indent:35.45pt;'>
                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>&nbsp;</span>
            </p>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:35.45pt;'>
                <?php
                if ($print_mrbh['p_angsuran'] == 'Bulanan') { ?>
                    <span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;color:black;'>Mengakui bahwa
                        pada hari: <strong><?= hari_ini($print_mrbh['date_akad']) ?></strong> Tanggal
                        <strong><?= tgl_indo($print_mrbh['date_akad']) ?></strong> telah menerima &nbsp;dana pembiayaan sebesar
                        <strong><?= convertRupiah($print_mrbh['nominal_acc']) ?></strong>- dari <strong>KOPSYAH BMTNU NGASEM JAWA
                            TIMUR</strong> <strong><?= $print_mrbh['kantor_akad']; ?>,</strong> yang selanjutnya disebut BMT dan
                        akan saya angsur selama <strong><?= $print_mrbh['jangka_waktu']; ?></strong>
                        <?php
                        if ($print_mrbh['p_angsuran'] == 'Harian') {
                            echo 'Hari';
                        } else {
                            echo 'Bulan';
                        }
                        ?> sebesar
                        <strong><?= convertRupiah($print_mrbh['qard_pokok']) ?></strong> pembiayaan tersebut setelah ditambah
                        Ujrotul Khifdzi <strong><?= convertRupiah($print_mrbh['qard_ujroh']) ?></strong> setiap bulan sehingga
                        total
                        <strong><?= convertRupiah($print_mrbh['angsuran_qard']); ?>.</strong>&nbsp;</span>
                <?php
                } else { ?>
                    <span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;color:black;'>Mengakui bahwa
                        pada hari: <strong><?= hari_ini($print_mrbh['date_akad']) ?></strong> Tanggal
                        <strong><?= tgl_indo($print_mrbh['date_akad']) ?></strong> telah menerima &nbsp;dana pembiayaan sebesar
                        <strong><?= convertRupiah($print_mrbh['nominal_acc']) ?></strong>- dari <strong>KOPSYAH BMTNU NGASEM JAWA
                            TIMUR</strong> <strong><?= $print_mrbh['kantor_akad']; ?>,</strong> yang selanjutnya disebut BMT dan
                        akan saya angsur selama <strong><?= $print_mrbh['jangka_waktu']; ?></strong>
                        <?php
                        if ($print_mrbh['p_angsuran'] == 'Harian') {
                            echo 'Hari';
                        } else {
                            echo 'Bulan';
                        }
                        ?> dengan metode
                        <?php
                        if ($print_mrbh['p_angsuran'] == 'Harian') {
                            echo 'Harian';
                        } else if ($print_mrbh['p_angsuran'] == 'Musiman') {
                            echo 'Musiman';
                        } else {
                            echo 'Bulanan';
                        }
                        ?>. yang mana setiap bulan saya bersedia memberikan ujroh penjagaan barang yang saya jaminkan sebesar<?= convertRupiah($print_mrbh['qard_ujroh']) ?> serta akan melunasi jumlah pokok pembiayaan sebesar
                        <strong><?= convertRupiah($print_mrbh['nominal_acc']) ?></strong> bersamaan dengan berakhirnya perjanjian ini.
                    <?php
                }
                    ?>
            </p><br>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:35.45pt;'>
                <span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;color:black;'>Adapun Biaya ATK
                    <strong><?= convertRupiah($print_mrbh['atk']) ?></strong> ditambah Materai
                    <strong><?= convertRupiah($print_mrbh['materai']) ?></strong> Tabarru
                    Syariah<strong>&nbsp;<?= convertRupiah($print_mrbh['tabarru']) ?></strong> Wakaf
                    <strong><?= convertRupiah($print_mrbh['wakaf']) ?></strong> dan Simpanan Wajib
                    <strong><?= convertRupiah($print_mrbh['simp_wajib']) ?></strong> sehingga total
                    <strong><?= convertRupiah($print_mrbh['t_biaya_akad']) ?></strong> saya bayar lunas saat pembiayaan
                    dicairkan.</span>
            </p><br>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:35.45pt;'>
                <span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;color:black;'>Untuk pembiayaan
                    ini saya menjaminkan pada KOPSYAH BMT NU NGASEM berupa :
                    <?php if ($print_mrbh['an_bpkb'] != null) {
                        echo 'BPKB /';
                    } else if ($print_mrbh['no_nib'] != null) {
                        echo 'SHM /';
                    } else if ($print_mrbh['nama_porsi'] != null) {
                        echo 'Nomor Porsi /';
                    } ?>
                    Lainnya. Barang-barang jaminan tersebut di atas adalah milik saya sendiri atau jaminan yang sudah di kuasakan kepada saya sesuai surat kuasa yang terlampir, tidak dalam keadaan digadaikan
                    atau dipertanggungkan dengan cara apa pun juga kepada orang atau bank lain dan saya tidak akan menggadaikan
                    atau menjualnya selama pembiayaan belum dibayar lunas.</span>
            </p><br>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:35.45pt;'>
                <span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;color:black;'>Apabila saya
                    tidak dapat melunasi pembiayaan saya kepada KOPSYAH BMT NU NGASEM dan setelah KOPSYAH BMT NU NGASEM memberi
                    surat peringatan 1, 2, dan 3 untuk melunasi pembiayaan tersebut di atas, maka dengan ini saya memberi kuasa
                    penuh kepada KOPSYAH BMT NU NGASEM untuk menjual barang jaminan tersebut, dan apabila ada kekurangan atau
                    kelebihan dari hasil penjualan diperhitungkan dengan hutang dan kewajiban saya.</span>
            </p>

            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:35.45pt;'>
                <span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;color:black;'>Demikian surat
                    pengakuan pembiayaan nomor akad : <?= $print_mrbh['no_akad'] ?> &nbsp;ini saya buat dengan sebenar-benarnya
                    dan tanpa paksaan dari pihak mana pun.</span>
            </p>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>&nbsp;</span>
            </p>
            <table style="border: none;border-collapse:collapse;">
                <tbody>
                    <tr>
                        <td style="width: 244.05pt;padding: 0in 5.4pt;height: 18.2pt;vertical-align: top;">
                            <p style='margin-top:1.45pt;margin-right:0in;margin-bottom:1.45pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <span style='font-family:"Times New Roman",serif;'>&nbsp;</span>
                            </p>
                        </td>
                        <td style="width: 244.05pt;padding: 0in 5.4pt;height: 18.2pt;vertical-align: top;">
                            <p style='margin-top:1.45pt;margin-right:0in;margin-bottom:1.45pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <span style='font-family:"Times New Roman",serif;'><?= $print_mrbh['desa'] ?>,
                                    <?= tgl_indo($print_mrbh['date_akad']) ?></span>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 244.05pt;padding: 0in 5.4pt;height: 18.2pt;vertical-align: top;">
                            <p style='margin-top:1.45pt;margin-right:0in;margin-bottom:1.45pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <span style='font-family:"Times New Roman",serif;'>Petugas KOPSYAH BMTNU NGASEM</span>
                            </p>
                        </td>
                        <td style="width: 244.05pt;padding: 0in 5.4pt;height: 18.2pt;vertical-align: top;">
                            <p style='margin-top:1.45pt;margin-right:0in;margin-bottom:1.45pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <span style='font-family:"Times New Roman",serif;'>Penerima Pembiayaan</span>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 244.05pt;padding: 0in 5.4pt;height: 56.7pt;vertical-align: top;">
                            <p style='margin-top:1.45pt;margin-right:0in;margin-bottom:  1.45pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <span style='font-family:"Times New Roman",serif;'>&nbsp;</span>
                            </p>
                        </td>
                        <td style="width: 244.05pt;padding: 0in 5.4pt;height: 56.7pt;vertical-align: top;">
                            <p style='margin-top:1.45pt;margin-right:0in;margin-bottom:1.45pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <span style='font-family:"Times New Roman",serif;'>&nbsp;</span>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 244.05pt;padding: 0in 5.4pt;height: 17.5pt;vertical-align: top;">
                            <p style='margin-top:1.45pt;margin-right:0in;margin-bottom:1.45pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><span style='font-family:"Times New Roman",serif;'>(<?= $print_mrbh['petugas_akad'] ?>)</span></strong>
                            </p>
                        </td>
                        <td style="width: 244.05pt;padding: 0in 5.4pt;height: 17.5pt;vertical-align: top;">
                            <p style='margin-top:1.45pt;margin-right:0in;margin-bottom:1.45pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><span style='font-family:"Times New Roman",serif;'>(.........................)</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="width: 488.1pt;padding: 0in 5.4pt;height: 17.5pt;vertical-align: top;">
                            <p style='margin-top:1.45pt;margin-right:0in;margin-bottom:1.45pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 244.05pt;padding: 0in 5.4pt;height: 17.5pt;vertical-align: top;">
                            <p style='margin-top:1.45pt;margin-right:0in;margin-bottom:1.45pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><span style='font-family:"Times New Roman",serif;'>Saksi I</span></strong>
                            </p>
                        </td>
                        <td style="width: 244.05pt;padding: 0in 5.4pt;height: 17.5pt;vertical-align: top;">
                            <p style='margin-top:1.45pt;margin-right:0in;margin-bottom:1.45pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><span style='font-family:"Times New Roman",serif;'>Saksi II</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 244.05pt;padding: 0in 5.4pt;height: 56.7pt;vertical-align: top;">
                            <p style='margin-top:1.45pt;margin-right:0in;margin-bottom:1.45pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></strong>
                            </p>
                        </td>
                        <td style="width: 244.05pt;padding: 0in 5.4pt;height: 56.7pt;vertical-align: top;">
                            <p style='margin-top:1.45pt;margin-right:0in;margin-bottom:1.45pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><span style='font-family:"Times New Roman",serif;'>&nbsp;</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 244.05pt;padding: 0in 5.4pt;height: 17.5pt;vertical-align: top;">
                            <p style='margin-top:1.45pt;margin-right:0in;margin-bottom:1.45pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><span style='font-family:"Times New Roman",serif;'>( .................. )</span></strong>
                            </p>
                        </td>
                        <td style="width: 244.05pt;padding: 0in 5.4pt;height: 17.5pt;vertical-align: top;">
                            <p style='margin-top:1.45pt;margin-right:0in;margin-bottom:1.45pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><span style='font-family:"Times New Roman",serif;'>( ..................... )</span></strong>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div> --}}


        {{-- <div class="content">
            <p style="text-align: center;"><strong><u>TANDA TERIMA JAMINAN</u></strong></p>
            <p style="text-align: center;"><strong>Nomor Akad : <?= $print_mrbh['no_akad'] ?></strong></p>
            <p>Pada hari <?= hari_ini($print_mrbh['date_akad']); ?> tanggal <?= tgl_indo($print_mrbh['date_akad']); ?>&nbsp; telah terima dari :</p>
            <table>
                <tbody>
                    <tr>
                        <td width="284">
                            <p>Nama</p>
                        </td>
                        <td width="366">
                            <p>: <?= $print_mrbh['nama_pemohon'] ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="284">
                            <p>Alamat</p>
                        </td>
                        <td width="366">
                            <p>: <?= $print_mrbh['alamat_rumah'] ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="284">
                            <p>No. HP</p>
                        </td>
                        <td width="366">
                            <p>: <?= $print_mrbh['no_hp_pemohon'] ?></p>
                        </td>
                    </tr>

                </tbody>
            </table>
            <p>Jaminan berupa&nbsp; <?php if ($print_mrbh['merk'] != null) {
                                        echo 'BPKB';
                                    } else {
                                        echo '';
                                    } ?>
                <?php if ($print_mrbh['no_nib'] != null) {
                    echo 'SHM';
                } else {
                    echo '';
                } ?>

                <?php if ($print_mrbh['no_porsi'] != null) {
                    echo 'NOMOR PORSI';
                } else {
                    echo '';
                }
                ?> Lainnya dengan spesifikasi sebagai berikut :</p>
            <table style="width:490.5pt;margin-left:.9pt;border-collapse:collapse;border:none;">
                <tbody>
                    <tr>
                        <td colspan="2" style="width: 490.5pt;background: yellow;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>DATA
                                        JAMINAN</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="width: 490.5pt;background: rgb(146, 208, 80);padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <div style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <ol style="margin-bottom:0in;list-style-type: decimal;">
                                    <li style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                        <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;color:#1D1B11;'>BPKB</span></strong>
                                    </li>
                                </ol>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.15pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Jenis / Merk / Tahun</span>
                            </p>
                        </td>
                        <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.15pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        <?= $print_mrbh['jenis_bpkb'] == null ? "-" : $print_mrbh['jenis_bpkb'] ?>/<?= $print_mrbh['merk'] == null ? "-" : $print_mrbh['merk'] ?>/<?= $print_mrbh['tahun_bpkb'] == null ? "-" : $print_mrbh['tahun_bpkb'] ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>No. BPKB</span>
                            </p>
                        </td>
                        <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        <?= $print_mrbh['no_bpkb'] == null ? "-" : $print_mrbh['no_bpkb'] ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.15pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Atas Nama</span>
                            </p>
                        </td>
                        <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.15pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        <?= $print_mrbh['an_bpkb'] == null ? "-" : $print_mrbh['an_bpkb'] ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Alamat</span>
                            </p>
                        </td>
                        <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        <?= $print_mrbh['alamat_bpkb'] == null ? "-" : $print_mrbh['alamat_bpkb'] ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.15pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Warna</span>
                            </p>
                        </td>
                        <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.15pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        <?= $print_mrbh['warna'] == null ? "-" : $print_mrbh['warna'] ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>No. Polisi</span>
                            </p>
                        </td>
                        <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        <?= $print_mrbh['no_polisi'] == null ? "-" : $print_mrbh['no_polisi'] ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>No. Rangka / Mesin</span>
                            </p>
                        </td>
                        <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        <?= $print_mrbh['no_rangka'] == null ? "-" : $print_mrbh['no_rangka'] ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Dikeluarkan Oleh</span>
                            </p>
                        </td>
                        <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        <?= $print_mrbh['outby'] == null ? "-" : $print_mrbh['outby'] ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="width: 490.5pt;background: rgb(146, 208, 80);padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <div style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <ol style="margin-bottom:0in;list-style-type: undefined;">
                                    <li style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                        <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;color:#1D1B11;'>SERTIFIKAT
                                                HAK MILIK</span></strong>
                                    </li>
                                </ol>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Jenis</span>
                            </p>
                        </td>
                        <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        <?php if ($print_mrbh['no_nib'] != null) {
                                            echo 'SHM';
                                        } else {
                                            echo '';
                                        } ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>No. NIB</span>
                            </p>
                        </td>
                        <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        <?= $print_mrbh['no_nib'] == null ? "-" : $print_mrbh['no_nib'] ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Atas Nama</span>
                            </p>
                        </td>
                        <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        <?= $print_mrbh['an_sertifikat'] == null ? "-" : $print_mrbh['an_sertifikat'] ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Luas</span>
                            </p>
                        </td>
                        <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        <?= $print_mrbh['luas'] == null ? "-" : $print_mrbh['luas'] ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Alamat</span>
                            </p>
                        </td>
                        <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        <?= $print_mrbh['alamat_sertifikat'] == null ? "-" : $print_mrbh['alamat_sertifikat'] ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Nilai Taksir Agunan</span>
                            </p>
                        </td>
                        <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        <?= $print_mrbh['nilai_sertifikat'] == null ? "-" : convertRupiah($print_mrbh['nilai_sertifikat']); ?></span></strong>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;'>
                <strong><span style='font-size:11px;line-height:115%;font-family:"Times New Roman",serif;color:#1D1B11;'>&nbsp;</span></strong>
            </p>
            <table style="width:491.4pt;border-collapse:collapse;border:none;">
                <tbody>
                    <tr>
                        <td colspan="2" style="width: 491.4pt;background: rgb(146, 208, 80);padding: 0in 5.4pt;height: 13.9pt;vertical-align: top;">
                            <div style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <ol style="margin-bottom:0in;list-style-type: undefined;">
                                    <li style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                        <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;color:#1D1B11;'>BPIH/NOMOR
                                                PORSI HAJI</span></strong>
                                    </li>
                                </ol>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 217pt;padding: 0in 5.4pt;height: 13.9pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Nama</span>
                            </p>
                        </td>
                        <td style="width: 274.4pt;padding: 0in 5.4pt;height: 13.9pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        <?= $print_mrbh['nama_porsi'] == null ? "-" : $print_mrbh['nama_porsi']; ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 217pt;padding: 0in 5.4pt;height: 13.1pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Alamat</span>
                            </p>
                        </td>
                        <td style="width: 274.4pt;padding: 0in 5.4pt;height: 13.1pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        <?= $print_mrbh['alamat_porsi'] == null ? "-" : $print_mrbh['alamat_porsi']; ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 217pt;padding: 0in 5.4pt;height: 13.9pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>No. Porsi</span>
                            </p>
                        </td>
                        <td style="width: 274.4pt;padding: 0in 5.4pt;height: 13.9pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        <?= $print_mrbh['no_porsi'] == null ? "-" : $print_mrbh['no_porsi']; ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 217pt;padding: 0in 5.4pt;height: 13.9pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Bank</span>
                            </p>
                        </td>
                        <td style="width: 274.4pt;padding: 0in 5.4pt;height: 13.9pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        <?= $print_mrbh['bank'] == null ? "-" : $print_mrbh['bank']; ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="width: 491.4pt;background: rgb(146, 208, 80);padding: 0in 5.4pt;height: 13.1pt;vertical-align: top;">
                            <div style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <ol style="margin-bottom:0in;list-style-type: undefined;">
                                    <li style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                        <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>JAMINAN
                                                LAINYA</span></strong>
                                    </li>
                                </ol>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="width: 491.4pt;padding: 0in 5.4pt;height: 13.1pt;vertical-align: top;">
                            <div style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <ol start="1" style="margin-bottom:0in;list-style-type: lower-alpha;">
                                    <li style='margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;'>
                                        <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'><?= $print_mrbh['jenis_jaminan_o'] == null ? "-" : $print_mrbh['jenis_jaminan_o']; ?></span></strong>
                                    </li>
                                </ol>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 217pt;padding: 0in 5.4pt;height: 13.9pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Nama</span>
                            </p>
                        </td>
                        <td style="width: 274.4pt;padding: 0in 5.4pt;height: 13.9pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        <?= $print_mrbh['nama_jaminan_o'] == null ? "-" : $print_mrbh['nama_jaminan_o']; ?></span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 217pt;padding: 0in 5.4pt;height: 13.9pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Nomor </span>
                            </p>
                        </td>
                        <td style="width: 274.4pt;padding: 0in 5.4pt;height: 13.9pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        <?= $print_mrbh['nomorjlain'] == null ? "-" : $print_mrbh['nomorjlain']; ?></span></strong>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:4.65pt;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>&nbsp;</span></strong>
            </p>
            <p>Demikian surat tanda terima ini dibuat apabila anggota akan mengambil barang jaminan tersebut di atas setelah anggota melakukan pelunasan pembiayaan maka surat ini harus dibawa.</p>
            <table>
                <tbody>
                    <tr>
                        <td style="text-align: center;" width="325">
                            <p>Yang Menyerahkan</p>
                        </td>
                        <td style="text-align: center;" width="325">
                            <p>Yang Menerima</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;" width="325">
                            <p>Anggota</p>
                        </td>
                        <td style="text-align: center;" width="325">
                            <p>Petugas Akad</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;" width="325">
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                        </td>
                        <td style="text-align: center;" width="325">
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;" width="325">
                            <p><strong>(<?= $print_mrbh['nama_pemohon']; ?>)</strong></p>
                        </td>
                        <td style="text-align: center;" width="325">
                            <p><strong>(<?= $print_mrbh['petugas_akad']; ?>)</strong></p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div> --}}
    </main>
</body>

</html>