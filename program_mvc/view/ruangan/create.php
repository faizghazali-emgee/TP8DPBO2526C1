<h3>Tambah Ruangan Baru</h3>
<form action="index.php?page=ruangan&action=store" method="POST" class="mt-3">
    <div class="mb-3">
        <label class="form-label">Kode Ruangan</label>
        <input type="text" name="kode_ruangan" class="form-control" placeholder="Contoh: R-103" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Nama Ruangan / Kelas</label>
        <input type="text" name="nama_ruangan" class="form-control" placeholder="Contoh: Kelas XI IPS 2" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Penanggung Jawab (Wali Kelas)</label>
        <input type="text" name="penanggung_jawab" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="index.php?page=ruangan" class="btn btn-secondary">Batal</a>
</form>