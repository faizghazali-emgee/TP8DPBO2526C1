<h3>Edit Data Aset</h3>
<?php if (isset($row) && $row): ?>
<form action="index.php?page=aset&action=update" method="POST" class="mt-3">
    <input type="hidden" name="id_aset" value="<?php echo $row['id_aset']; ?>">
    <div class="mb-3">
        <label class="form-label">Kode Aset</label>
        <input type="text" name="kode_aset" class="form-control" value="<?php echo htmlspecialchars($row['kode_aset']); ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Nama Aset</label>
        <input type="text" name="nama_aset" class="form-control" value="<?php echo htmlspecialchars($row['nama_aset']); ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Lokasi Ruangan / Kelas</label>
        <select name="id_ruangan" class="form-control form-select" required>
            <?php if (isset($ruanganList) && $ruanganList): ?>
                <?php while ($r = $ruanganList->fetch_assoc()): ?>
                    <option value="<?php echo $r['id_ruangan']; ?>" <?php echo ($r['id_ruangan'] == $row['id_ruangan']) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($r['kode_ruangan'] . ' - ' . $r['nama_ruangan']); ?>
                    </option>
                <?php endwhile; ?>
            <?php endif; ?>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Kondisi</label>
        <select name="kondisi" class="form-control form-select" required>
            <option value="Baik" <?php echo ($row['kondisi'] == 'Baik') ? 'selected' : ''; ?>>Baik</option>
            <option value="Rusak Ringan" <?php echo ($row['kondisi'] == 'Rusak Ringan') ? 'selected' : ''; ?>>Rusak Ringan</option>
            <option value="Rusak Berat" <?php echo ($row['kondisi'] == 'Rusak Berat') ? 'selected' : ''; ?>>Rusak Berat</option>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Jumlah</label>
        <input type="number" name="jumlah" class="form-control" min="1" value="<?php echo $row['jumlah']; ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Tanggal Masuk</label>
        <input type="date" name="tanggal_masuk" class="form-control" value="<?php echo $row['tanggal_masuk']; ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="index.php?page=aset" class="btn btn-secondary">Batal</a>
</form>
<?php else: ?>
    <div class="alert alert-danger">Data aset tidak ditemukan.</div>
<?php endif; ?>