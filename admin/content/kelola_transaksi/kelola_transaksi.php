<div class="w-full p-6 mt-3  bg-[#0a2463] shadow-lg rounded-lg">
    <h1 class="text-2xl font-bold text-center text-white mb-4">Data Transaksi</h1>
      <?php
//pencarian

if(isset($_POST['btncari'])){
    $keyword = $_POST['cari'];
    $q = "SELECT * FROM tbl_transaksi INNER JOIN tbl_paket AS paket ON tbl_transaksi.id_paket = paket.id_paket WHERE id_transaksi LIKE '%$keyword%' or nama_pelanggan LIKE '%$keyword%' or no_hp LIKE '%$keyword%' or status_pesanan LIKE '%$keyword%'
    ORDER BY id_transaksi desc ";
}else{
    $q = "SELECT transaksi.id_transaksi, transaksi.nama_pelanggan, transaksi.berat, transaksi.no_hp, transaksi.alamat, transaksi.total_harga, transaksi.tanggal_transaksi, transaksi.tanggal_selesai, transaksi.status_pesanan, transaksi.status_pembayaran, paket.nama_paket 
FROM tbl_transaksi AS transaksi
INNER JOIN tbl_paket AS paket ON transaksi.id_paket = paket.id_paket
";
}


$result = $conn->query($q);
    ?>

    <div class="mt-8 bg-white p-6 rounded-lg shadow-md w-full rounded pt-12">

        <form action="" method="post">
     <div class="flex items-center mb-4">
        <div class="relative flex-grow max-w-md">
            <input type="text"
                   name="cari"
                   class="w-full rounded-lg border-2 border-indigo-600 px-[10px] py-[5px] pl-10" 
                   placeholder="Cari nama pelanggan, status, paket...">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>
        <button name="btncari" class="ml-2 bg-[#0a2463] text-white px-4 py-2 rounded-lg hover:bg-[#0a2463]/90 transition-colors">
            Cari
        </button>
        <button src="?page=kelola_transaksi" class="ml-2 bg-red-600 hover:bg-red-700/90 text-white px-4 py-2 rounded-lg hover:bg-[#0a2463]/90 transition-colors">
            reset
        </button>
    </div>
    </form>

        <table class="w-full border-collapse border border-gray-200">
            <thead class="bg-[#0a2463] text-white">
                <tr>
                    <th class="py-3 px-4 text-left border border-gray-200">ID Transaksi</th>
                    <th class="py-3 px-4 text-left border border-gray-200">Nama Pelanggan</th>
                    <th class="py-3 px-4 text-left border border-gray-200">Paket</th>
                    <th class="py-3 px-4 text-left border border-gray-200">Berat (Kg)</th>
                    <th class="py-3 px-4 text-left border border-gray-200">No HP</th>
                    <th class="py-3 px-4 text-left border border-gray-200">Alamat</th>
                    <th class="py-3 px-4 text-left border border-gray-200">Karyawan</th>
                    <th class="py-3 px-4 text-left border border-gray-200">Status</th>
                    <th class="py-3 px-4 text-left border border-gray-200">Status Pembayaran</th>
                    <th class="py-3 px-4 text-left border border-gray-200">Total Harga</th>
                    <th class="py-3 px-4 text-left border border-gray-200">Tanggal Selesai</th>
                    <th class="py-3 px-4 text-left border border-gray-200">Action</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                <?php
                $no = 1;
                while ($row = $result->fetch_assoc()) { ?>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 px-4 border border-gray-200"><?= $no++; ?></td>
                        <td class="py-3 px-4 border border-gray-200"><?php echo $row['nama_pelanggan']; ?></td>
                        <td class="py-3 px-4 border border-gray-200"><?php echo $row['nama_paket']; ?></td>
                        <td class="py-3 px-4 border border-gray-200"><?php echo $row['berat']; ?></td>
                        <td class="py-3 px-4 border border-gray-200"><?php echo $row['no_hp']; ?></td>
                        <td class="py-3 px-4 border border-gray-200"><?php echo $row['alamat']; ?></td>
                        <td class="py-3 px-4 border border-gray-200"><?= $_SESSION['name'] ?></td>
                        <td class="py-3 px-4 border border-gray-200">
                            <?php
                            $status = $row['status_pesanan'];
                            $warna = '';

                            if ($status == 'Diproses') {
                                $warna = 'bg-yellow-200 text-yellow-800';
                            } elseif ($status == 'Selesai') {
                                $warna = 'bg-blue-200 text-blue-800';
                            } elseif ($status == 'Diambil') {
                                $warna = 'bg-green-200 text-green-800';
                            }
                            ?>
                            <span class="px-2 py-1 rounded text-sm font-semibold <?= $warna; ?>">
                                <?= $status; ?>
                            </span>
                        </td>

                        <td class="py-3 px-4 border border-gray-200">
                            <?php
                            $pembayaran = $row['status_pembayaran'];
                            $warna_pembayaran = '';

                            if ($pembayaran == 'Belum Bayar') {
                                $warna_pembayaran = 'bg-red-200 text-red-800';
                            } elseif ($pembayaran == 'Lunas') {
                                $warna_pembayaran = 'bg-green-200 text-green-800';
                            }
                            ?>
                            <span class="px-2 py-1 rounded text-sm font-semibold <?= $warna_pembayaran; ?>">
                                <?= $pembayaran; ?>
                            </span>
                        </td>


                        <td type="number" step="0.01" class="py-3 px-4 border border-gray-200"> <?php echo 'Rp ' . number_format($row['total_harga'], 0, ',', '.'); ?></td>
                        <td class="py-3 px-4 border border-gray-200"><?php echo $row['tanggal_selesai']; ?></td>
                        <td class="flex justify-center place-items-center  gap-2 px-4">
                            <!-- View button -->

                            <button class="p-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                                <a class='btn btn-danger' href='?page=view_transaksi&id=<?= $row['id_transaksi']; ?>'
                                    onclick="return confirm('Yakin ingin mengecek data?');">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                        <circle cx="12" cy="12" r="3" />
                                    </svg>

                                </a>
                            </button>

                            <button class="p-2 bg-red-600 text-white rounded hover:bg-red-700/90">
                                <a class='btn btn-danger' href='?page=cetak_invoice&id=<?= $row['id_transaksi']; ?>' target="_blank"
                                            onclick="return confirm(' Yakin ingin mencetak Invoice?');">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5Zm-3 0h.008v.008H15V10.5Z" />
                                    </svg>
                                </a>
                            </button>

                            <button class="p-2 bg-red-500 text-white rounded hover:bg-red-600">
                                        <a class='btn btn-danger' href='?page=kelola_transaksi&hapus=<?= $row['id_transaksi']; ?>'
                                            onclick="return confirm('Yakin akan menghapus data?');">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M3 6h18" />
                                                <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                                <path d="M10 11v6" />
                                                <path d="M14 11v6" />
                                                <path d="M5 6l1 14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2l1-14" />
                                            </svg>

                                        </a>
                                    </button>
                        </td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php
                    if (isset($_GET['hapus'])) {

                        $id = $_GET['hapus'];
                        mysqli_query($conn, "DELETE FROM tbl_transaksi WHERE id_transaksi = '$id'");

                        echo "<div class='bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative' role='alert'>
                                    <strong class='font-bold'>Berhasil!</strong>
                                        <span class='block sm:inline'>Karyawan berhasil ditambahkan.</span>
                                            <button onclick='this.parentElement.style.display=\"none\";' class='absolute top-0 bottom-0 right-0 px-4 py-3'>
                                                &times;
                                            </button>
                                </div>";
                        echo "<meta http-equiv='refresh' content='2; URL=?page=kelola_transaksi'>";
                    } 
                    ?>
