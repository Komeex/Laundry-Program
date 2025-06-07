<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tambah_paket'])) {
    $kode_paket = $_POST['kode_paket'];
    $nama_paket = $_POST['nama_paket'];
    $harga_per_kilo = $_POST['harga_per_kilo'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal_selesai = $_POST['waktu_selesai'];
    
    $sql = "INSERT INTO tbl_paket (kode_paket, nama_paket, harga_per_kilo, deskripsi, waktu_selesai) VALUES ('$kode_paket', '$nama_paket', '$harga_per_kilo', '$deskripsi', '$tanggal_selesai')";
    $conn->query($sql);
}
?>

<div class="w-full bg-white rounded-lg shadow-lg p-6">
  <h2 class="text-2xl font-bold text-[#0a2463] mb-6 text-center">Tambah Paket</h2>

  <form method="POST" class="space-y-4">
    <div class="form-group">
      <label for="kode_paket" class="block text-sm font-medium text-gray-700 mb-1">Kode Paket:</label>
      <input type="text" id="kode_paket" name="kode_paket" required
        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#0a2463] focus:border-[#0a2463]">
    </div>

    <div class="form-group">
      <label for="nama_paket" class="block text-sm font-medium text-gray-700 mb-1">Nama Paket:</label>
      <input type="text" id="nama_paket" name="nama_paket" required
        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#0a2463] focus:border-[#0a2463]">
    </div>

    <div class="form-group">
      <label for="harga_per_kilo" class="block text-sm font-medium text-gray-700 mb-1">Harga per Kg:</label>
      <input type="number" step="0.01" id="harga_per_kilo" name="harga_per_kilo" required
        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#0a2463] focus:border-[#0a2463]">
    </div>

    <div class="form-group">
      <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi:</label>
      <textarea id="deskripsi" name="deskripsi"
        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#0a2463] focus:border-[#0a2463]"></textarea>
    </div>

    <div class="form-group">
      <label for="waktu_selesai" class="block text-sm font-medium text-gray-700 mb-1">Waktu Selesai (Hari):</label>
      <input type="number" id="waktu_selesai" name="waktu_selesai" value="1" required
        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#0a2463] focus:border-[#0a2463]">
    </div>

    <div class="mt-6">
      <button type="submit" name="tambah_paket"
        class="w-full bg-[#0a2463] hover:bg-[#0a2463]/90 text-white font-medium py-2 px-4 rounded-md transition duration-300 focus:outline-none focus:ring-2 focus:ring-[#0a2463] focus:ring-opacity-50">
        Tambah Paket
      </button>
    </div>
    
    <div class="mt-8 flex justify-end">
      <a href="?page=tbl_paket" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700/80 transition-colors duration-300 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        Kembali
      </a>
    </div>
  </form>
</div>