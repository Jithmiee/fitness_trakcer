<?php
require_once '../includes/db.php';
require_once '../includes/functions.php';

if (isLoggedIn()) {
    redirect('../dashboard.php');
}

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = sanitize($_POST['email']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        redirect('../dashboard.php');
    } else {
        $error = "Invalid email or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | FitTrack</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body class="login-page">
    <div class="split-layout">
        <div class="split-left" style="background: url('../images/hero1.png') no-repeat center center; background-size: cover;">
            <a href="../index.php" class="back-home"><i class="fas fa-arrow-left"></i> Back to Home</a>
            <div class="split-left-content">
                <h1>Unlock Your Potential.</h1>
                <p>Log in to access your dashboard and track your progress.</p>
            </div>
        </div>
        <div class="split-right">
            <div class="auth-form-container">
                <div class="auth-header">
                    <h2>Welcome Back</h2>
                    <p>Log in to continue your fitness journey</p>
                </div>
                <?php if ($error): ?>
                    <div class="alert alert-danger" style="margin-bottom: 20px; font-weight: 500;"><?php echo $error; ?></div>
                <?php endif; ?>
                <form class="auth-form" method="POST" action="login.php">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-auth">Login</button>
                    <div class="auth-switch">
                        Don't have an account? <a href="register.php">Sign up</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
