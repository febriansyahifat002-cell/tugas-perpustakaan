<?php 
 require_once("koneksi.php");
 $sql = "select id, no_anggota,nama_lengkap,email,no_hp,jenis_anggota,alamat from anggota order by id desc";

 $hasil  = mysqli_query($koneksi, $sql);
 $jumlah = mysqli_num_rows($hasil). " Data ditemukan";
  ?>
 <!doctype html>
 <html lang="id">
    <head>
    <meta charset="UTF-8">
    <title>Table</title>
    </head>
    <body>
        <header>
            <h1>Perpustakaan</h1>
        </header>
        <main>
            <table>
                <tr>
                    <th>No</th>
                    <th>No anggota</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>NO HP</th>
                    <th>Jenis Anggota</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
                <?php $no = 1; while ($baris = mysqli_fetch_assoc($hasil)) { ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo htmlspecialchars($baris['id']); ?></td
                    <td><?php echo htmlspecialchars($baris['no_anggota']); ?></td>
                    <td><?php echo htmlspecialchars($baris['nama_lengkap']); ?></td>
                    <td><?php echo htmlspecialchars($baris['email']); ?></td>
                    <td><?php echo htmlspecialchars($baris['no_hp']); ?></td>
                    <td><?php echo htmlspecialchars($baris['jenis_anggota']); ?></td>
                    <td><?php echo htmlspecialchars($baris['alamat']); ?></td>
                    
                    <td>
                        <a href="edit_anggota.php?id=<?php echo $baris['id']; ?>">
                            Edit
                        </a>

                        <a href="detail.php?id=<?php echo $baris['id']; ?>">Detail</a>
                        <form class="inline" action="hapus.php" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                            <input type="hidden" name="id" value="<?php echo (int) $baris['id']; ?>">
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </table>
            <?php mysqli_free_result($hasil); ?>
        </main>
    </body>
 </html>