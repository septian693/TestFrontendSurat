<!-- list-surat.php -->
<?php

$letters = session('letters') ?? [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="{{ asset('css/detailview.css') }}" />
   <link rel="stylesheet" href="{{ asset('cssUser/userbootstrap.min.css') }}" />
   <link rel="stylesheet" href="{{ asset('cssUser/userdataTables.bootstrap5.min.css') }}" />
   <link rel="stylesheet" href="css/bootstrap.min.css" />

   <title>List Daftar Surat</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   <div class="container">
      <!-- Mengubah posisi tombol kembali ke kiri -->
      <a href="{{ route('user.dashboard') }}">
         <i class="fa-solid fa-arrow-left" style="color: #0080c0;"></i> Back
      </a>
   </div>
</nav>

<div class="container mt-5 mb-4 container-header">
   <h2 class="text-center">Lacak Surat</h2>
   
   <div class="table-responsive">
      <table class="table table-bordered table-hover">
         <thead>
            <tr>
               <th>Nama</th>
               <th>NIM</th>
               <th>Isi Surat</th>
               <th>Status</th>
               <th>Tanggal Pembuatan</th>
            </tr>
         </thead>
         <tbody>
            <?php foreach ($letters as $letter): ?>
               <tr class="table-light">
                  <td><?= $letter['name']; ?></td>
                  <td><?= $letter['nim']; ?></td>
                  <td><?= $letter['pilihanSurat']; ?></td>
                  <td><?= $letter['status']; ?></td>
                  <td><?= $letter['created_at']; ?></td>
               </tr>
            <?php endforeach; ?>
         </tbody>
      </table>
   </div>
</div>
<footer class="text-center mt-5 mb-3 text-muted">
   &copy; 2023 Sanata Dharma - WebsiteSurat
</footer>

<script src="./js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/cc52547201.js" crossorigin="anonymous"></script>
</body>
</html>