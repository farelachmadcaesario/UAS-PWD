<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Fleet Management</title>
    <link rel="stylesheet" href="aset/style.css">
    <style>
        body {
            background: #003366;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-card {
            background: white;
            padding: 2.5rem;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .login-card h2 { margin-bottom: 1.5rem; color: #333; }
        .form-group { margin-bottom: 1rem; text-align: left; }
        .form-group input { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; }
        .btn-login {
            background: #28a745;
            color: white;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            margin-top: 10px;
        }
        .btn-login:hover { background: #218838; }
    </style>
</head>
<body>

    <div class="login-card">
        <div style="font-size: 3rem; margin-bottom: 10px;"></div>
        <h2>Fleet Login</h2>
        
        <form action="cek_login.php" method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" placeholder="Masukan username" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Masukan password" required>
            </div>
            <button type="submit" class="btn-login" name="login">Masuk Sistem</button>
        </form>
    </div>

</body>
</html>