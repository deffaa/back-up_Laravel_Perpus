@extends('layouts.main')
@section('title', 'Pengembalian & Denda')

@section('content')
<!-- Header -->
<header class="bg-white py-5 px-8 border-b border-gray-200 flex justify-between items-center z-10 shadow-sm">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Sirkulasi Pengembalian</h1>
        <p class="text-sm text-gray-500 mt-1">Proses pengembalian buku dan kalkulasi denda otomatis.</p>
    </div>
    
    <!-- Tombol Scan Barcode (Warna dikunci ke Hijau Gelap #1E3B30) -->
    <button class="bg-[#1E3B30] text-white px-5 py-2.5 rounded-lg text-sm font-bold shadow-md hover:bg-[#152e25] transition-all-custom flex items-center gap-2">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Scan Barcode
    </button>
</header>

<!-- Area Konten Utama -->
<div class="flex-1 overflow-y-auto p-8">
    
    <!-- Kotak Pencarian -->
    <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-200 mb-6">
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
            <input type="text" id="searchInput" placeholder="Cari nama peminjam atau judul buku..." class="w-full pl-11 pr-4 py-3 bg-gray-50 border rounded-xl text-sm focus:outline-none focus:border-brand-dark focus:ring-1 focus:ring-brand-dark transition-all">
        </div>
    </div>

    <!-- Tabel Data Peminjaman Aktif -->
    <div class="bg-white rounded-2xl shadow-sm border overflow-hidden">
        <table class="w-full text-left" id="dataTable">
            <thead>
                <tr class="bg-gray-50 border-b text-xs text-gray-700 uppercase tracking-wider">
                    <th class="p-4 pl-6 font-bold">Peminjam</th>
                    <th class="p-4 font-bold">Buku</th>
                    <th class="p-4 text-center font-bold">Status Keterlambatan</th>
                    <th class="p-4 text-center font-bold">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Baris Data 1 (Terlambat) -->
                <tr class="border-b bg-[#FFF9F5] hover:bg-orange-50 transition-colors" id="row-1">
                    <td class="p-4 pl-6">
                        <p class="font-bold text-gray-900">Deffa Haidar Darmansyah</p>
                        <p class="text-xs text-gray-500 mt-0.5">Teknik Informatika - UMMI</p>
                    </td>
                    <td class="p-4">
                        <p class="font-semibold text-gray-800">Buku React Native & Expo</p>
                        <p class="text-xs text-gray-500 mt-0.5">Jatuh tempo: 16 Okt 2026</p>
                    </td>
                    <td class="p-4 text-center">
                        <span class="bg-red-100 text-red-700 border border-red-200 px-3 py-1 rounded-full text-xs font-bold inline-block">Telat 5 Hari</span>
                    </td>
                    <td class="p-4 text-center">
                        <button onclick="bukaModalKalkulasi('Deffa Haidar Darmansyah', 5, 'row-1')" class="px-5 py-2 bg-[#D05615] text-white rounded-lg text-xs font-bold shadow hover:bg-red-700 transition-colors">
                            Hitung Denda
                        </button>
                    </td>
                </tr>

                <!-- Baris Data 2 (Aman / Belum Terlambat) -->
                <tr class="border-b hover:bg-gray-50 transition-colors" id="row-2">
                    <td class="p-4 pl-6">
                        <p class="font-bold text-gray-900">Nadia Putri</p>
                        <p class="text-xs text-gray-500 mt-0.5">Sistem Informasi</p>
                    </td>
                    <td class="p-4">
                        <p class="font-semibold text-gray-800">Filosofi Teras</p>
                        <p class="text-xs text-gray-500 mt-0.5">Jatuh tempo: 25 Okt 2026</p>
                    </td>
                    <td class="p-4 text-center">
                        <span class="bg-green-100 text-green-700 border border-green-200 px-3 py-1 rounded-full text-xs font-bold inline-block">Aman (Sisa 4 Hari)</span>
                    </td>
                    <td class="p-4 text-center">
                        <button onclick="processSafe('row-2')" class="px-5 py-2 bg-gray-200 text-gray-700 rounded-lg text-xs font-bold shadow-sm hover:bg-gray-300 transition-colors">
                            Kembalikan Buku
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- ============================================== -->
<!-- MODAL KALKULASI DENDA DINAMIS -->
<!-- ============================================== -->
<div id="dendaModal" class="fixed inset-0 z-50 hidden items-center justify-center">
    <!-- Overlay Background -->
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm transition-opacity" onclick="closeModal()"></div>
    
    <!-- Kotak Modal -->
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md relative z-10 p-6 modal-enter border border-gray-100" id="modalBox">
        
        <!-- Header Modal -->
        <div class="flex justify-between items-start mb-4 border-b pb-3">
            <div>
                <h3 class="font-bold text-[#D05615] text-xl">Kalkulasi Denda</h3>
                <p class="text-xs text-gray-500 mt-1">Sistem Perhitungan Otomatis</p>
            </div>
            <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-full p-1.5 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <!-- Info Peminjam -->
        <div class="mb-4">
            <p class="text-xs text-gray-500 font-medium mb-1 uppercase tracking-wider">Nama Peminjam</p>
            <p class="font-bold text-gray-800 text-lg" id="m-nama">-</p>
        </div>

        <!-- Panel Kalkulator -->
        <div class="bg-gray-50 p-4 rounded-xl border border-gray-200 mb-5 space-y-4">
            
            <!-- Info Hari -->
            <div class="flex justify-between items-center text-sm">
                <span class="text-gray-600 font-medium">Lama Keterlambatan:</span>
                <span class="font-bold text-red-600 bg-red-100 px-2 py-1 rounded text-xs" id="m-hari">0 Hari</span>
            </div>
            
            <!-- Dropdown Pemilihan Kategori Diskon -->
            <div class="pt-3 border-t border-gray-200">
                <label class="block text-xs font-bold text-gray-700 mb-2">Kategori Peminjam (Pilih Diskon):</label>
                <div class="relative">
                    <select id="m-kategori" onchange="hitungOtomatis()" class="w-full pl-3 pr-8 py-2.5 border border-gray-300 rounded-lg text-sm bg-white focus:outline-none focus:ring-2 focus:ring-brand-dark focus:border-brand-dark appearance-none shadow-sm font-medium text-gray-700 cursor-pointer transition-all">
                        <option value="umum">Umum (Tanpa Diskon)</option>
                        <option value="pelajar">Pelajar (Diskon 10%)</option>
                        <option value="mahasiswa" selected>Mahasiswa (Diskon 20%)</option>
                        <option value="guru">Guru / Dosen (Diskon 30%)</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Rincian Biaya -->
        <div class="space-y-2 mb-6 px-1">
            <div class="flex justify-between text-sm">
                <span class="text-gray-500">Subtotal (Rp 2.000/hari):</span>
                <span class="font-bold text-gray-700" id="m-subtotal">Rp 0</span>
            </div>
            <div class="flex justify-between text-sm text-green-600">
                <span class="font-medium flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                    Potongan Diskon:
                </span>
                <span class="font-bold" id="m-potongan">- Rp 0</span>
            </div>
            <div class="flex justify-between items-center mt-3 pt-3 border-t border-dashed border-gray-300">
                <span class="font-bold text-gray-800 uppercase tracking-wider text-xs">Total Dibayar:</span>
                <span class="font-bold text-3xl text-brand-dark tracking-tight" id="m-totalAkhir">Rp 0</span>
            </div>
        </div>

        <!-- Tombol Aksi -->
        <button id="btn-confirm" class="w-full py-3.5 bg-brand-dark text-white rounded-xl font-bold hover:bg-[#15382f] shadow-lg transition-all flex justify-center items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            Konfirmasi & Lunasi
        </button>
    </div>
</div>

<!-- ============================================== -->
<!-- TOAST NOTIFICATION (Pesan Sukses) -->
<!-- ============================================== -->
<div id="toastNotif" class="fixed bottom-8 right-8 bg-white border-l-4 border-brand-dark shadow-2xl rounded-lg p-4 z-50 toast-hidden w-80 flex items-center gap-3">
    <div class="bg-[#DCE8DF] p-2 rounded-full text-brand-dark">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
    </div>
    <div>
        <h4 class="font-bold text-sm text-gray-800">Proses Berhasil</h4>
        <p class="text-xs text-gray-500">Sirkulasi buku telah diperbarui.</p>
    </div>
</div>

<!-- ============================================== -->
<!-- SCRIPT LOGIKA JAVASCRIPT -->
<!-- ============================================== -->
<script>
    let currentRowId = '';
    let hariTelat = 0;
    
    // Variabel Tarif (Disimulasikan dari Pengaturan)
    const TARIF_HARIAN = 2000; 
    const DISKON = { umum: 0, pelajar: 10, mahasiswa: 20, guru: 30 };

    // 1. Fitur Pencarian Tabel (Live Search)
    document.getElementById('searchInput').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase();
        let rows = document.getElementById('dataTable').getElementsByTagName('tbody')[0].getElementsByTagName('tr');
        for (let i = 0; i < rows.length; i++) {
            let textContent = rows[i].textContent.toLowerCase();
            rows[i].style.display = textContent.includes(filter) ? '' : 'none';
        }
    });

    // 2. Membuka Modal & Mengisi Data
    function bukaModalKalkulasi(nama, hari, rowId) {
        currentRowId = rowId;
        hariTelat = hari;
        
        document.getElementById('m-nama').innerText = nama;
        document.getElementById('m-hari').innerText = hari + " Hari";
        
        // Panggil fungsi hitung agar total langsung tampil sesuai default (Mahasiswa)
        hitungOtomatis();
        
        // Pasang event klik pada tombol konfirmasi
        document.getElementById('btn-confirm').onclick = function() { processSafe(currentRowId); };
        
        // Animasi Tampil Modal
        const modal = document.getElementById('dendaModal');
        const box = document.getElementById('modalBox');
        modal.classList.remove('hidden'); modal.classList.add('flex');
        setTimeout(() => box.classList.add('modal-active'), 10);
    }

    // 3. Logika Kalkulasi Denda & Diskon (Real-time)
    function hitungOtomatis() {
        const kategori = document.getElementById('m-kategori').value;
        const subtotal = hariTelat * TARIF_HARIAN;
        const persentaseDiskon = DISKON[kategori];
        const nominalDiskon = subtotal * (persentaseDiskon / 100);
        const totalAkhir = subtotal - nominalDiskon;

        // Format angka ke Rupiah
        document.getElementById('m-subtotal').innerText = "Rp " + subtotal.toLocaleString('id-ID');
        document.getElementById('m-potongan').innerText = "- Rp " + nominalDiskon.toLocaleString('id-ID') + " (" + persentaseDiskon + "%)";
        document.getElementById('m-totalAkhir').innerText = "Rp " + totalAkhir.toLocaleString('id-ID');
    }

    // 4. Menutup Modal
    function closeModal() {
        document.getElementById('modalBox').classList.remove('modal-active');
        setTimeout(() => { 
            document.getElementById('dendaModal').classList.add('hidden'); 
            document.getElementById('dendaModal').classList.remove('flex'); 
        }, 200);
    }

    // 5. Menyelesaikan Proses (Menghapus baris & Memunculkan Toast)
    function processSafe(rowId) {
        // Hapus baris dari tabel
        const row = document.getElementById(rowId);
        if(row) row.remove();
        
        closeModal();
        
        // Tampilkan Notifikasi Sukses
        const toast = document.getElementById('toastNotif');
        toast.classList.remove('toast-hidden'); 
        toast.classList.add('toast-active');
        
        // Sembunyikan notifikasi setelah 3 detik
        setTimeout(() => { 
            toast.classList.remove('toast-active'); 
            toast.classList.add('toast-hidden'); 
        }, 3000);
    }
</script>
@endsection