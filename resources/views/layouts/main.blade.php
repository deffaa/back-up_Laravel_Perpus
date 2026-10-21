<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - KembaliBuku</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Lora:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #F5F4ED; }
        h1, .font-serif { font-family: 'Lora', serif; }
        ::selection { background-color: #214D40; color: #ffffff; }
        .transition-all-custom { transition: all 0.3s ease-in-out; }
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #DCE8DF; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #214D40; }
        .modal-enter { opacity: 0; transform: scale(0.95); }
        .modal-active { opacity: 1; transform: scale(1); transition: all 0.2s ease-out; }
        .toast-hidden { transform: translateY(100%); opacity: 0; }
        .toast-active { transform: translateY(0); opacity: 1; transition: all 0.3s ease-out; }
    </style>
    <script>
        window.tailwind = { config: { theme: { extend: { colors: { brand: { bg: '#F5F4ED', dark: '#214D40', light: '#DCE8DF', border: '#E5E7EB' } } } } } };
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="text-gray-800 font-sans min-h-screen flex overflow-hidden selection:bg-brand-dark selection:text-white">

    <aside class="w-64 bg-white border-r border-gray-200 flex flex-col h-screen z-20 shadow-sm relative">
        <div class="p-6 border-b border-gray-100 flex items-center gap-3 text-brand-dark">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            <span class="text-xl font-serif font-bold tracking-tight">KembaliBuku</span>
        </div>

        <nav class="flex-1 p-4 flex flex-col gap-1.5 overflow-y-auto">
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2 px-3 mt-2">Menu Utama</p>
            
            <a href="{{ url('/peminjaman') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-all-custom {{ request()->is('peminjaman') ? 'bg-[#EAF0EB] text-brand-dark font-bold border border-[#C1D2C8]' : 'text-gray-600 hover:bg-gray-50 hover:text-brand-dark' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                Data Peminjaman
            </a>
            
            <a href="{{ url('/dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-all-custom {{ request()->is('dashboard') ? 'bg-[#EAF0EB] text-brand-dark font-bold border border-[#C1D2C8]' : 'text-gray-600 hover:bg-gray-50 hover:text-brand-dark' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                Pengembalian & Denda
            </a>
            
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2 px-3 mt-6">Laporan & Master</p>
            
            <a href="{{ url('/laporan') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-all-custom {{ request()->is('laporan') ? 'bg-[#EAF0EB] text-brand-dark font-bold border border-[#C1D2C8]' : 'text-gray-600 hover:bg-gray-50 hover:text-brand-dark' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                Riwayat Denda
            </a>
            
            <a href="{{ url('/katalog') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-all-custom {{ request()->is('katalog') ? 'bg-[#EAF0EB] text-brand-dark font-bold border border-[#C1D2C8]' : 'text-gray-600 hover:bg-gray-50 hover:text-brand-dark' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                Katalog Buku
            </a>
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2 px-3 mt-6">Konfigurasi</p>
            
            <a href="{{ url('/pengaturan') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-all-custom {{ request()->is('pengaturan') ? 'bg-[#EAF0EB] text-brand-dark font-bold border border-[#C1D2C8]' : 'text-gray-600 hover:bg-gray-50 hover:text-brand-dark' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                Pengaturan Denda
            </a>
        </nav>

        <div class="mt-auto pt-6 border-t border-gray-200">
    <a href="{{ url('/') }}" class="flex items-center justify-center gap-3 px-4 py-2.5 bg-red-600 text-white rounded-xl font-bold shadow-sm hover:bg-red-700 transition-colors w-full">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
        Keluar Sistem
    </a>
</div>
    </aside>

    <main class="flex-1 flex flex-col h-screen relative bg-brand-bg">
        @yield('content')
    </main>

</body>
</html>