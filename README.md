# FitTrack Web Application

Mini Project Phase 3: Interactive Web Application Development with PHP and MySQL.

## Features
- **User Authentication:** Registration, Login, Logout with secure session handling and hashed passwords.
- **Fitness Dashboard:** Personalized workout logging that automatically syncs and stores data using MySQL.
- **Contact Form:** Interactive contact form that persists visitor queries into the database.
- **Premium UI/UX:** Responsive design, split-screen authentication forms, and dynamic data presentation.

## Setup Instructions
To run this project locally using XAMPP/WAMP, follow these steps:

1. **Install XAMPP/WAMP:** Ensure Apache and MySQL are running in your local control panel.
2. **Setup Folder:** Copy the entire `Fitness` folder into your `htdocs` directory (e.g., `C:\xampp\htdocs\Fitness`).
3. **Database Import:**
    - Option A: Open phpMyAdmin (usually `http://localhost/phpmyadmin`), create a database named `fittrack`, and import the provided `database.sql` file.
    - Option B: Alternatively, simply navigate your browser to `http://localhost/Fitness/setup_db.php` and it will automatically generate the database and required tables instantly.
4. **Launch Application:** Navigate to `http://localhost/Fitness/index.php` to start using the app.

## Folder Structure highlighting
- `/auth/`: Contains `login.php`, `register.php`, and `logout.php` handling session interactions.
- `/includes/`: Contains `db.php` (PDO config) and `functions.php` (session/sanitization helpers).
- `/database.sql`: The database dump file for submission.
