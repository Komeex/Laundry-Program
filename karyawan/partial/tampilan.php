<!-- Hero Container -->
<div class="mt-8 px-4 py-6 bg-gradient-to-r from-blue-800 to-blue-600 rounded-xl shadow-lg">
  <div class="flex flex-col lg:flex-row items-center justify-between">
    <!-- Hero Text -->
    <div class="mb-6 lg:mb-0 lg:w-1/2">
      <h2 class="text-2xl lg:text-3xl font-bold text-white mb-3">
        Selamat Datang di Aura Laundry
      </h2>
      <p class="text-blue-100 mb-6 max-w-lg">
        Layanan laundry premium untuk kebutuhan Anda. Kami berkomitmen memberikan pelayanan terbaik dengan hasil yang memuaskan.
      </p>
      <div class="flex space-x-3">
        <a href="?page=input_transaksi">
        <button class="border border-white text-white px-6 py-2 rounded-lg font-medium hover:bg-blue-700 transition">
          Tambah Order
        </button>
        </a>
      </div>
    </div>
    
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 lg:w-1/2">
      <!-- Stat Card 1 -->
      <div class="bg-white/10 backdrop-blur-sm p-4 rounded-lg border border-blue-300/20">
        <div class="flex items-center mb-3">
          <div class="p-2 bg-blue-500/30 rounded-lg mr-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-blue-100">
              <path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"></path>
              <path d="M5 3v4"></path>
              <path d="M19 17v4"></path>
              <path d="M3 5h4"></path>
              <path d="M17 19h4"></path>
            </svg>
          </div>
          <h3 class="text-white font-medium">Kepuasan Pelanggan</h3>
        </div>
        <p class="text-2xl font-bold text-white">98%</p>
        <p class="text-blue-200 text-sm">Berdasarkan 1.250+ review</p>
      </div>
      
      <!-- Stat Card 2 -->
      <div class="bg-white/10 backdrop-blur-sm p-4 rounded-lg border border-blue-300/20">
        <div class="flex items-center mb-3">
          <div class="p-2 bg-blue-500/30 rounded-lg mr-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-blue-100">
              <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
              <line x1="3" y1="6" x2="21" y2="6"></line>
              <path d="M16 10a4 4 0 0 1-8 0"></path>
            </svg>
          </div>
          <h3 class="text-white font-medium">Total Pesanan</h3>
        </div>
        <p class="text-2xl font-bold text-white">5.840+</p>
        <p class="text-blue-200 text-sm">Sejak awal beroperasi</p>
      </div>
      
      <!-- Stat Card 3 -->
      <div class="bg-white/10 backdrop-blur-sm p-4 rounded-lg border border-blue-300/20">
        <div class="flex items-center mb-3">
          <div class="p-2 bg-blue-500/30 rounded-lg mr-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-blue-100">
              <circle cx="12" cy="8" r="6"></circle>
              <path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"></path>
            </svg>
          </div>
          <h3 class="text-white font-medium">Kualitas Premium</h3>
        </div>
        <p class="text-2xl font-bold text-white">100%</p>
        <p class="text-blue-200 text-sm">Bahan pembersih terbaik</p>
      </div>
      
      <!-- Stat Card 4 -->
      <div class="bg-white/10 backdrop-blur-sm p-4 rounded-lg border border-blue-300/20">
        <div class="flex items-center mb-3">
          <div class="p-2 bg-blue-500/30 rounded-lg mr-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-blue-100">
              <circle cx="12" cy="12" r="10"></circle>
              <polyline points="12 6 12 12 16 14"></polyline>
            </svg>
          </div>
          <h3 class="text-white font-medium">Ketepatan Waktu</h3>
        </div>
        <p class="text-2xl font-bold text-white">95%</p>
        <p class="text-blue-200 text-sm">Selesai tepat waktu</p>
      </div>
    </div>
  </div>
</div>



