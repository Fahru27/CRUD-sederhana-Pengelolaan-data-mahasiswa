<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Edit Data Mahasiwa</h2>
            <form action="/mahasiswa/update/<?= $mahasiswa['id']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slugh" value="<?= $mahasiswa['slugh']; ?>">
                <input type="hidden" name="gambarLama" value="<?= $mahasiswa['gambar']; ?>">
                <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= (old('nama')) ? old('nama') : $mahasiswa['nama']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('jurusan')) ? 'is-invalid' : ''; ?>" id="jurusan" name="jurusan" value="<?= (old('jurusan')) ? old('jurusan') : $mahasiswa['jurusan']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('jurusan'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                    <div class="col-md-10">
                        <select class="form-select" aria-label="Default select example" name="gender">
                            <?php if ($mahasiswa['gender'] === "Laki-laki") : ?>
                                <option selected> <?= $mahasiswa['gender']; ?> </option>
                                <option value="Perempuan">Perempuan</option>
                            <?php endif; ?>
                            <?php if ($mahasiswa['gender'] === "Perempuan") : ?>
                                <option selected> <?= $mahasiswa['gender']; ?> </option>
                                <option value="Laki-laki">Laki-laki</option>
                            <?php endif; ?>
                            <?php if ($mahasiswa['gender'] === "-") : ?>
                                <option selected> <?= $mahasiswa['gender']; ?> </option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-md-10">
                        <select class="form-select" aria-label="Default select example" name="status">
                            <?php if ($mahasiswa['status'] === "Aktif") : ?>
                                <option selected> <?= $mahasiswa['status']; ?> </option>
                                <option value="Cuti">Cuti</option>
                                <option value="Lulus">Lulus</option>
                            <?php endif; ?>
                            <?php if ($mahasiswa['status'] === "Cuti") : ?>
                                <option selected> <?= $mahasiswa['status']; ?> </option>
                                <option value="Aktif">Aktif</option>
                                <option value="Lulus">Lulus</option>
                            <?php endif; ?>
                            <?php if ($mahasiswa['status'] === "Lulus") : ?>
                                <option selected> <?= $mahasiswa['status']; ?> </option>
                                <option value="Aktif">Aktif</option>
                                <option value="Cuti">Cuti</option>
                            <?php endif; ?>
                            <?php if ($mahasiswa['status'] === "-") : ?>
                                <option selected> <?= $mahasiswa['status']; ?> </option>
                                <option value="Aktif">Aktif</option>
                                <option value="Cuti">Cuti</option>
                                <option value="Lulus">Lulus</option>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="th_awal" class="col-sm-2 col-form-label">Tahun Masuk</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nim" name="th_awal" value="<?= (old('th_awal')) ? old('th_awal') : $mahasiswa['th_awal']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nim'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nim')) ? 'is-invalid' : ''; ?>" id="nim" name="nim" value="<?= (old('nim')) ? old('nim') : $mahasiswa['nim']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nim'); ?>
                        </div>
                    </div>
                </div>
                <div class=" form-group row">
                    <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-2">
                        <img src="/img/<?= $mahasiswa['gambar']; ?>" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" id="gambar" name="gambar" onchange="previewImg()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('gambar'); ?>
                            </div>
                            <label class="custom-file-label" for="gambar"><?= $mahasiswa['gambar']; ?></label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>