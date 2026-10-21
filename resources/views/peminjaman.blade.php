@extends('layouts.main')
@section('title', 'Sirkulasi Peminjaman')

@section('content')
<!-- Header -->
<header class="bg-white py-5 px-8 border-b border-gray-200 flex justify-between items-center z-10 shadow-sm">
    <h1 class="text-2xl font-bold text-gray-800">Sirkulasi Peminjaman</h1>
    
    <!-- Tombol Catat Peminjaman (Warna di-hardcode ke #1E3B30 agar selalu hijau) -->
    <button onclick="bukaModalPinjam()" class="bg-[#1E3B30] text-white px-5 py-2.5 rounded-lg text-sm font-bold shadow-md hover:bg-[#152e25] transition-all flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Catat Peminjaman
    </button>
</header>

<!-- Area Konten Utama -->
<div class="flex-1 overflow-y-auto p-8">
    
    <!-- Tabel Data Peminjaman Aktif -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-left" id="tabelPeminjaman">
            <thead>
                <tr class="bg-[#E8EFEA] border-b border-[#C1D2C8] text-[11px] text-[#1E3B30] font-bold uppercase tracking-wider">
                    <th class="p-4 pl-8">Peminjam</th>
                    <th class="p-4">Buku</th>
                    <th class="p-4">Tgl Pinjam</th>
                    <th class="p-4 text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data Sesuai Screenshot -->
                <tr class="border-b border-gray-50 hover:bg-gray-50 transition-colors">
                    <td class="p-5 pl-8 font-bold text-gray-900">Ahmad Fauzi</td>
                    <td class="p-5 text-gray-600 text-sm">Pemrograman Web Modern</td>
                    <td class="p-5 text-gray-600 text-sm">Hari ini</td>
                    <td class="p-5 text-center">
                        <span class="bg-blue-50 text-blue-600 px-3 py-1 rounded-full text-xs font-bold border border-blue-100">Aktif</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- ============================================== -->
<!-- MODAL FORM PEMINJAMAN BARU -->
<!-- ============================================== -->
<div id="modalPinjam" class="fixed inset-0 z-50 hidden items-center justify-center">
    <!-- Overlay Background -->
    <div class="absolute inset-0 bg-black/40 backdrop-blur-sm transition-opacity" onclick="tutupModalPinjam()"></div>
    
    <!-- Kotak Modal -->
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg relative z-10 p-7 modal-enter border border-gray-100" id="boxModalPinjam">
        
        <!-- Header Modal -->
        <div class="flex justify-between items-start mb-6">
            <h3 class="font-bold text-[#1E3B30] text-xl">Form Peminjaman Baru</h3>
            <button onclick="tutupModalPinjam()" class="text-gray-400 hover:text-gray-600 bg-gray-50 hover:bg-gray-200 rounded-full p-2 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <!-- Form Input -->
        <div class="space-y-5 mb-8">
            <!-- Peminjam -->
            <div>
                <label class="block text-xs font-bold text-gray-600 mb-1.5 uppercase tracking-wide">Pilih Anggota</label>
                <select class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#1E3B30] focus:outline-none transition-all cursor-pointer">
                    <option value="" disabled selected>Pilih peminjam...</option>
                    <option value="1">Deffa Haidar Darmansyah</option>
                    <option value="2">Nadia Putri</option>
                    <option value="3">Ahmad Fauzi</option>
                </select>
            </div>

            <!-- Buku -->
            <div>
                <label class="block text-xs font-bold text-gray-600 mb-1.5 uppercase tracking-wide">Pilih Buku</label>
                <select class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm bg-gray-50 focus:bg-white focus:ring-2 focus:ring-[#1E3B30] focus:outline-none transition-all cursor-pointer">
                    <option value="" disabled selected>Scan barcode atau pilih buku...</option>
                    <option value="b1">Buku React Native & Expo</option>
                    <option value="b2">Filosofi Teras</option>
                    <option value="b3">Pemrograman Web Modern</option>
                </select>
            </div>

            <!-- Bagian Tanggal (Format US: MM/DD/YYYY sesuai screenshot) -->
            <div class="grid grid-cols-2 gap-5 pt-2">
                <div>
                    <label class="block text-xs font-bold text-gray-600 mb-1.5">Tgl Pinjam</label>
                    <input type="text" id="inputTglPinjam" readonly class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm text-gray-700 bg-white focus:outline-none font-medium">
                </div>
                <div>
                    <label class="block text-xs font-bold text-[#D05615] mb-1.5">Jatuh Tempo (+7 Hari)</label>
                    <input type="text" id="inputJatuhTempo" readonly class="w-full px-4 py-3 border border-orange-200 rounded-xl text-sm text-[#D05615] bg-orange-50 focus:outline-none font-bold">
                </div>
            </div>
        </div>

        <!-- Tombol Aksi -->
        <button onclick="simpanPeminjaman()" class="w-full py-3.5 bg-[#1E3B30] text-white rounded-xl font-bold hover:bg-[#152e25] shadow-lg transition-all flex justify-center items-center gap-2">
            Simpan Peminjaman
        </button>
    </div>
</div>

<!-- Notifikasi (Toast) -->
<div id="toastPinjam" class="fixed bottom-8 right-8 bg-white border-l-4 border-[#1E3B30] shadow-2xl rounded-lg p-4 z-50 transition-all duration-300 transform translate-y-20 opacity-0 flex items-center gap-3 w-80">
    <div class="bg-[#DCE8DF] p-2 rounded-full text-[#1E3B30]">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
    </div>
    <div>
        <h4 class="font-bold text-sm text-gray-800">Berhasil Disimpan</h4>
        <p class="text-xs text-gray-500">Data peminjaman baru telah dicatat.</p>
    </div>
</div>

<!-- ============================================== -->
<!-- SCRIPT LOGIKA JAVASCRIPT -->
<!-- ============================================== -->
<script>
    // Fungsi memformat tanggal ke MM/DD/YYYY (Format Amerika seperti di screenshot)
    function formatTanggalUS(date) {
        let month = (date.getMonth() + 1).toString().padStart(2, '0');
        let day = date.getDate().toString().padStart(2, '0');
        let year = date.getFullYear();
        return `${month}/${day}/${year}`;
    }

    // Mengatur default tanggal saat form dibuka
    function setTanggalOtomatis() {
        let tglSekarang = new Date();
        let tglJatuhTempo = new Date();
        tglJatuhTempo.setDate(tglSekarang.getDate() + 7); // Tambah 7 hari

        document.getElementById('inputTglPinjam').value = formatTanggalUS(tglSekarang);
        document.getElementById('inputJatuhTempo').value = formatTanggalUS(tglJatuhTempo);
    }

    // Membuka Modal
    function bukaModalPinjam() {
        setTanggalOtomatis(); // Hitung ulang tanggal setiap kali dibuka
        
        const modal = document.getElementById('modalPinjam');
        const box = document.getElementById('boxModalPinjam');
        modal.classList.remove('hidden'); 
        modal.classList.add('flex');
        
        // Timeout kecil untuk animasi
        setTimeout(() => { box.classList.add('modal-active'); }, 10);
    }

    // Menutup Modal
    function tutupModalPinjam() {
        document.getElementById('boxModalPinjam').classList.remove('modal-active');
        setTimeout(() => { 
            document.getElementById('modalPinjam').classList.add('hidden'); 
            document.getElementById('modalPinjam').classList.remove('flex'); 
        }, 200);
    }

    // Fungsi Simpan (Hanya UI/UX, database akan dikerjakan nanti)
    function simpanPeminjaman() {
        tutupModalPinjam();
        
        // Memunculkan notifikasi sukses
        const toast = document.getElementById('toastPinjam');
        toast.classList.remove('translate-y-20', 'opacity-0'); 
        
        setTimeout(() => { 
            toast.classList.add('translate-y-20', 'opacity-0'); 
        }, 3000);
    }
</script>
@endsection