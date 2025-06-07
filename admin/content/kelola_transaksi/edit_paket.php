<?php 
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID paket tidak ditemukan.");
}

$id = $_GET['id'];
$ambil = mysqli_query($conn, "SELECT * FROM tbl_paket WHERE kode_paket='$id'");
$data = mysqli_fetch_assoc($ambil);

if (!$data) {
    die("Data tidak ditemukan.");
}

if (isset($_POST['proses'])) {
    $kode = $_POST['kode_paket'];
    $nama = $_POST['nama_paket'];
    $harga = $_POST['harga_per_kilo'];
    $waktu = $_POST['waktu_selesai'];

    $update = mysqli_query($conn, "UPDATE tbl_paket SET 
        kode_paket='$kode',
        nama_paket='$nama',
        harga_per_kilo='$harga',
        waktu_selesai='$waktu'
        WHERE kode_paket='$id'");

    if ($update) {
        echo "<script>alert('Data berhasil diubah!'); window.location='?page=tbl_paket';</script>";
    } else {
        echo "Gagal update: " . mysqli_error($conn);
    }
}
?>

<form method="post" class="space-y-4 bg-white p-6 rounded shadow-md">
    <h2 class="text-xl font-bold text-[#0a2463] mb-4">Edit Paket</h2>

    <label>Kode Paket</label>
    <input type="text" name="kode_paket" value="<?= $data['kode_paket'] ?>" required class="w-full border px-3 py-2 rounded">

    <label>Nama Paket</label>
    <input type="text" name="nama_paket" value="<?= $data['nama_paket'] ?>" required class="w-full border px-3 py-2 rounded">

    <label>Harga per Kg</label>
    <input type="number" name="harga_per_kilo" value="<?= $data['harga_per_kilo'] ?>" required class="w-full border px-3 py-2 rounded">

    <label>Waktu Selesai (hari)</label>
    <input type="number" name="waktu_selesai" value="<?= $data['waktu_selesai'] ?>" required class="w-full border px-3 py-2 rounded">

    <button type="submit" name="proses" class="bg-[#0a2463] text-white py-2 px-4 rounded hover:bg-[#0a2463]/90">
        Simpan
    </button>
    <a href="?page=kelola_paket" class="ml-2 text-red-600 hover:underline">Kembali</a>
</form>
