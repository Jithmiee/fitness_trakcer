/*
 * Tracker & Validation Logic
 * Manages workout logging, filtering, and membership form validation.
 */

document.addEventListener('DOMContentLoaded', () => {

    // --- WORKOUT TRACKER LOGIC ---
    const workoutForm = document.getElementById('workoutForm');
    const workoutLogBody = document.getElementById('workoutLogBody');
    const totalCaloriesEl = document.getElementById('totalCalories');
    const totalWorkoutsEl = document.getElementById('totalWorkouts');
    const filterType = document.getElementById('filterType');

    let workouts = [];

    // Add Workout
    workoutForm.addEventListener('submit', (e) => {
        e.preventDefault();

        const name = document.getElementById('exerciseName').value;
        const duration = parseInt(document.getElementById('duration').value);
        const calories = parseInt(document.getElementById('calories').value);
        const type = document.getElementById('workoutType').value;

        const workout = {
            id: Date.now(),
            name,
            duration,
            calories,
            type
        };

        workouts.push(workout);
        renderWorkouts();
        workoutForm.reset();
        showToast("Workout logged successfully!");
    });

    // Delete Workout
    window.deleteWorkout = (id) => {
        workouts = workouts.filter(w => w.id !== id);
        renderWorkouts();
    };

    // Filter Workouts
    filterType.addEventListener('change', renderWorkouts);

    function renderWorkouts() {
        const filter = filterType.value;
        const filteredWorkouts = filter === 'All'
            ? workouts
            : workouts.filter(w => w.type === filter);

        workoutLogBody.innerHTML = '';
        let totalCals = 0;

        filteredWorkouts.forEach(w => {
            totalCals += w.calories;
            const row = `
                <tr>
                    <td>${w.name}</td>
                    <td><span class="badge ${w.type === 'Cardio' ? 'bg-success' : 'bg-orange'}">${w.type}</span></td>
                    <td>${w.duration} min</td>
                    <td>${w.calories} kcal</td>
                    <td>
                        <button class="btn btn-sm btn-outline-danger" onclick="deleteWorkout(${w.id})">
                            Delete
                        </button>
                    </td>
                </tr>
            `;
            workoutLogBody.insertAdjacentHTML('beforeend', row);
        });

        totalCaloriesEl.textContent = totalCals;
        totalWorkoutsEl.textContent = filteredWorkouts.length;
    }


    // --- MEMBERSHIP FORM VALIDATION ---
    const membershipForm = document.getElementById('membershipForm');

    membershipForm.addEventListener('submit', (e) => {
        e.preventDefault();

        let isValid = true;
        const nameInput = document.getElementById('mName');
        const emailInput = document.getElementById('mEmail');
        const phoneInput = document.getElementById('mPhone');

        // Simple validation check
        if (!nameInput.value.trim()) {
            nameInput.classList.add('is-invalid');
            isValid = false;
        } else {
            nameInput.classList.remove('is-invalid');
        }

        // Email regex
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(emailInput.value)) {
            emailInput.classList.add('is-invalid');
            isValid = false;
        } else {
            emailInput.classList.remove('is-invalid');
        }

        // Phone regex (10 digits)
        const phoneRegex = /^[0-9]{10}$/;
        if (!phoneRegex.test(phoneInput.value)) {
            phoneInput.classList.add('is-invalid');
            isValid = false;
        } else {
            phoneInput.classList.remove('is-invalid');
        }

        if (isValid) {
            showToast("Registration successful! Welcome to FitTrack.");
            
            membershipForm.reset();
            membershipForm.classList.remove('was-validated');
        } else {
            membershipForm.classList.add('was-validated');
        }
    });


    // --- UTILITIES ---
    function showToast(message) {
        const toastEl = document.getElementById('formToast');
        const toastMessage = document.getElementById('toastMessage');
        toastMessage.textContent = message;

        const toast = new bootstrap.Toast(toastEl);
        toast.show();
    }

});

// Custom CSS for badge (add to style.css if needed, but using Bootstrap here)
// Adding a small style for 'bg-orange' manually in style.css or here
// I'll add it to style.css in the next step.
