
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tambah_transaksi'])) {

    $id_paket = $_POST['id_paket'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $berat = $_POST['berat'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $tanggal_transaksi = $_POST['tanggal_transaksi'];  

    // 1. Ambil transaksi terakhir untuk menentukan ID baru
    $result = $conn->query("SELECT id_transaksi FROM tbl_transaksi ORDER BY id_transaksi DESC LIMIT 1");
    $lastId = $result->fetch_assoc();

    if ($lastId) {
        // Ambil angka dari ID terakhir (misal: L05 → ambil 5)
        $lastNumber = intval(substr($lastId['id_transaksi'], 1)); 
        $newNumber = $lastNumber + 1; 
    } else {
        // Jika belum ada transaksi, mulai dari L01
        $newNumber = 1;
    }

    $id_transaksi = 'L' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);

    $result = $conn->query("SELECT harga_per_kilo, waktu_selesai FROM tbl_paket WHERE id_paket = '$id_paket'");
    $row = $result->fetch_assoc();
    $total_harga = $berat * $row['harga_per_kilo'];
    $waktu_selesai = $row['waktu_selesai'];
    $tanggal_selesai = date('Y-m-d H:i:s', strtotime($tanggal_transaksi . " +$waktu_selesai days"));

    $sql = "INSERT INTO tbl_transaksi (id_transaksi, id_paket, nama_pelanggan, berat, no_hp, alamat, total_harga, tanggal_transaksi, tanggal_selesai) 
            VALUES ('$id_transaksi', '$id_paket', '$nama_pelanggan', '$berat', '$no_hp', '$alamat', '$total_harga', '$tanggal_transaksi', '$tanggal_selesai')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Transaksi berhasil ditambahkan dengan ID $id_transaksi!'); window.location.href='?page=kelola_transaksi';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<div class="w-full bg-white rounded-lg shadow-lg p-6">
  <h2 class="text-2xl font-bold text-[#0a2463] mb-6 text-center">Tambah Transaksi</h2>

  <form method="POST" class="space-y-4">
    <div class="form-group">
      <label for="nama_pelanggan" class="block text-sm font-medium text-gray-700 mb-1">Nama Pelanggan:</label>
      <input type="text" id="nama_pelanggan" name="nama_pelanggan" required
        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#0a2463] focus:border-[#0a2463]">
    </div>

    <div class="form-group">
      <label for="berat" class="block text-sm font-medium text-gray-700 mb-1">Berat (Kg):</label>
      <input type="number" step="0.01" id="berat" name="berat" required
        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#0a2463] focus:border-[#0a2463]">
    </div>

    <div class="form-group">
      <label for="no_hp" class="block text-sm font-medium text-gray-700 mb-1">No HP:</label>
      <input type="text" id="no_hp" name="no_hp" required
        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#0a2463] focus:border-[#0a2463]">
    </div>

    <div class="form-group">
      <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat:</label>
      <textarea id="alamat" name="alamat" required
        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#0a2463] focus:border-[#0a2463]"></textarea>
    </div>

    <div class="form-group">
      <label for="id_paket" class="block text-sm font-medium text-gray-700 mb-1">Paket:</label>
      <select id="id_paket" name="id_paket" required
        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#0a2463] focus:border-[#0a2463]">
        <?php
        $result = $conn->query("SELECT id_paket, nama_paket FROM tbl_paket");
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['id_paket'] . "'>" . $row['nama_paket'] . "</option>";
        }
        ?>
      </select>
    </div>

    <div class="form-group">
      <label for="tanggal_transaksi" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Transaksi:</label>
      <input type="datetime-local" id="tanggal_transaksi" name="tanggal_transaksi" value="<?php echo date('Y-m-d\TH:i'); ?>"
        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#0a2463] focus:border-[#0a2463]">
    </div>

    <div class="mt-6">
      <button type="submit" name="tambah_transaksi"
        class="w-full bg-[#0a2463] hover:bg-[#0a2463]/90 text-white font-medium py-2 px-4 rounded-md transition duration-300 focus:outline-none focus:ring-2 focus:ring-[#0a2463] focus:ring-opacity-50">
        Tambah Transaksi
      </button>
    </div>
    
    <div class="mt-8 flex justify-end">
      <a href="?page=kelola_transaksi" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700/80 transition-colors duration-300 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        Kembali
      </a>
    </div>
  </form>
</div>
