<?php
$a1 = ['Nama Mahasiswa' => 'fina', 'NIM' => '411', 'Nilai' => 90];
$a2 = ['Nama Mahasiswa' => 'igin', 'NIM' => '412', 'Nilai' => 70];
$a3 = ['Nama Mahasiswa' => 'aisyah', 'NIM' => '413', 'Nilai' => 50];
$a4 = ['Nama Mahasiswa' => 'yati', 'NIM' => '415', 'Nilai' => 60];
$a5 = ['Nama Mahasiswa' => 'berluy', 'NIM' => '416', 'Nilai' => 30];
$a6 = ['Nama Mahasiswa' => 'caca', 'NIM' => '417', 'Nilai' => 20];
$a7 = ['Nama Mahasiswa' => 'dd', 'NIM' => '418', 'Nilai' => 10];
$a8 = ['Nama Mahasiswa' => 'naila', 'NIM' => '419', 'Nilai' => 100];
$a9 = ['Nama Mahasiswa' => 'sutrisno', 'NIM' => '414', 'Nilai' => 25];
$a10 = ['Nama Mahasiswa' => 'ilham', 'NIM' => '414', 'Nilai' => 75];

$ar_nilai = [$a1, $a2, $a3, $a4, $a5, $a6, $a7, $a8, $a9, $a10];

$ar_judul = ['No', 'Nama Mahasiswa', 'NIM', 'Nilai', 'Keterangan', 'Grade', 'Predikat'];

$nilai_total = array_sum(array_column($ar_nilai, 'Nilai'));
$nilai_tertinggi = max(array_column($ar_nilai, 'Nilai'));
$nilai_terendah = min(array_column($ar_nilai, 'Nilai'));
$jumlah_mahasiswa = count($ar_nilai);
$nilai_rata2 = $nilai_total / $jumlah_mahasiswa;

$keterangan = [
    'Nilai Total' => $nilai_total,
    'Nilai Tertinggi' => $nilai_tertinggi,
    'Nilai Terendah' => $nilai_terendah,
    'Jumlah Mahasiswa' => $jumlah_mahasiswa,
    'Nilai Rata-rata' => $nilai_rata2,
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Nilai</title>
</head>

<body>
    <table border="1" cellspacing="1" cellpadding="10" width="100%">
        <thead>
            <tr>
                <?php foreach ($ar_judul as $judul) : ?>
                    <th><?= $judul ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($ar_nilai as $nilai) {
                $lulus = ($nilai['Nilai'] >= 65) ? 'Lulus' : 'Gagal';

                if ($nilai['Nilai'] >= 85 && $nilai['Nilai'] <= 100) {
                    $grade = 'A';
                } else if ($nilai['Nilai'] >= 75 && $nilai['Nilai'] < 85) {
                    $grade = 'B';
                } else if ($nilai['Nilai'] >= 65 && $nilai['Nilai'] < 75) {
                    $grade = 'C';
                } else if ($nilai['Nilai'] >= 45 && $nilai['Nilai'] < 65) {
                    $grade = 'D';
                } else {
                    $grade = 'E';
                }

                switch ($grade) {
                    case 'A':
                        $predikat = 'Memuaskan';
                        break;
                    case 'B':
                        $predikat = 'Bagus';
                        break;
                    case 'C':
                        $predikat = 'Cukup';
                        break;
                    case 'D':
                        $predikat = 'Kurang';
                        break;
                    case 'E':
                        $predikat = 'Buruk';
                        break;
                    default:
                        $predikat = '';
                }
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $nilai['Nama Mahasiswa']; ?></td>
                    <td><?= $nilai['NIM']; ?></td>
                    <td><?= $nilai['Nilai']; ?></td>
                    <td><?= $lulus; ?></td>
                    <td><?= $grade; ?></td>
                    <td><?= $predikat; ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
        <tfoot>
            <?php foreach ($keterangan as $ket => $hasil) : ?>
                <tr>
                    <td colspan="3"><?= $ket ?></td>
                    <td colspan="4"><?= $hasil ?></td>
                </tr>
            <?php endforeach; ?>
        </tfoot>
    </table>
</body>

</html>
