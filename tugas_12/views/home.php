<main class="flex-1 flex flex-col min-w-0 overflow-hidden bg-slate-50 dark:bg-slate-950 relative">
    <header class="h-16 bg-white dark:bg-slate-900 border-b dark:border-slate-800 flex items-center justify-between px-8 sticky top-0 z-30">
        <div>
            <h1 class="text-xl font-bold text-slate-800 dark:text-white">Dashboard Mahasantri</h1>
            <p class="text-xs text-slate-500">Selamat datang kembali, Admin Utama</p>
        </div>
        <div class="flex items-center gap-4">
            <button onclick="toggleDarkMode()" class="p-2 bg-slate-100 dark:bg-slate-800 rounded-full hover:ring-2 ring-blue-500/20 transition-all">
                <i id="darkIcon" class="fas fa-moon text-slate-600 dark:text-yellow-400"></i>
            </button>
            <div class="flex items-center gap-3 pl-4 border-l dark:border-slate-800">
                <div class="text-right hidden sm:block">
                    <p class="text-xs font-bold dark:text-white">Admin Utama</p>
                    <p class="text-[10px] text-slate-500">Administrator</p>
                </div>
                <div class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center text-white font-bold shadow-lg shadow-blue-500/30">
                    AU
                </div>
            </div>
        </div>
    </header>

    <div class="flex-1 overflow-y-auto p-8 space-y-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white dark:bg-slate-900 p-6 rounded-2xl shadow-sm border dark:border-slate-800 relative overflow-hidden group">
                <div class="flex justify-between items-start mb-4">
                    <div class="w-12 h-12 bg-blue-100 dark:bg-blue-500/10 rounded-xl flex items-center justify-center text-blue-600">
                        <i class="fas fa-user-graduate text-xl"></i>
                    </div>
                    <span class="text-emerald-500 text-xs font-bold flex items-center gap-1">
                        +12% <i class="fas fa-arrow-up text-[10px]"></i>
                    </span>
                </div>
                <p class="text-slate-500 text-xs font-medium">Total Mahasantri</p>
                <h3 class="text-2xl font-black dark:text-white"><?= number_format($total_santri) ?></h3>
            </div>

            <div class="bg-white dark:bg-slate-900 p-6 rounded-2xl shadow-sm border dark:border-slate-800">
                <div class="flex justify-between items-start mb-4">
                    <div class="w-12 h-12 bg-purple-100 dark:bg-purple-500/10 rounded-xl flex items-center justify-center text-purple-600">
                        <i class="fas fa-university text-xl"></i>
                    </div>
                    <span class="text-slate-400 text-xs font-bold">Tetap</span>
                </div>
                <p class="text-slate-500 text-xs font-medium">Total Jurusan</p>
                <h3 class="text-2xl font-black dark:text-white">2</h3>
            </div>

            <div class="bg-white dark:bg-slate-900 p-6 rounded-2xl shadow-sm border dark:border-slate-800">
                <div class="flex justify-between items-start mb-4">
                    <div class="w-12 h-12 bg-orange-100 dark:bg-orange-500/10 rounded-xl flex items-center justify-center text-orange-600">
                        <i class="fas fa-clock text-xl"></i>
                    </div>
                    <span class="text-red-500 text-xs font-bold flex items-center gap-1">
                        -2% <i class="fas fa-arrow-down text-[10px]"></i>
                    </span>
                </div>
                <p class="text-slate-500 text-xs font-medium">Aktif Semester Ini</p>
                <h3 class="text-2xl font-black dark:text-white"><?= number_format($total_santri) ?></h3>
            </div>

            <div class="bg-white dark:bg-slate-900 p-6 rounded-2xl shadow-sm border dark:border-slate-800">
                <div class="flex justify-between items-start mb-4">
                    <div class="w-12 h-12 bg-emerald-100 dark:bg-emerald-500/10 rounded-xl flex items-center justify-center text-emerald-600">
                        <i class="fas fa-award text-xl"></i>
                    </div>
                    <span class="text-emerald-500 text-xs font-bold flex items-center gap-1">
                        +5% <i class="fas fa-arrow-up text-[10px]"></i>
                    </span>
                </div>
                <p class="text-slate-500 text-xs font-medium">Lulus Tahun Ini</p>
                <h3 class="text-2xl font-black dark:text-white">0</h3>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 bg-white dark:bg-slate-900 p-6 rounded-2xl border dark:border-slate-800 shadow-sm">
                <h4 class="text-sm font-bold dark:text-white mb-6">Statistik Pendaftaran</h4>
                <div class="h-64">
                    <canvas id="registrationChart"></canvas>
                </div>
            </div>

            <div class="bg-white dark:bg-slate-900 p-6 rounded-2xl border dark:border-slate-800 shadow-sm">
                <h4 class="text-sm font-bold dark:text-white mb-6">Distribusi Jurusan</h4>
                <div class="h-64 relative">
                    <canvas id="departmentChart"></canvas>
                    <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
                        <span class="text-xl font-black dark:text-white"><?= $total_santri ?></span>
                        <span class="text-[10px] text-slate-500 uppercase">Mahasantri</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-slate-900 rounded-2xl border dark:border-slate-800 shadow-sm overflow-hidden">
            <div class="p-6 border-b dark:border-slate-800 flex flex-col sm:flex-row justify-between items-center gap-4">
                <h4 class="text-sm font-bold dark:text-white text-left w-full">Daftar Mahasantri Terbaru</h4>
                <button onclick="openAddModal()" class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-xl text-xs font-bold transition-all flex items-center justify-center gap-2 whitespace-nowrap">
                    <i class="fas fa-plus"></i> Tambah Mahasantri
                </button>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-slate-50 dark:bg-slate-800/50 text-slate-400 text-[10px] uppercase font-bold tracking-widest">
                        <tr>
                            <th class="px-8 py-4">Nama Mahasiswa</th>
                            <th class="px-8 py-4">NIM</th>
                            <th class="px-8 py-4">Jurusan</th>
                            <th class="px-8 py-4">Status</th>
                            <th class="px-8 py-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y dark:divide-slate-800">
                        <?php foreach ($data_mahasantri as $row): ?>
                        <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/50 transition-colors group">
                            <td class="px-8 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-blue-100 dark:bg-blue-500/20 text-blue-600 flex items-center justify-center text-[10px] font-black uppercase">
                                        <?= substr($row['nama_lengkap'], 0, 1) ?>
                                    </div>
                                    <span class="text-sm font-bold text-slate-700 dark:text-slate-200"><?= $row['nama_lengkap'] ?></span>
                                </div>
                            </td>
                            <td class="px-8 py-4 text-xs text-slate-500 font-mono"><?= $row['nim'] ?></td>
                            <td class="px-8 py-4 text-xs text-slate-600 dark:text-slate-400 font-medium"><?= $row['nama_jurusan'] ?></td>
                            <td class="px-8 py-4">
                                <span class="px-2 py-1 bg-emerald-100 dark:bg-emerald-500/10 text-emerald-600 text-[10px] font-bold rounded-lg">Aktif</span>
                            </td>
                            <td class="px-8 py-4">
                                <div class="flex justify-center items-center gap-2">
                                    <button onclick="viewDetail('<?= $row['nama_lengkap'] ?>', '<?= $row['nim'] ?>', '<?= $row['nama_jurusan'] ?>')" class="w-8 h-8 rounded-lg bg-emerald-50 dark:bg-emerald-500/10 text-emerald-600 hover:bg-emerald-600 hover:text-white transition-all">
                                        <i class="fas fa-eye text-xs"></i>
                                    </button>
                                    <button onclick="openEditModal(<?= $row['id_mahasantri'] ?>, '<?= $row['nama_lengkap'] ?>', '<?= $row['nim'] ?>', '<?= $row['nama_jurusan'] ?>')" class="w-8 h-8 rounded-lg bg-blue-50 dark:bg-blue-500/10 text-blue-600 hover:bg-blue-600 hover:text-white transition-all">
                                        <i class="fas fa-edit text-xs"></i>
                                    </button>
                                    <a href="index.php?action=delete&id=<?= $row['id_mahasantri'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="w-8 h-8 rounded-lg bg-red-50 dark:bg-red-500/10 text-red-500 hover:bg-red-600 hover:text-white transition-all flex items-center justify-center">
                                        <i class="fas fa-trash text-xs"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>