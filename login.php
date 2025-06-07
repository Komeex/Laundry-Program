<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
<?php
session_start();

include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email='$email'");
    $user = $result->fetch_assoc();

    if ($user && hash('sha256', $password) === $user['password']) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];  
        $_SESSION['telepon'] = $user['no_hp'];
        $_SESSION['role'] = $user['role'];  

        if ($user['role'] == 'admin') {
            header("Location: admin/index.php");
        } else {
            header("Location: karyawan/index.php");
        }
        exit;
    } else {
        echo "<script>alert('Login gagal. Periksa email dan password.'); window.location.href='login.php';</script>";
    }
    
}

?>
    <div>
        <img class="object-cover h-screen w-screen fixed -z-40" src="assets/bg-login.png" alt="">
    </div>


    <div class="min-h-screen flex items-center justify-center">
        <div class="max-w-5xl w-full p-6 flex flex-col md:flex-row bg-white p-22 gap-4 rounded-[20px]">
            <div class="w-full md:w-1/2 flex flex-col justify-center p-8">
                <h1 class="text-3xl font-medium text-gray-800 mb-6">Welcome to Aura Laundry</h1>
                <p class="text-gray-600 mb-8">To keep connected with us, please login with your email and password <span class="text-amber-600">🔒</span></p>
                <?php if (!empty($error)) : ?>
                    <p class="text-red-500 text-center"><?= $error ?></p>
                <?php endif; ?>
                <form class="space-y-4" method="POST">
                    <div class="relative">
                        <div class="flex items-center">
                            <div class="bg-gray-100 p-3 rounded-l-md">
                                <i class="far fa-envelope text-gray-400"></i>
                            </div>
                            <div class="relative flex-1">
                                <label for="email" class="text-xs text-gray-500 absolute top-1 left-2">Email Address</label>
                                <input id="email" type="email" name="email" required class="w-full border border-gray-200 rounded-r-md p-3 pt-5 outline-none" />
                            </div>
                        </div>
                    </div>
                    <div class="relative">
                        <div class="flex items-center">
                            <div class="bg-gray-100 p-3 rounded-l-md">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <div class="relative flex-1">
                                <label for="password" class="text-xs text-gray-500 absolute top-1 left-2">Password</label>
                                <input id="password" type="password" name="password" required class="w-full border border-gray-200 rounded-r-md p-3 pt-5 outline-none" />
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col space-y-3 sm:flex-row sm:space-y-0 sm:space-x-3 pt-8">
                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition">Login Now</button>
                    </div>
                </form>
            </div>
            <div class="w-full md:w-1/2 flex items-center justify-center">
                <img src="assets/img login.webp" alt="Illustration" class="mt-12">
            </div>
        </div>
    </div>




</body>

</html>