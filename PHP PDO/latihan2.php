<?php
// Latihan 2 – INSERT dengan Prepared Statement (PDO)
// Target: insert satu mahasiswa baru (nim 004) lalu tampilkan total record.
// TODO: 1 blok – execute insert dengan parameter.

require_once __DIR__ . "/db.php";
$pdo = db();

$nim = "004";
$nama = "Doni";
$nilai = 90;

$sql = "INSERT INTO students(nim, nama, nilai) VALUES(:nim, :nama, :nilai)";
$stmt = $pdo->prepare($sql);

// TODO: jalankan execute untuk insert
// $stmt->execute([
//   ':nim' => $nim,
//   ':nama' => $nama,
//   ':nilai' => $nilai
// ]);

$stmt->execute([
  ':nim' => $nim,
  ':nama' => $nama,
  ':nilai' => $nilai
]);


$total = (int)$pdo->query("SELECT COUNT(*) AS c FROM students")->fetch()["c"];
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Latihan 2</title></head>
<body>
  <h2>Latihan 2 – PDO INSERT</h2>
  <p>Inserted: <b><?= htmlspecialchars($nim) ?></b> (<?= htmlspecialchars($nama) ?>, <?= (int)$nilai ?>)</p>
  <p>Total students: <b><?= (int)$total ?></b></p>
</body>
</html>

