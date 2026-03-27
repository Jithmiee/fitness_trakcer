<?php
require_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programs | FitTrack</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    
    <!-- Authentication Redirect Check (Removed to allow public viewing) -->
    <style>
        .program-img {
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            background: #2a2a2a;
            /* Fallback */
        }
        .exercise-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: #1a1a1a;
            border: 1px solid #333;
            border-radius: 8px;
            overflow: hidden;
        }
        .exercise-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(255, 193, 7, 0.2);
            border-color: #ffc107 !important;
        }
        .exercise-img {
            width: 100%;
            height: 120px;
            object-fit: cover;
        }
    </style>
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
                    <li class="nav-item"><a class="nav-link active" href="programs.php">Programs</a></li>
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

    <header class="py-5 text-center">
        <div class="container">
            <h1 class="display-3 fw-bold mt-5">FITNESS <span class="text-primary">PROGRAMS</span></h1>
            <p class="lead text-secondary">Choose a plan that fits your lifestyle and goals.</p>
        </div>
    </header>

    <section class="pb-5">
        <div class="container">
            <div class="row g-4">
                <!-- Program 1 -->
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="images/yoga.png" class="card-img-top program-img" alt="Yoga Session">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Yoga & Zen</h5>
                            <p class="card-text text-secondary">Find balance and flexibility with our guided yoga
                                sessions for all levels.</p>
                            <button class="btn btn-primary w-100 mt-3" data-bs-toggle="modal"
                                data-bs-target="#joinModal" data-image="images/yoga.png">View Schedule</button>
                        </div>
                    </div>
                </div>
                <!-- Program 2 -->
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="images/hiit.png" class="card-img-top program-img" alt="HIIT Workout">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">HIIT Intensity</h5>
                            <p class="card-text text-secondary">Burn maximum calories in minimum time with
                                high-intensity interval training.</p>
                            <button class="btn btn-primary w-100 mt-3" data-bs-toggle="modal"
                                data-bs-target="#joinModal" data-image="images/hiit.png">View Schedule</button>
                        </div>
                    </div>
                </div>
                <!-- Program 3 -->
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="images/strength.png" class="card-img-top program-img" alt="Strength Training">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Strength Elite</h5>
                            <p class="card-text text-secondary">Build muscle and increase strength with our specialized
                                weightlifting program.</p>
                            <button class="btn btn-primary w-100 mt-3" data-bs-toggle="modal"
                                data-bs-target="#joinModal" data-image="images/strength.png">View Schedule</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="joinModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-dark text-white border-secondary">
                <div class="modal-header border-secondary">
                    <h5 class="modal-title fw-bold" id="programModalTitle">Program</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Step 1: Level Selection Section (Removed old Assessment form) -->
                    <div id="levelSelectionSection" class="text-center py-4">
                        <h5 class="fw-bold text-white mb-4">Select Your Difficulty Level</h5>
                        <p class="text-secondary mb-4">Your workout will be dynamically scaled based on this selection.</p>
                        <div class="d-flex justify-content-center gap-3">
                            <button type="button" class="btn btn-outline-success level-btn w-100 py-3 fw-bold" data-level="Beginner">
                                <i class="bi bi-star me-2"></i> Beginner
                            </button>
                            <button type="button" class="btn btn-outline-warning level-btn w-100 py-3 fw-bold" data-level="Intermediate">
                                <i class="bi bi-star-half me-2"></i> Intermediate
                            </button>
                            <button type="button" class="btn btn-outline-danger level-btn w-100 py-3 fw-bold" data-level="Pro">
                                <i class="bi bi-star-fill me-2"></i> Pro
                            </button>
                        </div>
                    </div>

                    <!-- Step 2: Workout Plan Section -->
                    <div id="workoutPlanSection" class="d-none">
                        
                        <!-- Header & Mode Toggle -->
                        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
                            <h5 id="planTitleHeader" class="text-primary mb-0 fw-bold">Workout Plan</h5>
                            
                            <div class="btn-group mt-3 mt-md-0" role="group">
                                <input type="radio" class="btn-check" name="viewMode" id="btnScheduleView" autocomplete="off" checked>
                                <label class="btn btn-outline-primary" for="btnScheduleView">Schedule View</label>

                                <input type="radio" class="btn-check" name="viewMode" id="btnTutorialMode" autocomplete="off">
                                <label class="btn btn-outline-primary" for="btnTutorialMode">Tutorial Mode</label>
                            </div>
                        </div>

                        <!-- Day Navigation (For Tutorial Mode Only) -->
                        <div class="d-flex justify-content-between overflow-auto mb-4 pb-2 d-none" id="dayNavContainer">
                            <button class="btn btn-outline-secondary active day-btn flex-shrink-0 me-2" data-day="1">Day 1</button>
                            <button class="btn btn-outline-secondary day-btn flex-shrink-0 me-2" data-day="2">Day 2</button>
                            <button class="btn btn-outline-secondary day-btn flex-shrink-0 me-2" data-day="3">Day 3</button>
                            <button class="btn btn-outline-secondary day-btn flex-shrink-0 me-2" data-day="4">Day 4</button>
                            <button class="btn btn-outline-secondary day-btn flex-shrink-0 me-2" data-day="5">Day 5</button>
                            <button class="btn btn-outline-secondary day-btn flex-shrink-0 me-2" data-day="6">Day 6</button>
                            <button class="btn btn-outline-secondary day-btn flex-shrink-0" data-day="7">Day 7</button>
                        </div>

                        <h6 id="dayTitleHeader" class="text-white mb-3 fw-bold d-none">Today's Workout</h6>
                        
                        <!-- Views Container -->
                        <div id="scheduleViewContainer" class="list-group list-group-flush mb-4 bg-dark">
                            <!-- Populated with full 7-day text list -->
                        </div>

                        <div id="tutorialViewContainer" class="row g-4 d-none">
                            <!-- Populated with Lottie Cards for the active day -->
                        </div>
                        
                        <div class="text-center mt-4">
                            <button type="button" class="btn btn-outline-secondary btn-sm" id="btnRestartLevel">Change Difficulty</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center text-lg-start">
        <div class="container p-4">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase text-primary fw-bold">FITTRACK</h5>
                    <p class="text-secondary">Transforming lives through fitness and technology.</p>
                </div>
                <div class="col-lg-6 col-md-12 text-lg-end">
                    <p class="text-secondary">© 2026 FitTrack. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script>
        // Data Architecture Factory for Program -> Difficulty -> Days
        const genericAnimations = {
            yoga: "https://lottie.host/8e1008f1-e8d1-4cb5-aa5c-5e9255a80fcf/h0wM03aW2d.json",
            hiit: "https://lottie.host/bcca1af2-58e1-43ef-b9c1-74f4b14d86c7/1t91aXqM8o.json",
            strength: "https://lottie.host/8e1008f1-e8d1-4cb5-aa5c-5e9255a80fcf/h0wM03aW2d.json"
        };
        
        // Helper to generate full realistic scaled weeks
        const generateScaledWeek = (progType, levelStr) => {
            const anim = genericAnimations[progType.toLowerCase()] || genericAnimations.strength;
            let setsReps, timeSec;
            if(levelStr === 'Beginner') { setsReps = '3 sets x 10 reps'; timeSec = 30; }
            else if(levelStr === 'Intermediate') { setsReps = '4 sets x 12 reps'; timeSec = 45; }
            else { setsReps = '5 sets x 15 reps'; timeSec = 60; }
            
            // Define 7 days base
            const daysBase = [
                { title: 'Chest & Tris', exercises: ['Bench Press', 'Push Ups', 'Incline Dumbbell Press', 'Tricep Pulldowns', 'Overhead Extensions'] },
                { title: 'Back & Bis', exercises: ['Deadlift', 'Pull Ups', 'Barbell Rows', 'Bicep Curls', 'Hammer Curls'] },
                { title: 'Legs Foundation', exercises: ['Squats', 'Leg Press', 'Lunges', 'Calf Raises', 'Leg Extensions'] },
                { title: 'Shoulders & Core', exercises: ['Overhead Press', 'Lateral Raises', 'Front Raises', 'Plank', 'Crunches'] },
                { title: 'Full Body Power', exercises: ['Clean and Press', 'Burpees', 'Box Jumps', 'Kettlebell Swings', 'Farmer Walks'] },
                { title: 'Active Recovery', exercises: ['Light Jog', 'Stretching', 'Foam Rolling', 'Mobility Work', 'Yoga Flow'] },
                { title: 'Total Rest', exercises: ['Rest Day', 'Hydration Focus', 'Mental Check-in', 'Meal Prep', 'Sleep'] }
            ];

            // If Yoga or HIIT, transform text themes
            if(progType === 'Yoga') {
                daysBase[0].title = 'Foundation Flow'; daysBase[0].exercises = ['Mountain Pose', 'Downward Dog', 'Warrior II', 'Tree Pose', 'Childs Pose'];
                daysBase[1].title = 'Core Balance'; daysBase[1].exercises = ['Plank Pose', 'Boat Pose', 'Eagle Pose', 'Side Plank', 'Bridge Pose'];
                daysBase[2].title = 'Deep Stretch'; daysBase[2].exercises = ['Seated Forward Fold', 'Pigeon Pose', 'Supine Twist', 'Happy Baby', 'Savasana'];
                daysBase[3].title = 'Power Sun Salutations'; daysBase[3].exercises = ['Sun Salutation A', 'Sun Salutation B', 'Chaturanga', 'Upward Dog', 'Chair Pose'];
                daysBase[4].title = 'Hip Openers'; daysBase[4].exercises = ['Lizard Lunge', 'Butterfly Pose', 'Frog Pose', 'Goddess Pose', 'Malasana'];
            } else if(progType === 'HIIT') {
                daysBase[0].title = 'Cardio Burn'; daysBase[0].exercises = ['Jumping Jacks', 'High Knees', 'Mountain Climbers', 'Burpees', 'Fast Feet'];
                daysBase[1].title = 'Lower Body Power'; daysBase[1].exercises = ['Jump Squats', 'Lunge Jumps', 'Skater Jumps', 'Squat Pulses', 'Calf Bounces'];
                daysBase[2].title = 'Core Crusher'; daysBase[2].exercises = ['Plank Jacks', 'Russian Twists', 'Bicycle Crunches', 'V-Ups', 'Hollow Hold'];
                daysBase[3].title = 'Upper Body Blast'; daysBase[3].exercises = ['Pushups', 'Plank Walkouts', 'Shoulder Taps', 'Tricep Dips', 'Superman Holds'];
                daysBase[4].title = 'Full Body Agility'; daysBase[4].exercises = ['Tuck Jumps', 'Bear Crawls', 'Broad Jumps', 'Speed Skaters', 'Lateral Shuffles'];
            }

            const outDays = {};
            daysBase.forEach((dayObj, i) => {
                let dayNum = i+1;
                // For last 2 days (Recover/Rest) we override the time/sets
                const isRest = dayNum >= 6;
                outDays[dayNum] = {
                    theme: dayObj.title,
                    exercises: dayObj.exercises.map(exName => ({
                        name: exName,
                        animation: anim,
                        sets: isRest ? '1 duration block' : setsReps,
                        desc: `Concentrate on form and breathing during this ${levelStr.toLowerCase()} movement.`,
                        time: isRest ? 10 : timeSec // time in seconds (10s mock for fast test)
                    }))
                };
            });
            return outDays;
        };

        const programData = {
            "Yoga & Zen": {
                name: "Yoga & Zen",
                Beginner: { days: generateScaledWeek('Yoga', 'Beginner') },
                Intermediate: { days: generateScaledWeek('Yoga', 'Intermediate') },
                Pro: { days: generateScaledWeek('Yoga', 'Pro') }
            },
            "HIIT Intensity": {
                name: "HIIT Intensity",
                // Notice: HIIT uses similar scaling now for consistency.
                Beginner: { days: generateScaledWeek('HIIT', 'Beginner') },
                Intermediate: { days: generateScaledWeek('HIIT', 'Intermediate') },
                Pro: { days: generateScaledWeek('HIIT', 'Pro') }
            },
            "Strength Elite": {
                name: "Strength Elite",
                Beginner: { days: generateScaledWeek('Strength', 'Beginner') },
                Intermediate: { days: generateScaledWeek('Strength', 'Intermediate') },
                Pro: { days: generateScaledWeek('Strength', 'Pro') }
            }
        };

        document.addEventListener('DOMContentLoaded', () => {
            const joinModal = document.getElementById('joinModal');
            const levelSelectionSection = document.getElementById('levelSelectionSection');
            const workoutPlanSection = document.getElementById('workoutPlanSection');
            
            // Containers
            const scheduleViewContainer = document.getElementById('scheduleViewContainer');
            const tutorialViewContainer = document.getElementById('tutorialViewContainer');
            const dayNavContainer = document.getElementById('dayNavContainer');
            const dayTitleHeader = document.getElementById('dayTitleHeader');
            
            // Buttons
            const levelBtns = document.querySelectorAll('.level-btn');
            const dayBtns = document.querySelectorAll('.day-btn');
            const btnScheduleView = document.getElementById('btnScheduleView');
            const btnTutorialMode = document.getElementById('btnTutorialMode');
            const btnRestartLevel = document.getElementById('btnRestartLevel');
            
            let currentProgramTitle = null;
            let currentLevel = null;
            let currentActiveDay = 1;
            
            // Timer State
            let activeTimers = {}; // { exIndex : intervalId }

            // Helper to get logic day from Date (1=Mon, 7=Sun)
            const getCurrentSystemDay = () => {
                let dayNum = new Date().getDay();
                return dayNum === 0 ? 7 : dayNum; // if 0 (Sunday), make it 7. Else 1-6.
            };

            // RENDER: Full 7-Day List (Schedule View)
            const renderScheduleView = () => {
                scheduleViewContainer.innerHTML = '';
                const difficultyData = programData[currentProgramTitle][currentLevel];
                
                let html = [];
                for(let day = 1; day <= 7; day++) {
                    const dData = difficultyData.days[day];
                    const isToday = day === getCurrentSystemDay();
                    const badge = isToday ? '<span class="badge bg-primary ms-2">Today</span>' : '';
                    
                    html.push(`
                        <div class="list-group-item bg-dark text-white border-secondary mb-3 rounded shadow-sm">
                            <h5 class="fw-bold text-primary border-bottom border-dark pb-2">Day ${day} – ${dData.theme} ${badge}</h5>
                            <ul class="list-unstyled mb-0 ms-2">
                    `);
                    dData.exercises.forEach(ex => {
                        html.push(`
                            <li class="mb-2 d-flex justify-content-between align-items-center">
                                <span><i class="bi bi-caret-right-fill text-secondary me-2"></i> ${ex.name}</span>
                                <span class="text-warning small">${ex.sets}</span>
                            </li>
                        `);
                    });
                    html.push(`</ul></div>`);
                }
                scheduleViewContainer.innerHTML = html.join('');
            };

            // RENDER: Single Day Card layout (Tutorial Mode)
            const renderTutorialMode = (dayNum) => {
                currentActiveDay = parseInt(dayNum);
                tutorialViewContainer.innerHTML = '';
                
                // Active button class
                dayBtns.forEach(btn => {
                    if (parseInt(btn.getAttribute('data-day')) === currentActiveDay) {
                        btn.classList.add('active');
                        btn.classList.replace('btn-outline-secondary', 'btn-primary');
                    } else {
                        btn.classList.remove('active');
                        btn.classList.replace('btn-primary', 'btn-outline-secondary');
                    }
                });

                const difficultyData = programData[currentProgramTitle][currentLevel];
                const dayData = difficultyData.days[currentActiveDay];
                
                // Clear any existing global interval timers
                for(let key in activeTimers){
                    clearInterval(activeTimers[key]);
                }
                activeTimers = {};

                // Update Header
                const isToday = parseInt(currentActiveDay) === getCurrentSystemDay();
                const lockStateHtml = isToday ? '' : '<span class="badge bg-danger ms-2"><i class="bi bi-lock-fill"></i> Locked (Preview)</span>';
                dayTitleHeader.innerHTML = `Day ${currentActiveDay}: ${dayData.theme} ${lockStateHtml}`;

                dayData.exercises.forEach((ex, index) => {
                    const col = document.createElement('div');
                    col.className = 'col-md-6 col-lg-4';
                    col.innerHTML = `
                        <div class="exercise-card h-100 text-white bg-dark position-relative border border-secondary" id="exCard-${index}">
                            <div class="bg-black text-center border-bottom border-dark" style="height:200px; overflow:hidden;">
                                <lottie-player src="${ex.animation}" background="transparent" speed="1" style="width: 100%; height: 100%;" loop autoplay></lottie-player>
                            </div>
                            <div class="p-3 d-flex flex-column h-100">
                                <h6 class="fw-bold text-primary mb-1">${index+1}. ${ex.name}</h6>
                                <p class="small text-warning fw-bold mb-2"><i class="bi bi-fire"></i> ${ex.sets} • <i class="bi bi-stopwatch"></i> ${ex.time}s</p>
                                <p class="small text-secondary mb-3 mt-auto">${ex.desc}</p>
                                
                                <div class="d-flex justify-content-between align-items-center mt-auto border-top border-secondary pt-3">
                                    <h4 class="mb-0 text-white fw-bold d-none" id="timerDisplay-${index}">${ex.time}</h4>
                                    <button class="btn btn-primary btn-sm w-100 start-btn" data-exindex="${index}" data-time="${ex.time}" ${isToday ? '' : 'disabled'}>
                                        <i class="bi bi-play-fill"></i> Start Workout
                                    </button>
                                </div>
                            </div>
                        </div>
                    `;
                    tutorialViewContainer.appendChild(col);
                });

                // Attach Timer Logic
                const startBtns = tutorialViewContainer.querySelectorAll('.start-btn');
                startBtns.forEach(btn => {
                    btn.addEventListener('click', function() {
                        const idx = this.getAttribute('data-exindex');
                        let timeLeft = parseInt(this.getAttribute('data-time'));
                        const timeDisplay = document.getElementById(`timerDisplay-${idx}`);
                        const cardElement = document.getElementById(`exCard-${idx}`);
                        
                        // UI shift
                        this.classList.add('d-none');
                        timeDisplay.classList.remove('d-none');
                        cardElement.classList.add('border-primary'); // Highlight active
                        
                        activeTimers[idx] = setInterval(() => {
                            timeLeft--;
                            timeDisplay.textContent = timeLeft;
                            
                            if(timeLeft <= 0) {
                                clearInterval(activeTimers[idx]);
                                delete activeTimers[idx];
                                timeDisplay.innerHTML = '<i class="bi bi-check-circle-fill text-success"></i> Done';
                                timeDisplay.classList.add('text-success');
                                cardElement.classList.remove('border-primary');
                                cardElement.classList.add('opacity-50'); // Dim completed
                                
                                // Auto-start next if available
                                const nextBtn = document.querySelector(`.start-btn[data-exindex="${parseInt(idx) + 1}"]`);
                                if(nextBtn && !nextBtn.disabled) {
                                    // small delay then start next
                                    setTimeout(() => nextBtn.click(), 1000);
                                    // Scroll into view gently
                                    nextBtn.scrollIntoView({ behavior: 'smooth', block: 'center' });
                                }
                            }
                        }, 1000);
                    });
                });
            };

            // Event: Modal Setup
            joinModal.addEventListener('show.bs.modal', function (event) {
                const button = event.relatedTarget;
                const card = button.closest('.card');
                currentProgramTitle = card.querySelector('.card-title').textContent;
                
                document.getElementById('programModalTitle').textContent = currentProgramTitle;
                
                // Show Steps
                levelSelectionSection.classList.remove('d-none');
                workoutPlanSection.classList.add('d-none');
                
                // Reset toggles to Schedule mode
                btnScheduleView.checked = true;
                dayNavContainer.classList.add('d-none');
                dayTitleHeader.classList.add('d-none');
                scheduleViewContainer.classList.remove('d-none');
                tutorialViewContainer.classList.add('d-none');
            });

            // Event: Difficulty Clicked
            levelBtns.forEach(btn => {
                btn.addEventListener('click', (e) => {
                    currentLevel = e.currentTarget.getAttribute('data-level');
                    document.getElementById('planTitleHeader').textContent = `${currentProgramTitle} - ${currentLevel}`;
                    
                    levelSelectionSection.classList.add('d-none');
                    workoutPlanSection.classList.remove('d-none');
                    
                    renderScheduleView();
                });
            });

            // Event: Toggles (Schedule <-> Tutorial)
            btnScheduleView.addEventListener('change', () => {
                dayNavContainer.classList.add('d-none');
                dayTitleHeader.classList.add('d-none');
                tutorialViewContainer.classList.add('d-none');
                scheduleViewContainer.classList.remove('d-none');
            });

            btnTutorialMode.addEventListener('change', () => {
                scheduleViewContainer.classList.add('d-none');
                dayNavContainer.classList.remove('d-none');
                dayTitleHeader.classList.remove('d-none');
                tutorialViewContainer.classList.remove('d-none');
                
                renderTutorialMode(getCurrentSystemDay()); // Default to today
            });

            // Event: Day Navigation
            dayBtns.forEach(btn => {
                btn.addEventListener('click', (e) => {
                    const targetDay = e.target.getAttribute('data-day');
                    renderTutorialMode(targetDay);
                });
            });

            // Event: Back tracking
            btnRestartLevel.addEventListener('click', function() {
                levelSelectionSection.classList.remove('d-none');
                workoutPlanSection.classList.add('d-none');
                
                // Clear any running timers if they back out mid-workout
                for(let key in activeTimers){
                    clearInterval(activeTimers[key]);
                }
                activeTimers = {};
            });
        });
    </script>
</body>

</html>