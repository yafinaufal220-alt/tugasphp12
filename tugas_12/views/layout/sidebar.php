<aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-slate-900 text-white flex flex-col transform -translate-x-full md:translate-x-0 md:relative transition-transform duration-300 ease-in-out">
        <div class="p-6 text-2xl font-bold border-b border-slate-800 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center">
                    <i class="fas fa-graduation-cap text-sm"></i>
                </div>
                <span>EduDash</span>
            </div>
            <button onclick="toggleSidebar()" class="md:hidden text-slate-400">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <nav class="flex-1 p-4 space-y-2 overflow-y-auto">
            <a href="#" class="sidebar-item flex items-center p-3 text-blue-400 bg-slate-800 rounded-lg">
                <i class="fas fa-home mr-3 w-5"></i> Dashboard
            </a>
            <a href="#" class="sidebar-item flex items-center p-3 text-slate-400">
                <i class="fas fa-users mr-3 w-5"></i> Data Mahasiswa
            </a>
            <a href="#" class="sidebar-item flex items-center p-3 text-slate-400">
                <i class="fas fa-book mr-3 w-5"></i> Mata Kuliah
            </a>
            <a href="#" class="sidebar-item flex items-center p-3 text-slate-400">
                <i class="fas fa-chart-line mr-3 w-5"></i> Laporan Nilai
            </a>
            <div class="pt-4 pb-2 text-xs font-semibold text-slate-500 uppercase px-3">Sistem</div>
            <a href="#" class="sidebar-item flex items-center p-3 text-slate-400">
                <i class="fas fa-cog mr-3 w-5"></i> Pengaturan
            </a>
        </nav>
        <div class="p-4 border-t border-slate-800">
            <button class="flex items-center text-red-400 p-3 hover:bg-red-500/10 w-full rounded-lg transition">
                <i class="fas fa-sign-out-alt mr-3"></i> Keluar
            </button>
        </div>
    </aside>