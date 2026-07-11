<?php
// Latihan 1 – SELECT dengan Prepared Statement (PDO)
// Target: tampilkan mahasiswa dengan nilai >= $min (default 60).
// TODO: 1 baris – jalankan execute dengan parameter :min

require_once __DIR__ . "/db.php";
$pdo = db();

$min = 60;

$sql = "SELECT nim, nama, nilai FROM students WHERE nilai >= :min ORDER BY nim";
$stmt = $pdo->prepare($sql);

// TODO: execute query dengan parameter :min
// $stmt->execute([':min' => $min]);
$stmt->execute([':min' => $min]);

$rows = $stmt->fetchAll();
$count = count($rows);
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Latihan 1</title></head>
<body>
  <h2>Latihan 1 – PDO SELECT (Prepared Statement)</h2>
  <p>Min nilai: <b><?= (int)$min ?></b></p>
  <p>Count: <b><?= (int)$count ?></b></p>

  <table border="1" cellpadding="6" cellspacing="0">
    <tr><th>NIM</th><th>Nama</th><th>Nilai</th></tr>
    <?php foreach ($rows as $r): ?>
      <tr>
        <td><?= htmlspecialchars($r["nim"]) ?></td>
        <td><?= htmlspecialchars($r["nama"]) ?></td>
        <td><?= (int)$r["nilai"] ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>

