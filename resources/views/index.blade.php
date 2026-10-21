<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KembaliBuku - Manajemen Denda Perpustakaan</title>
    
    <!-- Google Fonts: Inter (Sans) & Lora (Serif) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        window.tailwind = {
            config: {
                theme: {
                    extend: {
                        colors: {
                            brand: {
                                bg: '#F7F6F0',      // Warna cream background utama
                                dark: '#1E3B30',    // Hijau gelap utama
                                light: '#E8EFEA',   // Hijau super muda (badge/bg)
                                gray: '#5C6A61',    // Teks abu-abu kehijauan
                                border: '#E2E5E0'   // Garis pembatas
                            }
                        },
                        fontFamily: {
                            sans: ['Inter', 'sans-serif'],
                            serif: ['Lora', 'serif'],
                        }
                    }
                }
            }
        };
    </script>
    <style>
        body { background-color: #F7F6F0; }
        ::selection { background-color: #1E3B30; color: #ffffff; }
    </style>
</head>
<body class="font-sans text-gray-800 antialiased overflow-x-hidden">

    <!-- ================= NAVBAR ================= -->
    <nav class="max-w-7xl mx-auto px-6 lg:px-12 py-6 flex items-center justify-between">
        <div class="flex items-center gap-2 text-brand-dark">
            <!-- Icon Buku -->
            <div class="bg-brand-dark text-white p-1.5 rounded-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            </div>
            <span class="text-xl font-serif font-bold tracking-tight">KembaliBuku</span>
        </div>
        
        <div class="hidden md:flex gap-8 text-sm font-medium text-brand-gray">
            <a href="#cara-kerja" class="hover:text-brand-dark transition-colors">Cara kerja</a>
            <a href="#fitur" class="hover:text-brand-dark transition-colors">Fitur</a>
            <a href="#simulasi" class="hover:text-brand-dark transition-colors">Simulasi denda</a>
            <a href="#faq" class="hover:text-brand-dark transition-colors">FAQ</a>
        </div>
        
        <a href="{{ url('/login') }}" class="bg-brand-dark text-white px-5 py-2.5 rounded-lg text-sm font-medium hover:bg-[#152e25] transition-colors flex items-center gap-2">
            Lihat pratinjau 
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h16v16H4z m4 8h8 m-4-4l4 4-4 4"></path></svg>
        </a>
    </nav>

    <!-- ================= HERO SECTION ================= -->
    <header class="max-w-7xl mx-auto px-6 lg:px-12 pt-12 pb-24 grid lg:grid-cols-2 gap-16 items-center">
        <!-- Teks Kiri -->
        <div class="pr-4">
            <div class="flex items-center gap-4 mb-6">
                <div class="w-8 h-[1px] bg-brand-dark"></div>
                <span class="text-xs font-bold tracking-[0.2em] text-brand-gray uppercase">Sirkulasi Rapi, Layanan Berarti</span>
            </div>
            <h1 class="text-5xl lg:text-7xl font-serif font-medium text-brand-dark leading-[1.1] mb-6">Buku kembali.<br>Denda jelas.<br>Semua beres.</h1>
            <p class="text-brand-gray text-lg mb-10 max-w-md leading-relaxed">Kelola pengembalian buku dan hitung denda otomatis dalam satu alur. Lebih sedikit hitung manual, lebih banyak waktu untuk melayani pembaca.</p>
            
            <div class="flex flex-wrap gap-4 mb-8">
                <a href="{{ url('/login') }}" class="bg-brand-dark text-white px-6 py-3.5 rounded-lg font-medium hover:bg-[#152e25] transition-colors flex items-center gap-2">
                    Jelajahi aplikasi <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h16v16H4z m4 8h8 m-4-4l4 4-4 4"></path></svg>
                </a>
                <a href="#simulasi" class="border border-brand-dark text-brand-dark px-6 py-3.5 rounded-lg font-medium hover:bg-brand-dark hover:text-white transition-colors">
                    Lihat simulasi denda
                </a>
            </div>
            <p class="text-xs text-brand-gray flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                Berbasis web · Untuk petugas dan anggota
            </p>
        </div>

        <!-- Mockup Kanan (Ilustrasi UI) -->
        <div class="bg-[#EAEBE6] rounded-3xl p-6 lg:p-8 shadow-inner border border-white relative h-[500px]">
            <div class="bg-white w-full h-full rounded-2xl shadow-sm border border-gray-100 flex overflow-hidden">
                <!-- Mockup Sidebar -->
                <div class="w-1/3 bg-white border-r border-gray-100 p-6 hidden md:block">
                    <div class="flex items-center gap-2 text-brand-dark mb-10">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13"></path></svg>
                        <span class="font-serif font-bold text-sm">KembaliBuku</span>
                    </div>
                    <div class="space-y-4 text-xs font-medium text-gray-400">
                        <p class="text-[10px] uppercase tracking-wider mb-2">Perpustakaan</p>
                        <p>Ringkasan</p>
                        <p>Peminjaman</p>
                        <p class="bg-brand-light text-brand-dark px-3 py-2 rounded-md font-bold -mx-3">Pengembalian</p>
                        <p>Koleksi buku</p>
                        <p>Anggota</p>
                    </div>
                </div>
                <!-- Mockup Konten -->
                <div class="flex-1 bg-white p-6 md:p-8 relative">
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <h3 class="font-bold text-gray-800 text-lg">Pengembalian buku</h3>
                            <p class="text-[10px] text-gray-400">Kamis, 15 Oktober 2026</p>
                        </div>
                        <span class="bg-brand-light text-brand-dark text-[10px] font-bold px-2 py-1 rounded-full">Data ilustrasi</span>
                    </div>
                    <!-- Mockup Search -->
                    <div class="border border-gray-200 rounded-lg p-2.5 flex items-center gap-2 mb-4">
                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        <span class="text-xs text-gray-600">PJM-2026-0142</span>
                    </div>
                    <!-- Mockup Buku -->
                    <div class="flex gap-4 mb-6 items-center">
                        <div class="w-10 h-14 bg-[#DCC6A8] rounded text-[8px] p-1 font-serif text-brand-dark opacity-80">Filosofi<br>Teras</div>
                        <div class="flex-1">
                            <p class="text-sm font-bold text-gray-800">Filosofi Teras</p>
                            <p class="text-[10px] text-gray-500">Nadia Putri · AGT-0084</p>
                        </div>
                        <span class="bg-[#F0E6D3] text-[#8C6D46] text-[10px] font-bold px-2 py-1 rounded-full">Terlambat 3 hari</span>
                    </div>
                    <!-- Mockup Info Denda -->
                    <div class="bg-brand-bg rounded-lg p-4 mb-4 grid grid-cols-3 gap-2">
                        <div><p class="text-[9px] text-gray-500">Jatuh tempo</p><p class="text-xs font-bold text-gray-800">12 Okt 2026</p></div>
                        <div><p class="text-[9px] text-gray-500">Dikembalikan</p><p class="text-xs font-bold text-gray-800">15 Okt 2026</p></div>
                        <div><p class="text-[9px] text-gray-500">Tarif per hari</p><p class="text-xs font-bold text-gray-800">Rp1.000</p></div>
                    </div>
                    <div class="bg-brand-light rounded-lg p-4 flex justify-between items-center mb-6">
                        <div><p class="text-xs font-bold text-brand-dark">Total denda</p><p class="text-[10px] text-brand-dark opacity-70">3 hari × Rp1.000</p></div>
                        <p class="text-2xl font-serif text-brand-dark">Rp3.000</p>
                    </div>
                    <!-- Mockup Button -->
                    <div class="bg-brand-dark text-white rounded-lg py-2.5 text-xs text-center font-bold flex justify-center items-center gap-2">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Konfirmasi pengembalian
                    </div>
                </div>
            </div>
            <p class="absolute bottom-3 right-6 text-[9px] text-gray-400">Pratinjau statis · Seluruh data adalah ilustrasi</p>
        </div>
    </header>

    <!-- ================= FEATURES BAR ================= -->
    <section class="border-t border-b border-brand-border bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-12 py-10 grid md:grid-cols-3 gap-8">
            <div>
                <svg class="w-6 h-6 text-brand-dark mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
                <h3 class="font-bold text-gray-900 mb-2">Pengembalian tanpa berputar-putar</h3>
                <p class="text-sm text-brand-gray">Temukan pinjaman, cek tanggal, lalu catat buku yang sudah kembali.</p>
            </div>
            <div>
                <svg class="w-6 h-6 text-brand-dark mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                <h3 class="font-bold text-gray-900 mb-2">Denda dengan rincian yang jelas</h3>
                <p class="text-sm text-brand-gray">Hari terlambat dan tarif tampil bersama. Tidak ada angka tanpa penjelasan.</p>
            </div>
            <div>
                <svg class="w-6 h-6 text-brand-dark mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                <h3 class="font-bold text-gray-900 mb-2">Catatan yang mudah ditelusuri</h3>
                <p class="text-sm text-brand-gray">Status buku dan riwayat pengembalian tersimpan dalam satu tempat.</p>
            </div>
        </div>
    </section>

    <!-- ================= CARA KERJA ================= -->
    <section id="cara-kerja" class="max-w-7xl mx-auto px-6 lg:px-12 py-24">
        <div class="flex items-center gap-4 mb-6">
            <div class="w-8 h-[1px] bg-brand-dark"></div>
            <span class="text-xs font-bold tracking-[0.2em] text-brand-dark uppercase">Cara Kerja</span>
        </div>
        <div class="grid lg:grid-cols-2 gap-12 mb-16">
            <h2 class="text-4xl md:text-5xl font-serif font-medium text-brand-dark">Dari buku di meja, ke catatan yang beres.</h2>
            <div class="flex items-end">
                <p class="text-brand-gray text-lg">Empat langkah yang mudah diikuti petugas, dengan rincian yang mudah dipahami anggota.</p>
            </div>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Step 1 -->
            <div class="border-t border-brand-border pt-6">
                <div class="flex justify-between items-center mb-6">
                    <span class="text-3xl font-serif text-brand-dark">01</span>
                    <svg class="w-5 h-5 text-brand-gray" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-3">Temukan pinjaman</h3>
                <p class="text-sm text-brand-gray mb-6 h-16">Cari kode pinjaman, nama anggota, atau buku yang akan dikembalikan.</p>
                <div class="bg-brand-light px-4 py-3 rounded-md text-xs font-medium text-brand-dark">PJM-2026-0142</div>
            </div>
            <!-- Step 2 -->
            <div class="border-t border-brand-border pt-6">
                <div class="flex justify-between items-center mb-6">
                    <span class="text-3xl font-serif text-brand-dark">02</span>
                    <svg class="w-5 h-5 text-brand-gray" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-3">Periksa tanggal</h3>
                <p class="text-sm text-brand-gray mb-6 h-16">Cocokkan jatuh tempo dengan tanggal buku diterima oleh petugas.</p>
                <div class="bg-brand-light px-4 py-3 rounded-md text-xs font-medium text-brand-dark">12 Okt → 15 Okt 2026</div>
            </div>
            <!-- Step 3 -->
            <div class="border-t border-brand-border pt-6">
                <div class="flex justify-between items-center mb-6">
                    <span class="text-3xl font-serif text-brand-dark">03</span>
                    <svg class="w-5 h-5 text-brand-gray" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-3">Tinjau denda</h3>
                <p class="text-sm text-brand-gray mb-6 h-16">Sistem menghitung keterlambatan sesuai tarif yang telah ditetapkan.</p>
                <div class="bg-brand-light px-4 py-3 rounded-md text-xs font-medium text-brand-dark">3 hari × Rp1.000</div>
            </div>
            <!-- Step 4 -->
            <div class="border-t border-brand-border pt-6">
                <div class="flex justify-between items-center mb-6">
                    <span class="text-3xl font-serif text-brand-dark">04</span>
                    <svg class="w-5 h-5 text-brand-gray" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-3">Selesaikan & catat</h3>
                <p class="text-sm text-brand-gray mb-6 h-16">Konfirmasi pengembalian. Status buku dan riwayat pun diperbarui.</p>
                <div class="bg-brand-light px-4 py-3 rounded-md text-xs font-medium text-brand-dark">Buku kembali tercatat</div>
            </div>
        </div>
        <p class="text-[10px] text-gray-400 mt-8">Alur dan data di atas merupakan ilustrasi penggunaan KembaliBuku.</p>
    </section>

    <!-- ================= DARK SECTION (ANGKA JELAS) ================= -->
    <section class="bg-brand-dark py-24">
        <div class="max-w-7xl mx-auto px-6 lg:px-12 grid lg:grid-cols-2 gap-16 items-center">
            <!-- Teks -->
            <div class="text-white">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-8 h-[1px] bg-white opacity-50"></div>
                    <span class="text-xs font-bold tracking-[0.2em] text-white opacity-70 uppercase">Angka Jelas, Alasan Jelas</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-serif font-medium leading-[1.1] mb-6">Denda yang bisa dijelaskan, bukan ditebak.</h2>
                <p class="text-gray-300 text-lg mb-10 leading-relaxed">KembaliBuku menampilkan asal setiap nominal: tanggal jatuh tempo, hari keterlambatan, dan tarif harian. Petugas tidak perlu menghitung ulang dari awal.</p>
                <ul class="space-y-4 text-sm text-gray-200">
                    <li class="flex items-center gap-3"><svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Tepat waktu? Denda Rp0.</li>
                    <li class="flex items-center gap-3"><svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Tarif mengikuti aturan perpustakaan.</li>
                    <li class="flex items-center gap-3"><svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Rincian tersedia sebelum konfirmasi.</li>
                </ul>
            </div>
            
            <!-- Kartu Visualisasi -->
            <div class="bg-white rounded-2xl p-8 shadow-2xl">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-2xl font-serif text-brand-dark">Setiap hari terhitung.</h3>
                    <span class="bg-brand-bg text-brand-gray text-[10px] font-bold px-3 py-1 rounded-full uppercase">Ilustrasi</span>
                </div>
                <!-- Box Tanggal -->
                <div class="grid grid-cols-4 gap-2 md:gap-4 mb-8">
                    <div class="bg-brand-bg rounded-lg p-3 text-center">
                        <p class="text-2xl font-serif text-brand-dark">12</p><p class="text-[9px] text-gray-500">Okt 2026<br>Jatuh tempo</p>
                    </div>
                    <div class="bg-brand-light rounded-lg p-3 text-center border border-[#C1D2C8]">
                        <p class="text-2xl font-serif text-brand-dark">13</p><p class="text-[9px] text-gray-500">Okt 2026<br>Terlambat</p>
                    </div>
                    <div class="bg-brand-light rounded-lg p-3 text-center border border-[#C1D2C8]">
                        <p class="text-2xl font-serif text-brand-dark">14</p><p class="text-[9px] text-gray-500">Okt 2026<br>Terlambat</p>
                    </div>
                    <div class="bg-brand-light rounded-lg p-3 text-center border border-[#C1D2C8]">
                        <p class="text-2xl font-serif text-brand-dark">15</p><p class="text-[9px] text-gray-500">Okt 2026<br>Dikembalikan</p>
                    </div>
                </div>
                
                <div class="border-t border-b border-gray-200 py-4 mb-4 text-right">
                    <span class="text-xs font-bold text-brand-dark">13–15 Oktober = 3 hari terlambat</span>
                </div>
                
                <div>
                    <p class="text-[10px] font-bold tracking-widest text-gray-400 uppercase mb-1">HARI TERLAMBAT × TARIF HARIAN</p>
                    <p class="text-3xl font-serif text-brand-dark">3 × Rp1.000 = Rp3.000</p>
                </div>
                <p class="text-xs text-gray-500 mt-8 border-t border-gray-100 pt-4">Contoh untuk satu buku, memakai hari kalender tanpa masa tenggang. Tarif Rp1.000 per hari hanya ilustrasi, bukan kebijakan universal.</p>
            </div>
        </div>
    </section>

    <!-- ================= SIMULASI DENDA (FORM UI) ================= -->
    <section id="simulasi" class="max-w-7xl mx-auto px-6 lg:px-12 py-24 border-b border-brand-border">
        <div class="flex items-center gap-4 mb-4">
            <div class="w-8 h-[1px] bg-brand-dark"></div>
            <span class="text-xs font-bold tracking-[0.2em] text-brand-dark uppercase">Simulasi Denda</span>
        </div>
        <div class="flex justify-between items-end mb-10">
            <h2 class="text-4xl md:text-5xl font-serif font-medium text-brand-dark">Lihat hitungannya. Pahami hasilnya.</h2>
            <span class="bg-gray-200 text-gray-600 text-[10px] font-bold px-3 py-1 rounded-full uppercase hidden md:inline-block">Contoh tampilan · Tidak interaktif</span>
        </div>

        <div class="grid lg:grid-cols-3 gap-6">
            <!-- Bagian Kiri (Form Mockup) -->
            <div class="lg:col-span-2 bg-brand-bg border border-brand-border rounded-2xl p-8">
                <div class="flex justify-between items-center mb-8">
                    <h3 class="text-lg font-bold text-gray-800">Satu buku, satu perhitungan</h3>
                    <span class="text-xs text-gray-400">PJM-2026-0142</span>
                </div>
                <div class="grid md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm text-gray-600 mb-2">Tanggal jatuh tempo</label>
                        <div class="bg-white border border-gray-300 rounded-lg p-3 flex justify-between items-center text-sm text-gray-800">12 Oktober 2026 <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg></div>
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-2">Tanggal pengembalian</label>
                        <div class="bg-white border border-gray-300 rounded-lg p-3 flex justify-between items-center text-sm text-gray-800">15 Oktober 2026 <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg></div>
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-2">Tarif denda per hari</label>
                        <div class="bg-white border border-gray-300 rounded-lg p-3 flex justify-between items-center text-sm text-gray-800">Rp1.000 <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg></div>
                    </div>
                    <div>
                        <label class="block text-sm text-gray-600 mb-2">Jumlah buku</label>
                        <div class="bg-white border border-gray-300 rounded-lg p-3 flex justify-between items-center text-sm text-gray-800">1 buku <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg></div>
                    </div>
                </div>
                <p class="text-sm text-gray-500">Asumsi contoh: selisih hari kalender, tanpa masa tenggang. Hari jatuh tempo tidak dihitung sebagai hari terlambat.</p>
            </div>

            <!-- Bagian Kanan (Hasil/Kwitansi) -->
            <div class="bg-brand-light border border-[#C1D2C8] rounded-2xl p-8 flex flex-col justify-between">
                <div>
                    <h4 class="text-[10px] font-bold tracking-widest text-brand-dark uppercase mb-6">RINCIAN DENDA</h4>
                    <div class="space-y-4 text-sm mb-6 border-b border-[#C1D2C8] pb-6">
                        <div class="flex justify-between text-gray-600"><span>Keterlambatan</span><span class="font-medium text-gray-800">3 hari</span></div>
                        <div class="flex justify-between text-gray-600"><span>Tarif per hari</span><span class="font-medium text-gray-800">Rp1.000</span></div>
                        <div class="flex justify-between text-gray-600"><span>Perhitungan</span><span class="font-medium text-gray-800">3 × Rp1.000</span></div>
                    </div>
                </div>
                <div>
                    <p class="text-sm text-brand-dark mb-1">Total denda ilustrasi</p>
                    <p class="text-5xl font-serif text-brand-dark mb-4">Rp3.000</p>
                    <p class="text-[10px] text-gray-600">Jika kembali pada 12 Oktober 2026: 0 hari terlambat, denda Rp0.</p>
                </div>
            </div>
        </div>
        <div class="mt-4 flex items-start gap-2 text-[10px] text-gray-400">
            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <p>Ini ilustrasi, bukan aturan untuk semua perpustakaan. Tarif, masa tenggang, dan cara menghitung hari harus mengikuti kebijakan masing-masing.</p>
        </div>
    </section>

    <!-- ================= GRID FEATURES (BENTO) ================= -->
    <section id="fitur" class="max-w-7xl mx-auto px-6 lg:px-12 py-24">
        <div class="flex items-center gap-4 mb-4">
            <div class="w-8 h-[1px] bg-brand-dark"></div>
            <span class="text-xs font-bold tracking-[0.2em] text-brand-dark uppercase">Lebih Dari Sekadar Pengembalian</span>
        </div>
        <div class="grid lg:grid-cols-2 gap-12 mb-16">
            <h2 class="text-4xl md:text-5xl font-serif font-medium text-brand-dark leading-tight">Satu tempat untuk ritme perpustakaan Anda.</h2>
            <div class="flex items-end">
                <p class="text-brand-gray text-lg">Dari koleksi hingga riwayat, informasi saling terhubung agar pekerjaan harian tidak terpecah-pecah.</p>
            </div>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <div class="bg-white rounded-2xl p-8 shadow-sm border border-brand-border h-full flex flex-col">
                <svg class="w-6 h-6 text-brand-dark mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                <h3 class="text-lg font-bold text-gray-900 mb-3">Koleksi yang teratur</h3>
                <p class="text-sm text-brand-gray flex-1">Kelola identitas buku dan ketersediaan setiap eksemplar setelah dikembalikan.</p>
                <div class="mt-6 pt-4 border-t border-gray-100 text-[10px] text-gray-400">BK-0238 / Tersedia</div>
            </div>
            <!-- Card 2 -->
            <div class="bg-white rounded-2xl p-8 shadow-sm border border-brand-border h-full flex flex-col">
                <svg class="w-6 h-6 text-brand-dark mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                <h3 class="text-lg font-bold text-gray-900 mb-3">Data anggota terhubung</h3>
                <p class="text-sm text-brand-gray flex-1">Lihat informasi anggota beserta pinjaman yang masih perlu diselesaikan.</p>
                <div class="mt-6 pt-4 border-t border-gray-100 text-[10px] text-gray-400">Nadia Putri / AGT-0084</div>
            </div>
            <!-- Card 3 -->
            <div class="bg-white rounded-2xl p-8 shadow-sm border border-brand-border h-full flex flex-col">
                <svg class="w-6 h-6 text-brand-dark mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <h3 class="text-lg font-bold text-gray-900 mb-3">Riwayat sirkulasi</h3>
                <p class="text-sm text-brand-gray flex-1">Telusuri kapan buku dipinjam, dikembalikan, dan siapa yang mencatatnya.</p>
                <div class="mt-6 pt-4 border-t border-gray-100 text-[10px] text-gray-400">15 Okt 2026 / Dikembalikan</div>
            </div>
            <!-- Card 4 -->
            <div class="bg-white rounded-2xl p-8 shadow-sm border border-brand-border h-full flex flex-col">
                <svg class="w-6 h-6 text-brand-dark mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                <h3 class="text-lg font-bold text-gray-900 mb-3">Aturan denda terpusat</h3>
                <p class="text-sm text-brand-gray flex-1">Jadikan tarif dan ketentuan perpustakaan sebagai acuan perhitungan.</p>
                <div class="mt-6 pt-4 border-t border-gray-100 text-[10px] text-gray-400">Contoh tarif / Rp1.000 per hari</div>
            </div>
            <!-- Card 5 -->
            <div class="bg-white rounded-2xl p-8 shadow-sm border border-brand-border h-full flex flex-col">
                <svg class="w-6 h-6 text-brand-dark mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path></svg>
                <h3 class="text-lg font-bold text-gray-900 mb-3">Rekap yang terbaca</h3>
                <p class="text-sm text-brand-gray flex-1">Tinjau catatan pengembalian dan denda berdasarkan periode yang dipilih.</p>
                <div class="mt-6 pt-4 border-t border-gray-100 text-[10px] text-gray-400">Periode rekap / Oktober 2026</div>
            </div>
            <!-- Card 6 -->
            <div class="bg-white rounded-2xl p-8 shadow-sm border border-brand-border h-full flex flex-col">
                <svg class="w-6 h-6 text-brand-dark mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                <h3 class="text-lg font-bold text-gray-900 mb-3">Akses sesuai peran</h3>
                <p class="text-sm text-brand-gray flex-1">Pisahkan ruang kelola petugas dari informasi pinjaman milik anggota.</p>
                <div class="mt-6 pt-4 border-t border-gray-100 text-[10px] text-gray-400">Ruang petugas / Ruang anggota</div>
            </div>
        </div>
        <p class="text-[10px] text-gray-400 mt-6">Nama, kode koleksi, dan catatan di atas adalah contoh data.</p>
    </section>

    <!-- ================= IMAGE & PHILOSOPHY ================= -->
    <section class="max-w-7xl mx-auto px-6 lg:px-12 py-12 pb-24 border-b border-brand-border">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <!-- Gambar Kiri -->
            <div class="relative rounded-2xl overflow-hidden aspect-[4/5] bg-gray-200">
                <img src="https://images.unsplash.com/photo-1568667256549-094345857637?q=80&w=1000&auto=format&fit=crop" alt="Perpustakaan Interior" class="w-full h-full object-cover">
                <div class="absolute bottom-0 left-0 right-0 bg-brand-bg/95 backdrop-blur p-8 m-4 rounded-xl">
                    <h3 class="font-serif text-2xl text-brand-dark mb-2">Teknologinya bekerja. Pelayanan tetap manusiawi.</h3>
                    <p class="text-sm text-brand-gray">Lebih banyak ruang untuk membantu pembaca.</p>
                </div>
            </div>
            
            <!-- Teks Kanan -->
            <div>
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-8 h-[1px] bg-brand-dark"></div>
                    <span class="text-xs font-bold tracking-[0.2em] text-brand-dark uppercase">Untuk Kedua Sisi Meja Layanan</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-serif font-medium text-brand-dark leading-tight mb-6">Petugas lebih tenang. Anggota lebih paham.</h2>
                <p class="text-brand-gray text-lg mb-12 border-b border-brand-border pb-12">Administrasi yang tertib membantu percakapan tentang pengembalian dan denda menjadi lebih sederhana.</p>
                
                <div class="mb-10 border-b border-brand-border pb-10">
                    <span class="text-[10px] font-bold tracking-widest text-brand-dark uppercase mb-3 block">Bagi Petugas</span>
                    <h4 class="text-xl font-bold text-gray-900 mb-4">Fokus melayani, bukan menghitung ulang.</h4>
                    <ul class="space-y-3 text-sm text-brand-gray">
                        <li class="flex items-start gap-2"><svg class="w-5 h-5 text-brand-dark shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Periksa pinjaman dan nominal denda dalam satu alur.</li>
                        <li class="flex items-start gap-2"><svg class="w-5 h-5 text-brand-dark shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Telusuri catatan saat ada pertanyaan tentang pengembalian.</li>
                    </ul>
                </div>

                <div>
                    <span class="text-[10px] font-bold tracking-widest text-brand-dark uppercase mb-3 block">Bagi Anggota</span>
                    <h4 class="text-xl font-bold text-gray-900 mb-4">Tahu kewajiban, tanpa menebak-nebak.</h4>
                    <ul class="space-y-3 text-sm text-brand-gray">
                        <li class="flex items-start gap-2"><svg class="w-5 h-5 text-brand-dark shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Lihat tanggal jatuh tempo dan status pinjaman sendiri.</li>
                        <li class="flex items-start gap-2"><svg class="w-5 h-5 text-brand-dark shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Pahami rincian denda sebelum menyelesaikan kewajiban.</li>
                    </ul>
                </div>
            </div>
        </div>
        <p class="text-[10px] text-gray-400 mt-4">Ilustrasi suasana perpustakaan, bukan lokasi pelanggan.</p>
    </section>

    <!-- ================= FAQ ================= -->
    <section id="faq" class="max-w-7xl mx-auto px-6 lg:px-12 py-24 border-b border-brand-border">
        <div class="grid lg:grid-cols-3 gap-16">
            <div class="lg:col-span-1">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-8 h-[1px] bg-brand-dark"></div>
                    <span class="text-xs font-bold tracking-[0.2em] text-brand-dark uppercase">Pertanyaan Umum</span>
                </div>
                <h2 class="text-4xl font-serif font-medium text-brand-dark leading-tight mb-6">Hal kecil yang perlu jelas sejak awal.</h2>
                <p class="text-brand-gray text-sm mb-8">Kenali cara kerja denda dan pencatatan sebelum memulai.</p>
                <a href="#" class="text-sm font-bold text-brand-dark flex items-center gap-2 hover:underline">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13"></path></svg>
                    Panduan singkat KembaliBuku
                </a>
            </div>
            
            <div class="lg:col-span-2 space-y-8">
                <!-- FAQ 1 -->
                <div class="border-b border-brand-border pb-8">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 flex justify-between items-center">
                        Apakah tarif dendanya selalu Rp1.000 per hari?
                        <span class="text-brand-dark font-bold text-xl">–</span>
                    </h3>
                    <p class="text-sm text-brand-gray leading-relaxed">Tidak. Rp1.000 hanya tarif ilustrasi pada halaman ini. Tarif dan ketentuan denda harus mengikuti kebijakan perpustakaan yang menggunakan aplikasi.</p>
                </div>
                <!-- FAQ 2 -->
                <div class="border-b border-brand-border pb-8">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 flex justify-between items-center">
                        Bagaimana jika buku dikembalikan tepat waktu?
                        <span class="text-brand-dark font-bold text-xl">–</span>
                    </h3>
                    <p class="text-sm text-brand-gray leading-relaxed">Jika tanggal pengembalian sama dengan atau sebelum jatuh tempo, keterlambatan adalah 0 hari dan denda Rp0. Buku tetap dicatat sebagai sudah dikembalikan.</p>
                </div>
                <!-- FAQ 3 -->
                <div class="border-b border-brand-border pb-8">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 flex justify-between items-center">
                        Apakah hari libur ikut dihitung?
                        <span class="text-brand-dark font-bold text-xl">–</span>
                    </h3>
                    <p class="text-sm text-brand-gray leading-relaxed">Contoh di sini memakai hari kalender, termasuk hari libur. Untuk penggunaan sebenarnya, sepakati cara menghitung hari dan masa tenggang sesuai aturan perpustakaan.</p>
                </div>
                <!-- FAQ 4 -->
                <div class="border-b border-brand-border pb-8">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 flex justify-between items-center">
                        Apakah buku kembali berarti denda sudah dibayar?
                        <span class="text-brand-dark font-bold text-xl">–</span>
                    </h3>
                    <p class="text-sm text-brand-gray leading-relaxed">Tidak. Pengembalian buku dan pelunasan denda adalah dua catatan berbeda. Petugas perlu memeriksa status penyelesaian denda secara terpisah.</p>
                </div>
                <!-- FAQ 5 -->
                <div class="border-b border-brand-border pb-8">
                    <h3 class="text-lg font-bold text-gray-900 mb-4 flex justify-between items-center">
                        Siapa yang dapat melihat informasi pinjaman?
                        <span class="text-brand-dark font-bold text-xl">–</span>
                    </h3>
                    <p class="text-sm text-brand-gray leading-relaxed">Petugas mengelola catatan sirkulasi sesuai hak aksesnya. Anggota melihat informasi pinjaman dan rincian denda miliknya sendiri.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= BOTTOM CTA ================= -->
    <section class="max-w-7xl mx-auto px-6 lg:px-12 py-16">
        <div class="bg-brand-dark rounded-3xl p-10 lg:p-16 grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-8 h-[1px] bg-white opacity-50"></div>
                    <span class="text-xs font-bold tracking-[0.2em] text-white opacity-70 uppercase">Mulai Dari Catatan Yang Lebih Baik</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-serif font-medium text-white leading-tight mb-6">Buku boleh berpindah. Catatannya jangan hilang.</h2>
                <p class="text-gray-300">Kenali alur pengembalian yang tertib, dengan perhitungan denda yang dapat dipahami bersama.</p>
            </div>
            <div class="flex flex-col sm:flex-row lg:justify-end gap-4">
                <a href="{{ url('/login') }}" class="bg-brand-bg text-brand-dark px-8 py-4 rounded-lg font-bold hover:bg-white transition-colors flex items-center justify-center gap-2">
                    Lihat pratinjau aplikasi <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h16v16H4z m4 8h8 m-4-4l4 4-4 4"></path></svg>
                </a>
                <a href="#simulasi" class="border border-[#386353] text-white px-8 py-4 rounded-lg font-bold hover:bg-[#152e25] transition-colors text-center">
                    Pelajari simulasi denda
                </a>
            </div>
        </div>
    </section>

    <!-- ================= FOOTER ================= -->
    <footer class="max-w-7xl mx-auto px-6 lg:px-12 py-12">
        <div class="grid md:grid-cols-3 gap-12 border-b border-brand-border pb-12 mb-8">
            <!-- Kiri: Brand & Deskripsi -->
            <div class="md:col-span-1">
                <div class="flex items-center gap-2 text-brand-dark mb-6">
                    <div class="bg-brand-dark text-white p-1.5 rounded-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13"></path></svg>
                    </div>
                    <span class="text-xl font-serif font-bold tracking-tight">KembaliBuku</span>
                </div>
                <p class="text-sm text-brand-gray max-w-xs leading-relaxed">Aplikasi web pengembalian buku dan kalkulasi denda otomatis. Untuk catatan yang tertib dan layanan perpustakaan yang lebih jelas.</p>
            </div>
            
            <!-- Tengah: Link -->
            <div class="md:col-span-1">
                <h4 class="font-bold text-gray-900 mb-6">Jelajahi</h4>
                <ul class="space-y-4 text-sm text-brand-gray">
                    <li><a href="#cara-kerja" class="hover:text-brand-dark">Cara kerja</a></li>
                    <li><a href="#fitur" class="hover:text-brand-dark">Fitur perpustakaan</a></li>
                    <li><a href="#simulasi" class="hover:text-brand-dark">Simulasi denda</a></li>
                    <li><a href="#faq" class="hover:text-brand-dark">Pertanyaan umum</a></li>
                </ul>
            </div>
            
            <!-- Kanan: Tagline -->
            <div class="md:col-span-1">
                <h4 class="font-bold text-gray-900 mb-6">Teknologi untuk budaya membaca</h4>
                <p class="text-sm text-brand-gray leading-relaxed mb-6">Kami percaya administrasi seharusnya membantu perpustakaan melayani pembaca, bukan mengalihkan perhatian darinya.</p>
                <p class="font-serif text-xl text-brand-dark italic">Tertib catatannya. Hangat layanannya.</p>
            </div>
        </div>
        
        <div class="flex flex-col md:flex-row justify-between items-center text-xs text-brand-gray">
            <p>© 2026 KembaliBuku</p>
            <p class="my-4 md:my-0">Desain konsep · Seluruh data pratinjau merupakan ilustrasi</p>
            <a href="#" class="flex items-center gap-1 hover:text-brand-dark">
                Kembali ke atas <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
            </a>
        </div>
    </footer>

</body>
</html>