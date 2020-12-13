<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-5 shadow">
    <div class="row pt-5 pb-1 px-4">
        <div class="col">
            <img src="/img/<?= $mahasiswa['gambar']; ?>" width="150px">
        </div>
        <div class="col-md-10 mt-4">
            <p>Nama: <?= $mahasiswa['nama']; ?></p>
            <p>Jenis Kelamin: <?= $mahasiswa['gender']; ?></p>
        </div>
    </div>
    <hr>
    <div class="row pt-5 pb-1 px-4">
        <div class="col">
            <p>Program Studi : <?= $mahasiswa['jurusan']; ?></p>
            <p>NIM : <?= $mahasiswa['nim']; ?></p>
            <p>Semester Awal : <?= $mahasiswa['th_awal']; ?></p>
            <p>Status : <?= $mahasiswa['status']; ?></p>
        </div>
    </div>
    <div class="row pt-5 pb-1 px-4">
        <div class="col">
            <a href="/mahasiswa/edit/<?= $mahasiswa['slugh']; ?>" class="btn btn-success">Edit</a>

            <form action="/mahasiswa/delete/<?= $mahasiswa['id']; ?>" method="post" class="d-inline">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
            </form>
            <br><br>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>