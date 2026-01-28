<footer class="w-full py-8 text-center text-sm text-gray-400 border-t dark:border-slate-800 bg-white dark:bg-slate-950">
        <p>© 2026 <span class="font-bold">PeTIK Jombang</span> Academic System. All rights reserved.</p>
    </footer>

    </div> </main> <div id="modalMahasiswa" class="hidden fixed inset-0 z-50 overflow-y-auto bg-slate-900/50 backdrop-blur-sm flex items-center justify-center p-4">
    <div id="modalContent" class="bg-white dark:bg-slate-900 w-full max-w-md rounded-2xl shadow-2xl transform transition-all scale-95 opacity-0">
        <div class="p-6 border-b dark:border-slate-800 flex justify-between items-center">
            <h3 id="modalTitle" class="font-bold dark:text-white">Tambah Mahasantri Baru</h3>
            <button onclick="toggleModal()" class="text-slate-400 hover:text-red-500 transition-colors">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <form action="index.php" method="POST" class="p-6 space-y-4">
            <input type="hidden" name="id" id="edit_id">
            
            <div>
                <label class="block text-xs font-bold text-slate-500 mb-1 uppercase tracking-wider">Nama Lengkap</label>
                <input type="text" name="nama" id="form_nama" class="w-full bg-slate-50 dark:bg-slate-800 border-none rounded-xl px-4 py-3 text-sm dark:text-white focus:ring-2 focus:ring-blue-500 transition-all" placeholder="Masukkan nama..." required>
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-500 mb-1 uppercase tracking-wider">NIM</label>
                <input type="text" name="nim" id="form_nim" class="w-full bg-slate-50 dark:bg-slate-800 border-none rounded-xl px-4 py-3 text-sm dark:text-white focus:ring-2 focus:ring-blue-500 transition-all" placeholder="Masukkan NIM..." required>
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-500 mb-1 uppercase tracking-wider">Jurusan</label>
                <select name="jurusan" id="form_jurusan" class="w-full bg-slate-50 dark:bg-slate-800 border-none rounded-xl px-4 py-3 text-sm dark:text-white focus:ring-2 focus:ring-blue-500 transition-all">
                    <option value="PPL">Pengembangan Perangkat Lunak (PPL)</option>
                    <option value="DM">Digital Marketing (DM)</option>
                </select>
            </div>
            <div class="pt-4">
                <button type="submit" name="simpan" id="submitBtn" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-bold transition-all shadow-lg shadow-blue-500/30">
                    Simpan Data
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    /** LOGIC: DARK MODE TOGGLE **/
    function toggleDarkMode() {
        const html = document.documentElement;
        const darkIcon = document.getElementById('darkIcon');
        html.classList.toggle('dark');
        const isDark = html.classList.contains('dark');
        if(darkIcon) darkIcon.className = isDark ? 'fas fa-sun' : 'fas fa-moon';
        localStorage.theme = isDark ? 'dark' : 'light';
    }

    if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
        const darkIcon = document.getElementById('darkIcon');
        if(darkIcon) darkIcon.className = 'fas fa-sun';
    }

    /** LOGIC: SIDEBAR TOGGLE (MOBILE) **/
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        if(sidebar) sidebar.classList.toggle('-translate-x-full');
        if(overlay) overlay.classList.toggle('hidden');
    }

    /** LOGIC: MODAL ANIMATION **/
    function toggleModal() {
        const modal = document.getElementById('modalMahasiswa');
        const content = document.getElementById('modalContent');
        if (!modal || !content) return;

        if (modal.classList.contains('hidden')) {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            setTimeout(() => {
                content.classList.remove('scale-95', 'opacity-0');
                content.classList.add('scale-100', 'opacity-100');
            }, 10);
        } else {
            content.classList.remove('scale-100', 'opacity-100');
            content.classList.add('scale-95', 'opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }, 200);
        }
    }

    /** FUNGSI MODAL: TAMBAH **/
    function openAddModal() {
        const form = document.querySelector('#modalMahasiswa form');
        document.getElementById('modalTitle').innerText = "Tambah Mahasantri Baru";
        document.getElementById('submitBtn').name = "simpan";
        document.getElementById('submitBtn').innerText = "Simpan Data";
        if(form) form.reset();
        document.getElementById('edit_id').value = "";
        toggleModal();
    }

    /** FUNGSI MODAL: EDIT **/
    function openEditModal(id, nama, nim, jurusan) {
        document.getElementById('modalTitle').innerText = "Edit Mahasantri";
        document.getElementById('submitBtn').name = "update";
        document.getElementById('submitBtn').innerText = "Simpan Perubahan";
        
        document.getElementById('edit_id').value = id;
        document.getElementById('form_nama').value = nama;
        document.getElementById('form_nim').value = nim;
        
        // Cek value jurusan untuk select
        const selectJurusan = document.getElementById('form_jurusan');
        selectJurusan.value = (jurusan.includes('Lunak') || jurusan === 'PPL') ? 'PPL' : 'DM';
        
        toggleModal();
    }

    /** FUNGSI: LIHAT DETAIL **/
    function viewDetail(nama, nim, jurusan) {
        alert(`DETAIL MAHASANTRI\n----------------------\nNama: ${nama}\nNIM: ${nim}\nJurusan: ${jurusan}`);
    }

    /** LOGIC: CHART INITIALIZATION **/
    document.addEventListener('DOMContentLoaded', () => {
        const ctxLine = document.getElementById('registrationChart')?.getContext('2d');
        if(ctxLine) {
            new Chart(ctxLine, {
                type: 'line',
                data: {
                    labels: ['2022', '2023', '2024', '2025', '2026'],
                    datasets: [{
                        label: 'Pendaftar Mahasantri',
                        data: [150, 280, 420, 390, 510],
                        borderColor: '#3b82f6',
                        tension: 0.4,
                        fill: true,
                        backgroundColor: 'rgba(59, 130, 246, 0.1)'
                    }]
                },
                options: { 
                    responsive: true, 
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        y: { grid: { color: 'rgba(156, 163, 175, 0.1)' }, ticks: { color: '#94a3b8' } },
                        x: { grid: { display: false }, ticks: { color: '#94a3b8' } }
                    }
                }
            });
        }

        const ctxPie = document.getElementById('departmentChart')?.getContext('2d');
        if(ctxPie) {
            new Chart(ctxPie, {
                type: 'doughnut',
                data: {
                    labels: ['PPL', 'DM'],
                    datasets: [{
                        data: [65, 35],
                        backgroundColor: ['#3b82f6', '#8b5cf6'],
                        borderWidth: 0
                    }]
                },
                options: { 
                    responsive: true, 
                    maintainAspectRatio: false,
                    cutout: '78%',
                    plugins: { 
                        legend: { position: 'bottom', labels: { color: '#94a3b8', usePointStyle: true } } 
                    } 
                }
            });
        }
    });
</script>
</body>
</html>