<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
  <title>Halaman Register</title>
</head>

<body>
  <div class="login-container">
    <h2>Buat Akun Anda</h2>
    <form action="/register" id="register-form" method="post">
      @csrf
      <label for="name">name:</label>
      <input type="name" id="name" name="name" required /><br />

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required /><br />

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required /><br />

      {{-- <label for="prodi">prodi:</label>
      <input type="prodi" id="prodi" name="prodi" required /><br /> --}}

      <div class="form-group">
        <label for="prodi">Prodi:</label>
        <select id="prodi" name="prodi" required>
          <option value="prodiIF">Program Studi Informatika</option>
          <option value="prodiMesin">Program Studi Teknik Mesin</option>
          <option value="prodiTE">Program Studi Teknik Elektro</option>
        </select>
      </div>

      <label for="Role">role:</label>
      <input type="role" id="role" name="role" required /><br />

      <button type="submit">Register</button>
    </form>

    <p id="error-message"></p>
  </div>

  {{-- <script src="{{ asset('jsUser/loginJs.js')}}"></script> --}}
</body>

</html>