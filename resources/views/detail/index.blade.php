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
      <a href="{{ route('admin.dashboard') }}">
         <i class="fa-solid fa-arrow-left" style="color: #0080c0;"></i> Back
      </a>
   </div>
</nav>

<div class="container mt-5 mb-4 container-header">
   <h2 class="text-center">List Daftar Surat</h2>
   
   <div class="table-responsive">
      <table class="table table-bordered table-hover">
         <thead>
            <tr>
               <th>Nama</th>
               <th>NIM</th>
               <th>Isi Surat</th>
               <th>Status</th>
               <th>Preview Dokumen</th>
               <th>Action</th> <!-- Menambahkan kolom Action -->
            </tr>
         </thead>
         <tbody>
            <?php foreach ($letters as $letter): ?>
               <tr class="table-light">
                  <td><?= $letter['name']; ?></td>
                  <td><?= $letter['nim']; ?></td>
                  <td><?= $letter['pilihanSurat']; ?></td>
                  <td><?= $letter['status']; ?></td>
                  <td>
                     <!-- Form to submit data to GenerateSurat.php -->
                     <form action="{{ route('admin.generate') }}" method="post" target="_blank">
                        @csrf
                        <input type="hidden" name="id" value=" {{ $letter['id'] }}">
                        <button type="submit" class="btn btn-success"><i class="fa-solid fa-eye"></i></button>
                     </form>
                  </td>
                  <td>
                     @if($letter['status'] == 'Menunggu Tanda Tangan')
                     <!-- Tombol Menyetujui Surat -->
                     <form action="{{ route('admin.approv') }}" method="post" style="display:inline;">
                        @csrf
                        <input type="hidden" name="id" value=" {{ $letter['id'] }}">
                        <button type="submit" class="btn btn-success"><i class="fa-solid fa-check fa-fade" style="color: #00ff00;"></i></button>
                     </form>

                     <!-- Tombol Menolak Surat -->
                     <form action="{{ route('admin.reject') }}" method="post" style="display:inline;">
                        @csrf
                        <input type="hidden" name="id" value=" {{ $letter['id'] }}">
                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-xmark" style="color: #000000;"></i></button>
                     </form>
                     @endif
                  </td>
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