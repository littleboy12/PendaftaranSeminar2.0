<?php include "../layout/header.php";
require_once "../public/manage_registration.php";

$sqlShowData = mysqli_query($conn, "SELECT * FROM registration WHERE is_delete = '0'");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sqlShowDetailData = mysqli_query($conn, "SELECT * FROM registration WHERE id_registration = '$id'");
}

?>

<main class="main px-4">
    <div class="my-2 shadow p-2">
        <span class="text-secondary">Manage Registration</span>
        <table class="table table-bordered table-striped mt-2 mt-4">
            <thead>
                <tr>
                    <td>No.</td>
                    <td>Nama</td>
                    <td>institusi</td>
                    <td>Status Pendaftaran</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($sqlShowData as $data): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data['nama']; ?></td>
                        <td><?= $data['insitusi']; ?></td>
                        <td><?= $data['status']; ?></td>
                        <td>
                            <center>
                                <a href="?id=<?= $data['id_registration'] ?>">
                                    <button id="btnShowDetail" name="data" class="btn btn-primary btn-sm">Kelola</button>
                                </a>
                            </center>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div id="detailContainer" class="cardDetail card card-light rounded">
            <div class="card-header">
                <h5 class="card-title">Detail Pendaftaran</h5>
            </div>
            <?php if (isset($_GET['id'])) : ?>
                <?php foreach ($sqlShowDetailData as $data) : ?>
                    <div class="card-body">
                        <?php if (isset($error['errStatus'])): ?>
                            <div class="alert alert-warning alert-sm" role="alert">
                                <?php echo $error['errStatus']; ?>
                            </div>
                        <?php endif; ?>
                        <?php if (isset($error['errStatusAcc'])): ?>
                            <div class="alert alert-success alert-sm" role="alert">
                                <?php echo $error['errStatusAcc']; ?>
                            </div>
                        <?php endif; ?>
                        <form action="" method="POST">
                            <?php if (isset($error['errStatusConfirm'])): ?>
                                <div class="alert alert-danger alert-sm" role="alert">
                                    <div class="row">
                                        <div class="col">
                                            <?php echo $error['errStatusConfirm']; ?>
                                        </div>
                                        <div class="col">
                                            <div class="mx-3" style="right: 0; position: absolute;">
                                                <input type="submit" name="tidak" class="btn btn-outline-primary btn-sm" value="tidak">
                                                <input type="submit" name="ya" class="btn btn-outline-danger btn-sm" value="yakin">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="form-group my-2">
                                <input type="text" name="id_registration" value="<?= $data['id_registration'] ?>" class="form-control" id="id_registration" readonly hidden>
                            </div>
                            <div class="form-group my-2">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" name="nama" value="<?= $data['nama'] ?>" class="form-control" id="nama" readonly>
                            </div>
                            <div class="form-group my-2">
                                <label for="institusi">Institusi</label>
                                <input type="text" name="institusi" value="<?= $data['insitusi'] ?>" class="form-control" id="institusi" readonly>
                            </div>
                            <div class="form-group my-2">
                                <label for="email">Email</label>
                                <input type="text" name="email" value="<?= $data['email'] ?>" class="form-control" id="email" readonly>
                            </div>
                            <div class="form-group my-2">
                                <label for="email">Negara</label>
                                <input type="text" name="negara" value="<?= $data['negara'] ?>" class="form-control" id="negara" readonly>
                            </div>
                            <div class="form-group my-2">
                                <label for="email">Alamat</label>
                                <textarea name="alamat" name="" class="form-control" id=""><?= $data['alamat'] ?></textarea>
                            </div>
                            <div class="form-group my-2">
                                <label for="email">Status - <span style="font-style: italic; font-weight: 100; color: red;">Ubah Ke <b>Terdaftar</b> Untuk Menambahkan Ke Seminar</span> </label>
                                <select name="status" id="status" class="form-control">
                                    <?php if ($data['status'] == 'Terdaftar' or $data['status'] == 'Tidak' or $data['status'] == 'belum') : ?>
                                        <option value="0" selected><?= $data['status']; ?></option>
                                    <?php endif ?>
                                    <option value="Terdaftar">Daftarkan</option>
                                    <option value="Tidak">Tolak</option>
                                </select>
                            </div>
                            <div class="form-group my-2">
                                <input type="submit" name="edit" class="btn btn-success btn-sm" value="Simpan Perubahan">
                                <input type="submit" name="hapus" class="btn btn-danger btn-sm" value="Hapus Data">
                            </div>
                        </form>
                    </div>
                <?php endforeach ?>
            <?php endif ?>
        </div>
    </div>
</main>


<?php include "../layout/footer.php" ?>