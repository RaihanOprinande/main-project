<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Sepatu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #000; /* Hitam */
            color: #fff; /* Putih */
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .register-box {
            background-color: #222; /* Abu gelap */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .register-box h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            letter-spacing: 1px;
            color: #fff;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            font-size: 14px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #555;
            border-radius: 5px;
            background-color: #333;
            color: #fff;
            font-size: 14px;
        }
        .form-group input::placeholder {
            color: #aaa;
        }
        .form-group input:focus {
            outline: none;
            border-color: #fff;
        }
        .btn-register {
            width: 100%;
            padding: 10px;
            background-color: #444;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .btn-register:hover {
            background-color: #666;
        }
        .link-login {
            margin-top: 15px;
            display: block;
            text-align: center;
            font-size: 14px;
            color: #aaa;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .link-login:hover {
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="register-box">
            <h1>Register</h1>
            <form action="/register" method="POST">
                @csrf
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" id="name" name="name" placeholder="Masukkan nama lengkap" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Masukkan email" required>
                </div>
                <div class="form-group">
                    <label for="nohp">No HP</label>
                    <input type="tel" id="phone" name="nohp" placeholder="Masukkan nomor HP" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" id="address" name="alamat" placeholder="Masukkan alamat" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan password" required>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Ulangi password" required>
                </div>

                <button type="submit" class="btn-register">Daftar</button>
            </form>
            <a href="/loginpelanggan" class="link-login">Sudah punya akun? Login</a>
        </div>
    </div>
</body>
</html>
