<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<style>
    @media print {

        @media print {
    body * {
        visibility: hidden;
    }

    #invoice, #invoice * {
        visibility: visible;
    }

    #invoice {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
    }

    .print\:hidden {
        display: none !important;
    }
}


  #invoice {
    width: 210mm;
    height: 297mm;
    overflow: hidden;
    page-break-after: always;
  }
}

</style>
<body>
<?php
        include "koneksi.php";
        session_start();
        if (!isset($_SESSION['name']) || !isset($_SESSION['role'])) {
            header("Location: login.php");
            exit();
        }
        ?>
    <div class="flex min-h-screen">
        <aside class="flex flex-col w-[244px] h-screen fixed bg-gradient-to-b from-[#79E4FD] to-[#C5F4FF] border-r-2 border-[#41DCFF] items-center">
            <div class="p-6 mb-2">
                <div class="flex items-center gap-2">
                    <img src="assets/Logo.png" alt="">
                </div>
            </div>

            <nav class="px-4 ">

                <div class="space-y-2 w-64">
                    <div>
                        <div id="dashboard-toggle" class="flex items-center gap-3 p-3 rounded-lg hover:bg-white/20 cursor-pointer group transition px-6 text-[#001879]">
                            <svg class="w-5 h-5 rotate-90 group-hover:rotate-0 transition duration-300" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                            </svg>
                            <span class="font-medium">Dashboard</span>
                            <svg id="dropdown-arrow" class="w-4 h-4 ml-auto transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>

                        <div id="dropdown-content" class="hidden ml-8 space-y-1 mt-1">
                            <div class="flex items-center gap-3 p-2 rounded-lg hover:bg-white/20 cursor-pointer">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span>Admin</span>
                            </div>

                            <div class="flex items-center gap-3 p-2 rounded-lg hover:bg-white/20 cursor-pointer">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                                <span>Karyawan</span>
                            </div>

                            <div class="flex items-center gap-3 p-2 rounded-lg hover:bg-white/20 cursor-pointer">
                                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                                </svg>
                                <span>Pemesanan</span>
                            </div>
                        </div>
                    </div>
            </nav>
        </aside>


        <main class="flex-1 ml-[244px] bg-white">

            <div class="p-6">
                <div class="flex justify-between items-center">
                    <h1 class="text-2xl font-bold">Welcome to Dasboard</h1>

                    <div class="flex items-center gap-4">
                        <button class="p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </button>

                        <div class="flex items-center gap-2">
                            <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-semibold">Ratna Maharolika</p>
                                <p class="text-xs text-gray-500">Admin</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-200 py-2 px-4 mt-6">
                    <div class="flex space-x-4">
                        <span>Running Teks</span>
                        <span>Running Teks</span>
                        <span>Running Teks</span>
                        <span>Running Teks</span>
                        <span>Running Teks</span>
                    </div>
                </div>

                <div class="grid grid-cols-3 gap-6 mt-6">
                    <div class="bg-gradient-to-b from-[#41DCFF] to-[#C5F4FF] p-6 rounded-lg h-[150px]">
                        <h3 class="text-lg font-semibold">Total Order</h3>
                        <p class="y-4 text-xl">0</p>
                    </div>

                    <div class="bg-gradient-to-b from-[#41DCFF] to-[#C5F4FF] p-6 rounded-lg h-[150px]">
                        <h3 class="text-lg font-semibold">Total Order</h3>
                        <p class="y-4 text-xl">0</p>
                    </div>

                    <div class="bg-gradient-to-b from-[#41DCFF] to-[#C5F4FF] p-6 rounded-lg h-[150px]">
                        <h3 class="text-lg font-semibold">Jumlah Paket Tersedia</h3>
                        <p class="y-4 text-xl">0</p>

                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dashboardToggle = document.getElementById('dashboard-toggle');
            const dropdownContent = document.getElementById('dropdown-content');
            const dropdownArrow = document.getElementById('dropdown-arrow');

            dashboardToggle.addEventListener('click', function() {
                dropdownContent.classList.toggle('hidden');

                if (dropdownContent.classList.contains('hidden')) {
                    dropdownArrow.classList.remove('rotate-90');
                } else {
                    dropdownArrow.classList.add('rotate-90');
                }
            });
        });
    </script>
</body>

</html>