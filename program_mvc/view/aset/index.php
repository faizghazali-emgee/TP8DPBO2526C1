<?php if (isset($_GET['status']) && $_GET['status'] == 'deleted'): ?>
    <div class="alert alert-success">Data aset berhasil dihapus.</div>
<?php endif; ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Daftar Inventaris & Aset Kelas</h3>
    <a href="index.php?page=aset&action=create" class="btn btn-success">+ Tambah Aset</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Kode Aset</th>
            <th>Nama Aset</th>
            <th>Lokasi Ruangan</th>
            <th>Kondisi</th>
            <th>Jumlah</th>
            <th>Tgl Masuk</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (isset($data) && $data && $data->num_rows > 0): ?>
            <?php $no = 1; while ($row = $data->fetch_assoc()): ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo htmlspecialchars($row['kode_aset']); ?></td>
                <td><?php echo htmlspecialchars($row['nama_aset']); ?></td>
                <td><?php echo htmlspecialchars($row['kode_ruangan'] . ' - ' . $row['nama_ruangan']); ?></td>
                <td><?php echo htmlspecialchars($row['kondisi']); ?></td>
                <td><?php echo htmlspecialchars($row['jumlah']); ?></td>
                <td><?php echo htmlspecialchars($row['tanggal_masuk']); ?></td>
                <td>
                    <a href="index.php?page=aset&action=edit&id=<?php echo $row['id_aset']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="index.php?page=aset&action=delete&id=<?php echo $row['id_aset']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus aset ini?')">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="8" class="text-center">Belum ada data aset.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>