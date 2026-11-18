# Login Manager

A user registration and authentication web application built with PHP and MySQL. It features a responsive interface and is configured to run both locally and in production on Railway.

## Technologies Used

- PHP: Server-side scripting, form processing, and input sanitization.
- MySQL: Relational database for storing user credentials.
- HTML5 and CSS3: Page structure and responsive layout.
- Railway: Cloud hosting and database management.
- Git: Version control.

## How It Works

1. The user enters a username and password in the web form.
2. The form sends the data to the backend PHP script using POST.
3. PHP sanitizes the inputs using special character filters.
4. The connection script automatically connects to the cloud database on Railway (or local MySQL if running locally).
5. The credentials are saved to the USERNAME database table, and a confirmation message is displayed.

## How to Run and Test (Live Website)

1. Open the live application link:
   https://login-manager-production.up.railway.app
2. Type a username in the Username field.
3. Type a password in the Password field.
4. Click the Login button.
5. Verify that the message "you are registered" appears on the screen.

## Database Schema

```sql
CREATE DATABASE IF NOT EXISTS login_database;
USE login_database;

CREATE TABLE IF NOT EXISTS USERNAME (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

## How to Run Locally

1. Clone the repository:
   ```bash
   git clone https://github.com/shivadars/login-manager.git
   cd login-manager
   ```
2. Start MySQL via XAMPP.
3. Start the PHP development server:
   ```bash
   php -S localhost:8000
   ```
4. Open http://localhost:8000 in your browser, enter a username and password, and click Login.
