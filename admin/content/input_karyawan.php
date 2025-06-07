<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $almt = $_POST['alamat'];
  $tlp = $_POST['telepon'];
  $email = $_POST['email'];
  $password = hash('sha256', $_POST['password']);
  $role = 'karyawan';

  if ($conn->query("INSERT INTO users (name, email, password, role, alamat, telepon) VALUES ('$name', '$email', '$password', '$role' , '$almt', '$tlp')")) {
    echo "<div class='bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative' role='alert'>
                <strong class='font-bold'>Berhasil!</strong>
                <span class='block sm:inline'>Karyawan berhasil ditambahkan.</span>
                <button onclick='this.parentElement.style.display=\"none\";' class='absolute top-0 bottom-0 right-0 px-4 py-3'>
                    &times;
                </button>
              </div>";
    echo "<meta http-equiv='refresh' content='2; URL=?page=kelola_karyawan'>";
  } else {
    echo "<div class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role='alert'>
                <strong class='font-bold'>Gagal!</strong>
                <span class='block sm:inline'>Data tidak berhasil disimpan.</span>
                <button onclick='this.parentElement.style.display=\"none\";' class='absolute top-0 bottom-0 right-0 px-4 py-3'>
                    &times;
                </button>
              </div>";
  }
}

?>
<div class="w-full  bg-white rounded-lg shadow-lg p-6">
  <h2 class="text-2xl font-bold text-[#0a2463] mb-6 text-center">Tambah Karyawan</h2>

  <form method="post" class="space-y-4">
    <div class="form-group">
      <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama:</label>
      <input type="text" id="name" name="name" required
        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#0a2463] focus:border-[#0a2463]">
    </div>

    <div class="form-group">
      <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat:</label>
      <input type="text" id="alamat" name="alamat" required
        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#0a2463] focus:border-[#0a2463]">
    </div>

    <div class="form-group">
      <label for="telepon" class="block text-sm font-medium text-gray-700 mb-1">Telepon:</label>
      <input type="tel" id="telepon" name="telepon" required
        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#0a2463] focus:border-[#0a2463]">
    </div>

    <div class="form-group">
      <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email:</label>
      <input type="email" id="email" name="email" required
        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#0a2463] focus:border-[#0a2463]">
    </div>

    <div class="form-group">
      <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password:</label>
      <input type="password" id="password" name="password" required
        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#0a2463] focus:border-[#0a2463]">
    </div>

    <div class="mt-6 flex gap-4">
      <button type="submit"
        class="w-full bg-[#0a2463] hover:bg-[#0a2463]/90 text-white font-medium py-2 px-4 rounded-md transition duration-300 focus:outline-none focus:ring-2 focus:ring-[#0a2463] focus:ring-opacity-50">
        Tambah
      </button>
    </div>
    <div class="mt-8 flex justify-end">
      <a href="?page=kelola_karyawan" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700/80 transition-colors duration-300 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        Kembali
      </a>
    </div>
  </form>
</div>