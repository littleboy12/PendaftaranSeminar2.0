<?php
include "../layout/header.php";

$nama = $_SESSION['nama'];

$sqlCekData = mysqli_query($conn, "SELECT * FROM `registration` WHERE `nama` = '$nama'");
$data = mysqli_fetch_array($sqlCekData);

// Mengambil data seminar yang didaftarkan oleh pengguna
$queryDaftar = "SELECT s.* FROM registrations r JOIN seminars s ON r.seminar_id = s.id WHERE r.user_name = '$nama'";
$resultDaftar = mysqli_query($conn, $queryDaftar);
?>

<main class="main px-4">
    <h5 class="mt-4">Daftar Seminar yang Didaftarkan:</h5>
    <table class="table table-striped">
        <thead class="table-primary">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Judul Seminar</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Waktu</th>
                <th scope="col">Lokasi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (mysqli_num_rows($resultDaftar) > 0) : ?>
                <?php $no = 1; ?>
                <?php while ($row = mysqli_fetch_assoc($resultDaftar)) : ?>
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><?= htmlspecialchars($row['title']); ?></td>
                        <td><?= htmlspecialchars($row['description']); ?></td>
                        <td><?= date('d M Y', strtotime($row['date'])); ?></td>
                        <td><?= date('H:i', strtotime($row['time'])); ?></td>
                        <td><?= htmlspecialchars($row['location']); ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else : ?>
                <tr>
                    <td colspan="6" class="text-center">Anda belum mendaftar di seminar mana pun.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    </div>
</main>

<?php include "../layout/footer.php"; ?>