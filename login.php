<?php
session_start();
include 'config/app.php';

if(isset($_POST['login'])){
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if(empty($username) || empty($password)){
        $error = "Username dan Password tidak boleh kosong";
    } else {
        // Cek apakah username terdaftar
        $query = mysqli_query($db, "SELECT * FROM user WHERE username='$username'");
        
        if(mysqli_num_rows($query) == 0){
            $error = "Username atau Password salah";
        } else {
            $user = mysqli_fetch_assoc($query);
            
            // Verifikasi password (gunakan password_verify jika menggunakan hashing)
            if($password === $user['password']){
                // Login berhasil
                $_SESSION['login'] = true;
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['user_id'] = $user['id'];
                
                header("location:home.php");
                exit;
            } else {
                $error = "Username atau Password salah";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="layout/style.css">
</head>
<body> 
    <div class="header-blue"></div>
    
    <div class="login-wrapper">
        <div class="login-card"> 
            <h1>POSYANDU KITA</h1>
            <div class="logo-container">
                <div class="logo">
                    <img src="layout/image/logo.png" alt="Logo" class="logo">
                </div>
            </div>
            <h1>LOGIN</h1>

            <?php if (isset($error)) : ?>
                <p style="color: red; text-align: center; margin-bottom: 15px; background: #fee2e2; padding: 10px; border-radius: 8px;">
                    <?php echo $error; ?>
                </p>
            <?php endif; ?>

            <form action="" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Username" required value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
                
                <button type="submit" name="login" class="login-btn">Login</button>
            </form>
            
            <div class="register-link"> 
                Belum punya akun? <a href="register.php">Daftar di sini</a>
            </div>
        </div>
    </div>

    <script>
        const inputs = document.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'translateX(4px)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'translateX(0)';
            });
        });
    </script>
</body>
</html>