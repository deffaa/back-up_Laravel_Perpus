<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - KembaliBuku</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Lora:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    
    <style> 
        body { font-family: 'Inter', sans-serif; background-color: #F8F7F3; } 
        h1, .font-serif { font-family: 'Lora', serif; } 
    </style>
    
    <script> 
        window.tailwind = { config: { theme: { extend: { colors: { brand: { bg: '#F8F7F3', dark: '#214D40', light: '#DCE8DF', border: '#E5E7EB' } } } } } }; 
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center relative overflow-hidden text-gray-800">

    <div class="absolute top-0 left-0 w-full h-[45%] bg-[#F3F2E9] border-b border-gray-200 rounded-b-[4rem] z-0"></div>

    <a href="{{ url('/') }}" class="absolute top-6 left-6 md:top-8 md:left-10 text-sm font-medium text-gray-500 hover:text-brand-dark flex items-center gap-2 z-20 transition-all">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Kembali ke Beranda
    </a>

    <div class="w-full max-w-md bg-white rounded-3xl shadow-[0_20px_50px_rgba(0,0,0,0.05)] border border-gray-100 p-8 md:p-10 relative z-10 mx-4">
        
        <div class="flex flex-col items-center text-center mb-8">
            <div class="w-12 h-12 bg-gray-50 border border-gray-200 rounded-xl flex items-center justify-center text-brand-dark mb-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            </div>
            <h1 id="titleText" class="text-3xl font-serif font-bold text-gray-900 mb-2">Portal Pustakawan</h1>
            <p id="subtitleText" class="text-sm text-gray-500">Masuk untuk mengelola sirkulasi denda.</p>
        </div>

        <div class="flex p-1 bg-gray-100 rounded-xl mb-8">
            <button id="btnAdmin" onclick="setRole('admin')" type="button" class="flex-1 py-2 text-sm font-bold bg-white text-brand-dark rounded-lg shadow-sm transition-all">Pustakawan</button>
            <button id="btnUser" onclick="setRole('user')" type="button" class="flex-1 py-2 text-sm font-bold text-gray-500 hover:text-gray-700 rounded-lg transition-all">Anggota</button>
        </div>

        <form action="{{ url('/dashboard') }}" class="space-y-5">
            
            <div>
                <label id="labelId" class="block text-sm font-bold text-gray-700 mb-2">Nomor Induk Pegawai (NIP)</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                    <input type="text" id="inputId" placeholder="Contoh: 19820301" class="w-full pl-11 pr-4 py-3.5 bg-white border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-brand-dark focus:ring-1 focus:ring-brand-dark transition-all" required>
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Kata Sandi</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <input type="password" placeholder="••••••••" class="w-full pl-11 pr-11 py-3.5 bg-white border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-brand-dark focus:ring-1 focus:ring-brand-dark transition-all" required>
                </div>
            </div>

            <div class="flex items-center justify-between pt-1 pb-4">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" class="w-4 h-4 text-brand-dark border-gray-300 rounded focus:ring-brand-dark">
                    <span class="text-xs font-medium text-gray-600">Ingat saya</span>
                </label>
                <a href="#" class="text-xs font-bold text-gray-900 hover:text-brand-dark">Lupa sandi?</a>
            </div>

            <button type="submit" class="w-full py-3.5 bg-[#214D40] text-white rounded-xl font-bold hover:bg-[#15382f] shadow-md transition-all flex justify-center items-center gap-2">
                Masuk Sistem
            </button>

        </form>
    </div>

    <script>
        function setRole(role) {
            const btnAdmin = document.getElementById('btnAdmin');
            const btnUser = document.getElementById('btnUser');
            const titleText = document.getElementById('titleText');
            const subtitleText = document.getElementById('subtitleText');
            const labelId = document.getElementById('labelId');
            const inputId = document.getElementById('inputId');

            if (role === 'admin') {
                btnAdmin.className = 'flex-1 py-2 text-sm font-bold bg-white text-brand-dark rounded-lg shadow-sm transition-all';
                btnUser.className = 'flex-1 py-2 text-sm font-bold text-gray-500 hover:text-gray-700 rounded-lg transition-all';
                
                titleText.innerText = 'Portal Pustakawan';
                subtitleText.innerText = 'Masuk untuk mengelola sirkulasi denda.';
                labelId.innerText = 'Nomor Induk Pegawai (NIP)';
                inputId.placeholder = 'Contoh: 19820301';
            } else {
                btnUser.className = 'flex-1 py-2 text-sm font-bold bg-white text-brand-dark rounded-lg shadow-sm transition-all';
                btnAdmin.className = 'flex-1 py-2 text-sm font-bold text-gray-500 hover:text-gray-700 rounded-lg transition-all';
                
                titleText.innerText = 'Portal Anggota';
                subtitleText.innerText = 'Masuk untuk melihat riwayat peminjaman.';
                labelId.innerText = 'Nama Lengkap';
                inputId.placeholder = 'Contoh: Deffa Haidar';
            }
        }
    </script>
</body>
</html>