<?php
session_start();
include('../config/connect.php'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email_username = $_POST['email_username'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = $db->prepare("SELECT id_user, username, level, password FROM user WHERE email = ? OR username = ?");
    $stmt->bind_param("ss", $email_username, $email_username); // "ss" karena 2 parameter string
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        // Verifikasi password yang di-hash
        if (password_verify($password, $user['password'])) {
            // Login Berhasil!
            // Simpan data pengguna ke dalam sesi
            $_SESSION['login'] = true;
            $_SESSION['id_user'] = $user['id_user'];
            $_SESSION['username'] = $user['username']; 
            $_SESSION['level'] = $user['level']; 
            
            // Redirect ke halaman dashboard
            header("Location: index.php"); 
            exit;
        } else {
            // Password salah
            $error = 'Email/Username atau Password salah.';
        }
    } else {
        // Pengguna tidak ditemukan
        $error = 'Email/Username atau Password salah.';
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maluku Trip - LOGIN</title>
    <style>
        /* CSS Anda tetap sama di sini */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            }

            body {
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
                height: 100vh;
                overflow: hidden;
            }

            .background {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-image: url('bg.jpg');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                z-index: -1;
            }

            .background::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.1);
            }

            .container {
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                padding: 20px;
            }

            /* HANYA PERLU MENGUBAH NAMA KELAS DI HTML, BUKAN DI CSS INI */
            .login-card { 
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(10px);
                border-radius: 24px;
                box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
                padding: 48px 40px;
                width: 100%;
                max-width: 440px;
                animation: slideUp 0.6s ease-out;
            }

            @keyframes slideUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .logo-container {
                display: flex;
                justify-content: center;
                margin-bottom: 24px;
            }

            .logo {
                width: 100px;
                height: 100px;
                border-radius: 50%;
                background-image: url('bg.jpg');
                background-size: cover;
                background-position: center;
                display: flex;
                align-items: center;
                justify-content: center;
                box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
                overflow: hidden;
                position: relative;
                border: 4px solid white;
            }

            h1 {
                text-align: center;
                color: #1f2937;
                font-size: 32px;
                margin-bottom: 32px;
                font-weight: 700;
            }

            .form-group {
                margin-bottom: 24px;
                /* Tambahkan transisi di sini untuk efek JS */
                transition: transform 0.3s ease; 
            }

            label {
                display: block;
                color: #4b5563;
                font-size: 14px;
                font-weight: 500;
                margin-bottom: 8px;
            }

            input {
                width: 100%;
                padding: 14px 16px;
                border: 2px solid #e5e7eb;
                border-radius: 12px;
                font-size: 16px;
                transition: all 0.3s ease;
                background: white;
            }

            input:focus {
                outline: none;
                border-color: #3b82f6;
                box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
            }

            input::placeholder {
                color: #9ca3af;
            }

            .login-btn {
                width: 100%;
                padding: 16px;
                background: #3b82f6;
                color: white;
                border: none;
                border-radius: 12px;
                font-size: 16px;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
                box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4);
                margin-top: 8px;
            }

            .login-btn:hover {
                background: #2563eb;
                transform: translateY(-2px);
                box-shadow: 0 6px 20px rgba(59, 130, 246, 0.5);
            }

            .login-btn:active {
                transform: translateY(0);
            }

            /* Ganti nama kelas .register-link menjadi .login-link */
            .login-link {
                text-align: center;
                margin-top: 24px;
                color: #6b7280;
                font-size: 14px;
            }

            .login-link a {
                color: #3b82f6;
                text-decoration: none;
                font-weight: 600;
            }

            .login-link a:hover {
                text-decoration: underline;
            }

            @media (max-width: 480px) {
                .login-card {
                    padding: 32px 24px;
                }

                h1 {
                    font-size: 28px;
                }
            }
    </style>
</head>
<body>
    <div class="background"></div>
    
    <div class="container">
        <div class="login-card"> 
            <div class="logo-container">
                <div class="logo"></div>
            </div>
            
            <h1>LOGIN</h1>

            <?php if (isset($error)) : ?>
                <p style="color: red; text-align: center; margin-bottom: 15px; background: #fee2e2; padding: 10px; border-radius: 8px;">
                    <?php echo $error; ?>
                </p>
            <?php endif; ?>

            <form action="" method="POST">
                <div class="form-group">
                    <label for="email_username">Email atau Username</label>
                    <input type="text" id="email_username" name="email_username" placeholder="Email atau Username" required 
                        value="<?= isset($email_username) ? htmlspecialchars($email_username) : ''; ?>">
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
                
                <button type="submit" class="login-btn">LOGIN</button>
            </form>
            
            <div class="register-link"> 
                Belum punya akun? <a href="register.php">Daftar di sini</a>
            </div>
        </div>
    </div>

    <script>
        // Script untuk efek transisi input saat focus/blur
        const inputs = document.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                // Mengubah parent element (.form-group) saat focus
                this.parentElement.style.transform = 'translateX(4px)';
            });
            
            input.addEventListener('blur', function() {
                // Mengembalikan parent element (.form-group) saat blur
                this.parentElement.style.transform = 'translateX(0)';
            });
        });
    </script>
</body>
</html>