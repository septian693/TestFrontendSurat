<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
  <title>Halaman Login</title>
</head>

<body>
  <div class="login-container">
    <h2>Masuk ke Akun Anda</h2>
    <form action="/login" id="login-form" method="post">
      @csrf
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required /><br />

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required /><br />

      <button type="submit">Login</button>
    </form>

    <p id="error-message"></p>
  </div>

  {{-- <script src="{{ asset('jsUser/loginJs.js')}}"></script> --}}
</body>

</html>