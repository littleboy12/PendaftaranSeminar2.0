<?php
include "../layout/header.php"; // Header
include "../config/config.php"; // Koneksi ke database

// Pastikan pengguna telah login
if (!isset($_SESSION['username'])) {
    header("Location: view_login.php");
    exit();
}

// Mendapatkan username dari sesi
$username = $_SESSION['username'];

// Mengambil data profil pengguna dari database berdasarkan username
$query = "SELECT * FROM tb_user WHERE username = '$username'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $userData = mysqli_fetch_assoc($result);
} else {
    echo "<div class='alert alert-danger'>Data pengguna tidak ditemukan.</div>";
    exit();
}
?>

<main class="main px-4">
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Profil Saya</h1>

        <!-- Menampilkan data profil pengguna -->
        <div class="card mx-auto" style="max-width: 600px;">
            <div class="card-body">
                <h5 class="card-title">Informasi Profil</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <strong>Nama Lengkap:</strong> <?= htmlspecialchars($userData['nama']); ?>
                    </li>
                    <li class="list-group-item">
                        <strong>Username:</strong> <?= htmlspecialchars($userData['username']); ?>
                    </li>
                    <li class="list-group-item">
                        <strong>Email:</strong> <?= htmlspecialchars($userData['email']); ?>
                    </li>
                </ul>
                <div class="mt-3 text-center">
                    <a href="edit_profile.php" class="btn btn-primary">Edit Profil</a>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include "../layout/footer.php"; ?>