# Learner Progress Dashboard

This Laravel 12 project is a full-stack learner dashboard that allows users to view learners, the courses they are enrolled in, and their progress percentages. It includes filtering by course and sorting by progress. This version is Dockerized for smooth cross-platform development.

---

## 🚀 Features

- View learners and their enrolled courses
- Progress tracking by percentage
- Filter learners by course name
- Sort learners by progress
- Docker-based setup (no Composer or PHP required on host)
- SQLite as database (lightweight and file-based)
- Seeded with fake learners, courses, and enrolments

---

## 🐳 Docker Setup Instructions

### 1. Clone the Repository

```bash
git clone https://github.com/JonathanJacobson/learner-progress-dashboard.git
cd learner-progress-dashboard
```

### 2. Start the Docker Container

```bash
docker compose up --build
```

On first run, this will:
- Install dependencies
- Generate `.env`
- Create and seed a SQLite DB
- Serve Laravel at `http://localhost:8000`

> To run it in the background:
```bash
docker compose up -d
```

### 3. Access the App

Visit:
```
http://localhost:8000/learner-progress
```

---

## 🧪 Regenerating the Database (Optional)

To reset and re-seed your database manually:

```bash
docker compose exec app php artisan migrate:fresh --seed
```

---

## 📂 Folder Structure

Key files added:

- `docker-compose.yml` – Docker config
- `start.sh` – Bootstrap script for container
- `resources/views/learner-progress.blade.php` – Dashboard UI
- `app/Http/Controllers/LearnerProgressController.php` – Main controller logic
- `database/factories/` – Factories for learners, courses, and enrolments
- `database/seeders/` – Seeder logic that ensures unique course enrolments

---

## ✅ Notes

- Blade templates use `layouts.app`, which is included in `resources/views/layouts/app.blade.php`
- Learner names are displayed using combined `firstname` + `lastname`
- All required storage and cache folders are created dynamically in Docker

---

## 📬 Submission

To submit your work:
- Push your latest code to GitHub
- Share the link: https://github.com/JonathanJacobson/learner-progress-dashboard