@extends('layouts.main')
@section('title', 'Riwayat Pendapatan Denda')

@section('content')
<!-- Header -->
<header class="bg-white py-5 px-8 border-b border-gray-200 flex justify-between items-center z-10 shadow-sm">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Riwayat Pendapatan Denda</h1>
        <p class="text-sm text-gray-500 mt-1">Rekapitulasi denda keterlambatan yang telah dilunasi.</p>
    </div>
    
    <!-- Tombol Cetak Laporan (Warna dikunci ke Hijau Gelap #1E3B30) -->
    <button class="bg-[#1E3B30] text-white px-5 py-2.5 rounded-lg text-sm font-bold shadow-md hover:bg-[#152e25] transition-all-custom flex items-center gap-2">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
        Cetak Laporan
    </button>
</header>

<div class="flex-1 overflow-y-auto p-8">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200">
            <p class="text-xs text-gray-500 font-medium uppercase mb-1">Total Denda (Bulan Ini)</p>
            <p class="text-2xl font-bold text-gray-800">Rp 45.000</p>
        </div>
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200">
            <p class="text-xs text-gray-500 font-medium uppercase mb-1">Transaksi Terlambat</p>
            <p class="text-2xl font-bold text-gray-800">12 Kasus</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border overflow-hidden">
        <table class="w-full text-left">
            <thead>
                <tr class="bg-gray-50 border-b text-xs text-gray-500 uppercase">
                    <th class="p-4 pl-6">Tgl. Bayar</th><th class="p-4">Peminjam</th><th class="p-4 text-right">Nominal Denda</th><th class="p-4 text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b">
                    <td class="p-4 pl-6">18 Okt 2026</td>
                    <td class="p-4"><p class="font-bold">Dimas Aditya</p></td>
                    <td class="p-4 text-right font-bold">Rp 5.000</td>
                    <td class="p-4 text-center"><span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-[10px] font-bold uppercase">Lunas</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    function exportData() {
        alert("Memproses data... \n\nFile 'Laporan_Denda_Oktober_2026.pdf' sedang diunduh (Simulasi).");
    }
</script>
@endsection