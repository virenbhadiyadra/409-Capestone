# Portfolio Website with Admin Panel
Welcome to the Portfolio Website project! This repository contains the full implementation of a modern, responsive portfolio website with a secure admin panel to manage contact messages.

## Project Overview
This portfolio website is designed to:
* Showcase skills, projects, and experience.
* Provide an engaging and user-friendly interface with animations.
* Allow visitors to submit inquiries through a contact form.
* Enable the admin to manage messages via a secure admin panel.
## Features
### Public Website:
* Responsive design for all devices.
* Home, About, Projects, and Contact pages.
* Animations and interactivity using JavaScript.
* Contact form with database integration.
### Admin Panel:
* Secure login functionality.
* View, mark as favorite, and delete messages.
## Technology Stack
### Frontend:
* HTML5
* CSS3 (with separate stylesheets for each page)
* JavaScript (for animations and interactivity)
### Backend:
* PHP (for server-side processing)
### Database:
* MySQL (for storing contact messages and project data)
### Version Control:
* Git
## Setup and Installation
1. Clone the Repository
```bash
git clone https://github.com/your-username/portfolio-website.git
cd portfolio-website
```
2. Set Up Local Development Environment
* Install XAMPP or MAMP.
* Place the project files in the htdocs folder (e.g., C:/xampp/htdocs/portfolio_website).
* Start Apache and MySQL servers.
3. Create the Database
* Access phpMyAdmin via http://localhost/phpmyadmin.
* Create a new database called portfolio_db.
4. Import Database Schema
Run the following SQL queries in phpMyAdmin:

**contacts Table**
```sql
CREATE TABLE contacts (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    is_favorite BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```
**admin_users Table**
```sql
CREATE TABLE admin_users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```
5. Add Admin Credentials
Insert admin credentials into the admin_users table:
```sql
INSERT INTO admin_users (username, password) VALUES ('admin', 'hashed_password');
```
Use the following PHP code to generate the hashed password:
```sql
echo password_hash('Admin@123', PASSWORD_DEFAULT);
```
## File Structure

```graphql
409-CAPESTONE/
├── assets/                          # Folder for images and other assets
├── about.css                        # Stylesheet for the About page
├── about.html                       # About page
├── admin_dashboard.css              # Stylesheet for the Admin Dashboard
├── admin_login.css                  # Stylesheet for Admin Login page
├── admin_login.html                 # Admin Login page
├── admin_login.php                  # Backend for Admin Login
├── admin_messages.php               # Admin panel for managing messages
├── admin.css                        # General styles for admin pages
├── contact.html                     # Contact page
├── dashboard.php                    # Admin Dashboard page
├── footer.css                       # Stylesheet for the Footer
├── footer2.css                      # Additional Footer styles
├── index.html                       # Homepage
├── k.txt                            # A text file (purpose unclear)
├── logout.php                       # Script to handle admin logout
├── nav.css                          # Stylesheet for navigation menu
├── nav.js                           # JavaScript for navigation interactivity
├── process_form.php                 # Backend to handle contact form submissions
├── project-1.html                   # Individual project page 1
├── project-2.html                   # Individual project page 2
├── project-3.html                   # Individual project page 3
├── project-4.html                   # Individual project page 4
├── project-5.html                   # Individual project page 5
├── project-6.html                   # Individual project page 6
├── project-7.html                   # Individual project page 7
├── project-8.html                   # Individual project page 8
├── project-9.html                   # Individual project page 9
├── projects.html                    # Projects listing page
└── README.md                        # Documentation for the project
```

## Usage Instructions

### Public Website:
* Home Page: View the hero section, featured projects, and navigation links.
* Projects Page: Browse through featured projects.
* Contact Form: Submit inquiries, which will be stored in the database.

### Admin Panel:
* Login: Navigate to admin_login.html and log in with the admin credentials.
* Dashboard: View and manage messages.
* Logout: Click the "Logout" button to end the session.

**For any questions or issues, please contact the developer at vbhadiyadra@northislandcollege.ca.**










  

