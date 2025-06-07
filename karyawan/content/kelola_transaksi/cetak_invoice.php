<?php
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$transaksi = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tbl_transaksi WHERE id_transaksi = $id"));
$detail = mysqli_query($conn, "SELECT d.*, p.nama_paket, p.harga_per_kilo 
                               FROM tbl_transaksi d 
                               JOIN tbl_paket p ON d.id_paket = p.id_paket 
                               WHERE d.id_transaksi = $id");

$total_harga = 0;
?>


<!-- Tombol cetak -->
<div class="mt-8 flex gap-4">
    <button>
        <a href="?page=kelola_transaksi" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700/80 transition-colors duration-300 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Kembali
        </a>
    </button>
    <button onclick="generatePDF()" class="print:hidden  px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700/90 flex gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0 1 10.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0 .229 2.523a1.125 1.125 0 0 1-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0 0 21 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 0 0-1.913-.247M6.34 18H5.25A2.25 2.25 0 0 1 3 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 0 1 1.913-.247m10.5 0a48.536 48.536 0 0 0-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5Zm-3 0h.008v.008H15V10.5Z" />
        </svg>
        Cetak Invoice
    </button>
</div>



<!-- Invoice utama -->
<div id="invoice" class="w-[190mm] h-[257mm] mx-auto bg-white shadow-md print:shadow-none relative print:my-0">
    <div class="bg-[#0a2463] text-white text-center py-6 print:py-4">
        <h1 class="text-4xl font-bold tracking-widest uppercase print:text-3xl">Aura Laundry</h1>
        <p class="text-sm mt-1">Alamat: Smks Wira Harapan</p>
        <p class="text-sm">Email: <a href="mailto:smkwiraharapan@gmail.com" class="text-blue-200">smkwiraharapan@gmail.com</a> - Telepon: 085792307417</p>
    </div>

    <div class="p-8 print:p-6">
        <div class="text-center mb-6 print:mb-4">
            <h2 class="text-2xl font-bold text-gray-800 border-b-2 border-gray-300 pb-2 print:text-xl">INVOICE</h2>
            <p class="text-gray-600 mt-1">#<?= $transaksi['id_transaksi'] ?></p>
        </div>

        <div class="bg-gray-50 border border-gray-200 rounded-lg p-5 mb-8 print:p-3 print:mb-4">
            <div class="grid grid-cols-2 text-sm gap-y-2">
                <div class="font-medium text-gray-600">Nama Karyawan</div>
                <div>: <?= $_SESSION['name'] ?></div>
                <div class="font-medium text-gray-600">Tanggal Transaksi</div>
                <div>: <?= date('l, d F Y', strtotime($transaksi['tanggal_transaksi'])) ?></div>

                <div class="font-medium text-gray-600">Nama Pelanggan</div>
                <div>: <?= $transaksi['nama_pelanggan'] ?></div>

                <div class="font-medium text-gray-600">Telepon</div>
                <div>: <?= $transaksi['no_hp'] ?></div>

                <div class="font-medium text-gray-600">Alamat</div>
                <div>: <?= $transaksi['alamat'] ?></div>

                <div class="font-medium text-gray-600">Status Pembayaran</div>
                <div>: <span class="<?= $transaksi['status_pembayaran'] == 'Lunas' ? 'text-green-600' : 'text-red-600' ?> font-semibold"><?= ucfirst($transaksi['status_pembayaran']) ?></span></div>
            </div>
        </div>

        <table class="w-full border-collapse border border-gray-300 text-sm mb-8 print:mb-4">
            <thead class="bg-[#0a2463] text-white">
                <tr>
                    <th class="border border-gray-300 px-3 py-2 print:px-2 print:py-1">Tgl. Ambil</th>
                    <th class="border border-gray-300 px-3 py-2 print:px-2 print:py-1">Paket</th>
                    <th class="border border-gray-300 px-3 py-2 print:px-2 print:py-1">Berat / Kg</th>
                    <th class="border border-gray-300 px-3 py-2 print:px-2 print:py-1">Harga / Kg</th>
                    <th class="border border-gray-300 px-3 py-2 print:px-2 print:py-1">Subtotal</th>
                </tr>
            </thead>
            <tbody class="text-gray-800">
                <?php while ($row = mysqli_fetch_assoc($detail)):
                    $subtotal = $row['berat'] * $row['harga_per_kilo'];
                    $total_harga += $subtotal;
                ?>
                    <tr class="hover:bg-gray-50">
                        <td class="border border-gray-300 px-3 py-2 print:px-2 print:py-1"><?= date('d F Y - H:i:s', strtotime($transaksi['tanggal_selesai'])) ?></td>
                        <td class="border border-gray-300 px-3 py-2 print:px-2 print:py-1"><?= $row['nama_paket'] ?></td>
                        <td class="border border-gray-300 px-3 py-2 text-center print:px-2 print:py-1"><?= $row['berat'] ?> Kg</td>
                        <td class="border border-gray-300 px-3 py-2 text-right print:px-2 print:py-1">Rp <?= number_format($row['harga_per_kilo'], 0, ',', '.') ?></td>
                        <td class="border border-gray-300 px-3 py-2 text-right print:px-2 print:py-1">Rp <?= number_format($subtotal, 0, ',', '.') ?></td>
                    </tr>
                <?php endwhile; ?>
                <tr class="bg-gray-100">
                    <td colspan="4" class="text-right border border-gray-300 px-3 py-2 font-medium print:px-2 print:py-1">Diskon</td>
                    <td class="border border-gray-300 px-3 py-2 text-right print:px-2 print:py-1">Rp 0</td>
                </tr>
                <tr class="bg-gray-100">
                    <td colspan="4" class="text-right border border-gray-300 px-3 py-2 font-medium print:px-2 print:py-1">DP</td>
                    <td class="border border-gray-300 px-3 py-2 text-right print:px-2 print:py-1">Rp 0</td>
                </tr>
                <tr class="bg-[#e1f1ff] font-bold">
                    <td colspan="4" class="text-right border border-gray-300 px-3 py-2 print:px-2 print:py-1">Kekurangan</td>
                    <td class="border border-gray-300 px-3 py-2 text-right print:px-2 print:py-1">Rp <?= number_format($total_harga, 0, ',', '.') ?></td>
                </tr>
            </tbody>
        </table>

        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded print:p-2 print:text-xs">
            <p class="font-semibold mb-2 text-gray-800">Perhatian:</p>
            <ul class="list-disc pl-5 space-y-1 text-sm text-gray-700">
                <li>Kerusakan akibat jenis bahan tertentu tidak menjadi tanggung jawab kami.</li>
                <li>Barang berharga yang tertinggal dalam pakaian bukan tanggung jawab pihak laundry.</li>
                <li>Jumlah cucian dianggap benar sesuai data kami jika tidak dihitung bersama saat penyerahan.</li>
                <li>Komplain diterima maksimal 1 x 24 jam dengan menyertakan nota asli.</li>
            </ul>
        </div>

        <div class="text-center text-gray-300 text-xs mt-8 print:mt-4">
            <p>Terima kasih telah menggunakan jasa Aura Laundry</p>
            <p>Dokumen ini dicetak pada <?= date('d/m/Y H:i:s') ?></p>
        </div>
    </div>
</div>