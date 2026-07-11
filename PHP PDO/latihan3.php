<?php
// Latihan 3 – UPDATE + Transaction (PDO)
// Target: update nilai mahasiswa nim 003 menjadi 65, gunakan transaksi.
// TODO: 2 baris – execute update + commit.

require_once __DIR__ . "/db.php";
$pdo = db();

$nim = "003";
$newNilai = 65;

$pdo->beginTransaction();

$sql = "UPDATE students SET nilai = :nilai WHERE nim = :nim";
$stmt = $pdo->prepare($sql);

// TODO: execute update
// $stmt->execute([':nilai' => $newNilai, ':nim' => $nim]);

// TODO: commit transaksi
// $pdo->commit();
$stmt->execute([':nilai' => $newNilai, ':nim' => $nim]);
$pdo->commit();


$updated = (int)$pdo->query("SELECT nilai FROM students WHERE nim='003'")->fetch()["nilai"];
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Latihan 3</title></head>
<body>
  <h2>Latihan 3 – PDO UPDATE + Transaction</h2>
  <p>NIM: <b><?= htmlspecialchars($nim) ?></b></p>
  <p>Nilai baru: <b><?= (int)$updated ?></b></p>
</body>
</html>

