<?php

require_once __DIR__ . "/koneksi.php";

$versi_server = null;
$host_name = isset($host) ? $host : 'Tidak diketahui';
$database_name = isset($database) ? $database : 'Tidak diketahui';

if (isset($koneksi) && $koneksi instanceof mysqli) {
    $versi_server = mysqli_get_server_info($koneksi);
    mysqli_close($koneksi);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tes Koneksi Perpustakaan</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        h1 { color: #1f3864; }
        .sukses { background: #e6f4ea; border-left: 5px solid #2e7d32; padding: 10px; }
        .gagal { background: #fbe9e7; border-left: 5px solid #d32f2f; padding: 10px; }
        td { padding: 4px 16px 4px 0; }
    </style>
</head>
<body>
    <h1>Tes Koneksi Database Perpustakaan</h1>
    <?php if (isset($koneksi) && $koneksi instanceof mysqli): ?>
        <p class="sukses">Koneksi ke MySQL berhasil.</p>
    <?php else: ?>
        <p class="gagal">Koneksi ke MySQL gagal atau variabel koneksi belum tersedia.</p>
    <?php endif; ?>
    <table>
        <tr><td>Host</td><td>: <?php echo htmlspecialchars($host_name); ?></td></tr>
        <tr><td>Database</td><td>: <?php echo htmlspecialchars($database_name); ?></td></tr>
        <tr><td>Versi server</td><td>: <?php echo htmlspecialchars((string) $versi_server); ?></td></tr>
    </table>
</body>
</html>