<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />

  <link rel="stylesheet" href="{{ asset('cssUser/userbootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('cssUser/userdataTables.bootstrap5.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('cssUser/userstyle.css') }}" />
  <title>Surat Menyurat Sanata Dharma</title>
</head>

<body>
  <!-- top navigation bar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-red fixed-top">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar"
        aria-controls="offcanvasExample">
        <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
      </button>
      <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold" href="#">
        <img id="navbar-logo" src="{{ asset('image/logo_usd.png') }}" alt="Logo" />
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNavBar"
        aria-controls="topNavBar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="topNavBar">
        {{-- Form --}}
        <form id="logout-form" method="post" class="d-flex ms-auto my-3 my-lg-0">
        </form>
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle ms-2"
              href="#"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              <i class="bi bi-person-fill"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <form method="POST" action="{{ route('user.logout', ['id' => session('id_user')]) }}" >
                  @csrf
                  <button type="submit" class="dropdown-item">Logout</button>
                </form>
                
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- top navigation bar -->
  <!-- offcanvas -->
  <div class="offcanvas offcanvas-start sidebar-nav bg-dark" tabindex="-1" id="sidebar">
    <div class="offcanvas-body p-0">
      <nav class="navbar-dark">
        <ul class="navbar-nav">
          <li>
            <a href="#" class="nav-link px-3 active">
              <span class="me-2"><i class="bi bi-speedometer2"></i></span>
              <span>Surat Permohonan</span>
            </a>
          </li>
          <li class="my-4">
            <hr class="dropdown-divider bg-light" />
          </li>
          <li>
            <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
              Menu
            </div>
          </li>
          <li>
            <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#layouts">
              <span class="me-2"><i class="bi bi-layout-split"></i></span>
              <span>Lacak</span>
              <span class="ms-auto">
                <span class="right-icon">
                  <i class="bi bi-chevron-down"></i>
                </span>
              </span>
            </a>
            <div class="collapse" id="layouts">
              <ul class="navbar-nav ps-3">
                <li>
                  <a href="{{ route('user.lacak') }}" class="nav-link px-3">
                    <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                    <span>Status Surat</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="my-4">
            <hr class="dropdown-divider bg-light" />
          </li>
          <li></li>
        </ul>
      </nav>
    </div>
  </div>
  <!-- offcanvas -->
  <div class="form-container">
    <h2>Form Permohonan</h2>
    @if(count($errors) > 0)
    {{ $errors }}
    @endif
      <div class="form-group">
        <label for="name">Nama:</label>
        <input type="text" form="form-permohonan"  id="name" name="name" required>
      </div>

      <div class="form-group">
        <label for="NIM">NIM:</label>
        <input type="text" form="form-permohonan"  id="nim" name="nim" required>
      </div>

      <div class="form-group">
        <label for="NoTelepon">Nomor Telepon:</label>
        <input type="text" form="form-permohonan"  id="nomorTelepon" name="nomorTelepon" required>
      </div>

      <div class="form-group">
        <label for="pilihanSurat">Pilihan Surat:</label>
        <select form="form-permohonan"  id="pilihanSurat" name="pilihanSurat" onchange="showAdditionalFields()" required>
          <option value="" disabled selected>Pilih Surat</option>
          <option value="Surat Berhenti Studi">Surat Berhenti Studi</option>
          <option value="Surat Cuti">Surat Cuti</option>
          <option value="Surat Aktif Studi">Surat Aktif Studi</option>
        </select>
      </div>
  
      <div class="form-group" id="additionalFields" style="display: none;">
        <!-- Additional fields for Surat Berhenti Studi -->
        <div id="additionalFieldsSurat1">

          <div class="form-group">
            <label for="pilihanProdi">Program Studi:</label>
            <select form="form-permohonan"   id="pilihanProdi" name="pilihanProdi" required>
              <option value="prodiIF">Program Studi Informatika</option>
              <option value="prodiMesin">Program Studi Teknik Mesin</option>
              <option value="prodiTE">Program Studi Teknik Elektro</option>
            </select>
          </div>
  
          <label for="semester">Semester:</label>
          <input type="text" form="form-permohonan"  id="semester" name="additionalFieldsSurat1">
        </div>
  
        <!-- Additional fields for Surat Cuti -->
        <div id="additionalFieldsSurat2" style="display: none;">
          <label for="semester">Semester:</label>
          <input type="text" form="form-permohonan"  id="semester" name="additionalFieldsSurat2">
  
          
          <div class="form-group">
            <label for="pilihanProdi">Program Studi:</label>
            <select form="form-permohonan"  id="pilihanProdi" name="pilihanProdi" required>
              <option value="prodiIF">Program Studi Informatika</option>
              <option value="prodiMesin">Program Studi Teknik Mesin</option>
              <option value="prodiTE">Program Studi Teknik Elektro</option>
            </select>
          </div>
  
          <label for="cuti">Cuti Studi Yang Ke:</label>
          <input type="text" form="form-permohonan"  id="cuti" name="cuti">
        </div>
  
        <!-- Additional fields for Surat Aktif Studi -->
        <div id="additionalFieldsSurat3" style="display: none;">
          
          <div class="form-group">
            <label for="pilihanProdi">Program Studi:</label>
            <select form="form-permohonan" id="pilihanProdi" name="pilihanProdi" required>
              <option value="prodiIF">Program Studi Informatika</option>
              <option value="prodiMesin">Program Studi Teknik Mesin</option>
              <option value="prodiTE">Program Studi Teknik Elektro</option>
            </select>
          </div>>
  
          <label for="semester">Semester:</label>
          <input type="text" form="form-permohonan" id="semester" name="additionalFieldsSurat3">
        </div>
      </div>

      <div class="form-group">
        <label for="message">Isi:</label>
        <textarea id="isiSurat" form="form-permohonan" name="isiSurat" rows="4" required></textarea>
      </div>

      <div class="form-group">
        <form method="POST" id="form-permohonan" action="{{ route('user.permohonan')}}">
          @csrf
          <button type="submit">Submit</button>
        </form> 
      </div>
    
    <script src="{{ asset('jsUser/bootstrap.bundle.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="{{ asset('jsUser/jquery-3.5.1.js')}}"></script>
    <script src="{{ asset('jsUser/script.js')}}"></script>
</body>

</html>