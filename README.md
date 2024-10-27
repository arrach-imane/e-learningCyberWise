
---

# Laravel E-Learning Project

A basic e-learning platform built with Laravel.

## Setup

1. **Clone the repository:**
   ```bash
   git clone https://github.com/thanpuhour007/e-learning
   cd e-learning
   ```

2. **Install dependencies:**
   ```bash
   composer install
   npm install
   npm run dev
   ```

3. **Set up environment:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure the database:**
   - Update `.env` with your database details:
     ```
     DB_DATABASE=e_learning_db
     DB_USERNAME=root
     DB_PASSWORD=your_password
     ```

5. **Run migrations:**
   ```bash
   php artisan migrate
   ```

## Run the Server

```bash
php artisan serve
```

Visit [http://localhost:8000](http://localhost:8000) to access the project.

---

This minimal version includes just the essentials for getting the project up and running.