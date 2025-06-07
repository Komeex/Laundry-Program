    <aside class="flex flex-col w-[244px] h-screen fixed bg-[#0a2463] border-r-2 border-[#1e3a8a] items-center">
    <div class="p-6 mb-2">
    </div>
    <nav class="px-4">
        <div class="space-y-2 w-64">
            <div class="flex flex-col h-screen">
                <!-- Bagian Atas: Logo & Menu -->
                <div class="flex-1">
                    <div class="pr-8 p-6 mb-12 flex justify-center">
                        <a href="index.php">
                            <img src="../assets/Logo2.png" alt="Logo" class="w-32 h-auto object-contain">
                        </a>
                    </div>

                    <div id="dashboard-toggle" class="flex items-center gap-3 p-3 rounded-lg hover:bg-[#1e3a8a] cursor-pointer group transition px-6 text-white">
                        <svg class="w-5 h-5 rotate-90 group-hover:rotate-0 transition duration-300" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                        </svg>
                        <span class="font-medium">Dashboard</span>
                        <svg id="dropdown-arrow" class="w-4 h-4 ml-auto transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </div>

                    <div id="dropdown-content" class="hidden ml-8 space-y-1 mt-1">
                        <div class="relative">
                            <div onclick="toggleDropdown()" class="flex justify-around items-center gap- p-2 rounded-lg hover:bg-[#1e3a8a] cursor-pointer group transition  text-white">
                                <span class="text-white">Kelola Pelanggan</span>
                                <svg id="dropdown-arrow" class="w-4 h-4 ml-auto rotate-0 group-hover:rotate-90 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </div>
                            <div id="dropdownMenu" class="absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-lg hidden">
<!-- ------------------ -->
                                <a href="?page=kelola_transaksi" class="flex items-center justify-around gap-4 px-4 py-2 text-gray-700 hover:bg-gray-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 0 1-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0 1 12 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" />
                                    </svg>
                                    Tbl Pelanggan
                                </a>
<!-- ------------------ -->
                                <a href="?page=input_transaksi" class="flex items-center justify-around gap-4 px-4 py-2 text-gray-700 hover:bg-gray-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                    </svg>
                                    Transaksi</a>
                                    
                            </div>
                        </div>

                        <div class="flex items-center gap-3 p-2 rounded-lg hover:bg-[#1e3a8a] cursor-pointer text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0ZM3.75 12h.007v.008H3.75V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm-.375 5.25h.007v.008H3.75v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>
                            <span class="text-white"><a href="?page=tbl_paket">Kelola paket</a></span>
                        </div>

                        <div class="flex items-center gap-3 p-2 rounded-lg hover:bg-[#1e3a8a] cursor-pointer text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                            </svg>
                            <span class="text-white"><a href="?page=kelola_karyawan">Kelola Karyawan</a></span>
                        </div>

                         <div class="flex items-center gap-3 p-2 rounded-lg hover:bg-[#1e3a8a] cursor-pointer text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0 1 20.25 6v12A2.25 2.25 0 0 1 18 20.25H6A2.25 2.25 0 0 1 3.75 18V6A2.25 2.25 0 0 1 6 3.75h1.5m9 0h-9" />
                                </svg>

                                <span class="text-white"><a href="?page=history_pemesanan">History Pesanan</a></span>
                            </div>


                    </div>
                </div>

                <!-- Bagian Logout di Bawah -->
                <div class="p-6">
                    <!-- Tombol Logout -->
                    <a href="#" onclick="logoutModal()"
                        class="block font-semibold text-white p-3 pr-2 rounded-lg hover:bg-red-600 hover:text-white transition bg-[#d90429] pb-12 justify-center">
                        Logout
                    </a>

                </div>
            </div>
        </div>
    </nav>
</aside>



<!-- Overlay (Background Gelap) -->
<div id="logoutModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center">
    <!-- Modal Box -->
    <div class="bg-white rounded-lg p-6 shadow-lg w-96 text-center">
        <h2 class="text-xl font-semibold mb-4">Konfirmasi Logout</h2>
        <p class="text-gray-600">Apakah Anda yakin ingin logout?</p>
        <div class="mt-6 flex justify-center gap-4">
            <button onclick="logoutcloseModal()" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md">Batal</button>
            <a href="../logout.php" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">Logout</a>
        </div>
    </div>
</div>

<?php
