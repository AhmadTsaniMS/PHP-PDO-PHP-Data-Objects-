<?php
// PBL – Notes CRUD (PDO MySQL)
// Tugas: lengkapi fungsi create_note(), delete_note(), stats_notes().
// list_notes() sudah disediakan.
// Output HTML jangan diubah strukturnya.

require_once __DIR__ . "/db.php";
$pdo = db();

function create_note(PDO $pdo, string $title, string $content): bool {
  $title = trim($title);
  $content = trim($content);
  if ($title === "" || $content === "") return false;

  $sql = "INSERT INTO notes(title, content) VALUES(:t, :c)";
  $stmt = $pdo->prepare($sql);

  // TODO: execute insert
  // return $stmt->execute([':t'=>$title, ':c'=>$content]);

  return $stmt->execute([':t'=>$title, ':c'=>$content]);
}

function delete_note(PDO $pdo, int $id): bool {
  $sql = "DELETE FROM notes WHERE id = :id";
  $stmt = $pdo->prepare($sql);

  // TODO: execute delete
  // return $stmt->execute([':id'=>$id]);

  return $stmt->execute([':id'=>$id]);
}

function list_notes(PDO $pdo, int $limit = 10): array {
  $sql = "SELECT id, title, content, created_at FROM notes ORDER BY id DESC LIMIT :lim";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':lim', $limit, PDO::PARAM_INT);
  $stmt->execute();
  return $stmt->fetchAll();
}

function stats_notes(PDO $pdo): array {
  // TODO: hitung total notes dan last_id
  // Hint: SELECT COUNT(*) AS total, MAX(id) AS last_id FROM notes
  $row = $pdo->query("SELECT COUNT(*) AS total, MAX(id) AS last_id FROM notes")->fetch();
  
  return ['total'=>(int)$row['total'], 'last_id'=>$row['last_id']];
}

// Handle POST (tambah catatan)
$err = "";
if (($_SERVER["REQUEST_METHOD"] ?? "") === "POST") {
  $title = $_POST["title"] ?? "";
  $content = $_POST["content"] ?? "";
  if (!create_note($pdo, $title, $content)) {
    $err = "Gagal menambah catatan. Pastikan title dan content terisi.";
  }
}

// Handle GET delete
if (isset($_GET["del"])) {
  $id = (int)$_GET["del"];
  delete_note($pdo, $id);
}

$stats = stats_notes($pdo);
$notes = list_notes($pdo, 10);
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>PBL Notes</title></head>
<body>
  <h2>PBL – Notes CRUD (PDO)</h2>

  <h3>Stats</h3>
  <ul>
    <li>Total: <b><?= (int)$stats["total"] ?></b></li>
    <li>Last ID: <b><?= htmlspecialchars((string)($stats["last_id"] ?? "-")) ?></b></li>
  </ul>

  <?php if ($err): ?>
    <p style="color:red;"><b><?= htmlspecialchars($err) ?></b></p>
  <?php endif; ?>

  <h3>Tambah Catatan</h3>
  <form method="post">
    <div>Title: <input name="title" required></div>
    <div>Content:<br><textarea name="content" rows="3" cols="40" required></textarea></div>
    <button type="submit">Tambah</button>
  </form>

  <hr>
  <h3>Daftar Catatan (10 terbaru)</h3>
  <table border="1" cellpadding="6" cellspacing="0">
    <tr><th>ID</th><th>Title</th><th>Created</th><th>Action</th></tr>
    <?php foreach ($notes as $n): ?>
      <tr>
        <td><?= (int)$n["id"] ?></td>
        <td><?= htmlspecialchars($n["title"]) ?></td>
        <td><?= htmlspecialchars($n["created_at"]) ?></td>
        <td><a href="?del=<?= (int)$n["id"] ?>">Delete</a></td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>

