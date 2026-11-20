<h3>Tambah Aset Baru</h3>
<form action="index.php?page=aset&action=store" method="POST" class="mt-3">
    <div class="mb-3">
        <label class="form-label">Kode Aset</label>
        <input type="text" name="kode_aset" class="form-control" placeholder="Contoh: INV-004" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Nama Aset</label>
        <input type="text" name="nama_aset" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Lokasi Ruangan / Kelas</label>
        <select name="id_ruangan" class="form-control form-select" required>
            <option value="">-- Pilih Ruangan --</option>
            <?php if (isset($ruanganList) && $ruanganList): ?>
                <?php while ($r = $ruanganList->fetch_assoc()): ?>
                    <option value="<?php echo $r['id_ruangan']; ?>">
                        <?php echo htmlspecialchars($r['kode_ruangan'] . ' - ' . $r['nama_ruangan']); ?>
                    </option>
                <?php endwhile; ?>
            <?php endif; ?>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Kondisi</label>
        <select name="kondisi" class="form-control form-select" required>
            <option value="Baik">Baik</option>
            <option value="Rusak Ringan">Rusak Ringan</option>
            <option value="Rusak Berat">Rusak Berat</option>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Jumlah</label>
        <input type="number" name="jumlah" class="form-control" min="1" value="1" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Tanggal Masuk</label>
        <input type="date" name="tanggal_masuk" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="index.php?page=aset" class="btn btn-secondary">Batal</a>
</form>