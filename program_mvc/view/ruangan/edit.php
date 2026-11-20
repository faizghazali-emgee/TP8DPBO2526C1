<h3>Edit Ruangan</h3>
<?php if (isset($row) && $row): ?>
<form action="index.php?page=ruangan&action=update" method="POST" class="mt-3">
    <input type="hidden" name="id_ruangan" value="<?php echo $row['id_ruangan']; ?>">
    <div class="mb-3">
        <label class="form-label">Kode Ruangan</label>
        <input type="text" name="kode_ruangan" class="form-control" value="<?php echo htmlspecialchars($row['kode_ruangan']); ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Nama Ruangan / Kelas</label>
        <input type="text" name="nama_ruangan" class="form-control" value="<?php echo htmlspecialchars($row['nama_ruangan']); ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Penanggung Jawab</label>
        <input type="text" name="penanggung_jawab" class="form-control" value="<?php echo htmlspecialchars($row['penanggung_jawab']); ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="index.php?page=ruangan" class="btn btn-secondary">Batal</a>
</form>
<?php else: ?>
    <div class="alert alert-danger">Data ruangan tidak ditemukan.</div>
<?php endif; ?>