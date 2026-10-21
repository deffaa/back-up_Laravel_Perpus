@extends('layouts.main')
@section('title', 'Katalog Buku')

@section('content')
<!-- Header -->
<header class="bg-white py-5 px-8 border-b border-gray-200 flex justify-between items-center z-10 shadow-sm">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Manajemen Katalog</h1>
        <p class="text-sm text-gray-500 mt-1">Kelola data buku dan stok perpustakaan.</p>
    </div>
    
    <!-- Tombol Tambah Buku (Warna dikunci ke Hijau Gelap #1E3B30) -->
    <button class="bg-[#1E3B30] text-white px-5 py-2.5 rounded-lg text-sm font-bold shadow-md hover:bg-[#152e25] transition-all flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        Tambah Buku
    </button>
</header>

<div class="flex-1 overflow-y-auto p-8">
    <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-200 mb-6">
        <input type="text" id="searchInput" placeholder="Cari judul buku atau kode..." class="w-full px-4 py-2.5 bg-gray-50 border rounded-xl text-sm">
    </div>

    <div class="bg-white rounded-2xl shadow-sm border overflow-hidden">
        <table class="w-full text-left" id="tableKatalog">
            <thead>
                <tr class="bg-gray-50 border-b text-xs text-gray-500 uppercase">
                    <th class="p-4 pl-6">Buku</th><th class="p-4">Kategori</th><th class="p-4 text-center">Stok</th><th class="p-4 text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b">
                    <td class="p-4 pl-6"><p class="font-bold">Pemrograman Web Modern</p><p class="text-xs text-gray-500">BK-0112</p></td>
                    <td class="p-4"><span class="bg-gray-100 px-2.5 py-1 rounded text-xs">Teknologi</span></td>
                    <td class="p-4 text-center font-bold">5</td>
                    <td class="p-4 text-center text-green-600 font-semibold text-xs">Tersedia</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah Buku -->
<div id="modalTambah" class="fixed inset-0 z-50 hidden items-center justify-center">
    <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" onclick="closeModalTambah()"></div>
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg relative z-10 p-6 modal-enter" id="modalBoxTambah">
        <h3 class="font-bold text-gray-800 text-lg mb-4">Tambah Data Buku</h3>
        <div class="space-y-4">
            <input type="text" placeholder="Judul Buku..." class="w-full px-3 py-2.5 border rounded-lg text-sm">
            <input type="text" placeholder="Nama Pengarang..." class="w-full px-3 py-2.5 border rounded-lg text-sm">
            <button onclick="simpanBuku()" class="w-full py-2.5 bg-brand-dark text-white rounded-xl font-bold">Simpan Data</button>
        </div>
    </div>
</div>

<div id="toastNotif" class="fixed bottom-8 right-8 bg-white border-l-4 border-brand-dark shadow-xl rounded-lg p-4 z-50 toast-hidden w-80"><h4 class="font-bold text-sm">Berhasil Disimpan</h4></div>

<script>
    function openModalTambah() {
        const modal = document.getElementById('modalTambah'); const box = document.getElementById('modalBoxTambah');
        modal.classList.remove('hidden'); modal.classList.add('flex'); setTimeout(() => box.classList.add('modal-active'), 10);
    }
    function closeModalTambah() {
        document.getElementById('modalBoxTambah').classList.remove('modal-active');
        setTimeout(() => { document.getElementById('modalTambah').classList.add('hidden'); document.getElementById('modalTambah').classList.remove('flex'); }, 200);
    }
    function simpanBuku() {
        closeModalTambah();
        const toast = document.getElementById('toastNotif'); toast.classList.remove('toast-hidden'); toast.classList.add('toast-active');
        setTimeout(() => { toast.classList.remove('toast-active'); toast.classList.add('toast-hidden'); }, 3000);
    }
    document.getElementById('searchInput').addEventListener('keyup', function() {
        let filter = this.value.toLowerCase(); let rows = document.getElementById('tableKatalog').getElementsByTagName('tbody')[0].getElementsByTagName('tr');
        for (let i = 0; i < rows.length; i++) rows[i].style.display = rows[i].textContent.toLowerCase().includes(filter) ? '' : 'none';
    });
</script>
@endsection