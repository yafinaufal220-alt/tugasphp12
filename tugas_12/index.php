<?php
// Autoload controller
require_once 'controllers/MahasantriController.php';

// Inisialisasi aplikasi
$app = new MahasantriController();

/** * LOGIC ROUTER:
 * Mengarahkan setiap request ke fungsi yang tepat di Controller
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1. Cek jika ada request POST untuk SIMPAN (Tambah Data)
    if (isset($_POST['simpan'])) {
        $app->store();
    } 
    // 2. Cek jika ada request POST untuk UPDATE (Edit Data)
    elseif (isset($_POST['update'])) {
        $app->update();
    }
} 
// 3. Cek jika ada request GET untuk DELETE (Hapus Data)
elseif (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $app->delete($_GET['id']);
} 
// 4. Jika tidak ada request khusus, tampilkan halaman utama
else {
    $app->index();
}