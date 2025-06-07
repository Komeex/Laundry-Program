<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Laundry</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0a2463',
                        secondary: '#3e92cc',
                        accent: '#e5eef7',
                        light: '#f2f7fc'
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 p-4">
    <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
        <!-- Header -->
        <div class="bg-primary px-6 py-4">
            <div class="flex justify-between items-center">
                <div class="text-white">
                    <h1 class="text-2xl font-bold">CLEAN LAUNDRY</h1>
                    <p class="text-sm opacity-80">Bersih, Wangi, Cepat</p>
                </div>
                <div class="relative">
                    <div class="bg-white rounded-full p-2 h-12 w-12 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L5.595 15.1a2 2 0 00-.547 3.977l2.387.477a6 6 0 003.86-.517l.318-.158a6 6 0 013.86-.517l2.387.477a2 2 0 001.022.547 2 2 0 001.022-3.977z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Invoice Info -->
        <div class="bg-accent px-6 py-3 flex justify-between items-center">
            <div>
                <p class="text-sm text-gray-600">No. Invoice</p>
                <p class="font-bold text-primary">#LD-20250404-057</p>
            </div>
            <div class="text-right">
                <p class="text-sm text-gray-600">Tanggal</p>
                <p class="font-medium">04 April 2025</p>
            </div>
        </div>

        <!-- Customer Info -->
        <div class="border-b px-6 py-4">
            <h3 class="text-primary font-semibold mb-2">Detail Pelanggan</h3>
            <div class="grid grid-cols-2 gap-2">
                <div>
                    <p class="text-sm text-gray-600">Nama</p>
                    <p class="font-medium">Budi Santoso</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">No. HP</p>
                    <p class="font-medium">0812-3456-7890</p>
                </div>
                <div class="col-span-2">
                    <p class="text-sm text-gray-600">Alamat</p>
                    <p class="font-medium">Jl. Merdeka No. 123, Jakarta Selatan</p>
                </div>
            </div>
        </div>

        <!-- Order Details -->
        <div class="px-6 py-4">
            <h3 class="text-primary font-semibold mb-2">Detail Pesanan</h3>
            <div class="overflow-hidden rounded-lg border border-gray-200">
                <table class="w-full text-sm">
                    <thead class="bg-light">
                        <tr class="border-b border-gray-200">
                            <th class="py-2 px-3 text-left">Layanan</th>
                            <th class="py-2 px-3 text-center">Qty</th>
                            <th class="py-2 px-3 text-right">Harga</th>
                            <th class="py-2 px-3 text-right">Total</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            <td class="py-3 px-3">
                                <p class="font-medium">Cuci Setrika</p>
                                <p class="text-xs text-gray-500">Regular (2 hari)</p>
                            </td>
                            <td class="py-3 px-3 text-center">3 kg</td>
                            <td class="py-3 px-3 text-right">Rp 15,000</td>
                            <td class="py-3 px-3 text-right">Rp 45,000</td>
                        </tr>
                        <tr>
                            <td class="py-3 px-3">
                                <p class="font-medium">Dry Cleaning</p>
                                <p class="text-xs text-gray-500">Jas/Blazer</p>
                            </td>
                            <td class="py-3 px-3 text-center">1 pcs</td>
                            <td class="py-3 px-3 text-right">Rp 50,000</td>
                            <td class="py-3 px-3 text-right">Rp 50,000</td>
                        </tr>
                        <tr>
                            <td class="py-3 px-3">
                                <p class="font-medium">Cuci Sepatu</p>
                                <p class="text-xs text-gray-500">Deep Clean</p>
                            </td>
                            <td class="py-3 px-3 text-center">1 pair</td>
                            <td class="py-3 px-3 text-right">Rp 35,000</td>
                            <td class="py-3 px-3 text-right">Rp 35,000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Summary -->
        <div class="px-6 py-3 bg-light">
            <div class="flex justify-between items-center py-1">
                <span class="text-gray-600">Subtotal</span>
                <span class="font-medium">Rp 130,000</span>
            </div>
            <div class="flex justify-between items-center py-1">
                <span class="text-gray-600">Biaya Antar</span>
                <span class="font-medium">Rp 10,000</span>
            </div>
            <div class="flex justify-between items-center py-1">
                <span class="text-gray-600">Diskon Member</span>
                <span class="font-medium text-green-600">- Rp 13,000</span>
            </div>
            <div class="h-px bg-gray-300 my-2"></div>
            <div class="flex justify-between items-center py-1">
                <span class="font-bold text-primary">TOTAL</span>
                <span class="font-bold text-primary text-lg">Rp 127,000</span>
            </div>
        </div>

        <!-- Status -->
        <div class="px-6 py-4 border-t">
            <h3 class="text-primary font-semibold mb-2">Status Pesanan</h3>
            <div class="grid grid-cols-4 gap-2 text-center">
                <div class="relative">
                    <div class="bg-primary rounded-full h-8 w-8 mx-auto flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <p class="text-xs mt-1 font-medium text-primary">Diterima</p>
                </div>
                <div class="relative">
                    <div class="bg-primary rounded-full h-8 w-8 mx-auto flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <p class="text-xs mt-1 font-medium text-primary">Diproses</p>
                </div>
                <div class="relative">
                    <div class="bg-gray-300 rounded-full h-8 w-8 mx-auto flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <p class="text-xs mt-1 font-medium text-gray-500">Selesai</p>
                </div>
                <div class="relative">
                    <div class="bg-gray-300 rounded-full h-8 w-8 mx-auto flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </svg>
                    </div>
                    <p class="text-xs mt-1 font-medium text-gray-500">Diambil</p>
                </div>
                <div class="col-span-4 h-1 bg-gray-200 relative mt-2">
                    <div class="absolute left-0 top-0 h-1 bg-primary" style="width: 50%;"></div>
                </div>
            </div>
        </div>

        <!-- Details & Notes -->
        <div class="px-6 py-4 border-t">
            <div class="mb-4">
                <h3 class="text-primary font-semibold mb-1">Detail Pengambilan</h3>
                <p class="text-sm">Estimasi selesai: <span class="font-medium">6 April 2025</span></p>
            </div>
            <div>
                <h3 class="text-primary font-semibold mb-1">Catatan</h3>
                <p class="text-sm text-gray-600">Harap jangan gunakan pewangi yang terlalu kuat.</p>
            </div>
        </div>

        <!-- Footer -->
        <div class="bg-primary px-6 py-4 text-center">
            <p class="text-white text-sm">Terima kasih telah menggunakan jasa laundry kami!</p>
            <p class="text-xs text-accent opacity-80 mt-1">Jl. Soekarno Hatta No. 45, Jakarta | 021-12345678</p>
        </div>
    </div>
</body>
</html>