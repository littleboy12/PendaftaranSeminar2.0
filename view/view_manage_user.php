<?php include "../layout/header.php";
$sqlShowData = mysqli_query($conn, "SELECT * FROM tb_user");

?>

<main class="main px-4">
    <div class="my-2 shadow p-2">
        <span class="text-secondary">Manage Peserta</span>
        <table class="table table-bordered table-striped mt-2 mt-4">
            <thead>
                <tr>
                    <td>No.</td>
                    <td>Nama</td>
                    <td>Role</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($sqlShowData as $data): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data['nama']; ?></td>
                        <td><?= $data['level']; ?></td>
                        <td>
                            <center>
                                <a href="?id=<?= $data['id_user'] ?>">
                                    <button id="btnShowDetail" name="data" class="btn btn-primary btn-sm">Kelola</button>
                                </a>
                            </center>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>

<?php include "../layout/footer.php" ?>