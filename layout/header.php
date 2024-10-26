<?php
include_once "../app/dataLayout.php";
include_once "../config/config.php";
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ./view_login.php");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        .main {
            align-items: center;
        }

        .sidebar {
            background-color: #00BFFF;
            width: 280px;
            height: 100vh;
        }

        .sidebar a:hover {
            background-color: #f8f9fa;
            color: #007bff;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .sidebar a i:hover {
            transform: scale(1.2);
            color: #007bff;
            transition: transform 0.3s ease;
        }

        .nav-link {
            padding: 0.75rem 1rem;
        }

        .menu-title {
            margin-left: 80px;
            font-size: 1.5rem;
            color: #007bff;
        }
    </style>
</head>

<body>
    <div class="container" style="background-color: #007bff;">
        <div class="d-flex align-items-center flex-column flex-shrink-0 p-5 fixed-top sidebar bg-secondary-subtle" style="background-color: black; width: 280px; height: 100vh;">
            <span class="fs-4 text-primary text-center fw-bold text-start">SeminarKu</span>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <?php if ($_SESSION['level'] == 'user') : ?>
                    <?php foreach ($menuPeserta as $fitur) : ?>
                        <li>
                            <a href="<?= $fitur[3] ?>" class="nav-link link-dark <?php if (basename($_SERVER['PHP_SELF']) == basename($fitur[3])) echo 'active bg-primary text-white'; ?>">
                                <i class="<?= $fitur[2] ?> hover-shadow-lg text-center me-1 <?php if (basename($_SERVER['PHP_SELF']) == basename($fitur[3])) echo 'text-white';
                                                                                            else echo 'text-primary'; ?>"></i>
                                <?= $fitur[0] ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                <?php elseif ($_SESSION['level'] == 'admin') : ?>
                    <?php foreach ($menuAdmin as $fitur) : ?>
                        <li>
                            <a href="<?= $fitur[3] ?>" class="nav-link link-dark <?php if (basename($_SERVER['PHP_SELF']) == basename($fitur[3])) echo 'active bg-primary text-white'; ?>">
                                <i class="<?= $fitur[2] ?> hover-shadow-lg text-center me-1 <?php if (basename($_SERVER['PHP_SELF']) == basename($fitur[3])) echo 'text-white';
                                                                                            else echo 'text-primary'; ?>"></i>
                                <?= $fitur[0] ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                <?php endif ?>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong><?= $_SESSION['nama']; ?></strong>
                </a>
                <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                    <li><a class="dropdown-item" href="../view/view_profile.php">Profil</a></li>
                    <li><a class="dropdown-item" href="#">Notifikasi</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="../public/logout.php">Sign out</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div>
        <nav class="setNavbar navbar">
            <div class="d-flex align-items-center">

                <button id="sidebarToggle" class="fa-solid fa-bars btn btn-primary ms-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"></button>
                <span class="menu-title fw-bold">
                    <?php
                    // Menampilkan keterangan menu aktif
                    $currentPage = basename($_SERVER['PHP_SELF']);
                    switch ($currentPage) {
                        case 'view_profile.php':
                            echo 'Profil';
                            break;
                        case 'view_jadwal.php':
                            echo 'Jadwal Seminar';
                            break;
                        case 'view_Beranda.php':
                            echo 'Beranda';
                            break;
                        case 'view_seminar.php':
                            echo 'Seminar Saya';
                            break;
                        default:
                            echo 'Beranda';
                    }
                    ?>
                </span>
            </div>
        </nav>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-wEmeIV1mKuiNp12inb93x4NlWJoO/9EPvE1H25D6AlJyUGl2vf8CKk2sNeMXc4iW" crossorigin="anonymous"></script>
</body>

</html>