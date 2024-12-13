<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Tambahan CSS -->
    <style>
        :root{
            --bg-1: #1A4D2E;
            --bg-2: #4F6F52;
            --color-text: #F5EFE6;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            background: var(--bg-1);
        }

        .login-container {
            display: flex;
            width: 1200px;
            background: #fff;
            color: #000;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        .left-container {
            flex: 1;
            overflow: hidden;
        }

        .left-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .right-container {
            flex: 1;
            padding: 40px;
        }

        .login-form {
            max-width: 400px;
            margin: 0 auto;
        }

        .login-form h2 {
            text-align: center;
        }

        .login-form p span{
            color: var(--bg-2);
        }

        .login-form label {
            display: block;
            margin-bottom: 8px;
        }

        .login-form input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: none;
            border-bottom: 1px solid #ccc;
            outline: none;
        }

        .login-form .btn {
            width: 100%;
            padding: 10px;
            background-color: var(--bg-2);
            color: var(--color-text);
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .login-form .btn:hover{
            background-color: var(--bg-1);
        }

        .register-link {
            text-align: center;
            margin-top: 10px;
        }

        .register-link a {
            color: var(--bg-2);
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="left-container">
            <img src="assets/images/regis-pasien.jpg" alt="Login Image">
        </div>
        <div class="right-container">
            <div class="login-form">
                <br><br><br>
                <h4 class="text-center">Registrasi Disini </h4>
                <p class="login-box-msg text-center">Data Diri <span>Pasien</span> </p>
                <form action="pages/register/checkRegister.php" method="post">
                    <label for="nama">Nama :</label>
                    <input type="text" class="form-control" name="nama" required>

                    <label for="no_hp">Nomor KTP :</label>
                    <input type="number" class="form-control" name="no_ktp" required>

                    <label for="no_hp">Alamat :</label>
                    <input class="form-control" id="alamat" name="alamat" required></input>

                    <label for="no_hp">Nomor Handphone :</label>
                    <input type="number" class="form-control" name="no_hp" required>

                    <button type="submit" class="btn">
                        Buat Akun
                    </button>
                </form>

            </div>
            <div class="text-center mt-3 register-link">
                <p>Sudah punya akun?</p>
                <a href="loginUser.php">
                    Login
                </a>
            </div>
        </div>
    </div>
</body>
</html>