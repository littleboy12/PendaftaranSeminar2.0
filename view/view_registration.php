<?php include_once "../app/dataLayout.php";
require_once "../public/registration.php";

if (isset($_SESSION['username'])) {
    header("Location: ./view_beranda.php");

    exit();
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SEMINAR NASIONAL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="regis">
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Pendaftaran Seminar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <span class="navbar-text mx-4" style="right: 0; position: absolute;">
                    <a href="./view_login.php"><button type="button" class="btn btn-outline-dark">Sign In</button></a>
                </span>
            </div>
        </div>
    </nav>
    <main class="container bg-light rounded py-3" style="margin-top: 70px;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Formulir Pendaftaran</h2>
                <form method="POST" action="">
                    <h6 class="text-secondary-emphasis">- Biodata Anda</h6>
                    <div class="mx-3">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" id="nama" value="<?= htmlspecialchars($nama) ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="negara" class="form-label">Negara</label>
                            <input class="form-control" name="negara" id="negara" value="<?= htmlspecialchars($negara) ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat Lengkap</label>
                            <textarea class="form-control" name="alamat" id="alamat" rows="3" value="" required><?= htmlspecialchars($alamat) ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="institusi" class="form-label">Institusi</label>
                            <input class="form-control" name="institusi" id="institusi" value="<?= htmlspecialchars($institusi) ?>" required>
                        </div>
                    </div>
                    <h6 class="text-secondary-emphasis" style="margin-top: 50px;">- Akun Anda</h6>
                    <div class="mx-3">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" value="<?= htmlspecialchars($email) ?>" required>
                            <?php if (isset($error['errEmail'])): ?>
                                <p style="color: red;"><?php echo $error['errEmail']; ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="username" value="<?= htmlspecialchars($username) ?>" required>
                            <?php if (isset($error['errUsername'])): ?>
                                <p style="color: red;"><?php echo $error['errUsername']; ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" value="<?= htmlspecialchars($password) ?>" required>
                            <?php if (isset($error['errPassword'])): ?>
                                <p style="color: red;"><?php echo $error['errPassword']; ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="repassword" class="form-label">Re-Enter Password</label>
                            <input type="password" name="rePassword" class="form-control" id="repassword" value="<?= htmlspecialchars($rePassword) ?>" required>
                            <?php if (isset($error['errPassword'])): ?>
                                <p style="color: red;"><?php echo $error['errPassword']; ?></p>
                            <?php endif; ?>
                        </div>
                        <input type="submit" name="register" class="btn btn-primary" value="Daftar">
                        <input type="submit" name="reset" class="btn btn-outline-danger" value="Batal">
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../assets/js/script.js"></script>
</body>

</html>