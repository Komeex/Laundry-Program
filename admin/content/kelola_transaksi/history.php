<div class="w-full p-6 mt-3  bg-[#0a2463] shadow-lg rounded-lg">
    <h1 class="text-2xl font-bold text-center text-white mb-4">History Pesanan</h1>
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
        transaksi.status_pembayaran, 
        paket.nama_paket 
    FROM tbl_transaksi AS transaksi
    INNER JOIN tbl_paket AS paket ON transaksi.id_paket = paket.id_paket
    WHERE transaksi.status_pembayaran = 'Lunas'
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
        transaksi.status_pembayaran, 
        paket.nama_paket 
    FROM tbl_transaksi AS transaksi
    INNER JOIN tbl_paket AS paket 
        ON transaksi.id_paket = paket.id_paket
    WHERE transaksi.status_pembayaran = 'Lunas'
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
                        <th class="py-3 px-4 text-left border border-gray-200">Status Pembayaran</th>
                        <th class="py-3 px-4 text-left border border-gray-200">Tanggal Transaksi</th>
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
                                    <?= $row['status_pembayaran'] == 'Belum Bayar' ? 'bg-red-200 text-red-800' : 'bg-green-200 text-green-800' ?>">
                                    <?= $row['status_pembayaran']; ?>
                                </span>
                            </td>
                            <td class="py-3 px-4 border border-gray-200"><?= htmlspecialchars($row['tanggal_transaksi']) ?></td>
                            <td class="py-3 px-4 border border-gray-200">
                                Rp <?= number_format($row['total_harga'], 0, ',', '.'); ?>
                            </td>

                             <td class="flex justify-center place-items-center  gap-2 px-4">

                            <button class="p-2 bg-red-500 text-white rounded hover:bg-red-600">
                                        <a class='btn btn-danger' href='?page=history_pemesanan&hapus=<?= $row['id_transaksi']; ?>'
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
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php endif; ?>
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
                        echo "<meta http-equiv='refresh' content='2; URL=?page=history_pemesanan'>";
                    } 
                    ?>
