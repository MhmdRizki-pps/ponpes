<?php
// Data Alternatif (contoh)
$alternatif = [
    ['nama' => 'A1', 'nilai' => [80, 70, 90]],
    ['nama' => 'A2', 'nilai' => [60, 60, 70]],
    ['nama' => 'A3', 'nilai' => [75, 85, 80]],
];

// Bobot & jenis kriteria
$bobot = [0.4, 0.3, 0.3];
$jenis = ['benefit', 'cost', 'benefit']; // urutan kriteria

// Hitung normalisasi
$normal = [];
for ($j = 0; $j < count($bobot); $j++) {
    $pembagi = 0;
    foreach ($alternatif as $alt) {
        $pembagi += pow($alt['nilai'][$j], 2);
    }
    $pembagi = sqrt($pembagi);
    foreach ($alternatif as $i => $alt) {
        $normal[$i][$j] = $alt['nilai'][$j] / $pembagi;
    }
}

// Hitung optimasi
$hasil = [];
foreach ($normal as $i => $nilai_normal) {
    $benefit = 0;
    $cost = 0;
    foreach ($nilai_normal as $j => $val) {
        if ($jenis[$j] == 'benefit') {
            $benefit += $val * $bobot[$j];
        } else {
            $cost += $val * $bobot[$j];
        }
    }
    $hasil[] = [
        'nama' => $alternatif[$i]['nama'],
        'nilai' => round($benefit - $cost, 4)
    ];
}

// Urutkan dari tertinggi
usort($hasil, fn($a, $b) => $b['nilai'] <=> $a['nilai']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Perhitungan MOORA</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        table { border-collapse: collapse; width: 60%; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
        h2 { margin-bottom: 10px; }
    </style>
</head>
<body>
    <h2>Hasil Perhitungan MOORA</h2>
    <table>
        <thead>
            <tr>
                <th>Peringkat</th>
                <th>Alternatif</th>
                <th>Nilai MOORA</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hasil as $i => $row): ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['nilai'] ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>
