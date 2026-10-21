@extends('layouts.main')
@section('title', 'Pengaturan Denda & Diskon')

@section('content')
<!-- Header -->
<header class="bg-white py-5 px-8 border-b border-gray-200 flex justify-between items-center z-10 shadow-sm">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Pengaturan Variabel Denda</h1>
        <p class="text-sm text-gray-500 mt-1">Atur tarif harian dan potongan diskon untuk berbagai kalangan.</p>
    </div>
    
    <!-- Tombol Simpan Perubahan (Warna dikunci ke Hijau Gelap #1E3B30) -->
    <button onclick="simpanPengaturan()" class="bg-[#1E3B30] text-white px-5 py-2.5 rounded-lg text-sm font-bold shadow-md hover:bg-[#152e25] transition-all flex items-center gap-2 cursor-pointer">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
        Simpan Perubahan
    </button>
</header>

<div class="flex-1 overflow-y-auto p-8">
    <div class="max-w-3xl bg-white rounded-2xl shadow-sm border border-gray-200 p-8">
        
        <h3 class="text-lg font-bold text-gray-800 mb-6 border-b pb-3">Tarif Dasar Denda (Per Hari)</h3>
        <div class="mb-8">
            <label class="block text-sm font-bold text-gray-700 mb-2">Nominal Denda (Rp)</label>
            <input type="number" value="2000" class="w-full md:w-1/2 px-4 py-3 bg-gray-50 border rounded-xl text-sm focus:border-brand-dark focus:ring-1 focus:ring-brand-dark">
            <p class="text-xs text-gray-500 mt-2">*Tarif ini akan dikalikan dengan jumlah hari keterlambatan.</p>
        </div>

        <h3 class="text-lg font-bold text-gray-800 mb-6 border-b pb-3">Potongan Diskon Kategori</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Diskon Pelajar (%)</label>
                <input type="number" value="10" class="w-full px-4 py-3 bg-gray-50 border rounded-xl text-sm focus:border-brand-dark text-blue-600 font-bold">
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Diskon Mahasiswa (%)</label>
                <input type="number" value="20" class="w-full px-4 py-3 bg-gray-50 border rounded-xl text-sm focus:border-brand-dark text-orange-600 font-bold">
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Diskon Guru / Dosen (%)</label>
                <input type="number" value="30" class="w-full px-4 py-3 bg-gray-50 border rounded-xl text-sm focus:border-brand-dark text-green-600 font-bold">
            </div>
        </div>

    </div>
</div>

<div id="toastNotif" class="fixed bottom-8 right-8 bg-white border-l-4 border-brand-dark shadow-xl rounded-lg p-4 z-50 transition-all duration-300 transform translate-y-20 opacity-0"><h4 class="font-bold text-sm text-brand-dark">Pengaturan Tersimpan!</h4></div>

<script>
    function simpanPengaturan() {
        const toast = document.getElementById('toastNotif');
        toast.classList.remove('translate-y-20', 'opacity-0');
        setTimeout(() => { toast.classList.add('translate-y-20', 'opacity-0'); }, 3000);
    }
</script>
@endsection