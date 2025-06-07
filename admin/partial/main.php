<div class="flex-1 ml-[244px] bg-[#f8f9fa]">
    <div class="p-6">
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold text-gray-800">Welcome to Dashboard <?php echo ucfirst($_SESSION['role']); ?></h1>

            <div class="flex items-center gap-4">
                <button class="p-2 bg-white rounded-full shadow-md hover:bg-gray-100 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                </button>

                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 rounded-full bg-[#0a2463] flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-800"><?php echo $_SESSION['name']; ?></p>
                        <p class="text-xs text-gray-500"><?php echo ucfirst($_SESSION['role']); ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-4 gap-6 mt-6">
            <a href="?page=kelola_transaksi">
            <div class="bg-[#1e3a8a] p-6 rounded-lg h-[150px] shadow-lg transform hover:scale-105 transition-transform duration-300">
                <h3 class="text-lg font-semibold text-white">Total Order</h3>
                <?php
                $query = mysqli_query($conn, "SELECT id_transaksi FROM tbl_transaksi ORDER BY id_transaksi");
                $row = mysqli_num_rows($query);

                echo ' <p class="text-3xl font-bold text-white mt-4">' . $row . '</p>';
                ?>
            </div>
            </a>


            <!-- php untuk mentotal semua orderan pelanggan -->
            <?php
            $query = mysqli_query($conn, "SELECT SUM(total_harga) as total FROM tbl_transaksi WHERE status_pembayaran = 'Lunas'");
            $data = mysqli_fetch_assoc($query);
            $total_pendapatan = $data['total'];
            ?>

            <div class="bg-[#003366] p-6 rounded-lg h-[150px] shadow-lg transform hover:scale-105 transition-transform duration-300">
                <h3 class="text-lg font-semibold text-white">Pendapatan</h3>
                <p class="text-3xl font-bold text-white mt-4">Rp <?= number_format($total_pendapatan, 0, ',', '.') ?></p>
            </div>
            <a href="?page=kelola_karyawan">
            <div class="bg-[#0a2463] p-6 rounded-lg h-[150px] shadow-lg transform hover:scale-105 transition-transform duration-300">
                <h3 class="text-lg font-semibold text-white">Karyawan</h3>
                <?php
                $query = mysqli_query($conn, "SELECT id FROM users WHERE role = 'karyawan' ORDER BY id");
                $row = mysqli_num_rows($query);

                echo ' <p class="text-3xl font-bold text-white mt-2">' . $row . '</p>';
                ?>
            </div>
            </a>
        <a href="?page=tbl_paket">
            <div class="bg-[#0a2463] p-6 rounded-lg h-[150px] shadow-lg transform hover:scale-105 transition-transform duration-300">
                <h3 class="text-lg font-semibold text-white">Jumlah Paket Tersedia</h3>
                <?php
                $query = mysqli_query($conn, "SELECT id_paket FROM tbl_paket ORDER BY id_paket");
                $row = mysqli_num_rows($query);

                echo ' <p class="text-3xl font-bold text-white mt-4">' . $row . '</p>';
                ?>
            </div>
            </a>
        </div>



        <main class="w-full">

            <div class=" ">
                <?php


if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'home'; // default ke halaman home
}

switch ($page) {
    case 'home':
        include "partial/tampilan.php";
        break;
    case 'kelola_karyawan':
        include "content/tbl_karyawan.php";
        break;
    case 'edit_karyawan':
        include "content/edit_karyawan.php";
        break;
    case 'input_karyawan':
        include "content/input_karyawan.php";
        break;
    case 'view_karyawan':
        include "content/view_karyawan.php";
        break;
    case 'kelola_paket':
        include "content/kelola_transaksi/kelola_paket.php";
        break;
    case 'input_transaksi':
        include "content/kelola_transaksi/input_transaksi.php";
        break;
    case 'kelola_transaksi':
        include "content/kelola_transaksi/kelola_transaksi.php";
        break;
    case 'view_transaksi':
        include "content/kelola_transaksi/view_transaksi.php";
        break;
    case 'tbl_paket':
        include "content/kelola_transaksi/tbl_paket.php";
        break;
    case 'edit_paket':
        include "content/kelola_transaksi/edit_paket.php";
        break;
    case 'history_pemesanan':
        include "content/kelola_transaksi/history.php";
        break;
    case 'cetak_invoice':
        include "content/kelola_transaksi/cetak_invoice.php";
        break;
    default:
        echo "<h2 class='text-red-500 font-semibold'>Halaman Tidak Ditemukan</h2>";
        break;
}

                ?>
        </main>
    </div>
</div>