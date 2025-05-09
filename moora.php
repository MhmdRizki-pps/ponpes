<?php
// File: index.php (Frontend + Form Input)

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $santri = [[
        $_POST['nama'],
        $_POST['matematika'],
        $_POST['ipa'],
        $_POST['ips'],
        $_POST['binggris'],
        $_POST['barab'],
    ]];

    $weights = [0.3, 0.25, 0.2, 0.15, 0.1];

    function normalizeMatrix($data) {
        $cols = count($data[0]) - 1;
        $norms = array_fill(0, $cols, 0);
        foreach ($data as $row) {
            for ($i = 0; $i < $cols; $i++) {
                $norms[$i] += pow($row[$i + 1], 2);
            }
        }
        foreach ($norms as $i => $val) {
            $norms[$i] = sqrt($val);
        }
        $normalized = [];
        foreach ($data as $row) {
            $new_row = [$row[0]];
            for ($i = 0; $i < $cols; $i++) {
                $new_row[] = $row[$i + 1] / $norms[$i];
            }
            $normalized[] = $new_row;
        }
        return $normalized;
    }

    function calculateMOORA($normalized, $weights) {
        $results = [];
        foreach ($normalized as $row) {
            $name = $row[0];
            $score = 0;
            for ($i = 0; $i < count($weights); $i++) {
                $score += $row[$i + 1] * $weights[$i];
            }
            $results[] = [$name, round($score, 4)];
        }
        return $results;
    }

    $normalized = normalizeMatrix($santri);
    $results = calculateMOORA($normalized, $weights);
    $s = $santri[0];
    $rekomendasi = $s[2] >= $s[3] ? "IPA" : "IPS";

    echo "<h2>Hasil Rekomendasi Kelas</h2>";
    echo "<table border='1'><tr><th>Nama</th><th>Skor MOORA</th><th>Rekomendasi</th></tr>";
    echo "<tr><td>{$s[0]}</td><td>{$results[0][1]}</td><td>{$rekomendasi}</td></tr>";
    echo "</table><br><a href='index.php'>Kembali</a>";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>SPK MOORA - Penentuan Kelas Santri</title>
</head>
<body>
<h2>Form Input Nilai Santri</h2>
<form method="POST">
    Nama: <input type="text" name="nama" required><br><br>
    Nilai Matematika: <input type="number" name="matematika" required><br><br>
    Nilai IPA: <input type="number" name="ipa" required><br><br>
    Nilai IPS: <input type="number" name="ips" required><br><br>
    Nilai Bahasa Inggris: <input type="number" name="binggris" required><br><br>
    Nilai Bahasa Arab: <input type="number" name="barab" required><br><br>
    <input type="submit" value="Proses">
</form>
</body>
</html>
