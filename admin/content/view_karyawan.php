<?php

// Ambil ID dari URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT * FROM users WHERE id = $id";
$result = $conn->query($sql);

if ($row = $result->fetch_assoc()) {
?>

    <div class="mx-auto bg-white rounded-lg shadow-lg p-6 mt-4 mb-48 border-2 border-[#0a2463]/20">
        <h1 class="text-xl font-bold text-center text-[#0a2463] mb-6 border-b-2 border-[#0a2463] pb-2">DATA KARYAWAN</h1>

        <div class="space-y-5">
            <!-- Nama -->
            <div class="border-b-2 border-gray-200 hover:border-[#0a2463] transition-colors duration-300 pb-2 group">
                <label class="block text-sm font-medium text-[#0a2463] mb-1">Nama</label>
                <div class="h-6 group-hover:text-[#0a2463] font-medium transition-colors duration-300 px-2">
                    <?= htmlspecialchars($row['name']) ?>
                </div>
            </div>
            <!-- Telepon -->
            <div class="border-b-2 border-gray-200 hover:border-[#0a2463] transition-colors duration-300 pb-2 group">
                <label class="block text-sm font-medium text-[#0a2463] mb-1">Telepon</label>
                <div class="h-6 group-hover:text-[#0a2463] font-medium transition-colors duration-300 px-2">
                    <?= htmlspecialchars($row['telepon']) ?>
                </div>
            </div>

            <!-- Alamat -->
            <div class="border-b-2 border-gray-200 hover:border-[#0a2463] transition-colors duration-300 pb-2 group">
                <label class="block text-sm font-medium text-[#0a2463] mb-1">Alamat</label>
                <div class="h-6 group-hover:text-[#0a2463] font-medium transition-colors duration-300 px-2">
                    <?= htmlspecialchars($row['alamat']) ?>
                </div>
            </div>

            <!-- Email -->
            <div class="border-b-2 border-gray-200 hover:border-[#0a2463] transition-colors duration-300 pb-2 group">
                <label class="block text-sm font-medium text-[#0a2463] mb-1">Email</label>
                <div class="h-6 group-hover:text-[#0a2463] font-medium transition-colors duration-300 px-2">
                    <?= htmlspecialchars($row['email']) ?>
                </div>
            </div>

            <!-- Password (Sebaiknya tidak ditampilkan langsung untuk keamanan) -->
            <div class="border-b-2 border-gray-200 hover:border-[#0a2463] transition-colors duration-300 pb-2 group">
                <label class="block text-sm font-medium text-[#0a2463] mb-1">Password</label>
                <div class="h-6 group-hover:text-[#0a2463] font-medium transition-colors duration-300 px-2">
                    ••••••••• (Tersembunyi)
                </div>
            </div>

            <!-- Posisi -->
            <div class="border-b-2 border-gray-200 hover:border-[#0a2463] transition-colors duration-300 pb-2 group">
                <label class="block text-sm font-medium text-[#0a2463] mb-1">Posisi</label>
                <div class="h-6 group-hover:text-[#0a2463] font-medium transition-colors duration-300 px-2">
                    <?= ucfirst($row['role']) ?>
                </div>
            </div>
        </div>

        <div class="mt-8 flex justify-end">
      <a href="?page=kelola_karyawan" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700/80 transition-colors duration-300 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        Kembali
      </a>
    </div>
    </div>

    <?php 
} else {
    echo "<p class='text-center text-red-500'>Data karyawan tidak ditemukan!</p>";
}
?>