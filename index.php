<?php
require_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitTrack | Your Ultimate Fitness Partner</title>
    <meta name="description" content="Track your workouts, join premium programs, and reach your fitness goals with FitTrack.">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
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
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="programs.php">Programs</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                    <?php if (isLoggedIn()): ?>
                        <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link text-warning" href="auth/logout.php">Logout</a></li>
                    <?php else: ?>
                        <li class="nav-item"><a class="nav-link" href="auth/login.php">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="auth/register.php">Register</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Carousel -->
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image: url('images/hero1.png');">
                <div class="carousel-caption d-none d-md-block fade-in">
                    <h2>Fuel Your Ambition</h2>
                    <p>Experience world-class training facilities and expert coaching.</p>
                    <?php if(isLoggedIn()): ?>
                        <a href="dashboard.php" class="btn btn-primary" id="heroRegisterBtn">Dashboard</a>
                    <?php else: ?>
                        <a href="auth/register.php" class="btn btn-primary" id="heroRegisterBtn">Register</a>
                    <?php endif; ?>
                    <a href="programs.php" class="btn btn-outline-light ms-2">Our Programs</a>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url('images/hero2.png');">
                <div class="carousel-caption d-none d-md-block fade-in">
                    <h2>Push Your Limits</h2>
                    <p>Advanced tracking tools to keep you on the right path.</p>
                    <a href="dashboard.php" class="btn btn-primary">Start Tracking</a>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url('images/hero3.png');">
                <div class="carousel-caption d-none d-md-block fade-in">
                    <h2>Join the Community</h2>
                    <p>Train with professionals and peers who drive you forward.</p>
                    <a href="dashboard.php" class="btn btn-primary">Join Now</a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <!-- Features Section -->
    <section class="py-5" id="features">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-md-8 mx-auto">
                    <h2 class="display-4 fw-bold">Elevate Your Training</h2>
                    <p class="text-secondary">Everything you need to succeed in one place.</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 p-4 text-center">
                        <div class="card-body">
                            <h3 class="h4 mb-3">Live Tracking</h3>
                            <p class="text-secondary">Track your calories and duration in real-time with our digital log.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 p-4 text-center">
                        <div class="card-body">
                            <h3 class="h4 mb-3">Expert Plans</h3>
                            <p class="text-secondary">Over 50+ curated programs for every fitness level and goal.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 p-4 text-center">
                        <div class="card-body">
                            <h3 class="h4 mb-3">Community</h3>
                            <p class="text-secondary">Connect with like-minded individuals and stay motivated.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center text-lg-start">
        <div class="container p-4">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase text-primary fw-bold">FITTRACK</h5>
                    <p class="text-secondary">
                        The ultimate destination for modern fitness enthusiasts. 
                        Join us and transform your life.
                    </p>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Links</h5>
                    <ul class="list-unstyled mb-0">
                        <li><a href="index.php" class="footer-link">Home</a></li>
                        <li><a href="programs.php" class="footer-link">Programs</a></li>
                        <li><a href="dashboard.php" class="footer-link">Dashboard</a></li>
                        <li><a href="contact.php" class="footer-link">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Social</h5>
                    <ul class="list-unstyled mb-0">
                        <li><a href="#" class="footer-link">Instagram</a></li>
                        <li><a href="#" class="footer-link">Twitter</a></li>
                        <li><a href="#" class="footer-link">Facebook</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="text-center p-3 border-top border-secondary mt-3">
            <span class="text-secondary">© 2026 FitTrack. Built for University Web Design Project.</span>
        </div>
    </footer>

    <!-- Registration Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-dark text-white border-secondary">
                <div class="modal-header border-secondary">
                    <h5 class="modal-title fw-bold text-primary">FitTrack Registration</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="homeRegisterForm" class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label text-light">Name</label>
                            <input type="text" id="rName" class="form-control bg-dark text-white border-secondary" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-light">Email</label>
                            <input type="email" id="rEmail" class="form-control bg-dark text-white border-secondary" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-light">Mobile Number</label>
                            <input type="tel" id="rMobile" class="form-control bg-dark text-white border-secondary" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label text-light">Height (cm)</label>
                            <input type="number" id="rHeight" class="form-control bg-dark text-white border-secondary" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label text-light">Weight (kg)</label>
                            <input type="number" id="rWeight" class="form-control bg-dark text-white border-secondary" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label text-light">Food Habit</label>
                            <select id="rFood" class="form-select bg-dark text-white border-secondary">
                                <option value="Veg">Veg</option>
                                <option value="Non-Veg">Non-Veg</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label text-light">Drinking Habit</label>
                            <select id="rDrink" class="form-select bg-dark text-white border-secondary">
                                <option value="No">No</option>
                                <option value="Yes">Yes</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label text-light">Smoking Habit</label>
                            <select id="rSmoke" class="form-select bg-dark text-white border-secondary">
                                <option value="No">No</option>
                                <option value="Yes">Yes</option>
                            </select>
                        </div>
                        
                        <!-- Internal Result Display -->
                        <div id="registerSuccessBox" class="col-12 mt-4 d-none">
                            <div class="alert alert-success border border-success text-center">
                                <h6 class="fw-bold mb-2">Registration Successful!</h6>
                                <p class="mb-0">Your computed BMI: <span id="rBmiVal" class="fw-bold"></span></p>
                            </div>
                        </div>

                        <div class="col-12 mt-4 d-flex justify-content-between">
                            <button type="submit" id="btnRegisterSubmit" class="btn btn-primary w-50 me-2">Register</button>
                            <button type="button" id="btnGoPrograms" class="btn btn-outline-light w-50" disabled>Go To Programs</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="js/main.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // JS Init
            console.log('FitTrack initialized.');
        });
            if(homeRegisterForm) {
                homeRegisterForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    const user = {
                        name: document.getElementById('rName').value,
                        email: document.getElementById('rEmail').value,
                        mobile: document.getElementById('rMobile').value,
                        height: parseFloat(document.getElementById('rHeight').value),
                        weight: parseFloat(document.getElementById('rWeight').value),
                        food: document.getElementById('rFood').value,
                        drink: document.getElementById('rDrink').value,
                        smoke: document.getElementById('rSmoke').value,
                        bmi: 0
                    };

                    // Calculate BMI
                    const heightM = user.height / 100;
                    user.bmi = (user.weight / (heightM * heightM)).toFixed(1);

                    // Save to local storage
                    localStorage.setItem('fitTrackUser', JSON.stringify(user));

                    // Show success & BMI
                    document.getElementById('rBmiVal').textContent = user.bmi;
                    document.getElementById('registerSuccessBox').classList.remove('d-none');
                    
                    // Toggle buttons
                    document.getElementById('btnRegisterSubmit').disabled = true;
                    const goBtn = document.getElementById('btnGoPrograms');
                    goBtn.disabled = false;
                    goBtn.classList.remove('btn-outline-light');
                    goBtn.classList.add('btn-success');
                });

                document.getElementById('btnGoPrograms').addEventListener('click', function() {
                    window.location.href = 'programs.html';
                });
            }
        });
    </script>
</body>
</html>
