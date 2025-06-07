    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <!-- Library untuk cetak PDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    </head>


    <body>
        <?php
        include "../koneksi.php";
        session_start();
        if (!isset($_SESSION['name']) || !isset($_SESSION['role'])) {
            header("Location: login.php");
            exit();
        }
        ?>

        <?php include "partial/siidebar.php"; ?>

        <div class="flex flex-col">
            <?php include "partial/main.php"; ?>

        </div>

        </div>

        <script>
            // js print 
  



            // Dropdown dasboard
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




            // Dropdown kelola
            function toggleDropdown() {
                document.getElementById("dropdownMenu").classList.toggle("hidden");
            }

            // Menutup dropdown jika klik di luar
            document.addEventListener("click", function(event) {
                let dropdown = document.getElementById("dropdownMenu");
                if (!event.target.closest(".relative")) {
                    dropdown.classList.add("hidden");
                }
            });

            // Logout js

            function logoutModal() {
                document.getElementById('logoutModal').classList.remove('hidden');
            }

            function logoutcloseModal() {
                document.getElementById('logoutModal').classList.add('hidden');
            }





        </script>
<script>
    
    document.addEventListener("DOMContentLoaded", function () {
    window.generatePDF = function () {
        const element = document.getElementById('invoice');

        const opt = {
            margin:       0.5,
            filename:     'invoice_<?= $transaksi['id_transaksi'] ?>.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2 },
            jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' }
        };

        // Buat PDF lalu tampilkan di tab baru
        html2pdf().from(element).set(opt).outputPdf('bloburl').then(function(pdfUrl) {
            window.open(pdfUrl, '_blank');
        });
    };
});
</script>
    </body>

    </html>