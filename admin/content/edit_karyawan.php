<?php 
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID karyawan tidak ditemukan.");
}

$id = $_GET['id'];

$ambildata = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");
$data = mysqli_fetch_assoc($ambildata);

if (!$data) {
    die("Data karyawan tidak ditemukan.");
}
?>


<?php
if (isset($_POST['proses'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    if (!empty($_POST['password'])) {
        $password = hash('sha256', $_POST['password']);
        $query = "UPDATE users SET name=?, email=?, password=?, role=? WHERE id=?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ssssi", $name, $email, $password, $role, $id);
    } else {
        $query = "UPDATE users SET name=?, email=?, role=? WHERE id=?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "sssi", $name, $email, $role, $id);
    }

    $execute = mysqli_stmt_execute($stmt);

    echo $execute
        ? "<div class='bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative' role='alert'>
                <strong class='font-bold'>Berhasil!</strong>
                <span class='block sm:inline'>Karyawan berhasil ditambahkan.</span>
                <button onclick='this.parentElement.style.display=\"none\";' class='absolute top-0 bottom-0 right-0 px-4 py-3'>
                    &times;
                </button>
              </div>"
        : "<div class='alert alert-danger'>Data gagal disimpan! Error: " . mysqli_error($conn) . "</div>";

    echo "<meta http-equiv='refresh' content='2; URL=?page=kelola_karyawan'>";
}
?>


<div class="flex justify-center">
<div class="w-full bg-white rounded-lg shadow-lg p-6 mt-3">
    <h2 class="text-2xl font-bold text-[#0a2463] mb-6 text-center">Edit Karyawan</h2>
    
    <form method="post" class="space-y-4">
      <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
      
      <div class="form-group">
        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($data['name']); ?>" required 
               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#0a2463] focus:border-[#0a2463]">
      </div>
      
      <div class="form-group">
        <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat:</label>
        <input type="text" id="alamat" name="alamat" value="<?php echo htmlspecialchars($data['alamat']); ?>" required 
               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#0a2463] focus:border-[#0a2463]">
      </div>
      
      <div class="form-group">
        <label for="telepon" class="block text-sm font-medium text-gray-700 mb-1">Telepon:</label>
        <input type="text" id="telepon" name="telepon" value="<?php echo htmlspecialchars($data['telepon']); ?>" required 
               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#0a2463] focus:border-[#0a2463]">
      </div>
      
      <div class="form-group">
        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($data['email']); ?>" required 
               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#0a2463] focus:border-[#0a2463]">
      </div>
      
      <div class="form-group">
        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password:</label>
        <input type="password" id="password" name="password" 
               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#0a2463] focus:border-[#0a2463]">
      </div>
      
      <div class="form-group">
        <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Role:</label>
        <input readonly type="text" id="role" name="role" value="<?php echo htmlspecialchars($data['role']); ?>" required 
               class="w-full px-3 py-2 bg-gray-100 border border-gray-300 rounded-md cursor-not-allowed">
      </div>
      
      <div class="mt-6">
        <button type="submit" name="proses" 
                class="w-full bg-[#0a2463] hover:bg-[#0a2463]/90 text-white font-medium py-2 px-4 rounded-md transition duration-300 focus:outline-none focus:ring-2 focus:ring-[#0a2463] focus:ring-opacity-50">
          Simpan Perubahan
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
  </div>

