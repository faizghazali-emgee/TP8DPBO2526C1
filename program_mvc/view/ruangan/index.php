<?php if (isset($_GET['status'])): ?>
    <?php if ($_GET['status'] == 'deleted'): ?>
        <div class="alert alert-success">Data ruangan berhasil dihapus.</div>
    <?php elseif ($_GET['status'] == 'error_fk'): ?>
        <div class="alert alert-danger">Gagal menghapus! Ruangan ini masih memiliki data aset di dalamnya.</div>
    <?php endif; ?>
<?php endif; ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Daftar Ruangan / Kelas</h3>
    <a href="index.php?page=ruangan&action=create" class="btn btn-success">+ Tambah Ruangan</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Kode Ruangan</th>
            <th>Nama Ruangan</th>
            <th>Penanggung Jawab</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (isset($data) && $data && $data->num_rows > 0): ?>
            <?php $no = 1; while ($row = $data->fetch_assoc()): ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo htmlspecialchars($row['kode_ruangan']); ?></td>
                <td><?php echo htmlspecialchars($row['nama_ruangan']); ?></td>
                <td><?php echo htmlspecialchars($row['penanggung_jawab']); ?></td>
                <td>
                    <a href="index.php?page=ruangan&action=edit&id=<?php echo $row['id_ruangan']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="index.php?page=ruangan&action=delete&id=<?php echo $row['id_ruangan']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus ruangan ini?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="5" class="text-center">Belum ada data ruangan.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>