<div class="w-full p-6 mt-3  bg-[#0a2463] shadow-lg rounded-lg">
    <h1 class="text-2xl font-bold text-center text-white mb-4">Data Transaksi Belum Bayar</h1>
    <?php
  $result = $conn->query("
    SELECT 
        transaksi.id_transaksi, 
        transaksi.nama_pelanggan, 
        transaksi.berat, 
        transaksi.no_hp, 
        transaksi.alamat, 
        transaksi.total_harga, 
        transaksi.tanggal_transaksi, 
        transaksi.tanggal_selesai, 
        transaksi.status_pesanan, 
        transaksi.status_pembayaran, 
        paket.nama_paket 
    FROM tbl_transaksi AS transaksi
    INNER JOIN tbl_paket AS paket ON transaksi.id_paket = paket.id_paket
    WHERE transaksi.status_pembayaran = 'Belum Bayar'
");
    ?>




<?php
$sql = "
    SELECT 
        transaksi.id_transaksi, 
        transaksi.nama_pelanggan, 
        transaksi.berat, 
        transaksi.no_hp, 
        transaksi.alamat, 
        transaksi.total_harga, 
        transaksi.tanggal_transaksi, 
        transaksi.tanggal_selesai, 
        transaksi.status_pesanan, 
        transaksi.status_pembayaran, 
        paket.nama_paket 
    FROM tbl_transaksi AS transaksi
    INNER JOIN tbl_paket AS paket 
        ON transaksi.id_paket = paket.id_paket
    WHERE transaksi.status_pembayaran = 'Belum Bayar'
";
$result = $conn->query($sql);

// Error handling
if (!$result) {
    echo "<div class='text-red-500'>Query Error: " . $conn->error . "</div>";
    exit;
}
?>

    <div class="mt-8 bg-white p-6 rounded-lg shadow-md w-full pt-12">
        <?php if ($result->num_rows === 0): ?>
            <p class="text-center text-gray-500">Belum ada transaksi yang berstatus "Belum Bayar".</p>
        <?php else: ?>
            <table class="w-full border-collapse border border-gray-200">
                <thead class="bg-[#0a2463] text-white">
                    <tr>
                        <th class="py-3 px-4 text-left border border-gray-200">#</th>
                        <th class="py-3 px-4 text-left border border-gray-200">Nama Pelanggan</th>
                        <th class="py-3 px-4 text-left border border-gray-200">Paket</th>
                        <th class="py-3 px-4 text-left border border-gray-200">Berat (Kg)</th>
                        <th class="py-3 px-4 text-left border border-gray-200">No HP</th>
                        <th class="py-3 px-4 text-left border border-gray-200">Status Pesanan</th>
                        <th class="py-3 px-4 text-left border border-gray-200">Status Pembayaran</th>
                        <th class="py-3 px-4 text-left border border-gray-200">Total Harga</th>
                        <th class="py-3 px-4 text-left border border-gray-200">Action</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <?php $no = 1; ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 px-4 border border-gray-200"><?= $no++; ?></td>
                            <td class="py-3 px-4 border border-gray-200"><?= htmlspecialchars($row['nama_pelanggan']); ?></td>
                            <td class="py-3 px-4 border border-gray-200"><?= htmlspecialchars($row['nama_paket']); ?></td>
                            <td class="py-3 px-4 border border-gray-200"><?= htmlspecialchars($row['berat']); ?></td>
                            <td class="py-3 px-4 border border-gray-200"><?= htmlspecialchars($row['no_hp']); ?></td>
                            <td class="py-3 px-4 border border-gray-200">
                                <span class="px-2 py-1 rounded text-sm font-semibold
                                    <?= $row['status_pesanan']=='Diproses' ? 'bg-yellow-200 text-yellow-800'
                                       : ($row['status_pesanan']=='Selesai' ? 'bg-blue-200 text-blue-800' : '') ?>">
                                    <?= $row['status_pesanan']; ?>
                                </span>
                            </td>
                            <td class="py-3 px-4 border border-gray-200">
                                <span class="px-2 py-1 rounded text-sm font-semibold
                                    <?= $row['status_pembayaran']=='Belum Bayar' ? 'bg-red-200 text-red-800' : 'bg-green-200 text-green-800' ?>">
                                    <?= $row['status_pembayaran']; ?>
                                </span>
                            </td>
                            <td class="py-3 px-4 border border-gray-200">
                                Rp <?= number_format($row['total_harga'], 0, ',', '.'); ?>
                            </td>
                            <td class="py-3 px-4 border border-gray-200 flex gap-2 justify-center">
                                <a href="?page=view_transaksi&id=<?= $row['id_transaksi']; ?>"
                                   class="p-2 bg-blue-500 text-white rounded hover:bg-blue-600" 
                                   onclick="return confirm('Yakin ingin mengecek data?');">
                                    View
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>


