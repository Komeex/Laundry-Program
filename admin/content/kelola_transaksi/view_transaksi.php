<?php
// Ambil ID dari URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT * FROM tbl_transaksi WHERE id_transaksi = $id";
$result = $conn->query($sql);

if ($row = $result->fetch_assoc()) {
?>

<?php
// Ambil detail transaksi
$queryDetail = "SELECT transaksi.*, paket.nama_paket, paket.harga_per_kilo 
                FROM tbl_transaksi transaksi 
                JOIN tbl_paket paket ON transaksi.id_paket = paket.id_paket 
                WHERE transaksi.id_transaksi = $id";
$resultDetail = $conn->query($queryDetail);

$total_harga = 0;
?>

    <div class="mx-auto bg-white rounded-lg shadow-lg p-6 mt-4 mb-48 border-2 border-[#0a2463]/20">
        <h1 class="text-xl font-bold text-center text-[#0a2463] mb-6 border-b-2 border-[#0a2463] pb-2">Transaksi Pelanggan</h1>

        <div class="space-y-5">

            <div class="border-b-2 border-gray-200 hover:border-[#0a2463] transition-colors duration-300 pb-2 group">
                <label class="block text-sm font-medium text-[#0a2463] mb-1">Id Transaksi</label>
                <div class="h-6 group-hover:text-[#0a2463] font-medium transition-colors duration-300 px-2">
                    <?= htmlspecialchars($row['id_transaksi']) ?>
                </div>
            </div>

            <div class="border-b-2 border-gray-200 hover:border-[#0a2463] transition-colors duration-300 pb-2 group">
                <label class="block text-sm font-medium text-[#0a2463] mb-1">Tanggal Transaksi</label>
                <div class="h-6 group-hover:text-[#0a2463] font-medium transition-colors duration-300 px-2">
                    <?= htmlspecialchars($row['tanggal_transaksi']) ?>
                </div>
            </div>

            <div class="border-b-2 border-gray-200 hover:border-[#0a2463] transition-colors duration-300 pb-2 group">
                <label class="block text-sm font-medium text-[#0a2463] mb-1">Nama Pelanggan</label>
                <div class="h-6 group-hover:text-[#0a2463] font-medium transition-colors duration-300 px-2">
                    <?= htmlspecialchars($row['nama_pelanggan']) ?>
                </div>
            </div>

            <div class="border-b-2 border-gray-200 hover:border-[#0a2463] transition-colors duration-300 pb-2 group">
                <label class="block text-sm font-medium text-[#0a2463] mb-1">Telepon</label>
                <div class="h-6 group-hover:text-[#0a2463] font-medium transition-colors duration-300 px-2">
                    <?= htmlspecialchars($row['no_hp']) ?>
                </div>
            </div>

            <div class="border-b-2 border-gray-200 hover:border-[#0a2463] transition-colors duration-300 pb-2 group">
                <label class="block text-sm font-medium text-[#0a2463] mb-1">Alamat</label>
                <div class="h-6 group-hover:text-[#0a2463] font-medium transition-colors duration-300 px-2">
                    <?= htmlspecialchars($row['alamat']) ?>
                </div>
            </div>

            
<div class="mx-auto bg-white rounded-lg shadow-lg p-6 mt-4 border-2 border-[#0a2463]/20">
    <h1 class="text-xl font-bold text-center text-[#0a2463] mb-6 border-b-2 border-[#0a2463] pb-2">Edit Status Transaksi</h1>

    <form method="POST">
        <div class="border-b-2 border-gray-200 hover:border-[#0a2463] transition-colors duration-300 pb-2 group">
            <label class="block text-sm font-medium text-[#0a2463] mb-1">Status Pembayaran</label>
            <select name="status_pembayaran" class="w-full px-2 py-1 border rounded">
                <option value="belum bayar" <?= ($row['status_pembayaran'] == 'belum bayar') ? 'selected' : '' ?>>Belum Bayar</option>
                <option value="lunas" <?= ($row['status_pembayaran'] == 'lunas') ? 'selected' : '' ?>>Lunas</option>
            </select>
        </div>

        <div class="border-b-2 border-gray-200 hover:border-[#0a2463] transition-colors duration-300 pb-2 group">
            <label class="block text-sm font-medium text-[#0a2463] mb-1">Status Pesanan</label>
            <select name="status_pesanan" class="w-full px-2 py-1 border rounded">
                <option value="diproses" <?= ($row['status_pesanan'] == 'diproses') ? 'selected' : '' ?>>Diproses</option>
                <option value="selesai" <?= ($row['status_pesanan'] == 'selesai') ? 'selected' : '' ?>>Selesai</option>
                <option value="diambil" <?= ($row['status_pesanan'] == 'diambil') ? 'selected' : '' ?>>Diambil</option>
            </select>
        </div>


        <div class="mt-10">
    <h2 class="text-lg font-bold text-[#0a2463] mb-4">Rincian Paket</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full border text-sm text-left text-gray-700">
            <thead class="bg-[#0a2463] text-white">
                <tr>
                    <th class="py-2 px-4 border">Nama Paket</th>
                    <th class="py-2 px-4 border">Berat (Kg)</th>
                    <th class="py-2 px-4 border">Harga per Kg</th>
                    <th class="py-2 px-4 border">Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($item = $resultDetail->fetch_assoc()): ?>
                    <?php 
                        $subTotal = $item['berat'] * $item['harga_per_kilo'];
                        $total_harga += $subTotal;
                    ?>
                    <tr class="border-t">
                        <td class="py-2 px-4 border"><?= htmlspecialchars($item['nama_paket']) ?></td>
                        <td class="py-2 px-4 border"><?= $item['berat'] ?> Kg</td>
                        <td class="py-2 px-4 border">Rp <?= number_format($item['harga_per_kilo'], 0, ',', '.') ?></td>
                        <td class="py-2 px-4 border">Rp <?= number_format($subTotal, 0, ',', '.') ?></td>
                    </tr>
                <?php endwhile; ?>
                <tr class="bg-gray-100 font-semibold">
                    <td colspan="3" class="py-2 px-4 text-right border">Total Bayar</td>
                    <td class="py-2 px-4 border">Rp <?= number_format($total_harga, 0, ',', '.') ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

        
        <div class="mt-4">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
        </div>

        <div class="mt-8 flex justify-end">
      <a href="?page=kelola_transaksi" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700/80 transition-colors duration-300 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        Kembali
      </a>
    </div>
    </div>

    <?php 
} else {
    echo "<p class='text-center text-red-500'>Data tidak ditemukan!</p>";
}
?>


<?php 
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Jika ada perubahan status
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $status_pembayaran = $_POST['status_pembayaran'];
    $status_pesanan = $_POST['status_pesanan'];

    // Update data transaksi
    $sql_update = "UPDATE tbl_transaksi SET 
                   status_pembayaran = '$status_pembayaran', 
                   status_pesanan = '$status_pesanan' 
                   WHERE id_transaksi = $id";

    if ($conn->query($sql_update) === TRUE) {
        echo "<script>alert('Status berhasil diperbarui!'); window.location.href='?page=kelola_transaksi&view=$id';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
