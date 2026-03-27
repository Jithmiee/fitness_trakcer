<?php
require_once 'includes/db.php';
require_once 'includes/functions.php';

if (!isLoggedIn()) {
    redirect('auth/login.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['log_workout'])) {
    $activity = sanitize($_POST['workoutType']) . ' - ' . sanitize($_POST['exerciseName']);
    $duration = (int)$_POST['duration'];
    $calories = (int)$_POST['calories'];
    $user_id = $_SESSION['user_id'];

    $stmt = $pdo->prepare("INSERT INTO workouts (user_id, activity, duration, calories_burned) VALUES (?, ?, ?, ?)");
    $stmt->execute([$user_id, $activity, $duration, $calories]);
    redirect('dashboard.php?success=1');
}

$stmt = $pdo->prepare("SELECT * FROM workouts WHERE user_id = ? ORDER BY id DESC");
$stmt->execute([$_SESSION['user_id']]);
$workouts = $stmt->fetchAll();

$totalWorkouts = count($workouts);
$totalCalories = array_sum(array_column($workouts, 'calories_burned'));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membership & Tracker | FitTrack</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.html">FITTRACK</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="programs.php">Programs</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                    <?php if (isLoggedIn()): ?>
                        <li class="nav-item"><a class="nav-link active" href="dashboard.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link text-warning" href="auth/logout.php">Logout</a></li>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link" href="auth/login.php">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="auth/register.php">Register</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row g-5">
            <!-- Workout Tracker Section -->
            <div class="col-lg-7">
                <div class="card p-4 h-100">
                    <h2 class="h3 fw-bold mb-4 text-primary">Workout Tracker</h2>
                    <form id="workoutForm" class="row g-3 mb-4" method="POST" action="dashboard.php">
                        <div class="col-md-6">
                            <label class="form-label">Exercise Name</label>
                            <input type="text" name="exerciseName" class="form-control bg-dark text-white border-secondary" placeholder="e.g. Bench Press" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Duration (min)</label>
                            <input type="number" name="duration" class="form-control bg-dark text-white border-secondary" placeholder="30" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Calories</label>
                            <input type="number" name="calories" class="form-control bg-dark text-white border-secondary" placeholder="200" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Type</label>
                            <select name="workoutType" class="form-select bg-dark text-white border-secondary">
                                <option value="Cardio">Cardio</option>
                                <option value="Strength">Strength</option>
                            </select>
                        </div>
                        <div class="col-md-6 d-flex align-items-end">
                            <button type="submit" name="log_workout" class="btn btn-primary w-100">Log Workout</button>
                        </div>
                    </form>

                    <hr class="border-secondary">

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="h5 mb-0">Workout Log</h4>
                        <div>
                            <select id="filterType"
                                class="form-select form-select-sm bg-dark text-white border-secondary w-auto">
                                <option value="All">All Types</option>
                                <option value="Cardio">Cardio</option>
                                <option value="Strength">Strength</option>
                            </select>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-dark table-hover">
                            <thead>
                                <tr>
                                    <th>Exercise</th>
                                    <th>Type</th>
                                    <th>Duration</th>
                                    <th>Calories</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="workoutLogBody">
                                <?php if(empty($workouts)): ?>
                                    <tr><td colspan="5" class="text-center text-secondary">No workouts logged yet.</td></tr>
                                <?php else: ?>
                                    <?php foreach($workouts as $w): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($w['activity']); ?></td>
                                            <td><?php echo htmlspecialchars($w['duration']); ?> min</td>
                                            <td><?php echo htmlspecialchars($w['calories_burned']); ?> kcal</td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3 p-3 bg-dark rounded border border-secondary">
                        <h5 class="fw-bold mb-3 text-white">Daily Workout Outcome</h5>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Total Workouts:</span>
                            <span class="text-white fw-bold"><?php echo $totalWorkouts; ?></span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Total Calories Burned:</span>
                            <span class="text-primary fw-bold"><?php echo $totalCalories; ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="card p-4">
                    <h2 class="h3 fw-bold text-primary mb-3">Welcome, <?php echo $_SESSION['username']; ?>!</h2>
                    <p class="text-secondary">Keep tracking your progress to reach your ultimate fitness goals.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="formToast" class="toast bg-primary text-white" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-dark text-white border-secondary">
                <strong class="me-auto">Notification</strong>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
            <div class="toast-body" id="toastMessage">
                Action successful!
            </div>
        </div>
    </div>

    <footer class="text-center text-lg-start">
        <div class="container p-4">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h5 class="text-uppercase text-primary fw-bold">FITTRACK</h5>
                    <p class="text-secondary">Your fitness, our mission.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        <?php if(isset($_GET['success'])): ?>
            const toastElement = document.getElementById('formToast');
            const toast = new bootstrap.Toast(toastElement);
            document.getElementById('toastMessage').textContent = "Workout Logged Successfully!";
            toast.show();
        <?php endif; ?>
    </script>
</body>

</html>