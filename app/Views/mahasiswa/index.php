<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container shadow mt-5">
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3 mt-5">
                <h1 style="margin-top: 10px;">Daftar Mahasiswa</h1>
                <a href="/mahasiswa/create" class="btn btn-primary my-3">Tambah data Mahasiswa</a>
                <?php if (session()->getFlashData('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashData('pesan'); ?>
                    </div>
                <?php endif; ?>
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari.." aria-label="Recipient's username" name="keyword" aria-describedby="button-addon2">
                        <button class="btn btn-primary" type="submit" id="button-addon2">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                    <?php foreach ($mahasiswa as $m) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $m['nama']; ?></td>
                            <td><?= $m['nim']; ?></td>
                            <td>
                                <a href="/mahasiswa/<?= $m['slugh']; ?>" class="btn btn-success">Detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?= $pager->links('mahasiswa', 'my_pagination') ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>