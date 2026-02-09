<?php
session_start();
include 'config/app.php';
if(isset($_POST['register'])){
    $u = mysqli_real_escape_string($db, $_POST['username']);
    $o = mysqli_real_escape_string($db, $_POST['email']);
    $p = mysqli_real_escape_string($db, $_POST['password']);

    // Cek apakah username/email sudah terdaftar
    $q = mysqli_query($db, "SELECT * FROM user WHERE username='$u'");
    if(mysqli_num_rows($q) > 0){
        $error = "Username atau Email sudah terdaftar";
    }else{
        // Masukkan user baru (role default: user)
        $ins = mysqli_query($db, "INSERT INTO user (username, email, password, role) VALUES ('$u','$o','$p','Pasien')");
        if($ins){
            $_SESSION['login'] = true;
            $_SESSION['role'] = 'user';
            header("location:Login.php");
            exit;
        }else{
            $error = "Gagal mendaftar";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
    <link rel="stylesheet" href="layout/style.css">
</head>
<body> 
    <div class="footer-blue"></div>
    
    <div class="login-wrapper">
        <div class="login-card"> 
            
            <h1>POSYANDU KITA</h1>
            <div class="logo-container">
                <div class="logo">
                    <img src="layout/image/logo.png" alt="Logo" class="logo">
                </div>
            </div>
            <h1>REGISTER</h1>

            <?php if (isset($error)) : ?>
                <p style="color: red; text-align: center; margin-bottom: 15px; background: #fee2e2; padding: 10px; border-radius: 8px;">
                    <?php echo $error; ?>
                </p>
            <?php endif; ?>

            <form action="" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Username" required >
                </div>
                
                <div class="form-group">
                    <label for="username">Email</label>
                    <input type="email" id="email" name="email" placeholder="Email" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
                
                <button type="submit" name="register" class="login-btn">REGISTER</button>
            </form>
            
            <div class="register-link"> 
                Sudah punya akun? <a href="login.php">Masuk di sini</a>
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