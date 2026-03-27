<?php
require_once '../includes/db.php';
require_once '../includes/functions.php';

if (isLoggedIn()) {
    redirect('../dashboard.php');
}

$error = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = sanitize($_POST['username']);
    $email = sanitize($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    try {
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$username, $email, $password]);
        $success = "Registration successful! You can now log in.";
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            $error = "Email already exists!";
        } else {
            $error = "Registration failed: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | FitTrack</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body class="login-page">
    <div class="split-layout">
        <div class="split-left" style="background: url('../images/hero2.png') no-repeat center center; background-size: cover;">
            <a href="../index.php" class="back-home"><i class="fas fa-arrow-left"></i> Back to Home</a>
            <div class="split-left-content">
                <h1>Start Your Journey</h1>
                <p>Register today to gain access to world-class coaching.</p>
            </div>
        </div>
        <div class="split-right">
            <div class="auth-form-container">
                <div class="auth-header">
                    <h2>Join FitTrack</h2>
                    <p>Create an account to track your progress</p>
                </div>
                <?php if ($error): ?>
                    <div class="alert alert-danger" style="margin-bottom: 20px; font-weight: 500;"><?php echo $error; ?></div>
                <?php endif; ?>
                <?php if ($success): ?>
                    <div class="alert alert-success" style="margin-bottom: 20px; font-weight: 500;">
                        <?php echo $success; ?> <a href="login.php" class="alert-link text-dark">Log in here</a>.
                    </div>
                <?php else: ?>
                    <form class="auth-form" method="POST" action="register.php">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" minlength="4" required>
                        </div>
                        <button type="submit" class="btn btn-auth mt-2">Create Account</button>
                        <div class="auth-switch">
                            Already have an account? <a href="login.php" id="showLogin">Log in</a>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
