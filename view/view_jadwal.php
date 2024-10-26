<?php
include "../layout/header.php";

// Memastikan pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: ./view_login.php");
    exit();
}

$nama = $_SESSION['nama'];

// Mengambil data pengguna dari database
$sqlCekData = mysqli_query($conn, "SELECT * FROM registration WHERE nama = '$nama'");
$data = mysqli_fetch_array($sqlCekData);

// Mengambil data seminar dari database
$query = "SELECT * FROM seminars";
$result = mysqli_query($conn, $query);
?>

<main class="main px-4">
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Daftar Seminar</h1>

        <!-- Tabel untuk menampilkan data seminar -->
        <table class="table table-striped table-hover">
            <thead class="table-primary">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul Seminar</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Pembicara</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Mengecek apakah ada data seminar yang diambil dari database
                if (mysqli_num_rows($result) > 0) {
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <tr>
                            <th scope="row"><?= $no++; ?></th>
                            <td><?= htmlspecialchars($row['title']); ?></td>
                            <td><?= htmlspecialchars($row['description']); ?></td>
                            <td><?= htmlspecialchars($row['location']); ?></td>
                            <td><?= date('d M Y', strtotime($row['date'])); ?></td>
                            <td><?= date('H:i', strtotime($row['time'])); ?></td>
                            <td><?= htmlspecialchars($row['speaker']); ?></td>
                            <td>
                                <form action="../public/proses_daftar.php" method="POST">
                                    <input type="hidden" name="seminar_id" value="<?= $row['id']; ?>">
                                    <input type="hidden" name="user_name" value="<?= $data['nama']; ?>">
                                    <button type="submit" class="btn btn-success">Daftar</button>
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="8" class="text-center">Tidak ada seminar yang tersedia.</td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <?php
        // Menampilkan pesan status pendaftaran
        if (isset($_GET['status'])) {
            if ($_GET['status'] == 'success') {
                echo '<div class="alert alert-success">Anda berhasil mendaftar seminar!</div>';
            } elseif ($_GET['status'] == 'error') {
                echo '<div class="alert alert-danger">Gagal mendaftar seminar. Silakan coba lagi.</div>';
            }
        }
        ?>

        <!-- Tombol untuk kembali ke halaman utama -->
        <a href="view_beranda.php" class="btn btn-primary">Kembali ke Beranda</a>
    </div>
</main>

<?php include "../layout/footer.php"; ?>
