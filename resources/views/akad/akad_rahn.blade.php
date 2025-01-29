
<html moznomarginboxes mozdisallowselectionprint>

<head>
    <title>Akad-Rahn-{{ $agreement->permohonan->anggota->name }}-Hari{{ \Carbon\Carbon::parse($agreement->created_at)->isoFormat('dddd') }}Tanggal-Akad-{{ \Carbon\Carbon::parse($agreement->created_at)->isoFormat('DD MMMM YYYY') }}</title>
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

        /* table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        }

        tr:nth-child(even) {
        background-color: #dddddd;
        } */
        

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

        .grid-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            padding: 20px;
        }

        .grid-item {
            border: 1px solid #000000;
            padding: 10px;
            text-align: center;
        }

        .qrcode {
            width: 100px;
            height: 100px;
            margin: 0 auto;
        }

    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
</head>

<body onload="window.print()">

    <header>
        <img src="{{ url('storage/images/kop.png') }}" width="100%" height="100%"/>
    </header>

    <footer>
        <img src="{{ url('storage/images/footer.png') }}" width="100%" height="100%" />
    </footer>
    <main>
        <!-- Isian Data Permohonan Pembiayaan -->
        <div class="content">
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:-.25in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                <strong><u><span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>ISIAN DATA PERMOHONAN
                            PEMBIAYAAN</span></u></strong>
            </p>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:-.25in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>
                    Nomor Pengajuan: {{ $agreement->permohonan->nomor_permohonan }} 
                    Hari/Tanggal: {{ \Carbon\Carbon::parse($agreement->created_at)->isoFormat('dddd, D MMMM Y') }}
                </span>
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
                                <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>:&nbsp;</span></strong><strong><span style='font-size:16px;font-family:"Times New Roman",serif;'>{{ $agreement->nomor_agreement }}</span></strong>
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
                                        <b>{{ \Carbon\Carbon::parse($agreement->created_at)->isoFormat('dddd') }}</b></span></strong>
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
                                    {{ \Carbon\Carbon::parse($agreement->created_at)->isoFormat('D MMMM Y') }}</span></strong>
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
                                        Nama Branch Manager</span></strong>
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
                                        {{ $agreement->permohonan->anggota->name }} </span></strong>
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
                                        {{ $agreement->permohonan->anggota->tempat_lahir }}, {{ \Carbon\Carbon::parse($agreement->permohonan->anggota->tanggal_lahir)->isoFormat('D MMMM Y') }}</span></strong>
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
                                        {{ $agreement->permohonan->anggota->nik }}</span></strong>
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
                                        {{ $agreement->permohonan->anggota->jenis_kelamin }}</span></strong>
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
                                        {{ $agreement->permohonan->anggota->age }} tahun</span></strong>
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
                                        {{ Str::upper($agreement->permohonan->anggota->pendidikan) }}</span></strong>
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
                                        {{ $agreement->permohonan->anggota->alamat }}</span></strong>
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
                                        {{ $agreement->permohonan->anggota->no_hp }}</span></strong>
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
                                        {{ Str::upper($agreement->permohonan->status_rumah) }}</span></strong>
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
                                        {{ Str::upper($agreement->permohonan->anggota->pekerjaan) }}</span></strong>
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
                                        {{ $agreement->permohonan->alamat_usaha }}</span></strong>
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
                                        {{ $agreement->permohonan->nama_ahli_waris }}</span></strong>
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
                                    {{ $agreement->permohonan->nama_ahli_waris }}</span></strong>
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
                                    {{ $agreement->permohonan->alamat_ahli_waris }}</span></strong>
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
                                        {{ $agreement->permohonan->istri }} Orang</span></strong>
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
                                        {{ $agreement->permohonan->orang_tua }} Orang</span></strong>
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
                                    {{ $agreement->permohonan->anak }} Orang</span></strong>
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
                                    {{ $agreement->permohonan->other }} Orang</span></strong>
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
                                        Piutang {{ $agreement->permohonan->pembiayaan->name }}</span></strong>
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
                                        Rp. {{ number_format($agreement->nominal_qard ,0, ',', '.') }}</span></strong>
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
                                    Rp. {{ number_format($agreement->qard_pokok ,0, ',', '.') }}</span></strong>
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
                                        Rp. {{ number_format($agreement->qard_ujroh ,0, ',', '.') }}</span></strong>
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
                                    Rp. {{ number_format($agreement->angsuran_qard ,0, ',', '.') }}</span></strong>
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
                                        {{ $agreement->permohonan->angsuran->periode }}</span></strong>
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
                                        {{ $agreement->permohonan->lama_angsuran }} Bulan</span></strong>
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
                                <strong>@foreach ( $agreement->permohonan->agunan as $a )
                                    <span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>:
                                        {{ Str::upper($a->type_agunan)}}
                                    </span>
                                @endforeach</strong>
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
                                    {{ $agreement->permohonan->permohonan_ke }}</span></strong>
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
                                    {{ \Carbon\Carbon::parse($agreement->tempo_awal)->isoFormat('D MMMM Y') }}</span></strong>
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
                                    {{ \Carbon\Carbon::parse($agreement->tempo_akhir)->isoFormat('D MMMM Y') }}</span></strong>
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
                                        {{ $agreement->permohonan->keperluan }}</span></strong>
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
                                    Rp {{ number_format( $agreement->materai ,0, ',', '.') }}</span></strong>
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
                                        Rp {{ number_format($agreement->atk,0, ',', '.') }}</span></strong>
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
                                        Rp {{ number_format($agreement->tabarru,0, ',', '.') }}</span></strong>
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
                                        Rp {{ number_format($agreement->wakaf,0, ',', '.') }}</span></strong>
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
                                        Rp {{ number_format($agreement->sim_wajib,0, ',', '.') }}</span></strong>
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
                                        Rp {{ number_format($agreement->total_biaya_akad,0, ',', '.') }}</span></strong>
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

        <div class="content">
            <table style="width:490.5pt;margin-left:.9pt;border-collapse:collapse;border:none;">
                <tbody>
                    <tr>
                        <td colspan="2" style="width: 490.5pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>DATA AGUNAN PEMBIAYAAN
                                        </span></strong>
                            </p>
                        </td>
                    </tr>
                    
                    @foreach ($agreement->permohonan->agunan as $a)
                        <tr>
                            <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.15pt;vertical-align: top;">
                                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                    <span style='font-family:"Times New Roman",serif;color:#1D1B11;'></span>
                                </p>
                            </td>
                            <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.15pt;vertical-align: top;">
                                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                    <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>
                                            </span></strong>
                                </p>
                            </td>
                        </tr>
                        
                        <tr>
                            <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.15pt;vertical-align: top;">
                                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                    <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Agunan</span>
                                </p>
                            </td>
                            <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.15pt;vertical-align: top;">
                                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                    <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                            {{ Str::upper($a->type_agunan) }}</span></strong>
                                </p>
                            </td>
                        </tr>
                        
                        
                        <tr>
                            <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.15pt;vertical-align: top;">
                                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                    <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Merk / Tahun</span>
                                </p>
                            </td>
                            <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.15pt;vertical-align: top;">
                                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                    <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                            {{ $a->merk }}/{{ $a->tahun }}</span></strong>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                    <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Nomor Agunan</span>
                                </p>
                            </td>
                            <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                    <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                            {{ $a->nomor_agunan }}</span></strong>
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
                                            {{ $a->atas_nama }}</span></strong>
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
                                            {{ $a->warna }}</span></strong>
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
                                            {{ $a->nopol }}</span></strong>
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
                                            {{ $a->nomor_rangka }}</span></strong>
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
                                            {{ $a->luas }}</span></strong>
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
                                            {{ $a->alamat_agunan }}</span></strong>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                    <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Bank</span>
                                </p>
                            </td>
                            <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                    <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                            {{ $a->bank}}</span></strong>
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
                                            Rp {{ number_format($a->nilai_taksir,0,',','.') }}</span></strong>
                                </p>
                            </td>
                        </tr>
                    @endforeach
                    
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
                                        {{ $agreement->permohonan->nama_ahli_waris }}</span></strong>
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
                                        {{ $agreement->permohonan->anggota->tempat_lahir }},
                                        {{ \Carbon\Carbon::parse($agreement->permohonan->tanggal_ahli_waris)->isoFormat(' D MMMM Y')}}</span></strong>
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
                                        {{ $agreement->permohonan->nik_ahli_waris }}</span></strong>
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
                                        Tambah di db</span></strong>
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
                                        {{ $agreement->permohonan->umur_ahli_waris }}                                        Tahun</span></strong>
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
                                        {{ $agreement->permohonan->alamat_ahli_waris }}</span></strong>
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
                                        {{$agreement->permohonan->pekerjaan_ahli_waris }}</span></strong>
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
                <strong><span style='font-family:"Times New Roman",serif;color:black;'>Manager KSPP Syariah BMT NU Ngasem
                Jawa Timur</span></strong>
            </p>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                <strong><span style='font-family:"Times New Roman",serif;color:black;'>Permohonan Pembiayaan</span></strong>
            </p>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                <span style='font-size:13px;font-family:"Times New Roman",serif;color:black;'>Sesuai Berkas Permohonan Nomor :
                    Tambah di Database</span>
            </p>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:4.65pt;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                <span style='font-family:"Times New Roman",serif;color:black;'>&nbsp;</span>
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
                                <strong><span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>:&nbsp;</span></strong><strong><span style='font-size:16px;font-family:"Times New Roman",serif;'>{{ $agreement->nomor_agreement }}</span></strong>
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
                                        <b>{{ \Carbon\Carbon::parse($agreement->created_at)->isoFormat('dddd') }}</b></span></strong>
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
                                    {{ \Carbon\Carbon::parse($agreement->created_at)->isoFormat('D MMMM Y') }}</span></strong>
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
                                        Nama Branch Manager</span></strong>
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
                                        {{ $agreement->permohonan->anggota->name }} </span></strong>
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
                                        {{ $agreement->permohonan->anggota->tempat_lahir }}, {{ \Carbon\Carbon::parse($agreement->permohonan->anggota->tanggal_lahir)->isoFormat('D MMMM Y') }}</span></strong>
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
                                        {{ $agreement->permohonan->anggota->nik }}</span></strong>
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
                                        {{ $agreement->permohonan->anggota->jenis_kelamin }}</span></strong>
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
                                        {{ $agreement->permohonan->anggota->age }} tahun</span></strong>
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
                                        {{ Str::upper($agreement->permohonan->anggota->pendidikan) }}</span></strong>
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
                                        {{ $agreement->permohonan->anggota->alamat }}</span></strong>
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
                                        {{ $agreement->permohonan->anggota->no_hp }}</span></strong>
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
                                        {{ Str::upper($agreement->permohonan->status_rumah) }}</span></strong>
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
                                        {{ $agreement->permohonan->anggota->pekerjaan }}</span></strong>
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
                                        {{ $agreement->permohonan->alamat_usaha }}</span></strong>
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
                                        {{ $agreement->permohonan->nama_ahli_waris }}</span></strong>
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
                                    {{ $agreement->permohonan->nama_ahli_waris }}</span></strong>
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
                                    {{ $agreement->permohonan->alamat_ahli_waris }}</span></strong>
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
                                        {{ $agreement->permohonan->istri }} Orang</span></strong>
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
                                        {{ $agreement->permohonan->orang_tua }} Orang</span></strong>
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
                                    {{ $agreement->permohonan->anak }} Orang</span></strong>
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
                                    {{ $agreement->permohonan->other }} Orang</span></strong>
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
                                        Piutang {{ $agreement->permohonan->pembiayaan->name }}</span></strong>
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
                                        Rp. {{ number_format($agreement->nominal_qard ,0, ',', '.') }}</span></strong>
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
                                    Rp. {{ number_format($agreement->qard_pokok ,0, ',', '.') }}</span></strong>
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
                                        Rp. {{ number_format($agreement->qard_ujroh ,0, ',', '.') }}</span></strong>
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
                                    Rp. {{ number_format($agreement->angsuran_qard ,0, ',', '.') }}</span></strong>
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
                                        {{ $agreement->permohonan->angsuran->periode }}</span></strong>
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
                                        {{ $agreement->permohonan->lama_angsuran }} Bulan</span></strong>
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
                                <strong>@foreach ( $agreement->permohonan->agunan as $a )
                                    <span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>:
                                        {{ Str::upper($a->type_agunan)}}
                                    </span>
                                @endforeach</strong>
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
                                    {{ $agreement->permohonan->permohonan_ke }}</span></strong>
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
                                    {{ \Carbon\Carbon::parse($agreement->tempo_awal)->isoFormat('D MMMM Y') }}</span></strong>
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
                                    {{ \Carbon\Carbon::parse($agreement->tempo_akhir)->isoFormat('D MMMM Y') }}</span></strong>
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
                                        {{ $agreement->permohonan->keperluan }}</span></strong>
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
                                    Rp {{ number_format( $agreement->materai ,0, ',', '.') }}</span></strong>
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
                                        Rp {{ number_format($agreement->atk,0, ',', '.') }}</span></strong>
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
                                        Rp {{ number_format($agreement->tabarru,0, ',', '.') }}</span></strong>
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
                                        Rp {{ number_format($agreement->wakaf,0, ',', '.') }}</span></strong>
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
                                        Rp {{ number_format($agreement->sim_wajib,0, ',', '.') }}</span></strong>
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
                                        Rp {{ number_format($agreement->total_biaya_akad,0, ',', '.') }}</span></strong>
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

            @foreach ($agreement->permohonan->berkas as $index => $berkas)
                <span>{{ $index + 1 }}. {{ $berkas }} <br></span>
            @endforeach
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                <span style='font-family:"Times New Roman",serif;color:black;'>&nbsp;</span>
            </p>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:35.45pt;'>
                <span style='font-family:"Times New Roman",serif;color:black;'>Demikian permohonan ini kami buat dengan
                    sesungguhnya &amp; kami sanggup mentaati peraturan KSPP Syariah BMT NU Ngasem Jawa Timur &nbsp;yang berkait
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
                                <span style='font-family:"Times New Roman",serif;'>{{ $agreement->permohonan->office->village }},
                                    {{ \Carbon\Carbon::parse($agreement->permohonan->created_at)->isoFormat('D MMMM Y') }}</span>
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
                                <strong><span style='font-family:"Times New Roman",serif;'>(....................................)</span></strong>
                            </p>
                        </td>
                        <td style="width: 244.05pt;padding: 0in 5.4pt;height: 17.5pt;vertical-align: top;">
                            <p style='margin-top:1.45pt;margin-right:0in;margin-bottom:1.45pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <strong><span style='font-family:"Times New Roman",serif;'>(....................................)</span></strong>
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
                        <td style="width: 208.55pt;padding: 0in 5.4pt;height: 14.15pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;margin:0in;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Nama</span>
                            </p>
                        </td>
                        <td style="width: 252.65pt;padding: 0in 5.4pt;height: 14.15pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>:
                                        {{ $agreement->permohonan->nama_ahli_waris }}</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 208.55pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Tempat, Tanggal Lahir</span>
                            </p>
                        </td>
                        <td style="width: 252.65pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>:
                                        {{ $agreement->permohonan->anggota->tempat_lahir  }}, {{ \Carbon\Carbon::parse($agreement->permohonan->tanggal_ahli_waris)->isoFormat('D MMMM Y') }}</span></strong>
                            </p>
                        </td>
                    </tr>
                    
                    <tr>
                        <td style="width: 208.55pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Alamat Rumah</span>
                            </p>
                        </td>
                        <td style="width: 252.65pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>:
                                        {{ $agreement->permohonan->alamat_ahli_waris }}</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 208.55pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Pekerjaan</span>
                            </p>
                        </td>
                        <td style="width: 252.65pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>:
                                        {{ $agreement->permohonan->pekerjaan_ahli_waris }}</span></strong>
                            </p>
                        </td>
                    </tr>
                    
                    <tr>
                        <td style="width: 208.55pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>NIK</span>
                            </p>
                        </td>
                        <td style="width: 252.65pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>:
                                        {{ $agreement->permohonan->nik_ahli_waris }}</span></strong>
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
                        <td style="width: 208.55pt;padding: 0in 5.4pt;height: 14.15pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:.5in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;margin:0in;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Nama</span>
                            </p>
                        </td>
                        <td style="width: 252.65pt;padding: 0in 5.4pt;height: 14.15pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>:
                                        {{ $agreement->permohonan->nama_ahli_waris }}</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 208.55pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Tempat, Tanggal Lahir</span>
                            </p>
                        </td>
                        <td style="width: 252.65pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>:
                                        {{ $agreement->permohonan->anggota->tempat_lahir  }}, {{ \Carbon\Carbon::parse($agreement->permohonan->tanggal_ahli_waris)->isoFormat('D MMMM Y') }}</span></strong>
                            </p>
                        </td>
                    </tr>
                    
                    <tr>
                        <td style="width: 208.55pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Alamat Rumah</span>
                            </p>
                        </td>
                        <td style="width: 252.65pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>:
                                        {{ $agreement->permohonan->alamat_ahli_waris }}</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 208.55pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>Pekerjaan</span>
                            </p>
                        </td>
                        <td style="width: 252.65pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>:
                                        {{ $agreement->permohonan->pekerjaan_ahli_waris }}</span></strong>
                            </p>
                        </td>
                    </tr>
                    
                    <tr>
                        <td style="width: 208.55pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <span style='font-size:16px;font-family:"Times New Roman",serif;color:black;'>NIK</span>
                            </p>
                        </td>
                        <td style="width: 252.65pt;padding: 0in 5.4pt;height: 13.2pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-size:16px;font-family:  "Times New Roman",serif;color:black;'>:
                                        {{ $agreement->permohonan->nik_ahli_waris }}</span></strong>
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
                    permohonan pembiayaan di<strong>&nbsp;KSPP Syariah BMT NU NGASEM
                        {{ $agreement->permohonan->office->name }}</strong>, dengan surat
                    pernyataan ini saya juga bertanggung jawab atas pengambilan / pembayaran angsuran sampai dengan pembiayaan
                    dengan atas nama
                    <strong>{{ $agreement->permohonan->anggota->name }}</strong> dinyatakan
                    <u>LUNAS&nbsp;</u>oleh petugas <strong>KSPP Syariah BMT NU NGASEM JAWA TIMUR
                        {{ $agreement->permohonan->office->name }}</strong><u>.</u></span>
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
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>{{ $agreement->permohonan->anggota->tempat_lahir }},
                                        {{ \Carbon\Carbon::parse($agreement->created_at)->isoFormat('D MMMM Y') }}</span></strong>
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
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>(................................)</span></strong>
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
                    Tambah di Database Tanggal Survey : {{ \Carbon\Carbon::parse($surveyor->created_at)->isoFormat('D MMMM Y') }} </span>
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
                            <p><strong>: {{ $agreement->permohonan->anggota->name }}</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="150">
                            <p>Alamat</p>
                        </td>
                        <td colspan="2" width="456">
                            <p><strong>: {{ $agreement->permohonan->anggota->alamat }}</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="150">
                            <p>Pekerjaan</p>
                        </td>
                        <td colspan="2" width="456">
                            <p><strong>: {{ $agreement->permohonan->anggota->pekerjaan }}</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="150">
                            <p>Agunan</p>
                        </td>
                        <td colspan="2" width="456">
                            
                            <p><strong>@foreach ($agreement->permohonan->agunan as $index => $agunan)
                                <span>: {{ $index + 1 }}. {{ Str::upper($agunan->type_agunan) }} <br></span>
                                @endforeach</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="150">
                            <p>Nominal Pembiayaan</p>
                        </td>
                        <td colspan="2" width="456">
                            <p><strong>: {{ number_format($agreement->nominal_qard, 0, ',', '.') }}</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="150">
                            <p>Jangka Waktu</p>
                        </td>
                        <td colspan="2" width="456">
                            <p><strong>: {{ $agreement->jangka_waktu }} Bulan</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="150">
                            <p>Jumlah Angsuran</p>
                        </td>
                        <td colspan="2" width="456">
                            <p><strong>: {{ number_format($agreement->angsuran_qard, 0, ',', '.') }}</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" width="606">
                            <p><strong>&nbsp;</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" width="606">
                            <p>Untuk <strong></strong>pembiayaannya di KSPP Syariah BMT NU NGASEM JAWA TIMUR dan demikian
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
                                    <p>{{ $agreement->permohonan->office->village }}, {{ \Carbon\Carbon::parse($agreement->created_at)->isoFormat('D MMMM Y') }}</p>
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
                                    <!-- <img src="https://bmtnupintar.com/assets/img/ttd_image/default.png"> -->
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
                                    <p><strong>(....................................)</strong><br>
                                        Branch Manager</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p style="text-align: center;">&nbsp;</p>
                    <p style="text-align: center;">&nbsp;</p>
                </tbody>
            </table>
        </div>

        <!-- View Berkas Akad -->
        <div class="content">
            <p style="text-align: center;"><strong><em>Bismillahirrohmanirrohim</em></strong></p>
            <p style="text-align: center;"><strong><em>&ldquo;Hai orang-orang yang beriman, penuhilah akad-akad (perjanjian)
                        itu&hellip;..&rdquo; (Qs.Al-Maidah)</em></strong></p>
            <p style="text-align: center;"><strong><em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &ldquo;Hai orang-orang yang beriman janganlah
                        kamu makan harta sesamamu dengan jalan batil kecuali dengan jalan perniagaan yang berlaku suka sama suka
                        diantaramu&rdquo;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        (Qs. An Nisa&rsquo;29)</em></strong></p>
            <p style="text-align: center;"><strong><em>&ldquo;Dari Abu Hurairah Ra, bahwa Nabi Muhammad SAW bersabda : Barang Siapa
                        meminjam dengan&nbsp; niat mengembalikan, maka Allah SWT akan membantu melunasinya, dan barangsiapa
                        meminjam&nbsp; dengan niat tidak mengembalikannya, maka Allah SWT akan membuatnya bangkrut &ldquo;
                        (Hadist)</em></strong></p>
            <p style="text-align: center;"><strong><u>AKAD PEMBIAYAAN RAHN</u></strong></p>
            <p style="text-align: center;">Nomor Akad:<strong> {{ $agreement->nomor_agreement }}</strong></p>

            <p>Akad ini dibuat dan ditandatangani pada hari ini <strong><b>{{ \Carbon\Carbon::parse($agreement->created_at)->isoFormat('dddd') }}</b></strong> tanggal <strong>{{ \Carbon\Carbon::parse($agreement->created_at)->isoFormat('D MMMM Y') }}</strong> bertempat di kantor KSPP Syariah BMT NU Ngasem Jawa Timur {{ $agreement->permohonan->office->name }}, kami yang
                bertandatangan di bawah ini :</p>
            <table width="568">
                <tbody>
                    <tr>
                        <td colspan="2" width="226">
                            <p>Nama</p>
                        </td>
                        <td colspan="3" width="342">
                            <p><strong>: NAMA BM KANTOR</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="208">
                            <p>Jabatan</p>
                        </td>
                        <td width="18">&nbsp;</td>
                        <td width="278">
                            <p><strong>: Branch Manager</strong></p>
                        </td>
                        <td width="23">
                            <p><strong>&nbsp;</strong></p>
                        </td>
                        <td width="41">
                            <p><strong>&nbsp;</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="208">
                            <p>Alamat</p>
                        </td>
                        <td width="18">&nbsp;</td>
                        <td colspan="3" width="500">
                            <p><strong>: {{ $agreement->permohonan->office->address }}</strong></p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p>Dalam hal ini bertindak untuk dan atas nama Branch Manager KSPP Syariah BMT NU NGASEM JAWA TIMUR {{ $agreement->permohonan->office->name }} untuk
                selanjutnya disebut PIHAK PERTAMA.</p>
            <table width="566">
                <tbody>
                    <tr>
                        <td colspan="4" width="232">
                            <p>Nama</p>
                        </td>
                        <td colspan="3" width="334">
                            <p><strong>: {{ $agreement->permohonan->anggota->name }}</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" width="213">
                            <p>Pekerjaan</p>
                        </td>
                        <td colspan="2" width="19">&nbsp;</td>
                        <td width="284">
                            <p><strong>: {{ $agreement->permohonan->anggota->pekerjaan }}</strong></p>
                        </td>
                        <td width="24">
                            <p><strong>&nbsp;</strong></p>
                        </td>
                        <td width="26">
                            <p><strong>&nbsp;</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" width="213">
                            <p>No. KTP</p>
                        </td>
                        <td colspan="2" width="19">&nbsp;</td>
                        <td colspan="3" width="334">
                            <p><strong>: {{ $agreement->permohonan->anggota->nik }}</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="150">
                            <p>Alamat</p>
                        </td>
                        <td colspan="2" width="16">&nbsp;</td>
                        <td width="18">&nbsp;</td>
                        <td colspan="3" width="334">
                            <p><strong>: {{ $agreement->permohonan->anggota->alamat }}</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td width="150">&nbsp;</td>
                        <td width="15">&nbsp;</td>
                        <td width="1">&nbsp;</td>
                        <td width="18">&nbsp;</td>
                        <td width="284">&nbsp;</td>
                        <td width="24">&nbsp;</td>
                        <td width="26">&nbsp;</td>
                    </tr>
                </tbody>
            </table>
            <p>Dalam hal ini bertindak untuk dan atas nama pribadi untuk melakukan transaksi hukum dengan telah mendapatkan
                persetujuan dari <strong>{{ $agreement->permohonan->nama_ahli_waris }}</strong> selaku <strong>{{ Str::upper($agreement->permohonan->status_ahli_waris) }}</strong> sesuai lampiran
                surat persetujuan suami / istri / wali, untuk selanjutnya disebut PIHAK KEDUA. <br>
                PIHAK PERTAMA dan PIHAK KEDUA dengan ini menerangkan hal-hal sebagai berikut: <br><br>
                1. Bahwa PIHAK KEDUA merupakan pemilik sah, dan telah setuju menggadaikan kepada PIHAK PERTAMA barang berupa
                Kendaraan Bermotor / Tanah &amp; Bangunan dengan detail agunan di bawah ini :</p>
            
            <table style="width: 567px;">
                <tbody>
                    @php
                        $firstAgunan = $agreement->permohonan->agunan->first();
                    @endphp

                @if ($firstAgunan)
                    <tr>
                        <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.15pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Agunan</span>
                            </p>
                        </td>
                        <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.15pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        {{ Str::upper($firstAgunan->type_agunan) }}</span></strong>
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.15pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Merk / Tahun</span>
                            </p>
                        </td>
                        <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.15pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        {{ $firstAgunan->merk }}/{{ $firstAgunan->tahun }}</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Nomor Agunan</span>
                            </p>
                        </td>
                        <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        {{ $firstAgunan->nomor_agunan }}</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.15pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Atas Nama </span>
                            </p>
                        </td>
                        <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.15pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        {{ $firstAgunan->atas_nama }}</span></strong>
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
                                        {{ $firstAgunan->warna }}</span></strong>
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
                                        {{ $firstAgunan->nopol }}</span></strong>
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
                                        {{ $firstAgunan->nomor_rangka }}</span></strong>
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
                                        {{ $firstAgunan->luas }}</span></strong>
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
                                        {{ $firstAgunan->alamat_agunan }}</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Bank</span>
                            </p>
                        </td>
                        <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        {{ $firstAgunan->bank }}</span></strong>
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
                                        Rp {{ number_format($firstAgunan->nilai_taksir, 0, ',', '.') }}</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001 pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'><br><strong> </strong>yang selanjutnya disebut {{ Str::upper($firstAgunan->type_agunan) }}.</br></span>
                            </p>
                        </td>
                        <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'></span></strong>
                            </p>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
            

        </div>

        <div class="content">
            <table class="width:567px">
                <tbody>
                @php
                    $secondAgunan = $agreement->permohonan->agunan->skip(1)->first(); // Skip the first item and get the second
                @endphp
    
                @if ($secondAgunan)
                    <tr>
                        <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.15pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Agunan</span>
                            </p>
                        </td>
                        <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.15pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        {{ Str::upper($secondAgunan->type_agunan) }}</span></strong>
                            </p>
                        </td>
                    </tr>
    
                    <tr>
                        <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.15pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Merk / Tahun</span>
                            </p>
                        </td>
                        <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.15pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        {{ $secondAgunan->merk }}/{{ $secondAgunan->tahun }}</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Nomor Agunan</span>
                            </p>
                        </td>
                        <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        {{ $secondAgunan->nomor_agunan }}</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.15pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align: justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Atas Nama</span>
                            </p>
                        </td>
                        <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.15pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        {{ $secondAgunan->atas_nama }}</span></strong>
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
                                        {{ $secondAgunan->warna }}</span></strong>
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
                                        {{ $secondAgunan->nopol }}</span></strong>
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
                                        {{ $secondAgunan->nomor_rangka }}</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left :0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Luas</span>
                            </p>
                        </td>
                        <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        {{ $secondAgunan->luas }}</span></strong>
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
                                        {{ $secondAgunan->alamat_agunan }}</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Bank</span>
                            </p>
                        </td>
                        <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                        {{ $secondAgunan->bank }}</span></strong>
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
                                        Rp {{ number_format($secondAgunan->nilai_taksir, 0, ',', '.') }}</span></strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.95 pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <span style='font-family:"Times New Roman",serif;color:#1D1B11;'><br><strong> </strong>yang selanjutnya disebut {{ Str::upper($secondAgunan->type_agunan) }}.</br></span>
                            </p>
                        </td>
                        <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'></span></strong>
                            </p>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>
            
            <p>&nbsp; &nbsp;b. Bahwa PIHAK PERTAMA menyatakan telah menerima BPKB / SHM dari PIHAK KEDUA sebagai bukti kepemilikan
                yang sah atas Kendaraan Bermotor / Tanah &amp; Bangunan yang digunakan sebagai jaminan dalam Perjanjian Rahn yang
                dilakukan kedua belah pihak tanpa paksaan dari pihak mana pun.</p>
            <p>Selanjutnya Para Pihak sepakat mengikatkan diri dalam Perjanjian Rahn dengan syarat dan ketentuan sebagai berikut:
            </p>
            <p style="text-align: center;"><strong>Pasal 1 <br>Biaya Pengurusan Akad</strong></p>
            <p style="text-align: justify;">PIHAK KEDUA bersedia menganti biaya pengurusan akad dengan rincian: Materai
                <strong>Rp {{ number_format($agreement->materai, 0, ',', '.') }} </strong>dan ATK <strong>Rp {{ number_format($agreement->atk, 0, ',', '.') }}</strong>
            </p>

            <p style="text-align: center;"><strong>Pasal 2 <br>Simpanan wajib</strong></p>
            <p style="text-align: justify;">PIHAK KEDUA&nbsp; bersedia menyetor uang senilai <strong>Rp {{ number_format($agreement->sim_wajib, 0, ',', '.') }}</strong> kepada
                PIHAK PERTAMA&nbsp; sebagai Simpanan Wajib yang dikemudian hari bisa diambil oleh PIHAK KEDUA&nbsp; apabila keluar
                dari keanggotaan KSPP Syariah BMT NU NGASEM JAWA TIMUR.</p>
            <p style="text-align: center;"><strong>Pasal 3 <br>
                    <strong>Transaksi </strong><strong>Rahn (GADAI)</strong></strong></p>
            <p style="text-align: justify;">PIHAK PERTAMA akan menyerahkan uang kepada PIHAK KEDUA sebesar <strong> Rp {{ number_format($agreement->nominal_qard, 0, ',', '.') }}        </strong>di mana uang tersebut merupakan gadai dari <strong></strong>
                sesuai data terlampir pada <strong></strong> tersebut di atas. Dan PIHAK KEDUA dikenakan jasa atau ujroh penjagaan surat bukti kepemilikan barang yang di gadaikan berupa <strong></strong> sebesar&nbsp; <strong>Rp {{ number_format($agreement->qard_ujroh, 0, ',', '.') }} </strong>setiap bulan selama <strong>{{ $agreement->jangka_waktu }} </strong>bulan jangka waktu perjanjian, terhitung sejak penandatanganan
                <u>Perjanjian Rahn</u> ini berlangsung. Dan demikian perjanjian ini berlaku sebagai tanda bukti yang sah atas uang
                gadai dari <strong></strong> yang termaksud di atas.
            </p>

            <p style="text-align: center;"><strong>Pasal 4 <br>Jangka Waktu</strong></p>
            <p style="text-align: justify;">Perjanjian Rahn ini dilangsungkan untuk jangka waktu <strong>{{ $agreement->jangka_waktu }}</strong> bulan terhitung
                sejak <strong>Tanggal {{ \Carbon\Carbon::parse($agreement->tempo_awal)->isoFormat('DD MMMM YYYY') }} </strong>dan sampai dengan <strong>Tanggal {{ \Carbon\Carbon::parse($agreement->tempo_akhir)->isoFormat('DD MMMM YYYY') }}</strong></p>
        </div>

        <div class="content">
            <p style="text-align: center;"><strong>Pasal 5 <br>Cara Pembayaran</strong></p>
            <p style="text-align: justify;">PIHAK KEDUA bersedia untuk membayar keseluruhan hutang pokok dan jasa
                <strong>Penjagaan</strong> dengan cara sebagai berikut:
            </p>
            <ol>
                <li>Angsuran Pokok <strong> Rp. {{ number_format($agreement->qard_pokok, 0, ',', '.') }}</strong> dan Ujroh Penjagaan <strong>Rp. {{ number_format($agreement->qard_ujroh, 0, ',', '.') }}</strong> dibayar setiap bulan dengan total Rp {{ number_format($agreement->angsuran_qard, 0, ',', '.') }} selama {{ $agreement->jangka_waktu }} kali, mulai {{ \Carbon\Carbon::parse($agreement->tempo_awal)->isoFormat('DD MMMM YYYY') }} sampai {{ \Carbon\Carbon::parse($agreement->tempo_akhir)->isoFormat('DD MMMM YYYY') }}        </li>
                <!-- <li>Ujroh penjagaan dibayar setiap hari / pekan / bulan dan hutang pokok dibayar bersamaan dengan berakhirnya perjanjian
                    ini.</li> -->
            </ol>
            <p style="text-align: center;"><strong>Pasal 6 <br>Jaminan</strong></p>
            <p style="text-align: justify;">PIHAK KEDUA menyatakan bahwa  yang digadaikan
                kepada PIHAK PERTAMA merupakan hak milik pribadi dari PIHAK KEDUA. Dan&nbsp; PIHAK KEDUA menjamin bahwa tidak ada
                orang atau pihak lain yang turut memilikinya, tidak dan/atau belum pernah dijual juga dipindahtangankan haknya
                kepada pihak manapun, atau dijaminkan kepada pihak lain dengan cara apapun.</p>

            <p style="text-align: center;"><strong>Pasal 7 <br>Larangan-Larangan</strong></p>
            <p style="text-align: justify;">Selama perjanjian ini masih berlangsung, PIHAK PERTAMA dilarang melakukan perbuatan yang
                bertujuan untuk memindah-tangankan hak kepemilikan, menjual, dan/atau menggadaikan  kepada pihak lain.</p>

            <p style="text-align: center;"><strong>Pasal 8 <br>Kuasa Jual Ketika Wanprestasi</strong></p>
            <ol>
                <li>Apabila pada waktu perjanjian ini berakhir PIHAK KEDUA belum mampu membayar uang Rahn beserta jasa penjagaan barang yang
                    ditetapkan dan disetujui oleh PIHAK KEDUA, dan PIHAK PERTAMA telah memberi Surat Peringatan (SP) kepada PIHAK
                    KEDUA sampai 3 (tiga) kali berturut turut (SP 1, SP 2, SP 3) maka PIHAK KEDUA memberi kuasa penuh kepada PIHAK
                    PERTAMA untuk menjual <strong></strong> yang digadaikan oleh PIHAK
                    KEDUA.</li>
                <li>Hasil penjualan atas <strong></strong> tersebut menjadi hak PIHAK KEDUA
                    setelah dikurangi hutang pokok kepada PIHAK PERTAMA dan ditambah biaya sewa.</li>
            </ol>

            <p style="text-align: center;"><strong>Pasal 9 <br>Perpanjangan Jangka Waktu</strong></p>
            <ol>
                <li>Apabila PIHAK KEDUA ingin memperpanjang jangka waktu Rahn atas <strong></strong> tersebut, karena PIHAK KEDUA belum mampu melunasi hutang kepada PIHAK PERTAMA, maka PIHAK
                    KEDUA berhak untuk mengajukan perpanjangan jangka waktu Rahn dengan PIHAK PERTAMA dan kuasa jual tidak berlaku.
                </li>
                <li>Perpanjangan jangka waktu Rahn maksimal sampai 2 (dua) kali.</li>
                <li>PIHAK PERTAMA berhak menolak pengajuan perpanjangan jangka waktu oleh PIHAK KEDUA apabila PIHAK KEDUA tidak
                    memenuhi persyaratan untuk pengajuan perpanjangan.</li>
            </ol>
        </div>

        <div class="content">
            <p style="text-align: center;"><strong>Pasal 10 <br>Hak Dan Kewajiban Pihak Pertama</strong></p>
            <ol>
                <li>PIHAK PERTAMA berkewajiban penuh untuk merawat dan menjaga keutuhan serta kebaikan <strong></strong>
                </li>
                <li>Apabila terjadi sesuatu hal yang menyebabkan <strong></strong> tersebut hilang atau rusak maka menjadi
                    tanggung jawab PIHAK PERTAMA.</li>
                <li>Jika Perjanjian Rahn ini berakhir, maka PIHAK PERTAMA wajib menyerahkan <strong></strong> tersebut
                    kepada PIHAK KEDUA dalam keadaan baik dan terawat seperti pada waktu penyerahan <strong></strong></li>
            </ol>

            <p style="text-align: center;"><strong>Pasal 11 <br>Penyelesaian Perselisihan</strong></p>
            <p style="text-align: justify;">Apabila terjadi perselisihan di antara Para Pihak, Para Pihak sepakat untuk menyelesaikan secara musyawarah untuk
                mufakat, apabila perselisihan tidak dapat diselesaikan secara musyawarah, maka Para Pihak sepakat untuk
                menyelesaikan masalah ini secara hukum, dan Para Pihak sepakat untuk memilih tempat tinggal yang umum dan tetap di
                Kantor Basyarnas Jawa Timur.</p>
            <p style="text-align: justify;">Demikian Perjanjian ini dibuat dan ditandatangani oleh kedua belah pihak pada hari dan tanggal tersebut di atas,
                dibuat rangkap 2 (dua ) bermaterai cukup untuk masing-masing pihak yang mempunyai kekuatan hukum yang sama.&nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>
            <p>Di setujui dan di sepakati oleh :</p>
            <table style="width: 646px;">
                <tbody>
                    <tr>
                        <td style="text-align: center; width: 219px;">
                            <p>Pihak Pertama</p>
                            <p>&nbsp;</p>
                            <p>&nbsp; </p>
                            <p>(&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.&hellip;&hellip;.)</p>
                        </td>
                        <td style="text-align: center; width: 114px;">
                            <p>&nbsp;</p>
                        </td>
                        <td style="text-align: center; width: 100px;">
                            <p>&nbsp;Materai</p>
                            <p>10.000</p>
                        </td>
                        <td style="text-align: center; width: 185px;">
                            <p>Pihak Kedua</p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <p>(&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.&hellip;&hellip;.)</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center; width: 219px;">
                            <p>Saksi-saksi</p>
                        </td>
                        <td style="text-align: center; width: 114px;">
                            <p>&nbsp;</p>
                        </td>
                        <td style="text-align: center; width: 100px;">
                            <p>&nbsp;</p>
                        </td>
                        <td style="text-align: center; width: 185px;">
                            <p>&nbsp;</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center; width: 219px;">
                            <p>Saksi Pihak Pertama</p>
                            <p>&nbsp; </p>
                            <p>&nbsp;</p>
                            <p>(&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.&hellip;&hellip;.)</p>
                        </td>
                        <td style="text-align: center; width: 114px;">
                            <p>&nbsp;</p>
                        </td>
                        <td style="text-align: center; width: 100px;">
                            <p>&nbsp;</p>
                        </td>
                        <td style="text-align: center; width: 185px;">
                            <p>Saksi Pihak Kedua</p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <p>(&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.&hellip;&hellip;.)</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center; width: 219px;">
                            <p>Saksi Pihak Pertama</p>
                            <p>&nbsp;</p>
                            <p>&nbsp; </p>
                            <p>(&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.&hellip;&hellip;.)</p>
                        </td>
                        <td style="text-align: center; width: 114px;">
                            <p>&nbsp;</p>
                        </td>
                        <td style="text-align: center; width: 100px;">
                            <p>&nbsp;</p>
                        </td>
                        <td style="text-align: center; width: 185px;">
                            <p>Saksi Pihak Kedua</p>
                            <p>&nbsp;</p>
                            <p>&nbsp; </p>
                            <p>(&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;&hellip;.&hellip;&hellip;.)</p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p>&nbsp;</p>

        </div>

        <div class="content">
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
                        <td style="width: 188.1pt;padding: 0in 5.4pt;height: 15.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-indent:  30.8pt;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Nama Lengkap</span>
                            </p>
                        </td>
                        <td style="width: 293.55pt;padding: 0in 5.4pt;height: 15.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:
                                        {{ $agreement->permohonan->anggota->name }}</span></strong>
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
                                        {{ $agreement->permohonan->anggota->tempat_lahir }}, {{ \Carbon\Carbon::parse($agreement->permohonan->anggota->tanggal_lahir)->isoFormat('DD MMMM YYYY') }}</span></strong>
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
                                        {{ $agreement->permohonan->anggota->alamat }}</span></strong>
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
                                    {{ $agreement->permohonan->anggota->pekerjaan }}</span></strong>
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
                        <td style="width: 188.1pt;padding: 0in 5.4pt;height: 15.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-indent:  30.8pt;'>
                                <span style='font-family:"Times New Roman",serif;color:black;'>Nama Lengkap</span>
                            </p>
                        </td>
                        <td style="width: 293.55pt;padding: 0in 5.4pt;height: 15.25pt;vertical-align: top;">
                            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:  normal;font-size:15px;font-family:"Calibri",sans-serif;'>
                                <strong><span style='font-family:"Times New Roman",serif;color:black;'>:{{ $agreement->permohonan->nama_ahli_waris }}</span></strong>
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
                                    {{ $agreement->permohonan->anggota->tempat_lahir }},
                                    {{ \Carbon\Carbon::parse($agreement->permohonan->tanggal_ahli_waris)->isoFormat('DD MMMM YYYY') }}</span></strong>
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
                                        {{ $agreement->permohonan->alamat_ahli_waris }}</span></strong>
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
                                        {{ $agreement->permohonan->pekerjaan_ahli_waris }}</span></strong>
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
                                    <span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;color:black;'>Mengakui bahwa
                        pada hari: <strong><b>{{ \Carbon\Carbon::parse($agreement->created_at)->isoFormat('dddd') }}</b></strong> Tanggal
                        <strong>{{ \Carbon\Carbon::parse($agreement->created_at)->isoFormat('DD MMMM YYYY') }}</strong> telah menerima &nbsp;dana pembiayaan sebesar
                        <strong>{{ number_format($agreement->nominal_qard, 0 , ',', '.') }}</strong> dari <strong>KSPP Syariah BMT NU NGASEM JAWA
                            TIMUR</strong> <strong>{{ $agreement->permohonan->office->name }},</strong> yang selanjutnya disebut BMT dan
                        akan saya angsur selama <strong>{{ $agreement->jangka_waktu }}</strong>
                        Bulan sebesar
                        <strong>Rp {{ number_format($agreement->qard_pokok, 0 , ',', '.') }}</strong> pembiayaan tersebut setelah ditambah
                        Ujrotul Khifdzi <strong>Rp {{ number_format($agreement->qard_ujroh, 0, ',','.') }}</strong> setiap bulan sehingga
                        total
                        <strong>Rp {{ number_format($agreement->angsuran_qard, 0, ',', '.')}}</strong>&nbsp;</span>
                            </p><br>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:35.45pt;'>
                <span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;color:black;'>Adapun Biaya ATK
                    <strong>Rp {{ number_format($agreement->atk, 0 ,',', '.') }}</strong> ditambah Materai
                    <strong>Rp {{ number_format($agreement->materai, 0 ,',', '.') }}</strong> Tabarru
                    Syariah<strong>&nbsp;Rp {{ number_format($agreement->tabarru, 0 ,',', '.') }}</strong> Wakaf
                    <strong>Rp {{ number_format($agreement->wakaf, 0 ,',', '.') }}</strong> dan Simpanan Wajib
                    <strong>Rp {{ number_format($agreement->sim_wajib, 0 ,',', '.') }}</strong> sehingga total
                    <strong>Rp {{ number_format($agreement->total_biaya_akad, 0 ,',', '.') }}</strong> saya bayar lunas saat pembiayaan dicairkan.</span>
            </p><br>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:35.45pt;'>
                <span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;color:black;'>Untuk pembiayaan
                    ini saya menjaminkan pada KSPP Syariah BMT NU NGASEM Jawa Timur berupa :
                    Agunan yang terlampir berupa BPKB/SHM/ atau yang lainya. Barang-barang jaminan tersebut di atas adalah milik saya sendiri atau jaminan yang sudah di kuasakan kepada saya sesuai surat kuasa yang terlampir, tidak dalam keadaan digadaikan atau dipertanggungkan dengan cara apa pun juga kepada orang atau bank lain dan saya tidak akan menggadaikan atau menjualnya selama pembiayaan belum dibayar lunas.</span>
            </p><br>
            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:35.45pt;'>
                <span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;color:black;'>Apabila saya
                    tidak dapat melunasi pembiayaan saya kepada KSPP Syariah BMT NU NGASEM Jawa Timur dan setelah KSPP Syariah BMT NU NGASEM Jawa Timur memberi surat peringatan 1, 2, dan 3 untuk melunasi pembiayaan tersebut di atas, maka dengan ini saya memberi kuasa penuh kepada KSPP Syariah BMT NU NGASEM Jawa Timur untuk menjual barang jaminan tersebut, dan apabila ada kekurangan atau kelebihan dari hasil penjualan diperhitungkan dengan hutang dan kewajiban saya.</span>
            </p>

            <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:115%;font-size:15px;font-family:"Calibri",sans-serif;text-align:justify;text-indent:35.45pt;'>
                <span style='font-size:16px;line-height:115%;font-family:"Times New Roman",serif;color:black;'>Demikian surat
                    pengakuan pembiayaan Nomor Akad : {{ $agreement->nomor_agreement }}&nbsp;ini saya buat dengan sebenar-benarnya
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
                                <span style='font-family:"Times New Roman",serif;'>{{ $agreement->permohonan->office->village }},
                                    {{ \Carbon\Carbon::parse($agreement->created_at)->isoFormat('DD MMMM YYYY') }}</span>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 244.05pt;padding: 0in 5.4pt;height: 18.2pt;vertical-align: top;">
                            <p style='margin-top:1.45pt;margin-right:0in;margin-bottom:1.45pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:center;'>
                                <span style='font-family:"Times New Roman",serif;'>Petugas <br>KSPP Syariah BMT NU NGASEM Jawa Timur</span>
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
                                <strong><span style='font-family:"Times New Roman",serif;'>(.........................)</span></strong>
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
        </div>

        <div class="content">
            <p style="text-align: center;"><strong><u>TANDA TERIMA JAMINAN</u></strong></p>
            <p style="text-align: center;"><strong>Nomor Akad : {{ $agreement->nomor_agreement }}</strong></p>
            <p>Pada hari <b>{{ \Carbon\Carbon::parse($agreement->created_at)->isoFormat('dddd') }}</b> Tanggal {{ \Carbon\Carbon::parse($agreement->created_at)->isoFormat('DD MMMM YYYY') }}&nbsp; telah terima dari :</p>
            <table>
                <tbody>
                    <tr>
                        <td width="284">
                            <p>Nama</p>
                        </td>
                        <td width="366">
                            <p>: {{ $agreement->permohonan->anggota->name }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td width="284">
                            <p>Alamat</p>
                        </td>
                        <td width="366">
                            <p>: {{ $agreement->permohonan->anggota->alamat }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td width="284">
                            <p>No. HP</p>
                        </td>
                        <td width="366">
                            <p>: {{ $agreement->permohonan->anggota->no_hp }}</p>
                        </td>
                    </tr>

                </tbody>
            </table>
            <p>Agunan/Jaminan Pembiayaan berupa&nbsp; BPKB/SHM/ atau yang Lainnya dengan rincian sebagai berikut :</p>
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
                    @foreach ($agreement->permohonan->agunan as $a)
                        <tr>
                            <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.15pt;vertical-align: top;">
                                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                    <span style='font-family:"Times New Roman",serif;color:#1D1B11;'></span>
                                </p>
                            </td>
                            <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.15pt;vertical-align: top;">
                                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                    <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>
                                            </span></strong>
                                </p>
                            </td>
                        </tr>
                        
                        <tr>
                            <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.15pt;vertical-align: top;">
                                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                    <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Agunan</span>
                                </p>
                            </td>
                            <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.15pt;vertical-align: top;">
                                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                    <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                            {{ Str::upper($a->type_agunan) }}</span></strong>
                                </p>
                            </td>
                        </tr>
                        
                        
                        <tr>
                            <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.15pt;vertical-align: top;">
                                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                    <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Merk / Tahun</span>
                                </p>
                            </td>
                            <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.15pt;vertical-align: top;">
                                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                    <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                            {{ $a->merk }}/{{ $a->tahun }}</span></strong>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                    <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Nomor Agunan</span>
                                </p>
                            </td>
                            <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                    <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                            {{ $a->nomor_agunan }}</span></strong>
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
                                            {{ $a->atas_nama }}</span></strong>
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
                                            {{ $a->warna }}</span></strong>
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
                                            {{ $a->nopol }}</span></strong>
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
                                            {{ $a->nomor_rangka }}</span></strong>
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
                                            {{ $a->luas }}</span></strong>
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
                                            {{ $a->alamat_agunan }}</span></strong>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 219.3pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                    <span style='font-family:"Times New Roman",serif;color:#1D1B11;'>Bank</span>
                                </p>
                            </td>
                            <td style="width: 271.2pt;padding: 0in 5.4pt;height: 13.95pt;vertical-align: top;">
                                <p style='margin-top:0in;margin-right:0in;margin-bottom:.0001pt;margin-left:0in;line-height:normal;font-size:15px;font-family:"Calibri",sans-serif;text-align:  justify;'>
                                    <strong><span style='font-family:"Times New Roman",serif;color:#1D1B11;'>:
                                            {{ $a->bank}}</span></strong>
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
                                            Rp {{ number_format($a->nilai_taksir,0,',','.') }}</span></strong>
                                </p>
                            </td>
                        </tr>
                    @endforeach
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
                            <p><strong>(................................)</strong></p>
                        </td>
                        <td style="text-align: center;" width="325">
                            <p><strong>(................................)</strong></p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="content">
            @foreach ($agreement->permohonan->agunan as $index => $a)
            {{-- <div class="grid-item"> --}}
                <!-- Generate a QR code for each 'atas_nama' or other dynamic data -->
                {{-- <div id="qrcode{{ $index }}"></div> --}}
                <table>
                    <tr>
                        <td class="grid-item">
                            <div id="qrcode{{ $index }}"></div>
                        </td>
                        <td class="grid-item">
                            <table>
                                <tr>
                                    {{-- <td>NOMOR</td> --}}
                                    <td style="text-align: center; justify-content: center;">Nomor Agunan <br><strong style="font-size: 3em;">0001</strong></td>
                                </tr>
                                <tr><td style="text-align: center; justify-content: center;">Kotak Jaminan <br><strong style="font-size: 1em;">AL-KAHFI</strong></td>
                                </tr>
                            </table>
                        </td>
                        <td class="grid-item">
                            <table>
                            <tr>
                                <td>Nama Anggota</td>
                                <td>: <strong>{{ $agreement->permohonan->anggota->name }}</strong></td>
                            </tr>
                            <tr>
                                <td>Tipe Jaminan</td>
                                <td>: <strong>{{ Str::upper($a->type_agunan) }}</strong></td>
                            </tr>
                            <tr>
                                <td>Atas Nama</td>
                                <td>: <strong>{{ $a->atas_nama }}</strong></td>
                            </tr>
                            <tr>
                                <td>Nomor Agunan</td>
                                <td>: <strong>{{ $a->nomor_agunan }}</strong></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>: <strong>{{ $a->alamat_agunan }}</strong></td>
                            </tr>
                            </table>
                        </td>
                        </tr>
                    </table>
            {{-- </div> --}}
            {{-- <div class="grid-item">
                <strong>{{ $a->atas_nama }}</strong> <!-- Display name with number -->
            </div> --}}
        @endforeach
        </div>
        
        <script>
            @foreach ($agreement->permohonan->agunan as $index => $a)
                // Generate QR code for each 'atas_nama' dynamically
                var qrcode{{ $index }} = new QRCode("qrcode{{ $index }}", {
                    text: "{{ $a->atas_nama }}", // or any other data you want
                    width: 125,
                    height: 125
                });
            @endforeach
        </script>

    </main>
</body>

</html>