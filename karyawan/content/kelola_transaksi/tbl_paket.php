<div class="w-full p-6 mt-3  bg-[#0a2463] shadow-lg rounded-lg">
    <h1 class="text-2xl font-bold text-center text-white mb-4">Data Paket Laundry</h1>
    <div class="border-t border-gray-300 my-4"></div>

    <?php
    // Ambil data dari tabel paket
    if(isset($_POST['btncari'])){
        $keyword = $_POST['cari'];
        $q = "SELECT * FROM tbl_paket WHERE kode_paket LIKE '%$keyword%' or nama_paket LIKE '%$keyword%' or kode_paket LIKE '%$keyword%'
    ORDER BY kode_paket desc ";
    } else{
        $q = "SELECT * FROM tbl_paket";
    }
    $result = $conn->query($q);
    ?>

    <div class="mt-8 bg-white p-6 rounded-lg shadow-md w-full pt-12">

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
        <button src="?page=kelola_karyawan" class="ml-2 bg-red-600 hover:bg-red-700/90 text-white px-4 py-2 rounded-lg hover:bg-[#0a2463]/90 transition-colors">
            reset
        </button>
    </div>
    </form>

        <table class="w-full border-collapse border border-gray-200">
            <thead class="bg-[#0a2463] text-white">
                <tr>
                    <th class="py-3 px-4 text-left border border-gray-200">No</th>
                    <th class="py-3 px-4 text-left border border-gray-200">Kode Paket</th>
                    <th class="py-3 px-4 text-left border border-gray-200">Nama Paket</th>
                    <th class="py-3 px-4 text-left border border-gray-200">Harga / Kg</th>
                    <th class="py-3 px-4 text-left border border-gray-200">Waktu Selesai (hari)</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                <?php
                $no = 1;
                while ($row = $result->fetch_assoc()) { ?>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 px-4 border border-gray-200"><?= $no++; ?></td>
                        <td class="py-3 px-4 border border-gray-200"><?= htmlspecialchars($row['kode_paket']); ?></td>
                        <td class="py-3 px-4 border border-gray-200"><?= htmlspecialchars($row['nama_paket']); ?></td>
                        <td class="py-3 px-4 border border-gray-200"> <?php echo 'Rp. ' . number_format($row['harga_per_kilo'], 0, ',', '.'); ?></td>
                        <td class="py-3 px-4 border border-gray-200"><?= $row['waktu_selesai']; ?> hari</td>
                    </tr>
                <?php } ?>

                <?php
                    if (isset($_GET['hapus'])) {

                        $id = $_GET['hapus'];
                        mysqli_query($conn, "DELETE FROM tbl_paket WHERE kode_paket = '$id'");

                        echo "<div class='bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative' role='alert'>
                                    <strong class='font-bold'>Berhasil!</strong>
                                        <span class='block sm:inline'>Karyawan berhasil ditambahkan.</span>
                                            <button onclick='this.parentElement.style.display=\"none\";' class='absolute top-0 bottom-0 right-0 px-4 py-3'>
                                                &times;
                                            </button>
                                </div>";
                        echo "<meta http-equiv='refresh' content='2; URL=?page=tbl_paket'>";
                    } 
                    ?>
            </tbody>
        </table>
    </div>
</div>


