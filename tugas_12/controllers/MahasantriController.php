<?php
// Menggunakan __DIR__ agar PHP mencari folder dari lokasi file ini berada
include_once __DIR__ . '/../config/Database.php';
include_once __DIR__ . '/../models/Mahasantri.php';

class MahasantriController {
    
    // Menampilkan halaman utama dashboard
    public function index() {
        // 1. Inisialisasi Database dan Model
        $database = new Database();
        $db = $database->getConnection();
        $mahasantri = new Mahasantri($db);

        // 2. Ambil data dari database melalui Model
        $data_mahasantri = $mahasantri->getAll()->fetchAll(PDO::FETCH_ASSOC);
        $total_santri = $mahasantri->countAll();

        // 3. Panggil View (Urutan jangan sampai tertukar)
        include_once __DIR__ . '/../views/layout/header.php';
        include_once __DIR__ . '/../views/layout/sidebar.php';
        include_once __DIR__ . '/../views/home.php';
        include_once __DIR__ . '/../views/layout/footer.php';
    }

    // Menangani proses tambah mahasantri baru
    public function store() {
        if (isset($_POST['simpan'])) {
            $database = new Database();
            $db = $database->getConnection();
            $mahasantri = new Mahasantri($db);

            // Tangkap data dari form
            $nama = $_POST['nama'];
            $nim = $_POST['nim'];
            $jurusan = $_POST['jurusan'];

            // Kirim ke model untuk disimpan
            if ($mahasantri->create($nama, $nim, $jurusan)) {
                header("Location: index.php?status=success");
            } else {
                header("Location: index.php?status=error");
            }
            exit();
        }
    }

    // Menangani proses update/edit data mahasantri
    public function update() {
        if (isset($_POST['update'])) {
            $database = new Database();
            $db = $database->getConnection();
            $mahasantri = new Mahasantri($db);

            // Tangkap data dari form edit
            $id = $_POST['id'];
            $nama = $_POST['nama'];
            $nim = $_POST['nim'];
            $jurusan = $_POST['jurusan'];

            // Panggil fungsi update di model
            if ($mahasantri->update($id, $nama, $nim, $jurusan)) {
                header("Location: index.php?status=updated");
            } else {
                header("Location: index.php?status=error_update");
            }
            exit();
        }
    }

    // Menangani proses hapus mahasantri
    public function delete($id) {
        $database = new Database();
        $db = $database->getConnection();
        $mahasantri = new Mahasantri($db);

        // Panggil fungsi delete di model
        if ($mahasantri->delete($id)) {
            header("Location: index.php?status=deleted");
        } else {
            header("Location: index.php?status=error_delete");
        }
        exit();
    }
}